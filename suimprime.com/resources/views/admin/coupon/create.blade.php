@php
    $title = 'Create Coupon';
@endphp
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.coupon.index') }}">Coupons</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>

        <a href="{{ route('admin.coupon.index') }}"
            class="btn btn-link d-inline-flex align-items-center gap-1 p-0 mb-3 fs-3"><i
                class="ph ph-caret-double-left"></i>Back</a>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.coupon.store') }}" id="form-submit" method="POST">
                    @csrf
                    <div class="row">
                        <!-- Coupon Code -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="code">Coupon Code <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('code') is-invalid @enderror"
                                    id="code" name="code" value="{{ old('code') }}">
                                @error('code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Start Date -->
                        <div class="col-md-4">
                            <label class="form-label" for="start_date">Start Date <span class="text-danger">*</span></label>
                            <input class="form-control datetimepicker @error('start_date') is-invalid @enderror"
                                type="text" name="start_date" id="start_date" value="{{ old('start_date') }}"
                                placeholder="yyyy-mm-dd" readonly>
                            @error('start_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Expire Date -->
                        <div class="col-md-4">
                            <label class="form-label" for="expire_date">End Date <span class="text-danger">*</span></label>
                            <input class="form-control datetimepicker @error('expire_date') is-invalid @enderror"
                                type="text" name="expire_date" id="expire_date" value="{{ old('expire_date') }}"
                                placeholder="yyyy-mm-dd" readonly>
                            @error('expire_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <!-- Description -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label" for="description">Description <span
                                        class="text-danger">*</span></label>
                                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Write description here..." rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <!-- Discount Type -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="discount_type">Discount Type <span
                                                class="text-danger">*</span></label>
                                        <div class="d-flex align-items-center gap-3">
                                            <label class="form-check form-check-inline form-control px-5 cursor-pointer">
                                                <div>
                                                    <input type="radio" name="discount_type" id="discount_type_percentage"
                                                        value="percentage" class="form-check-input"
                                                        {{ old('discount_type', 'percentage') === 'percentage' ? 'checked' : '' }}>
                                                    <span class="form-check-label">Percentage</span>
                                                </div>
                                            </label>
                                            <label class="form-check form-check-inline form-control px-5 cursor-pointer">
                                                <div>
                                                    <input type="radio" name="discount_type" id="discount_type_fixed"
                                                        value="fixed" class="form-check-input"
                                                        {{ old('discount_type') === 'fixed' ? 'checked' : '' }}>
                                                    <span class="form-check-label">Fixed</span>
                                                </div>
                                            </label>
                                        </div>
                                        @error('discount_type')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Discount Amount -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="discount">Discount Amount <span
                                                class="text-danger">*</span></label>
                                        <input type="text" name="discount" id="discount"
                                            class="form-control @error('discount') is-invalid @enderror"
                                            placeholder="e.g., 15.50" value="{{ old('discount') }}">
                                        @error('discount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Subscription Plans -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="subscription_plan_ids">Subscription Plan <span
                                                class="text-danger">*</span></label>
                                        <select
                                            class="form-control select2 @error('subscription_plan_ids') is-invalid @enderror"
                                            name="subscription_plan_ids[]" id="subscription_plan_ids" multiple
                                            data-placeholder="Select plans">
                                            @foreach ($plans as $plan)
                                                <option value="{{ $plan->id }}"
                                                    {{ in_array($plan->id, old('subscription_plan_ids', [])) ? 'selected' : '' }}>
                                                    {{ $plan->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('subscription_plan_ids')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Status -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="form-label" for="status">Status</label>
                                        <div class="d-flex justify-content-between align-items-center form-control">
                                            <span id="status-text">Active</span>
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="status" value="0">
                                                <input class="form-check-input" type="checkbox" name="status"
                                                    id="status" value="1"
                                                    {{ old('status', true) ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.coupon.index') }}" class="btn btn-dark mr-3 me-4">Cancel</a>
            <button type="submit" form="form-submit" class="btn btn-danger">Save</button>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                if (window.flatpickr) {
                    flatpickr('.datetimepicker', {
                        dateFormat: 'Y-m-d'
                    });
                }
                if (window.jQuery && $.fn.select2) {
                    $('#subscription_plan_ids').select2();
                }
            });
        </script>
    @endpush
@endsection
