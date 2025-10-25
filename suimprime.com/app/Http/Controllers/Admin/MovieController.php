<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MoviePosterTv;
use App\Models\MovieSeoSetting;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    public function index()
    {
        // Optimize query with select and limited eager loading
        $movies = Movie::select(['id', 'title', 'description', 'release_date', 'status', 'created_at', 'updated_at'])
            ->with(['posterTvDetails:id,movie_id,thumbnail', 'genres:id,name'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        // Cache genres, actors, directors for better performance
        $genres = cache()->remember('admin_genres', 3600, function () {
            return Genre::select(['id', 'name'])->get();
        });
        
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
            'release_date' => 'nullable|date',
            'language' => 'nullable|string',
            'IMDb_rating' => 'nullable|numeric',
            'content_rating' => 'nullable|string',
            'duration' => 'nullable|string',
            'video_upload_type' => 'required|string',
            'video_url' => 'nullable|string',
            'video_file' => 'nullable|string',
            'embed_code' => 'nullable|string',
            'status' => 'nullable|boolean',
            'thumbnail' => 'nullable|string',
        ]);

        DB::beginTransaction();

        try {
            // 1. Save basic movie data
        $movie = Movie::create([
            'title' => $request->name,
            'description' => $request->description,
            'release_date' => $request->release_date,
            'language' => $request->language,
            'content_rating' => $request->content_rating,
            'IMDb_rating' => $request->IMDb_rating,
            'duration' => $request->duration,
            'is_restricted' => $request->is_restricted ?? 0,
            'video_upload_type' => $request->video_upload_type,
            'video_url' => $request->video_url,
            'video_file' => $request->video_file,
            'embed_code' => $request->embed_code,
            'enable_quality' => $request->enable_quality ?? 0,
            'enable_subtitle' => $request->enable_subtitle ?? 0,
            'status' => $request->status ?? 1,
            'plan_id' => $request->plan_id ?: null, // Use null if empty
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
                    // Store relative path instead of full URL
                    return ['/storage/media/' . $filename, $relative];
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
                // Store relative path instead of full URL
                $publicUrl = '/storage/media/' . $filename;
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

            // 4. Save Subtitles (only when enabled and with valid data)
            if (($request->enable_subtitle ?? 0) && $request->has('subtitles') && is_array($request->subtitles)) {
                foreach ($request->subtitles as $idx => $sub) {
                    $language = isset($sub['language']) ? trim((string) $sub['language']) : '';
                    $isDefault = !empty($sub['is_default']) ? 1 : 0;

                    // Grab uploaded file for this row if present
                    $uploadedFile = $request->file("subtitles.$idx.subtitle_file");

                    // Skip empty rows (no language and no file)
                    if ($language === '' && !$uploadedFile) {
                        continue;
                    }

                    // DB requires non-null language; if language is missing, skip this row
                    if ($language === '') {
                        continue;
                    }

                    $storedUrl = null;
                    if ($uploadedFile) {
                        // Store under public/subtitles and expose via storage symlink
                        $storedPath = $uploadedFile->store('subtitles', 'public');
                        // Store relative path instead of full URL
                        $storedUrl = '/storage/' . $storedPath;
                    }

                    // Create subtitle record; DB expects non-null language, but file may be nullable
                    $movie->subtitles()->create([
                        'language' => $language,
                        'subtitle_file' => $storedUrl,
                        'is_default' => $isDefault,
                    ]);
                }
            }

            // 5. Save SEO Settings
            if ($request->enable_seo || $request->meta_title || $request->meta_keywords || $request->meta_description) {
                // Convert meta_keywords string to array (split by comma)
                $metaKeywords = null;
                if ($request->meta_keywords) {
                    $metaKeywords = array_map('trim', explode(',', $request->meta_keywords));
                }
                
                $movie->seoSettings()->create([
                    'seo_image' => $request->seo_image,
                    'meta_title' => $request->meta_title,
                    'google_site_verification' => $request->google_site_verification,
                    'meta_keywords' => $metaKeywords,
                    'canonical_url' => $request->canonical_url,
                    'short_description' => $request->meta_description,
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