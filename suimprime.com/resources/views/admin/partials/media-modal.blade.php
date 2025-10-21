<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Media Library</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                {{-- Upload form (optional) --}}
                <form id="mediaUploadForm" class="row g-2 mb-3" enctype="multipart/form-data">
                    @csrf
                    <div class="col-auto">
                        <input type="file" name="file" class="form-control" id="mediaFile">
                    </div>
                    <div class="col-auto">
                        <input type="text" name="url" class="form-control" id="mediaUrl"
                            placeholder="Or paste remote URL">
                    </div>
                    <div class="col-auto">
                        <input type="text" name="title" class="form-control" id="mediaTitle"
                            placeholder="Title (optional)">
                    </div>
                    <div class="col-auto">
                        <button type="button" id="uploadMediaBtn" class="btn btn-primary">Upload</button>
                    </div>
                </form>

                {{-- Media grid will be loaded here --}}
                <div id="media-container"></div>
            </div>

            <div class="modal-footer">
                <button type="button" id="modalClearSelection" class="btn btn-secondary">Clear</button>
                <button type="button" id="modalSaveBtn" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>
