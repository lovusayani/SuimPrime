<!-- Media Upload / Library Modal -->
<div class="modal fade modal-xl" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Select Media</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <nav>
                    <div class="mb-3 nav nav-underline nav-tabs justify-content-between p-0 border-bottom rounded-0 bg-transparent"
                        id="nav-tab" role="tablist">
                        <div class="d-flex align-items-center gap-3">
                            <button class="nav-link rounded-0" id="nav-upload-files-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-upload" type="button" role="tab" aria-controls="nav-upload"
                                aria-selected="false">Upload File</button>
                            <button class="nav-link rounded-0 active" id="nav-media-library-tab" data-bs-toggle="tab"
                                data-bs-target="#nav-media" type="button" role="tab" aria-controls="nav-media"
                                aria-selected="true">Media Library</button>
                        </div>
                        <div class="media-search py-2" id="media-search-container">
                            <div class="d-flex">
                                <input type="text" id="media-search" class="form-control"
                                    placeholder="Search media...">
                                <button class="btn text-danger close-icon d-none px-2" type="button"
                                    id="clear-search"><i class="ph ph-x"></i></button>
                            </div>
                        </div>
                    </div>
                </nav>

                <div class="tab-content iq-tab-fade-up" id="nav-tab-content">
                    <!-- Upload Tab -->
                    {{-- <div class="tab-pane fade" id="nav-upload" role="tabpanel" aria-labelledby="nav-upload-files-tab">
                        <div class="card m-0 bg-transparent">
                            <div class="input-group btn-file-upload">
                                <button class="input-group-text form-control" type="button"
                                    onclick="document.getElementById('file_url_media').click()" style="height:16rem"><i
                                        class="ph ph-image"></i>Choose Media to Upload</button>
                                <input class="form-control" type="file" name="file_url[]" id="file_url_media"
                                    accept=".jpeg,.jpg,.png,.gif,.mov,.mp4,.avi" multiple style="display:none;"
                                    required>
                            </div>
                            <div class="uploaded-image" id="selectedImageContainerThumbnail"></div>
                            <div id="uploadedImages" class="my-3"></div>
                            <div class="invalid-feedback text-center" id="file_url_media-error">File field is required
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-md btn-primary mt-2" type="button" id="submitButton"
                                disabled>Save</button>
                        </div>
                    </div> --}}

                    <div class="tab-pane fade" id="nav-upload" role="tabpanel" aria-labelledby="nav-upload-files-tab">
                        <form action="#" method="POST" enctype="multipart/form-data" id="form-submit">
                            @csrf
                            <div class="col-12 text-center mb-3">
                                <div class="input-group btn-file-upload">
                                    <button class="input-group-text form-control" type="button"
                                        onclick="document.getElementById('file_url_media').click()"
                                        style="height:16rem">
                                        <i class="ph ph-image"></i> Choose Media to Upload
                                    </button>
                                    <input type="file" class="form-control" name="file_url[]" id="file_url_media"
                                        accept=".jpeg,.jpg,.png,.gif,.mov,.mp4,.avi" multiple required
                                        style="display: none;">
                                </div>
                                <div class="uploaded-image" id="selectedImageContainerThumbnail"></div>
                                <div class="invalid-feedback" id="file_url_media-error">Please upload a file.</div>
                            </div>
                            <div id="uploadedImages" class="mb-3"></div>
                            <div class="text-end">
                                <button class="btn btn-md btn-primary float-right" type="submit" id="submit-button"
                                    disabled>Upload</button>
                            </div>
                        </form>
                    </div>

                    <!-- Media Library Tab -->
                    <div class="tab-pane fade show active" id="nav-media" role="tabpanel"
                        aria-labelledby="nav-media-library-tab" style="position: relative;">
                        <div class="row">
                            <div class="col-md-12 d-flex justify-content-center gap-5 flex-wrap media-scroll"
                                id="mediaLibraryContent">
                                <div class="text-center">
                                    <h6 id="no_data" class="d-none text-center">No Data Available</h6>
                                </div>
                                <div class="d-flex gap-5 flex-wrap justify-content-center" id="media-container"></div>
                                <div id="loading-spinner" class="text-center mt-3"
                                    style="display: none; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                                    <div class="spinner-border text-primary" role="status"><span
                                            class="sr-only">Loading...</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="text-end">
                            <button class="btn btn-md btn-primary mt-2" id="mediaSubmitButton"
                                type="button">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- JS Section --}}
