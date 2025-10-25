@extends('layouts.admin')

@section('title', 'SEO Settings')

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3">
            @includeIf('admin.partials.settings_sidebar')
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="card card-accent-primary offcanvas-body mb-0">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h4 class="mb-0"><i class="ph ph-magnifying-glass fa-lg mr-2"></i>&nbsp;SEO Settings</h4>
                    </div>

                    <form class="requires-validation" method="POST" action="{{ route('admin.settings.seo.update') }}"
                        enctype="multipart/form-data" data-toggle="validator" id="form-submit" novalidate>
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row gy-3">
                                    <!-- SEO Fields Section -->
                                    <div>
                                        <div class="row mb-3">
                                            <!-- SEO Image -->
                                            <input type="hidden" name="id"
                                                value="{{ old('id', \App\Models\Setting::get('seo_id', '')) }}">
                                            <div class="col-md-4 position-relative">
                                                <input type="hidden" name="seo_image" id="seo_image"
                                                    value="{{ old('seo_image', \App\Models\Setting::get('seo_image', '')) }}">

                                                <label class="form-label" for="seo_image">SEO Image <span
                                                        class="required text-danger">*</span></label>

                                                <div class="input-group btn-file-upload mb-2">
                                                    <input class="form-control" type="file" name="seo_image_file"
                                                        id="seo_image_file" accept=".jpeg, .jpg, .png, .gif">
                                                </div>

                                                <div class="invalid-feedback mt-1" id="seo_image_error"
                                                    style="display: none;">
                                                    SEO Image is required
                                                </div>

                                                <div class="uploaded-image mt-2" id="selectedImageContainerSeo">
                                                    @if (\App\Models\Setting::get('seo_image', ''))
                                                        <img id="selectedSeoImage"
                                                            src="{{ \App\Models\Setting::get('seo_image', '') }}"
                                                            alt="seo-image-preview" class="img-fluid"
                                                            style="max-height: 200px;">
                                                    @else
                                                        <img id="selectedSeoImage" src="" alt="seo-image-preview"
                                                            class="img-fluid" style="display:none; max-height: 200px;">
                                                    @endif
                                                </div>
                                            </div>

                                            <!-- Meta Title + Google Verification -->
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <div class="d-flex justify-content-between">
                                                        <label class="form-label" for="meta_title">Meta Title <span
                                                                class="required text-danger">*</span></label>
                                                        <div id="meta-title-char-count" class="text-muted"
                                                            style="color: green;">
                                                            {{ strlen(old('meta_title', \App\Models\Setting::get('meta_title', ''))) }}/100
                                                        </div>
                                                    </div>

                                                    <input type="text" name="meta_title" id="meta_title"
                                                        class="form-control"
                                                        value="{{ old('meta_title', \App\Models\Setting::get('meta_title', '')) }}"
                                                        maxlength="100" placeholder="Enter Meta Title" required>

                                                    <div class="invalid-feedback" id="embed-error">Meta Title is required
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="google_site_verification">Google Site
                                                        Verification <span class="required text-danger">*</span></label>

                                                    <input type="text" name="google_site_verification"
                                                        id="google_site_verification" class="form-control"
                                                        value="{{ old('google_site_verification', \App\Models\Setting::get('google_site_verification', '')) }}"
                                                        placeholder="Enter Google site verification" required>
                                                    <div class="invalid-feedback" id="embed-error">Google Site Verification
                                                        is required</div>
                                                </div>
                                            </div>

                                            <!-- Meta Keywords + Canonical URL -->
                                            <div class="col-md-4">
                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="meta_keywords">Meta Keywords <span
                                                            class="required text-danger">*</span></label>

                                                    <input type="text" name="meta_keywords" id="meta_keywords"
                                                        class="form-control" placeholder="Type and press enter"
                                                        value="{{ old('meta_keywords', \App\Models\Setting::get('meta_keywords', '')) }}"
                                                        required>

                                                    <div class="invalid-feedback" id="meta_keywords_error"
                                                        style="display: none;">
                                                        Meta Keywords are required
                                                    </div>
                                                </div>

                                                <div class="form-group mb-3">
                                                    <label class="form-label" for="canonical_url">Global Canonical URL <span
                                                            class="required text-danger">*</span></label>

                                                    <input type="text" name="canonical_url" id="canonical_url"
                                                        class="form-control"
                                                        value="{{ old('canonical_url', \App\Models\Setting::get('canonical_url', '')) }}"
                                                        placeholder="Enter Global Canonical url" required>
                                                    <div class="invalid-feedback" id="embed-error">Canonical URL is
                                                        required</div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Short Description -->
                                        <div class="row">
                                            <div class="col-md-12 form-group mb-3">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" for="short_description">Site Meta
                                                        Description <span class="required text-danger">*</span></label>

                                                    <div id="meta-description-char-count" class="text-muted"
                                                        style="color: green;">
                                                        {{ strlen(old('short_description', \App\Models\Setting::get('short_description', ''))) }}/200
                                                    </div>
                                                </div>

                                                <textarea name="short_description" id="short_description" class="form-control" maxlength="200"
                                                    placeholder="Enter Meta Description" required>{{ old('short_description', \App\Models\Setting::get('short_description', '')) }}</textarea>

                                                <div class="invalid-feedback" id="embed-error">Site Meta Description is
                                                    required</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="d-grid d-sm-flex justify-content-sm-end gap-3 mb-5">
                            <button class="btn btn-md btn-primary float-right" type="submit"
                                id="submit-button">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Image preview
                $('#seo_image_file').on('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            $('#selectedSeoImage').attr('src', e.target.result).show();
                        };
                        reader.readAsDataURL(file);
                    }
                });

                // Character count for meta title
                $('#meta_title').on('input', function() {
                    const count = $(this).val().length;
                    $('#meta-title-char-count').text(count + '/100');
                    if (count > 80) {
                        $('#meta-title-char-count').css('color', 'red');
                    } else if (count > 60) {
                        $('#meta-title-char-count').css('color', 'orange');
                    } else {
                        $('#meta-title-char-count').css('color', 'green');
                    }
                });

                // Character count for meta description
                $('#short_description').on('input', function() {
                    const count = $(this).val().length;
                    $('#meta-description-char-count').text(count + '/200');
                    if (count > 160) {
                        $('#meta-description-char-count').css('color', 'red');
                    } else if (count > 120) {
                        $('#meta-description-char-count').css('color', 'orange');
                    } else {
                        $('#meta-description-char-count').css('color', 'green');
                    }
                });

                // Form validation
                $('#form-submit').on('submit', function(e) {
                    const form = $(this)[0];

                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    $(this).addClass('was-validated');
                });

                // Trigger initial count
                $('#meta_title').trigger('input');
                $('#short_description').trigger('input');
            });
        </script>
    @endpush

@endsection
