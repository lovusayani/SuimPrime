@extends('layouts.admin')

@section('title', 'Notification Configuration')

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3">
            @includeIf('admin.partials.settings_sidebar')
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="card card-accent-primary offcanvas-body mb-0">
                <div class="card-body">
                    <form class="requires-validation" method="POST"
                        action="{{ route('admin.settings.notificationConfig.update') }}" data-toggle="validator"
                        id="form-submit" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fa-solid fa-bell"></i> Notification Configuration</h4>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">

                                    <div class="col-lg-4">
                                        <label class="form-label">Expiry Plan <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="expiry_plan" id="expiry_plan"
                                            placeholder="Expiry Plan Days"
                                            value="{{ old('expiry_plan', \App\Models\Setting::get('expiry_plan', '')) }}"
                                            required>
                                        <div class="invalid-feedback" id="name-error">Expiry plan is required</div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="form-label">Upcoming <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="upcoming" id="upcoming"
                                            placeholder="Upcoming Days"
                                            value="{{ old('upcoming', \App\Models\Setting::get('upcoming', '')) }}"
                                            required>
                                        <div class="invalid-feedback" id="name-error">Upcoming is required</div>
                                    </div>

                                    <div class="col-lg-4">
                                        <label class="form-label">Continue Watch <span class="text-danger">*</span></label>
                                        <input class="form-control" type="number" name="continue_watch" id="continue_watch"
                                            placeholder="Continue Watch Days"
                                            value="{{ old('continue_watch', \App\Models\Setting::get('continue_watch', '')) }}"
                                            required>
                                        <div class="invalid-feedback" id="name-error">Continue watch is required</div>
                                    </div>

                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary" type="submit" id="submit-button">Save</button>
                            </div>
                        </div>
                    </form>

                    <!-- Notification & Communication Settings -->
                    <form class="requires-validation mt-4" method="POST"
                        action="{{ route('admin.settings.notificationConfig.update') }}" data-toggle="validator" novalidate
                        enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h4><i class="fa-solid fa-bell me-2"></i> Notification & Communication Settings</h4>
                            </div>
                            <div class="card-body">
                                <div class="row gy-3">
                                    <div class="col-md-6 mb-3">
                                        <label for="admin_notification_email" class="form-label">Admin Notification
                                            Email</label>
                                        <input type="email" name="admin_notification_email" id="admin_notification_email"
                                            class="form-control"
                                            value="{{ old('admin_notification_email', \App\Models\Setting::get('admin_notification_email', 'admin@example.com')) }}"
                                            required>
                                        <small class="form-text text-muted">Email for admin notifications</small>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email_notifications_enabled" class="form-label">Email
                                            Notifications</label>
                                        <select name="email_notifications_enabled" id="email_notifications_enabled"
                                            class="form-control">
                                            <option value="1"
                                                {{ \App\Models\Setting::get('email_notifications_enabled', '1') == '1' ? 'selected' : '' }}>
                                                Enabled</option>
                                            <option value="0"
                                                {{ \App\Models\Setting::get('email_notifications_enabled', '1') == '0' ? 'selected' : '' }}>
                                                Disabled</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="push_notifications_enabled" class="form-label">Push
                                            Notifications</label>
                                        <select name="push_notifications_enabled" id="push_notifications_enabled"
                                            class="form-control">
                                            <option value="1"
                                                {{ \App\Models\Setting::get('push_notifications_enabled', '1') == '1' ? 'selected' : '' }}>
                                                Enabled</option>
                                            <option value="0"
                                                {{ \App\Models\Setting::get('push_notifications_enabled', '1') == '0' ? 'selected' : '' }}>
                                                Disabled</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="sms_notifications_enabled" class="form-label">SMS Notifications</label>
                                        <select name="sms_notifications_enabled" id="sms_notifications_enabled"
                                            class="form-control">
                                            <option value="1"
                                                {{ \App\Models\Setting::get('sms_notifications_enabled', '0') == '1' ? 'selected' : '' }}>
                                                Enabled</option>
                                            <option value="0"
                                                {{ \App\Models\Setting::get('sms_notifications_enabled', '0') == '0' ? 'selected' : '' }}>
                                                Disabled</option>
                                        </select>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="notification_frequency" class="form-label">Notification
                                            Frequency</label>
                                        <select name="notification_frequency" id="notification_frequency"
                                            class="form-control">
                                            <option value="realtime"
                                                {{ \App\Models\Setting::get('notification_frequency', 'realtime') == 'realtime' ? 'selected' : '' }}>
                                                Real-time</option>
                                            <option value="hourly"
                                                {{ \App\Models\Setting::get('notification_frequency', 'realtime') == 'hourly' ? 'selected' : '' }}>
                                                Hourly</option>
                                            <option value="daily"
                                                {{ \App\Models\Setting::get('notification_frequency', 'realtime') == 'daily' ? 'selected' : '' }}>
                                                Daily</option>
                                            <option value="weekly"
                                                {{ \App\Models\Setting::get('notification_frequency', 'realtime') == 'weekly' ? 'selected' : '' }}>
                                                Weekly</option>
                                        </select>
                                        <small class="form-text text-muted">How frequently to send notifications</small>
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="maintenance_notification_message" class="form-label">Maintenance
                                            Notification Message</label>
                                        <textarea name="maintenance_notification_message" id="maintenance_notification_message" class="form-control"
                                            rows="3">{{ old('maintenance_notification_message', \App\Models\Setting::get('maintenance_notification_message', 'We are currently performing maintenance. Please check back later.')) }}</textarea>
                                        <small class="form-text text-muted">Message shown during maintenance mode</small>
                                    </div>
                                </div>
                            </div>
                            <div class="text-end">
                                <button class="btn btn-primary" type="submit">Save Notification Settings</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Form validation
                $('#form-submit').on('submit', function(e) {
                    const form = $(this)[0];

                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    $(this).addClass('was-validated');
                });
            });
        </script>
    @endpush

@endsection
