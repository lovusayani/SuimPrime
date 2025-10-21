@push('scripts')
<script>
const baseUrl = "{{ url('/') }}";
const allowedExtensions = ['.jpeg', '.jpg', '.png', '.gif', '.mov', '.mp4', '.avi'];

// Enable submit button when file selected
const fileInput = document.getElementById('file_url_media');
const submitButton = document.getElementById('submit-button');
const fileError = document.getElementById('file_url_media-error');

fileInput.addEventListener('change', function() {
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

// Delete media function
function deleteImage(url, id) {
    Swal.fire({
        title: "Are you sure you want to delete?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
        reverseButtons: true,
    }).then((result) => {
        if (result.isConfirmed) {
            fetch(`${baseUrl}/media/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById(`media-${id}`).remove();
                        Swal.fire({
                            title: 'Deleted!',
                            text: 'Media deleted successfully.',
                            icon: 'success',
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire('Error!', 'Something went wrong.', 'error');
                    }
                });
        }
    });
}

// Search filter
document.getElementById('media-search').addEventListener('keyup', function() {
    const term = this.value.toLowerCase();
    document.querySelectorAll('#media-container .iq-media-images').forEach(item => {
        const name = item.querySelector('.media-title').textContent.toLowerCase();
        item.style.display = name.includes(term) ? 'block' : 'none';
    });
});

document.addEventListener('DOMContentLoaded', function() {
    const uploadButton = document.getElementById('nav-upload-files-tab');
    const libraryButton = document.getElementById('nav-media-library-tab');
    const searchContainer = document.getElementById('media-search-containers');
    // Function to toggle the search container visibility
    function toggleSearchVisibility() {
        if (uploadButton.classList.contains('active')) {
            searchContainer.style.display = 'none'; // Show the search bar
        } else {
            searchContainer.style.display = 'block'; // Hide the search bar
        }
    }
    // Initial toggle based on the active tab
    toggleSearchVisibility();
    // Add event listeners to toggle the visibility on tab change
    uploadButton.addEventListener('click', toggleSearchVisibility);
    libraryButton.addEventListener('click', toggleSearchVisibility);
});

// Clear search input
document.addEventListener('DOMContentLoaded', function() {

    const clearSearchButton = document.getElementById('clear-search');
    const mediaSearchInput = document.getElementById('media-search');


    function toggleClearButtonVisibility() {
        if (mediaSearchInput.value.length > 0) {
            clearSearchButton.classList.remove('d-none'); // Show the button
        } else {
            clearSearchButton.classList.add('d-none'); // Hide the button
            loadMedia();
        }
    }

    // Add event listener for input changes
    mediaSearchInput.addEventListener('input', toggleClearButtonVisibility);

    // Add event listener for clear button
    clearSearchButton.addEventListener('click', function() {
        mediaSearchInput.value = ''; // Clear the input field
        toggleClearButtonVisibility(); // Update the button visibility
        $('#media-search').trigger('input'); // Trigger input event to refresh search results
    });

    // Initialize the visibility on page load
    toggleClearButtonVisibility();
});
</script>
@endpush