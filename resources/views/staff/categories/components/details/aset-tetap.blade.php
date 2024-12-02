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
    <td>Jenis</td>
    <td>: {{ $item->jenis ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Judul/Pencipta</td>
    <td>: {{ $item->judul_pencipta ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Asal Daerah</td>
    <td>: {{ $item->asal_daerah ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Bahan</td>
    <td>: {{ $item->bahan ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Ukuran</td>
    <td>: {{ $item->ukuran ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Jumlah</td>
    <td>: {{ $item->jumlah }}</td>
</tr>
<tr>
    <td>Tahun Cetak</td>
    <td>: {{ $item->tahun_cetak ?: 'N/A' }}</td>
</tr>