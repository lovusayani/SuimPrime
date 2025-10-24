@extends('layouts.admin')

@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <a href="{{ route('admin.vastads.index') }}" class="btn btn-link d-inline-flex align-items-center gap-1 p-0 mb-3 fs-3">
            <i class="ph ph-caret-double-left"></i>Back
        </a>

        <style>
            .multi-select-box span.select2-selection.select2-selection--multiple {
                height: 100px !important;
                overflow: auto !important;
            }
        </style>

        <form class="requires-validation" method="POST"
            action="{{ isset($vastAd) ? route('admin.vastads.update', $vastAd->id) : route('admin.vastads.store') }}" id="form-submit"
            enctype="multipart/form-data" data-toggle="validator">
            @csrf
            @if (isset($vastAd))
                @method('PUT')
            @endif

            <div class="card">
                <div class="card-body">
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

                    <div class="row gy-3">
                        <!-- Ad Name -->
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="name">Ad Name <span class="text-danger">*</span></label>
                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                                id="name" value="{{ old('name', $vastAd->name ?? '') }}" placeholder="Enter Ad Name"
                                maxlength="100" required>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Ad Type -->
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label">
                                Ad Type <span class="text-danger">*</span>
                                <span tabindex="0" data-bs-toggle="tooltip" data-bs-placement="right"
                                    style="cursor: pointer;"
                                    title="VAST ads are not supported for the Vimeo and Embedded types in the Movie, Episode, and Video.">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                            </label>
                            <select class="form-control select2 @error('type') is-invalid @enderror" name="type"
                                id="type" required>
                                <option value="">Select Type</option>
                                <option value="pre-roll"
                                    {{ old('type', $vastAd->type ?? '') == 'pre-roll' ? 'selected' : '' }}>Pre-roll</option>
                                <option value="mid-roll"
                                    {{ old('type', $vastAd->type ?? '') == 'mid-roll' ? 'selected' : '' }}>Mid-roll</option>
                                <option value="post-roll"
                                    {{ old('type', $vastAd->type ?? '') == 'post-roll' ? 'selected' : '' }}>Post-roll
                                </option>
                                <option value="overlay"
                                    {{ old('type', $vastAd->type ?? '') == 'overlay' ? 'selected' : '' }}>Overlay</option>
                            </select>
                            @error('type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- VAST Ad URL -->
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label">
                                VAST Ad URL <span class="text-danger">*</span>
                                <span tabindex="0" data-bs-toggle="tooltip" data-bs-placement="right"
                                    style="cursor: pointer;"
                                    title="Supports only XML URL. Example: https://example.com/ad.xml. Only HTTP/HTTPS links ending with .xml are accepted.">
                                    <i class="fas fa-info-circle"></i>
                                </span>
                            </label>
                            <input class="form-control @error('url') is-invalid @enderror" type="text" name="url"
                                id="url" value="{{ old('url', $vastAd->url ?? '') }}" placeholder="Enter Ad Tag URL"
                                required>
                            @error('url')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="start_date">Start Date <span class="text-danger">*</span></label>
                            <input class="form-control datetimepicker @error('start_date') is-invalid @enderror"
                                type="text" name="start_date" id="startDateInput"
                                value="{{ old('start_date', isset($vastAd) ? $vastAd->start_date->format('Y-m-d H:i') : '') }}"
                                placeholder="Start Date" required>
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- End Date -->
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="end_date">End Date <span class="text-danger">*</span></label>
                            <input class="form-control datetimepicker @error('end_date') is-invalid @enderror"
                                type="text" name="end_date" id="endDateInput"
                                value="{{ old('end_date', isset($vastAd) ? $vastAd->end_date->format('Y-m-d H:i') : '') }}"
                                placeholder="End Date" required>
                            @error('end_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="invalid-feedback" id="date-range-error" style="display: none;">End Date must be
                                after Start Date</div>
                        </div>

                        <!-- Target Type -->
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="target_type">Target Type <span
                                    class="text-danger">*</span></label>
                            <select class="form-control select2 @error('target_type') is-invalid @enderror"
                                name="target_type" id="target_type" required>
                                <option value="">Select target type</option>
                                <option value="video"
                                    {{ old('target_type', $vastAd->target_type ?? '') == 'video' ? 'selected' : '' }}>Video
                                </option>
                                <option value="movie"
                                    {{ old('target_type', $vastAd->target_type ?? '') == 'movie' ? 'selected' : '' }}>Movie
                                </option>
                                <option value="tvshow"
                                    {{ old('target_type', $vastAd->target_type ?? '') == 'tvshow' ? 'selected' : '' }}>TV
                                    Show</option>
                            </select>
                            @error('target_type')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Target Selection -->
                        <div class="col-md-6 col-lg-4 multi-select-box">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <label class="form-label mb-0" for="target_selection">Target Selection <span
                                        class="text-danger">*</span></label>
                                <div class="form-check m-0">
                                    <input type="checkbox" class="form-check-input" id="select-all-targets"
                                        value="1">
                                    <label class="form-check-label ms-1" for="select-all-targets">Select All</label>
                                </div>
                            </div>
                            <select class="form-control select2 @error('target_selection') is-invalid @enderror"
                                name="target_selection[]" id="target_selection" multiple
                                data-placeholder="Select target selection" required>
                                <!-- Options will be loaded dynamically based on target_type -->
                            </select>
                            @error('target_selection')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Status -->
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="status">Status</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <span id="status-label" class="form-label mb-0 text-body">
                                    {{ old('status', isset($vastAd) ? $vastAd->status : 1) ? 'Active' : 'Inactive' }}
                                </span>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status"
                                        value="1"
                                        {{ old('status', isset($vastAd) ? $vastAd->status : 1) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mb-5">
                <button class="btn btn-md btn-primary float-right" type="submit" id="submit-button">
                    {{ isset($vastAd) ? 'Update' : 'Save' }}
                </button>
            </div>
        </form>

        <div id="form-loader"
            style="display:none; position:fixed; top:0; left:0; width:100vw; height:100vh; background:rgba(255,255,255,0.7); z-index:9999; align-items:center; justify-content:center;">
            <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                // Initialize Select2
                $('.select2').select2();

                // Initialize Flatpickr for date inputs
                flatpickr('.datetimepicker', {
                    enableTime: true,
                    dateFormat: 'Y-m-d H:i',
                    time_24hr: true
                });

                // Status switch label update
                $('#status').on('change', function() {
                    $('#status-label').text(this.checked ? 'Active' : 'Inactive');
                });

                // Target type change - load target selection options
                $('#target_type').on('change', function() {
                    var targetType = $(this).val();
                    loadTargetSelectionOptions(targetType);
                });

                // Select all targets
                $('#select-all-targets').on('change', function() {
                    if (this.checked) {
                        $('#target_selection option').prop('selected', true);
                    } else {
                        $('#target_selection option').prop('selected', false);
                    }
                    $('#target_selection').trigger('change');
                });

                // Load target selection options based on target type
                function loadTargetSelectionOptions(targetType) {
                    if (!targetType) {
                        $('#target_selection').html('<option value="">Select target type first</option>').trigger(
                            'change');
                        return;
                    }

                    // Show loader
                    $('#target_selection').html('<option>Loading...</option>').trigger('change');

                    // AJAX call to get options based on target type
                    $.ajax({
                        url: '/admin/vastads/get-targets',
                        type: 'GET',
                        data: {
                            type: targetType
                        },
                        success: function(response) {
                            var options = '';
                            if (response.data && response.data.length > 0) {
                                response.data.forEach(function(item) {
                                    var selected = '';
                                    @if (isset($vastAd) && $vastAd->target_selection)
                                        var selectedIds = {!! json_encode($vastAd->target_selection) !!};
                                        if (selectedIds.includes(item.id.toString()) || selectedIds
                                            .includes(item.id)) {
                                            selected = 'selected';
                                        }
                                    @endif
                                    options += '<option value="' + item.id + '" ' + selected + '>' +
                                        item.name + '</option>';
                                });
                            } else {
                                options = '<option value="">No items available</option>';
                            }
                            $('#target_selection').html(options).trigger('change');
                        },
                        error: function() {
                            $('#target_selection').html('<option value="">Error loading options</option>')
                                .trigger('change');
                        }
                    });
                }

                // Form validation
                $('#form-submit').on('submit', function(e) {
                    var startDate = new Date($('#startDateInput').val());
                    var endDate = new Date($('#endDateInput').val());

                    if (endDate <= startDate) {
                        e.preventDefault();
                        $('#date-range-error').show();
                        $('#endDateInput').addClass('is-invalid');
                        return false;
                    }

                    var targetSelection = $('#target_selection').val();
                    if (!targetSelection || targetSelection.length === 0) {
                        e.preventDefault();
                        $('#target_selection').addClass('is-invalid');
                        alert('Please select at least one target.');
                        return false;
                    }

                    // Show loader
                    $('#form-loader').css('display', 'flex');
                });

                // Date validation on change
                $('#endDateInput').on('change', function() {
                    var startDate = new Date($('#startDateInput').val());
                    var endDate = new Date($(this).val());

                    if (endDate <= startDate) {
                        $('#date-range-error').show();
                        $(this).addClass('is-invalid');
                    } else {
                        $('#date-range-error').hide();
                        $(this).removeClass('is-invalid');
                    }
                });

                // Initialize tooltips
                var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });

                // Load target options on page load if editing
                @if (isset($vastAd))
                    loadTargetSelectionOptions('{{ $vastAd->target_type }}');
                @endif
            });
        </script>
    @endpush
@endsection
