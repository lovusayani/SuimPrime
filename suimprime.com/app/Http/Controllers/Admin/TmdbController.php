<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TmdbData;
use App\Models\Genre;
use App\Models\Director;
use App\Models\Actor;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class TmdbController extends Controller
{
    private $apiKey = '55e89e24a03a87fa84d7d96abe40d4dd';
    private $baseUrl = 'https://api.themoviedb.org/3';
    private $imageBaseUrl = 'https://image.tmdb.org/t/p/w500';

        /**
         * Download and store image from TMDB to temp_uploads folder
         */
        private function downloadAndStoreImage($imagePath, $folder = 'temp_uploads', $defaultImage = null)
        {
            if (!$imagePath) {
                return $defaultImage ?? '/assets/dummy-images/no-image.jpg';
            }

            try {
                // Build the full TMDB image URL
                $imageUrl = $this->imageBaseUrl . $imagePath;
                
                // Download the image
                $response = Http::timeout(30)->get($imageUrl);
                
                if (!$response->successful()) {
                    Log::error("Failed to download image from TMDB: " . $imageUrl);
                    return $defaultImage ?? '/assets/dummy-images/no-image.jpg';
                }
                
                $imageContent = $response->body();
            
                if (empty($imageContent)) {
                    Log::error("Empty image content from TMDB: " . $imageUrl);
                    return $defaultImage ?? '/assets/dummy-images/no-image.jpg';
                }

                // Get filename and prepare storage path (without 'public/' prefix since we're using the public disk)
                $filename = basename($imagePath);
                $storagePath = "{$folder}/" . $filename;
            
                // Store the image using the public disk explicitly
                $stored = Storage::disk('public')->put($storagePath, $imageContent);
                
                if (!$stored) {
                    Log::error("Failed to store image: " . $storagePath);
                    return $defaultImage ?? '/assets/dummy-images/no-image.jpg';
                }
                
                Log::info("Image stored successfully on public disk: " . $storagePath);
            
                // Return the full URL path that matches your form structure
                return url("/storage/{$folder}/" . $filename);
            } catch (\Exception $e) {
                Log::error("Exception in downloadAndStoreImage: " . $e->getMessage());
                return $defaultImage ?? '/assets/dummy-images/no-image.jpg';
            }
        }

        /**
         * Map TMDB country ISO codes to your database country IDs
         * Adjust these IDs based on your actual countries table/options
         */
        private function getCountryMapping()
        {
            return [
                'US' => 1,   // United States
                'GB' => 2,   // United Kingdom
                'FR' => 3,   // France
                'DE' => 4,   // Germany
                'ES' => 5,   // Spain
                'CA' => 6,   // Canada
                'AU' => 7,   // Australia
                'JP' => 8,   // Japan
                'CN' => 9,   // China
                'KR' => 10,  // South Korea
                'IN' => 101, // India
                'ID' => 102, // Indonesia
                'IR' => 103, // Iran
                'IQ' => 104, // Iraq
                'IE' => 105, // Ireland
                'IL' => 106, // Israel
                'IT' => 107, // Italy
                'BR' => 108, // Brazil
                'MX' => 109, // Mexico
                'RU' => 110, // Russia
                'AR' => 111, // Argentina
                'ZA' => 112, // South Africa
                'NZ' => 113, // New Zealand
                'SE' => 114, // Sweden
                'NO' => 115, // Norway
                'DK' => 116, // Denmark
                'FI' => 117, // Finland
                'NL' => 118, // Netherlands
                'BE' => 119, // Belgium
                'CH' => 120, // Switzerland
                'AT' => 121, // Austria
                'PL' => 122, // Poland
                'CZ' => 123, // Czech Republic
                'HU' => 124, // Hungary
                'GR' => 125, // Greece
                'PT' => 126, // Portugal
                'TR' => 127, // Turkey
                'EG' => 128, // Egypt
                'SA' => 129, // Saudi Arabia
                'AE' => 130, // UAE
                'TH' => 131, // Thailand
                'MY' => 132, // Malaysia
                'SG' => 133, // Singapore
                'PH' => 134, // Philippines
                'VN' => 135, // Vietnam
                'PK' => 136, // Pakistan
                'BD' => 137, // Bangladesh
                'LK' => 138, // Sri Lanka
                'NP' => 139, // Nepal
                'HK' => 140, // Hong Kong
                'TW' => 141, // Taiwan
            ];
        }

    public function index()
    {
        $fetchedMovies = TmdbData::orderBy('created_at', 'desc')->paginate(20);
        return view('admin.tmdb', compact('fetchedMovies'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|integer',
        ]);

        $movieId = $request->input('movie_id');

        try {
            // Search for movie by ID
            $response = Http::get("{$this->baseUrl}/movie/{$movieId}", [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

            if ($response->successful()) {
                $movie = $response->json();
                
                // Format the data for display
                $formattedMovie = [
                    'id' => $movie['id'],
                    'title' => $movie['title'],
                    'release_date' => $movie['release_date'] ?? 'N/A',
                    'poster_path' => $movie['poster_path'] ? $this->imageBaseUrl . $movie['poster_path'] : null,
                    'genres' => collect($movie['genres'] ?? [])->pluck('name')->implode(', '),
                    'countries' => collect($movie['production_countries'] ?? [])->pluck('name')->implode(', '),
                    'overview' => $movie['overview'] ?? 'N/A',
                    'vote_average' => $movie['vote_average'] ?? 0,
                    'raw_data' => $movie, // Keep raw data for fetching
                ];

                return response()->json([
                    'success' => true,
                    'movie' => $formattedMovie,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'Movie not found or invalid Movie ID.',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching movie data: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function fetch(Request $request)
    {
        $request->validate([
            'movie_id' => 'required|integer',
        ]);

        $movieId = $request->input('movie_id');

        try {
            // Fetch movie details from TMDB API
            $response = Http::get("{$this->baseUrl}/movie/{$movieId}", [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

            if (!$response->successful()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Movie not found or invalid Movie ID.',
                ], 404);
            }

            $movie = $response->json();

            // Fetch movie credits (cast and crew)
            $creditsResponse = Http::get("{$this->baseUrl}/movie/{$movieId}/credits", [
                'api_key' => $this->apiKey,
            ]);

            $credits = $creditsResponse->successful() ? $creditsResponse->json() : ['cast' => [], 'crew' => []];

            // Fetch videos (trailers)
            $videosResponse = Http::get("{$this->baseUrl}/movie/{$movieId}/videos", [
                'api_key' => $this->apiKey,
            ]);
            $videos = $videosResponse->successful() ? $videosResponse->json()['results'] ?? [] : [];
            
            // Find official YouTube trailer
            $trailerData = collect($videos)->filter(function($video) {
                return $video['site'] === 'YouTube' 
                    && ($video['type'] === 'Trailer' || $video['type'] === 'Teaser')
                    && $video['official'] === true;
            })->sortByDesc('size')->first();
            
            // Fallback to any YouTube trailer
            if (!$trailerData) {
                $trailerData = collect($videos)->filter(function($video) {
                    return $video['site'] === 'YouTube' && $video['type'] === 'Trailer';
                })->first();
            }

            // Process Genres
            $genreIds = [];
            if (isset($movie['genres']) && is_array($movie['genres'])) {
                foreach ($movie['genres'] as $genreData) {
                        // Try to find existing genre
                        $genre = Genre::where('name', $genreData['name'])->first();
                    
                        if (!$genre) {
                            // Create new genre with default thumbnail
                            $genre = Genre::create([
                                'name' => $genreData['name'],
                                'description' => 'Auto-imported from TMDB',
                                'thumbnail' => '/assets/dummy-images/no-image.jpg',
                                'status' => 1,
                            ]);
                        }
                    
                    $genreIds[] = $genre->id;
                }
            }

            // Process Directors
            $directorIds = [];
            if (isset($credits['crew']) && is_array($credits['crew'])) {
                $directors = collect($credits['crew'])->filter(function ($crew) {
                    return $crew['job'] === 'Director';
                });

                foreach ($directors as $directorData) {
                        // Try to find existing director
                        $director = Director::where('name', $directorData['name'])->first();
                    
                        if (!$director) {
                            // Download and store director profile image
                            $thumbnailPath = $this->downloadAndStoreImage(
                                $directorData['profile_path'] ?? null,
                                'media'
                            );
                        
                            // Create new director
                            $director = Director::create([
                                'name' => $directorData['name'],
                                'slug' => Str::slug($directorData['name']),
                                'designation' => 'Director',
                                'thumbnail' => $thumbnailPath,
                                'bio' => 'Auto-imported from TMDB',
                                'status' => 1,
                            ]);
                        } elseif (!$director->thumbnail || $director->thumbnail === '/assets/dummy-images/no-image.jpg') {
                            // Update existing director's thumbnail if missing
                            $thumbnailPath = $this->downloadAndStoreImage(
                                $directorData['profile_path'] ?? null,
                                'media'
                            );
                            $director->update(['thumbnail' => $thumbnailPath]);
                        }
                    
                    $directorIds[] = $director->id;
                }
            }

            // Process Actors (Top 10 cast members)
            $actorIds = [];
            if (isset($credits['cast']) && is_array($credits['cast'])) {
                $topCast = collect($credits['cast'])->take(10);

                foreach ($topCast as $castData) {
                        // Try to find existing actor
                        $actor = Actor::where('name', $castData['name'])->first();
                    
                        if (!$actor) {
                            // Download and store actor profile image
                            $thumbnailPath = $this->downloadAndStoreImage(
                                $castData['profile_path'] ?? null,
                                'media'
                            );
                        
                            // Create new actor
                            $actor = Actor::create([
                                'name' => $castData['name'],
                                'slug' => Str::slug($castData['name']),
                                'designation' => $castData['character'] ?? 'Actor',
                                'thumbnail' => $thumbnailPath,
                                'bio' => 'Auto-imported from TMDB',
                                'status' => 1,
                            ]);
                        } elseif (!$actor->thumbnail || $actor->thumbnail === '/assets/dummy-images/no-image.jpg') {
                            // Update existing actor's thumbnail if missing
                            $thumbnailPath = $this->downloadAndStoreImage(
                                $castData['profile_path'] ?? null,
                                'media'
                            );
                            $actor->update(['thumbnail' => $thumbnailPath]);
                        }
                    
                    $actorIds[] = $actor->id;
                }
            }

            // Prepare local image paths for client-side prefill (store in temp_uploads)
            Log::info("Starting image download for movie: " . $movie['title']);
            Log::info("Poster path: " . ($movie['poster_path'] ?? 'null'));
            Log::info("Backdrop path: " . ($movie['backdrop_path'] ?? 'null'));
            
            $thumbnailPath = $this->downloadAndStoreImage($movie['poster_path'] ?? null, 'temp_uploads');
            $posterPath = $thumbnailPath; // reuse same
            $posterTvPath = $this->downloadAndStoreImage($movie['backdrop_path'] ?? null, 'temp_uploads');
            
            Log::info("Downloaded images - Thumbnail: " . $thumbnailPath . ", Poster TV: " . $posterTvPath);

            // Map country codes to IDs using the mapping method
            $countryMap = $this->getCountryMapping();
            $countryIds = [];
            if (isset($movie['production_countries']) && is_array($movie['production_countries'])) {
                foreach ($movie['production_countries'] as $country) {
                    $code = $country['iso_3166_1'] ?? '';
                    if (isset($countryMap[$code])) {
                        $countryIds[] = $countryMap[$code];
                    }
                }
            }

            // Prepare trailer data
            $trailerInfo = null;
            if ($trailerData) {
                $trailerInfo = [
                    'type' => 'YouTube',
                    'key' => $trailerData['key'] ?? null,
                    'url' => $trailerData['key'] ? 'https://www.youtube.com/watch?v=' . $trailerData['key'] : null,
                    'name' => $trailerData['name'] ?? 'Official Trailer',
                ];
            }

            return response()->json([
                'success' => true,
                'message' => 'Movie data fetched successfully!',
                'movie' => [
                    'tmdb_id' => $movie['id'],
                    'title' => $movie['title'],
                    'overview' => $movie['overview'] ?? null,
                    'poster_path' => $movie['poster_path'] ?? null,
                    'backdrop_path' => $movie['backdrop_path'] ?? null,
                    'release_date' => $movie['release_date'] ?? null,
                    'original_language' => $movie['original_language'] ?? null,
                    'vote_average' => $movie['vote_average'] ?? 0,
                    'vote_count' => $movie['vote_count'] ?? 0,
                    'runtime' => $movie['runtime'] ?? null,
                    'genres' => $movie['genres'] ?? [],
                    'production_countries' => $movie['production_countries'] ?? [],
                    'status' => $movie['status'] ?? null,
                    'budget' => $movie['budget'] ?? null,
                    'revenue' => $movie['revenue'] ?? null,
                    'imdb_id' => $movie['imdb_id'] ?? null,
                    'tagline' => $movie['tagline'] ?? null,
                    'popularity' => $movie['popularity'] ?? null,
                    'adult' => $movie['adult'] ?? false,
                ],
                'related_data' => [
                    'genre_ids' => $genreIds,
                    'director_ids' => $directorIds,
                    'actor_ids' => $actorIds,
                    'country_ids' => $countryIds,
                ],
                'image_paths' => [
                    'thumbnail' => $thumbnailPath,
                    'poster' => $posterPath,
                    'poster_tv' => $posterTvPath,
                ],
                'trailer' => $trailerInfo,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error storing movie data: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $movie = TmdbData::findOrFail($id);
            $movie->delete();

            return response()->json([
                'success' => true,
                'message' => 'Movie deleted successfully!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting movie: ' . $e->getMessage(),
            ], 500);
        }
    }

    public function filter(Request $request)
    {
        $type = $request->input('type', 'popular');
        $year = $request->input('year');
        $date = $request->input('date');
        $language = $request->input('language', 'en');

        $endpoint = "/discover/movie";
        $params = [
            'api_key' => $this->apiKey,
            'language' => $language,
            'sort_by' => $type === 'popular' ? 'popularity.desc' : ($type === 'top_rated' ? 'vote_average.desc' : ($type === 'upcoming' ? 'release_date.asc' : 'now_playing.desc')),
            'page' => 1,
        ];
        if ($year) {
            $params['year'] = $year;
        }
        if ($date) {
            $params['primary_release_date.gte'] = $date;
        }

        try {
            $response = Http::get($this->baseUrl . $endpoint, $params);
            if ($response->successful()) {
                $results = $response->json('results') ?? [];
                $movies = collect($results)->map(function($movie) {
                    return [
                        'id' => $movie['id'],
                        'title' => $movie['title'] ?? '',
                        'release_date' => $movie['release_date'] ?? 'N/A',
                        'poster_path' => $movie['poster_path'] ? 'https://image.tmdb.org/t/p/w92' . $movie['poster_path'] : null,
                        'genres' => isset($movie['genre_ids']) ? implode(', ', $movie['genre_ids']) : '', // genre names can be mapped if needed
                        'countries' => '', // Not available in list endpoint
                    ];
                })->toArray();
                return response()->json([
                    'success' => true,
                    'movies' => $movies,
                ]);
            } else {
                return response()->json([
                    'success' => false,
                    'message' => 'No movies found for the selected filter.',
                ], 404);
            }
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching movie list: ' . $e->getMessage(),
            ], 500);
        }
    }
}