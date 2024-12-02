@extends('layouts.manager')

@section('title', 'Log Aktivitas')

@section('content')
    <div class="container-fluid">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-primary bg-gradient text-white">
                    <div class="card-body py-4">
                        <h4 class="mb-1">Log Aktivitas Sistem</h4>
                        <p class="mb-0 opacity-75">Memantau semua aktivitas pengguna dalam sistem</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activities Table -->
        <div class="card border-0 shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="bg-light">
                            <tr>
                                <th>Waktu</th>
                                <th>Pengguna</th>
                                <th>Aksi</th>
                                <th>Deskripsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $activity)
                                <tr>
                                    <td>{{ $activity->created_at->format('d M Y H:i') }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <div class="rounded-circle bg-light p-2 me-2">
                                                <i class="bi bi-person text-primary"></i>
                                            </div>
                                            {{ $activity->user->name }}
                                        </div>
                                    </td>
                                    <td>
                                        <span class="badge bg-primary">{{ $activity->action }}</span>
                                    </td>
                                    <td>{{ $activity->description }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <i class="bi bi-activity display-1 text-muted mb-3 d-block"></i>
                                        <p class="text-muted mb-0">Belum ada aktivitas tercatat</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="d-flex justify-content-between align-items-center p-3 border-top">
                    <small class="text-muted">
                        Showing {{ $activities->firstItem() ?? 0 }}-{{ $activities->lastItem() ?? 0 }} of
                        {{ $activities->total() }} items
                    </small>

                    <nav aria-label="Page navigation">
                        <ul class="pagination mb-0">
                            {{-- Previous Page Link --}}
                            @if ($activities->onFirstPage())
                                <li class="page-item disabled">
                                    <span class="page-link">Previous</span>
                                </li>
                            @else
                                <li class="page-item">
                                    <a class="page-link" href="{{ $activities->previousPageUrl() }}"
                                        rel="prev">Previous</a>
                                </li>
                            @endif

                            {{-- Page Numbers --}}
                            @for ($i = 1; $i <= $activities->lastPage(); $i++)
                                <li class="page-item {{ $activities->currentPage() == $i ? 'active' : '' }}">
                                    <a class="page-link" href="{{ $activities->url($i) }}">{{ $i }}</a>
                                </li>
                            @endfor

                            {{-- Next Page Link --}}
                            @if ($activities->hasMorePages())
                                <li class="page-item">
                                    <a class="page-link" href="{{ $activities->nextPageUrl() }}" rel="next">Next</a>
                                </li>
                            @else
                                <li class="page-item disabled">
                                    <span class="page-link">Next</span>
                                </li>
                            @endif
                        </ul>
                    </nav>
                </div>

                <style>

                </style>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .badge {
            font-weight: 500;
        }

        .pagination {
            margin: 0;
        }

        .page-link {
            padding: 0.375rem 0.75rem;
            color: #0d6efd;
            background-color: #fff;
            border: 1px solid #dee2e6;
        }

        .page-item.active .page-link {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }

        .page-item.disabled .page-link {
            color: #6c757d;
            background-color: #fff;
            border-color: #dee2e6;
        }
    </style>
@endpush
