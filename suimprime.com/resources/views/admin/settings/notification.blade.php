@extends('layouts.admin')

@section('title', 'Notification Settings')

@section('content')
    <div class="row">
        <div class="col-md-4 col-lg-3">
            @includeIf('admin.partials.settings_sidebar')
        </div>

        <div class="col-md-8 col-lg-9 navbar-expand-md">
            <div class="offcanvas offcanvas-end p-md-0" id="offcanvas" data-bs-backdrop="false">
                <div class="offcanvas-header">
                    <h4 class="offcanvas-title" id="offcanvasNavbarLabel">Setting</h4>
                    <button type="button" class="btn-close"
                        onclick="if (!window.__cfRLUnblockHandlers) return false; toggle()"></button>
                </div>
                <div class="card card-accent-primary offcanvas-body mb-0">
                    <div class="card-body">
                        <div class="container">
                            <form method="POST" action="{{ route('admin.settings.logo.update') }}" id="notificationForm">
                                @csrf
                                <div>
                                    <h3 class="card-title">
                                        <i class="ph ph-megaphone"></i>
                                        Notification Settings
                                    </h3>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <th>Type</th>
                                                <th>Templates</th>
                                                <th>Mail</th>
                                                <th>Mobile</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @for ($i = 0; $i < 12; $i++)
                                                <tr>
                                                    <td>template_{{ $i }}</td>
                                                    <td>Template {{ $i }}</td>
                                                    <td>
                                                        <input type="hidden"
                                                            name="templates[{{ $i }}][channels][IS_MAIL]"
                                                            value="0">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="templates[{{ $i }}][channels][IS_MAIL]"
                                                            value="1">
                                                    </td>
                                                    <td>
                                                        <input type="hidden"
                                                            name="templates[{{ $i }}][channels][PUSH_NOTIFICATION]"
                                                            value="0">
                                                        <input type="checkbox" class="form-check-input"
                                                            name="templates[{{ $i }}][channels][PUSH_NOTIFICATION]"
                                                            value="1" checked>
                                                    </td>
                                                </tr>
                                            @endfor
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
