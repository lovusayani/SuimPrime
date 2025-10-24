<?php

namespace Database\Seeders;

use App\Models\VastAd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class VastAdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $startDate = Carbon::now();
        $endDate = Carbon::now()->addYear();

        $vastAds = [
            // Movie targets
            [
                'name' => 'BigSale',
                'type' => 'pre-roll',
                'url' => 'https://example.com/ads/bigsale.xml',
                'target_type' => 'movie',
                'target_selection' => [1, 2, 3],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'MovieTicket',
                'type' => 'mid-roll',
                'url' => 'https://example.com/ads/movieticket.xml',
                'target_type' => 'movie',
                'target_selection' => [1, 2],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'EpisodePromo',
                'type' => 'post-roll',
                'url' => 'https://example.com/ads/episodepromo.xml',
                'target_type' => 'movie',
                'target_selection' => [1],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'ServicePromo',
                'type' => 'overlay',
                'url' => 'https://example.com/ads/servicepromo.xml',
                'target_type' => 'movie',
                'target_selection' => [2, 3],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],

            // Video targets
            [
                'name' => 'BigSale',
                'type' => 'pre-roll',
                'url' => 'https://example.com/ads/bigsale-video.xml',
                'target_type' => 'video',
                'target_selection' => [1],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'MovieTicket',
                'type' => 'mid-roll',
                'url' => 'https://example.com/ads/movieticket-video.xml',
                'target_type' => 'video',
                'target_selection' => [1, 2],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'EpisodePromo',
                'type' => 'post-roll',
                'url' => 'https://example.com/ads/episodepromo-video.xml',
                'target_type' => 'video',
                'target_selection' => [1],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'ServicePromo',
                'type' => 'overlay',
                'url' => 'https://example.com/ads/servicepromo-video.xml',
                'target_type' => 'video',
                'target_selection' => [2],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],

            // TV Show targets
            [
                'name' => 'BigSale',
                'type' => 'pre-roll',
                'url' => 'https://example.com/ads/bigsale-tv.xml',
                'target_type' => 'tvshow',
                'target_selection' => [1, 2, 3],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'MovieTicket',
                'type' => 'mid-roll',
                'url' => 'https://example.com/ads/movieticket-tv.xml',
                'target_type' => 'tvshow',
                'target_selection' => [1, 2],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
            [
                'name' => 'EpisodePromo',
                'type' => 'post-roll',
                'url' => 'https://example.com/ads/episodepromo-tv.xml',
                'target_type' => 'tvshow',
                'target_selection' => [1, 2, 3, 4, 5],
                'start_date' => $startDate,
                'end_date' => $endDate,
                'status' => 1,
            ],
        ];

        foreach ($vastAds as $vastAd) {
            VastAd::create($vastAd);
        }
    }
}