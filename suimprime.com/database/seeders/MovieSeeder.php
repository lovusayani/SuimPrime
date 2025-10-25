<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $movies = [
            [
                'title' => 'The Dark Knight',
                'description' => 'When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.',
                'release_date' => '2008-07-18',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=EXeTwQWrcwY',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Inception',
                'description' => 'A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.',
                'release_date' => '2010-07-16',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=YoHD9XEInc0',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Interstellar',
                'description' => 'A team of explorers travel through a wormhole in space in an attempt to ensure humanity\'s survival.',
                'release_date' => '2014-11-07',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=zSWdZVtXT7E',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
            [
                'title' => 'The Matrix',
                'description' => 'A computer programmer is led to fight an underground war against powerful computers who have constructed his entire reality with a system called the Matrix.',
                'release_date' => '1999-03-31',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=vKQi3bBA1y8',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Avengers: Endgame',
                'description' => 'After the devastating events of Infinity War, the Avengers assemble once more to reverse Thanos\' actions and restore balance to the universe.',
                'release_date' => '2019-04-26',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=TcMBFSGVi1c',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Parasite',
                'description' => 'Greed and class discrimination threaten the newly formed symbiotic relationship between the wealthy Park family and the destitute Kim clan.',
                'release_date' => '2019-05-30',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=5xH0HfJHsaY',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Joker',
                'description' => 'In Gotham City, mentally troubled comedian Arthur Fleck is disregarded and mistreated by society. He then embarks on a downward spiral of revolution and bloody crime.',
                'release_date' => '2019-10-04',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=zAGVQLHvwOY',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
            [
                'title' => 'Spider-Man: Into the Spider-Verse',
                'description' => 'Teen Miles Morales becomes the Spider-Man of his universe and must join with five spider-powered individuals from other dimensions to stop a threat for all realities.',
                'release_date' => '2018-12-14',
                'video_upload_type' => 'YouTube',
                'video_url' => 'https://www.youtube.com/watch?v=tg52up16eq0',
                'enable_quality' => 1,
                'enable_subtitle' => 1,
                'status' => 1,
            ],
        ];

        foreach ($movies as $movie) {
            Movie::create($movie);
        }
    }
}
