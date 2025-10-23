@php
    $title = 'Coupons';
@endphp
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Coupons</li>
            </ol>
        </nav>

        <div class="card-main mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
                <div>
                    <div class="d-flex flex-wrap gap-3">
                        <form action="{{ route('admin.coupon.bulkAction') }}" method="POST" id="quick-action-form"
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

                        <button type="button" class="btn btn-dark"><i class="ph ph-export align-middle"></i>
                            Export</button>
                    </div>
                </div>
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar"
                    aria-label="Toolbar with buttons">
                    <div>
                        <div class="datatable-filter">
                            <form id="filter-form" method="GET" action="{{ route('admin.coupon.index') }}">
                                <select name="column_status" id="column_status" class="select2 form-control"
                                    style="width: 100%">
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
                            name="search" form="filter-form" value="{{ request('search') }}">
                    </div>

                    <a href="{{ route('admin.coupon.create') }}" class="btn btn-primary d-flex align-items-center gap-1"
                        id="add-post-button"> <i class="ph ph-plus-circle"></i>New</a>
                </div>
            </div>

            <div class="table-responsive my-3 mt-3 mb-5 pb-1">
                <table id="datatable" class="table table-responsive dataTable no-footer" aria-describedby="datatable_info">
                    <thead>
                        <tr>
                            <th style="width: 0%;"><input type="checkbox" class="form-check-input" name="select_all_table"
                                    id="select-all-table"></th>
                            <th>Coupon Code</th>
                            <th>Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Discount Amount</th>
                            <th>Subscription Plan</th>
                            <th>Status</th>
                            <th style="width: 5%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($coupons as $coupon)
                            <tr>
                                <td><input type="checkbox" class="form-check-input select-table-row" name="datatable_ids[]"
                                        value="{{ $coupon->id }}"></td>
                                <td>
                                    <h6 class="mb-0">{{ $coupon->code }}</h6>
                                </td>
                                <td>{{ Str::limit($coupon->description, 50) }}</td>
                                <td>{{ $coupon->start_date->format('Y-m-d') }}</td>
                                <td>{{ $coupon->expire_date->format('Y-m-d') }}</td>
                                <td>
                                    @if ($coupon->discount_type === 'percentage')
                                        {{ $coupon->discount }}%
                                    @else
                                        ${{ number_format($coupon->discount, 2) }}
                                    @endif
                                </td>
                                <td>{{ $coupon->plans->pluck('name')->join(', ') }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" data-url="{{ route('admin.coupon.updateStatus', $coupon) }}"
                                            data-token="{{ csrf_token() }}" class="switch-status-change form-check-input"
                                            id="status-{{ $coupon->id }}" {{ $coupon->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center justify-content-end">
                                        <a class="btn btn-warning-subtle btn-sm fs-4"
                                            href="{{ route('admin.coupon.edit', $coupon) }}"><i
                                                class="ph ph-pencil-simple-line align-middle"></i></a>
                                        <a href="javascript:void(0)"
                                            class="btn btn-secondary-subtle btn-sm fs-4 delete-item"
                                            data-url="{{ route('admin.coupon.destroy', $coupon) }}"
                                            data-token="{{ csrf_token() }}"><i class="ph ph-trash align-middle"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td valign="top" colspan="9" class="dataTables_empty">No data available in table</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <div class="dataTables_info">Showing {{ $coupons->firstItem() ?? 0 }} to
                            {{ $coupons->lastItem() ?? 0 }} of {{ $coupons->total() }} entries</div>
                    </div>
                    <div class="col-md-6">
                        <div class="d-flex justify-content-end">{{ $coupons->links() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
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
                            alert('Failed');
                        }
                    });
                });

                $('.delete-item').on('click', function() {
                    if (!confirm('Are you sure?')) return;
                    const $btn = $(this);
                    $.ajax({
                        url: $btn.data('url'),
                        type: 'DELETE',
                        data: {
                            _token: $btn.data('token')
                        },
                        success: function() {
                            $btn.closest('tr').fadeOut(200, function() {
                                $(this).remove();
                            });
                        },
                        error: function() {
                            alert('Failed');
                        }
                    });
                });

                $('#select-all-table').on('change', function() {
                    $('.select-table-row').prop('checked', $(this).is(':checked'));
                    toggleApply();
                });
                $(document).on('change', '.select-table-row', toggleApply);
                $('#quick-action-type').on('change', function() {
                    $('.quick-action-field').addClass('d-none');
                    if ($(this).val() === 'change-status') $('#change-status-action').removeClass('d-none');
                    toggleApply();
                });
                $('#quick-action-form').on('submit', function(e) {
                    e.preventDefault();
                    const ids = $('.select-table-row:checked').map(function() {
                        return $(this).val();
                    }).get();
                    if (ids.length === 0) return;
                    const data = $(this).serializeArray();
                    ids.forEach(id => data.push({
                        name: 'datatable_ids[]',
                        value: id
                    }));
                    $.post($(this).attr('action'), data, function() {
                        location.reload();
                    }).fail(function() {
                        alert('Failed');
                    });
                });

                function toggleApply() {
                    $('#quick-action-apply').prop('disabled', !($('#quick-action-type').val() && $(
                        '.select-table-row:checked').length > 0));
                }
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
@endsection
