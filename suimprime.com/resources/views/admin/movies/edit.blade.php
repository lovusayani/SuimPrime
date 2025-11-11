@extends('layouts.admin')
@section('title', 'Edit Movie')
@push('styles')
    <!-- Select2 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Flatpickr CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    {{-- STYLES MOVED TO: resources/css/compiled-admin-styles.css --}}
    {{-- DO NOT EDIT HERE - Edit in compiled-admin-styles.css instead --}}
    {{--
    <style>
        /* Select2 Dark Theme Styling */
        .select2-container--default .select2-selection--multiple {
            background-color: var(--bs-dark-bg-subtle) !important;
            border: 1px solid var(--bs-border-color) !important;
            color: var(--bs-body-color) !important;
            min-height: 38px;
            padding: 0;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__rendered {
            padding: 2px 4px !important;
            margin: 0;
            display: flex;
            flex-wrap: wrap;
            gap: 3px;
            align-items: center;
            min-height: 30px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #dc3545 !important;
            border: 1px solid #dc3545 !important;
            color: white !important;
            padding: 1px 6px !important;
            margin: 0 !important;
            border-radius: 2px !important;
            font-size: 11px !important;
            line-height: 1.1 !important;
            white-space: nowrap;
            display: inline-flex;
            align-items: center;
            height: 20px;
            box-sizing: border-box;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            padding: 0 !important;
            margin: 0 !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white !important;
            font-size: 12px !important;
            margin-right: 3px !important;
            margin-left: 0 !important;
            padding: 0 !important;
            background: none !important;
            border: none !important;
            cursor: pointer;
            line-height: 1;
            width: auto;
            height: auto;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #ffcccc !important;
            background: none !important;
        }

        .select2-dropdown {
            background-color: var(--bs-dark-bg-subtle) !important;
            border: 1px solid var(--bs-border-color) !important;
        }

        .select2-container--default .select2-results__option {
            color: var(--bs-body-color) !important;
            padding: 6px 12px;
            background-color: var(--bs-dark-bg-subtle) !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: var(--bs-primary) !important;
            color: white !important;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: var(--bs-secondary) !important;
            color: white !important;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            background-color: var(--bs-dark-bg-subtle) !important;
            border: 1px solid var(--bs-border-color) !important;
            color: var(--bs-body-color) !important;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            background-color: transparent;
            border: none;
            color: var(--bs-body-color);
            padding: 4px;
            margin: 0;
            min-width: 80px;
        }

        /* Ensure consistent width */
        .select2-container {
            width: 100% !important;
        }

        /* Remove any white backgrounds and extra spacing */
        .select2-container--default .select2-selection--multiple,
        .select2-container--default .select2-selection--multiple .select2-selection__rendered,
        .select2-dropdown,
        .select2-results,
        .select2-results__options {
            background-color: var(--bs-dark-bg-subtle) !important;
        }

        /* Force dark theme on all Select2 elements */
        .select2-container--default * {
            box-sizing: border-box;
        }

        .select2-container--default .select2-selection--multiple {
            background-color: var(--bs-dark-bg-subtle) !important;
        }

        .select2-dropdown {
            background-color: var(--bs-dark-bg-subtle) !important;
        }

        /* Fix chip spacing and remove unnecessary white space */
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            float: none !important;
            margin: 2px 2px 0 0 !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__display {
            padding-left: 0 !important;
            padding-right: 0 !important;
        }

        font-size: 12px;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            color: white !important;
            font-size: 14px;
            margin-right: 4px;
            background: none !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            color: #ffcccc !important;
            background: none !important;
        }

        .select2-dropdown {
            background-color: var(--bs-dark-bg-subtle) !important;
            border: 1px solid var(--bs-border-color) !important;
        }

        .select2-container--default .select2-results__option {
            color: var(--bs-body-color) !important;
            padding: 6px 12px;
            background-color: var(--bs-dark-bg-subtle) !important;
        }

        .select2-container--default .select2-results__option--highlighted[aria-selected] {
            background-color: var(--bs-primary) !important;
            color: white !important;
        }

        .select2-container--default .select2-results__option[aria-selected=true] {
            background-color: var(--bs-secondary) !important;
            color: white !important;
        }

        .select2-container--default .select2-search--dropdown .select2-search__field {
            background-color: var(--bs-dark-bg-subtle) !important;
            border: 1px solid var(--bs-border-color) !important;
            color: var(--bs-body-color) !important;
        }

        .select2-container--default .select2-search--inline .select2-search__field {
            background-color: transparent;
            border: none;
            color: var(--bs-body-color);
            padding: 4px;
            margin: 0;
        }

        /* Ensure consistent width */
        .select2-container {
            width: 100% !important;
        }

        /* Remove any white backgrounds */
        .select2-container--default .select2-selection--multiple,
        .select2-container--default .select2-selection--multiple .select2-selection__rendered,
        .select2-dropdown,
        .select2-results,
        .select2-results__options {
            background-color: var(--bs-dark-bg-subtle) !important;
        }

        /* Force dark theme on all Select2 elements */
        .select2-container--default * {
            background-color: transparent !important;
        }

        .select2-container--default .select2-selection--multiple {
            background-color: var(--bs-dark-bg-subtle) !important;
        }

        .select2-dropdown {
            background-color: var(--bs-dark-bg-subtle) !important;
        }
    </style>
    --}}
