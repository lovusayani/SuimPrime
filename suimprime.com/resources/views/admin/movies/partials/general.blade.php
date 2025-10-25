<!-- About Movie Section -->
<div class="d-flex align-items-center justify-content-between mt-5 pt-4 mb-3">
    <h5>About Movie</h5>
</div>

<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <div class="col-md-4 col-lg-4">
                <div class="position-relative">
                    <input type="hidden" name="type" id="type" value="movie">
                    <input type="hidden" name="tmdb_id" id="tmdb_id">
                    <input type="hidden" name="is_import" id="is_import" value="0">
                    <label class="form-label" for="thumbnail">Thumbnail</label>
                    <div class="input-group btn-file-upload">
                        <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerThumbnail"
                            data-hidden-input="thumbnail_url" id="iq-image-url" style="height:13.6rem"><i
                                class="ph ph-image"></i> Choose Media to Upload</button>
                        <input class="form-control" type="text" name="thumbnail_input" id="thumbnail_input"
                            placeholder="placeholder.lbl_image" aria-label="Thumbnail Image" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerThumbnail"
                            data-hidden-input="thumbnail_url"
                            value="{{ old('thumbnail_input', $movie->posterTvDetails->thumbnail ?? '') }}">
                    </div>
                    <div class="uploaded-image" id="selectedImageContainerThumbnail">
                        @if (isset($movie) && $movie->posterTvDetails && $movie->posterTvDetails->thumbnail)
                            <img id="selectedImage" src="{{ asset($movie->posterTvDetails->thumbnail) }}"
                                alt="feature-image" class="img-fluid mb-2" />
                        @else
                            <img id="selectedImage" src="" alt="feature-image" class="img-fluid mb-2"
                                style="display:none;" />
                        @endif
                    </div>
                    <input type="hidden" name="thumbnail_url" id="thumbnail_url"
                        value="{{ old('thumbnail_url', $movie->posterTvDetails->thumbnail ?? '') }}">
                </div>
            </div>

            <div class="col-md-4 col-lg-4">
                <div class="position-relative">
                    <label class="form-label" for="poster">Poster</label>
                    <div class="input-group btn-file-upload">
                        <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerPoster"
                            data-hidden-input="poster_url" style="height:13.6rem"><i class="ph ph-image"></i>Choose
                            Media to Upload</button>

                        <input class="form-control" type="text" name="poster_input" id="poster_input"
                            placeholder="placeholder.lbl_image" aria-label="Poster Image" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerPoster"
                            data-hidden-input="poster_url"
                            value="{{ old('poster_input', $movie->posterTvDetails->poster ?? '') }}">

                        <input type="hidden" name="poster_url" id="poster_url"
                            value="{{ old('poster_url', $movie->posterTvDetails->poster ?? '') }}">
                    </div>
                    <div class="uploaded-image" id="selectedImageContainerPoster">
                        @if (isset($movie) && $movie->posterTvDetails && $movie->posterTvDetails->poster)
                            <img id="selectedPosterImage" src="{{ asset($movie->posterTvDetails->poster) }}"
                                alt="feature-image" class="img-fluid mb-2 avatar-80" />
                        @else
                            <img id="selectedPosterImage" src="" alt="feature-image"
                                class="img-fluid mb-2 avatar-80" style="display:none;" />
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4">
                <div class="position-relative">
                    <label class="form-label" for="poster_tv">Poster Tv Image</label>
                    <div class="input-group btn-file-upload">
                        <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerPosterTv"
                            data-hidden-input="poster_tv_url" style="height:13.6rem"><i
                                class="ph ph-image"></i>Choose
                            Media to Upload</button>

                        <input class="form-control" type="text" name="poster_tv_input" id="poster_tv_input"
                            placeholder="placeholder.lbl_image" aria-label="Poster Image" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainerPosterTv"
                            data-hidden-input="poster_tv_url">

                        <input type="hidden" name="poster_tv_url" id="poster_tv_url" value>
                    </div>
                    <div class="uploaded-image" id="selectedImageContainerPosterTv">
                        <img id="selectedPosterTvImage" src="" alt="feature-image"
                            class="img-fluid mb-2 avatar-80 " style="display:none;" />
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-lg-4 mb-3">
                <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="name" id="name"
                    value="{{ old('name', $movie->title ?? '') }}" placeholder="e.g. Avengers: Endgame"
                    required="required">
                <span class="text-danger" id="error_msg"></span>
                <div class="invalid-feedback" id="name-error">Name field is required</div>
            </div>

            <div class="col-md-4 col-lg-4 mb-3">
                <label class="form-label" for="type">Trailer URL Type <span class="text-danger">*</span></label>
                <select class="form-control" name="trailer_url_type" id="trailer_url_type" required>
                    <option value>Select Type</option>
                    <option value="x265" {{ old('trailer_url_type') === 'x265' ? 'selected' : '' }}>x265</option>
                    <option value="Embedded"
                        {{ old('trailer_url_type') === 'Embedded' || (isset($movie) && $movie->posterTvDetails && $movie->posterTvDetails->embed_code) ? 'selected' : '' }}>
                        Embedded</option>
                    <option value="Local"
                        {{ old('trailer_url_type') === 'Local' || (isset($movie) && $movie->posterTvDetails && $movie->posterTvDetails->trailer_file) ? 'selected' : '' }}>
                        Local</option>
                    <option value="URL"
                        {{ old('trailer_url_type') === 'URL' || (isset($movie) && $movie->posterTvDetails && $movie->posterTvDetails->trailer_url) ? 'selected' : '' }}>
                        URL</option>
                    <option value="YouTube" {{ old('trailer_url_type') === 'YouTube' ? 'selected' : '' }}>YouTube
                    </option>
                    <option value="HLS" {{ old('trailer_url_type') === 'HLS' ? 'selected' : '' }}>HLS(M3U8)
                    </option>
                    <option value="Vimeo" {{ old('trailer_url_type') === 'Vimeo' ? 'selected' : '' }}>Vimeo</option>
                </select>
                <div class="invalid-feedback" id="name-error">Trailer Type field is required</div>
            </div>

            <div class="col-md-4 col-lg-4 mb-3">
                <!-- Trailer URL / File / Embed -->
                <div id="url_input">
                    <label class="form-label" for="trailer_url">Trailer URL <span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="text" name="trailer_url" id="trailer_url"
                        value="{{ old('trailer_url', $movie->posterTvDetails->trailer_url ?? '') }}"
                        placeholder="e.g. https://www.google.com/search?sca_esv=e993daa5ef008a5b&amp;q=Avengers:+Endgame&amp;stick">
                    <div class="invalid-feedback" id="trailer-url-error">Video URL field is required</div>
                    <div class="invalid-feedback" id="trailer-pattern-error" style="display:none;">
                        Please enter a valid URL starting with http:// or https://.
                    </div>
                </div>
                <div id="url_file_input">
                    <label class="form-label" for="trailer_video">Trailer Video File</label>
                    <div class="input-group btn-video-link-upload">
                        <button class="input-group-text form-control" type="button" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainertailerurl"
                            data-hidden-input="file_url_trailer">Choose file to upload<i
                                class="ph ph-upload"></i></button>

                        <input class="form-control" type="text" name="trailer_input" id="trailer_input"
                            placeholder="e.g. Avengers: Endgame" aria-label="Trailer Image" data-bs-toggle="modal"
                            data-bs-target="#exampleModal" data-image-container="selectedImageContainertailerurl"
                            data-hidden-input="file_url_trailer">
                    </div>

                    <div class="mt-3" id="selectedImageContainertailerurl"></div>

                    <input type="hidden" name="trailer_video" id="file_url_trailer" value
                        data-validation="iq_video_quality">

                    <div class="invalid-feedback" id="trailer-file-error">Video File field is required</div>
                </div>
                <div id="trailer_embed_input_section" class="d-none">
                    <label class="form-label" for="trailer_embedded">Embed Code <span
                            class="text-danger">*</span></label>
                    <textarea class="form-control" name="trailer_embedded" id="trailer_embedded"
                        placeholder="&lt;iframe ...&gt;&lt;/iframe&gt;"></textarea>
                    <div class="invalid-feedback" id="trailer-embed-error">Embed code is required</div>
                </div>
            </div>

            <div class="col-lg-12">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <label class="form-label mb-0" for="description">Description <span
                            class="text-danger">*</span></label>
                    <span class="text-primary cursor-pointer" id="GenrateDescription"><i class="ph ph-info"
                            data-bs-toggle="tooltip" title="For Generate description with AI"></i> Generate
                        Description with AI</span>
                </div>
                <textarea class="form-control" name="description" id="description"
                    placeholder="e.g. Avengers: Endgame is a 2019 American superhero film based on the Marvel Comics superhero team the Avengers."
                    rows="5">{{ old('description', $movie->description ?? '') }}</textarea> <!-- required="required"  -->
                <div class="invalid-feedback" id="desc-error">Description field is required</div>
            </div>

            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="movie_access">Access</label>
                <div class="d-flex align-items-center gap-3">
                    <label class="form-check form-check-inline form-control px-5 cursor-pointer">
                        <div>
                            <input class="form-check-input" type="radio" name="movie_access" id="paid"
                                value="paid"
                                onchange="if (!window.__cfRLUnblockHandlers) return false; showPlanSelection(this.value === 'paid')"
                                {{ (isset($movie) && $movie->movie_access === 'paid') || (!isset($movie) && old('movie_access') === 'paid') ? 'checked' : '' }}
                                data-cf-modified-8ff08e1f75c3db71988bed4b-="">
                            <span class="form-check-label">Paid</span>
                        </div>
                    </label>
                    <label class="form-check form-check-inline form-control px-5 cursor-pointer">
                        <div>
                            <input class="form-check-input" type="radio" name="movie_access" id="free"
                                value="free"
                                onchange="if (!window.__cfRLUnblockHandlers) return false; showPlanSelection(this.value === 'paid')"
                                {{ (isset($movie) && $movie->movie_access === 'free') || (!isset($movie) && old('movie_access') === 'free') || (!isset($movie) && !old('movie_access')) ? 'checked' : '' }}
                                data-cf-modified-8ff08e1f75c3db71988bed4b-="">
                            <span class="form-check-label">Free</span>
                        </div>
                    </label>

                    <label class="form-check form-check-inline form-control px-5 cursor-pointer">
                        <div>
                            <input class="form-check-input" type="radio" name="movie_access" id="pay-per-view"
                                value="pay-per-view"
                                onchange="if (!window.__cfRLUnblockHandlers) return false; showPlanSelection(this.value === 'pay-per-view')"
                                {{ (isset($movie) && $movie->movie_access === 'pay-per-view') || (!isset($movie) && old('movie_access') === 'pay-per-view') ? 'checked' : '' }}
                                data-cf-modified-8ff08e1f75c3db71988bed4b-="">
                            <span class="form-check-label" for="pay-per-view">Pay Per View</span>
                        </div>
                    </label>
                </div>
            </div>
            <div class="col-12 row g-3 mt-2 d-none" id="payPerViewFields">
                <div class="col-md-4">
                    <label class="form-label" for="price">Price<span class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="price" id="price"
                        placeholder="Enter Price" step="0.01"
                        value="{{ old('price', $movie->payPerView->price ?? '') }}" required>
                    <div class="invalid-feedback" id="price-error">Price field is required</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="access_duration">Purchase Type<span
                            class="text-danger">*</span></label>
                    <select class="form-control select2" name="purchase_type" id="purchase_type" required
                        onchange="if (!window.__cfRLUnblockHandlers) return false; toggleAccessDuration(this.value)"
                        data-cf-modified-8ff08e1f75c3db71988bed4b-="">
                        <option value="rental"
                            {{ old('purchase_type', $movie->payPerView->purchase_type ?? '') === 'rental' ? 'selected' : '' }}>
                            Rental</option>
                        <option value="onetime"
                            {{ old('purchase_type', $movie->payPerView->purchase_type ?? '') === 'onetime' ? 'selected' : '' }}>
                            One Time Purchase</option>
                    </select>
                    <div class="invalid-feedback" id="purchase_type-error">Purchase Type field is
                        required</div>
                </div>
                <div class="col-md-4 d-none" id="accessDurationWrapper">
                    <label class="form-label" for="access_duration">Access Duration (Days)<span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="access_duration" id="access_duration"
                        placeholder="Enter Duration" min="1" pattern="[0-9]*"
                        value="{{ old('access_duration', $movie->payPerView->access_duration ?? '') }}"
                        oninput="if (!window.__cfRLUnblockHandlers) return false; this.value = this.value.replace(/[^0-9]/g, &quot;&quot;)"
                        required data-cf-modified-8ff08e1f75c3db71988bed4b-="">
                    <div class="invalid-feedback" id="access_duration-error">Access Duration field is
                        required</div>
                </div>

                <div class="col-md-4">
                    <label class="form-label" for="discount">Discount (%)</label>
                    <input class="form-control" type="number" name="discount" id="discount"
                        placeholder="Enter Discount" step="0.01" min="0" max="99"
                        value="{{ old('discount', $movie->payPerView->discount ?? '') }}">
                    <div class="invalid-feedback" id="discount-error">Available For field is required
                    </div>

                </div>
                <div class="col-md-4">
                    <label class="form-label" for="total_amount">Total Price</label>
                    <input class="form-control" type="text" name="total_amount" id="total_amount"
                        value="{{ old('total_amount', $movie->payPerView->total_amount ?? '') }}" disabled="1">
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="available_for">Available For (Days)<span
                            class="text-danger">*</span></label>
                    <input class="form-control" type="number" name="available_for" id="available_for"
                        placeholder="Enter Available Days" min="1" pattern="[0-9]*"
                        value="{{ old('available_for', $movie->payPerView->available_for ?? '') }}"
                        oninput="if (!window.__cfRLUnblockHandlers) return false; this.value = this.value.replace(/[^0-9]/g, &quot;&quot;)"
                        required data-cf-modified-8ff08e1f75c3db71988bed4b-="">
                    <div class="invalid-feedback" id="available_for-error">Available For field is
                        required</div>
                </div>
                <div class="col-md-4">
                    <label class="form-label" for="ppv_status">Pay Per View Status</label>
                    <div class="d-flex justify-content-between align-items-center form-control">
                        <label class="form-label mb-0 text-body" for="ppv_status">Active</label>
                        <div class="form-check form-switch">
                            <input type="hidden" name="ppv_status" value="0">
                            <input class="form-check-input" type="checkbox" name="ppv_status" id="ppv_status"
                                value="1" checked>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 " id="planSelection">
                <label class="form-label" for="type">Plan<span class="text-danger"> *</span></label>
                <select class="form-control select2" name="plan_id" id="plan_id">
                    <option value>Select Plan</option>
                    <option value="5">Basic</option>
                    <option value="6">Premium Plan</option>
                    <option value="7">Ultimate Plan</option>
                </select>
                <div class="invalid-feedback" id="name-error">Plan field is required</div>
            </div>
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="status">Status</label>
                <div class="d-flex justify-content-between align-items-center form-control">
                    <label class="form-label mb-0 text-body" for="status">Active</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="status" id="status" value="0">
                        <input class="form-check-input" type="checkbox" name="status" id="status"
                            value="1"
                            {{ (isset($movie) && $movie->status === 'active') || old('status') === '1' ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Now comes your existing Basic Info Section -->

<!-- Basic Info Section -->
<div class="d-flex align-items-center justify-content-between mt-5 pt-1 mb-3">
    <h5>Basic Info</h5>
</div>

<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <!-- Language -->
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="language">Language<span class="text-danger">*</span></label>
                <select class="form-control select2" name="language" id="language" required>
                    <option value>Select Language</option>
                    <option value="english">English</option>
                    <option value="hindi">Hindi</option>
                    <option value="tamil">Tamil</option>
                    <option value="telugu">Telugu</option>
                    <option value="malayalam">Malayalam</option>
                    <option value="spanish">Spanish</option>
                    <option value="french">French</option>
                    <option value="arabic">Arabic</option>
                    <option value="german">German</option>
                    <option value="हिन्दी">हिन्दी</option>
                </select>
                <div class="invalid-feedback" id="name-error">Language field is required</div>
            </div>
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="genres">Genres <span class="text-danger">*</span></label>
                <select class="form-control select2" name="genres[]" id="genres" multiple required>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}">{{ $genre->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback" id="name-error">Genres field is required</div>
            </div>


            <!-- Countries -->
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="countries">Countries</label>
                <select class="form-control select2" name="countries[]" id="countries" multiple>
                    <option value="101">India</option>
                    <option value="102">Indonesia</option>
                    <option value="103">Iran</option>
                    <option value="104">Iraq</option>
                    <option value="105">Ireland</option>
                    <option value="106">Israel</option>
                    <option value="107">Italy</option>
                    <!-- Add other countries as needed -->
                </select>
                <div class="invalid-feedback" id="country-error">Country field is required</div>
            </div>

            <!-- IMDb Rating -->
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="imdb_rating">IMDb Rating <span class="text-danger">*</span></label>
                <input class="form-control" type="text" name="imdb_rating" id="imdb_rating"
                    placeholder="IMDb Rating" value="{{ old('imdb_rating', $movie->imdb_rating ?? '') }}" required>
                <div class="invalid-feedback" id="imdb-error">IMDB Rating field is required</div>
            </div>

            <!-- Content Rating -->
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="content_rating">Content Rating<span
                        class="text-danger">*</span></label>
                <input class="form-control" type="text" name="content_rating" id="content_rating"
                    placeholder="e.g. Everyone. Content is generally suitable for all ages" required>
                <div class="invalid-feedback" id="name-error">Content Rating field is required</div>
            </div>

            <!-- Duration (Runtime in minutes) -->
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="runtime">Runtime (minutes) <span class="text-danger">*</span></label>
                <input class="form-control" type="number" name="runtime" id="runtime" placeholder="e.g. 120"
                    value="{{ old('runtime', $movie->runtime ?? '') }}" min="1" required>
                <div class="invalid-feedback" id="runtime-error">Runtime field is required</div>
            </div>

            <!-- Release Date -->
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="release_date">Release Date<span class="text-danger">*</span></label>
                <input class="form-control datetimepicker" type="text" name="release_date" id="release_date"
                    placeholder="Release Date" value="{{ old('release_date', $movie->release_date ?? '') }}"
                    required>
                <div class="invalid-feedback" id="release_date-error">Release Date field is required</div>
            </div>

            <!-- Age Restricted -->
            <div class="col-md-6 col-lg-4">
                <label class="form-label" for="is_restricted">Age Restricted</label>
                <div class="d-flex justify-content-between align-items-center form-control">
                    <label class="form-label mb-0 text-body" for="is_restricted">Restricted Content</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="is_restricted" value="0">
                        <input class="form-check-input" type="checkbox" name="is_restricted" value="1">
                    </div>
                </div>
            </div>

            <!-- Download Status -->
            <div class="col-md-6 col-lg-4" id="dowaloadstatuswapper">
                <label class="form-label" for="download_status">Download Status</label>
                <div class="d-flex justify-content-between align-items-center form-control">
                    <label class="form-label mb-0 text-body" for="download_status">On</label>
                    <div class="form-check form-switch">
                        <input type="hidden" name="download_status" value="disable">
                        <input class="form-check-input" type="checkbox" name="download_status" value="enable"
                            {{ (isset($movie) && $movie->download_status === 'enable') || old('download_status') === 'enable' ? 'checked' : '' }}>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Actors & Directors Section -->
<div class="d-flex align-items-center justify-content-between mt-5 pt-1 mb-3">
    <h6>Actors &amp; Directors</h6>
</div>

<div class="card">
    <div class="card-body">
        <div class="row gy-3">
            <!-- Actors -->
            <div class="col-md-6">
                <label class="form-label" for="actors">Actors<span class="text-danger">*</span></label>
                <select class="form-control select2" name="actors[]" id="actors" multiple required>
                    @foreach ($actors as $actor)
                        <option value="{{ $actor->id }}">{{ $actor->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback" id="name-error">Actors field is required</div>
            </div>

            <!-- Directors -->
            <div class="col-md-6">
                <label class="form-label" for="directors">Directors<span class="text-danger">*</span></label>
                <select class="form-control select2" name="directors[]" id="directors" multiple required>
                    @foreach ($directors as $director)
                        <option value="{{ $director->id }}">{{ $director->name }}</option>
                    @endforeach
                </select>
                <div class="invalid-feedback" id="name-error">Directors field is required</div>
            </div>
        </div>
    </div>
</div>
