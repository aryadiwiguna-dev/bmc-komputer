@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('build/plugins/datatables.net-bs5/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
  <link href="{{ asset('build/plugins/select2/select2.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
  <div>
    <h4 class="mb-3 mb-md-0">Stok Masuk (Restock Gudang)</h4>
  </div>
  <div>
    <button class="btn btn-primary btn-icon-text" data-bs-toggle="modal" data-bs-target="#addStockInModal">
      <i class="btn-icon-prepend icon-sm" data-lucide="plus"></i> Catat Barang Masuk
    </button>
  </div>
</div>

@if(session('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if($errors->has('error'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ $errors->first('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <!-- Date Filters -->
        <form method="GET" action="{{ route('stock-in.index') }}" class="row g-3 mb-4">
          <div class="col-md-4">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
          </div>
          <div class="col-md-4">
            <label class="form-label">Tanggal Selesai</label>
            <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
          </div>
          <div class="col-md-4 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-secondary w-100"><i class="me-1 icon-sm" data-lucide="filter"></i> Filter Log</button>
            <a href="{{ route('stock-in.index') }}" class="btn btn-outline-secondary w-100"><i class="me-1 icon-sm" data-lucide="rotate-ccw"></i> Reset</a>
          </div>
        </form>

        <!-- Stock In Table -->
        <h6 class="card-title mb-3">Log Riwayat Barang Masuk</h6>
        <div class="table-responsive">
          <table id="stockInTable" class="table table-hover align-middle">
            <thead>
              <tr>
                <th>Tanggal</th>
                <th>Nama Barang</th>
                <th>Jumlah Masuk</th>
                <th>Keterangan / Supplier</th>
                <th>Petugas (Pencatat)</th>
              </tr>
            </thead>
            <tbody>
              @foreach($stockIns as $log)
                <tr>
                  <td>{{ $log->tanggal }}</td>
                  <td><strong>{{ $log->product->nama_barang ?? 'Produk Dihapus' }}</strong></td>
                  <td><span class="text-success fw-bold">+{{ $log->jumlah }} {{ $log->product->satuan ?? 'pcs' }}</span></td>
                  <td>{{ $log->keterangan ?? '-' }}</td>
                  <td>{{ $log->user->name ?? '-' }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</div>

<!-- Add Stock In Modal -->
<div class="modal fade" id="addStockInModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Catat Restock Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('stock-in.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Pilih Barang (Produk)</label>
            <select name="product_id" class="form-select select2-modal" required>
              <option value="">-- Pilih Barang --</option>
              @foreach($products as $prod)
                <option value="{{ $prod->id }}">{{ $prod->nama_barang }} (Stok saat ini: {{ $prod->stok }} {{ $prod->satuan }})</option>
              @endforeach
            </select>
          </div>
          <div class="mb-3">
            <label class="form-label">Jumlah Barang Masuk</label>
            <input type="number" name="jumlah" class="form-control" placeholder="Masukkan jumlah barang..." min="1" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Keterangan / Supplier / No. Nota Masuk</label>
            <textarea name="keterangan" class="form-control" rows="3" placeholder="Contoh: Restock Supplier Gianyar Komputer..."></textarea>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary"><i class="me-1 icon-sm" data-lucide="plus-circle"></i> Simpan Stok Masuk</button>
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
  <script src="{{ asset('build/plugins/select2/select2.min.js') }}"></script>
@endpush

@push('custom-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Inisialisasi DataTable
    $('#stockInTable').DataTable({
      "aLengthMenu": [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "Semua"]
      ],
      "iDisplayLength": 10,
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ data",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ log masuk",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 log masuk",
        "infoFiltered": "(disaring dari _MAX_ total log masuk)",
        "zeroRecords": "Tidak ada riwayat barang masuk ditemukan",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Berikutnya",
          "previous": "Sebelumnya"
        }
      },
      "order": [[0, "desc"]] // urutkan berdasarkan tanggal desc secara default
    });

    // 2. Inisialisasi Select2 di Modal (menangani input pencarian produk agar bisa difokuskan)
    $('.select2-modal').select2({
      dropdownParent: $('#addStockInModal'),
      width: '100%'
    });
  });
</script>
@endpush
