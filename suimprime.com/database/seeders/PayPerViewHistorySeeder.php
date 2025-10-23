<?php

namespace Database\Seeders;

use App\Models\PayPerViewHistory;
use App\Models\User;
use App\Models\Movie;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PayPerViewHistorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get or create sample users
        $user1 = User::firstOrCreate(
            ['email' => 'john.doe@example.com'],
            ['name' => 'John Doe', 'password' => bcrypt('password')]
        );

        $user2 = User::firstOrCreate(
            ['email' => 'jane.smith@example.com'],
            ['name' => 'Jane Smith', 'password' => bcrypt('password')]
        );

        // Get first available movie or create a sample placeholder
        $movie = Movie::first();
        if (!$movie) {
            $movie = Movie::create([
                'title' => 'Sample Movie for PPV',
                'description' => 'Demo movie for testing pay-per-view history',
                'status' => 1,
            ]);
        }

        // Create sample PPV history records
        $samples = [
            [
                'user_id' => $user1->id,
                'content_type' => Movie::class,
                'content_id' => $movie->id,
                'duration' => '48 hours',
                'payment_method' => 'Credit Card',
                'start_at' => Carbon::now()->subDays(5),
                'end_at' => Carbon::now()->subDays(3),
                'price' => 9.99,
                'discount' => 1.00,
                'total_amount' => 8.99,
            ],
            [
                'user_id' => $user2->id,
                'content_type' => Movie::class,
                'content_id' => $movie->id,
                'duration' => '24 hours',
                'payment_method' => 'PayPal',
                'start_at' => Carbon::now()->subDays(2),
                'end_at' => Carbon::now()->subDays(1),
                'price' => 4.99,
                'discount' => 0.00,
                'total_amount' => 4.99,
            ],
            [
                'user_id' => $user1->id,
                'content_type' => Movie::class,
                'content_id' => $movie->id,
                'duration' => '72 hours',
                'payment_method' => 'Stripe',
                'start_at' => Carbon::now()->subDays(10),
                'end_at' => Carbon::now()->subDays(7),
                'price' => 14.99,
                'discount' => 2.50,
                'total_amount' => 12.49,
            ],
            [
                'user_id' => $user2->id,
                'content_type' => Movie::class,
                'content_id' => $movie->id,
                'duration' => '24 hours',
                'payment_method' => 'Credit Card',
                'start_at' => Carbon::now()->subHours(6),
                'end_at' => Carbon::now()->addHours(18),
                'price' => 5.99,
                'discount' => 0.50,
                'total_amount' => 5.49,
            ],
        ];

        foreach ($samples as $data) {
            PayPerViewHistory::create($data);
        }

        $this->command->info('Sample Pay Per View History records created.');
    }
}