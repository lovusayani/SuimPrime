# Movie Fields Update Required

## Changes Needed:

### 1. app/Models/Movie.php

Update the fillable array to include:

```php
protected $fillable = [
    'title', 'description', 'video_upload_type', 'video_url',
    'video_file', 'embed_code', 'enable_quality', 'enable_subtitle',
    'plan_id', 'status', 'language', 'content_rating', 'duration',
    'release_date', 'IMDb_rating',
];
```

### 2. app/Http/Controllers/Admin/MovieController.php

Update Movie::create to include:

```php
$movie = Movie::create([
    'title' => $request->name,
    'description' => $request->description,
    'video_upload_type' => $request->video_upload_type,
    'video_url' => $request->video_url_input,
    'video_file' => $request->video_file_input,
    'embed_code' => $request->embedded,
    'enable_quality' => $request->enable_quality ?? 0,
    'enable_subtitle' => $request->enable_subtitle ?? 0,
    'language' => $request->language,
    'content_rating' => $request->content_rating,
    'duration' => $request->duration,
    'release_date' => $request->release_date,
    'IMDb_rating' => $request->IMDb_rating,
]);
```

### 3. resources/views/admin/movies/create.blade.php

Update the TMDB import to populate content_rating:

```javascript
// After: if (tmdb.release_date) $('#release_date').val(tmdb.release_date);
// Add:
if (tmdb.adult === true) {
    $("#content_rating").val("R - Restricted");
} else {
    $("#content_rating").val("PG - Parental Guidance Suggested");
}
```
