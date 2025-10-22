@extends('layouts.admin')

@section('title', 'Storage Settings')

@section('content')
<div class="row">
    <div class="col-md-4 col-lg-3">
        @includeIf('admin.partials.settings_sidebar')
    </div>
    <div class="col-md-8 col-lg-9">
        <div class="card card-accent-primary offcanvas-body mb-0">
            <div class="card-body">
                <div class="col-md-12 mb-3 d-flex justify-content-between">
                    <h5><i class="fa-solid fa-database"></i> Storage Settings</h5>
                </div>

                <form method="POST" action="{{ route('admin.settings.storage.update') }}" id="settings-form">
                    @csrf
                    <div class="form-group border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label m-0" for="local">Local Storage</label>
                            <input type="hidden" value="0" name="local">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input storage-checkbox" value="1" name="local" id="local" type="checkbox" {{ old('local', \App\Models\Setting::get('local', '1')) == '1' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div class="form-group border-bottom pb-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <label class="form-label m-0" for="s3">S3 Storage</label>
                            <input type="hidden" value="0" name="s3">
                            <div class="form-check form-switch m-0">
                                <input class="form-check-input storage-checkbox" value="1" name="s3" id="s3" type="checkbox" {{ old('s3', \App\Models\Setting::get('s3', '0')) == '1' ? 'checked' : '' }}>
                            </div>
                        </div>
                    </div>

                    <div id="aws-s3-fields" style="display: {{ old('s3', \App\Models\Setting::get('s3', '0')) == '1' ? 'block' : 'none' }};">
                        <div class="form-group">
                            <label for="aws_access_key">AWS Access Key ID <span class="text-danger">*</span></label>
                            <input type="text" name="aws_access_key" id="aws_access_key" class="form-control" value="{{ old('aws_access_key', \App\Models\Setting::get('aws_access_key', '')) }}">
                            <div class="invalid-feedback" id="aws_access_key_error" style="display: none;">AWS Access Key is required.</div>
                        </div>
                        <div class="form-group">
                            <label for="aws_secret_key">AWS Secret Access Key <span class="text-danger">*</span></label>
                            <input type="text" name="aws_secret_key" id="aws_secret_key" class="form-control" value="{{ old('aws_secret_key', \App\Models\Setting::get('aws_secret_key', '')) }}">
                            <div class="invalid-feedback" id="aws_secret_key_error" style="display: none;">AWS Secret Key is required.</div>
                        </div>
                        <div class="form-group">
                            <label for="aws_region">AWS Default Region <span class="text-danger">*</span></label>
                            <input type="text" name="aws_region" id="aws_region" class="form-control" value="{{ old('aws_region', \App\Models\Setting::get('aws_region', '')) }}">
                            <div class="invalid-feedback" id="aws_region_error" style="display: none;">AWS Region is required.</div>
                        </div>
                        <div class="form-group">
                            <label for="aws_bucket">AWS Bucket <span class="text-danger">*</span></label>
                            <input type="text" name="aws_bucket" id="aws_bucket" class="form-control" value="{{ old('aws_bucket', \App\Models\Setting::get('aws_bucket', '')) }}">
                            <div class="invalid-feedback" id="aws_bucket_error" style="display: none;">AWS Bucket is required.</div>
                        </div>
                        <div class="form-group">
                            <label for="aws_path_style">AWS Use Path Style Endpoint <span class="text-danger">*</span></label>
                            <select name="aws_path_style" id="aws_path_style" class="form-control">
                                <option value="false" {{ old('aws_path_style', \App\Models\Setting::get('aws_path_style', 'false')) == 'false' ? 'selected' : '' }}>False</option>
                                <option value="true" {{ old('aws_path_style', \App\Models\Setting::get('aws_path_style', 'false')) == 'true' ? 'selected' : '' }}>True</option>
                            </select>
                            <div class="invalid-feedback" id="aws_path_style_error" style="display: none;">AWS Endpoint is required.</div>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
$(document).ready(function() {
    // Handle S3 checkbox toggle
    $('#s3').on('change', function() {
        if ($(this).is(':checked')) {
            $('#aws-s3-fields').slideDown();
            $('#aws-s3-fields input, #aws-s3-fields select').prop('disabled', false);
        } else {
            $('#aws-s3-fields').slideUp();
            $('#aws-s3-fields input, #aws-s3-fields select').prop('disabled', true);
        }
    });

    // Ensure only one storage type is selected
    $('.storage-checkbox').on('change', function() {
        if ($(this).is(':checked')) {
            $('.storage-checkbox').not(this).prop('checked', false);
            
            // Hide AWS fields if local is selected
            if ($(this).attr('id') === 'local') {
                $('#aws-s3-fields').slideUp();
            }
        }
    });

    // Form validation
    $('#settings-form').on('submit', function(e) {
        let isValid = true;
        
        // If S3 is checked, validate AWS fields
        if ($('#s3').is(':checked')) {
            const awsFields = ['aws_access_key', 'aws_secret_key', 'aws_region', 'aws_bucket'];
            
            awsFields.forEach(function(fieldId) {
                const field = $('#' + fieldId);
                const errorDiv = $('#' + fieldId + '_error');
                
                if (!field.val().trim()) {
                    field.addClass('is-invalid');
                    errorDiv.show();
                    isValid = false;
                } else {
                    field.removeClass('is-invalid');
                    errorDiv.hide();
                }
            });
        }
        
        if (!isValid) {
            e.preventDefault();
            return false;
        }
    });

    // Remove error on input
    $('#aws-s3-fields input').on('input', function() {
        const fieldId = $(this).attr('id');
        $(this).removeClass('is-invalid');
        $('#' + fieldId + '_error').hide();
    });

    // Initialize on page load
    if (!$('#s3').is(':checked')) {
        $('#aws-s3-fields input, #aws-s3-fields select').prop('disabled', true);
    }
});
</script>
@endpush

@endsection
