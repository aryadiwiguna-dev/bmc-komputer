@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('build/plugins/datatables.net-bs5/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
  <div>
    <h4 class="mb-3 mb-md-0">Data Barang (Produk)</h4>
  </div>
  <div>
    <button class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addProductModal">
      <i class="btn-icon-prepend icon-sm" data-lucide="plus"></i> Tambah Barang
    </button>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <!-- Filters Header -->
        <div class="row g-3 mb-4">
          <div class="col-md-6">
            <div class="input-group">
              <span class="input-group-text bg-transparent border-end-0">
                <i data-lucide="search" class="icon-sm text-secondary"></i>
              </span>
              <input type="text" id="productSearchInput" class="form-control border-start-0 ps-0" placeholder="Cari nama barang...">
            </div>
          </div>
          <div class="col-md-4">
            <select id="productCategorySelect" class="form-select">
              <option value="">Semua Kategori</option>
              @foreach($categories as $cat)
                <option value="{{ $cat }}">{{ $cat }}</option>
              @endforeach
            </select>
          </div>
          <div class="col-md-2">
            <button type="button" id="btnResetFilters" class="btn btn-outline-secondary w-100">
              <i class="me-1 icon-sm" data-lucide="rotate-ccw"></i> Reset
            </button>
          </div>
        </div>

        <!-- Product Table -->
        <div class="table-responsive">
          <table id="productsTable" class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Nama Barang</th>
                <th>Kategori</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th>Satuan</th>
                <th width="150px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($products as $product)
                @php
                  $isLowStock = $product->stok <= $product->stok_minimum;
                @endphp
                <tr class="{{ $isLowStock ? 'table-warning-subtle' : '' }}">
                  <td>
                    <div class="d-flex align-items-center gap-2">
                      @if($product->gambar)
                        <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_barang }}" class="rounded" style="width: 40px; height: 40px; object-fit: cover;">
                      @else
                        <div class="bg-secondary-subtle rounded d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                          <i data-lucide="package" class="icon-sm text-secondary"></i>
                        </div>
                      @endif
                      <div>
                        <div class="fw-bold text-wrap" style="max-width: 250px;">{{ $product->nama_barang }}</div>
                        @if($isLowStock)
                          <span class="badge bg-danger fs-10px">Stok Rendah (Min: {{ $product->stok_minimum }})</span>
                        @endif
                      </div>
                    </div>
                  </td>
                  <td><span class="badge bg-secondary-subtle text-secondary">{{ $product->kategori }}</span></td>
                  <td>Rp {{ number_format($product->harga_beli, 0, ',', '.') }}</td>
                  <td><strong class="text-primary">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</strong></td>
                  <td>
                    <span class="fw-bold {{ $isLowStock ? 'text-danger' : 'text-success' }}">{{ $product->stok }}</span>
                  </td>
                  <td>{{ $product->satuan }}</td>
                  <td>
                    <div class="d-flex gap-1">
                      <button class="btn btn-xs btn-outline-warning edit-product-btn" data-product="{{ json_encode($product) }}">
                        <i class="icon-sm" data-lucide="edit-2"></i> Edit
                      </button>
                      <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');" style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-xs btn-outline-danger">
                          <i class="icon-sm" data-lucide="trash"></i> Hapus
                        </button>
                      </form>
                    </div>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Add Product Modal -->
