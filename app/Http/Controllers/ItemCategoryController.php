<?php
namespace App\Http\Controllers;

use App\Models\AsetTetapLainnya;
use App\Models\Bangunan;
use App\Models\BarangUmum;
use App\Models\PeralatanMesin;
use App\Models\Tanah;
use Illuminate\Http\Request;

class ItemCategoryController extends Controller
{

    public function __construct()
{
    $this->middleware(['auth', 'role:Staff']);
}
    public function index()
    {
        $data = [
            'barang_umum' => BarangUmum::count(),
            'aset_tetap' => AsetTetapLainnya::count(),
            'peralatan' => PeralatanMesin::count(),
            'tanah' => Tanah::count(),
            'bangunan' => Bangunan::count(),
        ];
        return view('staff.categories.index', compact('data'));
    }

    public function showCategory($category)
    {
        $items = [];
        switch ($category) {
            case 'barang-umum':
                $items = BarangUmum::paginate(10);
                break;
            case 'aset-tetap':
                $items = AsetTetapLainnya::paginate(10);
                break;
            case 'peralatan':
                $items = PeralatanMesin::paginate(10);
                break;
            case 'tanah':
                $items = Tanah::paginate(10);
                break;
            case 'bangunan':
                $items = Bangunan::paginate(10);
                break;
        }
        return view('staff.categories.show', compact('items', 'category'));
    }

    public function edit($category, $id)
    {
        $item = null;
        switch ($category) {
            case 'barang-umum':
                $item = BarangUmum::findOrFail($id);
                break;
            case 'aset-tetap':
                $item = AsetTetapLainnya::findOrFail($id);
                break;
            case 'peralatan':
                $item = PeralatanMesin::findOrFail($id);
                break;
            case 'tanah':
                $item = Tanah::findOrFail($id);
                break;
            case 'bangunan':
                $item = Bangunan::findOrFail($id);
                break;
        }
        return view('staff.categories.edit', compact('item', 'category'));
    }

    public function store(Request $request, $category)
    {
        switch ($category) {
            case 'barang-umum':
                $validated = $this->validateBarangUmum($request);
                $item = BarangUmum::create($validated);
                break;

            case 'aset-tetap':
                $validated = $this->validateAsetTetap($request);
                $item = AsetTetapLainnya::create($validated);
                break;

            case 'peralatan':
                $validated = $this->validatePeralatan($request);
                $item = PeralatanMesin::create($validated);
                break;

            case 'tanah':
                $validated = $this->validateTanah($request);
                $item = Tanah::create($validated);
                break;

            case 'bangunan':
                $validated = $this->validateBangunan($request);
                $item = Bangunan::create($validated);
                break;
        }

        // Log item creation
        ActivityLogController::log(
            'create_item',
            "Created new {$category} item with register number {$item->register}",
            $item
        );

        return redirect()->route('staff.categories.show', $category)
            ->with('success', 'Item added successfully');
    }

    public function update(Request $request, $category, $id)
    {
        switch ($category) {
            case 'barang-umum':
                $item = BarangUmum::findOrFail($id);
                $this->validateBarangUmum($request);
                break;
            case 'aset-tetap':
                $item = AsetTetapLainnya::findOrFail($id);
                $this->validateAsetTetap($request);
                break;
            case 'peralatan':
                $item = PeralatanMesin::findOrFail($id);
                $this->validatePeralatan($request);
                break;
            case 'tanah':
                $item = Tanah::findOrFail($id);
                $this->validateTanah($request);
                break;

            case 'bangunan':
                $item = Bangunan::findOrFail($id);
                $this->validateBangunan($request);
                break;
        }

        $item->update($request->all());
        return redirect()->route('staff.categories.show', $category)
            ->with('success', 'Item updated successfully');
    }

    public function destroy($category, $id)
    {
        switch ($category) {
            case 'barang-umum':
                BarangUmum::findOrFail($id)->delete();
                break;
            case 'aset-tetap':
                AsetTetapLainnya::findOrFail($id)->delete();
                break;
            case 'peralatan':
                PeralatanMesin::findOrFail($id)->delete();
                break;
            case 'tanah':
                Tanah::findOrFail($id)->delete();
                break;
            case 'bangunan':
                Bangunan::findOrFail($id)->delete();
                break;
        }

        return redirect()->route('staff.categories.show', $category)
            ->with('success', 'Item deleted successfully');
    }

