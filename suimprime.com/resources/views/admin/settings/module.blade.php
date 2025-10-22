@extends('layouts.admin')

@section('title', 'Module Settings')

@section('content')
<div class="row">
    <div class="col-md-4 col-lg-3">
        {{-- Reuse the settings sidebar markup from edit.blade.php --}}
        @includeIf('admin.partials.settings_sidebar')
    </div>
    <div class="col-md-8 col-lg-9">
        <div class="card card-accent-primary offcanvas-body mb-0">
            <div class="card-body">
                <div class="col-md-12 mb-3 d-flex justify-content-between">
                    <h5><i class="fa-solid fa-sliders"></i> Module Settings</h5>
                </div>

                <form method="POST" action="{{ route('admin.settings.logo.update') }}" id="module-settings-form">
                    @csrf
                    <div class="form-group border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label m-0" for="movie">Movies</label>
                            <input type="hidden" value="0" name="movie">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input toggle-input" data-toggle-target="#movie-fields" value="1" name="movie" id="movie" type="checkbox" {{ $movie ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="form-group border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label m-0" for="tvshow">TV Shows</label>
                            <input type="hidden" value="0" name="tvshow">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input toggle-input" data-toggle-target="#tvshow-fields" value="1" name="tvshow" id="tvshow" type="checkbox" {{ $tvshow ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="form-group border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label m-0" for="livetv">Live TV</label>
                            <input type="hidden" value="0" name="livetv">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input toggle-input" data-toggle-target="#livetv-fields" value="1" name="livetv" id="livetv" type="checkbox" {{ $livetv ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="form-group border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label m-0" for="video">Videos</label>
                            <input type="hidden" value="0" name="video">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input toggle-input" data-toggle-target="#video-fields" value="1" name="video" id="video" type="checkbox" {{ $video ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="form-group border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label m-0" for="enable_tmdb_api">Import Entertainment Data From TMDB</label>

                            <input type="hidden" value="0" name="enable_tmdb_api">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input" type="checkbox" name="enable_tmdb_api" id="category-enable_tmdb_api" value="1" {{ $enable_tmdb_api ? 'checked' : '' }} onclick="toggleTmdbApi()">
                            </div>
                        </div>
                    </div>

                    <div id="tmdb_api_key-field" class="ps-3" style="display: {{ $enable_tmdb_api ? 'block' : 'none' }};">
                        <div class="form-group border-bottom pb-3">
                            <label class="form-label" for="category-tmdb_api_key">TMDB API key</label>
                            <input class="form-control" type="text" name="tmdb_api_key" id="tmdb_api_key" value="{{ old('tmdb_api_key', $tmdb_api_key) }}">
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
