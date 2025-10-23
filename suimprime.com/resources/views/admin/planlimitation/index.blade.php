@php($title = 'Plan Limitation')
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Plan Limitation</li>
            </ol>
        </nav>

        <div class="card-main mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
                <div>
                    <div class="d-flex flex-wrap gap-3">
                        <form action="{{ route('admin.planlimitation.bulkAction') }}" method="POST" id="quick-action-form"
                            class="form-disabled d-flex gap-3 align-items-stretch flex-wrap">
                            @csrf
                            <div class="">
                                <select name="action_type" class="form-control select2" id="quick-action-type"
                                    style="width:100%">
                                    <option value="">Action</option>
                                    <option value="change-status">Status</option>
                                    <option value="delete">Delete</option>
                                    <option value="restore">Restore</option>
                                    <option value="permanently-delete">Permanently delete</option>
                                </select>
                            </div>
                            <div class="select-status d-none quick-action-field" id="change-status-action">
                                <select name="status" class="form-control select2" id="status" style="width:100%">
                                    <option value="">Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" id="quick-action-apply" disabled>Apply</button>
                        </form>
                        <div>
                            <button type="button" class="btn btn-dark"><i class="ph ph-export align-middle"></i>
                                Export</button>
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar"
                    aria-label="Toolbar with buttons">
                    <div>
                        <div class="datatable-filter">
                            <form id="filter-form" method="GET" action="{{ route('admin.planlimitation.index') }}">
                                <select name="column_status" id="column_status" class="select2 form-control"
                                    data-filter="select" style="width: 100%">
                                    <option value="">All</option>
                                    <option value="0" {{ request('column_status') === '0' ? 'selected' : '' }}>Inactive
                                    </option>
                                    <option value="1" {{ request('column_status') === '1' ? 'selected' : '' }}>Active
                                    </option>
                                </select>
                            </form>
                        </div>
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search"
                            aria-describedby="addon-wrapping" name="search" form="filter-form"
                            value="{{ request('search') }}">
                    </div>
                </div>
            </div>

            <div class="table-responsive my-3 mt-3 mb-5 pb-1">
                <table id="datatable" class="table table-responsive dataTable no-footer" aria-describedby="datatable_info">
                    <thead>
                        <tr>
                            <th style="width:0%"><input type="checkbox" class="form-check-input" name="select_all_table"
                                    id="select-all-table" data-type="plan-limitation"></th>
                            <th>Title</th>
                            <th style="width:5%">Status</th>
                            <th style="width:5%">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($items as $item)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input select-table-row"
                                        id="datatable-row-{{ $item->id }}" name="datatable_ids[]"
                                        value="{{ $item->id }}" data-type="plan-limitation">
                                </td>
                                <td>
                                    <h6 class="mb-0">{{ $item->title }}</h6>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox"
                                            data-url="{{ route('admin.planlimitation.updateStatus', $item) }}"
                                            data-token="{{ csrf_token() }}" class="switch-status-change form-check-input"
                                            id="status-{{ $item->id }}" name="status" value="1"
                                            {{ $item->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center justify-content-end">
                                        <a class="btn btn-warning-subtle btn-sm fs-4" data-bs-toggle="tooltip"
                                            href="{{ route('admin.planlimitation.edit', $item) }}" aria-label="Edit"
                                            data-bs-original-title="Edit"><i
                                                class="ph ph-pencil-simple-line align-middle"></i></a>
                                        <a href="javascript:void(0)" id="delete-planlimitation-{{ $item->id }}"
                                            class="btn btn-secondary-subtle btn-sm fs-4 delete-item"
                                            data-url="{{ route('admin.planlimitation.destroy', $item) }}"
                                            data-token="{{ csrf_token() }}" data-bs-toggle="tooltip"
                                            aria-label="Delete" data-bs-original-title="Delete"><i
                                                class="ph ph-trash align-middle"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">No records found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">
                            {{ $items->firstItem() }} - {{ $items->lastItem() }} of {{ $items->total() }}</div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">{{ $items->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(function() {
            // Toggle status via AJAX
            $('.switch-status-change').on('change', function() {
                const $cb = $(this);
                $.ajax({
                    url: $cb.data('url'),
                    type: 'PATCH',
                    data: {
                        _token: $cb.data('token'),
                        status: $cb.is(':checked') ? 1 : 0
                    },
                    error: function() {
                        $cb.prop('checked', !$cb.is(':checked'));
                        alert('Failed to update status');
                    }
                });
            });

            // Delete via AJAX
            $('.delete-item').on('click', function() {
                if (!confirm('Are you sure you want to delete?')) return;
                const $btn = $(this);
                const row = $btn.closest('tr');
                $.ajax({
                    url: $btn.data('url'),
                    type: 'DELETE',
                    data: {
                        _token: $btn.data('token')
                    },
                    success: function() {
                        row.fadeOut(200, function() {
                            $(this).remove();
                        });
                    },
                    error: function() {
                        alert('Failed to delete');
                    }
                });
            });

            // Select all
            $('#select-all-table').on('change', function() {
                $('.select-table-row').prop('checked', $(this).is(':checked'));
                toggleApplyState();
            });

            // Row checkbox
            $(document).on('change', '.select-table-row', function() {
                toggleApplyState();
            });

            // Action type change
            $('#quick-action-type').on('change', function() {
                const val = $(this).val();
                $('.quick-action-field').addClass('d-none');
                if (val === 'change-status') $('#change-status-action').removeClass('d-none');
                toggleApplyState();
            });

            // Apply bulk
            $('#quick-action-form').on('submit', function(e) {
                e.preventDefault();
                const ids = $('.select-table-row:checked').map(function() {
                    return $(this).val();
                }).get();
                if (ids.length === 0) return;
                const form = $(this);
                const data = form.serializeArray();
                data.push({
                    name: 'datatable_ids[]',
                    value: ids
                });
                $.post(form.attr('action'), data, function() {
                    location.reload();
                }).fail(function() {
                    alert('Bulk action failed');
                });
            });

            function toggleApplyState() {
                const hasAction = $('#quick-action-type').val() !== '';
                const hasSelection = $('.select-table-row:checked').length > 0;
                $('#quick-action-apply').prop('disabled', !(hasAction && hasSelection));
            }

            // Filter form triggers
            $('#column_status').on('change', function() {
                $('#filter-form').submit();
            });
            $('input[name="search"]').on('keypress', function(e) {
                if (e.which === 13) {
                    $('#filter-form').submit();
                }
            });
        });
    </script>
@endpush
