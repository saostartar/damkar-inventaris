<?php
namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\BarangUmum;
use App\Models\AsetTetapLainnya;
use App\Models\PeralatanMesin;
use App\Models\Tanah;
use App\Models\Bangunan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PeminjamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        // Ensure only managers can approve/reject
        $this->middleware('role:Manager')->only(['approve', 'reject', 'return']);
    }

    public function index()
    {
        $peminjaman = Peminjaman::with(['user', 'borrowable'])->latest()->paginate(15);
        return view('manager.peminjaman.index', compact('peminjaman'));
    }




    public function show($id)
    {
        $peminjaman = Peminjaman::with(['user', 'borrowable'])->findOrFail($id);
        return view('manager.peminjaman.show', compact('peminjaman'));
    }

    public function approve($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $item = $peminjaman->borrowable;

        if ($peminjaman->status !== 'Menunggu') {
            return redirect()->route('manager.peminjaman.index')
                           ->with('error', 'Hanya peminjaman dengan status Menunggu yang dapat disetujui');
        }

        if (!$this->isItemAvailable($item)) {
            return redirect()->route('manager.peminjaman.index')
                           ->with('error', 'Barang tidak tersedia untuk dipinjam');
        }

        
        $peminjaman->update([
            'status' => 'Disetujui',
            'approved_by' => Auth::id(),
            'approved_at' => now()
        ]);

         // Decrement item quantity if applicable
         $this->decrementItemQuantity($item);

         ActivityLogController::log(
            'approve_loan',
            "Loan #{$peminjaman->id} approved by " . Auth::user()->name . 
            ". Item: {$item->nama_barang}, Quantity changed.",
            $peminjaman
        );

        return redirect()->route('manager.peminjaman.index')
                        ->with('success', 'Peminjaman berhasil disetujui');
    }

    public function reject($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);

        if ($peminjaman->status !== 'Menunggu') {
            return redirect()->route('manager.peminjaman.index')
                           ->with('error', 'Hanya peminjaman dengan status Menunggu yang dapat ditolak');
        }

        $peminjaman->update([
            'status' => 'Ditolak',
            'rejected_by' => Auth::id(),
            'rejected_at' => now()
        ]);

        ActivityLogController::log(
            'reject_loan',
            "Loan #{$peminjaman->id} rejected by " . Auth::user()->name . 
            " for item: " . $peminjaman->borrowable->nama_barang,
            $peminjaman
        );

        return redirect()->route('manager.peminjaman.index')
        ->with('success', 'Peminjaman berhasil ditolak');
    }

    public function return($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        $item = $peminjaman->borrowable;

        if ($peminjaman->status !== 'Disetujui') {
            return redirect()->route('manager.peminjaman.index')
                           ->with('error', 'Hanya peminjaman yang disetujui yang dapat dikembalikan');
        }

       // Update loan status
       $peminjaman->update([
        'status' => 'Kembali',
        'tanggal_kembali' => now()
    ]);

       // Increment item quantity if applicable
       $this->incrementItemQuantity($item);

       ActivityLogController::log(
        'return_item',
        "Item {$item->nama_barang} returned from loan #{$peminjaman->id}. Quantity updated.",
        $peminjaman
    );

        return redirect()->route('manager.peminjaman.index')
                        ->with('success', 'Barang berhasil dikembalikan');
    }

    private function getModel($itemType)
    {
        switch ($itemType) {
            case 'barang_umum':
                return BarangUmum::class;
            case 'aset_tetap':
                return AsetTetapLainnya::class;
            case 'peralatan_mesin':
                return PeralatanMesin::class;
            case 'tanah':
                return Tanah::class;
            case 'bangunan':
                return Bangunan::class;
            default:
                abort(400, 'Invalid item type');
        }
    }

    private function isItemAvailable($item)
    {
        // Check quantity if applicable
        if (method_exists($item, 'jumlah_barang') && property_exists($item, 'jumlah_barang')) {
            return $item->jumlah_barang > 0;
        }

        if (method_exists($item, 'jumlah') && property_exists($item, 'jumlah')) {
            return $item->jumlah > 0;
        }

        // For items without quantity constraints
        return true;
    }

    private function decrementItemQuantity($item)
    {
        if (property_exists($item, 'jumlah_barang')) {
            $item->decrement('jumlah_barang');
        }

        if (property_exists($item, 'jumlah')) {
            $item->decrement('jumlah');
        }

        $item->save();
    }

    private function incrementItemQuantity($item)
    {
        if (property_exists($item, 'jumlah_barang')) {
            $item->increment('jumlah_barang');
        }

        if (property_exists($item, 'jumlah')) {
            $item->increment('jumlah');
        }

        $item->save();
    }

    
}