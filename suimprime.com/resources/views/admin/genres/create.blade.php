@extends('layouts.admin')

@section('title', 'Add Genre')

@section('content')
    <!-- Back Button -->
    <a href="{{ route('admin.genres.index') }}" class="btn btn-link d-inline-flex align-items-center gap-1 mb-3 fs-3">
        <i class="ph ph-caret-double-left"></i> Back
    </a>

    <form method="POST" action="{{ route('admin.genres.store') }}" enctype="multipart/form-data" id="form-submit"
        class="requires-validation" novalidate>
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row gy-3">
                    <!-- Image / Thumbnail -->
                    <div class="col-md-12 col-xl-3 position-relative">
                        <label class="form-label">Image</label>
                        <div class="input-group btn-file-upload">
                            <button type="button" class="input-group-text form-control" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-image-container="selectedImageContainerThumbnail"
                                data-hidden-input="thumbnail">
                                <i class="ph ph-image"></i> Choose Media
                            </button>
                            <input type="text" class="form-control" id="thumbnail_input" placeholder="Select Media"
                                readonly data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-image-container="selectedImageContainerThumbnail">
                        </div>
                        <div class="uploaded-image" id="selectedImageContainerThumbnail"></div>
                    </div>
                    <input type="hidden" name="thumbnail" id="thumbnail" value="">

                    <!-- Name, Status, Description -->
                    <div class="col-xl-9">
                        <div class="row gy-3">
                            <div class="col-md-6 col-lg-6">
                                <div class="mb-3">
                                    <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="e.g. Action Movie" required>
                                    <div class="invalid-feedback">Name field is required</div>
                                </div>

                                <label class="form-label">Status</label>
                                <div class="d-flex justify-content-between align-items-center form-control">
                                    <label class="mb-0">Active</label>
                                    <div class="form-check form-switch">
                                        <input type="hidden" name="status" value="0">
                                        <input class="form-check-input" type="checkbox" name="status" value="1"
                                            checked>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6 col-lg-6">
                                <label class="form-label" for="description">Description <span
                                        class="text-danger">*</span></label>
                                <textarea class="form-control" name="description" id="description" rows="5" placeholder="Describe the genre..."
                                    required></textarea>
                                <div class="invalid-feedback">Description field is required</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
    @include('admin.shared.media-modal') {{-- Your media modal partial --}}

@push('scripts')
    <script>
        //Client-side validation
        (() => {
            'use strict';
            const forms = document.querySelectorAll('.requires-validation');
            Array.from(forms).forEach(form => {
                form.addEventListener('submit', event => {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        })();
        //Handle media selection
        document.addEventListener('click', function(e) {
            if (e.target.closest('.iq-media-images img, .iq-media-images video')) {
                const media = e.target.closest('.iq-media-images').querySelector('img, video');
                const url = media.tagName === 'IMG' ? media.src : media.querySelector('source').src;
                document.getElementById('thumbnail').value = url;
                document.getElementById('thumbnail_input').value = url;
                document.getElementById('selectedImageContainerThumbnail').innerHTML =
                    `<img src="${url}" class="img-fluid mt-2" style="max-height: 120px;">`;
                const modalEl = document.getElementById('exampleModal');
                const modal = bootstrap.Modal.getInstance(modalEl);
                modal.hide();
            }
        });
    </script>
@endpush
@endsection
