<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CouponController extends Controller
{
    public function index(Request $request): View
    {
        $query = Coupon::query()->with('plans');

        if ($request->filled('column_status')) {
            $query->where('status', (bool) $request->input('column_status'));
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('code', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        $coupons = $query->orderByDesc('created_at')->paginate(20)->withQueryString();

        return view('admin.coupon.index', compact('coupons'));
    }

    public function create(): View
    {
        $plans = Plan::where('status', true)->get();
        return view('admin.coupon.create', compact('plans'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:coupons,code'],
            'description' => ['required', 'string'],
            'discount_type' => ['required', 'in:percentage,fixed'],
            'discount' => ['required', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'expire_date' => ['required', 'date', 'after_or_equal:start_date'],
            'subscription_plan_ids' => ['required', 'array', 'min:1'],
            'subscription_plan_ids.*' => ['exists:plans,id'],
            'status' => ['nullable'],
        ]);

        $coupon = Coupon::create([
            'code' => $validated['code'],
            'description' => $validated['description'],
            'discount_type' => $validated['discount_type'],
            'discount' => $validated['discount'],
            'start_date' => $validated['start_date'],
            'expire_date' => $validated['expire_date'],
            'status' => (bool) $request->input('status', false),
        ]);

        $coupon->plans()->sync($validated['subscription_plan_ids']);

        return redirect()->route('admin.coupon.index')->with('success', 'Coupon created successfully');
    }

    public function edit(Coupon $coupon): View
    {
        $coupon->load('plans');
        $plans = Plan::where('status', true)->get();
        return view('admin.coupon.edit', compact('coupon', 'plans'));
    }

    public function update(Request $request, Coupon $coupon): RedirectResponse
    {
        $validated = $request->validate([
            'code' => ['required', 'string', 'max:255', 'unique:coupons,code,' . $coupon->id],
            'description' => ['required', 'string'],
            'discount_type' => ['required', 'in:percentage,fixed'],
            'discount' => ['required', 'numeric', 'min:0'],
            'start_date' => ['required', 'date'],
            'expire_date' => ['required', 'date', 'after_or_equal:start_date'],
            'subscription_plan_ids' => ['required', 'array', 'min:1'],
            'subscription_plan_ids.*' => ['exists:plans,id'],
            'status' => ['nullable'],
        ]);

        $coupon->update([
            'code' => $validated['code'],
            'description' => $validated['description'],
            'discount_type' => $validated['discount_type'],
            'discount' => $validated['discount'],
            'start_date' => $validated['start_date'],
            'expire_date' => $validated['expire_date'],
            'status' => (bool) $request->input('status', false),
        ]);

        $coupon->plans()->sync($validated['subscription_plan_ids']);

        return redirect()->route('admin.coupon.index')->with('success', 'Coupon updated successfully');
    }

    public function destroy(Request $request, Coupon $coupon)
    {
        $coupon->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleted']);
        }

        return redirect()->route('admin.coupon.index');
    }

    public function updateStatus(Request $request, Coupon $coupon)
    {
        $request->validate(['status' => ['required', 'in:0,1']]);
        $coupon->update(['status' => (bool) $request->input('status')]);
        return response()->json(['success' => true]);
    }

    public function bulkAction(Request $request)
    {
        $validated = $request->validate([
            'action_type' => ['required', 'in:change-status,delete,restore,permanently-delete'],
            'datatable_ids' => ['required', 'array'],
            'datatable_ids.*' => ['integer'],
            'status' => ['nullable', 'in:0,1'],
        ]);

        $ids = $validated['datatable_ids'];
        $action = $validated['action_type'];

        switch ($action) {
            case 'change-status':
                $status = (bool) ($request->input('status'));
                Coupon::withTrashed()->whereIn('id', $ids)->update(['status' => $status]);
                break;
            case 'delete':
                Coupon::whereIn('id', $ids)->delete();
                break;
            case 'restore':
                Coupon::withTrashed()->whereIn('id', $ids)->restore();
                break;
            case 'permanently-delete':
                Coupon::withTrashed()->whereIn('id', $ids)->forceDelete();
                break;
        }

        return response()->json(['success' => true]);
    }
}
