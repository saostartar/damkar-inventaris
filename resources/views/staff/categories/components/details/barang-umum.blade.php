<tr>
    <td width="35%">Register</td>
    <td>: {{ $item->register }}</td>
</tr>
<tr>
    <td>Merk/Type</td>
    <td>: {{ $item->merk_type }}</td>
</tr>
<tr>
    <td>Bahan</td>
    <td>: {{ $item->bahan ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Ukuran</td>
    <td>: {{ $item->ukuran_konstruksi ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Satuan</td>
    <td>: {{ $item->satuan ?: 'N/A' }}</td>
</tr>
<tr>
    <td>Keadaan</td>
    <td>: {{ $item->keadaan_barang }}</td>
</tr>