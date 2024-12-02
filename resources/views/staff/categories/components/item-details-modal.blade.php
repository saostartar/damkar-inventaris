<!-- Modal -->
<div class="modal fade" id="detailModal{{ $item->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $item->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="detailModalLabel{{ $item->id }}">Detail {{ $item->nama_barang }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless mb-0">
                    <tbody>
                        @switch($category)
                            @case('barang-umum')
                                @include('staff.categories.components.details.barang-umum')
                                @break
                            
                            @case('aset-tetap')
                                @include('staff.categories.components.details.aset-tetap')
                                @break
                            
                            @case('peralatan')
                                @include('staff.categories.components.details.peralatan')
                                @break
                            
                            @case('tanah')
                                @include('staff.categories.components.details.tanah')
                                @break
                            
                            @case('bangunan')
                                @include('staff.categories.components.details.bangunan')
                                @break
                        @endswitch

                        <tr><td colspan="2"><hr class="my-2"></td></tr>
                        
                        <tr>
                            <td width="35%">Tahun Pengadaan</td>
                            <td>: {{ $item->tahun_pengadaan ?: 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Asal Usul</td>
                            <td>: {{ $item->asal_usul ?: 'N/A' }}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>: Rp {{ number_format($item->harga ?: 0, 0, ',', '.') }}</td>
                        </tr>
                        @if($item->keterangan)
                        <tr>
                            <td>Keterangan</td>
                            <td>: {{ $item->keterangan }}</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>