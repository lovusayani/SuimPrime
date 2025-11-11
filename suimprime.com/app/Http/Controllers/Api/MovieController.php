<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display the specified movie.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $movie = Movie::with(['genres', 'actors', 'directors'])
                ->find($id);

            if (!$movie) {
                return response()->json([
                    'success' => false,
                    'message' => 'Movie not found'
                ], 404);
            }

            // Prepare movie data
            $movieData = [
                'id' => $movie->id,
                'title' => $movie->title,
                'description' => strip_tags($movie->description), // Remove HTML tags
                'year' => $movie->release_date ? date('Y', strtotime($movie->release_date)) : null,
                'duration' => $movie->duration,
                'rating' => $movie->rating,
                'poster_url' => $movie->poster_url,
                'thumbnail_url' => $movie->thumbnail_url,
                'youtube_url' => $movie->video_url, // Assuming this contains YouTube URL
                'video_upload_type' => $movie->video_upload_type,
                'is_premium' => $movie->is_premium ?? false,
                'genres' => $movie->genres ? $movie->genres->map(function ($genre) {
                    return [
                        'id' => $genre->id,
                        'name' => $genre->name
                    ];
                }) : [],
                'actors' => $movie->actors ? $movie->actors->map(function ($actor) {
                    return [
                        'id' => $actor->id,
                        'name' => $actor->name
                    ];
                }) : [],
                'directors' => $movie->directors ? $movie->directors->map(function ($director) {
                    return [
                        'id' => $director->id,
                        'name' => $director->name
                    ];
                }) : [],
                'created_at' => $movie->created_at,
                'updated_at' => $movie->updated_at,
            ];

            return response()->json([
                'success' => true,
                'data' => $movieData
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching movie details: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get movies by section (for home page carousels)
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $section
     * @return \Illuminate\Http\Response
     */
    public function getMoviesBySection(Request $request, $section)
    {
        try {
            $limit = $request->get('limit', 12);
            
            $query = Movie::with(['genres']);

            switch ($section) {
                case 'featured':
                case 'recommended':
                    $query->where('is_featured', true);
                    break;
                    
                case 'popular':
                    $query->orderBy('views', 'desc');
                    break;
                    
                case 'latest':
                case 'recently-added':
                    $query->orderBy('created_at', 'desc');
                    break;
                    
                case 'top-rated':
                    $query->orderBy('rating', 'desc');
                    break;
                    
                default:
                    $query->orderBy('created_at', 'desc');
                    break;
            }

            $movies = $query->take($limit)->get();

            $moviesData = $movies->map(function ($movie) {
                return [
                    'id' => $movie->id,
                    'title' => $movie->title,
                    'description' => strip_tags($movie->description),
                    'poster_url' => $movie->poster_url,
                    'thumbnail_url' => $movie->thumbnail_url,
                    'year' => $movie->release_date ? date('Y', strtotime($movie->release_date)) : null,
                    'rating' => $movie->rating,
                    'video_upload_type' => $movie->video_upload_type,
                    'genres' => $movie->genres ? $movie->genres->map(function ($genre) {
                        return ['id' => $genre->id, 'name' => $genre->name];
                    }) : []
                ];
            });

            return response()->json([
                'success' => true,
                'movies' => $moviesData
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching movies: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get actors of a specific movie
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getActors($id)
    {
        try {
            $movie = Movie::with(['actors'])->find($id);

            if (!$movie) {
                return response()->json([
                    'success' => false,
                    'message' => 'Movie not found'
                ], 404);
            }

            $actorsData = $movie->actors ? $movie->actors->map(function ($actor) {
                return [
                    'id' => $actor->id,
                    'name' => $actor->name,
                    'image_url' => $actor->thumbnail ?? null,
                    'designation' => $actor->designation ?? null,
                    'bio' => $actor->bio ?? null
                ];
            }) : [];

            return response()->json([
                'success' => true,
                'data' => $actorsData
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching actors: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get directors of a specific movie
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getDirectors($id)
    {
        try {
            $movie = Movie::with(['directors'])->find($id);

            if (!$movie) {
                return response()->json([
                    'success' => false,
                    'message' => 'Movie not found'
                ], 404);
            }

            $directorsData = $movie->directors ? $movie->directors->map(function ($director) {
                return [
                    'id' => $director->id,
                    'name' => $director->name,
                    'image_url' => $director->thumbnail ?? null,
                    'designation' => $director->designation ?? null,
                    'bio' => $director->bio ?? null
                ];
            }) : [];

            return response()->json([
                'success' => true,
                'data' => $directorsData
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching directors: ' . $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get movies filtered by genres
     * Query parameters:
     * - genres: comma-separated genre IDs (required)
     * - limit: number of movies to return (default: 10)
     * - exclude: movie ID to exclude from results (optional)
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getByGenres(Request $request)
    {
        try {
            $request->validate([
                'genres' => 'required|string',
                'limit' => 'nullable|integer|min:1|max:100',
                'exclude' => 'nullable|integer'
            ]);

            $genreIds = explode(',', $request->get('genres'));
            $limit = $request->get('limit', 10);
            $exclude = $request->get('exclude');

            // Get movies that have any of the specified genres
            $query = Movie::with(['genres'])
                ->whereHas('genres', function ($q) use ($genreIds) {
                    $q->whereIn('genre_id', $genreIds);
                })
                ->where('status', true) // Only active movies
                ->distinct();

            // Exclude specific movie if provided
            if ($exclude) {
                $query->where('id', '!=', $exclude);
            }

            $movies = $query->orderBy('created_at', 'desc')->take($limit)->get();

            $moviesData = $movies->map(function ($movie) {
                return [
                    'id' => $movie->id,
                    'title' => $movie->title,
                    'description' => strip_tags($movie->description),
                    'poster_url' => $movie->poster_url,
                    'thumbnail_url' => $movie->thumbnail_url,
                    'year' => $movie->release_date ? date('Y', strtotime($movie->release_date)) : null,
                    'rating' => $movie->rating,
                    'is_premium' => $movie->is_premium ?? false,
                    'video_upload_type' => $movie->video_upload_type,
                    'genres' => $movie->genres ? $movie->genres->map(function ($genre) {
                        return ['id' => $genre->id, 'name' => $genre->name];
                    }) : []
                ];
            });

            return response()->json([
                'success' => true,
                'data' => $moviesData
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error fetching movies by genre: ' . $e->getMessage()
            ], 500);
        }
    }
}