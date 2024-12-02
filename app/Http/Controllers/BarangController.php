<?php
namespace App\Http\Controllers;

use App\Models\BarangUmum;
use App\Models\AsetTetapLainnya;
use App\Models\PeralatanMesin;
use App\Models\Tanah;
use App\Models\Bangunan;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        $barangUmum = BarangUmum::all();
        $asetTetap = AsetTetapLainnya::all();
        $peralatanMesin = PeralatanMesin::all();
        $tanah = Tanah::all();
        $bangunan = Bangunan::all();

        return view('items.index', compact('barangUmum', 'asetTetap', 'peralatanMesin', 'tanah', 'bangunan'));
    }

    public function byCategory($category)
    {
        switch ($category) {
            case 'barang_umum':
                $items = BarangUmum::all();
                break;
            case 'aset_tetap':
                $items = AsetTetapLainnya::all();
                break;
            case 'peralatan_mesin':
                $items = PeralatanMesin::all();
                break;
            case 'tanah':
                $items = Tanah::all();
                break;
            case 'bangunan':
                $items = Bangunan::all();
                break;
            default:
                abort(404, 'Kategori tidak ditemukan');
        }

        return view('items.index', compact('items', 'category'));
    }

    public function show($type, $id)
{
    switch ($type) {
        case 'barang_umum':
            $item = BarangUmum::findOrFail($id);
            break;
        case 'aset_tetap':
            $item = AsetTetapLainnya::findOrFail($id);
            break;
        case 'peralatan_mesin':
            $item = PeralatanMesin::findOrFail($id);
            break;
        case 'tanah':
            $item = Tanah::findOrFail($id);
            break;
        case 'bangunan':
            $item = Bangunan::findOrFail($id);
            break;
        default:
            abort(404);
    }

    return view('items.show', compact('item', 'type'));
}
}