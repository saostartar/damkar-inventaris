@extends('layouts.staff')

@section('title', 'Daftar Barang')

@section('content')
    <div class="container-fluid py-4">
        <!-- Header Section -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card bg-primary text-white shadow-sm">
                    <div class="card-body d-flex justify-content-between align-items-center py-4 px-4">
                        <div>
                            <h4 class="mb-1">{{ ucfirst(str_replace('-', ' ', $category)) }}</h4>
                            <p class="mb-0 opacity-75">Kelola data inventaris dengan mudah</p>
                        </div>
                        <button type="button" class="btn btn-light" data-bs-toggle="modal" data-bs-target="#addItemModal">
                            <i class="bi bi-plus-lg me-2"></i>Tambah Barang
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alert Messages -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <!-- Search & Filter -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="input-group">
                            <span class="input-group-text bg-white"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control" placeholder="Cari barang...">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select">
                            <option value="">Semua Status</option>
                            <option value="Baik">Baik</option>
                            <option value="Rusak">Rusak</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="card border-0 shadow-sm">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="bg-light">
                            <tr>
                                <th class="px-4" width="5%">No</th>
                                <th width="15%">Kode Barang</th>
                                <th>Nama/Tipe Barang</th>
                                <th width="15%">Nomor Register</th>
                                <th width="15%">Detail</th>
                                <th class="text-end px-4" width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($items as $index => $item)
                                <tr>
                                    <td class="px-4">{{ $index + 1 }}</td>
                                    <td>{{ $item->kode_barang }}</td>
                                    <td>@include('staff.categories.components.item-icon')</td>
                                    <td>{{ $item->register }}</td>
                                    <td>
                                        <button type="button" 
                                                class="btn btn-sm btn-outline-primary" 
                                                data-bs-toggle="modal"
                                                data-bs-target="#detailModal{{ $item->id }}">
                                            <i class="bi bi-info-circle me-1"></i>
                                            Lihat Detail
                                        </button>
                                    </td>
                                    <td class="text-end px-4">
                                        @include('staff.categories.components.item-actions')
                                    </td>
                                </tr>
                            @empty
                                @include('staff.categories.components.empty-state')
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer bg-white border-0 py-3">
                {{ $items->links() }}
            </div>
        </div>

        @foreach ($items as $item )
            @include('staff.categories.components.item-details-modal')
        @endforeach


        <!-- Add Item Modal -->
        <div class="modal fade" id="addItemModal" tabindex="-1">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0">
                    <div class="modal-header bg-primary text-white">
                        <h5 class="modal-title">Tambah {{ ucfirst(str_replace('-', ' ', $category)) }} Baru</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>

                    <form action="{{ route('staff.categories.store', $category) }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="row g-3">
                                <!-- Common Fields -->
                                <div class="col-md-6">
                                    <label class="form-label required">Nomor Register</label>
                                    <input type="text" class="form-control" name="register" required maxlength="50">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Kode Barang</label>
                                    <input type="text" class="form-control" name="kode_barang" required maxlength="50">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Nama Barang</label>
                                    <input type="text" class="form-control" name="nama_barang" required maxlength="255">
                                </div>

                                <!-- Category Specific Fields -->
                                @include("staff.categories.components.{$category}-form")

                                <!-- Common Optional Fields -->
                                <div class="col-md-6">
                                    <label class="form-label">Asal Usul</label>
                                    <input type="text" class="form-control" name="asal_usul" maxlength="255">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Tahun Pengadaan</label>
                                    <input type="number" class="form-control" name="tahun_pengadaan" min="1900"
                                        max="{{ date('Y') + 1 }}">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Harga</label>
                                    <input type="number" class="form-control" name="harga" step="0.01">
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Keterangan</label>
                                    <textarea class="form-control" name="keterangan" rows="2"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <style>
            .table> :not(caption)>*>* {
                padding: 1rem 0.75rem;
            }

            .form-label.required:after {
                content: "*";
                color: #dc3545;
                margin-left: 4px;
            }

            .btn-link:hover {
                opacity: 0.75;
            }

            .pagination {
                margin-bottom: 0;
            }

            .table-hover tbody tr:hover {
                background-color: rgba(13, 110, 253, 0.04);
            }

            .modal-body .table td {
                padding: 0.5rem;
            }

            .badge {
                font-weight: 500;
            }

            .text-muted {
                font-size: 0.875rem;
            }
        </style>

        @push('scripts')
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Initialize all modals
                    var modals = document.querySelectorAll('.modal');
                    modals.forEach(function(modal) {
                        new bootstrap.Modal(modal);
                    });

                    // Initialize tooltips
                    var tooltips = document.querySelectorAll('[data-bs-toggle="tooltip"]');
                    tooltips.forEach(function(tooltip) {
                        new bootstrap.Tooltip(tooltip);
                    });
                });
            </script>
        @endpush
    @endsection
