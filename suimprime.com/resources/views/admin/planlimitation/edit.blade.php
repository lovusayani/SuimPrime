@php($title = 'Edit Plan Limitation')
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.planlimitation.index') }}">Plan Limitation</a></li>
                <li class="breadcrumb-item active" aria-current="page">Edit</li>
            </ol>
        </nav>

        <a href="{{ route('admin.planlimitation.index') }}"
            class="btn btn-link d-inline-flex align-items-center gap-1 p-0 mb-3 fs-3"><i
                class="ph ph-caret-double-left"></i>Back</a>

        <form class="requires-validation" method="POST"
            action="{{ route('admin.planlimitation.update', $planlimitation) }}" enctype="multipart/form-data"
            data-toggle="validator" id="form-submit" novalidate>
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <div class="col-md-6">
                            <label class="form-label" for="title">Title <span class="text-danger">*</span></label>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" name="title"
                                id="title" value="{{ old('title', $planlimitation->title) }}"
                                placeholder="e.g.Supported devices" required>
                            @error('title')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6">
                            <label class="form-label" for="status">Status</label>
                            <div class="d-flex justify-content-between align-items-center form-control">
                                <label class="form-label mb-0 text-body" for="status">Active</label>
                                <div class="form-check form-switch">
                                    <input type="hidden" name="status" value="0">
                                    <input class="form-check-input" type="checkbox" name="status" id="status"
                                        value="1" {{ old('status', $planlimitation->status) ? 'checked' : '' }}>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <label class="form-label" for="description">Description <span
                                    class="text-danger">*</span></label>
                            <textarea class="form-control @error('description') is-invalid @enderror" name="description" id="description"
                                placeholder="e.g.Supported devices only TV, computer, mobile phone, tablet" required>{{ old('description', $planlimitation->description) }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mb-5">
                <button class="btn btn-md btn-primary float-right" type="submit" id="submit-button">Save</button>
            </div>
        </form>
    </div>
@endsection
