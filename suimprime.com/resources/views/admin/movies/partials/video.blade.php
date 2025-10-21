<!-- Video Info Section -->
<div class="d-flex align-items-center justify-content-between mt-5 pt-1 mb-3">
    <h5>Video Info</h5>
</div>

<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md-6">
                <label class="form-label" for="video_upload_type">Video Upload Type<span
                        class="text-danger">*</span></label>
                <select class="form-control select2" name="video_upload_type" id="video_upload_type" required>
                    <option value selected="selected">Select Video Type</option>
                    <option value="x265">x265</option>
                    <option value="Embedded">Embedded</option>
                    <option value="Local">Local</option>
                    <option value="URL">URL</option>
                    <option value="YouTube">YouTube</option>
                    <option value="HLS">HLS(M3U8)</option>
                    <option value="Vimeo">Vimeo</option>
                </select>
                <div class="invalid-feedback" id="name-error">Video Type field is required</div>
            </div>

            <div class="col-md-6">
                <div class="mb-3 d-none" id="video_url_input_section">
                    <label class="form-label" for="video_url_input">Video URL<span class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="video_url_input" id="video_url_input"
                        placeholder="e.g  https://www.google.com/search?sca_esv=e993daa5ef008a5b&q=Avengers">
                    <div class="invalid-feedback" id="url-error">Video URL field is required</div>
                    <div class="invalid-feedback" id="url-pattern-error" style="display:none;">Please enter a
                        valid URL starting with http:// or https://.</div>
                </div>

                <div class="mb-3 d-none" id="video_file_input_section">
                    <label class="form-label" for="video_file">Video File<span class="text-danger">*</span></label>
                    <div class="input-group btn-video-link-upload mb-3">
                        <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerVideourl"
                            data-hidden-input="file_url_video">Choose file to upload<i
                                class="ph ph-upload"></i></button>
                        <input class="form-control" type="text" name="video_file_input" id="video_file_input"
                            placeholder="Select Image" aria-label="Video Image" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerVideourl"
                            data-hidden-input="file_url_video">
                    </div>
                    <div class="mt-3" id="selectedImageContainerVideourl"></div>
                    <input type="hidden" name="video_file_input" id="file_url_video" value
                        data-validation="iq_video_quality">
                    <div class="invalid-feedback" id="file-error">Video File field is required</div>
                </div>

                <div class="mb-3 d-none" id="video_embed_input_section">
                    <label class="form-label" for="embedded">Embed Code<span class="text-danger">*</span></label>
                    <textarea class="form-control" name="embedded" id="embedded" placeholder="&lt;iframe ...&gt;&lt;/iframe&gt;"></textarea>
                    <div class="invalid-feedback" id="embed-error">Embed code is required</div>
                </div>
            </div>
        </div>
    </div>
</div>
