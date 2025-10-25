<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Director;
use App\Models\Genre;
use App\Models\Movie;
use App\Models\MoviePayPerView;
use App\Models\MoviePosterTv;
use App\Models\MovieQuality;
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
        $movies = Movie::select(['id', 'title', 'description', 'release_date', 'status', 'is_restricted', 'language', 'movie_access', 'plan_id', 'created_at', 'updated_at'])
            ->with(['posterTvDetails:id,movie_id,thumbnail', 'genres:id,name', 'plan:id,name'])
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
        $validationRules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'nullable|date',
            'language' => 'nullable|string',
            'IMDb_rating' => 'nullable|numeric',
            'content_rating' => 'nullable|string',
            'duration' => 'nullable|string',
            'video_upload_type' => 'required|string',
            'video_url_input' => 'nullable|string', // Fixed field name
            'video_file_input' => 'nullable|string', // Fixed field name
            'embedded' => 'nullable|string', // Fixed field name
            'status' => 'nullable|boolean',
            'thumbnail' => 'nullable|string',
            'download_status' => 'nullable|in:enable,disable',
            'movie_access' => 'required|in:paid,free,pay-per-view',
            // Trailer fields
            'trailer_url_type' => 'nullable|string',
            'trailer_url' => 'nullable|string',
            'trailer_video' => 'nullable|string',
            'trailer_embedded' => 'nullable|string',
        ];

        // Add Pay Per View validation rules if movie_access is pay-per-view
        if ($request->movie_access === 'pay-per-view') {
            $validationRules = array_merge($validationRules, [
                'price' => 'required|numeric|min:0',
                'purchase_type' => 'required|in:rental,onetime',
                'access_duration' => 'required_if:purchase_type,rental|nullable|integer|min:1',
                'discount' => 'nullable|numeric|min:0|max:99',
                'available_for' => 'required|integer|min:1',
                'ppv_status' => 'nullable|boolean',
            ]);
        }

        $request->validate($validationRules);

        DB::beginTransaction();

        try {
            // 1. Save basic movie data
        $downloadUrl = null;
        if ($request->video_url_input) {
            $downloadUrl = $request->video_url_input;
        } elseif ($request->video_file_input) {
            $downloadUrl = $request->video_file_input; // This will be handled later when file is stored
        }
        
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
            'video_url' => $request->video_url_input, // Fixed field name
            'video_file' => $request->video_file_input, // Fixed field name
            'embed_code' => $request->embedded, // Fixed field name
            'enable_quality' => $request->enable_quality ?? 0,
            'enable_subtitle' => $request->enable_subtitle ?? 0,
            'status' => $request->status ?? 1,
            'plan_id' => $request->plan_id ?: null, // Use null if empty
            'download_status' => $request->download_status ?? 'disable',
            'download_url' => $downloadUrl,
            'movie_access' => $request->movie_access ?? 'free',
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
                'trailer_url_type' => $request->trailer_url_type ?? null, // Fixed: use trailer field
                'trailer_url' => $request->trailer_url ?? null, // Fixed: use trailer field
                'trailer_file' => $request->trailer_video ?? null, // Fixed: use trailer field
                'embed_code' => $request->trailer_embedded ?? null, // Fixed: use trailer field
            ]);

            // 3. Save Movie Qualities
            if ($request->has('video_quality_type')) {
                foreach ($request->video_quality_type as $index => $type) {
                    $movie->qualities()->create([
                        'video_upload_type' => $type,
                        'quality' => $request->video_quality[$index] ?? null,
                        'video_url' => $request->quality_video_url_input[$index] ?? null, // Fixed field name
                        'video_file' => $request->quality_video[$index] ?? null, // Fixed field name  
                        'embed_code' => $request->quality_video_embed_input[$index] ?? null, // Fixed field name
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

            /* ✅ 9. Save Pay Per View data (if movie_access is pay-per-view) */
            if ($request->movie_access === 'pay-per-view') {
                // Validate that Available For is greater than Access Duration
                if ($request->purchase_type === 'rental' && $request->access_duration && $request->available_for <= $request->access_duration) {
                    throw new \Exception('Available For must be greater than Access Duration.');
                }

                // Calculate total amount
                $price = (float) $request->price;
                $discount = (float) ($request->discount ?? 0);
                $totalAmount = $price - (($price * $discount) / 100);

                $movie->payPerView()->create([
                    'price' => $price,
                    'purchase_type' => $request->purchase_type ?? 'rental',
                    'access_duration' => $request->purchase_type === 'rental' ? $request->access_duration : null,
                    'discount' => $discount,
                    'total_amount' => $totalAmount,
                    'available_for' => $request->available_for,
                    'status' => $request->ppv_status ?? 1,
                ]);
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

    public function edit(Movie $movie)
    {
        $genres = Genre::all();
        $actors = Actor::all();
        $directors = Director::all();

        // Load relationships
        $movie->load([
            'genres',
            'actors', 
            'directors',
            'posterTvDetails',
            'seoSettings',
            'qualities',
            'subtitles',
            'payPerView'
        ]);

        return view('admin.movies.edit', compact('movie', 'genres', 'actors', 'directors'));
    }

    public function update(Request $request, Movie $movie)
    {
        $validationRules = [
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'release_date' => 'nullable|date',
            'runtime' => 'nullable|integer|min:1',
            'imdb_rating' => 'nullable|numeric|min:0|max:10',
            'status' => 'required|in:active,inactive',
            'video_url_input' => 'nullable|url',
            'video_file_input' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:2048000',
            'embedded' => 'nullable|string',
            'download_status' => 'nullable|in:enable,disable',
            'movie_access' => 'required|in:paid,free,pay-per-view',
            'trailer_url_type' => 'nullable|in:url,file,embedded',
            'trailer_url' => 'nullable|url',
            'trailer_video' => 'nullable|file|mimes:mp4,avi,mov,wmv|max:1048576',
            'trailer_embedded' => 'nullable|string',
            'genres' => 'array',
            'actors' => 'array',
            'directors' => 'array',
            'pay_per_view_status' => 'nullable|in:enable,disable',
            'price' => 'nullable|numeric|min:0',
            'purchase_type' => 'nullable|in:rent,buy',
            'access_duration' => 'nullable|integer|min:1',
            'discount' => 'nullable|numeric|min:0|max:100',
            'available_for' => 'nullable|integer|min:1',
        ];

        $request->validate($validationRules);

        try {
            DB::beginTransaction();

            // Update main movie data
            $movieData = [
                'title' => $request->name,
                'description' => $request->description,
                'release_date' => $request->release_date,
                'runtime' => $request->runtime,
                'imdb_rating' => $request->imdb_rating,
                'status' => $request->status,
                'download_status' => $request->download_status ?? 'disable',
                'movie_access' => $request->movie_access ?? 'free',
            ];

            // Handle video data
            if ($request->video_url_input) {
                $movieData['video_url'] = $request->video_url_input;
                $movieData['video_file'] = null;
                $movieData['embed_code'] = null;
                $movieData['download_url'] = $request->video_url_input; // Copy video URL to download URL
            } elseif ($request->hasFile('video_file_input')) {
                $file = $request->file('video_file_input');
                $filename = time() . '_' . $file->getClientOriginalName();
                $path = $file->storeAs('movies/videos', $filename, 'public');
                $movieData['video_file'] = $path;
                $movieData['video_url'] = null;
                $movieData['embed_code'] = null;
                $movieData['download_url'] = asset('storage/' . $path); // Set download URL to file path
            } elseif ($request->embedded) {
                $movieData['embed_code'] = $request->embedded;
                $movieData['video_url'] = null;
                $movieData['video_file'] = null;
                $movieData['download_url'] = null; // No download for embedded videos
            }

            $movie->update($movieData);

            // Update relationships
            $movie->genres()->sync($request->genres ?? []);
            $movie->actors()->sync($request->actors ?? []);
            $movie->directors()->sync($request->directors ?? []);

            // Update poster/trailer data
            $posterData = [];
            if ($request->trailer_url_type === 'url' && $request->trailer_url) {
                $posterData['trailer_url'] = $request->trailer_url;
                $posterData['trailer_file'] = null;
                $posterData['embed_code'] = null;
            } elseif ($request->trailer_url_type === 'file' && $request->hasFile('trailer_video')) {
                $file = $request->file('trailer_video');
                $filename = time() . '_trailer_' . $file->getClientOriginalName();
                $path = $file->storeAs('movies/trailers', $filename, 'public');
                $posterData['trailer_file'] = $path;
                $posterData['trailer_url'] = null;
                $posterData['embed_code'] = null;
            } elseif ($request->trailer_url_type === 'embedded' && $request->trailer_embedded) {
                $posterData['embed_code'] = $request->trailer_embedded;
                $posterData['trailer_url'] = null;
                $posterData['trailer_file'] = null;
            }

            if (!empty($posterData)) {
                $movie->posterTvDetails()->updateOrCreate(
                    ['movie_id' => $movie->id],
                    $posterData
                );
            }

            // Update SEO settings
            if ($request->filled(['meta_title', 'meta_description', 'meta_keywords'])) {
                $movie->seoSettings()->updateOrCreate(
                    ['movie_id' => $movie->id],
                    [
                        'meta_title' => $request->meta_title,
                        'meta_description' => $request->meta_description,
                        'meta_keywords' => $request->meta_keywords,
                    ]
                );
            }

            // Update Pay Per View settings
            if ($request->pay_per_view_status === 'enable') {
                $ppvData = [
                    'price' => $request->price,
                    'purchase_type' => $request->purchase_type,
                    'access_duration' => $request->access_duration,
                    'discount' => $request->discount ?? 0,
                    'available_for' => $request->available_for,
                    'status' => 'active',
                ];
                $ppvData['total_amount'] = $ppvData['price'] - ($ppvData['price'] * $ppvData['discount'] / 100);

                $movie->payPerView()->updateOrCreate(
                    ['movie_id' => $movie->id],
                    $ppvData
                );
            } else {
                $movie->payPerView()->delete();
            }

            // Handle qualities
            if ($request->has('quality_video_url_input') || $request->hasFile('quality_video') || $request->has('quality_video_embed_input')) {
                $movie->qualities()->delete(); // Remove existing qualities

                $qualityUrls = $request->quality_video_url_input ?? [];
                $qualityFiles = $request->file('quality_video') ?? [];
                $qualityEmbeds = $request->quality_video_embed_input ?? [];
                $qualityLabels = $request->quality_label ?? [];

                $maxCount = max(count($qualityUrls), count($qualityFiles), count($qualityEmbeds));

                for ($i = 0; $i < $maxCount; $i++) {
                    $qualityData = [
                        'movie_id' => $movie->id,
                        'quality_label' => $qualityLabels[$i] ?? '720p',
                    ];

                    if (!empty($qualityUrls[$i])) {
                        $qualityData['video_url'] = $qualityUrls[$i];
                    } elseif (isset($qualityFiles[$i]) && $qualityFiles[$i]) {
                        $file = $qualityFiles[$i];
                        $filename = time() . '_quality_' . $file->getClientOriginalName();
                        $path = $file->storeAs('movies/qualities', $filename, 'public');
                        $qualityData['video_file'] = $path;
                    } elseif (!empty($qualityEmbeds[$i])) {
                        $qualityData['embed_code'] = $qualityEmbeds[$i];
                    }

                    if (isset($qualityData['video_url']) || isset($qualityData['video_file']) || isset($qualityData['embed_code'])) {
                        MovieQuality::create($qualityData);
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.movies.index')->with('success', 'Movie updated successfully!');

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => 'Error updating movie: ' . $e->getMessage()])->withInput();
        }
    }

    public function updateRestricted(Movie $movie)
    {
        $movie->restricted = ! $movie->restricted;
        $movie->save();

        return redirect()->route('admin.movies.index')->with('success', 'Movie restriction updated.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Movie deleted successfully.',
        ]);
    }
}