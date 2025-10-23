@php($title = 'Plans')
@extends('layouts.admin')
@section('content')
    <div class="conatiner-fluid content-inner pb-0" id="page_layout">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-3">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Plans</li>
            </ol>
        </nav>

        <div class="card-main mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
                <div>
                    <div class="d-flex flex-wrap gap-3">
                        <form action="{{ route('admin.plans.index') }}" method="get" id="quick-action-form"
                            class="form-disabled d-flex gap-3 align-items-stretch flex-wrap">
                            <div class="">
                                <select name="action_type" class="form-control select2" id="quick-action-type"
                                    style="width:100%">
                                    <option value="">Action</option>
                                    <option value="delete">Delete</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary" id="quick-action-apply" disabled>Apply</button>
                        </form>
                        <div>
                            <a href="#" class="btn btn-dark"><i class="ph ph-export align-middle"></i> Export</a>
                        </div>
                    </div>
                </div>
                <div class="btn-toolbar gap-3 align-items-center justify-content-end" role="toolbar"
                    aria-label="Toolbar with buttons">
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0" id="addon-wrapping"><i
                                class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="search" form="quick-action-form" value="{{ request('search') }}"
                            class="form-control dt-search" placeholder="Search..." aria-label="Search"
                            aria-describedby="addon-wrapping">
                    </div>
                    <a href="{{ route('admin.plans.create') }}" class="btn btn-primary d-flex align-items-center gap-1"
                        id="add-post-button"> <i class="ph ph-plus-circle"></i>New</a>
                </div>
            </div>

            <div class="table-responsive my-3 mt-3 mb-5 pb-1">
                <table id="datatable" class="table table-responsive dataTable no-footer">
                    <thead>
                        <tr>
                            <th class="sorting_disabled" style="width: 0%;">
                                <input type="checkbox" class="form-check-input" name="select_all_table"
                                    id="select-all-table" data-type="plan">
                            </th>
                            <th class="sorting">Name</th>
                            <th class="sorting">Duration</th>
                            <th class="sorting">Level</th>
                            <th class="sorting">Price</th>
                            <th class="sorting">Discount</th>
                            <th class="sorting">Total Price</th>
                            <th class="sorting">Status</th>
                            <th class="sorting_disabled" style="width: 5%;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($plans as $plan)
                            <tr>
                                <td>
                                    <input type="checkbox" class="form-check-input select-table-row"
                                        id="datatable-row-{{ $plan->id }}" name="datatable_ids[]"
                                        value="{{ $plan->id }}" data-type="plan">
                                </td>
                                <td>
                                    <h6 class="mb-0">{{ $plan->name }}</h6>
                                </td>
                                <td>{{ $plan->formatted_duration }}</td>
                                <td>Level {{ $plan->level ?? 1 }}</td>
                                <td>${{ number_format($plan->price, 2) }}</td>
                                <td>{{ $plan->discount > 0 ? '$' . number_format($plan->discount, 2) : '-' }}</td>
                                <td>${{ number_format($plan->total_price, 2) }}</td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input type="checkbox" data-url="{{ route('admin.plans.updateStatus', $plan) }}"
                                            data-token="{{ csrf_token() }}" class="switch-status-change form-check-input"
                                            id="status-{{ $plan->id }}" name="status" value="{{ $plan->id }}"
                                            {{ $plan->status ? 'checked' : '' }}>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex gap-2 align-items-center justify-content-end">
                                        <a class="btn btn-warning-subtle btn-sm fs-4" data-bs-toggle="tooltip"
                                            href="{{ route('admin.plans.edit', $plan) }}" aria-label="Edit"
                                            data-bs-original-title="Edit">
                                            <i class="ph ph-pencil-simple-line align-middle"></i>
                                        </a>
                                        <a href="javascript:void(0)" id="delete-plan-{{ $plan->id }}"
                                            class="btn btn-secondary-subtle btn-sm fs-4 delete-plan"
                                            data-url="{{ route('admin.plans.destroy', $plan) }}"
                                            data-token="{{ csrf_token() }}" data-bs-toggle="tooltip" aria-label="Delete"
                                            data-bs-original-title="Delete">
                                            <i class="ph ph-trash align-middle"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No plans found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-3">{{ $plans->links() }}</div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Status toggle
            $('.switch-status-change').on('change', function() {
                const url = $(this).data('url');
                const token = $(this).data('token');
                const checkbox = $(this);

                $.ajax({
                    url: url,
                    type: 'PATCH',
                    data: {
                        _token: token
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            // Optional: Show success message
                            console.log(response.message);
                        }
                    },
                    error: function(xhr) {
                        // Revert checkbox on error
                        checkbox.prop('checked', !checkbox.prop('checked'));
                        alert('Error updating status');
                    }
                });
            });

            // Delete plan
            $('.delete-plan').on('click', function(e) {
                e.preventDefault();

                if (!confirm('Are you sure you want to delete this plan?')) {
                    return;
                }

                const url = $(this).data('url');
                const token = $(this).data('token');
                const row = $(this).closest('tr');

                $.ajax({
                    url: url,
                    type: 'DELETE',
                    data: {
                        _token: token
                    },
                    success: function(response) {
                        if (response.status === 'success') {
                            row.fadeOut(300, function() {
                                $(this).remove();
                            });
                        }
                    },
                    error: function(xhr) {
                        alert('Error deleting plan');
                    }
                });
            });
        });
    </script>
@endpush
