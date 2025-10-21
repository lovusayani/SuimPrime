<!-- Subtitle Info Section -->
<div class="d-flex align-items-center justify-content-between mt-5 pt-1 mb-3">
    <h5>Subtitle Info</h5>
</div>

<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md-12">
                <div class="d-flex align-items-center justify-content-between form-control">
                    <label for="enable_subtitle" class="form-label mb-0 text-body">Enable Subtitle</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="enable_subtitle" value="0">
                        <input type="checkbox" name="enable_subtitle" id="enable_subtitle" class="form-check-input"
                            value="1" onchange="toggleSubtitleSection()">
                    </div>
                </div>
            </div>

            <div id="subtitle_section" class="col-md-12 d-none">
                <div id="subtitle-inputs-container">
                    <div class="row gy-3 subtitle-row">
                        <div class="col-md-4">
                            <label class="form-label" for="language">Langauges</label>
                            <select class="form-control select2 subtitle-language" name="subtitles[0][language]"
                                id="subtitles[0][language]">
                                <option value>Select Language</option>
                                <option value="en">English</option>
                                <option value="fr">French</option>
                                <option value="ar">Arebic</option>
                                <option value="vi">Vietnamese</option>
                                <option value="es">Spanish</option>
                                <option value="nl">Dutch</option>
                                <option value="pt">Portuguese</option>
                            </select>
                            <div class="invalid-feedback">The language field is required.</div>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label" for="subtitle_file">Subtitle File</label>
                            <input class="form-control subtitle-file" type="file" name="subtitles[0][subtitle_file]"
                                id="subtitles[0][subtitle_file]" accept=".srt,.vtt">
                            <div class="invalid-feedback">The subtitle file field is required.</div>
                        </div>
                        <div class="col-md-3 pt-3">
                            <div class="form-check mt-5">
                                <input type="checkbox" name="subtitles[0][is_default]"
                                    class="form-check-input is-default-subtitle" id="is_default_0">
                                <label class="form-check-label" for="is_default_0">Default Subtitle</label>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <button type="button" class="btn btn-danger btn-sm mt-5 remove-subtitle d-none">
                                <i class="ph ph-trash"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="text-end mt-3">
                    <a type="button" id="add-subtitle" class="btn btn-sm btn-primary"><i class="ph ph-plus-circle"></i>
                        Add More</a>
                </div>
            </div>
        </div>
    </div>
</div>