    private function validateBarangUmum(Request $request)
    {
        return $request->validate([
            'register' => 'required|string|max:50',
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'merk_type' => 'required|string|max:255',
            'bahan' => 'nullable|string|max:255',
            'ukuran_konstruksi' => 'nullable|string|max:50',
            'satuan' => 'nullable|string|max:50',
            'keadaan_barang' => 'nullable|in:Baik,Kurang Baik,Rusak Berat',
            'jumlah_barang' => 'required|integer',
            'no_sertifikat' => 'nullable|string|max:255',
            'no_pabrik' => 'nullable|string|max:255',
            'no_chasis' => 'nullable|string|max:255',
            'no_mesin' => 'nullable|string|max:255',
            'asal_usul' => 'nullable|string|max:255',
            'tahun_pengadaan' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'harga' => 'nullable|numeric|min:0|max:999999999999999.99',
            'keterangan' => 'nullable|string',
        ]);
    }

    private function validateAsetTetap(Request $request)
    {
        return $request->validate([
            'register' => 'required|string|max:50',
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'judul_pencipta' => 'nullable|string|max:255',
            'spesifikasi' => 'nullable|string',
            'asal_daerah' => 'nullable|string|max:255',
            'pencipta' => 'nullable|string|max:255',
            'bahan' => 'nullable|string|max:255',
            'jenis' => 'nullable|string|max:255',
            'ukuran' => 'nullable|string|max:255',
            'jumlah' => 'required|integer',
            'tahun_cetak' => 'nullable|integer',
            'asal_usul' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric|between:0,999999999999999.99',
            'keterangan' => 'nullable|string',
        ]);
    }

    private function validatePeralatan(Request $request)
    {
        return $request->validate([
            'register' => 'required|string|max:50',
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'merk_type' => 'required|string|max:255',
            'ukuran_cc' => 'nullable|string',
            'bahan' => 'nullable|string',
            'pabrik' => 'nullable|string|max:255',
            'rangka' => 'nullable|string|max:255',
            'mesin' => 'nullable|string|max:255',
            'polisi' => 'nullable|string|max:255',
            'bpkb' => 'nullable|string|max:255',
            'tahun_pengadaan' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'asal_usul' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric|min:0|max:999999999999999.99',
            'keterangan' => 'nullable|string',
        ]);
    }

    private function validateTanah(Request $request)
    {
        return $request->validate([
            'register' => 'required|string|max:50',
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'luas_m2' => 'required|numeric|between:0,9999999.99',
            'alamat' => 'required|string',
            'hak' => 'nullable|string|max:255',
            'tanggal_sertifikat' => 'nullable|date',
            'nomor_sertifikat' => 'nullable|string|max:255',
            'penggunaan' => 'nullable|string|max:255',
            'tahun_pengadaan' => 'nullable|integer|min:1900|max:' . (date('Y') + 1),
            'asal_usul' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric|min:0|max:999999999999999.99',
            'keterangan' => 'nullable|string',
        ]);
    }

    private function validateBangunan(Request $request)
    {
        return $request->validate([
            'register' => 'required|string|max:50',
            'kode_barang' => 'required|string|max:50',
            'nama_barang' => 'required|string|max:255',
            'kondisi_bangunan' => 'required|in:Baik,Kurang Baik,Rusak Berat',
            'bertingkat' => 'required|boolean',
            'beton' => 'required|boolean',
            'luas_lantai' => 'required|numeric|min:0',
            'alamat' => 'required|string',
            'tanggal' => 'nullable|date',
            'nomor' => 'nullable|string|max:255',
            'luas_m2' => 'required|numeric|min:0',
            'status_tanah' => 'nullable|string|max:255',
            'nomor_kode_tanah' => 'nullable|string|max:255',
            'asal_usul' => 'nullable|string|max:255',
            'harga' => 'nullable|numeric|min:0|max:999999999999999.99',
            'keterangan' => 'nullable|string',
        ]);
    }
}