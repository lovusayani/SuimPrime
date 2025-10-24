<?php

namespace Database\Seeders;

use App\Models\Plan;
use Illuminate\Database\Seeder;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        // Clear existing plans (delete instead of truncate due to foreign keys)
        Plan::where('id', '>', 0)->delete();

        // Create Basic Plan
        Plan::create([
            'name' => 'Basic',
            'price' => 99.00,
            'duration' => '1 week',
            'duration_type' => 'week',
            'duration_value' => 1,
            'level' => 1,
            'discount' => 0,
            'discount_percentage' => 0,
            'status' => true,
            'description' => 'The Basic Plan offers access to a limited selection of content on a weekly basis, perfect for casual viewers.',
            'plan_limits' => [
                'casting_enabled' => true,
                'ads_enabled' => true,
            ],
            'download_options' => ['480P', '720P', '1080P'],
            'supported_device_types' => ['mobile'],
            'device_limit_value' => 1,
            'profile_limit_value' => 2,
        ]);

        // Create Premium Plan
        Plan::create([
            'name' => 'Premium Plan',
            'price' => 199.00,
            'duration' => '1 month',
            'duration_type' => 'month',
            'duration_value' => 1,
            'level' => 2,
            'discount' => 0,
            'discount_percentage' => 0,
            'status' => true,
            'description' => 'The Premium Plan provides monthly access to a wider range of content, including exclusive shows and features.',
            'plan_limits' => [
                'casting_enabled' => true,
                'ads_enabled' => false,
            ],
            'download_options' => ['480P', '720P', '1080P', '1440P'],
            'supported_device_types' => ['tablet', 'mobile'],
            'device_limit_value' => 2,
            'profile_limit_value' => 3,
        ]);

        // Create Ultimate Plan
        Plan::create([
            'name' => 'Ultimate Plan',
            'price' => 299.00,
            'duration' => '3 months',
            'duration_type' => 'month',
            'duration_value' => 3,
            'level' => 3,
            'discount' => 50.00, // ₹50 discount
            'discount_percentage' => 0,
            'status' => true,
            'description' => 'The Ultimate Plan offers quarterly access with additional perks, such as early access to new releases and special content.',
            'plan_limits' => [
                'casting_enabled' => true,
                'ads_enabled' => false,
            ],
            'download_options' => ['480P', '720P', '1080P', '1440P', '2K'],
            'supported_device_types' => ['laptop', 'mobile', 'tv'],
            'device_limit_value' => 5,
            'profile_limit_value' => 3,
        ]);
    }
}