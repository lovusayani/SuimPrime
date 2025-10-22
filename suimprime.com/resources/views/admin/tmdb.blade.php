@extends('layouts.admin')

@section('title', 'TMDB Movie Importer')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">TMDB Movie Importer</h4>
                    </div>
                    <div class="card-body">
                        <!-- Tab Navigation -->
                        <ul class="nav nav-tabs mb-4" id="tmdbTabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="filter-tab" data-bs-toggle="tab"
                                    data-bs-target="#filter-tab-pane" type="button" role="tab"
                                    aria-controls="filter-tab-pane" aria-selected="true">
                                    <i class="icon ph ph-funnel me-2"></i>Filter Movies from TMDB
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="search-tab" data-bs-toggle="tab"
                                    data-bs-target="#search-tab-pane" type="button" role="tab"
                                    aria-controls="search-tab-pane" aria-selected="false">
                                    <i class="icon ph ph-magnifying-glass me-2"></i>Search Movie by TMDB ID
                                </button>
                            </li>
                        </ul>

                        <!-- Tab Content -->
                        <div class="tab-content" id="tmdbTabsContent">
                            <!-- Filter Tab -->
                            <div class="tab-pane fade show active" id="filter-tab-pane" role="tabpanel"
                                aria-labelledby="filter-tab" tabindex="0">
                                <!-- TMDB Movie List Filter Section -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <h5 class="mb-3">Filter Movies from TMDB</h5>
                                                <form id="tmdbFilterForm">
                                                    <div class="row g-3 align-items-end">
                                                        <div class="col-md-3">
                                                            <label for="filter_type" class="form-label">Type</label>
                                                            <select class="form-select" id="filter_type" name="filter_type">
                                                                <option value="popular">Popular</option>
                                                                <option value="upcoming">Upcoming</option>
                                                                <option value="now_playing">Now Playing</option>
                                                                <option value="top_rated">Top Rated</option>
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="filter_year" class="form-label">Year</label>
                                                            <input type="number" class="form-control" id="filter_year"
                                                                name="filter_year" min="1900" max="2100"
                                                                placeholder="e.g. 2025">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="filter_date" class="form-label">Release Date</label>
                                                            <input type="date" class="form-control" id="filter_date"
                                                                name="filter_date">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <label for="filter_language" class="form-label">Language</label>
                                                            <input type="text" class="form-control" id="filter_language"
                                                                name="filter_language" placeholder="en, fr, etc">
                                                        </div>
                                                        <div class="col-md-2">
                                                            <button type="submit" class="btn btn-info w-100">
                                                                <i class="icon ph ph-magnifying-glass me-2"></i> Filter
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- TMDB Filter Results -->
                                <div id="tmdbFilterResults" style="display: none;">
                                    <div class="card bg-secondary">
                                        <div class="card-header">
                                            <h5 class="mb-0">TMDB Movie List Results</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Thumbnail</th>
                                                            <th>Movie Name</th>
                                                            <th>Release Date</th>
                                                            <th>Country</th>
                                                            <th>Genres</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="tmdbFilterResultsBody">
                                                        <!-- Filtered results will be loaded here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Search Tab -->
                            <div class="tab-pane fade" id="search-tab-pane" role="tabpanel" aria-labelledby="search-tab"
                                tabindex="0">
                                <!-- Search Form -->
                                <div class="row mb-4">
                                    <div class="col-md-12">
                                        <div class="card bg-dark">
                                            <div class="card-body">
                                                <h5 class="mb-3">Search Movie by TMDB ID</h5>
                                                <form id="searchForm">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="form-group">
                                                                <label for="movie_id">Movie ID <span
                                                                        class="text-danger">*</span></label>
                                                                <input type="number" class="form-control" id="movie_id"
                                                                    name="movie_id" placeholder="Enter TMDB Movie ID"
                                                                    required>
                                                                <small class="form-text text-muted">Example: 550 (Fight
                                                                    Club), 680
                                                                    (Pulp Fiction)</small>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4 d-flex align-items-end">
                                                            <button type="submit" class="btn btn-primary w-100">
                                                                <i class="icon ph ph-magnifying-glass me-2"></i> Search
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Search Results -->
                                <div id="searchResults" style="display: none;">
                                    <div class="card bg-secondary">
                                        <div class="card-header">
                                            <h5 class="mb-0">Search Results</h5>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Thumbnail</th>
                                                            <th>Movie Name</th>
                                                            <th>Release Date</th>
                                                            <th>Country</th>
                                                            <th>Genres</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="searchResultsBody">
                                                        <!-- Results will be loaded here -->
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Fetched Movies List -->
                        <div class="mt-4">
                            <h5 class="mb-3">Fetched Movies</h5>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>#</th>
                                            <th>Thumbnail</th>
                                            <th>TMDB ID</th>
                                            <th>Movie Name</th>
                                            <th>Release Date</th>
                                            <th>Country</th>
                                            <th>Genres</th>
                                            <th>Rating</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($fetchedMovies as $movie)
                                            <tr id="movie-row-{{ $movie->id }}">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>
                                                    @if ($movie->poster_path)
                                                        <img src="https://image.tmdb.org/t/p/w92{{ $movie->poster_path }}"
                                                            alt="{{ $movie->title }}" class="img-thumbnail"
                                                            style="max-width: 60px;">
                                                    @else
                                                        <span class="text-muted">No Image</span>
                                                    @endif
                                                </td>
                                                <td>{{ $movie->tmdb_id }}</td>
                                                <td>{{ $movie->title }}</td>
                                                <td>{{ $movie->release_date ? $movie->release_date->format('Y-m-d') : 'N/A' }}
                                                </td>
                                                <td>
                                                    @if ($movie->production_countries)
                                                        {{ collect($movie->production_countries)->pluck('name')->implode(', ') }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($movie->genres)
                                                        {{ collect($movie->genres)->pluck('name')->implode(', ') }}
                                                    @else
                                                        N/A
                                                    @endif
                                                </td>
                                                <td>
                                                    <span class="badge bg-warning">{{ $movie->vote_average }}/10</span>
                                                </td>
                                                <td>
                                                    <button class="btn btn-sm btn-danger delete-movie"
                                                        data-id="{{ $movie->id }}">
                                                        <i class="icon ph ph-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td colspan="9" class="text-center text-muted">No movies fetched yet
                                                </td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>

                            <!-- Pagination -->
                            @if ($fetchedMovies->hasPages())
                                <div class="d-flex justify-content-center mt-3">
                                    {{ $fetchedMovies->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // TMDB Filter Form Submit
            $('#tmdbFilterForm').on('submit', function(e) {
                e.preventDefault();
                const type = $('#filter_type').val();
                const year = $('#filter_year').val();
                const date = $('#filter_date').val();
                const language = $('#filter_language').val();

                Swal.fire({
                    title: 'Fetching Movies...',
                    text: 'Please wait while we fetch movie list from TMDB',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '{{ route('admin.tmdb.filter') }}',
                    method: 'POST',
                    data: {
                        type: type,
                        year: year,
                        date: date,
                        language: language,
                        _token: '{{ csrf_token() }}'
                    },
                    dataType: 'json',
                    success: function(response) {
                        Swal.close();
                        if (response.success) {
                            displayTmdbFilterResults(response.movies);
                            $('#tmdbFilterResults').slideDown();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        let message = 'An error occurred while fetching movie list';
                        let responseText = xhr.responseText || '';
                        if (xhr.status === 419) {
                            message =
                                'Session expired or CSRF token mismatch. Please refresh the page.';
                        } else if (xhr.status === 500) {
                            message = 'Server error. Check your server logs.';
                        } else if (xhr.status === 404) {
                            message = 'API endpoint not found.';
                        } else {
                            try {
                                const json = xhr.responseJSON;
                                if (json && json.message) message = json.message;
                            } catch (e) {
                                // Not JSON
                            }
                        }
                        console.error('TMDB Filter AJAX error:', xhr, responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: message,
                        });
                    }
                });
                return false;
            });

            // Display TMDB Filter Results
            function displayTmdbFilterResults(movies) {
                let html = '';
                if (movies.length === 0) {
                    html = '<tr><td colspan="6" class="text-center text-muted">No movies found</td></tr>';
                } else {
                    movies.forEach(function(movie) {
                        const posterUrl = movie.poster_path || '/assets/dummy-images/no-image.jpg';
                        html += `<tr>
                            <td><img src="${posterUrl}" alt="${movie.title}" class="img-thumbnail" style="max-width: 100px;"></td>
                            <td>${movie.title}</td>
                            <td>${movie.release_date || 'N/A'}</td>
                            <td>${movie.countries || 'N/A'}</td>
                            <td>${movie.genres || 'N/A'}</td>
                            <td>
                                <button class="btn btn-success fetch-movie" data-id="${movie.id}">
                                    <i class="icon ph ph-download-simple me-2"></i> Fetch & Store
                                </button>
                            </td>
                        </tr>`;
                    });
                }
                $('#tmdbFilterResultsBody').html(html);
            }

            // Display Search Results
            function displaySearchResults(movie) {
                const posterUrl = movie.poster_path || '/assets/dummy-images/no-image.jpg';

                const html = `
                    <tr>
                        <td>
                            <img src="${posterUrl}" alt="${movie.title}" class="img-thumbnail" style="max-width: 100px;">
                        </td>
                        <td>${movie.title}</td>
                        <td>${movie.release_date}</td>
                        <td>${movie.countries || 'N/A'}</td>
                        <td>${movie.genres || 'N/A'}</td>
                        <td>
                            <button class="btn btn-success fetch-movie" data-id="${movie.id}">
                                <i class="icon ph ph-download-simple me-2"></i> Fetch & Store
                            </button>
                        </td>
                    </tr>
                `;

                $('#searchResultsBody').html(html);
            }

            // Search Form Submit
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                const movieId = $('#movie_id').val();

                if (!movieId) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Please enter a Movie ID',
                    });
                    return;
                }

                // Show loading
                Swal.fire({
                    title: 'Searching...',
                    text: 'Please wait while we fetch movie data',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '{{ route('admin.tmdb.search') }}',
                    method: 'POST',
                    data: {
                        movie_id: movieId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.close();

                        if (response.success) {
                            displaySearchResults(response.movie);
                            $('#searchResults').slideDown();
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        const message = xhr.responseJSON?.message ||
                            'An error occurred while searching';
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: message,
                        });
                    }
                });
            });

            // Fetch Movie Button
            $(document).on('click', '.fetch-movie', function() {
                const movieId = $(this).data('id');

                Swal.fire({
                    title: 'Fetching Movie...',
                    text: 'Please wait while we store the movie data',
                    allowOutsideClick: false,
                    didOpen: () => {
                        Swal.showLoading();
                    }
                });

                $.ajax({
                    url: '{{ route('admin.tmdb.fetch') }}',
                    method: 'POST',
                    data: {
                        movie_id: movieId,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.close();

                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message,
                            }).then(() => {
                                location.reload();
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message,
                            });
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        const message = xhr.responseJSON?.message ||
                            'An error occurred while fetching';
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: message,
                        });
                    }
                });
            });

            // Delete Movie Button
            $(document).on('click', '.delete-movie', function() {
                const movieId = $(this).data('id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '{{ route('admin.tmdb.destroy', ':id') }}'
                                .replace(
                                    ':id', movieId),
                            method: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                if (response.success) {
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Deleted!',
                                        text: response.message,
                                        timer: 1500,
                                        showConfirmButton: false
                                    });
                                    $('#movie-row-' + movieId).fadeOut(300,
                                        function() {
                                            $(this).remove();
                                        });
                                }
                            },
                            error: function(xhr) {
                                const message = xhr.responseJSON?.message ||
                                    'An error occurred while deleting';
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error',
                                    text: message,
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
