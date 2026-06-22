@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('build/plugins/datatables.net-bs5/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
  <div>
    <h4 class="mb-3 mb-md-0">Laporan Penjualan Toko</h4>
  </div>
  <div class="d-flex gap-2">
    <button type="button" class="btn btn-outline-primary" id="btnExportCSV">
      <i class="me-1 icon-sm" data-lucide="file-spreadsheet"></i> Ekspor Excel/CSV
    </button>
    <button type="button" class="btn btn-primary" onclick="window.print()">
      <i class="me-1 icon-sm" data-lucide="printer"></i> Cetak Laporan
    </button>
  </div>
</div>

<div class="row">
  <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        
        <!-- Range Filter Form -->
        <form method="GET" action="{{ route('reports.index') }}" class="row g-3 mb-4 d-print-none">
          <div class="col-md-4">
            <label class="form-label">Tanggal Mulai</label>
            <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
          </div>
          <div class="col-md-4">
            <label class="form-label">Tanggal Akhir</label>
            <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
          </div>
          <div class="col-md-4 d-flex align-items-end gap-2">
            <button type="submit" class="btn btn-secondary w-100"><i class="me-1 icon-sm" data-lucide="eye"></i> Tampilkan Laporan</button>
            <a href="{{ route('reports.index') }}" class="btn btn-outline-secondary w-100"><i class="me-1 icon-sm" data-lucide="rotate-ccw"></i> Reset</a>
          </div>
        </form>

        <!-- Stats Overview -->
        <div class="row mb-4">
          <div class="col-md-6 mb-3 mb-md-0">
            <div class="p-3 bg-light border rounded">
              <span class="text-secondary fs-12px uppercase fw-bold">Total Pendapatan (Omset)</span>
              <h3 class="text-success mt-1">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</h3>
            </div>
          </div>
          <div class="col-md-6">
            <div class="p-3 bg-light border rounded">
              <span class="text-secondary fs-12px uppercase fw-bold">Total Transaksi</span>
              <h3 class="text-primary mt-1">{{ $totalTransactions }} Transaksi</h3>
            </div>
          </div>
        </div>

        <div class="d-none d-print-block text-center mb-4">
          <h3>BMC Computer Sukawati</h3>
          <h5>Laporan Transaksi Penjualan</h5>
          <p>Periode: <strong>{{ \Carbon\Carbon::parse($startDate)->translatedFormat('d F Y') }}</strong> s/d <strong>{{ \Carbon\Carbon::parse($endDate)->translatedFormat('d F Y') }}</strong></p>
          <hr>
        </div>

        <!-- Transactions Table -->
        <h6 class="card-title mb-3">Daftar Transaksi</h6>
        <div class="table-responsive">
          <table class="table table-striped align-middle" id="reportsTable">
            <thead>
              <tr>
                <th>No. Transaksi</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Item Terjual</th>
                <th class="text-end">Total Harga</th>
              </tr>
            </thead>
            <tbody>
              @foreach($transactions as $trx)
                <tr>
                  <td><strong class="text-primary">{{ $trx->no_transaksi }}</strong></td>
                  <td>{{ $trx->tanggal }}</td>
                  <td>{{ $trx->user->name ?? '-' }}</td>
                  <td>
                    <div class="fs-12px text-secondary" style="max-width: 400px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                      @foreach($trx->details as $detail)
                        {{ $detail->product->nama_barang ?? 'Produk Dihapus' }} (x{{ $detail->jumlah }}){{ !$loop->last ? ', ' : '' }}
                      @endforeach
                    </div>
                  </td>
                  <td class="text-end fw-bold text-dark">Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

      </div>
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
    // 1. Initialize DataTable
    const reportsTable = $('#reportsTable').DataTable({
      "aLengthMenu": [
        [10, 25, 50, 100, -1],
        [10, 25, 50, 100, "Semua"]
      ],
      "iDisplayLength": 10,
      "language": {
        "search": "Cari:",
        "lengthMenu": "Tampilkan _MENU_ data",
        "info": "Menampilkan _START_ sampai _END_ dari _TOTAL_ transaksi",
        "infoEmpty": "Menampilkan 0 sampai 0 dari 0 transaksi",
        "infoFiltered": "(disaring dari _MAX_ total transaksi)",
        "zeroRecords": "Tidak ada transaksi ditemukan",
        "paginate": {
          "first": "Pertama",
          "last": "Terakhir",
          "next": "Berikutnya",
          "previous": "Sebelumnya"
        }
      },
      "order": [[1, "desc"]] // Sort by date desc by default
    });

    // 2. CSV Export functionality (supporting DataTables pagination)
    document.getElementById('btnExportCSV').addEventListener('click', function() {
      const rows = [];
      
      // Get headers
      const headers = [];
      document.querySelectorAll('#reportsTable thead th').forEach(th => {
        headers.push(th.innerText);
      });
      rows.push(headers.join(','));

      // Get all row nodes from DataTable (including paginated out rows)
      const trs = reportsTable.rows().nodes();
      
      if (trs.length === 0) {
        Swal.fire({
          title: 'Gagal',
          text: 'Tidak ada data transaksi untuk diekspor!',
          icon: 'error',
          confirmButtonColor: '#6610f2'
        });
        return;
      }

      trs.forEach(tr => {
        const row = [];
        tr.querySelectorAll('td').forEach((td, index) => {
          let text = td.innerText.trim().replace(/"/g, '""'); // escape quotes
          
          // Clean commas out of currency numbers to prevent column splitting
          if (index === 4) {
            text = text.replace(/[^0-9]/g, ''); // keep only numbers
          }
          
          row.push(`"${text}"`);
        });
        rows.push(row.join(','));
      });

      const csvContent = "data:text/csv;charset=utf-8,\uFEFF" + rows.join("\n");
      const encodedUri = encodeURI(csvContent);
      const link = document.createElement("a");
      link.setAttribute("href", encodedUri);
      
      const start = '{{ $startDate }}';
      const end = '{{ $endDate }}';
      link.setAttribute("download", `laporan_penjualan_${start}_to_${end}.csv`);
      document.body.appendChild(link);
      link.click();
      document.body.removeChild(link);
    });
  });
</script>

<style>
  @media print {
    .d-print-none, .navbar, .sidebar, .footer {
      display: none !important;
    }
    .page-wrapper {
      margin: 0 !important;
      padding: 0 !important;
    }
    .page-content {
      padding: 0 !important;
    }
    .card {
      border: none !important;
    }
    .card-body {
      padding: 0 !important;
    }
  }
</style>
@endpush
