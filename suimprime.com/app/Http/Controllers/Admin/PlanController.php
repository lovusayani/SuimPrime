<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function index(Request $request)
    {
        $query = Plan::query();
        if ($search = $request->get('search')) {
            $query->where('name', 'like', "%{$search}%");
        }
        $plans = $query->orderBy('created_at', 'desc')->paginate(10)->withQueryString();
        return view('admin.plans.index', compact('plans'));
    }

    public function create()
    {
        return view('admin.plans.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:50',
            'duration_type' => 'nullable|string|in:week,month,year',
            'duration_value' => 'nullable|integer|min:1',
            'level' => 'nullable|integer|min:1|max:5',
            'discount' => 'nullable|numeric|min:0',
            'discount_percentage' => 'nullable|numeric|min:0|max:99',
            'status' => 'nullable|boolean',
            'description' => 'nullable|string',
            'limits' => 'nullable|array',
            'download_options' => 'nullable|array',
            'supported_device_types' => 'nullable|array',
            'device_limit_value' => 'nullable|integer|min:0',
            'profile_limit_value' => 'nullable|integer|min:0',
        ]);

        // Process plan limits
        $planLimits = [];
        if (isset($validated['limits'])) {
            foreach ($validated['limits'] as $limit) {
                if (isset($limit['limitation_slug'])) {
                    $planLimits[$limit['limitation_slug']] = [
                        'planlimitation_id' => $limit['planlimitation_id'] ?? null,
                        'value' => $limit['value'] ?? 0
                    ];
                }
            }
        }

        // Build formatted duration
        if ($request->duration_type && $request->duration_value) {
            $validated['duration'] = $request->duration_value . ' ' . $request->duration_type . ($request->duration_value > 1 ? 's' : '');
        }

        // Create plan with all data
        $plan = Plan::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'duration' => $validated['duration'] ?? null,
            'duration_type' => $validated['duration_type'] ?? null,
            'duration_value' => $validated['duration_value'] ?? 1,
            'level' => $validated['level'] ?? 1,
            'discount' => $validated['discount'] ?? 0,
            'discount_percentage' => $validated['discount_percentage'] ?? 0,
            'status' => $request->has('status') ? 1 : 0,
            'description' => $validated['description'] ?? null,
            'plan_limits' => $planLimits,
            'download_options' => $validated['download_options'] ?? null,
            'supported_device_types' => $validated['supported_device_types'] ?? null,
            'device_limit_value' => $validated['device_limit_value'] ?? 0,
            'profile_limit_value' => $validated['profile_limit_value'] ?? 0,
        ]);

        return redirect()->route('admin.plans.index')->with('success', 'Plan created successfully.');
    }

    public function edit(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function update(Request $request, Plan $plan)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'duration' => 'nullable|string|max:50',
            'level' => 'nullable|integer|min:1|max:5',
            'discount' => 'nullable|numeric|min:0',
            'status' => 'nullable|boolean',
        ]);

        $plan->update($validated);

        return redirect()->route('admin.plans.index')->with('success', 'Plan updated successfully.');
    }

    public function updateStatus(Plan $plan)
    {
        $plan->status = !$plan->status;
        $plan->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Status updated successfully.',
        ]);
    }

    public function destroy(Plan $plan)
    {
        $plan->delete();
        return response()->json([
            'status' => 'success',
            'message' => 'Plan deleted successfully.',
        ]);
    }
}
