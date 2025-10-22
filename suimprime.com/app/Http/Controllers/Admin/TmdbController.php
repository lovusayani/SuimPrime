<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TmdbData;
use Illuminate\Support\Facades\Http;

class TmdbController extends Controller
{
    private $apiKey = '55e89e24a03a87fa84d7d96abe40d4dd';
    private $baseUrl = 'https://api.themoviedb.org/3';
    private $imageBaseUrl = 'https://image.tmdb.org/t/p/w500';

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
            // Check if movie already exists
            $existingMovie = TmdbData::where('tmdb_id', $movieId)->first();
            if ($existingMovie) {
                return response()->json([
                    'success' => false,
                    'message' => 'This movie has already been fetched and stored.',
                ], 400);
            }

            // Fetch movie details from TMDB API
            $response = Http::get("{$this->baseUrl}/movie/{$movieId}", [
                'api_key' => $this->apiKey,
                'language' => 'en-US',
            ]);

            if ($response->successful()) {
                $movie = $response->json();

                // Store in database
                $tmdbData = TmdbData::create([
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
                ]);

                return response()->json([
                    'success' => true,
                    'message' => 'Movie data fetched and stored successfully!',
                    'movie' => $tmdbData,
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
