@php($title = 'Create Plan')
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.plans.index') }}">Plans</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>

        <a href="{{ route('admin.plans.index') }}"
            class="btn btn-link d-inline-flex align-items-center gap-1 p-0 mb-3 fs-3">
            <i class="ph ph-caret-double-left"></i>Back
        </a>

        <form class="requires-validation" method="POST" action="{{ route('admin.plans.store') }}" id="form-submit">
            @csrf

            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="name" id="name"
                                value="{{ old('name') }}" placeholder="e.g. Basic" required>
                            @error('name')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@else<div
                                    class="invalid-feedback">Name field is required</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="duration">Duration<span class="text-danger">*</span></label>
                            <select class="form-control select2" name="duration_type" id="duration" required>
                                <option value="">Select Duration</option>
                                <option value="week" {{ old('duration_type') == 'week' ? 'selected' : '' }}>Week</option>
                                <option value="month" {{ old('duration_type') == 'month' ? 'selected' : '' }}>Month
                                </option>
                                <option value="year" {{ old('duration_type') == 'year' ? 'selected' : '' }}>Year</option>
                            </select>
                            @error('duration_type')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@else<div
                                    class="invalid-feedback">Duration field is required</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="duration_value">Duration value<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="duration_value" id="duration_value"
                                value="{{ old('duration_value', 1) }}" placeholder="e.g. 1" min="1" required>
                            @error('duration_value')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@else<div
                                    class="invalid-feedback">Duration Value field is required</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="price" id="price"
                                value="{{ old('price') }}" step="0.01" placeholder="e.g. 199" min="0" required>
                            @error('price')
                            <div class="invalid-feedback d-block">{{ $message }}</div>@else<div
                                    class="invalid-feedback">Price field is required</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="discount">Discount</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label class="form-label mb-0 text-body">Active</label>
                                <div class="form-check form-switch">
                                    <input type="checkbox" id="discount-toggle" class="form-check-input" value="1"
                                        {{ old('discount') ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4">
                            <label class="form-label" for="status">Status</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label class="form-label mb-0 text-body">Active</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" name="status" id="status"
                                        value="1" {{ old('status', 1) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 {{ old('discount') ? '' : 'd-none' }}"
                            id="discountPercentageSection">
                            <label class="form-label" for="discount_percentage">Percentage<span
                                    class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="discount_percentage"
                                id="discount_percentage" value="{{ old('discount_percentage', 0) }}" min="0"
                                max="99" placeholder="Enter percentage">
                            @error('discount_percentage')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 col-lg-4 {{ old('discount') ? '' : 'd-none' }}" id="totalPriceSection">
                            <label class="form-label" for="total_price">Total Price</label>
                            <input class="form-control" type="number" name="total_price" id="total_price"
                                step="0.01" placeholder="Total Price" readonly>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="description">Description<span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control tinymce" name="description" id="description" rows="4"
                                placeholder="e.g. Supported devices only TV, computer, mobile phone, tablet" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex align-items-center justify-content-between mt-5 pt-4 mb-3">
                <h5>Plan Limits</h5>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label for="video-cast" class="form-label">Video Cast</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label for="video-cast" class="form-label mb-0 text-body">On</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="limits[1][planlimitation_id]" value="1">
                                    <input type="hidden" name="limits[1][limitation_slug]" value="video-cast">
                                    <input type="hidden" name="limits[1][value]" value="0">
                                    <input type="checkbox" name="limits[1][value]" id="video-cast"
                                        class="form-check-input" value="1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="ads" class="form-label">Ads</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label for="ads" class="form-label mb-0 text-body">On</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="limits[2][planlimitation_id]" value="2">
                                    <input type="hidden" name="limits[2][limitation_slug]" value="ads">
                                    <input type="hidden" name="limits[2][value]" value="0">
                                    <input type="checkbox" name="limits[2][value]" id="ads"
                                        class="form-check-input" value="1">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="device-limit" class="form-label">Device Limit</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label for="device-limit" class="form-label mb-0 text-body">On</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="limits[3][planlimitation_id]" value="3">
                                    <input type="hidden" name="limits[3][limitation_slug]" value="device-limit">
                                    <input type="hidden" name="limits[3][value]" value="0">
                                    <input type="checkbox" name="limits[3][value]" id="device-limit"
                                        class="form-check-input" value="1" onchange="toggleDeviceLimitInput()">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 d-none" id="deviceLimitInput">
                            <label class="form-label" for="device_limit_value">Device Limit</label>
                            <input class="form-control" type="number" name="device_limit_value" id="device_limit_value"
                                placeholder="e.g. 3" value="{{ old('device_limit_value', 0) }}" min="0">
                        </div>

                        <div class="col-md-6">
                            <label for="download-status" class="form-label">Download Status</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label for="download-status" class="form-label mb-0 text-body">On</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="limits[4][planlimitation_id]" value="4">
                                    <input type="hidden" name="limits[4][limitation_slug]" value="download-status">
                                    <input type="hidden" name="limits[4][value]" value="0">
                                    <input type="checkbox" name="limits[4][value]" id="download-status"
                                        class="form-check-input" value="1" onchange="toggleDownloadStatus()">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="row gy-4 d-none" id="DownloadStatus">
                                <div class="col-md-12"><label class="form-label">Download Quality Option</label></div>
                                @foreach (['480p', '720p', '1080p', '1440p', '2K', '4K', '8K'] as $quality)
                                    <div class="col-md-4">
                                        <div class="d-flex align-items-center justify-content-between form-control">
                                            <label for="{{ $quality }}"
                                                class="form-label mb-0">{{ $quality }}</label>
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="download_options[{{ $quality }}]"
                                                    value="0">
                                                <input type="checkbox" name="download_options[{{ $quality }}]"
                                                    id="{{ $quality }}" class="form-check-input" value="1">
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="supported-device-type" class="form-label">Supported Device Type</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label for="supported-device-type" class="form-label mb-0 text-body">On</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="limits[5][planlimitation_id]" value="5">
                                    <input type="hidden" name="limits[5][limitation_slug]"
                                        value="supported-device-type">
                                    <input type="hidden" name="limits[5][value]" value="0">
                                    <input type="checkbox" name="limits[5][value]" id="supported-device-type"
                                        class="form-check-input" value="1" onchange="toggleSupportedDeviceType()">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 d-none" id="supportedDeviceTypeInput">
                            <label class="form-label">Device Types</label>
                            <div class="d-flex flex-wrap gap-3">
                                @foreach (['tablet', 'laptop', 'mobile', 'tv'] as $device)
                                    <div class="form-check form-check-inline">
                                        <input type="hidden" name="supported_device_types[{{ $device }}]"
                                            value="0">
                                        <input type="checkbox" name="supported_device_types[{{ $device }}]"
                                            id="{{ $device }}" value="1" class="form-check-input">
                                        <label for="{{ $device }}"
                                            class="form-check-label">{{ ucfirst($device) }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="profile-limit" class="form-label">Profile Limit</label>
                            <div class="d-flex align-items-center justify-content-between form-control">
                                <label for="profile-limit" class="form-label mb-0 text-body">On</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="limits[6][planlimitation_id]" value="6">
                                    <input type="hidden" name="limits[6][limitation_slug]" value="profile-limit">
                                    <input type="hidden" name="limits[6][value]" value="0">
                                    <input type="checkbox" name="limits[6][value]" id="profile-limit"
                                        class="form-check-input" value="1" onchange="toggleProfileLimit()">
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 d-none" id="profileLimitInput">
                            <label class="form-label" for="profile_limit_value">Profile Limit</label>
                            <input class="form-control" type="number" name="profile_limit_value"
                                id="profile_limit_value" placeholder="e.g. 3"
                                value="{{ old('profile_limit_value', 0) }}" min="0">
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mb-5">
                <button class="btn btn-md btn-primary" type="submit" id="submit-button">Save</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('.select2').select2({
                width: '100%'
            });

            $('#discount-toggle').on('change', function() {
                if ($(this).is(':checked')) {
                    $('#discountPercentageSection, #totalPriceSection').removeClass('d-none');
                    calculateTotalPrice();
                } else {
                    $('#discountPercentageSection, #totalPriceSection').addClass('d-none');
                    $('#total_price').val('');
                }
            });

            $('#price, #discount_percentage').on('input', function() {
                if ($('#discount-toggle').is(':checked')) calculateTotalPrice();
            });

            function calculateTotalPrice() {
                const price = parseFloat($('#price').val()) || 0;
                const discountPercentage = parseFloat($('#discount_percentage').val()) || 0;
                const total = price - (price * discountPercentage / 100);
                $('#total_price').val(total.toFixed(2));
            }

            if (typeof tinymce !== 'undefined') {
                tinymce.init({
                    selector: '.tinymce',
                    height: 200,
                    menubar: true,
                    plugins: 'link code image',
                    toolbar: 'undo redo | formatselect | bold italic strikethrough | link | alignleft aligncenter alignright alignjustify | removeformat | code | image'
                });
            }
        });

        function toggleDeviceLimitInput() {
            $('#deviceLimitInput').toggleClass('d-none', !$('#device-limit').is(':checked'));
        }

        function toggleDownloadStatus() {
            $('#DownloadStatus').toggleClass('d-none', !$('#download-status').is(':checked'));
        }

        function toggleSupportedDeviceType() {
            $('#supportedDeviceTypeInput').toggleClass('d-none', !$('#supported-device-type').is(':checked'));
        }

        function toggleProfileLimit() {
            $('#profileLimitInput').toggleClass('d-none', !$('#profile-limit').is(':checked'));
        }
    </script>
@endpush
