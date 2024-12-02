{{-- resources/views/staff/dashboard.blade.php --}}
@extends('layouts.staff')

@section('title', 'Dasbor Staff')

@section('content')
<div class="container-fluid">
    <!-- Welcome Section with gradient background -->
    <div class="welcome-section bg-primary bg-gradient text-white rounded-3 p-4 mb-4">
        <div class="row align-items-center">
            <div class="col-auto">
                <div class="rounded-circle bg-white p-3">
                    <i class="bi bi-person-circle text-primary fs-2"></i>
                </div>
            </div>
            <div class="col">
                <h4 class="fw-bold mb-1">Selamat Datang, {{ Auth::user()->name }}!</h4>
                <p class="mb-0 opacity-75">Berikut ringkasan inventaris hari ini</p>
            </div>
        </div>
    </div>

    <!-- Stats Cards with hover effect -->
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-primary bg-opacity-10 p-3 me-3">
                            <i class="bi bi-box-seam text-primary fs-4"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Total Barang</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($totalItems) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-success bg-opacity-10 p-3 me-3">
                            <i class="bi bi-clipboard-check text-success fs-4"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Peminjaman Aktif</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($activeLoans) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-info bg-opacity-10 p-3 me-3">
                            <i class="bi bi-arrow-return-left text-info fs-4"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Dikembalikan Hari Ini</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($returnedToday) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card border-0 shadow-sm rounded-3 hover-lift">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-warning bg-opacity-10 p-3 me-3">
                            <i class="bi bi-clock-history text-warning fs-4"></i>
                        </div>
                        <div>
                            <h6 class="text-muted mb-1">Menunggu Persetujuan</h6>
                            <h3 class="fw-bold mb-0">{{ number_format($pendingRequests) }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts with improved styling -->
    <div class="row g-4 mb-4">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header border-0 bg-white py-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-graph-up text-primary me-2"></i>
                        <h5 class="card-title mb-0">Aktivitas Peminjaman</h5>
                    </div>
                </div>
                <div class="card-body p-4">
                    <canvas id="loanActivityChart" height="300"></canvas>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header border-0 bg-white py-4">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-pie-chart text-primary me-2"></i>
                        <h5 class="card-title mb-0">Distribusi Inventaris</h5>
                    </div>
                </div>
                <div class="card-body p-4">
                    <canvas id="inventoryChart" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <!-- Activity Section -->
    <div class="row g-4">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded-3">
                <div class="card-header border-0 bg-white py-4 d-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <i class="bi bi-clock-history text-primary me-2"></i>
                        <h5 class="card-title mb-0">Peminjaman Terbaru</h5>
                    </div>
                    <a href="{{ route('staff.loans.index') }}" class="btn btn-sm btn-primary rounded-pill px-3">
                        <i class="bi bi-eye me-1"></i>Lihat Semua
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="list-group list-group-flush">
                        @forelse($recentLoans as $loan)
                            <div class="list-group-item px-4 py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <h6 class="mb-1">{{ $loan->user->name }}</h6>
                                        <small class="text-muted d-flex align-items-center">
                                            <i class="bi bi-box-seam me-2"></i>
                                            {{ $loan->borrowable->nama_barang }}
                                        </small>
                                    </div>
                                    <span class="badge bg-{{ 
                                        $loan->status === 'Disetujui' ? 'success' : 
                                        ($loan->status === 'Menunggu' ? 'warning' : 'danger') 
                                    }} rounded-pill px-3">{{ $loan->status }}</span>
                                </div>
                            </div>
                        @empty
                            <div class="p-5 text-center">
                                <i class="bi bi-inbox display-4 text-muted mb-3 d-block"></i>
                                <p class="text-muted mb-0">Belum ada peminjaman terbaru</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

    
    </div>
</div>
@endsection

@push('styles')
<style>
.hover-lift {
    transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.hover-lift:hover {
    transform: translateY(-5px);
    box-shadow: 0 0.5rem 1rem rgba(0,0,0,0.15)!important;
}
.welcome-section {
    background: linear-gradient(45deg, #0d6efd, #0dcaf0);
}
.card {
    transition: all 0.3s ease;
}
.badge {
    font-weight: 500;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Enhanced chart styling
const chartOptions = {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
        legend: { display: false }
    }
};

// Loan Activity Chart
new Chart(document.getElementById('loanActivityChart'), {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'],
        datasets: [{
            label: 'Peminjaman',
            data: @json(array_values($monthlyLoans)),
            borderColor: '#0d6efd',
            tension: 0.4,
            fill: true,
            backgroundColor: 'rgba(13, 110, 253, 0.1)'
        }]
    },
    options: {
        ...chartOptions,
        scales: {
            y: {
                beginAtZero: true,
                ticks: { stepSize: 1 }
            }
        }
    }
});

// Inventory Distribution Chart
new Chart(document.getElementById('inventoryChart'), {
    type: 'doughnut',
    data: {
        labels: [
            'Barang Umum',
            'Aset Tetap',
            'Peralatan',
            'Tanah',
            'Bangunan'
        ],
        datasets: [{
            data: @json(array_values($itemCategories)),
            backgroundColor: [
                '#0d6efd',
                '#198754',
                '#ffc107',
                '#dc3545',
                '#6c757d'
            ]
        }]
    },
    options: {
        ...chartOptions,
        plugins: {
            legend: {
                position: 'bottom',
                labels: { 
                    boxWidth: 12,
                    padding: 15
                }
            }
        },
        cutout: '65%'
    }
});
</script>
@endpush