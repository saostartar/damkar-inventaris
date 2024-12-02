<?php

namespace App\Http\Controllers;

use App\Models\ActivityLog;
use App\Models\AsetTetapLainnya;
use App\Models\Bangunan;
use App\Models\BarangUmum;
use App\Models\Peminjaman;
use App\Models\PeralatanMesin;
use App\Models\Tanah;

class StaffController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Staff']);
    }

    public function dashboard()
    {
        $data = [
            'totalItems' =>
            BarangUmum::count() +
            AsetTetapLainnya::count() +
            PeralatanMesin::count() +
            Tanah::count() +
            Bangunan::count(),
            'activeLoans' => Peminjaman::where('status', 'Disetujui')->count(),
            'returnedToday' => Peminjaman::where('status', 'Kembali')
                ->whereDate('updated_at', today())
                ->count(),
            'pendingRequests' => Peminjaman::where('status', 'Menunggu')->count(),
            'recentLoans' => Peminjaman::with(['user', 'borrowable'])
                ->latest()
                ->take(5)
                ->get(),
            'recentLogs' => ActivityLog::with('user')
                ->latest()
                ->take(5)
                ->get(),
            // Data for charts
            'loanStats' => [
                'approved' => Peminjaman::where('status', 'Disetujui')->count(),
                'pending' => Peminjaman::where('status', 'Menunggu')->count(),
                'returned' => Peminjaman::where('status', 'Kembali')->count(),
                'rejected' => Peminjaman::where('status', 'Ditolak')->count(),
            ],
            'monthlyLoans' => Peminjaman::selectRaw('MONTH(created_at) as month, COUNT(*) as total')
                ->whereYear('created_at', date('Y'))
                ->groupBy('month')
                ->get()
                ->pluck('total', 'month')
                ->toArray(),
            'itemCategories' => [
                'Barang Umum' => BarangUmum::count(),
                'Aset Tetap' => AsetTetapLainnya::count(),
                'Peralatan' => PeralatanMesin::count(),
                'Tanah' => Tanah::count(),
                'Bangunan' => Bangunan::count(),
            ],
        ];

        return view('staff.dashboard', $data);
    }

    public function inventory()
    {
        $data = [
            'barangUmum' => BarangUmum::all(),
            'asetTetap' => AsetTetapLainnya::all(),
            'peralatanMesin' => PeralatanMesin::all(),
            'tanah' => Tanah::all(),
            'bangunan' => Bangunan::all(),
        ];

        return view('staff.inventory.index', compact('data'));
    }

    public function loans()
    {
        $loans = Peminjaman::with(['user', 'borrowable'])
            ->latest()
            ->paginate(15);

        return view('staff.loans.index', compact('loans'));
    }

    public function logs()
    {
        $logs = ActivityLog::with('user')
            ->latest()
            ->paginate(20);

        return view('staff.logs.index', compact('logs'));
    }


}