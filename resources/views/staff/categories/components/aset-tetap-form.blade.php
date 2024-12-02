<div class="col-md-6">
    <label class="form-label required">Nama Barang</label>
    <input type="text" class="form-control" name="nama_barang" required maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Asal Daerah</label>
    <input type="text" class="form-control" name="asal_daerah" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Judul/Pencipta</label>
    <input type="text" class="form-control" name="judul_pencipta" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Pencipta</label>
    <input type="text" class="form-control" name="pencipta" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Bahan</label>
    <input type="text" class="form-control" name="bahan" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Jenis</label>
    <input type="text" class="form-control" name="jenis" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Ukuran</label>
    <input type="text" class="form-control" name="ukuran" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label required">Jumlah</label>
    <input type="number" class="form-control" name="jumlah" required min="0">
</div>

<div class="col-md-6">
    <label class="form-label">Tahun Cetak</label>
    <input type="number" class="form-control" name="tahun_cetak" min="1900" max="{{ date('Y') }}">
</div>

<div class="col-12">
    <label class="form-label">Spesifikasi</label>
    <textarea class="form-control" name="spesifikasi" rows="3"></textarea>
</div>