<div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Produk Baru</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" class="form-control" placeholder="Contoh: Asus ROG Mouse" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="3" placeholder="Deskripsi produk..."></textarea>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Kategori</label>
              <input type="text" name="kategori" class="form-control" placeholder="Contoh: Aksesoris" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Satuan</label>
              <input type="text" name="satuan" class="form-control" placeholder="Contoh: pcs" value="pcs" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Harga Beli (Rp)</label>
              <input type="number" name="harga_beli" class="form-control" placeholder="0" min="0" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Harga Jual (Rp)</label>
              <input type="number" name="harga_jual" class="form-control" placeholder="0" min="0" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Stok Awal</label>
              <input type="number" name="stok" class="form-control" placeholder="0" min="0" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Stok Minimum</label>
              <input type="number" name="stok_minimum" class="form-control" placeholder="5" min="0" value="5" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Gambar Produk</label>
            <input type="file" name="gambar" class="form-control" accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="me-1 icon-sm" data-lucide="save"></i> Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Product Modal -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Produk</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form id="editProductForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="edit_nama_barang" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" id="edit_deskripsi" class="form-control" rows="3" placeholder="Deskripsi produk..."></textarea>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Kategori</label>
              <input type="text" name="kategori" id="edit_kategori" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Satuan</label>
              <input type="text" name="satuan" id="edit_satuan" class="form-control" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Harga Beli (Rp)</label>
              <input type="number" name="harga_beli" id="edit_harga_beli" class="form-control" min="0" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Harga Jual (Rp)</label>
              <input type="number" name="harga_jual" id="edit_harga_jual" class="form-control" min="0" required>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <label class="form-label">Stok</label>
              <input type="number" name="stok" id="edit_stok" class="form-control" min="0" required>
            </div>
            <div class="col-md-6 mb-3">
              <label class="form-label">Stok Minimum</label>
              <input type="number" name="stok_minimum" id="edit_stok_minimum" class="form-control" min="0" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label">Gambar Produk</label>
            <input type="file" name="gambar" class="form-control mb-2" accept="image/*">
            <div id="edit_gambar_preview_container" class="d-none">
              <span class="fs-11px text-secondary d-block mb-1">Gambar saat ini:</span>
              <img id="edit_gambar_preview" src="" alt="Preview" class="rounded border" style="width: 80px; height: 80px; object-fit: cover;">
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="me-1 icon-sm" data-lucide="check-circle"></i> Perbarui</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('plugin-scripts')
  <script src="{{ asset('build/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('build/plugins/datatables.net/dataTables.min.js') }}"></script>
  <script src="{{ asset('build/plugins/datatables.net-bs5/dataTables.bootstrap5.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi DataTable
    const table = $('#productsTable').DataTable({
      "dom": 'lrtip', // Sembunyikan search box default
      "aLengthMenu": [
        [10, 30, 50, 100, -1],
        [10, 30, 50, 100, "Semua"]
      ],
      "iDisplayLength": 10,
      "language": {
        "lengthMenu": "Tampilkan _MENU_ data",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ produk",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 produk",
        "infoFiltered": "(disaring dari _MAX_ total produk)",
        "zeroRecords": "Tidak ada produk yang cocok ditemukan",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Berikutnya",
          "previous": "Sebelumnya"
        }
      }
    });

    // 2. Custom search input
    $('#productSearchInput').on('keyup', function() {
      table.search(this.value).draw();
    });

    // 3. Custom category select
    $('#productCategorySelect').on('change', function() {
      table.column(1).search(this.value).draw();
    });

    // 4. Reset filters
    $('#btnResetFilters').on('click', function() {
      $('#productSearchInput').val('');
      $('#productCategorySelect').val('');
      table.search('').column(1).search('').draw();
    });

    // 5. Edit Modal Setup
    const editModal = new bootstrap.Modal(document.getElementById('editProductModal'));
    const editForm = document.getElementById('editProductForm');
    
    document.querySelectorAll('.edit-product-btn').forEach(btn => {
      btn.addEventListener('click', function() {
        const product = JSON.parse(this.dataset.product);
        
        // Populate inputs
        document.getElementById('edit_nama_barang').value = product.nama_barang;
        document.getElementById('edit_deskripsi').value = product.deskripsi || '';
        document.getElementById('edit_kategori').value = product.kategori;
        document.getElementById('edit_satuan').value = product.satuan;
        document.getElementById('edit_harga_beli').value = Math.round(product.harga_beli);
        document.getElementById('edit_harga_jual').value = Math.round(product.harga_jual);
        document.getElementById('edit_stok').value = product.stok;
        document.getElementById('edit_stok_minimum').value = product.stok_minimum;

        // Handle image preview
        const previewContainer = document.getElementById('edit_gambar_preview_container');
        const previewImg = document.getElementById('edit_gambar_preview');
        if (product.gambar) {
          previewImg.src = `/storage/${product.gambar}`;
          previewContainer.classList.remove('d-none');
        } else {
          previewImg.src = '';
          previewContainer.classList.add('d-none');
        }

        // Set form action url dynamically
        editForm.action = `/products/${product.id}`;

        editModal.show();
      });
    });
  });
</script>
@endpush
