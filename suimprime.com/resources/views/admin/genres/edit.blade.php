@extends('layouts.admin')
@section('title', 'Edit Genre')
@section('content')
    <div class="container-fluid content-inner pb-0" id="page_layout">
        <!-- Back Button -->
        <a href="{{ route('admin.genres.index') }}" class="btn btn-link d-inline-flex align-items-center gap-1 mb-3 fs-3">
            <i class="ph ph-caret-double-left"></i> Back
        </a>
        <!-- Edit Form -->
        <form class="requires-validation" method="POST" action="{{ route('admin.genres.update', $genre->id) }}"
            enctype="multipart/form-data" id="form-submit" novalidate>
            @csrf
            @method('PUT')
            <div class="card">
                <div class="card-body">
                    <div class="row gy-3">
                        <!-- Image Upload -->
                        <div class="col-md-12 col-xl-3 position-relative">
                            <label class="form-label" for="Image">Image</label>
                            <div class="input-group btn-file-upload">
                                <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal" data-image-container="selectedImageContainerThumbnail"
                                    data-hidden-input="file_url_image">
                                    <i class="ph ph-image"></i> Choose Media to Upload
                                </button>
                                <input type="hidden" name="thumbnail" id="file_url_image"
                                    value="{{ old('thumbnail', $genre->thumbnail ?? '') }}">

                            </div>
                            <div class="uploaded-image" id="selectedImageContainerThumbnail">
                                @if ($genre->image)
                                    <img src="{{ asset('storage/' . $genre->image) }}" class="img-fluid mt-2">
                                @endif
                            </div>
                            @if ($genre->thumbnail)
                                <img src="{{ asset('storage/' . $genre->thumbnail) }}" class="img-fluid mt-2">
                            @endif
                            <div class="invalid-feedback d-block" id="file_url-error">Image field is required</div>
                        </div>

                        <!-- Genre Details -->
                        <div class="col-xl-9">
                            <div class="row gy-3">
                                <!-- Name & Status -->
                                <div class="col-md-6 col-lg-6">
                                    <div class="mb-3">
                                        <label class="form-label" for="name">Name <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="name" id="name"
                                            placeholder="e.g. Action Movie" required
                                            value="{{ old('name', $genre->name) }}">
                                        <div class="invalid-feedback" id="name-error">Name field is required</div>
                                    </div>

                                    <div>
                                        <label class="form-label" for="status">Status</label>
                                        <div class="d-flex justify-content-between align-items-center form-control">
                                            <label class="form-label mb-0">Active</label>
                                            <div class="form-check form-switch">
                                                <input type="hidden" name="status" value="0">
                                                <input class="form-check-input" type="checkbox" name="status"
                                                    value="1" {{ $genre->status ? 'checked' : '' }}>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Description -->
                                <div class="col-md-6 col-lg-6">
                                    <label class="form-label" for="description">Description <span
                                            class="text-danger">*</span></label>
                                    <textarea class="form-control" name="description" id="description"
                                        placeholder="e.g. Watch free Action movies online in HD" rows="5" required>{{ old('description', $genre->description) }}</textarea>
                                    <div class="invalid-feedback" id="description-error">Description field is required</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Submit -->
            <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mt-3">
                <button class="btn btn-md btn-primary" type="submit" id="submit-genres-button">Update</button>
            </div>
        </form>
        <!-- Shared Media Modal -->
        @include('admin.shared.media-modal', ['modalId' => 'exampleModal'])
    </div>

    //https://lmax.sprsinfotech.in/storage//media/o7tjS0zMY2EUSa8xvDtt4fu5gqfHg94pasSIAf33.jpg
    
    @push('scripts')
        <script>
            // Media selection for edit page
            document.addEventListener('click', function(e) {
                const mediaItem = e.target.closest('.media-item');
                if (mediaItem) {
                    const url = mediaItem.dataset.url;
                    const container = document.getElementById('selectedImageContainerThumbnail');
                    const hiddenInput = document.getElementById('file_url_image');
                    container.innerHTML = `<img src="${url}" class="img-fluid mt-2">`;
                    hiddenInput.value = url;
                    document.getElementById('thumbnail_input').value = url.split('/').pop();

                    // Hide modal
                    const modalEl = document.getElementById('exampleModal');
                    const modalInstance = bootstrap.Modal.getInstance(modalEl);
                    modalInstance.hide();
                }
            });
            // Form validation
            document.querySelectorAll('.requires-validation').forEach(form => {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                });
            });
        </script>
    @endpush
@endsection
