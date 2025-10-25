<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\UserViewingHistory;
use App\Models\UserWatchlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class HomeController extends Controller
{
    /**
     * Get home page data including recommended movies and continue watching
     */
    public function getHomeData(Request $request)
    {
        try {
            $user = Auth::user();
            
            // Get Continue Watching (movies with viewing progress)
            $continueWatching = [];
            if ($user) {
                $continueWatching = UserViewingHistory::with(['movie' => function($query) {
                    $query->select('id', 'title', 'description', 'video_upload_type', 'video_url', 'release_date');
                }])
                ->where('user_id', $user->id)
                ->continueWatching()
                ->limit(8)
                ->get()
                ->map(function($history) {
                    $movie = $history->movie;
                    $movie->watch_progress = $history->progress_percentage;
                    $movie->watch_time = $history->watch_time;
                    $movie->last_watched_at = $history->last_watched_at;
                    return $movie;
                });
            }

            // Get recommended movies (latest movies as recommendation)
            $recommended = Movie::where('status', 1)
                ->select('id', 'title', 'description', 'video_upload_type', 'video_url', 'release_date')
                ->orderBy('created_at', 'desc')
                ->limit(12)
                ->get();

            // Get recommended movies (featured movies or popular ones)
            // Skip the old code and use the new corrected version below
            
            // Get user's watchlist if authenticated  
            $watchlist = [];
            if ($user) {
                $watchlist = UserWatchlist::with(['movie' => function($query) {
                    $query->select('movies.id', 'movies.title', 'movies.description', 'movies.video_upload_type', 'movies.video_url', 'movies.release_date');
                }])
                ->where('user_id', $user->id)
                ->get()
                ->pluck('movie');
            }

                        // Get Watchlist
            $watchlist = [];
            if ($user) {
                $watchlist = UserWatchlist::with(['movie' => function($query) {
                    $query->select('movies.id', 'movies.title', 'movies.description', 'movies.video_upload_type', 'movies.video_url', 'movies.release_date');
                }])
                ->where('user_id', $user->id)
                ->get()
                ->pluck('movie');
            }

            // Get Recently Added
            $recentlyAdded = Movie::where('status', 1)
                ->select('id', 'title', 'description', 'video_upload_type', 'video_url', 'release_date', 'created_at')
                ->orderBy('created_at', 'desc')
                ->limit(12)
                ->get();

            return response()->json([
                'success' => true,
                'data' => [
                    'continue_watching' => $continueWatching,
                    'recommended' => $recommended,
                    'watchlist' => $watchlist,
                    'recently_added' => $recentlyAdded,
                    'user' => $user ? [
                        'id' => $user->id,
                        'name' => $user->name,
                        'email' => $user->email,
                    ] : null
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to fetch home data', [
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch home data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Get movies for a specific section
     */
    public function getMoviesBySection(Request $request, $section)
    {
        try {
            $user = Auth::user();
            $limit = $request->get('limit', 12);
            
            switch ($section) {
                case 'continue-watching':
                    if (!$user) {
                        return response()->json(['success' => false, 'message' => 'Authentication required'], 401);
                    }
                    
                    $movies = UserViewingHistory::with(['movie' => function($query) {
                        $query->select('id', 'title', 'description', 'video_upload_type', 'video_url', 'release_date');
                    }])
                    ->where('user_id', $user->id)
                    ->continueWatching()
                    ->limit($limit)
                    ->get()
                    ->map(function($history) {
                        $movie = $history->movie;
                        $movie->watch_progress = $history->progress_percentage;
                        $movie->watch_time = $history->watch_time;
                        return $movie;
                    });
                    break;

                case 'recommended':
                    $movies = Movie::where('status', 1)
                        ->select('id', 'title', 'description', 'video_upload_type', 'video_url', 'release_date')
                        ->orderBy('created_at', 'desc')
                        ->limit($limit)
                        ->get();
                    break;

                case 'watchlist':
                    if (!$user) {
                        return response()->json(['success' => false, 'message' => 'Authentication required'], 401);
                    }
                    
                    $movies = $user->watchlistMovies()
                        ->select('movies.id', 'movies.title', 'movies.description', 'movies.video_upload_type', 'movies.video_url', 'movies.release_date')
                        ->limit($limit)
                        ->get();
                    break;

                case 'recently-added':
                    $movies = Movie::where('status', 1)
                        ->select('id', 'title', 'description', 'video_upload_type', 'video_url', 'release_date', 'created_at')
                        ->orderBy('created_at', 'desc')
                        ->limit($limit)
                        ->get();
                    break;

                default:
                    return response()->json(['success' => false, 'message' => 'Invalid section'], 400);
            }

            return response()->json([
                'success' => true,
                'section' => $section,
                'movies' => $movies
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to fetch movies by section', [
                'section' => $section,
                'user_id' => Auth::id(),
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to fetch movies',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Add movie to watchlist
     */
    public function addToWatchlist(Request $request)
    {
        try {
            $request->validate([
                'movie_id' => 'required|exists:movies,id'
            ]);

            $user = Auth::user();
            
            $watchlistItem = UserWatchlist::firstOrCreate([
                'user_id' => $user->id,
                'movie_id' => $request->movie_id
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Movie added to watchlist',
                'data' => $watchlistItem
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to add movie to watchlist', [
                'user_id' => Auth::id(),
                'movie_id' => $request->movie_id ?? null,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to add movie to watchlist',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Remove movie from watchlist
     */
    public function removeFromWatchlist(Request $request)
    {
        try {
            $request->validate([
                'movie_id' => 'required|exists:movies,id'
            ]);

            $user = Auth::user();
            
            UserWatchlist::where('user_id', $user->id)
                ->where('movie_id', $request->movie_id)
                ->delete();

            return response()->json([
                'success' => true,
                'message' => 'Movie removed from watchlist'
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to remove movie from watchlist', [
                'user_id' => Auth::id(),
                'movie_id' => $request->movie_id ?? null,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to remove movie from watchlist',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Update viewing progress
     */
    public function updateViewingProgress(Request $request)
    {
        try {
            $request->validate([
                'movie_id' => 'required|exists:movies,id',
                'watch_time' => 'required|integer|min:0',
                'total_duration' => 'required|integer|min:1'
            ]);

            $user = Auth::user();
            $progressPercentage = min(100, ($request->watch_time / $request->total_duration) * 100);
            $completed = $progressPercentage >= 90; // Consider 90% as completed

            $viewingHistory = UserViewingHistory::updateOrCreate(
                [
                    'user_id' => $user->id,
                    'movie_id' => $request->movie_id
                ],
                [
                    'watch_time' => $request->watch_time,
                    'total_duration' => $request->total_duration,
                    'progress_percentage' => $progressPercentage,
                    'last_watched_at' => now(),
                    'completed' => $completed
                ]
            );

            // Update movie view count
            Movie::where('id', $request->movie_id)->increment('view_count');

            return response()->json([
                'success' => true,
                'message' => 'Viewing progress updated',
                'data' => [
                    'progress_percentage' => $progressPercentage,
                    'completed' => $completed
                ]
            ]);

        } catch (\Exception $e) {
            Log::error('Failed to update viewing progress', [
                'user_id' => Auth::id(),
                'movie_id' => $request->movie_id ?? null,
                'error' => $e->getMessage()
            ]);

            return response()->json([
                'success' => false,
                'message' => 'Failed to update viewing progress',
                'error' => $e->getMessage()
            ], 500);
        }
    }
}