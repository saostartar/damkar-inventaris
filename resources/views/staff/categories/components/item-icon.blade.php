<div class="d-flex align-items-center">
    @switch($category)
        @case('barang-umum')
            <i class="bi bi-box-seam text-primary me-2"></i>
            <div>
                <div>{{ $item->nama_barang }}</div>
                <small class="text-muted">{{ $item->merk_type }}</small>
            </div>
            @break
            
        @case('aset-tetap')
            <i class="bi bi-building text-success me-2"></i>
            <div>
                <div>{{ $item->nama_barang }}</div>
                <small class="text-muted">{{ $item->jenis }}</small>
            </div>
            @break
            
        @case('peralatan')
            <i class="bi bi-tools text-warning me-2"></i>
            <div>
                <div>{{ $item->nama_barang }}</div>
                <small class="text-muted">{{ $item->merk_type }}</small>
            </div>
            @break
            
        @case('bangunan')
            <i class="bi bi-house text-info me-2"></i>
            <div>
                <div>{{ $item->nama_barang }}</div>
                <small class="text-muted">{{ $item->kondisi_bangunan }}</small>
            </div>
            @break
            
        @default
            <i class="bi bi-collection text-secondary me-2"></i>
            {{ $item->nama_barang }}
    @endswitch
</div>