@extends('layouts.admin')

@section('title', 'Mail Settings')

@section('content')
<div class="row">
    <div class="col-md-4 col-lg-3">
        @includeIf('admin.partials.settings_sidebar')
    </div>
    <div class="col-md-8 col-lg-9">
        <div class="card card-accent-primary offcanvas-body mb-0">
            <div class="card-body">
                <div class="mb-4">
                    <h4><i class="fas fa-envelope"></i> Mail Settings </h4>
                </div>

                <form method="POST" action="{{ route('admin.settings.logo.update') }}" id="mail-settings-form">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label class="form-label">Email (email) <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="email" id="email" placeholder="info@example.com" value="{{ old('email', \App\Models\Setting::get('email', '')) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Mail Driver <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mail_driver" id="mail_driver" placeholder="smtp" value="{{ old('mail_driver', \App\Models\Setting::get('mail_driver', env('MAIL_MAILER', 'smtp'))) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Mail Host <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mail_host" id="mail_host" placeholder="smtp.gmail.com" value="{{ old('mail_host', \App\Models\Setting::get('mail_host', env('MAIL_HOST', 'smtp.gmail.com'))) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Mail Port <span class="text-danger">*</span></label>
                            <input class="form-control" type="number" name="mail_port" id="mail_port" placeholder="587" value="{{ old('mail_port', \App\Models\Setting::get('mail_port', env('MAIL_PORT', 587))) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Mail Encryption <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mail_encryption" id="mail_encryption" placeholder="tls" value="{{ old('mail_encryption', \App\Models\Setting::get('mail_encryption', env('MAIL_ENCRYPTION', 'tls'))) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Mail Username <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="mail_username" id="mail_username" placeholder="youremail@gmail.com" value="{{ old('mail_username', \App\Models\Setting::get('mail_username', env('MAIL_USERNAME', ''))) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">password <span class="text-danger">*</span></label>
                            <input class="form-control" type="password" name="mail_password" id="mail_password" placeholder="Password" value="" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">Mail From <span class="text-danger">*</span></label>
                            <input class="form-control" type="email" name="mail_from" id="mail_from" placeholder="youremail@gmail.com" value="{{ old('mail_from', \App\Models\Setting::get('mail_from', env('MAIL_FROM_ADDRESS', ''))) }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label class="form-label">From Name <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" name="from_name" id="from_name" placeholder="Streamit-Laravel" value="{{ old('from_name', \App\Models\Setting::get('from_name', env('MAIL_FROM_NAME', ''))) }}" required>
                        </div>
                    </div>
                    <div class="form-group text-end">
                        <button type="submit" class="btn btn-primary float-right">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
