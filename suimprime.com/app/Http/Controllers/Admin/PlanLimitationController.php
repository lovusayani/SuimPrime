<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlanLimitation;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PlanLimitationController extends Controller
{
    public function index(Request $request): View
    {
        $query = PlanLimitation::query()->orderBy('id');

        if ($request->filled('column_status')) {
            $status = $request->boolean('column_status', null);
            if ($request->input('column_status') !== '') {
                $query->where('status', (bool) $request->input('column_status'));
            }
        }

        if ($search = $request->string('search')->toString()) {
            $query->where('title', 'like', "%{$search}%");
        }

        $items = $query->paginate(20)->withQueryString();

        return view('admin.planlimitation.index', compact('items'));
    }

    public function edit(PlanLimitation $planlimitation): View
    {
        return view('admin.planlimitation.edit', compact('planlimitation'));
    }

    public function update(Request $request, PlanLimitation $planlimitation): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'status' => ['nullable'],
        ]);

        $planlimitation->update([
            'title' => $validated['title'],
            'description' => $validated['description'],
            'status' => (bool) $request->input('status', false),
        ]);

        return redirect()->route('admin.planlimitation.index')->with('success', 'Plan limitation updated');
    }

    public function destroy(Request $request, PlanLimitation $planlimitation)
    {
        $planlimitation->delete();

        if ($request->wantsJson()) {
            return response()->json(['message' => 'Deleted']);
        }

        return redirect()->route('admin.planlimitation.index');
    }

    public function updateStatus(Request $request, PlanLimitation $planlimitation)
    {
        $request->validate([
            'status' => ['required', 'in:0,1'],
        ]);

        $planlimitation->update(['status' => (bool) $request->input('status')]);

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
                PlanLimitation::withTrashed()->whereIn('id', $ids)->update(['status' => $status]);
                break;
            case 'delete':
                PlanLimitation::whereIn('id', $ids)->delete();
                break;
            case 'restore':
                PlanLimitation::withTrashed()->whereIn('id', $ids)->restore();
                break;
            case 'permanently-delete':
                PlanLimitation::withTrashed()->whereIn('id', $ids)->forceDelete();
                break;
        }

        return response()->json(['success' => true]);
    }
}
