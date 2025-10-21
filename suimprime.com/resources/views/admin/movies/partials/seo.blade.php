<!-- SEO Settings Section -->
<div class="d-flex align-items-center justify-content-between mt-5 pt-1 mb-3">
    <h4 class="mb-0">&nbsp;SEO Settings</h4>
</div>

<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md-12">
                <div class="d-flex justify-content-between align-items-center form-control">
                    <label for="enableSeoIntegration" class="form-label mb-0 text-body">Enable SEO
                        Setting</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="enable_seo" value="0">
                        <input type="checkbox" name="enable_seo" id="enableSeoIntegration" class="form-check-input"
                            value="1" onchange="toggleSeoFields()">
                    </div>
                </div>
            </div>

            <div id="seoFields" style="display: none;">
                <div class="row mb-3">
                    <!-- SEO Image -->
                    <div class="col-md-4 position-relative">
                        <input type="hidden" name="seo_image" id="seo_image" value>
                        <label class="form-label" for="seo_image">SEO Image <span class="required">*</span></label>
                        <div class="input-group btn-file-upload">
                            <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-image-container="selectedImageContainerSeo"
                                data-hidden-input="seo_image" id="seo-image-url-button" style="height:13.6rem"><i
                                    class="ph ph-image"></i>
                                Choose Media to Upload</button>
                            <input class="form-control" type="text" name="seo_image_input" id="seo_image_input"
                                placeholder="Select Media" readonly data-bs-toggle="modal"
                                data-bs-target="#exampleModal" data-image-container="selectedImageContainerSeo"
                                data-hidden-input="seo_image">
                        </div>
                        <div class="uploaded-image mt-2" id="selectedImageContainerSeo">
                            <img id="selectedSeoImage" src="" alt="seo-image-preview" class="img-fluid"
                                style="display:none;" />
                        </div>
                        <div class="invalid-feedback mt-1" id="seo_image_error" style="display: none;">
                            SEO
                            Image is required</div>
                    </div>
                    <!-- Meta Title + Google Verification -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="meta_title">Meta Title <span
                                        class="required">*</span></label>
                                <div id="meta-title-char-count" class="text-muted">0/100 words</div>
                            </div>
                            <input type="text" name="meta_title" id="meta_title" class="form-control" value=""
                                maxlength="100" placeholder="Enter Meta Title" required>
                            <div class="invalid-feedback" id="meta_title_error" style="display: none;">
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="google_site_verification">Google Site
                                Verification
                                <span class="required">*</span></label>
                            <input type="text" name="google_site_verification" id="google_site_verification"
                                class="form-control" value="" placeholder="Enter Google site verification">
                            <div class="invalid-feedback" id="embed-error">Google Site Verification is
                                required</div>
                        </div>
                    </div>
                    <!-- Meta Keywords + Canonical URL -->
                    <div class="col-md-4">
                        <div class="form-group mb-3">
                            <label class="form-label" for="meta_keywords_input">Meta Keywords <span
                                    class="required">*</span></label>
                            <input type="text" name="meta_keywords" id="meta_keywords_input" class="form-control"
                                placeholder="Type and press enter" value="">
                            <div id="meta_keywords_hidden_inputs"></div>
                            <div class="invalid-feedback" id="meta_keywords_error">Meta Keywords are
                                required
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label class="form-label" for="canonical_url">Global Canonical URL <span
                                    class="required">*</span></label>
                            <input type="text" name="canonical_url" id="canonical_url" class="form-control"
                                value="" placeholder="Enter Global Canonical url">
                            <div class="invalid-feedback" id="embed-error">Canonical URL is required</div>
                        </div>
                    </div>
                </div>
                <!-- Short Description -->
                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="short_description">Site Meta Description <span
                                    class="required">*</span></label>
                            <div id="meta-description-char-count" class="text-muted">0/200 words</div>
                        </div>
                        <textarea name="short_description" id="short_description" class="form-control" maxlength="200"
                            placeholder="Enter Meta Description"></textarea>
                        <div class="invalid-feedback" id="embed-error">Site Meta Description is required
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
