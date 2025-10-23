@extends('layouts.admin')

@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Users</li>
            </ol>
        </nav>

        <!-- Main content block -->
        <div class="card-main mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
                <div>
                    <div class="d-flex flex-wrap gap-3">
                        <form action="{{ route('admin.users.bulk-action') }}" method="POST" id="quick-action-form"
                            class="form-disabled d-flex gap-3 align-items-stretch flex-wrap">
                            @csrf
                            <div class="">
                                <select name="action_type" class="form-control select2 col-12" id="quick-action-type"
                                    style="width:100%">
                                    <option value="">Action</option>
                                    <option value="change-status">Status</option>
                                    <option value="permanently-delete">Delete</option>
                                </select>
                            </div>
                            <div class="select-status d-none quick-action-field" id="change-status-action">
                                <select name="status" class="form-control select2" id="status" style="width:100%">
                                    <option value="" selected>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <input type="hidden" name="message_change-status"
                                value="Are you sure you want to perform this action?">
                            <input type="hidden" name="message_permanently-delete"
                                value="Are you sure you want to permanently delete it?">
                            <button class="btn btn-primary" type="submit" id="quick-action-apply" disabled>Apply</button>
                        </form>

                        <div>
                            <button type="button" class="btn btn-dark" data-modal="export">
                                <i class="ph ph-export align-middle"></i> Export
                            </button>
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar"
                    aria-label="Toolbar with buttons">
                    <div>
                        <div class="datatable-filter">
                            <select name="column_status" id="column_status" class="select2 form-control"
                                data-filter="select" style="width: 100%">
                                <option value="">All</option>
                                <option value="0" {{ request('status') === '0' ? 'selected' : '' }}>Inactive</option>
                                <option value="1" {{ request('status') === '1' ? 'selected' : '' }}>Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search"
                            aria-describedby="addon-wrapping" value="{{ request('search') }}">
                    </div>
                    <a href="{{ route('admin.users.create') }}" class="btn btn-primary d-flex align-items-center gap-1"
                        id="add-post-button">
                        <i class="ph ph-plus-circle"></i>New
                    </a>
                </div>
            </div>

            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="table-responsive my-3 mt-3 mb-5 pb-1">
                    <table id="datatable" class="table table-responsive dataTable no-footer">
                        <thead>
                            <tr>
                                <th style="width: 0%;">
                                    <input type="checkbox" class="form-check-input" name="select_all_table"
                                        id="select-all-table" data-type="users" onclick="selectAllTable(this)">
                                </th>
                                <th>User</th>
                                <th>Contact Number</th>
                                <th>Gender</th>
                                <th>Status</th>
                                <th style="width: 5%;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                                <tr>
                                    <td>
                                        <input type="checkbox" class="form-check-input select-table-row"
                                            id="datatable-row-{{ $user->id }}" name="datatable_ids[]"
                                            value="{{ $user->id }}" data-type="users"
                                            onclick="dataTableRowCheck({{ $user->id }}, this)">
                                    </td>
                                    <td>
                                        <div class="d-flex gap-3 align-items-center">
                                            <img src="{{ $user->avatar ? asset('storage/' . $user->avatar) : asset('assets/dummy-images/Default-Image.jpg') }}"
                                                alt="avatar" class="avatar avatar-40 rounded-pill">
                                            <div class="text-start">
                                                <h6 class="m-0">{{ $user->name }}</h6>
                                                <span>{{ $user->email }}</span>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->phone ?? '-' }}</td>
                                    <td>{{ $user->gender ? ucfirst($user->gender) : '-' }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox"
                                                data-url="{{ route('admin.users.update-status', $user->id) }}"
                                                data-token="{{ csrf_token() }}"
                                                class="switch-status-change form-check-input"
                                                id="status-{{ $user->id }}" name="status"
                                                value="{{ $user->id }}" {{ $user->status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center justify-content-end">
                                            <a class="btn btn-warning-subtle btn-sm fs-4" data-bs-toggle="tooltip"
                                                href="{{ route('admin.users.edit', $user->id) }}" aria-label="Edit"
                                                data-bs-original-title="Edit">
                                                <i class="ph ph-pencil-simple-line align-middle"></i>
                                            </a>

                                            <a class="btn btn-info-subtle btn-sm fs-4"
                                                href="{{ route('admin.users.details', $user->id) }}"
                                                data-bs-toggle="tooltip" aria-label="Details"
                                                data-bs-original-title="Details">
                                                <i class="ph ph-eye align-middle"></i>
                                            </a>

                                            <a class="btn btn-success-subtle btn-sm fs-4" data-bs-toggle="tooltip"
                                                href="{{ route('admin.users.change-password', $user->id) }}"
                                                aria-label="Change Password" data-bs-original-title="Change Password">
                                                <i class="ph ph-lock align-middle"></i>
                                            </a>

                                            <a href="javascript:void(0)" id="delete-users-{{ $user->id }}"
                                                class="btn btn-secondary-subtle btn-sm fs-4 delete-user"
                                                data-id="{{ $user->id }}"
                                                data-url="{{ route('admin.users.destroy', $user->id) }}"
                                                data-token="{{ csrf_token() }}" data-bs-toggle="tooltip"
                                                data-confirm="Are you sure you want to delete?" aria-label="Delete"
                                                data-bs-original-title="Delete">
                                                <i class="ph ph-trash align-middle"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">No users found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                            Showing {{ $users->firstItem() ?? 0 }} to {{ $users->lastItem() ?? 0 }} of
                            {{ $users->total() }} entries
                        </div>
                    </div>
                    <div class="col-md-6">
                        {{ $users->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                // Initialize Select2
                $('.select2').select2();

                // Quick action type change
                $('#quick-action-type').on('change', function() {
                    const actionType = $(this).val();
                    $('.quick-action-field').addClass('d-none');

                    if (actionType === 'change-status') {
                        $('#change-status-action').removeClass('d-none');
                    }

                    $('#quick-action-apply').prop('disabled', !actionType);
                });

                // Select all checkbox
                window.selectAllTable = function(checkbox) {
                    $('.select-table-row').prop('checked', checkbox.checked);
                    updateQuickActionButton();
                };

                // Individual checkbox
                window.dataTableRowCheck = function(id, checkbox) {
                    updateQuickActionButton();
                };

                function updateQuickActionButton() {
                    const checkedCount = $('.select-table-row:checked').length;
                    $('#quick-action-apply').prop('disabled', checkedCount === 0);
                }

                // Status filter
                $('#column_status').on('change', function() {
                    const status = $(this).val();
                    const url = new URL(window.location.href);
                    if (status) {
                        url.searchParams.set('status', status);
                    } else {
                        url.searchParams.delete('status');
                    }
                    window.location.href = url.toString();
                });

                // Search
                $('.dt-search').on('keypress', function(e) {
                    if (e.which === 13) {
                        const search = $(this).val();
                        const url = new URL(window.location.href);
                        if (search) {
                            url.searchParams.set('search', search);
                        } else {
                            url.searchParams.delete('search');
                        }
                        window.location.href = url.toString();
                    }
                });

                // Status toggle
                $('.switch-status-change').on('change', function() {
                    const url = $(this).data('url');
                    const token = $(this).data('token');

                    $.ajax({
                        url: url,
                        method: 'PATCH',
                        data: {
                            _token: token
                        },
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert('Error updating status');
                        }
                    });
                });

                // Delete user
                $('.delete-user').on('click', function() {
                    if (!confirm($(this).data('confirm'))) {
                        return;
                    }

                    const url = $(this).data('url');
                    const token = $(this).data('token');
                    const row = $(this).closest('tr');

                    $.ajax({
                        url: url,
                        method: 'DELETE',
                        data: {
                            _token: token
                        },
                        success: function(response) {
                            if (response.success) {
                                row.fadeOut(300, function() {
                                    $(this).remove();
                                });
                                alert(response.message);
                            }
                        },
                        error: function() {
                            alert('Error deleting user');
                        }
                    });
                });

                // Bulk action form
                $('#quick-action-form').on('submit', function(e) {
                    e.preventDefault();

                    const actionType = $('#quick-action-type').val();
                    const message = $(`input[name="message_${actionType}"]`).val();

                    if (!confirm(message)) {
                        return;
                    }

                    const ids = [];
                    $('.select-table-row:checked').each(function() {
                        ids.push($(this).val());
                    });

                    const formData = {
                        _token: '{{ csrf_token() }}',
                        action_type: actionType,
                        ids: ids
                    };

                    if (actionType === 'change-status') {
                        formData.status = $('#status').val();
                    }

                    $.ajax({
                        url: $(this).attr('action'),
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            if (response.success) {
                                alert(response.message);
                                location.reload();
                            }
                        },
                        error: function() {
                            alert('Error performing bulk action');
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
