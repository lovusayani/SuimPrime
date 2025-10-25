@extends('layouts.admin')

@section('title', 'Movies')

@section('content')
    <div class="container-fluid content-inner pb-0" id="page_layout">
        <!-- Main Content Block -->
        <div class="card-main mb-5">
            <div class="d-flex justify-content-between flex-column flex-sm-row gap-3">
                <div>
                    <div class="d-flex flex-wrap gap-3">
                        <!-- Bulk Actions Form -->
                        <form action="{{ route('admin.movies.bulkAction') }}" id="quick-action-form"
                            class="form-disabled d-flex gap-3 align-items-stretch flex-wrap" method="POST">
                            @csrf
                            <div>
                                <select name="action_type" class="form-control select2 col-12" id="quick-action-type">
                                    <option value="">Action</option>
                                    <option value="change-status">Status</option>
                                    <option value="delete">Delete</option>
                                    <option value="restore">Restore</option>
                                    <option value="permanently-delete">Permanently delete</option>
                                </select>
                            </div>
                            <div class="select-status d-none quick-action-field" id="change-status-action">
                                <select name="status" class="form-control select2" id="status">
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
                        <button type="button" class="btn btn-dark" data-modal="export">
                            <i class="ph ph-export align-middle"></i> Export
                        </button>
                    </div>
                </div>

                <!-- Toolbar -->
                <div class="btn-toolbar gap-3 align-items-center justify-content-end">
                    <div>
                        <div class="datatable-filter">
                            <select name="column_status" id="column_status" class="select2 form-control">
                                <option value="">All</option>
                                <option value="0">Inactive</option>
                                <option value="1">Active</option>
                            </select>
                        </div>
                    </div>
                    <div class="input-group flex-nowrap">
                        <span class="input-group-text pe-0"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" id="movie_name" class="form-control dt-search" placeholder="Search...">
                    </div>
                    <button class="btn btn-dark d-flex align-items-center gap-1 btn-group" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="ph ph-funnel"></i> Advanced Filter
                    </button>
                    <a href="{{ route('admin.movies.create') }}" class="btn btn-primary d-flex align-items-center gap-1"
                        id="add-post-button">
                        <i class="ph ph-plus-circle"></i> New
                    </a>
                </div>
            </div>

            <!-- Movies Table -->
            <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                <div class="table-responsive my-3 mt-3 mb-5 pb-1">
                    <div id="datatable_processing" class="dataTables_processing card" style="display: none;">Processing...
                    </div>
                    <table id="datatable" class="table table-responsive dataTable no-footer"
                        aria-describedby="datatable_info">
                        <thead>
                            <tr>
                                <th><input type="checkbox" class="form-check-input" id="select-all-table" data-type="movie"
                                        onclick="selectAllTable(this)"></th>
                                <th>Movie</th>
                                <th>Like</th>
                                <th>Watch</th>
                                <th>Access</th>
                                <th>Plan</th>
                                <th>Language</th>
                                <th>Status</th>
                                <th>Restricted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($movies as $movie)
                                <tr>
                                    <td><input type="checkbox" class="form-check-input select-table-row"
                                            name="datatable_ids[]" value="{{ $movie->id }}" data-type="movie"></td>
                                    <td>
                                        <div class="media-item d-flex align-items-center gap-3">
                                            <img src="{{ $movie->thumbnail }}" alt="{{ $movie->title }}"
                                                class="media-thumbnail avatar avatar-100">

                                            <div class="media-details">
                                                <h4 class="media-name mb-1">{{ $movie->title }}</h4>
                                                <p class="media-genre mb-1">
                                                    {{ $movie->genres ? $movie->genres->pluck('name')->join(', ') : 'N/A' }}
                                                </p>
                                                <p class="media-release-date mb-1">
                                                    @if ($movie->release_date)
                                                        {{ $movie->release_date instanceof \Carbon\Carbon ? $movie->release_date->format('d M Y') : date('d M Y', strtotime($movie->release_date)) }}
                                                    @else
                                                        —
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $movie->likes_count }}</td>
                                    <td>{{ $movie->watch_count }}</td>
                                    <td><span class="badge bg-info-subtle p-2">{{ $movie->access_type }}</span></td>
                                    <td>{{ $movie->plan ?? '-' }}</td>
                                    <td>{{ $movie->language }}</td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox"
                                                data-url="{{ route('admin.movies.updateStatus', $movie->id) }}"
                                                class="switch-status-change form-check-input"
                                                {{ $movie->status ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="form-check form-switch">
                                            <input type="checkbox"
                                                data-url="{{ route('admin.movies.updateRestricted', $movie->id) }}"
                                                class="switch-status-change form-check-input"
                                                {{ $movie->is_restricted ? 'checked' : '' }}>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2 align-items-center justify-content-end">
                                            <a href="{{ route('admin.movies.edit', $movie->id) }}"
                                                class="btn btn-warning-subtle btn-sm fs-4"><i
                                                    class="ph ph-pencil-simple-line align-middle"></i></a>
                                            <a href="{ route('admin.movies.show', $movie->id) }"
                                                class="btn btn-info-subtle btn-sm fs-4"><i
                                                    class="ph ph-eye align-middle"></i></a>
                                            <a href="javascript:void(0);"
                                                class="btn btn-secondary-subtle btn-sm fs-4 delete-btn"
                                                data-url="{{ route('admin.movies.destroy', $movie->id) }}">
                                                <i class="ph ph-trash align-middle"></i>
                                            </a>

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="dataTables_info">Showing {{ $movies->firstItem() }} to {{ $movies->lastItem() }} of
                            {{ $movies->total() }} entries</div>
                    </div>
                    <div class="col-md-6">
                        {{ $movies->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const deleteButtons = document.querySelectorAll('.delete-btn');

                deleteButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        const url = this.dataset.url;

                        if (confirm('Are you sure you want to delete this movie?')) {
                            fetch(url, {
                                    method: 'DELETE',
                                    headers: {
                                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                                        'Accept': 'application/json',
                                        'Content-Type': 'application/json'
                                    }
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.status === 'success') {
                                        // Remove row from table
                                        this.closest('tr').remove();
                                        alert(data.message);
                                    } else {
                                        alert('Something went wrong!');
                                    }
                                })
                                .catch(error => {
                                    console.error(error);
                                    alert('Something went wrong!');
                                });
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
