<tr>
    <td width="35%">Register</td>
    <td>: {{ $item->register }}</td>
</tr>
<tr>
    <td>Kode Barang</td>
    <td>: {{ $item->kode_barang }}</td>
</tr>
<tr>
    <td>Nama Barang</td>
    <td>: {{ $item->nama_barang }}</td>
</tr>
<tr>
    <td>Kondisi</td>
    <td>: {{ $item->kondisi_bangunan }}</td>
</tr>
<tr>
    <td>Bertingkat</td>
    <td>: {{ $item->bertingkat ? 'Ya' : 'Tidak' }}</td>
</tr>
<tr>
    <td>Beton</td>
    <td>: {{ $item->beton ? 'Ya' : 'Tidak' }}</td>
</tr>
<tr>
    <td>Luas Lantai (m²)</td>
    <td>: {{ $item->luas_lantai }}</td>
</tr>
<tr>
    <td>Luas Total (m²)</td>
    <td>: {{ $item->luas_m2 }}</td>
</tr>
<tr>
    <td>Alamat</td>
    <td>: {{ $item->alamat }}</td>
</tr>
<tr>
    <td>Status Tanah</td>
    <td>: {{ $item->status_tanah ?: 'N/A' }}</td>
</tr>
<tr>
    <td>No. Kode Tanah</td>
    <td>: {{ $item->nomor_kode_tanah ?: 'N/A' }}</td>
</tr>