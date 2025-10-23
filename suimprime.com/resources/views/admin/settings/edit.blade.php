@extends('layouts.admin')

@section('title', 'Settings')

@section('content')
    @php
        $section = request('section', 'general');
    @endphp

    <div class="row">
        <div class="col-md-4 col-lg-3">
            @includeIf('admin.partials.settings_sidebar')
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="card card-accent-primary offcanvas-body mb-0">
                <div class="card-body">
                    @if ($section === 'general')
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <form class="requires-validation" method="POST" action="{{ route('admin.settings.logo.update') }}"
                            data-toggle="validator" id="form-submit" novalidate="novalidate" enctype="multipart/form-data">
                            @csrf
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h4><i class="fas fa-cube"></i> Business Settings</h4>
                                <div>
                                    <button type="button" class="btn btn-primary float-right" onclick="clearCache()">
                                        <i class="fa-solid fa-arrow-rotate-left mx-2"></i>Purge Cache
                                    </button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">App <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="app_name" id="app_name"
                                    value="{{ old('app_name', \App\Models\Setting::get('app_name')) }}" required>
                                <div class="invalid-feedback" id="name-error">App field is required</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">User App <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="user_app_name" id="user_app_name"
                                    value="{{ old('user_app_name', \App\Models\Setting::get('user_app_name')) }}" required>
                                <div class="invalid-feedback" id="name-error">User App field is required</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Contact No <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="helpline_number" id="helpline_number"
                                    value="{{ old('helpline_number', \App\Models\Setting::get('helpline_number')) }}"
                                    required>
                                <div class="invalid-feedback" id="name-error">Helpline Number field is required</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Inquiry Email <span class="text-danger">*</span></label>
                                <input class="form-control" type="email" name="inquriy_email" id="inquriy_email"
                                    value="{{ old('inquriy_email', \App\Models\Setting::get('inquriy_email')) }}" required>
                                <div class="invalid-feedback" id="name-error">Inquiry email field is required</div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Site Description <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="short_description" id="short_description"
                                    value="{{ old('short_description', \App\Models\Setting::get('short_description')) }}"
                                    required>
                                <div class="invalid-feedback" id="name-error">Short description field is required</div>
                            </div>
                            <div class="row">
                                <!-- Mini Logo Upload -->
                                <div class="form-group mb-3 col-md-6">
                                    <label for="mini_logo" class="form-label">Mini Logo</label>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="card text-center">
                                                <div class="card-body">
                                                    <img id="miniLogoViewer"
                                                        src="{{ \App\Models\Setting::get('mini_logo') ? asset(\App\Models\Setting::get('mini_logo')) : asset('img/logo/mini_logo.png') }}"
                                                        class="img-fluid" alt="mini_logo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="file" class="form-control d-none" id="mini_logo"
                                                    name="mini_logo" accept=".jpeg, .jpg, .png, .gif">
                                                <button type="button" class="btn btn-primary mb-5"
                                                    onclick="document.getElementById('mini_logo').click();">Upload</button>
                                                <button type="button" class="btn btn-dark mb-5"
                                                    id="removeMiniLogoButton">Remove</button>
                                            </div>
                                            <span class="text-danger" id="error_mini_logo"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Dark Logo Upload -->
                                <div class="form-group mb-3 col-md-6">
                                    <label for="dark_logo" class="form-label">Logo</label>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="card text-center bg-dark">
                                                <div class="card-body">
                                                    <img id="darkLogoViewer"
                                                        src="{{ \App\Models\Setting::get('dark_logo') ? asset(\App\Models\Setting::get('dark_logo')) : asset('img/logo/dark_logo.png') }}"
                                                        class="img-fluid" alt="dark_logo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="file" class="form-control d-none" id="dark_logo"
                                                    name="dark_logo" accept=".jpeg, .jpg, .png, .gif">
                                                <button type="button" class="btn btn-primary mb-5"
                                                    onclick="document.getElementById('dark_logo').click();">Upload</button>
                                                <button type="button" class="btn btn-dark mb-5"
                                                    id="removeDarkLogoButton">Remove</button>
                                            </div>
                                            <span class="text-danger" id="error_dark_logo"></span>
                                        </div>
                                    </div>
                                </div>
                                <!-- Favicon -->
                                <div class="form-group mb-3 col-md-6">
                                    <label for="favicon" class="form-label">Favicon</label>
                                    <div class="row align-items-center">
                                        <div class="col-lg-4">
                                            <div class="card text-center bg-light">
                                                <div class="card-body">
                                                    <img id="faviconViewer"
                                                        src="{{ \App\Models\Setting::get('favicon') ? asset(\App\Models\Setting::get('favicon')) : asset('img/logo/favicon.png') }}"
                                                        class="img-fluid" alt="favicon_logo">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-8">
                                            <div class="d-flex align-items-center gap-2">
                                                <input type="file" class="form-control d-none" id="favicon"
                                                    name="favicon" accept=".jpeg, .jpg, .png, .gif">
                                                <button type="button" class="btn btn-primary mb-5"
                                                    onclick="document.getElementById('favicon').click();">Upload</button>
                                                <button type="button" class="btn btn-dark mb-5"
                                                    id="removeFaviconButton">Remove</button>
                                            </div>
                                            <span class="text-danger" id="error_favicon"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-end">
                                    <button type="submit" class="btn btn-primary float-right"
                                        id="submit-button">Save</button>
                                </div>
                            </div>
                        </form>
                    @elseif ($section === 'module-setting')
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card card-accent-primary offcanvas-body mb-0">
                            <div class="card-body">
                                <div class="col-md-12 mb-3 d-flex justify-content-between">
                                    <h5><i class="fa-solid fa-sliders"></i> Module Settings</h5>
                                </div>

                                <form method="POST" action="{{ route('admin.settings.logo.update') }}"
                                    id="module-settings-form">
                                    @csrf
                                    <div class="form-group border-bottom pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="form-label m-0" for="movie">Movies</label>
                                            <input type="hidden" value="0" name="movie">
                                            <div class="form-check form-switch m-0">
                                                <input class="form-check-input toggle-input"
                                                    data-toggle-target="#movie-fields" value="1" name="movie"
                                                    id="movie" type="checkbox"
                                                    {{ \App\Models\Setting::get('movie') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group border-bottom pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="form-label m-0" for="tvshow">TV Shows</label>
                                            <input type="hidden" value="0" name="tvshow">
                                            <div class="form-check form-switch m-0">
                                                <input class="form-check-input toggle-input"
                                                    data-toggle-target="#tvshow-fields" value="1" name="tvshow"
                                                    id="tvshow" type="checkbox"
                                                    {{ \App\Models\Setting::get('tvshow') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group border-bottom pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="form-label m-0" for="livetv">Live TV</label>
                                            <input type="hidden" value="0" name="livetv">
                                            <div class="form-check form-switch m-0">
                                                <input class="form-check-input toggle-input"
                                                    data-toggle-target="#livetv-fields" value="1" name="livetv"
                                                    id="livetv" type="checkbox"
                                                    {{ \App\Models\Setting::get('livetv') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group border-bottom pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="form-label m-0" for="video">Videos</label>
                                            <input type="hidden" value="0" name="video">
                                            <div class="form-check form-switch m-0">
                                                <input class="form-check-input toggle-input"
                                                    data-toggle-target="#video-fields" value="1" name="video"
                                                    id="video" type="checkbox"
                                                    {{ \App\Models\Setting::get('video') ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group border-bottom pb-3">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <label class="form-label m-0" for="enable_tmdb_api">Import Entertainment Data
                                                From TMDB</label>

                                            <input type="hidden" value="0" name="enable_tmdb_api">
                                            <div class="form-check form-switch m-0">
                                                <input class="form-check-input" type="checkbox" name="enable_tmdb_api"
                                                    id="category-enable_tmdb_api" value="1"
                                                    {{ \App\Models\Setting::get('enable_tmdb_api') ? 'checked' : '' }}
                                                    onclick="toggleTmdbApi()">
                                            </div>
                                        </div>
                                    </div>

                                    <div id="tmdb_api_key-field" class="ps-3"
                                        style="display: {{ \App\Models\Setting::get('enable_tmdb_api') ? 'block' : 'none' }};">
                                        <div class="form-group border-bottom pb-3">
                                            <label class="form-label" for="category-tmdb_api_key">TMDB API key</label>
                                            <input class="form-control" type="text" name="tmdb_api_key"
                                                id="tmdb_api_key"
                                                value="{{ old('tmdb_api_key', \App\Models\Setting::get('tmdb_api_key')) }}">
                                        </div>
                                    </div>

                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Save</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="py-4">
                            <h5 class="mb-3 text-capitalize">{{ str_replace('-', ' ', $section) }}</h5>
                            <p>This is the <strong>{{ $section }}</strong> settings section. You can add fields or a
                                dedicated page here.</p>
                            <a href="{{ route('admin.settings.logo', ['section' => 'general']) }}"
                                class="btn btn-sm btn-outline-primary">Back to General</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Mini Logo Preview
            $('#mini_logo').on('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#miniLogoViewer').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Dark Logo Preview
            $('#dark_logo').on('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#darkLogoViewer').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Favicon Preview
            $('#favicon').on('change', function(e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        $('#faviconViewer').attr('src', e.target.result);
                    };
                    reader.readAsDataURL(file);
                }
            });

            // Remove Mini Logo
            $('#removeMiniLogoButton').on('click', function() {
                $('#mini_logo').val('');
                $('#miniLogoViewer').attr('src', '{{ asset('img/logo/mini_logo.png') }}');
            });

            // Remove Dark Logo
            $('#removeDarkLogoButton').on('click', function() {
                $('#dark_logo').val('');
                $('#darkLogoViewer').attr('src', '{{ asset('img/logo/dark_logo.png') }}');
            });

            // Remove Favicon
            $('#removeFaviconButton').on('click', function() {
                $('#favicon').val('');
                $('#faviconViewer').attr('src', '{{ asset('img/logo/favicon.png') }}');
            });

            // Toggle TMDB API Key field
            window.toggleTmdbApi = function() {
                const checkbox = document.getElementById('category-enable_tmdb_api');
                const field = document.getElementById('tmdb_api_key-field');
                if (checkbox.checked) {
                    field.style.display = 'block';
                } else {
                    field.style.display = 'none';
                }
            };

            // Clear Cache function
            window.clearCache = function() {
                if (confirm('Are you sure you want to clear the cache?')) {
                    $.ajax({
                        url: '{{ route('clear.cache.config') }}',
                        method: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            alert('Cache cleared successfully!');
                        },
                        error: function() {
                            alert('Error clearing cache.');
                        }
                    });
                }
            };
        });
    </script>
@endpush
