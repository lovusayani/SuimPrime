<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        // Status filter
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Search
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('email', 'like', "%{$search}%")
                    ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        $users = $query->latest()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|confirmed',
            'role' => 'required|in:user,admin',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female,other',
            'avatar' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ]);

        $validated['password'] = Hash::make($validated['password']);

        if ($request->hasFile('avatar')) {
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        User::create($validated);

        return redirect()->route('admin.users.index')->with('success', 'User created successfully.');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'role' => 'required|in:user,admin',
            'phone' => 'nullable|string|max:20',
            'gender' => 'nullable|in:male,female,other',
            'avatar' => 'nullable|image|max:2048',
            'status' => 'boolean',
        ]);

        if ($request->hasFile('avatar')) {
            // Delete old avatar
            if ($user->avatar) {
                Storage::disk('public')->delete($user->avatar);
            }
            $validated['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validated);

        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    public function details(User $user)
    {
        return view('admin.users.details', compact('user'));
    }

    public function changePassword(User $user)
    {
        return view('admin.users.change-password', compact('user'));
    }

    public function updatePassword(Request $request, User $user)
    {
        $request->validate([
            'password' => 'required|min:8|confirmed',
        ]);

        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.users.index')->with('success', 'Password changed successfully.');
    }

    public function destroy(User $user)
    {
        if ($user->avatar) {
            Storage::disk('public')->delete($user->avatar);
        }

        $user->delete();

        return response()->json(['success' => true, 'message' => 'User deleted successfully.']);
    }

    public function updateStatus(Request $request, User $user)
    {
        $user->update(['status' => !$user->status]);

        return response()->json(['success' => true, 'message' => 'Status updated successfully.']);
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action_type' => 'required|in:change-status,permanently-delete',
            'ids' => 'required|array',
            'status' => 'required_if:action_type,change-status|in:0,1',
        ]);

        $users = User::whereIn('id', $request->ids)->get();

        switch ($request->action_type) {
            case 'change-status':
                foreach ($users as $user) {
                    $user->update(['status' => $request->status]);
                }
                $message = 'Status updated successfully.';
                break;

            case 'permanently-delete':
                foreach ($users as $user) {
                    if ($user->avatar) {
                        Storage::disk('public')->delete($user->avatar);
                    }
                    $user->forceDelete();
                }
                $message = 'Users deleted successfully.';
                break;

            default:
                return response()->json(['success' => false, 'message' => 'Invalid action.'], 400);
        }

        return response()->json(['success' => true, 'message' => $message]);
    }

    public function toggleSubscription($id)
    {
        $user = User::findOrFail($id);
        $user->subscription_active = !$user->subscription_active;
        $user->save();
        return redirect()->back();
    }
}