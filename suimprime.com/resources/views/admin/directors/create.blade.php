@extends('layouts.admin')
@section('title', 'Add Director')
@section('content')
    <!-- Back button -->
    <a href="{{ route('admin.directors.index') }}" class="btn btn-link d-inline-flex align-items-center gap-1 p-0 mb-3 fs-3">
        <i class="ph ph-caret-double-left"></i> Back
    </a>

    <p class="text-danger" id="error_message"></p>

    <form class="requires-validation" method="POST" action="{{ route('admin.directors.store') }}" enctype="multipart/form-data"
        id="form-submit" novalidate>
        @csrf
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
                            <input type="text" class="form-control" id="thumbnail_input" placeholder="Select Media"
                                readonly data-bs-toggle="modal" data-bs-target="#exampleModal"
                                data-image-container="selectedImageContainerThumbnail">
                        </div>
                        <div class="uploaded-image" id="selectedImageContainerThumbnail"></div>
                    </div>
                    <input type="hidden" name="thumbnail" id="thumbnail" value="">

                    <!-- DIRECTOR DETAILS -->
                    <div class="col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="e.g. Christopher Nolan" required>
                            <div class="invalid-feedback">Name field is required</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="designation">Designation</label>
                            <input type="text" name="designation" id="designation" class="form-control"
                                placeholder="e.g. Film Director">
                        </div>

                        <div class="mb-3">
                            <label class="form-label" for="dob">Date Of Birth</label>
                            <input type="date" name="dob" id="dob" class="form-control"
                                placeholder="e.g. 1970-07-30">
                        </div>
                    </div>

                    <!-- LOCATION AND BIO -->
                    <div class="col-md-6 col-lg-4">
                        <div class="mb-3">
                            <label class="form-label" for="birth_place">Birth Place</label>
                            <input type="text" name="birth_place" id="birth_place" class="form-control"
                                placeholder="e.g. London, UK">
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
                            placeholder="e.g. Christopher Nolan is a British-American director known for..." required></textarea>
                        <div class="invalid-feedback">Bio field is required</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SUBMIT BUTTON -->
        <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mt-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>

    <!-- MEDIA MODAL -->
    @include('admin.shared.media-modal')

    @push('scripts')
        <script>
            (() => {
                'use strict';

                const form = document.getElementById('form-submit');
                const submitBtn = document.getElementById('submit-button');
                const errorMsg = document.getElementById('error_message');

                form.addEventListener('submit', async (event) => {
                    event.preventDefault();
                    event.stopPropagation();
                    form.classList.add('was-validated');
                    errorMsg.textContent = '';

                    if (!form.checkValidity()) {
                        console.warn('Form validation failed');
                        return;
                    }

                    submitBtn.disabled = true;
                    submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Saving...';

                    const formData = new FormData(form);

                    try {
                        const response = await fetch(form.action, {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                    .content
                            },
                            body: formData
                        });

                        const result = await response.json();

                        if (response.ok && result.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Saved!',
                                text: result.message || 'Director has been added successfully!',
                                timer: 2000,
                                showConfirmButton: false
                            });

                            form.reset();
                            form.classList.remove('was-validated');
                            document.getElementById('selectedImageContainerThumbnail').innerHTML = '';
                            submitBtn.disabled = false;
                            submitBtn.innerHTML = 'Save';
                        } else {
                            throw new Error(result.message || 'Something went wrong.');
                        }
                    } catch (error) {
                        console.error(error);
                        errorMsg.textContent = error.message;
                        Swal.fire({
                            icon: 'error',
                            title: 'Error!',
                            text: error.message
                        });
                        submitBtn.disabled = false;
                        submitBtn.innerHTML = 'Save';
                    }
                });

                // Handle media modal image select
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

            })();
        </script>
    @endpush
@endsection
