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
                        <i class="fas fa-database me-2"></i>Database Settings
                    </h4>
                </div>
                <div class="card-body">
                    <div class="text-center py-5">
                        <i class="fas fa-database fa-4x text-muted mb-3"></i>
                        <h5 class="text-muted">Database Settings</h5>
                        <p class="text-muted">This section is under development. Database configuration options will be
                            available here soon.</p>

                        <!-- Placeholder for future settings -->
                        <div class="row justify-content-center mt-4">
                            <div class="col-md-6">
                                <div class="card bg-light">
                                    <div class="card-body text-center">
                                        <h6 class="card-title">Coming Soon</h6>
                                        <p class="card-text small">
                                            Database connection settings, backup configurations, and optimization tools will
                                            be available here.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Database Settings page loaded');
            // Future JavaScript functionality will be added here
        });
    </script>
@endsection
