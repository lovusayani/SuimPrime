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
                <form class="requires-validation" method="POST" action="{{ route('admin.settings.notificationConfig.update') }}" data-toggle="validator" id="form-submit" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header">
                            <h4><i class="fa-solid fa-bell"></i> Notification Configuration</h4>
                        </div>
                        <div class="card-body">
                            <div class="row gy-3">

                                <div class="col-lg-4">
                                    <label class="form-label">Expiry Plan <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="expiry_plan" id="expiry_plan" placeholder="Expiry Plan Days" value="{{ old('expiry_plan', \App\Models\Setting::get('expiry_plan', '')) }}" required>
                                    <div class="invalid-feedback" id="name-error">Expiry plan is required</div>
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Upcoming <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="upcoming" id="upcoming" placeholder="Upcoming Days" value="{{ old('upcoming', \App\Models\Setting::get('upcoming', '')) }}" required>
                                    <div class="invalid-feedback" id="name-error">Upcoming is required</div>
                                </div>

                                <div class="col-lg-4">
                                    <label class="form-label">Continue Watch <span class="text-danger">*</span></label>
                                    <input class="form-control" type="number" name="continue_watch" id="continue_watch" placeholder="Continue Watch Days" value="{{ old('continue_watch', \App\Models\Setting::get('continue_watch', '')) }}" required>
                                    <div class="invalid-feedback" id="name-error">Continue watch is required</div>
                                </div>

                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-primary" type="submit" id="submit-button">Save</button>
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
