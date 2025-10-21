@extends('layouts.admin')

@section('title', 'Directors')

@section('content')
    <div class="container-fluid content-inner pb-0">
        <div class="card-main mb-5">

            <div class="d-flex justify-content-between flex-column flex-sm-row gap-1 mb-4">
                <div class="d-flex flex-wrap gap-3">
                    <form id="quick-action-form" class="form-disabled d-flex gap-3 align-items-stretch flex-wrap">
                        <div class="">
                            <select name="action_type" class="form-control select2" id="quick-action-type">
                                <option value="">Action</option>
                                <option value="delete">Delete</option>
                                <option value="restore">Restore</option>
                                <option value="permanently-delete">Permanently delete</option>
                            </select>
                        </div>
                        <div class="select-status d-none quick-action-field" id="change-status-action">
                            <select name="status" class="form-control select2" id="status">
                                <option value="" selected>Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <button class="btn btn-primary" id="quick-action-apply" disabled>Apply</button>
                    </form>
                </div>
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar"
                    aria-label="Toolbar with buttons">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search"
                            aria-describedby="addon-wrapping" />
                    </div>

                    <a href="{{ route('admin.directors.create') }}" class="btn btn-primary d-flex align-items-center gap-1"
                        id="add-post-button">
                        <i class="ph ph-plus-circle"></i> New
                    </a>
                </div>
            </div>

            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="select-all"></th>
                            <th>Director</th>
                            <th>Date of Birth</th>
                            <th>Birth Place</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($directors as $director)
                            <tr>
                                <td><input type="checkbox" value="{{ $director->id }}"></td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">

                                        <img src="{{ $director->thumbnail ?? asset('default-image/Default-Image.jpg') }}"
                                            alt="{{ $director->name }}" width="80" height="80" class="rounded">
                                        <div>
                                            <h5 class="mb-1">{{ $director->name }}</h5>
                                        </div>
                                    </div>
                                </td>
                                <td>{{ $director->dob ? $director->dob->format('jS F Y') : '-' }}</td>
                                <td>{{ $director->birth_place ?? '-' }}</td>
                                <td>
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('admin.directors.edit', $director->id) }}"
                                            class="btn btn-warning btn-sm"><i class="ph ph-pencil-simple-line"></i></a>
                                        <form action="{{ route('admin.directors.destroy', $director->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">
                                                <i class="ph ph-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $directors->links() }}
            </div>
        </div>
    </div>
@endsection
