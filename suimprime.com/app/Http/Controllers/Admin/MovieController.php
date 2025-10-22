<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        // $movies = Movie::orderBy('created_at', 'desc')->paginate(10);
        $movies = Movie::with(['posterTvDetails', 'genres'])->paginate(10);

        // get genres
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();

        return view('admin.movies.index', compact('movies', 'genres'));
    }

    public function create()
    {
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();

        return view('admin.movies.create', compact('genres', 'actors', 'directors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video_upload_type' => 'required|string',
            'video_url' => 'nullable|string',
            'video_file' => 'nullable|string',
            'embed_code' => 'nullable|string',
            'status' => 'nullable|boolean',
            'thumbnail' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // 1. Create Movie
            $movie = Movie::create([
                'title' => $request->name,
                'description' => $request->description,
                'video_upload_type' => $request->video_upload_type,
                'video_url' => $request->video_url_input,
                'video_file' => $request->video_file_input,
                'embed_code' => $request->embedded,
                'enable_quality' => $request->enable_quality ?? 0,
                'enable_subtitle' => $request->enable_subtitle ?? 0,
            ]);

            // Move images from temp_uploads to media and register media rows; return public URL
            $processMediaUrl = function ($inputUrl) {
                if (empty($inputUrl)) return [null, null];

                $path = parse_url($inputUrl, PHP_URL_PATH) ?: '';
                $filename = basename($path);
                if (!$filename || $filename === '/' || strpos($filename, '.') === false) {
                    return [$inputUrl, null];
                }

                $src = 'temp_uploads/' . $filename;
                $dest = 'media/' . $filename;

                // If already a media URL, ensure media row exists
                if (strpos($path, '/media/') !== false) {
                    $relative = '/media/' . $filename;
                    if (!Media::where('url', $relative)->exists()) {
                        Media::create([
                            'url' => $relative,
                            'type' => 'image',
                            'title' => $filename,
                            'mediable_id' => null,
                            'mediable_type' => null,
                        ]);
                    }
                    return [url('/storage/media/' . $filename), $relative];
                }

                // Move file in public disk
                if (Storage::disk('public')->exists($src)) {
                    if (!Storage::disk('public')->exists($dest)) {
                        Storage::disk('public')->move($src, $dest);
                    }
                }

                $relative = '/media/' . $filename; // media table path
                if (!Media::where('url', $relative)->exists()) {
                    Media::create([
                        'url' => $relative,
                        'type' => 'image',
                        'title' => $filename,
                        'mediable_id' => null,
                        'mediable_type' => null,
                    ]);
                }
                $publicUrl = url('/storage/media/' . $filename);
                return [ $publicUrl, $relative ];
            };

            // Normalize poster URLs to /storage/media/* and save to media table
            [ $thumbPublic ] = $processMediaUrl($request->thumbnail_url);
            [ $posterPublic ] = $processMediaUrl($request->poster_url);
            [ $posterTvPublic ] = $processMediaUrl($request->poster_tv_url);

            // 2. Save Trailer + Posters (new unified table)
            $movie->posterTvDetails()->create([
                'thumbnail' => $thumbPublic ?? ($request->thumbnail_url ?? null),
                'poster' => $posterPublic ?? ($request->poster_url ?? null),
                'poster_tv' => $posterTvPublic ?? ($request->poster_tv_url ?? null),
                'trailer_url_type' => $request->video_upload_type ?? null,
                'trailer_url' => $request->video_url_input ?? null,
                'trailer_file' => $request->video_file_input ?? null,
                'embed_code' => $request->embedded ?? null,
            ]);

            // 3. Save Movie Qualities
            if ($request->has('video_quality_type')) {
                foreach ($request->video_quality_type as $index => $type) {
                    $movie->qualities()->create([
                        'video_upload_type' => $type,
                        'quality' => $request->video_quality[$index] ?? null,
                        'video_url' => $request->quality_video_url[$index] ?? null,
                        'video_file' => $request->quality_video_file[$index] ?? null,
                        'embed_code' => $request->quality_video_embed[$index] ?? null,
                    ]);
                }
            }

            // 4. Save Subtitles
            if ($request->has('subtitles') && is_array($request->subtitles)) {
                foreach ($request->subtitles as $sub) {
                    $movie->subtitles()->create([
                        'language' => $sub['language'] ?? null,
                        'subtitle_file' => $sub['subtitle_file'] ?? null,
                        'is_default' => isset($sub['is_default']) ? 1 : 0,
                    ]);
                }
            }

            // 5. Save SEO Settings
            if ($request->enable_seo) {
                $movie->seo()->create([
                    'seo_image' => $request->seo_image,
                    'meta_title' => $request->meta_title,
                    'google_site_verification' => $request->google_site_verification,
                    'meta_keywords' => json_encode($request->meta_keywords),
                    'canonical_url' => $request->canonical_url,
                    'short_description' => $request->short_description,
                ]);
            }

            /* ✅ 6. Attach Genres (pivot) */
            if ($request->has('genres') && is_array($request->genres)) {
                $movie->genres()->sync($request->genres);
            }

            /* ✅ 7. Attach Actors (pivot) */
            if ($request->has('actors') && is_array($request->actors)) {
                $movie->actors()->sync($request->actors);
            }

            /* ✅ 8. Attach Directors (pivot) */
            if ($request->has('directors') && is_array($request->directors)) {
                $movie->directors()->sync($request->directors);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Movie created successfully!',
                'movie_id' => $movie->id,
            ]);

        } catch (\Exception $e) {
            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => 'Error creating movie: '.$e->getMessage(),
            ], 500);
        }
    }

    public function updateRestricted(Movie $movie)
    {
        $movie->restricted = ! $movie->restricted;
        $movie->save();

        return redirect()->route('admin.movies.index')->with('success', 'Movie restriction updated.');
    }

    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Movie deleted successfully.',
        ]);
    }
}
