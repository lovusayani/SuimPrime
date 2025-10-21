<!-- Quality Info Section -->
<div class="d-flex align-items-center justify-content-between mt-5 pt-1 mb-3">
    <h5>Quality Info</h5>
</div>

<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-between form-control">
                    <label for="enable_quality" class="form-label mb-0 text-body">Turn on switch to upload
                        quality wise video</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="enable_quality" value="0">
                        <input type="checkbox" name="enable_quality" id="enable_quality" class="form-check-input"
                            value="1" onchange="toggleQualitySection()">
                    </div>
                </div>
            </div>

            <div id="enable_quality_section" class="col-md-12 enable_quality_section d-none">
                <div id="video-inputs-container-parent">
                    <div class="row gy-3 video-inputs-container mt-1">
                        <div class="col-md-3">
                            <label class="form-label" for="video_quality_type">Video Upload Type</label>
                            <select class="form-control select2 video_quality_type" name="video_quality_type[]"
                                id="video_quality_type[]">
                                <option value selected="selected">Select Video Type</option>
                                <option value="x265">x265</option>
                                <option value="Embedded">Embedded</option>
                                <option value="Local">Local</option>
                                <option value="URL">URL</option>
                                <option value="YouTube">YouTube</option>
                                <option value="HLS">HLS(M3U8)</option>
                                <option value="Vimeo">Vimeo</option>
                            </select>
                        </div>

                        <div class="col-md-4 video-input">
                            <label class="form-label" for="video_quality">Video Quality</label>
                            <select class="form-control select2 video_quality" name="video_quality[]"
                                id="video_quality[]">
                                <option value>Select Quality</option>
                                <option value="480p">480p</option>
                                <option value="720p">720p</option>
                                <option value="1080p">1080p</option>
                                <option value="1440p">1440p</option>
                                <option value="2K">2K</option>
                                <option value="4K">4K</option>
                                <option value="8K">8K</option>
                            </select>
                        </div>

                        <div class="col-md-4 d-none video-url-input quality_video_input">
                            <label class="form-label" for="quality_video_url_input">Video URL</label>
                            <input class="form-control" type="text" name="quality_video_url_input[]"
                                id="quality_video_url_input[]"
                                placeholder="e.g  https://www.google.com/search?sca_esv=e993daa5ef008a5b&q=Avengers">
                        </div>

                        <div class="col-md-4 d-none video-file-input quality_video_file_input">
                            <label class="form-label" for="quality_video">Video File</label>
                            <div class="input-group btn-video-link-upload">
                                <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal"
                                    data-image-container="selectedImageContainerVideoqualityurl"
                                    data-hidden-input="file_url_videoquality">Choose file to upload<i
                                        class="ph ph-upload"></i></button>
                                <input class="form-control" type="text" name="videoquality_input"
                                    id="videoquality_input" placeholder="Select Image" aria-label="Video Quality Image"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    data-image-container="selectedImageContainerVideoqualityurl"
                                    data-hidden-input="file_url_videoquality">
                            </div>
                            <div class="mt-3" id="selectedImageContainerVideoqualityurl"></div>
                            <input type="hidden" name="quality_video[]" id="file_url_videoquality" value
                                data-validation="iq_video_quality">
                        </div>

                        <div class="col-md-4 d-none video-embed-input quality_video_embed_input">
                            <label class="form-label" for="quality_video_embed">Embed Code</label>
                            <textarea class="form-control" name="quality_video_embed_input[]" id="quality_video_embed_input[]"
                                placeholder="&lt;iframe ...&gt;&lt;/iframe&gt;"></textarea>
                        </div>

                        <div class="col-sm-1 d-flex justify-content-center align-items-center mt-5">
                            <button type="button" class="btn btn-secondary-subtle btn-sm remove-video-input d-none"><i
                                    class="ph ph-trash align-middle"></i></button>
                        </div>
                    </div>
                </div>

                <div class="text-end">
                    <a id="add_more_video" class="btn btn-sm btn-primary"><i class="ph ph-plus-circle"></i>
                        Add More</a>
                </div>
            </div>
        </div>
    </div>
</div>
