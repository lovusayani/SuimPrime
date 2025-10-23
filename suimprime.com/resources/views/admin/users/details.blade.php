@extends('layouts.admin')

@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.users.index') }}">Users</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>

        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <div class="header-title">
                    <h4 class="card-title">User Details</h4>
                </div>
                <div>
                    <a href="{{ route('admin.users.edit', $user->id) }}" class="btn btn-warning btn-sm">
                        <i class="ph ph-pencil-simple-line"></i> Edit
                    </a>
                    <a href="{{ route('admin.users.index') }}" class="btn btn-secondary btn-sm">
                        <i class="ph ph-arrow-left"></i> Back
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 text-center mb-4">
                        <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/dummy-images/Default-Image.jpg') }}"
                            alt="avatar" class="avatar avatar-150 rounded-circle">
                    </div>
                    <div class="col-md-9">
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th style="width: 200px;">Name:</th>
                                        <td>{{ $user->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $user->email }}</td>
                                    </tr>
                                    <tr>
                                        <th>Contact Number:</th>
                                        <td>{{ $user->phone ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Gender:</th>
                                        <td>{{ $user->gender ? ucfirst($user->gender) : '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th>Role:</th>
                                        <td>
                                            <span class="badge bg-{{ $user->role === 'admin' ? 'danger' : 'primary' }}">
                                                {{ ucfirst($user->role) }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            <span class="badge bg-{{ $user->status ? 'success' : 'secondary' }}">
                                                {{ $user->status ? 'Active' : 'Inactive' }}
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email Verified:</th>
                                        <td>
                                            @if ($user->email_verified_at)
                                                <span class="badge bg-success">Verified</span>
                                                <small
                                                    class="text-muted">({{ $user->email_verified_at->format('M d, Y') }})</small>
                                            @else
                                                <span class="badge bg-warning">Not Verified</span>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Registered:</th>
                                        <td>{{ $user->created_at->format('M d, Y h:i A') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Last Updated:</th>
                                        <td>{{ $user->updated_at->format('M d, Y h:i A') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
