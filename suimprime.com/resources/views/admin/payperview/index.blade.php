@php
    $title = 'Pay Per View History';
@endphp
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Pay Per View History</li>
            </ol>
        </nav>

        <!-- Main content block -->
        <div class="card-main mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
                <div>
                    <div class="d-flex flex-wrap gap-3">
                        <button type="button" class="btn btn-dark" data-modal="export">
                            <i class="ph ph-export align-middle"></i> Export
                        </button>

                        <div class="flex-grow-1">
                            <form id="filter-form" method="GET" action="{{ route('admin.payperview.index') }}"
                                class="d-flex gap-2">
                                <input type="text" name="date_range" id="date_range" value="{{ request('date_range') }}"
                                    class="form-control dashboard-date-range" placeholder="Select Date Range " readonly>
                                <div class="d-flex gap-1">
                                    <button id="filter-btn" class="btn btn-primary" type="submit">Filter</button>
                                    <a id="reset-btn" href="{{ route('admin.payperview.index') }}"
                                        class="btn btn-primary {{ request()->has(['date_range', 'search']) ? '' : 'd-none' }}">Reset</a>
                                </div>
                                <input type="hidden" name="search" value="{{ request('search') }}">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar"
                    aria-label="Toolbar with buttons">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control dt-search" placeholder="Search..." aria-label="Search"
                            aria-describedby="addon-wrapping" value="{{ request('search') }}" id="search-box">
                    </div>
                </div>
            </div>

            <div class="table-responsive my-3 mt-3 mb-5 pb-1">
                <table id="datatable" class="table table-responsive dataTable no-footer" aria-describedby="datatable_info">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Content</th>
                            <th>Duration</th>
                            <th>Payment Method</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Price</th>
                            <th>Discount</th>
                            <th>Total Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($records as $row)
                            <tr>
                                <td>{{ optional($row->user)->name ?? '-' }}</td>
                                <td>
                                    @php
                                        $contentTitle = '-';
                                        if ($row->content) {
                                            $contentTitle = method_exists($row->content, 'title')
                                                ? $row->content->title
                                                : (property_exists($row->content, 'title')
                                                    ? $row->content->title
                                                    : class_basename($row->content_type) . ' #' . $row->content_id);
                                        }
                                    @endphp
                                    {{ $contentTitle }}
                                </td>
                                <td>{{ $row->duration ?? '-' }}</td>
                                <td>{{ $row->payment_method ?? '-' }}</td>
                                <td>{{ $row->start_at?->format('Y-m-d H:i') ?? '-' }}</td>
                                <td>{{ $row->end_at?->format('Y-m-d H:i') ?? '-' }}</td>
                                <td>${{ number_format($row->price, 2) }}</td>
                                <td>{{ $row->discount > 0 ? '$' . number_format($row->discount, 2) : '-' }}</td>
                                <td>${{ number_format($row->total_amount, 2) }}</td>
                            </tr>
                        @empty
                            <tr class="odd">
                                <td valign="top" colspan="9" class="dataTables_empty">No data available in table</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="row">
                    <div class="col-md-6">
                        <div class="dataTables_info" id="datatable_info" role="status" aria-live="polite">Showing
                            {{ $records->firstItem() ?? 0 }} to {{ $records->lastItem() ?? 0 }} of
                            {{ $records->total() }} entries</div>
                    </div>
                    <div class="col-md-6">
                        <div class="dataTables_paginate paging_simple_numbers" id="datatable_paginate">
                            <div class="d-flex justify-content-end">{{ $records->links() }}</div>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            $(function() {
                // flatpickr range
                if (window.flatpickr) {
                    flatpickr('#date_range', {
                        mode: 'range',
                        dateFormat: 'Y-m-d'
                    });
                }
                // search box
                $('#search-box').on('keypress', function(e) {
                    if (e.which === 13) {
                        const q = $(this).val();
                        const url = new URL(window.location.href);
                        if (q) {
                            url.searchParams.set('search', q);
                        } else {
                            url.searchParams.delete('search');
                        }
                        window.location.href = url.toString();
                    }
                });
            });
        </script>
    @endpush
@endsection
