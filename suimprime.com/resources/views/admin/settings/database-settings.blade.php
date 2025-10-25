@extends('layouts.admin')

@section('title', 'Database Settings')

@section('content')
    @php $section = request('section', 'database-settings'); @endphp

    <div class="row">
        <div class="col-md-3">
            @includeIf('admin.partials.settings_sidebar')
        </div>

        <div class="col-md-9">
            <!-- Success Message -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Error Messages -->
            @if ($errors->any())
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Database Settings Card -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="ph ph-database me-2"></i>Database Settings
                    </h4>
                </div>
                <div class="card-body">
                    <div class="alert alert-warning" role="alert">
                        <i class="ph ph-warning me-2"></i>
                        <strong>Warning:</strong> These actions are irreversible and will permanently delete data from your
                        database. Please proceed with caution.
                    </div>

                    <!-- Delete All Movies -->
                    <div class="card mb-4">
                        <div class="card-header bg-danger text-white">
                            <h5 class="mb-0">
                                <i class="ph ph-film-strip me-2"></i>Delete All Movies
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                This will delete all movies along with their related data including qualities, subtitles,
                                posters, and images.
                            </p>
                            <p><strong>Total Movies:</strong> <span id="movie-count">Loading...</span></p>
                            <button type="button" class="btn btn-danger" data-type="movies">
                                <i class="ph ph-trash me-2"></i>Delete All Movies
                            </button>
                        </div>
                    </div>

                    <!-- Delete All Actors -->
                    <div class="card mb-4">
                        <div class="card-header bg-warning text-dark">
                            <h5 class="mb-0">
                                <i class="ph ph-users me-2"></i>Delete All Actors
                            </h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">
                                This will delete all actors and their associated images. Movie-actor relationships will also
                                be removed.
                            </p>
                            <p><strong>Total Actors:</strong> <span id="actor-count">Loading...</span></p>
                            <button type="button" class="btn btn-warning" data-type="actors">
                                <i class="ph ph-trash me-2"></i>Delete All Actors
                            </button>
                        </div>
                    </div>

                    <!-- Delete All Directors -->
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0">
                            <i class="ph ph-camera me-2"></i>Delete All Directors
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">
                            This will delete all directors and their associated images. Movie-director relationships will
                            also be removed.
                        </p>
                        <p><strong>Total Directors:</strong> <span id="director-count">Loading...</span></p>
                        <button type="button" class="btn btn-info" data-type="directors">
                            <i class="ph ph-trash me-2"></i>Delete All Directors
                        </button>
                    </div>

                    <!-- Delete All Genres -->
                    <div class="card-header bg-secondary text-white">
                        <h5 class="mb-0">
                            <i class="ph ph-tag me-2"></i>Delete All Genres
                        </h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">
                            This will delete all genres. Movie-genre relationships will also be removed.
                        </p>
                        <p><strong>Total Genres:</strong> <span id="genre-count">Loading...</span></p>
                        <button type="button" class="btn btn-secondary" data-type="genres">
                            <i class="ph ph-trash me-2"></i>Delete All Genres
                        </button>
                    </div>
                </div>
            </div>

            <!-- Confirmation Modal -->
            <div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-danger text-white">
                            <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Deletion</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <i class="ph ph-warning fa-3x text-danger mb-3"></i>
                                <h5 id="modal-title">Are you sure?</h5>
                                <p id="modal-message" class="text-muted"></p>
                                <div class="alert alert-danger">
                                    <strong>This action cannot be undone!</strong> All data will be permanently deleted.
                                </div>
                            </div>
                            <form id="deleteForm" method="POST" style="display: none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-danger" id="confirmDeleteBtn">
                                <i class="ph ph-trash me-2"></i>Yes, Delete All
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Inline script for immediate loading -->
    <script>
        console.log('Inline script loading...');

        function testDelete(type) {
            alert('Inline testDelete called with type: ' + type);
            console.log('Inline testDelete called');
        }

        // Make it available globally
        window.testDelete = testDelete;

        console.log('testDelete function defined:', typeof window.testDelete);
    </script>

    <script>
        // Test if JavaScript is working
        console.log('JavaScript is loading...');

        // Simple test function - make it globally accessible
        window.testDelete = function(type) {
            console.log('testDelete called with type:', type);
            alert('Test function called with type: ' + type);
            window.confirmDeleteAll(type);
        };

        document.addEventListener('DOMContentLoaded', function() {
            console.log('DOM loaded, initializing...');

            // Test immediate button access
            const testButtons = document.querySelectorAll('[data-type]');
            console.log('Buttons found immediately:', testButtons.length);

            // Add a small delay to ensure everything is fully rendered
            setTimeout(() => {
                console.log('Timeout reached, setting up handlers...');
                loadCounts();
                setupDeleteHandlers();
            }, 100);
        }); // Setup delete button handlers
        function setupDeleteHandlers() {
            const buttons = document.querySelectorAll('[data-type]');
            console.log('Found buttons with data-type:', buttons.length);

            buttons.forEach((button, index) => {
                console.log(`Setting up handler for button ${index + 1} with type:`, button.getAttribute(
                    'data-type'));

                // Add a simple test click handler first
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    const type = this.getAttribute('data-type');
                    console.log('Button clicked with type:', type);

                    // Simple test alert
                    if (confirm(
                            `Are you sure you want to delete all ${type}? This will show the modal next.`
                        )) {
                        confirmDeleteAll(type);
                    }
                });
            });
        }

        // Load counts for each data type
        function loadCounts() {
            const endpoints = {
                'movie-count': '{{ route('admin.database.count', 'movies') }}',
                'actor-count': '{{ route('admin.database.count', 'actors') }}',
                'director-count': '{{ route('admin.database.count', 'directors') }}',
                'genre-count': '{{ route('admin.database.count', 'genres') }}'
            };

            Object.keys(endpoints).forEach(elementId => {
                fetch(endpoints[elementId])
                    .then(response => response.json())
                    .then(data => {
                        document.getElementById(elementId).textContent = data.count;
                    })
                    .catch(error => {
                        document.getElementById(elementId).textContent = 'Error';
                        console.error('Error loading count:', error);
                    });
            });
        }

        // Confirm deletion dialog - make it globally accessible
        window.confirmDeleteAll = function(type) {
            console.log('confirmDeleteAll called with type:', type);

            // Check if Bootstrap is available
            if (typeof bootstrap === 'undefined') {
                console.error('Bootstrap is not loaded!');
                alert('Bootstrap is not loaded. Please refresh the page.');
                return;
            }

            const modalElement = document.getElementById('deleteConfirmModal');
            if (!modalElement) {
                console.error('Modal element not found!');
                return;
            }

            const modal = new bootstrap.Modal(modalElement);
            const form = document.getElementById('deleteForm');
            const titleElement = document.getElementById('modal-title');
            const messageElement = document.getElementById('modal-message');
            const confirmBtn = document.getElementById('confirmDeleteBtn');

            console.log('Modal element found:', !!modalElement);
            console.log('Form element found:', !!form);
            console.log('Title element found:', !!titleElement);
            console.log('Message element found:', !!messageElement);
            console.log('Confirm button found:', !!confirmBtn);
            const config = {
                movies: {
                    title: 'Delete All Movies?',
                    message: 'This will permanently delete all movies and their related data (qualities, subtitles, posters, images).',
                    url: '{{ route('admin.database.deleteAll', 'movies') }}'
                },
                actors: {
                    title: 'Delete All Actors?',
                    message: 'This will permanently delete all actors and their profile images.',
                    url: '{{ route('admin.database.deleteAll', 'actors') }}'
                },
                directors: {
                    title: 'Delete All Directors?',
                    message: 'This will permanently delete all directors and their profile images.',
                    url: '{{ route('admin.database.deleteAll', 'directors') }}'
                },
                genres: {
                    title: 'Delete All Genres?',
                    message: 'This will permanently delete all genres.',
                    url: '{{ route('admin.database.deleteAll', 'genres') }}'
                }
            };

            const selectedConfig = config[type];
            titleElement.textContent = selectedConfig.title;
            messageElement.textContent = selectedConfig.message;
            form.action = selectedConfig.url;

            // Set up confirm button click handler
            confirmBtn.onclick = function() {
                performDeletion(type, selectedConfig.url, modal);
            };

            modal.show();
        };

        // Perform the actual deletion - make it globally accessible
        window.performDeletion = function(type, url, modal) {
            const confirmBtn = document.getElementById('confirmDeleteBtn');
            const originalText = confirmBtn.innerHTML;

            // Show loading state
            confirmBtn.innerHTML = '<i class="ph ph-spinner ph-spin me-2"></i>Deleting...';
            confirmBtn.disabled = true;

            fetch(url, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Hide modal
                        modal.hide();

                        // Show success message
                        showAlert('success', data.message);

                        // Reload counts
                        loadCounts();
                    } else {
                        throw new Error(data.message || 'Deletion failed');
                    }
                })
                .catch(error => {
                    showAlert('danger', 'Error: ' + error.message);
                    console.error('Deletion error:', error);
                })
                .finally(() => {
                    // Reset button state
                    confirmBtn.innerHTML = originalText;
                    confirmBtn.disabled = false;
                });
        };

        // Show alert messages - make it globally accessible
        window.showAlert = function(type, message) {
            const alertDiv = document.createElement('div');
            alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
            alertDiv.innerHTML = `
                ${message}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            `;

            // Insert after the existing alerts
            const container = document.querySelector('.col-md-9');
            const firstCard = container.querySelector('.card');
            container.insertBefore(alertDiv, firstCard);

            // Auto-dismiss after 5 seconds
            setTimeout(() => {
                if (alertDiv && alertDiv.parentNode) {
                    alertDiv.remove();
                }
            }, 5000);
        };
    </script>

@endsection
