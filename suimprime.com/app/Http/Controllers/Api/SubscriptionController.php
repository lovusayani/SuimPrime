<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubscriptionController extends Controller
{
    /**
     * Select a subscription plan
     */
    public function selectPlan(Request $request)
    {
        $request->validate([
            'plan_id' => 'required|integer',
            'plan_name' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Get authenticated user
        $user = Auth::user();

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not authenticated'
            ], 401);
        }

        // Here you can store the plan selection in your database
        // For example, create a subscription record or update user's plan
        // $subscription = Subscription::create([
        //     'user_id' => $user->id,
        //     'plan_id' => $request->plan_id,
        //     'plan_name' => $request->plan_name,
        //     'price' => $request->price,
        //     'status' => 'pending',
        // ]);

        return response()->json([
            'success' => true,
            'message' => 'Plan selected successfully',
            'data' => [
                'plan_id' => $request->plan_id,
                'plan_name' => $request->plan_name,
                'price' => $request->price,
                'user_id' => $user->id,
            ]
        ]);
    }

    /**
     * Get all subscription plans
     */
    public function getPlans()
    {
        try {
            $plans = Plan::where('status', true)
                ->orderBy('level')
                ->get()
                ->map(function ($plan) {
                    return [
                        'id' => $plan->id,
                        'name' => $plan->name,
                        'price' => $plan->total_price, // Use calculated price after discount
                        'original_price' => $plan->price,
                        'discount' => $plan->discount,
                        'discount_percentage' => $plan->discount_percentage,
                        'duration' => $plan->duration, // Use the duration field directly
                        'duration_type' => $plan->duration_type,
                        'duration_value' => $plan->duration_value,
                        'level' => $plan->level,
                        'description' => $plan->description,
                        'features' => [
                            'casting_enabled' => $plan->plan_limits['casting_enabled'] ?? true,
                            'ads_enabled' => $plan->plan_limits['ads_enabled'] ?? true,
                            'device_limit' => $plan->device_limit_value ?? 1,
                            'download_resolutions' => $plan->download_options ?? [],
                            'supported_devices' => $plan->supported_device_types ?? [],
                            'profile_limit' => $plan->profile_limit_value ?? 1,
                        ]
                    ];
                });

            return response()->json([
                'success' => true,
                'plans' => $plans
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching plans: ' . $e->getMessage(),
                'plans' => []
            ], 500);
        }
    }
}