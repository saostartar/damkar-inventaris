<div class="d-flex justify-content-end gap-2">
    <a href="{{ route('staff.categories.edit', [$category, $item->id]) }}" 
       class="btn btn-link p-0 me-2" 
       data-bs-toggle="tooltip" 
       title="Edit">
        <i class="bi bi-pencil text-warning"></i>
    </a>
    
    <form action="{{ route('staff.categories.destroy', [$category, $item->id]) }}" 
          method="POST" 
          class="d-inline"
          onsubmit="return confirm('Apakah Anda yakin ingin menghapus item ini?')">
        @csrf
        @method('DELETE')
        <button type="submit" 
                class="btn btn-link p-0" 
                data-bs-toggle="tooltip" 
                title="Hapus">
            <i class="bi bi-trash text-danger"></i>
        </button>
    </form>
</div>