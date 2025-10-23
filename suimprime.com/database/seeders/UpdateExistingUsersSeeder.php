<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UpdateExistingUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Update existing users with default values for new fields
        DB::table('users')->update([
            'status' => true,
        ]);

        // You can also add specific updates if needed
        // For example, add phone numbers or gender for existing users
    }
}
