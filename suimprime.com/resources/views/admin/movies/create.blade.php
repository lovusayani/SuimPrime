@extends('layouts.admin')
@section('title', 'Create Movie')
@section('content')
    <div class="container-fluid">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.movies.index') }}">Movies</a></li>
                <li class="breadcrumb-item active" aria-current="page">Create</li>
            </ol>
        </nav>

        <!-- TMDB Quick Import -->
        <div class="d-flex flex-wrap align-items-center justify-content-md-end gap-3 mb-3">
            <div class="d-flex align-items-center gap-2">
                <a class="ph ph-info" data-bs-toggle="tooltip"
                    href="https://www.themoviedb.org/movie/533535-deadpool-wolverine" target="_blank"
                    aria-label="To get a movie id, click on icon ."
                    data-bs-original-title="To get a movie id, click on icon ."></a>
                <label class="form-label mb-0" for="movie_id">Import movie from TMDB ( Add the movie id)<span
                        class="text-danger">*</span></label>
                <input class="form-control w-auto" type="text" name="movie_id" id="movie_id" value=""
                    placeholder="e.g. #mv123456">
            </div>

            <div class="position-relative">
                <button class="btn btn-md btn-primary" id="import_movie" type="button">
                    <span id="import_button_text">Import</span>
                    <span id="loader" style="display: none;">
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </span>
                </button>
            </div>
        </div>

        <h1>Create Movie</h1>
        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        <form method="POST" enctype="multipart/form-data" class="requires-validation" data-toggle="validator"
            id="form-submit" novalidate="novalidate" action="{{ route('admin.movies.store') }}">
            @csrf
            @include('admin.movies.partials.general')
            @include('admin.movies.partials.video')
            @include('admin.movies.partials.quality')
            @include('admin.movies.partials.subtitles')
            @include('admin.movies.partials.seo')
            <div class="d-flex justify-content-end mt-3">
                <button type="submit" class="btn btn-primary" id="submit_movie_btn">Save Movie</button>
            </div>
        </form>
    </div>
    @include('admin.shared.media-modal')
    {{-- Your media modal partial --}}
    @push('scripts')
        <!-- TinyMCE CDN -->
        <script src="{{ asset('/vendor/tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script>
            tinymce.init({
                selector: '#description', // Replace with your textarea ID or class
                height: 400,
                plugins: 'link image media table code',
                theme: 'silver',
                toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | code',
                skin_url: '{{ asset('vendor/tinymce/js/tinymce/skins/ui/oxide') }}', // must exist /home/sprsinfotech-lmax/htdocs/lmax.sprsinfotech.in/public/vendor/tinymce/js/tinymce/skins/ui/oxide
                content_css: '{{ asset('/vendor/tinymce/js/tinymce/skins/content/dark/content.min.css') }}', // must exist
                license_key: 'gpl', // agree to GPL license, no API key needed
            });

            function handleTrailerTypeChange(selectedType) {
                const TrailerFileInput = document.getElementById('url_file_input');
                const TrailerURLInput = document.getElementById('url_input');
                const TrailerEmbedInput = document.getElementById('trailer_embed_input_section');

                // Correct element IDs for trailer inputs
                const trailerUrl = document.getElementById('trailer_url'); // URL input inside url_input
                const trailerFile = document.getElementById('trailer_input'); // visible file text input
                const embedInput = document.getElementById('trailer_embedded'); // embed textarea

                // First hide all sections
                TrailerFileInput?.classList.add('d-none');
                TrailerURLInput?.classList.add('d-none');
                TrailerEmbedInput?.classList.add('d-none');

                // Remove all required attributes
                trailerUrl?.removeAttribute('required');
                trailerFile?.removeAttribute('required');
                embedInput?.removeAttribute('required');

                // Show appropriate section based on selection
                switch (selectedType) {
                    case 'Local':
                    case 'x265':
                        TrailerFileInput?.classList.remove('d-none');
                        trailerFile?.setAttribute('required', 'required');
                        break;
                    case 'Embedded':
                        TrailerEmbedInput?.classList.remove('d-none');
                        embedInput?.setAttribute('required', 'required');
                        break;
                    case 'URL':
                    case 'YouTube':
                    case 'HLS':
                    case 'Vimeo':
                        TrailerURLInput?.classList.remove('d-none');
                        trailerUrl?.setAttribute('required', 'required');
                        break;
                    default:
                        // nothing
                        break;
                }
            }
            const trailerType = document.getElementById('trailer_url_type');
            if (trailerType) {
                handleTrailerTypeChange(trailerType.value);
                trailerType.addEventListener('change', function() {
                    handleTrailerTypeChange(this.value);
                });
                $('#trailer_url_type').on('select2:select', function(e) {
                    handleTrailerTypeChange(e.target.value);
                });
            }

            function handleVideoTypeChange(selectedType) {
                const VideoFileInput = document.getElementById('video_file_input_section');
                const VideoURLInput = document.getElementById('video_url_input_section');
                const VideoEmbedInput = document.getElementById('video_embed_input_section');

                const videoUrl = document.getElementById('video_url_input'); // URL input
                const videoFile = document.getElementById('video_file_input'); // File input
                const embedInput = document.getElementById('embedded'); // Embed textarea

                // First hide all sections
                VideoFileInput?.classList.add('d-none');
                VideoURLInput?.classList.add('d-none');
                VideoEmbedInput?.classList.add('d-none');

                // Remove all required attributes
                videoUrl?.removeAttribute('required');
                videoFile?.removeAttribute('required');
                embedInput?.removeAttribute('required');

                // Show appropriate section based on selection
                switch (selectedType) {
                    case 'Local':
                    case 'x265':
                        VideoFileInput?.classList.remove('d-none');
                        videoFile?.setAttribute('required', 'required');
                        break;
                    case 'Embedded':
                        VideoEmbedInput?.classList.remove('d-none');
                        embedInput?.setAttribute('required', 'required');
                        break;
                    case 'URL':
                    case 'YouTube':
                    case 'HLS':
                    case 'Vimeo':
                        VideoURLInput?.classList.remove('d-none');
                        videoUrl?.setAttribute('required', 'required');
                        break;
                    default:
                        // nothing
                        break;
                }
            }
            const videoUploadType = document.getElementById('video_upload_type');
            if (videoUploadType) {
                handleVideoTypeChange(videoUploadType.value);

                // Add change event listener
                videoUploadType.addEventListener('change', function() {
                    handleVideoTypeChange(this.value);
                });

                // Also handle Select2 change event if using Select2
                $('#video_upload_type').on('select2:select', function(e) {
                    handleVideoTypeChange(e.target.value);
                });
            }
        </script>
        <script type="text/javascript">
            function toggleSeoFields() {
                const enableSeoCheckbox = document.getElementById('enableSeoIntegration');
                const seoFields = document.getElementById('seoFields');
                if (enableSeoCheckbox.checked) {
                    seoFields.style.display = 'block';
                    // Make fields required
                    seoFields.querySelectorAll('input, textarea, select').forEach(el => el.setAttribute('required',
                        'required'));
                } else {
                    seoFields.style.display = 'none';
                    // Remove required
                    seoFields.querySelectorAll('input, textarea, select').forEach(el => el.removeAttribute(
                        'required'));
                }
            }

            function updateCharCount() {
                const metaTitleInput = document.getElementById('meta_title');
                const charCountElement = document.getElementById('meta-title-char-count');
                const charCount = metaTitleInput.value.length;
                charCountElement.textContent = `${charCount}/100 words`;
            }

            function handleQualityTypeChange($container) {
                var type = $container.find('.video_quality_type').val();
                $container.find('.quality_video_input').addClass('d-none');
                $container.find('.quality_video_file_input').addClass('d-none');
                $container.find('.quality_video_embed_input').addClass('d-none');
                if (type === 'URL' || type === 'YouTube' || type === 'HLS' || type === 'Vimeo' || type === 'x265') {
                    $container.find('.quality_video_input').removeClass('d-none');
                } else if (type === 'Local') {
                    $container.find('.quality_video_file_input').removeClass('d-none');
                } else if (type === 'Embedded' || type === 'Embed') {
                    $container.find('.quality_video_embed_input').removeClass('d-none');
                }
            }
            $(document).on('change', '.video_quality_type', function() {
                var $container = $(this).closest('.video-inputs-container');
                handleQualityTypeChange($container);
            });

            $(document).ready(function() {
                $('.video-inputs-container').each(function() {
                    handleQualityTypeChange($(this));
                });
            });

            function validateForm() {
                const requiredFields = form.querySelectorAll('[required]');
                let isValid = true;

                requiredFields.forEach(field => {
                    if (!validateField(field)) {
                        isValid = false;
                    }
                });

                const trailerType = document.getElementById('trailer_url_type')?.value;
                if (['YouTube', 'Vimeo', 'URL', 'HLS', 'x265'].includes(trailerType)) {
                    const isTrailerValid = validateTrailerUrlInput();
                    if (!isTrailerValid) {
                        isValid = false;
                    }
                }

                const videoType = document.getElementById('video_upload_type')?.value;
                if (['YouTube', 'Vimeo', 'URL', 'HLS', 'x265'].includes(videoType)) {
                    const isVideoValid = validateVideoUrlInput();
                    if (!isVideoValid) {
                        isValid = false;
                    }
                }
                // Optional: Check for URL pattern validation
                const urlInput = form.querySelector('input[name="video_url_input"]');
                // console.log(urlInput);
                if (urlInput && urlInput.required && urlInput.value.trim() && !/^https?:\/\/.+/.test(urlInput.value)) {
                    isValid = false;
                }
                const emailInput = form.querySelector('input[type="email"]');
                if (emailInput && emailInput.required && emailInput.value.trim() && !isValidEmail(emailInput.value)) {
                    isValid = false;
                    showValidationError(emailInput, 'Enter a valid Email Address.');
                }
                const mobileInput = form.querySelector('input[name="mobile"]', );
                if (mobileInput && mobileInput.required && mobileInput.value.trim() && !validatePhoneNumber(mobileInput
                        .value)) {
                    isValid = false;
                    showValidationError(mobileInput, 'Enter a valid contact number.');
                }

                const helplineInput = form.querySelector('input[name="helpline_number"]');
                if (helplineInput && helplineInput.required && helplineInput.value.trim() && !validatePhoneNumber(helplineInput
                        .value)) {
                    isValid = false;
                    showValidationError(helplineInput, 'Enter a valid helpline number.');
                }

                const inquiryemailInput = form.querySelector('input[name="inquriy_email"]');
                if (inquiryemailInput && inquiryemailInput.required && inquiryemailInput.value.trim() && !isValidEmail(
                        inquiryemailInput.value)) {
                    isValid = false;
                    showValidationError(inquiryemailInput, 'Enter a valid Inquiry email address.');
                }
                console.log(isValid)
                return isValid;
            }

            function toggleQualitySection() {
                const checkbox = document.getElementById('enable_quality');
                const qualitySection = document.getElementById('enable_quality_section');
                if (checkbox.checked) {
                    qualitySection.classList.remove('d-none');
                } else {
                    qualitySection.classList.add('d-none');
                }
            }

            function toggleSubtitleSection() {
                const checkbox = document.getElementById('enable_subtitle');
                const subtitleSection = document.getElementById('subtitle_section');
                if (checkbox.checked) {
                    subtitleSection.classList.remove('d-none');
                } else {
                    subtitleSection.classList.add('d-none');
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const videoTypeSelect = document.getElementById('video_upload_type');
                const videoUrlInputSection = document.getElementById('video_url_input_section');
                const videoFileInputSection = document.getElementById('video_file_input_section');
                const videoEmbedInputSection = document.getElementById('video_embed_input_section');

                function updateVideoInputSections() {
                    const value = videoTypeSelect.value;
                    videoUrlInputSection.classList.add('d-none');
                    videoFileInputSection.classList.add('d-none');
                    videoEmbedInputSection.classList.add('d-none');
                    if (value === 'URL' || value === 'YouTube' || value === 'HLS' || value === 'Vimeo') {
                        videoUrlInputSection.classList.remove('d-none');
                    } else if (value === 'Local' || value === 'x265') {
                        videoFileInputSection.classList.remove('d-none');
                    } else if (value === 'Embedded') {
                        videoEmbedInputSection.classList.remove('d-none');
                    }
                }
                videoTypeSelect.addEventListener('change', updateVideoInputSections);
                const addMoreVideoBtn = document.getElementById('add_more_video');
                const videoInputsContainerParent = document.getElementById('video-inputs-container-parent');

                function initQualityRow(container) {
                    const typeSelect = container.querySelector('.video_quality_type');
                    const urlInput = container.querySelector('.quality_video_input');
                    const fileInput = container.querySelector('.quality_video_file_input');
                    const embedInput = container.querySelector('.quality_video_embed_input');
                    typeSelect.addEventListener('change', function() {
                        urlInput.classList.add('d-none');
                        fileInput.classList.add('d-none');
                        embedInput.classList.add('d-none');

                        const val = this.value;
                        if (val === 'URL' || val === 'YouTube' || val === 'HLS' || val === 'Vimeo') urlInput
                            .classList.remove('d-none');
                        else if (val === 'Local' || val === 'x265') fileInput.classList.remove('d-none');
                        else if (val === 'Embedded') embedInput.classList.remove('d-none');
                    });
                    const removeBtn = container.querySelector('.remove-video-input');
                    if (removeBtn) {
                        removeBtn.addEventListener('click', function() {
                            container.remove();
                        });
                    }

                    // File preview
                    const fileInputField = container.querySelector('input[type="text"][name="videoquality_input"]');
                    const hiddenFileInput = container.querySelector('input[type="hidden"][name="quality_video[]"]');
                    const previewContainer = container.querySelector('#selectedImageContainerVideoqualityurl');

                    if (fileInputField) {
                        fileInputField.addEventListener('change', function() {
                            const val = this.value;
                            if (val) {
                                previewContainer.innerHTML =
                                    `<video src="${val}" controls width="150"></video>`;
                                hiddenFileInput.value = val;
                            } else {
                                previewContainer.innerHTML = '';
                                hiddenFileInput.value = '';
                            }
                        });
                    }
                }

                // Initialize existing quality rows
                videoInputsContainerParent.querySelectorAll('.video-inputs-container').forEach(initQualityRow);
                addMoreVideoBtn.addEventListener('click', function() {
                    const container = document.createElement('div');
                    container.classList.add('row', 'gy-3', 'video-inputs-container', 'mt-1');
                    container.innerHTML = videoInputsContainerParent.querySelector('.video-inputs-container')
                        .innerHTML;
                    container.querySelector('.remove-video-input').classList.remove('d-none');
                    videoInputsContainerParent.appendChild(container);
                    initQualityRow(container);
                });
                const addSubtitleBtn = document.getElementById('add-subtitle');
                const subtitleContainer = document.getElementById('subtitle-inputs-container');

                function initSubtitleRow(row) {
                    const fileInput = row.querySelector('input[type="file"]');
                    const previewContainer = document.createElement('div');
                    previewContainer.classList.add('mt-2');
                    fileInput.parentNode.appendChild(previewContainer);

                    fileInput.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            previewContainer.innerHTML = `<span>${file.name}</span>`;
                        } else previewContainer.innerHTML = '';
                    });

                    const removeBtn = row.querySelector('.remove-subtitle');
                    if (removeBtn) {
                        removeBtn.addEventListener('click', function() {
                            row.remove();
                        });
                    }
                }
                subtitleContainer.querySelectorAll('.subtitle-row').forEach(initSubtitleRow);
                addSubtitleBtn.addEventListener('click', function() {
                    const firstRow = subtitleContainer.querySelector('.subtitle-row');
                    const clone = firstRow.cloneNode(true);
                    const index = subtitleContainer.querySelectorAll('.subtitle-row').length;

                    clone.querySelectorAll('select, input').forEach(el => {
                        const name = el.getAttribute('name');
                        if (name) el.setAttribute('name', name.replace(/\d+/, index));
                        const id = el.getAttribute('id');
                        if (id) el.setAttribute('id', id.replace(/\d+/, index));
                        if (el.type === 'file') el.value = '';
                        if (el.type === 'checkbox') el.checked = false;
                    });

                    clone.querySelector('.remove-subtitle').classList.remove('d-none');
                    subtitleContainer.appendChild(clone);
                    initSubtitleRow(clone);
                });
                const seoInput = document.getElementById('seo_image_input');
                const seoHidden = document.getElementById('seo_image');
                const seoPreview = document.getElementById('selectedSeoImage');

                if (seoInput) {
                    seoInput.addEventListener('change', function() {
                        const val = seoInput.value;
                        if (val) {
                            seoPreview.src = val;
                            seoPreview.style.display = 'block';
                            seoHidden.value = val;
                        } else {
                            seoPreview.style.display = 'none';
                            seoHidden.value = '';
                        }
                    });
                }
            });
            // Currency formatting helper
            const currencyFormat = (amount) => {
                const DEFAULT_CURRENCY = JSON.parse(
                    '{"id":1,"currency_name":"United States Dollar","currency_symbol":"$","currency_code":"USD","is_primary":1,"currency_position":"left","no_of_decimal":2,"thousand_separator":",","decimal_separator":".","created_by":2,"updated_by":2,"deleted_by":null,"created_at":"2024-07-30T07:18:52.000000Z","updated_at":"2024-07-30T07:19:18.000000Z","deleted_at":null,"feature_image":"https://dummyimage.com/600x300/cfcfcf/000000.png","media":[]}'
                );

                const noOfDecimal = DEFAULT_CURRENCY.no_of_decimal;
                const decimalSeparator = DEFAULT_CURRENCY.decimal_separator;
                const thousandSeparator = DEFAULT_CURRENCY.thousand_separator;
                const currencyPosition = DEFAULT_CURRENCY.currency_position;
                const currencySymbol = DEFAULT_CURRENCY.currency_symbol;

                return formatCurrency(amount, noOfDecimal, decimalSeparator, thousandSeparator, currencyPosition,
                    currencySymbol);
            };
            window.currencyFormat = currencyFormat;
            window.defaultCurrencySymbol = "$";
        </script>
        <script type="text/javascript">
            /* document.addEventListener('DOMContentLoaded', function() {
                                                                                                                                                                                                                                                                                                                                const form = document.getElementById('form-submit');
                                                                                                                                                                                                                                                                                                                                const submitButton = document.getElementById('submit-button');
                                                                                                                                                                                                                                                                                                                                const seoCheckbox = document.getElementById('enableSeoIntegration');
                                                                                                                                                                                                                                                                                                                                const metaTitle = document.getElementById('meta_title');
                                                                                                                                                                                                                                                                                                                                const metaTitleError = document.getElementById('meta_title_error');
                                                                                                                                                                                                                                                                                                                                const hiddenInputsContainer = document.getElementById('meta_keywords_hidden_inputs');
                                                                                                                                                                                                                                                                                                                                const errorMsg = document.getElementById('meta_keywords_error');
                                                                                                                                                                                                                                                                                                                                const tagifyInput = document.getElementById('meta_keywords_input');
                                                                                                                                                                                                                                                                                                                                const tagifyWrapper = tagifyInput ? tagifyInput.closest('.tagify') : null;
                                                                                                                                                                                                                                                                                                                                const keywordInputs = hiddenInputsContainer ? hiddenInputsContainer.querySelectorAll(
                                                                                                                                                                                                                                                                                                                                    'input[name="meta_keywords[]"]') : [];
                                                                                                                                                                                                                                                                                                                                const googleVerification = document.getElementById('google_site_verification');
                                                                                                                                                                                                                                                                                                                                const canonicalUrl = document.getElementById('canonical_url');
                                                                                                                                                                                                                                                                                                                                const shortDescription = document.getElementById('short_description');
                                                                                                                                                                                                                                                                                                                                const seoImage = document.getElementById('seo_image');
                                                                                                                                                                                                                                                                                                                                const seoImagePreview = document.getElementById('selectedSeoImage');
                                                                                                                                                                                                                                                                                                                                const seoImageError = document.querySelector('#seo_image_input + .invalid-feedback');

                                                                                                                                                                                                                                                                                                                                const metaKeywordsError = document.getElementById('meta_keywords_error');
                                                                                                                                                                                                                                                                                                                                let formSubmitted = false;
                                                                                                                                                                                                                                                                                                                                if (form) {
                                                                                                                                                                                                                                                                                                                                    const requiredFields = form.querySelectorAll('[required]');
                                                                                                                                                                                                                                                                                                                                    if (requiredFields.length > 0) {
                                                                                                                                                                                                                                                                                                                                        requiredFields.forEach(field => {
                                                                                                                                                                                                                                                                                                                                            field.addEventListener('input', () => validateField(field));
                                                                                                                                                                                                                                                                                                                                            field.addEventListener('change', () => validateField(field));
                                                                                                                                                                                                                                                                                                                                        });
                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                    form.addEventListener('submit', function(event) {
                                                                                                                                                                                                                                                                                                                                        if (formSubmitted) {
                                                                                                                                                                                                                                                                                                                                            event.preventDefault();
                                                                                                                                                                                                                                                                                                                                            return;
                                                                                                                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                                                                                                                        let isValid = validateForm();

                                                                                                                                                                                                                                                                                                                                        if (seoCheckbox && seoCheckbox.checked) {
                                                                                                                                                                                                                                                                                                                                            if (!validateSeoImage()) {
                                                                                                                                                                                                                                                                                                                                                event.preventDefault(); // stop form submit
                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                            if (metaTitle && metaTitle.value === '') {
                                                                                                                                                                                                                                                                                                                                                isValid = false;
                                                                                                                                                                                                                                                                                                                                                metaTitle.classList.add('is-invalid');
                                                                                                                                                                                                                                                                                                                                                if (metaTitleError) metaTitleError.style.display = 'block';
                                                                                                                                                                                                                                                                                                                                            } else if (metaTitle) {
                                                                                                                                                                                                                                                                                                                                                metaTitle.classList.remove('is-invalid');
                                                                                                                                                                                                                                                                                                                                                if (metaTitleError) metaTitleError.style.display = 'none';
                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                            // Tagify validation: check if it has tags
                                                                                                                                                                                                                                                                                                                                            if (tagifyInput && tagifyInput.value === '') {
                                                                                                                                                                                                                                                                                                                                                if (keywordInputs.length === 0) {
                                                                                                                                                                                                                                                                                                                                                    isValid = false;

                                                                                                                                                                                                                                                                                                                                                    // Show error message
                                                                                                                                                                                                                                                                                                                                                    if (errorMsg) errorMsg.style.display = 'block';

                                                                                                                                                                                                                                                                                                                                                    // Add visual error indication to Tagify input
                                                                                                                                                                                                                                                                                                                                                    if (tagifyWrapper) {
                                                                                                                                                                                                                                                                                                                                                        tagifyWrapper.classList.add('is-invalid');
                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                } else {
                                                                                                                                                                                                                                                                                                                                                    const tagifyInputValue = tagifyInput.value;
                                                                                                                                                                                                                                                                                                                                                    const keywordValues = tagifyInputValue.map(item => item.value);
                                                                                                                                                                                                                                                                                                                                                    const metaKeywordsInput = document.getElementById('meta_keywords_input');
                                                                                                                                                                                                                                                                                                                                                    if (metaKeywordsInput) metaKeywordsInput.value = JSON.stringify(
                                                                                                                                                                                                                                                                                                                                                        keywordValues);
                                                                                                                                                                                                                                                                                                                                                    // Hide error if input is valid
                                                                                                                                                                                                                                                                                                                                                    if (errorMsg) errorMsg.style.display = 'none';
                                                                                                                                                                                                                                                                                                                                                    if (tagifyWrapper) {
                                                                                                                                                                                                                                                                                                                                                        tagifyWrapper.classList.remove('is-invalid');
                                                                                                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                            } else if (tagifyInput) {
                                                                                                                                                                                                                                                                                                                                                if (errorMsg) errorMsg.style.display = 'none';
                                                                                                                                                                                                                                                                                                                                                if (tagifyWrapper) {
                                                                                                                                                                                                                                                                                                                                                    tagifyWrapper.classList.remove('is-invalid');
                                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                                            }
                                                                                                                                                                                                                                                                                                                                        }





                                                                                                                                                                                                                                                                                                                                        if (!isValid) {
                                                                                                                                                                                                                                                                                                                                            event.preventDefault();
                                                                                                                                                                                                                                                                                                                                            submitButton.disabled = false;
                                                                                                                                                                                                                                                                                                                                            formSubmitted = false; // Reset the flag
                                                                                                                                                                                                                                                                                                                                            return;
                                                                                                                                                                                                                                                                                                                                        }

                                                                                                                                                                                                                                                                                                                                        submitButton.disabled = true;
                                                                                                                                                                                                                                                                                                                                        submitButton.innerText = 'Loading...';
                                                                                                                                                                                                                                                                                                                                        formSubmitted = true;
                                                                                                                                                                                                                                                                                                                                    });
                                                                                                                                                                                                                                                                                                                                }
                                                                                                                                                                                                                                                                                                                            }); */
            document.addEventListener('DOMContentLoaded', function() {
                flatpickr('.min-datetimepicker-time', {
                    enableTime: true,
                    noCalendar: true,
                    dateFormat: "H:i",
                    time_24hr: true,
                });
                flatpickr('.datetimepicker', {
                    dateFormat: "Y-m-d",
                });
            });
            tinymce.init({
                selector: '#description',
                plugins: 'link image code',
                toolbar: 'undo redo | styleselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify | removeformat | code | image',
                setup: function(editor) {
                    // Setup TinyMCE to listen for changes
                    editor.on('change', function(e) {
                        // Get the editor content
                        const content = editor.getContent().trim();
                        const $textarea = $('#description');
                        const $error = $('#desc-error');

                        // Check if content is empty
                        if (content === '') {
                            $textarea.addClass('is-invalid'); // Add invalid class if empty
                            $error.show(); // Show validation message
                        } else {
                            $textarea.removeClass('is-invalid'); // Remove invalid class if not empty
                            $error.hide(); // Hide validation message
                        }
                    });
                }
            });

            $(document).on('click', '.variable_button', function() {
                const textarea = $(document).find('.tab-pane.active');
                const textareaID = textarea.find('textarea').attr('id');
                tinyMCE.activeEditor.selection.setContent($(this).attr('data-value'));
            });

            function showPlanSelection() {
                const planSelection = document.getElementById('planSelection');
                const payPerViewFields = document.getElementById('payPerViewFields');
                const planIdSelect = document.getElementById('plan_id');
                const priceInput = document.querySelector('input[name="price"]');
                const selectedAccess = document.querySelector('input[name="movie_access"]:checked');
                const releaseDateField = document.querySelector('input[name="release_date"]').closest('.col-md-6');
                const releaseDateInput = document.querySelector('input[name="release_date"]');
                const downlaodstatusDataFeild = document.querySelector('input[name="download_status"]').closest('.col-md-6');
                const downlaodstatusInput = document.querySelector('input[name="download_status"]');

                const purchaseTypeSelect = document.querySelector('select[name="purchase_type"]');
                const accessDurationInput = document.querySelector('input[name="access_duration"]');
                const availableForInput = document.querySelector('input[name="available_for"]');

                if (!selectedAccess) return;

                const value = selectedAccess.value;

                // Always show the download status wrapper

                // Handle visibility and required attributes
                if (value === 'paid') {
                    planSelection.classList.remove('d-none');
                    payPerViewFields.classList.add('d-none');
                    planIdSelect.setAttribute('required', 'required');
                    priceInput.removeAttribute('required');
                    purchaseTypeSelect.required = false;
                    accessDurationInput.required = false;
                    availableForInput.required = false;
                    releaseDateField.classList.remove('d-none');
                    releaseDateInput.setAttribute('required', 'required');
                    downlaodstatusDataFeild.classList.remove('d-none');
                } else if (value === 'pay-per-view') {
                    planSelection.classList.add('d-none');
                    payPerViewFields.classList.remove('d-none');
                    planIdSelect.removeAttribute('required');
                    priceInput.setAttribute('required', 'required');
                    purchaseTypeSelect.required = true;
                    accessDurationInput.required = purchaseTypeSelect.value === 'rental';
                    availableForInput.required = true;
                    releaseDateField.classList.add('d-none');
                    releaseDateInput.removeAttribute('required');
                    downlaodstatusDataFeild.classList.add('d-none');
                } else {
                    planSelection.classList.add('d-none');
                    payPerViewFields.classList.add('d-none');
                    planIdSelect.removeAttribute('required');
                    priceInput.removeAttribute('required');
                    purchaseTypeSelect.required = false;
                    accessDurationInput.required = false;
                    availableForInput.required = false;
                    releaseDateField.classList.remove('d-none');
                    releaseDateInput.setAttribute('required', 'required');
                    downlaodstatusDataFeild.classList.remove('d-none');

                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Initial setup
                showPlanSelection();

                // Event listeners for movie access radio buttons
                const accessRadios = document.querySelectorAll('input[name="movie_access"]');
                accessRadios.forEach(function(radio) {
                    radio.addEventListener('change', showPlanSelection);
                });
            });

            function toggleAccessDuration(value) {
                const accessDuration = document.getElementById('accessDurationWrapper');
                const accessDurationInput = document.querySelector('input[name="access_duration"]');
                const selectedAccess = document.querySelector('input[name="movie_access"]:checked');

                if (value === 'rental') {
                    accessDuration.classList.remove('d-none');
                    // Only set required if pay-per-view is selected
                    if (selectedAccess && selectedAccess.value === 'pay-per-view') {
                        accessDurationInput.required = true;
                    }
                } else {
                    accessDuration.classList.add('d-none');
                    accessDurationInput.required = false;
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                const purchaseType = document.getElementById('purchase_type');
                if (purchaseType) {
                    toggleAccessDuration(purchaseType.value);
                    purchaseType.addEventListener('change', function() {
                        toggleAccessDuration(this.value);
                    });
                }
            });

            function calculateTotal() {
                const price = parseFloat(document.querySelector('input[name="price"]').value) || 0;
                const discount = parseFloat(document.querySelector('input[name="discount"]').value) || 0;
                let total = price;

                if (discount > 0 && discount < 100) {
                    total = price - ((price * discount) / 100);
                }

                document.getElementById('total_amount').value = total.toFixed(2);
            }

            document.addEventListener('DOMContentLoaded', function() {
                const priceInput = document.querySelector('input[name="price"]');
                const discountInput = document.querySelector('input[name="discount"]');

                priceInput.addEventListener('input', calculateTotal);
                discountInput.addEventListener('input', calculateTotal);

                // Trigger initial calculation if old values exist
                calculateTotal();
            });

            function toggleQualitySection() {
                var enableQualityCheckbox = document.getElementById('enable_quality');
                var enableQualitySection = document.getElementById('enable_quality_section');

                if (enableQualityCheckbox.checked) {

                    enableQualitySection.classList.remove('d-none');

                } else {

                    enableQualitySection.classList.add('d-none');
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                toggleQualitySection();
            });

            document.getElementById('enable_quality').addEventListener('change', function() {
                toggleQualitySection();
            });

            document.addEventListener('DOMContentLoaded', function() {
                const VideoFileInput = document.getElementById('video_file_input_section');

                function handleVideoUrlTypeChange(selectedType) {
                    const VideoFileInput = document.getElementById('video_file_input_section');
                    const VideoURLInput = document.getElementById('video_url_input_section');
                    const VideoEmbedInput = document.getElementById('video_embed_input_section');
                    const videoUrl = document.getElementById('video_url_input');
                    const videoFile = document.querySelector('input[name="video_file_input"]');
                    const embedInput = document.getElementById('embedded');

                    // First hide all sections
                    VideoFileInput?.classList.add('d-none');
                    VideoURLInput?.classList.add('d-none');
                    VideoEmbedInput?.classList.add('d-none');

                    // Remove all required attributes
                    videoUrl?.removeAttribute('required');
                    videoFile?.removeAttribute('required');
                    embedInput?.removeAttribute('required');

                    // Show appropriate section based on selection
                    switch (selectedType) {
                        case 'Local':
                            VideoFileInput?.classList.remove('d-none');
                            videoFile?.setAttribute('required', 'required');
                            break;
                        case 'Embedded':
                            VideoEmbedInput?.classList.remove('d-none');
                            embedInput?.setAttribute('required', 'required');
                            break;
                        case 'URL':
                        case 'YouTube':
                        case 'HLS':
                        case 'Vimeo':
                        case 'x265':
                            VideoURLInput?.classList.remove('d-none');
                            videoUrl?.setAttribute('required', 'required');
                            break;
                    }
                }

                // Handle initial state
                const videoUploadType = document.getElementById('video_upload_type');
                if (videoUploadType) {
                    handleVideoUrlTypeChange(videoUploadType.value);

                    // Add change event listener
                    videoUploadType.addEventListener('change', function() {
                        handleVideoUrlTypeChange(this.value);
                    });

                    // Also handle select2 change event
                    $('#video_upload_type').on('select2:select', function(e) {
                        handleVideoUrlTypeChange(e.target.value);
                    });
                }
            });

            function handleQualityTypeChange($container) {
                var type = $container.find('.video_quality_type').val();
                $container.find('.quality_video_input').addClass('d-none');
                $container.find('.quality_video_file_input').addClass('d-none');
                $container.find('.quality_video_embed_input').addClass('d-none');
                if (type === 'URL' || type === 'YouTube' || type === 'HLS' || type === 'Vimeo' || type === 'x265') {
                    $container.find('.quality_video_input').removeClass('d-none');
                } else if (type === 'Local') {
                    $container.find('.quality_video_file_input').removeClass('d-none');
                } else if (type === 'Embedded' || type === 'Embed') {
                    $container.find('.quality_video_embed_input').removeClass('d-none');
                }
            }

            $(document).on('change', '.video_quality_type', function() {
                var $container = $(this).closest('.video-inputs-container');
                handleQualityTypeChange($container);
            });

            function validateEmbedInput(inputId, errorId) {
                const embedInput = document.getElementById(inputId);
                const embedError = document.getElementById(errorId);
                const value = embedInput?.value.trim() || '';

                // Error messages from Laravel translations
                const msgRequired = "Embed code is required.";
                const msgInvalid = "Enter a valid video embed code.";
                const msgOnlyYoutubeVimeo = "Only embed links from YouTube or Vimeo are supported.";

                // Clear previous error
                if (embedError) embedError.style.display = 'none';
                if (embedInput) embedInput.classList.remove('is-invalid');

                if (!embedInput || value === '') {
                    return showError(msgRequired);
                }

                // Extract iframe src
                const iframeMatch = value.match(/<iframe\b[^>]*\bsrc\s*=\s*["'“”‘’](.*?)["'“”‘’][^>]*>[\s\S]*?<\/iframe>/i);
                if (!iframeMatch) {
                    return showError(msgInvalid);
                }

                const src = iframeMatch[1];

                // // Accept YouTube/Vimeo embeds with optional query params
                // const isValidYouTubeEmbed = /^https:\/\/www\.youtube\.com\/embed\/[A-Za-z0-9_-]+(\?.*)?$/.test(src);
                // const isValidVimeoEmbed = /^https:\/\/player\.vimeo\.com\/video\/\d+(\?.*)?$/.test(src);

                // if (!isValidYouTubeEmbed && !isValidVimeoEmbed) {
                //     return showError(msgOnlyYoutubeVimeo);
                // }

                return true;

                function showError(message) {
                    if (embedError) embedError.innerText = message;
                    if (embedError) embedError.style.display = 'block';
                    if (embedInput) embedInput.classList.add('is-invalid');
                    return false;
                }
            }

            document.addEventListener('DOMContentLoaded', function() {
                // Live validation
                ['embedded', 'trailer_embedded'].forEach((id, i) => {
                    const input = document.getElementById(id);
                    const errorId = i === 0 ? 'embed-error' : 'trailer-embed-error';
                    if (input) {
                        input.addEventListener('input', () => validateEmbedInput(id, errorId));
                    }
                });

                // Form validation
                const form = document.getElementById('form-submit');
                if (form) {
                    form.addEventListener('submit', function(e) {
                        const videoType = document.getElementById('video_upload_type')?.value;
                        const trailerType = document.getElementById('trailer_url_type')?.value;

                        let isValid = true;

                        if (videoType === 'Embedded') {
                            isValid = validateEmbedInput('embedded', 'embed-error');
                        }

                        if (trailerType === 'Embedded') {
                            isValid = validateEmbedInput('trailer_embedded', 'trailer-embed-error') && isValid;
                        }

                        if (!isValid) {
                            e.preventDefault();
                        }
                    });
                }
            });

            var thumbUrl = $("#thumbnail_url")
            thumbUrl.attr('accept', 'video/*');
        </script>
        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function() {
                const seoImageInput = document.getElementById('seo_image');
                const chooseImageButton = document.getElementById('seo-image-url-button');

                // Only run if both elements exist
                if (seoImageInput && chooseImageButton) {
                    function updateButtonText() {
                        chooseImageButton.innerHTML = seoImageInput.value.trim() ?
                            '<i class="ph ph-image"></i>' :
                            '<i class="ph ph-image"></i> Choose Media to Upload';
                    }

                    // Run on load
                    updateButtonText();

                    // Check every 300ms if value changes (works even if set programmatically)
                    let lastValue = seoImageInput.value;
                    setInterval(() => {
                        if (seoImageInput.value !== lastValue) {
                            lastValue = seoImageInput.value;
                            updateButtonText();
                        }
                    }, 300);
                }
            });
        </script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const videoTypeSelect = document.getElementById('video_upload_type');
                const videoUrlInputSection = document.getElementById('video_url_input_section');
                const videoFileInputSection = document.getElementById('video_file_input_section');
                const videoEmbedInputSection = document.getElementById('video_embed_input_section');

                function updateVideoInputSections() {
                    const value = videoTypeSelect.value;
                    videoUrlInputSection.classList.add('d-none');
                    videoFileInputSection.classList.add('d-none');
                    videoEmbedInputSection.classList.add('d-none');
                    if (value === 'URL' || value === 'YouTube' || value === 'HLS' || value === 'Vimeo') {
                        videoUrlInputSection.classList.remove('d-none');
                    } else if (value === 'Local' || value === 'x265') {
                        videoFileInputSection.classList.remove('d-none');
                    } else if (value === 'Embedded') {
                        videoEmbedInputSection.classList.remove('d-none');
                    }
                }
                videoTypeSelect.addEventListener('change', updateVideoInputSections);
                const addMoreVideoBtn = document.getElementById('add_more_video');
                const videoInputsContainerParent = document.getElementById('video-inputs-container-parent');

                function initQualityRow(container) {
                    const typeSelect = container.querySelector('.video_quality_type');
                    const urlInput = container.querySelector('.quality_video_input');
                    const fileInput = container.querySelector('.quality_video_file_input');
                    const embedInput = container.querySelector('.quality_video_embed_input');
                    typeSelect.addEventListener('change', function() {
                        urlInput.classList.add('d-none');
                        fileInput.classList.add('d-none');
                        embedInput.classList.add('d-none');

                        const val = this.value;
                        if (val === 'URL' || val === 'YouTube' || val === 'HLS' || val === 'Vimeo') urlInput
                            .classList.remove('d-none');
                        else if (val === 'Local' || val === 'x265') fileInput.classList.remove('d-none');
                        else if (val === 'Embedded') embedInput.classList.remove('d-none');
                    });
                    const removeBtn = container.querySelector('.remove-video-input');
                    if (removeBtn) {
                        removeBtn.addEventListener('click', function() {
                            container.remove();
                        });
                    }

                    // File preview
                    const fileInputField = container.querySelector('input[type="text"][name="videoquality_input"]');
                    const hiddenFileInput = container.querySelector('input[type="hidden"][name="quality_video[]"]');
                    const previewContainer = container.querySelector('#selectedImageContainerVideoqualityurl');

                    if (fileInputField) {
                        fileInputField.addEventListener('change', function() {
                            const val = this.value;
                            if (val) {
                                previewContainer.innerHTML =
                                    `<video src="${val}" controls width="150"></video>`;
                                hiddenFileInput.value = val;
                            } else {
                                previewContainer.innerHTML = '';
                                hiddenFileInput.value = '';
                            }
                        });
                    }
                }

                // Initialize existing quality rows
                videoInputsContainerParent.querySelectorAll('.video-inputs-container').forEach(initQualityRow);
                addMoreVideoBtn.addEventListener('click', function() {
                    const container = document.createElement('div');
                    container.classList.add('row', 'gy-3', 'video-inputs-container', 'mt-1');
                    container.innerHTML = videoInputsContainerParent.querySelector('.video-inputs-container')
                        .innerHTML;
                    container.querySelector('.remove-video-input').classList.remove('d-none');
                    videoInputsContainerParent.appendChild(container);
                    initQualityRow(container);
                });
                const addSubtitleBtn = document.getElementById('add-subtitle');
                const subtitleContainer = document.getElementById('subtitle-inputs-container');

                function initSubtitleRow(row) {
                    const fileInput = row.querySelector('input[type="file"]');
                    const previewContainer = document.createElement('div');
                    previewContainer.classList.add('mt-2');
                    fileInput.parentNode.appendChild(previewContainer);

                    fileInput.addEventListener('change', function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            previewContainer.innerHTML = `<span>${file.name}</span>`;
                        } else previewContainer.innerHTML = '';
                    });

                    const removeBtn = row.querySelector('.remove-subtitle');
                    if (removeBtn) {
                        removeBtn.addEventListener('click', function() {
                            row.remove();
                        });
                    }
                }
                subtitleContainer.querySelectorAll('.subtitle-row').forEach(initSubtitleRow);
                addSubtitleBtn.addEventListener('click', function() {
                    const firstRow = subtitleContainer.querySelector('.subtitle-row');
                    const clone = firstRow.cloneNode(true);
                    const index = subtitleContainer.querySelectorAll('.subtitle-row').length;

                    clone.querySelectorAll('select, input').forEach(el => {
                        const name = el.getAttribute('name');
                        if (name) el.setAttribute('name', name.replace(/\d+/, index));
                        const id = el.getAttribute('id');
                        if (id) el.setAttribute('id', id.replace(/\d+/, index));
                        if (el.type === 'file') el.value = '';
                        if (el.type === 'checkbox') el.checked = false;
                    });

                    clone.querySelector('.remove-subtitle').classList.remove('d-none');
                    subtitleContainer.appendChild(clone);
                    initSubtitleRow(clone);
                });
                const seoInput = document.getElementById('seo_image_input');
                const seoHidden = document.getElementById('seo_image');
                const seoPreview = document.getElementById('selectedSeoImage');

                if (seoInput) {
                    seoInput.addEventListener('change', function() {
                        const val = seoInput.value;
                        if (val) {
                            seoPreview.src = val;
                            seoPreview.style.display = 'block';
                            seoHidden.value = val;
                        } else {
                            seoPreview.style.display = 'none';
                            seoHidden.value = '';
                        }
                    });
                }
            });
        </script>
        ///////////////////////////// Form Submit /////////////////////////////
        <script type="text/javascript">
            $(document).ready(function() {
                console.log('Document ready - initializing TMDB import functionality'); // Debug log
                // Init Select2

                if (typeof $.fn.select2 === 'function') { // Check if select2 is loaded
                    $('#genres, #countries, #actors, #directors, #language, .subtitle-language').select2({
                        width: '100%',
                        placeholder: function() {
                            return $(this).data('placeholder') || 'Select an option';
                        },
                        allowClear: true
                    });
                } else {
                    console.warn('Select2 is not loaded yet.');
                }

                // TMDB quick import handler
                $('#import_movie').on('click', function(e) {
                    e.preventDefault(); // Prevent any default behavior
                    console.log('Import button clicked!'); // Debug log
                    const raw = ($('#movie_id').val() || '').toString();
                    const id = raw.replace(/[^0-9]/g, '');
                    console.log('Movie ID:', id); // Debug log
                    if (!id) {
                        window.errorSnackbar ? window.errorSnackbar('Please enter a valid TMDB movie ID') :
                            alert('Please enter a valid TMDB movie ID');
                        return;
                    }

                    // Show loader, hide button text
                    $('#import_button_text').hide();
                    $('#loader').show();
                    $('#import_movie').prop('disabled', true);

                    $.ajax({
                        url: "{{ route('admin.tmdb.fetch') }}",
                        method: 'POST',
                        data: {
                            movie_id: id
                        },
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name=\"csrf-token\"]').attr('content')
                        },
                        success: function(resp) {
                            console.log('TMDB Response:', resp); // Debug log

                            if (!resp || !resp.success) {
                                const msg = resp && resp.message ? resp.message : 'Import failed';
                                window.errorSnackbar ? window.errorSnackbar(msg) : alert(msg);
                                return;
                            }
                            const tmdb = resp.movie || {};
                            const related = resp.related_data || {};
                            const images = resp.image_paths || {};
                            const labels = resp.related_labels || {};

                            console.log('TMDB Movie Data:', tmdb);
                            console.log('Related Data:', related);
                            console.log('Labels:', labels);

                            // Hidden flags
                            $('#tmdb_id').val(tmdb.tmdb_id || id);
                            $('#is_import').val('1');
                            $('#tmdb_id').val(tmdb.tmdb_id || id);
                            $('#is_import').val('1');
                            // Basic fields
                            if (tmdb.title) $('#name').val(tmdb.title);
                            if (tmdb.overview) {
                                if (typeof tinymce !== 'undefined' && tinymce.get('description')) {
                                    tinymce.get('description').setContent(tmdb.overview);
                                } else {
                                    $('#description').val(tmdb.overview);
                                }
                            }
                            if (tmdb.release_date) {
                                $('#release_date').val(tmdb.release_date);
                                // Trigger Flatpickr to update the display
                                const releaseDatePicker = $('#release_date')[0]._flatpickr;
                                if (releaseDatePicker) {
                                    releaseDatePicker.setDate(tmdb.release_date);
                                }
                            }
                            if (tmdb.vote_average != null) $('#IMDb_rating').val(tmdb.vote_average);

                            // Content Rating based on adult flag
                            if (tmdb.adult === true) {
                                $('#content_rating').val('R - Restricted');
                            } else {
                                $('#content_rating').val('PG - Parental Guidance Suggested');
                            }

                            // Runtime minutes -> HH:MM
                            const toHHMM = (mins) => {
                                if (!mins || isNaN(mins)) return '';
                                const h = Math.floor(mins / 60);
                                const m = mins % 60;
                                return String(h).padStart(2, '0') + ':' + String(m).padStart(2,
                                    '0');
                            };
                            if (tmdb.runtime) $('#duration').val(toHHMM(parseInt(tmdb.runtime,
                                10)));

                            // Language map and update
                            const langMap = {
                                en: 'english',
                                es: 'spanish',
                                fr: 'french',
                                ar: 'arabic',
                                de: 'german',
                                hi: 'hindi',
                                ta: 'tamil',
                                te: 'telugu',
                                ml: 'malayalam'
                            };
                            const mapped = langMap[(tmdb.original_language || '').toLowerCase()];
                            if (mapped) {
                                const $langOption = $('#language option').filter(function() {
                                    return $(this).val().toLowerCase() === mapped;
                                });
                                if ($langOption.length > 0) {
                                    $('#language').val($langOption.val());
                                    // Trigger change for Select2 to update display
                                    if (typeof $.fn.select2 === 'function' && $('#language')
                                        .hasClass('select2-hidden-accessible')) {
                                        $('#language').trigger('change');
                                    }
                                }
                            }

                            // Multi-selects: ensure options exist before selecting
                            const relatedLabels = resp.related_labels || {};
                            const ensureOptions = (selectId, map) => {
                                if (!map) return;
                                const $sel = $(selectId);
                                Object.entries(map).forEach(([id, name]) => {
                                    if ($sel.find(`option[value="${id}"]`).length ===
                                        0) {
                                        const opt = new Option(name, id, false, false);
                                        $sel.append(opt);
                                    }
                                });
                                // If using select2, trigger an update
                                if (typeof $.fn.select2 === 'function') {
                                    $sel.trigger('change');
                                }
                            };

                            ensureOptions('#genres', relatedLabels.genres);
                            ensureOptions('#actors', relatedLabels.actors);
                            ensureOptions('#directors', relatedLabels.directors);
                            ensureOptions('#countries', relatedLabels.countries);

                            const applySelect2Values = (selector, ids, labelMap) => {
                                if (!Array.isArray(ids) || ids.length === 0) return;
                                const $sel = $(selector);
                                const idsStr = ids.map(v => v.toString());

                                // Ensure options exist first
                                idsStr.forEach(id => {
                                    if ($sel.find(`option[value="${id}"]`).length ===
                                        0) {
                                        const name = (labelMap && labelMap[id]) || id;
                                        $sel.append(new Option(name, id, false, false));
                                    }
                                });

                                // Clear prior selection at DOM level
                                $sel.find('option').prop('selected', false);
                                idsStr.forEach(id => {
                                    $sel.find(`option[value="${id}"]`).prop('selected',
                                        true);
                                });

                                // Force update Select2 display
                                if (typeof $.fn.select2 === 'function') {
                                    if ($sel.hasClass('select2-hidden-accessible')) {
                                        // Already initialized, just set value and trigger change
                                        $sel.val(idsStr).trigger('change');
                                    } else {
                                        // Initialize Select2 first
                                        $sel.select2({
                                            width: '100%',
                                            placeholder: $sel.data('placeholder') ||
                                                'Select an option',
                                            allowClear: true
                                        });
                                        // Then set values
                                        $sel.val(idsStr).trigger('change');
                                    }
                                } else {
                                    // Fallback if Select2 not present
                                    $sel.val(idsStr).trigger('change');
                                }

                                // Additional trigger after a short delay to ensure chips render
                                setTimeout(() => {
                                    $sel.trigger('change');
                                }, 100);
                            };

                            applySelect2Values('#genres', related.genre_ids || [], relatedLabels
                                .genres || {});
                            applySelect2Values('#actors', related.actor_ids || [], relatedLabels
                                .actors || {});
                            applySelect2Values('#directors', related.director_ids || [],
                                relatedLabels
                                .directors || {});
                            applySelect2Values('#countries', related.country_ids || [],
                                relatedLabels
                                .countries || {});

                            // Apply values with a slight delay to ensure Select2 is fully ready
                            setTimeout(() => {
                                applySelect2Values('#genres', related.genre_ids || [],
                                    relatedLabels.genres || {});
                                applySelect2Values('#actors', related.actor_ids || [],
                                    relatedLabels.actors || {});
                                applySelect2Values('#directors', related.director_ids || [],
                                    relatedLabels.directors || {});
                                applySelect2Values('#countries', related.country_ids || [],
                                    relatedLabels.countries || {});
                            }, 200);

                            // Trailer data
                            if (resp.trailer && resp.trailer.url) {
                                const trailer = resp.trailer;

                                // Set trailer type to YouTube
                                $('#trailer_url_type').val('YouTube').trigger('change');

                                // Explicitly show only the URL input section and hide others
                                $('#url_input').removeClass('d-none');
                                $('#url_file_input').addClass('d-none');
                                $('#trailer_embed_input_section').addClass('d-none');

                                // Set required attribute on trailer URL input
                                $('#trailer_url').attr('required', 'required');

                                // Remove required from other inputs
                                $('#trailer_input').removeAttr('required');
                                $('#trailer_embedded').removeAttr('required');

                                // Set the trailer URL value
                                $('#trailer_url').val(trailer.url);
                            }

                            // Images - Update both hidden input and visible preview
                            const thumb = images.thumbnail || '';
                            const poster = images.poster || '';
                            const tv = images.poster_tv || '';

                            if (thumb) {
                                $('#thumbnail_url').val(thumb);
                                $('#thumbnail_input').val(thumb);
                                $('#selectedImage').attr('src', thumb).css('display', 'block');
                                $('#selectedImageContainerThumbnail').show();
                            }
                            if (poster) {
                                $('#poster_url').val(poster);
                                $('#poster_input').val(poster);
                                $('#selectedPosterImage').attr('src', poster).css('display',
                                    'block');
                                $('#selectedImageContainerPoster').show();
                            }
                            if (tv) {
                                $('#poster_tv_url').val(tv);
                                $('#poster_tv_input').val(tv);
                                $('#selectedPosterTvImage').attr('src', tv).css('display', 'block');
                                $('#selectedImageContainerPosterTv').show();
                            }

                            // Auto-fill SEO Settings
                            const movieName = tmdb.title || '';

                            // SEO Image = thumbnail
                            if (thumb) {
                                $('#seo_image').val(thumb);
                                $('#seo_image_input').val(thumb);
                                $('#selectedSeoImage').attr('src', thumb).css('display', 'block');
                                $('#selectedImageContainerSeo').show();
                            }

                            // Meta Title = name
                            if (movieName) {
                                $('#meta_title').val(movieName);
                            }

                            // Meta Keywords = name + genres (e.g., "Tron Action, Tron Comedy")
                            if (movieName && labels.genres) {
                                const genreNames = Object.values(labels.genres);
                                const keywords = genreNames.map(g => `${movieName} ${g}`).join(
                                    ', ');
                                $('#meta_keywords_input').val(keywords);
                            }

                            // Google Site Verification = random number
                            const randomVerification = Math.random().toString(36).substring(2, 15) +
                                Math.random().toString(36).substring(2, 15);
                            $('#google_site_verification').val(randomVerification);

                            // Canonical URL = baseurl + / + name (slugified)
                            if (movieName) {
                                const baseUrl = window.location.origin;
                                const slug = movieName.toLowerCase()
                                    .replace(/[^a-z0-9]+/g, '-')
                                    .replace(/^-+|-+$/g, '');
                                $('#canonical_url').val(`${baseUrl}/${slug}`);
                            }

                            // Ensure SEO toggle is enabled and fields visible
                            const $seoToggle = $('#enableSeoIntegration');
                            if ($seoToggle.length) {
                                $seoToggle.prop('checked', true);
                                if (typeof toggleSeoFields === 'function') {
                                    toggleSeoFields();
                                }
                            }

                            window.successSnackbar ? window.successSnackbar('TMDB data imported') :
                                alert('TMDB data imported');
                        },
                        error: function(xhr) {
                            const msg = (xhr.responseJSON && xhr.responseJSON.message) ? xhr
                                .responseJSON.message : 'Server error while importing';
                            window.errorSnackbar ? window.errorSnackbar(msg) : alert(msg);
                        },
                        complete: function() {
                            // Hide loader, show button text
                            $('#loader').hide();
                            $('#import_button_text').show();
                            $('#import_movie').prop('disabled', false);
                        }
                    });
                });

                // Handle form submit
                $('#form-submit').on('submit', function(e) {
                    e.preventDefault();

                    let form = this;
                    let formData = new FormData(form);

                    // Add TinyMCE content
                    if (typeof tinymce !== 'undefined') {
                        formData.set('description', tinymce.get('description').getContent());
                    }

                    // Show loading state (support legacy #submit-button or new #submit_movie_btn)
                    const $submitBtn = $('#submit-button').length ? $('#submit-button') : $(
                        '#submit_movie_btn');
                    $submitBtn.prop('disabled', true).html(
                        '<span class="spinner-border spinner-border-sm"></span> Saving...'
                    );

                    $.ajax({
                        url: $(form).attr('action'), // should be route('admin.movies.store')
                        method: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        success: function(response) {
                            if (response.success) {
                                // Show success notification
                                window.successSnackbar(response.message ||
                                    'Movie saved successfully');

                                // Redirect to movies index page
                                setTimeout(() => {
                                    window.location.href =
                                        "{{ route('admin.movies.index') }}";
                                }, 1500);
                            } else {
                                $('#error_message')
                                    .text(response.message || 'Something went wrong')
                                    .show();
                                $submitBtn.prop('disabled', false).html('Save');
                            }
                        },
                        error: function(xhr) {
                            $submitBtn.prop('disabled', false).html('Save');

                            if (xhr.responseJSON?.errors) {
                                // Loop through validation errors
                                Object.keys(xhr.responseJSON.errors).forEach(function(key) {
                                    const input = $(`[name="${key}"]`);
                                    input.addClass('is-invalid');

                                    // Show error message if you have a div for it
                                    const errorDiv = $(`#${key}_error`);
                                    if (errorDiv.length) {
                                        errorDiv.text(xhr.responseJSON.errors[key][0])
                                            .show();
                                    }
                                });
                            } else {
                                $('#error_message')
                                    .text(xhr.responseJSON?.message || 'Server error')
                                    .show();
                            }
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
