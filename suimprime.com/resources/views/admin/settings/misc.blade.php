@extends('layouts.admin')

@section('title', 'Misc Settings')

@section('content')
@php $section = request('section', 'misc'); @endphp

<div class="row">
    <div class="col-md-3">
        @includeIf('admin.partials.settings_sidebar')
    </div>

    <div class="col-md-9">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Misc Settings</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('admin.settings.logo.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label for="google_analytics" class="form-label">Google Analytics (Tracking ID or Script)</label>
                        <textarea name="google_analytics" id="google_analytics" class="form-control" rows="4">{{ \App\Models\Setting::get('google_analytics', '') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="default_language" class="form-label">Default Language</label>
                        <input type="text" name="default_language" id="default_language" class="form-control" value="{{ \App\Models\Setting::get('default_language', 'en') }}">
                    </div>

                    <div class="mb-3">
                        <label for="default_time_zone" class="form-label">Default Time Zone</label>
                        <input type="text" name="default_time_zone" id="default_time_zone" class="form-control" value="{{ \App\Models\Setting::get('default_time_zone', 'UTC') }}">
                    </div>

                    <div class="d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">Save Misc Settings</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
