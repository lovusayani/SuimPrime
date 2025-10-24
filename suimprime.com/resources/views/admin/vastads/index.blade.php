@extends('layouts.admin')

@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <div class="card-body mb-4">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
                <div>
                    <div class="d-flex flex-wrap gap-3">
                        <form action="{{ route('admin.vastads.bulkAction') }}" id="quick-action-form"
                            class="form-disabled d-flex gap-3 align-items-stretch flex-wrap" method="POST">
                            @csrf
                            <div class="">
                                <select name="action_type" class="form-control select2 col-12" id="quick-action-type"
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
                                    <option value="" selected>Select Status</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <button class="btn btn-primary" type="submit" id="quick-action-apply" disabled>Apply</button>
                        </form>
                    </div>
                </div>
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar"
                    aria-label="Toolbar with buttons">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search"
                            aria-describedby="addon-wrapping">
                    </div>
                    <button class="btn btn-dark d-flex align-items-center gap-1 btn-group" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="ph ph-funnel"></i>Advanced Filter
                    </button>
                    <a href="{{ route('admin.vastads.create') }}" class="btn btn-primary d-flex align-items-center gap-1"
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
                                <th><input type="checkbox" class="form-check-input" name="select_all_table"
                                        id="select-all-table" onclick="selectAllTable(this)"></th>
                                <th>Ad Name</th>
                                <th>Ad Type</th>
                                <th>Target Type</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Data will be loaded via JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Advanced Filter Offcanvas -->
        <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header border-bottom">
                <h4 class="mb-0">Advanced Filter</h4>
                <button type="button" data-bs-dismiss="offcanvas" aria-label="Close" class="btn-close-offcanvas">
                    <i class="ph ph-x-circle"></i>
                </button>
            </div>
            <div class="offcanvas-body">
                <div class="form-group">
                    <div class="form-group datatable-filter">
                        <label class="form-label" for="name">Ad Name</label>
                        <input type="text" id="name" name="name" class="form-control" data-filter="text"
                            placeholder="Enter Ad Name">
                    </div>

                    <div class="form-group datatable-filter">
                        <label class="form-label" for="type">Ad Type</label>
                        <select name="type" id="type" class="form-control select2" data-filter="select">
                            <option value="">All</option>
                            <option value="pre-roll">Pre-roll</option>
                            <option value="mid-roll">Mid-roll</option>
                            <option value="post-roll">Post-roll</option>
                            <option value="overlay">Overlay</option>
                        </select>
                    </div>

                    <div class="form-group datatable-filter">
                        <label class="form-label" for="target_type">Target Type</label>
                        <select name="target_type" id="target_type" class="form-control select2" data-filter="select">
                            <option value="">All</option>
                            <option value="video">Video</option>
                            <option value="movie">Movie</option>
                            <option value="tvshow">TV Show</option>
                        </select>
                    </div>
                </div>

                <div class="text-end">
                    <button type="reset" class="btn btn-dark" id="reset-filter">Reset</button>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script type="text/javascript">
            $(document).ready(function() {
                // DataTable initialization
                var table = $('#datatable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '{{ route('admin.vastads.index') }}',
                        data: function(d) {
                            d.name = $('#name').val();
                            d.type = $('#type').val();
                            d.target_type = $('#target_type').val();
                            d.search = $('.dt-search').val();
                        }
                    },
                    columns: [{
                            data: 'id',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return '<input type="checkbox" class="form-check-input select-table-row" name="datatable_ids[]" value="' +
                                    data + '" onclick="dataTableRowCheck(' + data + ',this)">';
                            }
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'type',
                            name: 'type',
                            render: function(data) {
                                return data.charAt(0).toUpperCase() + data.slice(1).replace('-', '-');
                            }
                        },
                        {
                            data: 'target_type',
                            name: 'target_type',
                            render: function(data) {
                                return data.charAt(0).toUpperCase() + data.slice(1);
                            }
                        },
                        {
                            data: 'start_date',
                            name: 'start_date',
                            render: function(data) {
                                return new Date(data).toLocaleDateString('en-GB', {
                                    day: 'numeric',
                                    month: 'short',
                                    year: 'numeric'
                                });
                            }
                        },
                        {
                            data: 'end_date',
                            name: 'end_date',
                            render: function(data) {
                                return new Date(data).toLocaleDateString('en-GB', {
                                    day: 'numeric',
                                    month: 'short',
                                    year: 'numeric'
                                });
                            }
                        },
                        {
                            data: 'status',
                            name: 'status',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                var checked = data == 1 ? 'checked' : '';
                                return '<div class="form-check form-switch">' +
                                    '<input type="checkbox" data-url="{{ url('admin/vastads/update-status') }}/' +
                                    row.id + '" ' +
                                    'data-token="{{ csrf_token() }}" class="switch-status-change form-check-input" ' +
                                    'id="datatable-row-' + row.id + '" name="status" value="' + row.id +
                                    '" ' + checked + '>' +
                                    '</div>';
                            }
                        },
                        {
                            data: 'id',
                            orderable: false,
                            searchable: false,
                            render: function(data, type, row) {
                                return '<div class="d-flex gap-2 align-items-center justify-content-end">' +
                                    '<a class="btn btn-warning-subtle btn-sm fs-4" href="{{ url('admin/vastads') }}/' +
                                    data + '/edit" data-bs-toggle="tooltip" title="Edit">' +
                                    '<i class="ph ph-pencil-simple-line align-middle"></i></a>' +
                                    '<a href="{{ url('admin/vastads') }}/' + data +
                                    '" id="delete-vastads-' + data + '" ' +
                                    'class="btn btn-secondary-subtle btn-sm fs-4" data-type="ajax" data-method="DELETE" ' +
                                    'data-token="{{ csrf_token() }}" data-bs-toggle="tooltip" ' +
                                    'data-confirm="Are you sure you want to delete?" title="Delete">' +
                                    '<i class="ph ph-trash align-middle"></i></a>' +
                                    '</div>';
                            }
                        }
                    ],
                    order: [
                        [1, 'desc']
                    ],
                    pageLength: 10,
                    language: {
                        processing: '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
                    }
                });

                // Search functionality
                $('.dt-search').on('keyup', function() {
                    table.draw();
                });

                // Filter functionality
                $('.datatable-filter select, .datatable-filter input').on('change keyup', function() {
                    table.draw();
                });

                // Reset filter
                $('#reset-filter').on('click', function() {
                    $('.datatable-filter input').val('');
                    $('.datatable-filter select').val('').trigger('change');
                    table.draw();
                    $('#offcanvasExample').offcanvas('hide');
                });

                // Status change
                $(document).on('change', '.switch-status-change', function() {
                    var url = $(this).data('url');
                    var token = $(this).data('token');
                    var checkbox = $(this);

                    $.ajax({
                        url: url,
                        type: 'PATCH',
                        data: {
                            _token: token
                        },
                        success: function(response) {
                            if (response.success) {
                                toastr.success(response.message);
                            }
                        },
                        error: function() {
                            checkbox.prop('checked', !checkbox.prop('checked'));
                            toastr.error('Failed to update status');
                        }
                    });
                });

                // Delete functionality
                $(document).on('click', '[data-type="ajax"][data-method="DELETE"]', function(e) {
                    e.preventDefault();
                    var url = $(this).attr('href');
                    var token = $(this).data('token');
                    var confirmMsg = $(this).data('confirm');

                    if (confirm(confirmMsg)) {
                        $.ajax({
                            url: url,
                            type: 'DELETE',
                            data: {
                                _token: token
                            },
                            success: function(response) {
                                if (response.success) {
                                    toastr.success(response.message);
                                    table.draw();
                                }
                            },
                            error: function() {
                                toastr.error('Failed to delete item');
                            }
                        });
                    }
                });

                // Select all functionality
                window.selectAllTable = function(checkbox) {
                    $('.select-table-row').prop('checked', checkbox.checked);
                    updateQuickActionButton();
                };

                window.dataTableRowCheck = function(id, checkbox) {
                    updateQuickActionButton();
                };

                function updateQuickActionButton() {
                    var checkedCount = $('.select-table-row:checked').length;
                    $('#quick-action-apply').prop('disabled', checkedCount === 0);
                }

                // Quick action type change
                $('#quick-action-type').on('change', function() {
                    var action = $(this).val();
                    $('.quick-action-field').addClass('d-none');

                    if (action === 'change-status') {
                        $('#change-status-action').removeClass('d-none');
                    }
                });

                // Initialize Select2 in offcanvas
                const offcanvasElem = document.querySelector('#offcanvasExample');
                offcanvasElem.addEventListener('shown.bs.offcanvas', function() {
                    $('.datatable-filter .select2').select2({
                        dropdownParent: $('#offcanvasExample')
                    });
                });
            });
        </script>
    @endpush
@endsection
