<?php

namespace Database\Seeders;

use App\Models\PlanLimitation;
use Illuminate\Database\Seeder;

class PlanLimitationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaults = [
            ['title' => 'Video Cast', 'description' => 'Enable casting video to compatible screens.'],
            ['title' => 'Ads', 'description' => 'Show advertisements within content.'],
            ['title' => 'Device Limit', 'description' => 'Limit the number of devices per plan.'],
            ['title' => 'Download Status', 'description' => 'Allow or restrict content download.'],
            ['title' => 'Supported Device Type', 'description' => 'Specify supported device types.'],
            ['title' => 'Profile Limit', 'description' => 'Limit the number of user profiles.'],
        ];

        foreach ($defaults as $data) {
            PlanLimitation::withTrashed()->updateOrCreate(
                ['title' => $data['title']],
                ['description' => $data['description'], 'status' => true]
            );
        }
    }
}
