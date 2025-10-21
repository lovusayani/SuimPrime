@extends('layouts.admin')

@section('title', 'Genres')

@section('content')
    <div class="container-fluid content-inner pb-0" id="page_layout">
        <!-- Main content block -->
        <div class="card-main mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3 mb-3">
                <div class="d-flex flex-wrap gap-3">

                    <!-- Bulk Actions Form -->
                    <form action="{{ route('admin.genres.bulkAction') }}" id="quick-action-form"
                        class="form-disabled d-flex gap-3 align-items-stretch flex-wrap" method="POST">
                        @csrf
                        <div>
                            <select name="action_type" class="form-control select2" id="quick-action-type">
                                <option value="">Action</option>
                                <option value="change-status">Status</option>
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
                        <input type="hidden" name="message_change-featured"
                            value="Are you sure you want to perform this action?">
                        <input type="hidden" name="message_change-status"
                            value="Are you sure you want to perform this action?">
                        <input type="hidden" name="message_delete" value="Are you sure you want to delete it?">
                        <input type="hidden" name="message_restore" value="Are you sure you want to restore it?">
                        <input type="hidden" name="message_permanently-delete"
                            value="Are you sure you want to permanently delete it?">
                        <button class="btn btn-primary" id="quick-action-apply" disabled>Apply</button>
                    </form>

                    <!-- Export Button -->
                    <div>
                        <button type="button" class="btn btn-dark" data-modal="export">
                            <i class="ph ph-export align-middle"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Search & New Button -->
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control dt-search" placeholder="Search...">
                    </div>
                    <a href="{{ route('admin.genres.create') }}" class="btn btn-primary d-flex align-items-center gap-1">
                        <i class="ph ph-plus-circle"></i> New
                    </a>
                </div>
            </div>

            <!-- Genres Table -->
            <div class="table-responsive my-3 mt-3 mb-5 pb-1">
                <table class="table table-responsive dataTable">
                    <thead>
                        <tr>
                            <th><input type="checkbox" class="form-check-input" id="select-all-table"
                                    onclick="selectAllTable(this)"></th>
                            <th>Genre</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($genres as $genre)
                            <tr>
                                <td><input type="checkbox" class="form-check-input select-table-row" name="datatable_ids[]"
                                        value="{{ $genre->id }}" data-type="genres"
                                        onclick="dataTableRowCheck({{ $genre->id }}, this)"></td>
                                <td>
                                    <div class="image-name-component d-flex align-items-center gap-2">
                                        <img src="{{ $genre->thumbnail ?? asset('default-image/Default-Image.jpg') }}"
                                            alt="{{ $genre->name }}" class="image avatar avatar-70">
                                        <h6 class="name mb-0">{{ $genre->name }}</h6>
                                    </div>
                                </td>
                                <td class="description-column"><span
                                        class="custom-span-class">{{ $genre->description ?? '-' }}</span></td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" class="switch-status-change form-check-input"
                                            data-url="{{ route('admin.genres.updateStatus', $genre->id) }}"
                                            data-token="{{ csrf_token() }}" id="datatable-row-{{ $genre->id }}"
                                            name="status" value="1" {{ $genre->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center justify-content-end">
                                        <a href="{{ route('admin.genres.edit', $genre->id) }}"
                                            class="btn btn-warning-subtle btn-sm fs-4" data-bs-toggle="tooltip"
                                            title="Edit">
                                            <i class="ph ph-pencil-simple-line align-middle"></i>
                                        </a>

                                        <!-- Delete Button -->
                                        <a href="javascript:void(0);"
                                            data-url="{{ route('admin.genres.destroy', $genre->id) }}"
                                            class="btn btn-secondary-subtle btn-sm fs-4 delete-btn" data-bs-toggle="tooltip"
                                            data-confirm="Are you sure you want to delete this genre?">
                                            <i class="ph ph-trash align-middle"></i>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">No genres found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>

                <!-- Pagination -->
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="dataTables_info">
                            Showing {{ $genres->firstItem() ?? 0 }} to {{ $genres->lastItem() ?? 0 }} of
                            {{ $genres->total() }} entries
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="dataTables_paginate d-flex justify-content-end">
                            {{ $genres->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / Main content block -->
    </div>
    @push('scripts')
        <script>
            // Select/Deselect all rows
            function selectAllTable(source) {
                document.querySelectorAll('.select-table-row').forEach(cb => cb.checked = source.checked);
                toggleBulkApply();
            }

            function dataTableRowCheck(id, el) {
                toggleBulkApply();
            }

            function toggleBulkApply() {
                const anyChecked = document.querySelectorAll('.select-table-row:checked').length > 0;
                document.getElementById('quick-action-apply').disabled = !anyChecked;
            }

            // Switch status change
            document.querySelectorAll('.switch-status-change').forEach(el => {
                el.addEventListener('change', function() {
                    fetch(this.dataset.url, {
                        method: 'PATCH',
                        headers: {
                            'X-CSRF-TOKEN': this.dataset.token,
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            status: this.checked ? 1 : 0
                        })
                    });
                });
            });

            // Delete button functionality
            document.addEventListener('click', function(e) {
                if (e.target.closest('.delete-btn')) {
                    let btn = e.target.closest('.delete-btn');
                    let url = btn.dataset.url;

                    if (confirm(btn.dataset.confirm || 'Are you sure you want to delete this item?')) {
                        fetch(url, {
                                method: 'DELETE',
                                headers: {
                                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                    'Accept': 'application/json',
                                },
                            })
                            .then(res => res.json())
                            .then(data => {
                                if (data.success) {
                                    alert(data.message);
                                    location.reload(); // refresh table after delete
                                } else {
                                    alert(data.message || 'Something went wrong.');
                                }
                            })
                            .catch(err => {
                                console.error(err);
                                alert('Request failed.');
                            });
                    }
                }
            });
        </script>
    @endpush
@endsection
