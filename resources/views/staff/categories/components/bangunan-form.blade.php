<div class="col-md-6">
    <label class="form-label required">Kondisi Bangunan</label>
    <select class="form-select" name="kondisi_bangunan" required>
        <option value="">Pilih kondisi</option>
        <option value="Baik">Baik</option>
        <option value="Kurang Baik">Kurang Baik</option>
        <option value="Rusak Berat">Rusak Berat</option>
    </select>
</div>

<div class="col-md-6">
    <label class="form-label required">Bertingkat</label>
    <select class="form-select" name="bertingkat" required>
        <option value="0">Tidak</option>
        <option value="1">Ya</option>
    </select>
</div>

<div class="col-md-6">
    <label class="form-label required">Beton</label>
    <select class="form-select" name="beton" required>
        <option value="0">Tidak</option>
        <option value="1">Ya</option>
    </select>
</div>

<div class="col-md-6">
    <label class="form-label required">Luas Lantai (m²)</label>
    <input type="number" class="form-control" name="luas_lantai" required step="0.01">
</div>

<div class="col-md-6">
    <label class="form-label required">Luas Total (m²)</label>
    <input type="number" class="form-control" name="luas_m2" required step="0.01">
</div>

<div class="col-12">
    <label class="form-label required">Alamat</label>
    <textarea class="form-control" name="alamat" required rows="2"></textarea>
</div>

<div class="col-md-6">
    <label class="form-label">Tanggal</label>
    <input type="date" class="form-control" name="tanggal">
</div>

<div class="col-md-6">
    <label class="form-label">Nomor</label>
    <input type="text" class="form-control" name="nomor" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Status Tanah</label>
    <input type="text" class="form-control" name="status_tanah" maxlength="255">
</div>

<div class="col-md-6">
    <label class="form-label">Nomor Kode Tanah</label>
    <input type="text" class="form-control" name="nomor_kode_tanah" maxlength="255">
</div>