@extends('layouts.admin')

@section('title', 'Create Movie')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Create Movie</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.settings.logo.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label>Logo Normal</label>
                    <input type="file" name="logo_normal">
                    <img src="{{ asset($logos['logo_normal']) }}" height="50">
                </div>
                <div>
                    <label>Logo Dark</label>
                    <input type="file" name="logo_dark">
                    <img src="{{ asset($logos['logo_dark']) }}" height="50">
                </div>
                <div>
                    <label>Logo Mini</label>
                    <input type="file" name="logo_mini">
                    <img src="{{ asset($logos['logo_mini']) }}" height="50">
                </div>
                <div>
                    <label>Logo Dark Mini</label>
                    <input type="file" name="logo_dark_mini">
                    <img src="{{ asset($logos['logo_dark_mini']) }}" height="50">
                </div>
                <button type="submit">Update Logos</button>
            </form>

        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endpush
