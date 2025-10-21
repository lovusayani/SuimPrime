@extends('layouts.admin')

@section('title', 'Edit Actor')

@section('content')
    <!-- Back button -->
    <a href="{{ route('admin.actors.index') }}" class="btn btn-link d-inline-flex align-items-center gap-1 p-0 mb-3 fs-3">
        <i class="ph ph-caret-double-left"></i> Back
    </a>

    <p class="text-danger" id="error_message"></p>

    <form class="requires-validation" method="POST" action="{{ route('admin.actors.update', $actor->id) }}"
        enctype="multipart/form-data" id="form-submit" novalidate>
        @csrf
        @method('PUT')

        <div class="card">
            <div class="card-body">
                <div class="row gy-3">

                    <!-- IMAGE UPLOAD -->
                    <div class="col-md-12 col-xl-3 position-relative">
                        <label class="form-label">Image</label>
                        <div class="input-group btn-file-upload">
                            <button type="button" class="input-group-text form-control" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-image-container="selectedImageContainerThumbnail"
                                data-hidden-input="thumbnail">
                                <i class="ph ph-image"></i> Choose Media
                            </button>
                            <input type="text" class="form-control" id="thumbnail_input"
                                value="{{ old('thumbnail', $actor->thumbnail ?? '') }}" placeholder="Select Media" readonly
                                data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-image-container="selectedImageContainerThumbnail">
                        </div>
                        <div class="uploaded-image" id="selectedImageContainerThumbnail">
                            @if (!empty($actor->thumbnail))
                                <img src="{{ $actor->thumbnail }}" class="img-fluid mt-2" style="max-height: 120px;">
                            @endif
                        </div>
                    </div>
                    <input type="hidden" name="thumbnail" id="thumbnail"
                        value="{{ old('thumbnail', $actor->thumbnail ?? '') }}">

                    <!-- ACTOR DETAILS -->
                    <div class="col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                value="{{ old('name', $actor->name) }}" placeholder="e.g. Henry Williams" required>
                            <div class="invalid-feedback">Name field is required</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control"
                                value="{{ old('designation', $actor->designation) }}" placeholder="e.g. Actor / Director">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="dob">Date Of Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control"
                                value="{{ old('dob', $actor->dob ? $actor->dob->format('Y-m-d') : '') }}">
                        </div>
                    </div>

                    <!-- LOCATION AND BIO -->
                    <div class="col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="birth_place">Birth Place</label>
                            <input type="text" name="birth_place" id="birth_place" class="form-control"
                                value="{{ old('birth_place', $actor->birth_place) }}" placeholder="e.g. New York, USA">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <label class="form-label" for="bio">Bio <span class="text-danger">*</span></label>
                            <span class="text-primary cursor-pointer" id="GenrateshortDescription">
                                <i class="ph ph-info" data-bs-toggle="tooltip" title="Generate description with AI"></i>
                                Generate Description with AI
                            </span>
                        </div>
                        <textarea name="bio" id="bio" class="form-control" rows="6"
                            placeholder="e.g. Henry Williams is an American actor known for..." required>{{ old('bio', $actor->bio) }}</textarea>
                        <div class="invalid-feedback">Bio field is required</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mb-5">
            <button class="btn btn-md btn-primary float-right" type="submit" id="submit-button">Update</button>
        </div>
    </form>

    <!-- MEDIA MODAL -->
    @include('admin.shared.media-modal')

    @push('scripts')
        <script>
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

            // Handle media selection
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