@endpush

@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.movies.index') }}">Movies</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit: {{ $movie->title }}</li>
            </ol>
        </nav>

        <!-- TMDB Quick Import -->
        <div class="d-flex flex-wrap align-items-center justify-content-md-end gap-3 mb-3">
            <div class="d-flex align-items-center gap-2">
                <a class="ph ph-info" data-bs-toggle="tooltip"
                    href="https://www.themoviedb.org/movie/533535-deadpool-wolverine" target="_blank"
                    aria-label="To get a movie id, click on icon ."
                    data-bs-original-title="To get a movie id, click on icon ."></a>
                <label class="form-label mb-0" for="movie_id">Import movie from TMDB ( Add the movie id)<span
                        class="text-danger">*</span></label>
                <input class="form-control w-auto" type="text" name="movie_id" id="movie_id" value=""
                    placeholder="e.g. #mv123456">
            </div>

            <div class="position-relative">
                <button class="btn btn-md btn-primary" id="import_movie" type="button">
                    <span id="import_button_text">Import</span>
                    <span id="loader" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </span>
                </button>
            </div>
        </div>

        <h1>Edit Movie: {{ $movie->title }}</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" enctype="multipart/form-data" class="requires-validation" data-toggle="validator"
            id="form-submit" novalidate="novalidate" action="{{ route('admin.movies.update', $movie) }}">
            @csrf
            @method('PUT')
            @include('admin.movies.partials.general')
            @include('admin.movies.partials.video')
            @include('admin.movies.partials.quality')
            @include('admin.movies.partials.subtitles')
            @include('admin.movies.partials.seo')
            <div class="d-flex justify-content-end mt-3">
                <a href="{{ route('admin.movies.index') }}" class="btn btn-secondary me-2">Cancel</a>
                <button type="submit" class="btn btn-primary" id="submit_movie_btn">Update Movie</button>
            </div>
        </form>
    </div>
    @include('admin.shared.media-modal')
    {{-- Your media modal partial --}}
    @push('scripts')
        <!-- Select2 JS -->
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <!-- Flatpickr JS -->
        <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
        <!-- TinyMCE CDN -->
        <script src="{{ asset('/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script>
            tinymce.init({
                selector: '#description', // Replace with your textarea ID or class
                height: 400,
                plugins: 'link image media table code',
                theme: 'silver',
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | code',
                skin_url: '{{ asset('vendor/tinymce/js/tinymce/skins/ui/oxide') }}', // must exist /home/sprsinfotech-lmax/htdocs/lmax.sprsinfotech.in/public/vendor/tinymce/js/tinymce/skins/ui/oxide
                content_css: '{{ asset('/vendor/tinymce/js/tinymce/skins/content/dark/content.min.css') }}', // must exist
                license_key: 'gpl', // agree to GPL license, no API key needed
            });

            function handleTrailerTypeChange(selectedType) {
                const TrailerFileInput = document.getElementById('url_file_input');
                const TrailerURLInput = document.getElementById('url_input');
                const TrailerEmbedInput = document.getElementById('trailer_embed_input_section');

                // Correct element IDs for trailer inputs
                const trailerUrl = document.getElementById('trailer_url'); // URL input inside url_input
                const trailerFile = document.getElementById('trailer_input'); // visible file text input
                const embedInput = document.getElementById('trailer_embedded'); // embed textarea

                // First hide all sections
                TrailerFileInput?.classList.add('d-none');
                TrailerURLInput?.classList.add('d-none');
                TrailerEmbedInput?.classList.add('d-none');

                // Remove all required attributes
                trailerUrl?.removeAttribute('required');
                trailerFile?.removeAttribute('required');
                embedInput?.removeAttribute('required');

                // Show appropriate section based on selection
                switch (selectedType) {
                    case 'Local':
                    case 'x265':
                        TrailerFileInput?.classList.remove('d-none');
                        trailerFile?.setAttribute('required', 'required');
                        break;
                    case 'URL':
                        TrailerURLInput?.classList.remove('d-none');
                        trailerUrl?.setAttribute('required', 'required');
                        break;
                    case 'embed':
                        TrailerEmbedInput?.classList.remove('d-none');
                        embedInput?.setAttribute('required', 'required');
                        break;
                    default:
                        break;
                }
            }

            function handleVideoTypeChange(selectedType) {
                const videoFileInput = document.getElementById('video_file_input');
                const videoURLInput = document.getElementById('video_url_input');
                const videoEmbedInput = document.getElementById('video_embed_input');

                // First hide all sections
                videoFileInput?.classList.add('d-none');
                videoURLInput?.classList.add('d-none');
                videoEmbedInput?.classList.add('d-none');

                // Show appropriate section based on selection
                switch (selectedType) {
                    case 'file':
                        videoFileInput?.classList.remove('d-none');
                        break;
                    case 'url':
                        videoURLInput?.classList.remove('d-none');
                        break;
                    case 'embed':
                        videoEmbedInput?.classList.remove('d-none');
                        break;
                    default:
                        break;
                }
            }

            function add_video_input() {
                const html = `
                <div class="row video-item">
                    <div class="col-md-3">
                        <div class="mb-3">
                            <label for="quality_label">Quality Label</label>
                            <select name="quality_label[]" class="form-control">
                                <option value="Auto">Auto</option>
                                <option value="240p">240p</option>
                                <option value="360p">360p</option>
                                <option value="480p">480p</option>
                                <option value="720p">720p</option>
                                <option value="1080p">1080p</option>
                                <option value="1440p">1440p</option>
                                <option value="2160p">2160p</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="d-flex flex-column gap-2">
                            <input type="url" name="quality_video_url_input[]" placeholder="Enter video URL" class="form-control">
                            <input type="file" name="quality_video[]" class="form-control" accept="video/*">
                            <textarea name="quality_video_embed_input[]" placeholder="Enter embed code" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <button type="button" class="btn btn-danger remove-video" onclick="remove_video_input(this)">Remove</button>
                    </div>
                </div>`;

                document.getElementById('video_data_section').insertAdjacentHTML('beforeend', html);
            }

            function remove_video_input(button) {
                button.closest('.video-item').remove();
            }

            $(document).ready(function() {
                // Initialize Select2 for actors
                $('#actors').select2({
                    placeholder: 'Search for actors...',
                    allowClear: true,
                    width: '100%'
                });

                // Initialize Select2 for directors  
                $('#directors').select2({
                    placeholder: 'Search for directors...',
                    allowClear: true,
                    width: '100%'
                });

                // Initialize Select2 for genres
                $('#genres').select2({
                    placeholder: 'Select genres...',
                    allowClear: true,
                    width: '100%'
                });

                // Initialize Flatpickr for release date
                if (document.getElementById('release_date')) {
                    flatpickr("#release_date", {
                        dateFormat: "Y-m-d",
                        allowInput: true
                    });
                }

                // Show Pay Per View fields if movie has PPV data
                @if (isset($movie) && $movie->payPerView)
                    $('#payPerViewFields').removeClass('d-none');
                    @if ($movie->payPerView->purchase_type === 'rental')
                        $('#accessDurationWrapper').removeClass('d-none');
                    @endif
                @endif

                // TMDB Import functionality
                $('#import_movie').click(function() {
                    var movieId = $('#movie_id').val();
                    if (!movieId) {
                        alert('Please enter a movie ID');
                        return;
                    }

                    // Show loader
                    $('#import_button_text').hide();
                    $('#loader').show();

                    $.ajax({
                        url: 'https://api.themoviedb.org/3/movie/' + movieId +
                            '?api_key=6ead64fc7f6b02fcf4d6e0f68d1d0b5a&append_to_response=videos,credits,keywords',
                        method: 'GET',
                        success: function(data) {
                            console.log('TMDB data:', data);

                            // Populate form fields
                            $('#name').val(data.title);
                            $('#description').val(data.overview);
                            $('#release_date').val(data.release_date);
                            $('#runtime').val(data.runtime);
                            $('#imdb_rating').val(data.vote_average);

                            // Update TinyMCE content
                            if (tinymce.get('description')) {
                                tinymce.get('description').setContent(data.overview);
                            }

                            // Handle genres
                            if (data.genres && data.genres.length > 0) {
                                var genreNames = data.genres.map(genre => genre.name);
                                var genreOptions = [];

                                // Add genres as Select2 options and select them
                                $('#genres option').each(function() {
                                    if (genreNames.includes($(this).text())) {
                                        genreOptions.push($(this).val());
                                    }
                                });

                                $('#genres').val(genreOptions).trigger('change');
                            }

                            // Handle cast (actors)
                            if (data.credits && data.credits.cast && data.credits.cast.length > 0) {
                                var actorNames = data.credits.cast.slice(0, 10).map(actor => actor
                                    .name);
                                var actorOptions = [];

                                $('#actors option').each(function() {
                                    if (actorNames.includes($(this).text())) {
                                        actorOptions.push($(this).val());
                                    }
                                });

                                $('#actors').val(actorOptions).trigger('change');
                            }

                            // Handle directors
                            if (data.credits && data.credits.crew && data.credits.crew.length > 0) {
                                var directors = data.credits.crew.filter(person => person.job ===
                                    'Director');
                                if (directors.length > 0) {
                                    var directorNames = directors.map(director => director.name);
                                    var directorOptions = [];

                                    $('#directors option').each(function() {
                                        if (directorNames.includes($(this).text())) {
                                            directorOptions.push($(this).val());
                                        }
                                    });

                                    $('#directors').val(directorOptions).trigger('change');
                                }
                            }

                            // Handle poster
                            if (data.poster_path) {
                                var posterUrl = 'https://image.tmdb.org/t/p/w500' + data
                                    .poster_path;
                                $('#thumbnail').val(posterUrl);

                                // Show preview if there's a preview element
                                if ($('#thumbnail_preview').length) {
                                    $('#thumbnail_preview').attr('src', posterUrl).show();
                                }
                            }

                            // Handle trailer
                            if (data.videos && data.videos.results && data.videos.results.length >
                                0) {
                                var trailer = data.videos.results.find(video => video.type ===
                                    'Trailer' && video.site === 'YouTube');
                                if (trailer) {
                                    var trailerUrl = 'https://www.youtube.com/watch?v=' + trailer
                                        .key;
                                    $('#trailer_url').val(trailerUrl);

                                    // Set trailer type to URL
                                    $('input[name="trailer_url_type"][value="url"]').prop('checked',
                                        true);
                                    handleTrailerTypeChange('URL');
                                }
                            }

                            alert('Movie data imported successfully!');
                        },
                        error: function(xhr) {
                            console.error('TMDB import error:', xhr);
                            alert('Error importing movie data. Please check the movie ID.');
                        },
                        complete: function() {
                            // Hide loader
                            $('#loader').hide();
                            $('#import_button_text').show();
                        }
                    });
                });

                // Form submission handling
                $('#form-submit').submit(function(e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    // Show submit button loading state
                    $('#submit_movie_btn').prop('disabled', true).text('Updating...');

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            window.location.href = "{{ route('admin.movies.index') }}";
                        },
                        error: function(xhr) {
                            $('#submit_movie_btn').prop('disabled', false).text('Update Movie');

                            // Clear previous errors
                            $('.is-invalid').removeClass('is-invalid');
                            $('.error-message').hide();

                            if (xhr.responseJSON && xhr.responseJSON.errors) {
                                $.each(xhr.responseJSON.errors, function(key, value) {
                                    // Add invalid class to input
                                    $(`[name="${key}"]`).addClass('is-invalid');

                                    // Show error message if you have a div for it
                                    const errorDiv = $(`#${key}_error`);
                                    if (errorDiv.length) {
                                        errorDiv.text(xhr.responseJSON.errors[key][0])
                                            .show();
                                    }
                                });
                            } else {
                                $('#error_message')
                                    .text(xhr.responseJSON?.message || 'Server error')
                                    .show();
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
