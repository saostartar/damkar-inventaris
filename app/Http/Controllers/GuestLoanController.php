<?php
namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\BarangUmum;
use App\Models\AsetTetapLainnya;
use App\Models\PeralatanMesin;
use App\Models\Tanah;
use App\Models\Bangunan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GuestLoanController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:Guest']);
    }

    public function create($itemType, $itemId)
    {
        $model = $this->getModel($itemType);
        $item = $model::findOrFail($itemId);
        
        return view('guest.loans.create', compact('item', 'itemType'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item_type' => 'required|string',
            'item_id' => 'required|integer',
            'tanggal_pinjam' => 'required|date|after_or_equal:today',
            'tanggal_kembali' => 'required|date|after:tanggal_pinjam',
            'keterangan' => 'nullable|string|max:255'
        ]);

        $model = $this->getModel($request->item_type);
        $item = $model::findOrFail($request->item_id);

        // Create new loan request
        $peminjaman = new Peminjaman([
            'user_id' => Auth::id(),
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
            'status' => 'Menunggu',
            'keterangan' => $request->keterangan
        ]);

        $item->peminjaman()->save($peminjaman);

        ActivityLogController::log(
            'create_loan_request',
            "New loan request created for item {$item->nama_barang} by " . Auth::user()->name,
            $peminjaman
        );

        return redirect()->route('guest.loans.index')
                        ->with('success', 'Permintaan peminjaman berhasil diajukan');
    }

    public function index()
    {
        $peminjaman = Peminjaman::where('user_id', Auth::id())
                               ->with('borrowable')
                               ->latest()
                               ->paginate(10);
                               
        return view('guest.loans.index', compact('peminjaman'));
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
}