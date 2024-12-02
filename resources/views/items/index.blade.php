@extends('layouts.main')

@section('title', 'Inventaris')

@section('content')
<div class="container py-4">
    <!-- Hero Section -->
    <div class="bg-primary bg-gradient text-white rounded-3 p-4 mb-4 position-relative overflow-hidden">
        <div class="position-absolute top-0 end-0 opacity-25">
            <i class="bi bi-box-seam display-1"></i>
        </div>
        <h2 class="fw-bold mb-2">Sistem Inventaris</h2>
        <p class="mb-0 lead">Dinas Pemadam Kebakaran Kabupaten Minahasa Utara</p>
    </div>

    <!-- Search & Filter -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body">
            <form id="searchForm" class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-white border-end-0">
                            <i class="bi bi-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0" id="searchInput" 
                               placeholder="Cari barang...">
                    </div>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="categoryFilter">
                        <option value="all">Semua Kategori</option>
                        <option value="barang_umum">Barang Umum</option>
                        <option value="aset_tetap">Aset Tetap</option>
                        <option value="peralatan_mesin">Peralatan & Mesin</option>
                        <option value="tanah">Tanah</option>
                        <option value="bangunan">Bangunan</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="statusFilter">
                        <option value="all">Semua Status</option>
                        <option value="available">Tersedia</option>
                        <option value="unavailable">Tidak Tersedia</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="reset" class="btn btn-outline-secondary w-100">
                        <i class="bi bi-arrow-counterclockwise me-1"></i>Reset
                    </button>
                </div>
            </form>
        </div>
    </div>

        <!-- Categories Section -->
    <div class="row g-4" id="inventoryCategories">
        <!-- Barang Umum -->
        <div class="col-12 mb-4 category-section" id="barang_umum_section">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-primary bg-gradient text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-box-seam fs-4 me-2"></i>
                        <h5 class="card-title mb-0">Barang Umum</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Merk/Type</th>
                                    <th>Status</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($barangUmum as $item)
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->merk_type }}</td>
                                    <td>
                                        @if($item->jumlah_barang > 0)
                                            <span class="badge bg-success">Tersedia</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('items.show', ['type' => 'barang_umum', 'id' => $item->id]) }}" 
                                           class="btn btn-sm btn-primary">
                                            <i class="bi bi-info-circle me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3">Tidak ada barang tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Aset Tetap -->
        <div class="col-12 mb-4 category-section" id="aset_tetap_section">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-success bg-gradient text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-building fs-4 me-2"></i>
                        <h5 class="card-title mb-0">Aset Tetap</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Jenis</th>
                                    <th>Status</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($asetTetap as $item)
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->jenis }}</td>
                                    <td>
                                        @if($item->jumlah > 0)
                                            <span class="badge bg-success">Tersedia</span>
                                        @else
                                            <span class="badge bg-danger">Tidak Tersedia</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('items.show', ['type' => 'aset_tetap', 'id' => $item->id]) }}" 
                                           class="btn btn-sm btn-success">
                                            <i class="bi bi-info-circle me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3">Tidak ada aset tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Peralatan & Mesin -->
        <div class="col-12 mb-4 category-section" id="peralatan_mesin_section">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-warning bg-gradient text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-tools fs-4 me-2"></i>
                        <h5 class="card-title mb-0">Peralatan & Mesin</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Merk/Type</th>
                                    <th>Status</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($peralatanMesin as $item)
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->merk_type }}</td>
                                    <td>
                                        <span class="badge bg-success">Tersedia</span>
                                    </td>
                                    <td>
                                        <a href="{{ route('items.show', ['type' => 'peralatan_mesin', 'id' => $item->id]) }}" 
                                           class="btn btn-sm btn-warning">
                                            <i class="bi bi-info-circle me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3">Tidak ada peralatan tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Tanah -->
        <div class="col-12 mb-4 category-section" id="tanah_section">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-danger bg-gradient text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-geo-alt fs-4 me-2"></i>
                        <h5 class="card-title mb-0">Tanah</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Luas (m²)</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tanah as $item)
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->luas_m2 }}</td>
                                    <td>
                                        <a href="{{ route('items.show', ['type' => 'tanah', 'id' => $item->id]) }}" 
                                           class="btn btn-sm btn-danger">
                                            <i class="bi bi-info-circle me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3">Tidak ada tanah tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    
        <!-- Bangunan -->
        <div class="col-12 mb-4 category-section" id="bangunan_section">
            <div class="card border-0 shadow-sm">
                <div class="card-header border-0 bg-info bg-gradient text-white py-3">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-building fs-4 me-2"></i>
                        <h5 class="card-title mb-0">Bangunan</h5>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="bg-light">
                                <tr>
                                    <th>Nama</th>
                                    <th>Lokasi</th>
                                    <th>Kondisi</th>
                                    <th width="15%">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($bangunan as $item)
                                <tr>
                                    <td>{{ $item->nama_barang }}</td>
                                    <td>{{ $item->alamat }}</td>
                                    <td>{{ $item->kondisi_bangunan }}</td>
                                    <td>
                                        <a href="{{ route('items.show', ['type' => 'bangunan', 'id' => $item->id]) }}" 
                                           class="btn btn-sm btn-info">
                                            <i class="bi bi-info-circle me-1"></i>Detail
                                        </a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center py-3">Tidak ada bangunan tersedia</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add JavaScript for search and filter functionality -->
@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const categoryFilter = document.getElementById('categoryFilter');
    const statusFilter = document.getElementById('statusFilter');
    const searchForm = document.getElementById('searchForm');

    function filterItems() {
        const searchTerm = searchInput.value.toLowerCase();
        const category = categoryFilter.value;
        const status = statusFilter.value;

        document.querySelectorAll('.category-section').forEach(section => {
            if (category === 'all' || section.id === category + '_section') {
                section.style.display = 'block';
                
                const rows = section.querySelectorAll('tbody tr');
                rows.forEach(row => {
                    const itemName = row.querySelector('td:first-child').textContent.toLowerCase();
                    const itemStatus = row.querySelector('.badge') ? 
                        row.querySelector('.badge').textContent.toLowerCase() : '';
                    
                    const matchesSearch = itemName.includes(searchTerm);
                    const matchesStatus = status === 'all' || 
                        (status === 'available' && itemStatus.includes('tersedia')) ||
                        (status === 'unavailable' && itemStatus.includes('tidak tersedia'));

                    row.style.display = matchesSearch && matchesStatus ? '' : 'none';
                });
            } else {
                section.style.display = 'none';
            }
        });
    }

    searchInput.addEventListener('input', filterItems);
    categoryFilter.addEventListener('change', filterItems);
    statusFilter.addEventListener('change', filterItems);
    searchForm.addEventListener('reset', () => setTimeout(filterItems, 0));
});
</script>
@endpush

<style>
/* Governmental theme styles */
.bg-primary {
    background: linear-gradient(135deg, #1a237e, #0d47a1) !important;
}

.card {
    border-radius: 0.5rem;
    transition: transform 0.2s ease;
}

.card:hover {
    transform: translateY(-2px);
}

.table thead th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
}

.form-control:focus, .form-select:focus {
    border-color: #0d47a1;
    box-shadow: 0 0 0 0.25rem rgba(13, 71, 161, 0.25);
}

.btn-outline-secondary:hover {
    background-color: #6c757d;
    color: white;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .hero-section {
        text-align: center;
    }
    
    .form-group {
        margin-bottom: 1rem;
    }
}
</style>
@endsection