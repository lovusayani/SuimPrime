@extends('layouts.admin')

@section('title', 'Content Settings')

@section('content')
    @php $section = request('section', 'content-setting'); @endphp

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

            <!-- Content Management Settings -->
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        <i class="fas fa-film me-2"></i>Content Management Settings
                    </h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.settings.content.update') }}"
                        enctype="multipart/form-data">
                        @csrf

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="auto_approve_content" class="form-label">Auto Approve Content</label>
                                <select name="auto_approve_content" id="auto_approve_content" class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('auto_approve_content', '0') == '1' ? 'selected' : '' }}>
                                        Yes</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('auto_approve_content', '0') == '0' ? 'selected' : '' }}>
                                        No</option>
                                </select>
                                <small class="form-text text-muted">Automatically approve uploaded content</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="max_file_size_mb" class="form-label">Max File Size (MB)</label>
                                <input type="number" name="max_file_size_mb" id="max_file_size_mb" class="form-control"
                                    value="{{ \App\Models\Setting::get('max_file_size_mb', '500') }}" min="1"
                                    max="2048">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="allowed_video_formats" class="form-label">Allowed Video Formats</label>
                                <input type="text" name="allowed_video_formats" id="allowed_video_formats"
                                    class="form-control"
                                    value="{{ \App\Models\Setting::get('allowed_video_formats', 'mp4,mkv,avi,mov') }}"
                                    placeholder="mp4,mkv,avi,mov">
                                <small class="form-text text-muted">Comma separated file extensions</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="content_moderation_enabled" class="form-label">Content Moderation</label>
                                <select name="content_moderation_enabled" id="content_moderation_enabled"
                                    class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('content_moderation_enabled', '1') == '1' ? 'selected' : '' }}>
                                        Enabled</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('content_moderation_enabled', '1') == '0' ? 'selected' : '' }}>
                                        Disabled</option>
                                </select>
                            </div>
                        </div>

                        <!-- Additional Content Settings -->
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="default_video_quality" class="form-label">Default Video Quality</label>
                                <select name="default_video_quality" id="default_video_quality" class="form-control">
                                    <option value="480p"
                                        {{ \App\Models\Setting::get('default_video_quality', '720p') == '480p' ? 'selected' : '' }}>
                                        480p</option>
                                    <option value="720p"
                                        {{ \App\Models\Setting::get('default_video_quality', '720p') == '720p' ? 'selected' : '' }}>
                                        720p</option>
                                    <option value="1080p"
                                        {{ \App\Models\Setting::get('default_video_quality', '720p') == '1080p' ? 'selected' : '' }}>
                                        1080p</option>
                                    <option value="4k"
                                        {{ \App\Models\Setting::get('default_video_quality', '720p') == '4k' ? 'selected' : '' }}>
                                        4K</option>
                                </select>
                                <small class="form-text text-muted">Default quality for video content</small>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="enable_content_comments" class="form-label">Enable Content Comments</label>
                                <select name="enable_content_comments" id="enable_content_comments" class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('enable_content_comments', '1') == '1' ? 'selected' : '' }}>
                                        Enabled</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('enable_content_comments', '1') == '0' ? 'selected' : '' }}>
                                        Disabled</option>
                                </select>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="enable_content_ratings" class="form-label">Enable Content Ratings</label>
                                <select name="enable_content_ratings" id="enable_content_ratings" class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('enable_content_ratings', '1') == '1' ? 'selected' : '' }}>
                                        Enabled</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('enable_content_ratings', '1') == '0' ? 'selected' : '' }}>
                                        Disabled</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="content_per_page" class="form-label">Content Per Page</label>
                                <input type="number" name="content_per_page" id="content_per_page" class="form-control"
                                    value="{{ \App\Models\Setting::get('content_per_page', '12') }}" min="1"
                                    max="100">
                                <small class="form-text text-muted">Number of items to display per page</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 mb-3">
                                <label for="allowed_image_formats" class="form-label">Allowed Image Formats</label>
                                <input type="text" name="allowed_image_formats" id="allowed_image_formats"
                                    class="form-control"
                                    value="{{ \App\Models\Setting::get('allowed_image_formats', 'jpg,jpeg,png,webp,gif') }}"
                                    placeholder="jpg,jpeg,png,webp,gif">
                                <small class="form-text text-muted">Comma separated image file extensions for posters and
                                    thumbnails</small>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="enable_content_watermark" class="form-label">Enable Content Watermark</label>
                                <select name="enable_content_watermark" id="enable_content_watermark"
                                    class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('enable_content_watermark', '0') == '1' ? 'selected' : '' }}>
                                        Enabled</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('enable_content_watermark', '0') == '0' ? 'selected' : '' }}>
                                        Disabled</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="auto_generate_thumbnails" class="form-label">Auto Generate Thumbnails</label>
                                <select name="auto_generate_thumbnails" id="auto_generate_thumbnails"
                                    class="form-control">
                                    <option value="1"
                                        {{ \App\Models\Setting::get('auto_generate_thumbnails', '1') == '1' ? 'selected' : '' }}>
                                        Enabled</option>
                                    <option value="0"
                                        {{ \App\Models\Setting::get('auto_generate_thumbnails', '1') == '0' ? 'selected' : '' }}>
                                        Disabled</option>
                                </select>
                                <small class="form-text text-muted">Automatically generate thumbnails from video
                                    content</small>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button class="btn btn-primary" type="submit">Save Content Settings</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // File size validation
            const fileSizeInput = document.getElementById('max_file_size_mb');
            fileSizeInput.addEventListener('change', function() {
                const value = parseInt(this.value);
                if (value > 2048) {
                    this.value = 2048;
                    alert('Maximum file size cannot exceed 2048 MB');
                }
            });
        });
    </script>
@endsection
