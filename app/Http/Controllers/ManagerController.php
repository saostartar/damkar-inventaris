<?php

namespace App\Http\Controllers;

use App\Models\AsetTetapLainnya;
use App\Models\Bangunan;
use App\Models\PeralatanMesin;
use App\Models\Tanah;
use App\Models\User;
use App\Models\Peminjaman;
use App\Models\BarangUmum;


class ManagerController extends Controller 
{
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
            'pendingRequests' => Peminjaman::where('status', 'Menunggu')->count(),
            'totalUsers' => User::count(),
            'latestLoans' => Peminjaman::with(['user', 'borrowable'])
                                      ->latest()
                                      ->take(5)
                                      ->get(),
            'lowStockItems' => BarangUmum::where('jumlah_barang', '<=', 5)
                                        ->take(5)
                                        ->get()
        ];

        return view('manager.dashboard', $data);
    }
}