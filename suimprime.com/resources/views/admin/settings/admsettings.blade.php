@extends('layouts.admin')

@section('title', 'Admin Settings')

@section('content')
    @php $section = request('section', 'admin-settings'); @endphp

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

            <!-- Card 1: User Management Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="ph ph-users me-2"></i>User Management Settings
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.adm.update') }}" enctype="multipart/form-data">
                        @csrf <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="max_users_allowed" class="form-label">Maximum Users Allowed</label>
                                <input type="number" name="max_users_allowed" id="max_users_allowed" class="form-control"
                                    value="{{ \App\Models\Setting::get('max_users_allowed', '1000') }}" min="1">
                                <small class="form-text text-muted">Set maximum number of users that can register</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="user_registration_enabled" class="form-label">User Registration</label>
                                <select name="user_registration_enabled" id="user_registration_enabled"
                                    class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('user_registration_enabled', '1') == '1' ? 'selected' : '' }}>
                                        Enabled</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('user_registration_enabled', '1') == '0' ? 'selected' : '' }}>
                                        Disabled</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="email_verification_required" class="form-label">Email Verification
                                    Required</label>
                                <select name="email_verification_required" id="email_verification_required"
                                    class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('email_verification_required', '0') == '1' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('email_verification_required', '0') == '0' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="default_user_role" class="form-label">Default User Role</label>
                                <select name="default_user_role" id="default_user_role" class="form-control">
                                    <option value="user"
                                        {{ \App\Models\Setting::get('default_user_role', 'user') == 'user' ? 'selected' : '' }}>
                                        User</option>
                                    <option value="premium"
                                        {{ \App\Models\Setting::get('default_user_role', 'user') == 'premium' ? 'selected' : '' }}>
                                        Premium</option>
                                    <option value="admin"
                                        {{ \App\Models\Setting::get('default_user_role', 'user') == 'admin' ? 'selected' : '' }}>
                                        Admin</option>
                                </select>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save User Settings</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Card 2: Security & Performance Settings -->
            <div class="card mb-4">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="ph ph-shield me-2"></i>Security & Performance Settings
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.adm.update') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="login_rate_limit" class="form-label">Login Rate Limit (per minute)</label>
                                <input type="number" name="login_rate_limit" id="login_rate_limit" class="form-control"
                                    value="{{ \App\Models\Setting::get('login_rate_limit', '5') }}" min="1"
                                    max="100">
                                <small class="form-text text-muted">Maximum login attempts per minute</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="session_timeout_minutes" class="form-label">Session Timeout (minutes)</label>
                                <input type="number" name="session_timeout_minutes" id="session_timeout_minutes"
                                    class="form-control"
                                    value="{{ \App\Models\Setting::get('session_timeout_minutes', '120') }}" min="5"
                                    max="1440">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="enable_2fa" class="form-label">Two-Factor Authentication</label>
                                <select name="enable_2fa" id="enable_2fa" class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('enable_2fa', '0') == '1' ? 'selected' : '' }}>Enabled
                                    </option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('enable_2fa', '0') == '0' ? 'selected' : '' }}>Disabled
                                    </option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="cache_timeout_hours" class="form-label">Cache Timeout (hours)</label>
                                <input type="number" name="cache_timeout_hours" id="cache_timeout_hours"
                                    class="form-control"
                                    value="{{ \App\Models\Setting::get('cache_timeout_hours', '24') }}" min="1"
                                    max="168">
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="maintenance_mode" class="form-label">Maintenance Mode</label>
                            <select name="maintenance_mode" id="maintenance_mode" class="form-control">
                                <option value="0"
                                    {{ \App\Models\Setting::get('maintenance_mode', '0') == '0' ? 'selected' : '' }}>
                                    Disabled</option>
                                <option value="1"
                                    {{ \App\Models\Setting::get('maintenance_mode', '0') == '1' ? 'selected' : '' }}>
                                    Enabled</option>
                            </select>
                            <small class="form-text text-muted">Enable maintenance mode for site updates</small>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save Security Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Add any custom JavaScript for the admin settings page here
        document.addEventListener('DOMContentLoaded', function() {
            // Example: Auto-save forms after changes
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('change', function() {
                    // You can add auto-save functionality here if needed
                    console.log('Form changed:', form);
                });
            });
        });
    </script>
@endsection
