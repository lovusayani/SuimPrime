@php($title = 'Edit Plan')
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.plans.index') }}">Plans</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <div class="card-main mb-5">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.plans.update', $plan) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="row gy-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name"
                                    value="{{ old('name', $plan->name) }}" required>
                                @error('name')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="duration">Duration</label>
                                <input type="text" class="form-control" id="duration" name="duration"
                                    value="{{ old('duration', $plan->duration) }}"
                                    placeholder="e.g., 1 week, 1 month, 1 year">
                                @error('duration')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="level">Level</label>
                                <select class="form-control" id="level" name="level">
                                    <option value="1" {{ old('level', $plan->level) == 1 ? 'selected' : '' }}>Level 1
                                    </option>
                                    <option value="2" {{ old('level', $plan->level) == 2 ? 'selected' : '' }}>Level 2
                                    </option>
                                    <option value="3" {{ old('level', $plan->level) == 3 ? 'selected' : '' }}>Level 3
                                    </option>
                                    <option value="4" {{ old('level', $plan->level) == 4 ? 'selected' : '' }}>Level 4
                                    </option>
                                    <option value="5" {{ old('level', $plan->level) == 5 ? 'selected' : '' }}>Level 5
                                    </option>
                                </select>
                                @error('level')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                                <input type="number" step="0.01" min="0" class="form-control" id="price"
                                    name="price" value="{{ old('price', $plan->price) }}" required>
                                @error('price')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="discount">Discount</label>
                                <input type="number" step="0.01" min="0" class="form-control" id="discount"
                                    name="discount" value="{{ old('discount', $plan->discount) }}">
                                @error('discount')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="status">Status</label>
                                <div class="form-check form-switch">
                                    <input class="form-check-input" type="checkbox" id="status" name="status"
                                        value="1" {{ old('status', $plan->status) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="status">Active</label>
                                </div>
                                @error('status')
                                    <div class="text-danger small">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mt-4 d-flex gap-2">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.plans.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