@push('scripts')
    <script>
        $(document).ready(function() {
            // Function to clear cache & config
            const clearCacheConfigUrl = '{{ route('clear.cache.config') }}'; // Use your named route
            fetch(clearCacheConfigUrl, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => console.log(data.message))
                .catch(error => console.error('Error clearing cache:', error));
        });
    </script>

    <script src="{{ asset('assets/js/flatpickr.min.js') }}"></script>
    <script src="{{ asset('/assets/js/file_media.js') }}"></script>

    {{-- MEDIA CONTAINER LOAD --}}
    <script></script>
    <script>
        document.getElementById('file_url_media').addEventListener('change', function() {
            const saveButton = document.getElementById('submit-button');
            var fileError = document.getElementById('file_url_media-error');
            const allowedExtensions = ['.jpeg', '.jpg', '.png', '.gif', '.mov', '.mp4', '.avi'];

            if (this.files.length > 0) {
                let isValid = true;
                let invalidFiles = [];

                // Check each selected file
                for (let i = 0; i < this.files.length; i++) {
                    const file = this.files[i];
                    const fileName = file.name.toLowerCase();
                    const fileExtension = fileName.substring(fileName.lastIndexOf('.'));

                    // Check if file type is allowed
                    if (!allowedExtensions.includes(fileExtension)) {
                        isValid = false;
                        invalidFiles.push(file.name);
                    }
                }

                if (isValid) {
                    document.getElementById('file_url_media').removeAttribute('required');
                    fileError.style.display = 'none';
                    fileError.textContent = '';
                    saveButton.removeAttribute('disabled');
                } else {
                    document.getElementById('file_url_media').setAttribute('required', 'required');
                    fileError.style.display = 'block';
                    const message = 'Invalid file type(s): :files. Only :extensions files are allowed.';
                    fileError.textContent = message.replace(':files', invalidFiles.join(', ')).replace(
                        ':extensions', allowedExtensions.join(', '));
                    saveButton.setAttribute('disabled', 'disabled');
                    // Clear the file input
                    this.value = '';
                }
            } else {
                document.getElementById('file_url_media').setAttribute('required', 'required');
                fileError.style.display = 'block';
                fileError.textContent = 'Please upload a file.';
                saveButton.setAttribute('disabled', 'disabled');
            }
        });

        /* document.addEventListener('DOMContentLoaded', function() {
            const submitButton = document.getElementById('submit-button');
            const fileInput = document.getElementById('file_url_media');
            const uploadedImagesContainer = document.getElementById('uploadedImages');
            const baseUrl = document.querySelector('meta[name="base-url"]').getAttribute('content');
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            window.uploadedFiles = [];

            // Track file selection
            fileInput.addEventListener('change', function() {
                const files = Array.from(fileInput.files);
                uploadedImagesContainer.innerHTML = '';
                window.uploadedFiles = [];

                files.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.classList.add('img-fluid', 'mb-2');
                        img.style.width = '150px';
                        img.style.height = '100px';

                        const closeBtn = document.createElement('div');
                        closeBtn.innerHTML = '&times;';
                        closeBtn.style.cursor = 'pointer';
                        closeBtn.style.position = 'absolute';
                        closeBtn.addEventListener('click', () => {
                            window.uploadedFiles[index].removed = true;
                            img.parentNode.remove();
                        });

                        const container = document.createElement('div');
                        container.style.position = 'relative';
                        container.appendChild(img);
                        container.appendChild(closeBtn);
                        uploadedImagesContainer.appendChild(container);

                        // Track file
                        window.uploadedFiles.push({
                            file: file,
                            removed: false
                        });
                    };
                    reader.readAsDataURL(file);
                });
            });

            // Handle form submission
            submitButton.addEventListener('click', function(e) {
                e.preventDefault();
                submitButton.disabled = true;
                submitButton.innerText = 'Uploading...';

                const formData = new FormData();
                const remainingFiles = window.uploadedFiles.filter(f => !f.removed);

                if (remainingFiles.length === 0) {
                    alert('Please select at least one file.');
                    submitButton.disabled = false;
                    submitButton.innerText = 'Upload';
                    return;
                }

                remainingFiles.forEach(f => {
                    formData.append('file_url[]', f.file);
                });

                // Send AJAX POST with credentials to keep session
                const xhr = new XMLHttpRequest();
                xhr.open('POST', `${baseUrl}/admin/media-library/store`, true);
                xhr.withCredentials = true; // send auth cookies
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);

                xhr.onload = function() {
                    if (xhr.status === 200) {
                        alert('Files uploaded successfully!');
                        fileInput.value = '';
                        uploadedImagesContainer.innerHTML = '';
                        window.uploadedFiles = [];
                    } else if (xhr.status === 419 || xhr.status === 401) {
                        alert('Authentication failed. Please login again.');
                    } else {
                        console.error('Upload failed:', xhr.responseText);
                        alert('Upload failed. Check console for details.');
                    }
                    submitButton.disabled = false;
                    submitButton.innerText = 'Upload';
                };

                xhr.onerror = function() {
                    alert('Network error. Upload failed.');
                    submitButton.disabled = false;
                    submitButton.innerText = 'Upload';
                };

                xhr.send(formData);
            });
        }); */
    </script>
@endpush
