@extends('layouts.admin')

@section('title', 'Language Settings')

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3">
            @includeIf('admin.partials.settings_sidebar')
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="card card-accent-primary offcanvas-body mb-0">
                <div class="card-body">
                    <div class="container">
                        <div class="col-md-12 d-flex justify-content-between mb-4">
                            <h4><i class="ph ph-translate"></i> Language Settings</h4>
                        </div>

                        <form id="form-submit" method="POST" action="{{ route('admin.settings.language.update') }}"
                            class="requires-validation" novalidate>
                            @csrf
                            <div class="container">
                                <div class="row gy-3">
                                    <div class="col">
                                        <label class="form-label">Language Option<span class="text-danger">*</span></label>
                                        <select id="language_id" name="language_id" class="form-control select2" required>
                                            <option value="" disabled selected>Select Language</option>
                                            <option value="ar"
                                                {{ old('language_id', \App\Models\Setting::get('language_id', '')) == 'ar' ? 'selected' : '' }}>
                                                العربی(AR)
                                            </option>
                                            <option value="en"
                                                {{ old('language_id', \App\Models\Setting::get('language_id', 'en')) == 'en' ? 'selected' : '' }}>
                                                English (EN)
                                            </option>
                                            <option value="el"
                                                {{ old('language_id', \App\Models\Setting::get('language_id', '')) == 'el' ? 'selected' : '' }}>
                                                Greek (EL)
                                            </option>
                                            <option value="fr"
                                                {{ old('language_id', \App\Models\Setting::get('language_id', '')) == 'fr' ? 'selected' : '' }}>
                                                French (FR)
                                            </option>
                                            <option value="de"
                                                {{ old('language_id', \App\Models\Setting::get('language_id', '')) == 'de' ? 'selected' : '' }}>
                                                German (DE)
                                            </option>
                                        </select>
                                        <div class="invalid-feedback" id="language_id-error">Language field is required
                                        </div>
                                    </div>
                                    <div class="col">
                                        <label class="form-label">Select File to be translate<span
                                                class="text-danger">*</span></label>
                                        <select id="file_id" name="file_id" class="form-control select2">
                                            <option value="">Select File</option>
                                            <option value="auth" {{ old('file_id') == 'auth' ? 'selected' : '' }}>auth
                                            </option>
                                            <option value="backup" {{ old('file_id') == 'backup' ? 'selected' : '' }}>backup
                                            </option>
                                            <option value="banner" {{ old('file_id') == 'banner' ? 'selected' : '' }}>banner
                                            </option>
                                            <option value="castcrew" {{ old('file_id') == 'castcrew' ? 'selected' : '' }}>
                                                castcrew</option>
                                            <option value="city" {{ old('file_id') == 'city' ? 'selected' : '' }}>city
                                            </option>
                                            <option value="constant" {{ old('file_id') == 'constant' ? 'selected' : '' }}>
                                                constant</option>
                                            <option value="country" {{ old('file_id') == 'country' ? 'selected' : '' }}>
                                                country</option>
                                            <option value="currency" {{ old('file_id') == 'currency' ? 'selected' : '' }}>
                                                currency</option>
                                            <option value="customer" {{ old('file_id') == 'customer' ? 'selected' : '' }}>
                                                customer</option>
                                            <option value="customization"
                                                {{ old('file_id') == 'customization' ? 'selected' : '' }}>customization
                                            </option>
                                            <option value="dashboard"
                                                {{ old('file_id') == 'dashboard' ? 'selected' : '' }}>dashboard</option>
                                            <option value="episode" {{ old('file_id') == 'episode' ? 'selected' : '' }}>
                                                episode</option>
                                            <option value="export" {{ old('file_id') == 'export' ? 'selected' : '' }}>
                                                export</option>
                                            <option value="faq" {{ old('file_id') == 'faq' ? 'selected' : '' }}>faq
                                            </option>
                                            <option value="filemanager"
                                                {{ old('file_id') == 'filemanager' ? 'selected' : '' }}>filemanager
                                            </option>
                                            <option value="frontend" {{ old('file_id') == 'frontend' ? 'selected' : '' }}>
                                                frontend</option>
                                            <option value="genres" {{ old('file_id') == 'genres' ? 'selected' : '' }}>
                                                genres</option>
                                            <option value="installer_messages"
                                                {{ old('file_id') == 'installer_messages' ? 'selected' : '' }}>
                                                installer_messages</option>
                                            <option value="livetv" {{ old('file_id') == 'livetv' ? 'selected' : '' }}>
                                                livetv</option>
                                            <option value="location" {{ old('file_id') == 'location' ? 'selected' : '' }}>
                                                location</option>
                                            <option value="menu" {{ old('file_id') == 'menu' ? 'selected' : '' }}>menu
                                            </option>
                                            <option value="messages" {{ old('file_id') == 'messages' ? 'selected' : '' }}>
                                                messages</option>
                                            <option value="movie" {{ old('file_id') == 'movie' ? 'selected' : '' }}>movie
                                            </option>
                                            <option value="notification"
                                                {{ old('file_id') == 'notification' ? 'selected' : '' }}>notification
                                            </option>
                                            <option value="page" {{ old('file_id') == 'page' ? 'selected' : '' }}>page
                                            </option>
                                            <option value="pagination"
                                                {{ old('file_id') == 'pagination' ? 'selected' : '' }}>pagination</option>
                                            <option value="passwords"
                                                {{ old('file_id') == 'passwords' ? 'selected' : '' }}>passwords</option>
                                            <option value="placeholder"
                                                {{ old('file_id') == 'placeholder' ? 'selected' : '' }}>placeholder
                                            </option>
                                            <option value="plan" {{ old('file_id') == 'plan' ? 'selected' : '' }}>plan
                                            </option>
                                            <option value="plan_limitation"
                                                {{ old('file_id') == 'plan_limitation' ? 'selected' : '' }}>plan_limitation
                                            </option>
                                            <option value="profile" {{ old('file_id') == 'profile' ? 'selected' : '' }}>
                                                profile</option>
                                            <option value="review" {{ old('file_id') == 'review' ? 'selected' : '' }}>
                                                review</option>
                                            <option value="season" {{ old('file_id') == 'season' ? 'selected' : '' }}>
                                                season</option>
                                            <option value="setting_bussiness_page"
                                                {{ old('file_id') == 'setting_bussiness_page' ? 'selected' : '' }}>
                                                setting_bussiness_page</option>
                                            <option value="setting_custom_code"
                                                {{ old('file_id') == 'setting_custom_code' ? 'selected' : '' }}>
                                                setting_custom_code</option>
                                            <option value="setting_general_page"
                                                {{ old('file_id') == 'setting_general_page' ? 'selected' : '' }}>
                                                setting_general_page</option>
                                            <option value="setting_language_page"
                                                {{ old('file_id') == 'setting_language_page' ? 'selected' : '' }}>
                                                setting_language_page</option>
                                            <option value="setting_mail_page"
                                                {{ old('file_id') == 'setting_mail_page' ? 'selected' : '' }}>
                                                setting_mail_page</option>
                                            <option value="setting_meta_page"
                                                {{ old('file_id') == 'setting_meta_page' ? 'selected' : '' }}>
                                                setting_meta_page</option>
                                            <option value="setting_mobile_page"
                                                {{ old('file_id') == 'setting_mobile_page' ? 'selected' : '' }}>
                                                setting_mobile_page</option>
                                            <option value="setting_payment_method"
                                                {{ old('file_id') == 'setting_payment_method' ? 'selected' : '' }}>
                                                setting_payment_method</option>
                                            <option value="setting_sidebar"
                                                {{ old('file_id') == 'setting_sidebar' ? 'selected' : '' }}>setting_sidebar
                                            </option>
                                            <option value="setting_social_page"
                                                {{ old('file_id') == 'setting_social_page' ? 'selected' : '' }}>
                                                setting_social_page</option>
                                            <option value="settings" {{ old('file_id') == 'settings' ? 'selected' : '' }}>
                                                settings</option>
                                            <option value="sidebar" {{ old('file_id') == 'sidebar' ? 'selected' : '' }}>
                                                sidebar</option>
                                            <option value="slider" {{ old('file_id') == 'slider' ? 'selected' : '' }}>
                                                slider</option>
                                            <option value="state" {{ old('file_id') == 'state' ? 'selected' : '' }}>state
                                            </option>
                                            <option value="tax" {{ old('file_id') == 'tax' ? 'selected' : '' }}>tax
                                            </option>
                                            <option value="tvshow" {{ old('file_id') == 'tvshow' ? 'selected' : '' }}>
                                                tvshow</option>
                                            <option value="users" {{ old('file_id') == 'users' ? 'selected' : '' }}>users
                                            </option>
                                            <option value="validation"
                                                {{ old('file_id') == 'validation' ? 'selected' : '' }}>validation</option>
                                            <option value="video" {{ old('file_id') == 'video' ? 'selected' : '' }}>video
                                            </option>
                                        </select>
                                        <div class="invalid-feedback" id="file_id-error">File field is required</div>
                                    </div>
                                </div>
                            </div>

                            <div class="container py-3">
                                <div class="row">
                                    <div class="col">
                                        <h6>
                                            <label class="form-label">Key</label>
                                        </h6>
                                    </div>
                                    <div class="col">
                                        <h6>
                                            <label class="form-label">Value</label>
                                        </h6>
                                    </div>
                                </div>
                            </div>

                            <div class="container py-3" id="translation-keys">
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="failed" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="lang_data[failed]" class="form-control"
                                                value="{{ old('lang_data.failed', '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="password" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="lang_data[password]" class="form-control"
                                                value="{{ old('lang_data.password', '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="throttle" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="lang_data[throttle]" class="form-control"
                                                value="{{ old('lang_data.throttle', '') }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" class="form-control" value="unauthenticated" disabled>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <input type="text" name="lang_data[unauthenticated]" class="form-control"
                                                value="{{ old('lang_data.unauthenticated', '') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary" id="form_btn">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Initialize Select2
                if ($.fn.select2) {
                    $('.select2').select2({
                        width: '100%'
                    });
                }

                // Handle file selection change to load translation keys
                $('#file_id').on('change', function() {
                    const fileId = $(this).val();
                    const languageId = $('#language_id').val();

                    if (fileId && languageId) {
                        loadTranslationKeys(languageId, fileId);
                    }
                });

                // Handle language selection change
                $('#language_id').on('change', function() {
                    const languageId = $(this).val();
                    const fileId = $('#file_id').val();

                    if (fileId && languageId) {
                        loadTranslationKeys(languageId, fileId);
                    }
                });

                function loadTranslationKeys(languageId, fileId) {
                    // AJAX call to load translation keys
                    $.ajax({
                        url: '{{ route('admin.settings.language.load') }}',
                        method: 'GET',
                        data: {
                            language_id: languageId,
                            file_id: fileId
                        },
                        success: function(response) {
                            if (response.success) {
                                renderTranslationKeys(response.data);
                            }
                        },
                        error: function(xhr) {
                            console.error('Error loading translation keys:', xhr);
                        }
                    });
                }

                function renderTranslationKeys(data) {
                    const container = $('#translation-keys');
                    container.empty();

                    if (data && Object.keys(data).length > 0) {
                        $.each(data, function(key, value) {
                            const row = `
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" class="form-control" value="${key}" disabled>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <input type="text" name="lang_data[${key}]" class="form-control" value="${value || ''}">
                                </div>
                            </div>
                        </div>
                    `;
                            container.append(row);
                        });
                    } else {
                        container.html('<div class="alert alert-info">No translation keys found for this file.</div>');
                    }
                }

                // Form validation
                $('#form-submit').on('submit', function(e) {
                    const form = $(this)[0];

                    if (!form.checkValidity()) {
                        e.preventDefault();
                        e.stopPropagation();
                    }

                    $(this).addClass('was-validated');
                });
            });
        </script>
    @endpush

@endsection
