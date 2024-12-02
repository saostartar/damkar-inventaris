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
    <td>Luas (m²)</td>
    <td>: {{ $item->luas_m2 }}</td>
</tr>
<tr>
    <td>Alamat</td>
    <td>: {{ $item->alamat }}</td>
</tr>
<tr>
    <td>Hak</td>
    <td>: {{ $item->hak ?: 'N/A' }}</td>
</tr>
<tr>
    <td>No. Sertifikat</td>
    <td>: {{ $item->nomor_sertifikat ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Tgl. Sertifikat</td>
    <td>: {{ $item->tanggal_sertifikat ? date('d/m/Y', strtotime($item->tanggal_sertifikat)) : 'N/A' }}</td>
</tr>
<tr>
    <td>Penggunaan</td>
    <td>: {{ $item->penggunaan ?: 'N/A' }}</td>
</tr>