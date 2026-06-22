@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('build/plugins/datatables.net-bs5/dataTables.bootstrap5.min.css') }}" rel="stylesheet" />
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
  <div>
    <h4 class="mb-3 mb-md-0">Dashboard</h4>
  </div>
  <div class="d-flex align-items-center flex-wrap text-nowrap">
    <span class="badge bg-secondary p-2 fs-6">
      <i class="me-1 icon-sm" data-lucide="clock"></i> 
      Hari Ini: {{ \Carbon\Carbon::today()->translatedFormat('d F Y') }}
    </span>
  </div>
</div>

<!-- Stats Cards -->
<div class="row">
  <div class="col-12 col-xl-12 stretch-card mb-4">
    <div class="row flex-grow-1">
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-primary text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0 text-white">Penjualan Hari Ini</h6>
            </div>
            <div class="row mt-3">
              <div class="col-8 col-md-12 col-xl-8">
                <h3 class="mb-2 text-white">{{ $salesCountToday }}</h3>
                <p class="text-white-50">Transaksi sukses</p>
              </div>
              <div class="col-4 col-md-12 col-xl-4 text-end">
                <i class="icon-xxl text-white-50" data-lucide="shopping-bag"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-success text-white">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0 text-white">Pendapatan Hari Ini</h6>
            </div>
            <div class="row mt-3">
              <div class="col-8 col-md-12 col-xl-8">
                <h3 class="mb-2 text-white">Rp {{ number_format($revenueToday, 0, ',', '.') }}</h3>
                <p class="text-white-50">Total kas masuk</p>
              </div>
              <div class="col-4 col-md-12 col-xl-4 text-end">
                <i class="icon-xxl text-white-50" data-lucide="dollar-sign"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4 grid-margin stretch-card">
        <div class="card bg-warning text-dark">
          <div class="card-body">
            <div class="d-flex justify-content-between align-items-baseline">
              <h6 class="card-title mb-0 text-dark">Produk Stok Rendah</h6>
            </div>
            <div class="row mt-3">
              <div class="col-8 col-md-12 col-xl-8">
                <h3 class="mb-2 text-dark">{{ $lowStockCount }}</h3>
                <p class="text-dark-50">Perlu segera restock</p>
              </div>
              <div class="col-4 col-md-12 col-xl-4 text-end">
                <i class="icon-xxl text-dark-50" data-lucide="alert-triangle"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <!-- Chart Section -->
  <div class="col-lg-8 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-2">
          <h6 class="card-title mb-0">Grafik Penjualan Bulanan (Rp)</h6>
        </div>
        <p class="text-secondary fs-12px mb-4">Total penjualan per hari dalam bulan {{ \Carbon\Carbon::now()->translatedFormat('F Y') }}</p>
        <div class="chart-container" style="position: relative; height: 300px;">
          <canvas id="salesChart"></canvas>
        </div>
      </div>
    </div>
  </div>

  <!-- Low Stock Alert Cards -->
  <div class="col-lg-4 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <h6 class="card-title mb-3">Notifikasi Stok Menipis</h6>
        @if($lowStockProducts->isEmpty())
          <div class="text-center py-4">
            <i class="text-success icon-xxl mb-2" data-lucide="check-circle"></i>
            <p class="text-secondary">Semua stok barang aman.</p>
          </div>
        @else
          <div class="list-group list-group-flush" style="max-height: 300px; overflow-y: auto;">
            @foreach($lowStockProducts as $product)
              <div class="list-group-item px-0 py-2.5 d-flex justify-content-between align-items-center border-0 border-bottom">
                <div class="pe-2" style="max-width: 70%;">
                  <h6 class="mb-1 text-wrap text-body fw-semibold" style="font-size: 13px; line-height: 1.4;">{{ $product->nama_barang }}</h6>
                  <small class="text-secondary">
                    Sisa Stok: <strong class="text-danger fw-bold">{{ $product->stok }} {{ $product->satuan }}</strong>
                  </small>
                </div>
                <div class="text-end d-flex flex-column align-items-end gap-1 flex-shrink-0" style="min-width: 80px;">
                  <span class="badge bg-danger" style="font-size: 10px; padding: 3px 6px;">Min: {{ $product->stok_minimum }}</span>
                  <a href="{{ route('stock-in.index') }}" class="btn btn-xs btn-outline-primary py-0.5 px-2 mt-1" style="font-size: 11px;">Restock</a>
                </div>
              </div>
            @endforeach
          </div>
        @endif
      </div>
    </div>
  </div>
</div>

<!-- Recent Transactions -->
<div class="row">
  <div class="col-md-12 stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="d-flex justify-content-between align-items-baseline mb-4">
          <h6 class="card-title mb-0">Transaksi Terbaru</h6>
        </div>
        <div class="table-responsive">
          <table id="recentTransactionsTable" class="table table-hover mb-0">
            <thead>
              <tr>
                <th>No. Transaksi</th>
                <th>Tanggal</th>
                <th>Kasir</th>
                <th>Total Harga</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>
              @foreach($recentTransactions as $trx)
                <tr>
                  <td><strong class="text-primary">{{ $trx->no_transaksi }}</strong></td>
                  <td>{{ $trx->tanggal }}</td>
                  <td>{{ $trx->user->name ?? '-' }}</td>
                  <td>Rp {{ number_format($trx->total_harga, 0, ',', '.') }}</td>
                  <td>
                    <button class="btn btn-xs btn-outline-info print-invoice-btn" data-trx="{{ json_encode($trx->load('details.product')) }}">
                      <i class="icon-sm" data-lucide="printer"></i> Cetak Struk
                    </button>
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

<!-- Receipt Printing Modal (Hidden from screen view, only active on print) -->
<div class="modal fade" id="receiptModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Struk Transaksi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" id="receiptContent">
        <!-- Dynmically filled receipt -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="window.print()">Cetak</button>
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
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    // 1. Chart.js Inisialisasi
    const ctx = document.getElementById('salesChart').getContext('2d');
    const chartLabels = {!! json_encode($chartLabels) !!};
    const chartValues = {!! json_encode($chartValues) !!};

    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: chartLabels,
        datasets: [{
          label: 'Pendapatan Harian (Rp)',
          data: chartValues,
          backgroundColor: 'rgba(225, 29, 72, 0.7)',
          borderColor: 'rgb(225, 29, 72)',
          borderWidth: 1,
          borderRadius: 4,
        }]
      },
      options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
          legend: {
            display: false
          }
        },
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              callback: function(value, index, values) {
                return 'Rp ' + value.toLocaleString('id-ID');
              }
            }
          }
        }
      }
    });

    // 2. Receipt printing functionality
    const printBtns = document.querySelectorAll('.print-invoice-btn');
    printBtns.forEach(btn => {
      btn.addEventListener('click', function() {
        const trx = JSON.parse(this.dataset.trx);
        
        let detailsHtml = '';
        trx.details.forEach(item => {
          detailsHtml += `
            <div class="d-flex justify-content-between mb-1 fs-12px">
              <div>${item.product.nama_barang} x ${item.jumlah}</div>
              <div>Rp ${(item.harga_satuan * item.jumlah).toLocaleString('id-ID')}</div>
            </div>
          `;
        });

        const receiptHtml = `
          <div class="text-center mb-3">
            <h6 class="fw-bold">BMC Computer Sukawati</h6>
            <div class="fs-12px">Sukawati, Gianyar, Bali</div>
            <div class="fs-12px">Telp: 0812-3456-7890</div>
            <hr>
          </div>
          <div class="fs-12px mb-2">
            <div><strong>No:</strong> ${trx.no_transaksi}</div>
            <div><strong>Tanggal:</strong> ${new Date(trx.tanggal).toLocaleString('id-ID')}</div>
            <div><strong>Kasir:</strong> ${trx.user ? trx.user.name : '-'}</div>
          </div>
          <hr>
          <div class="mb-2">
            ${detailsHtml}
          </div>
          <hr>
          <div class="d-flex justify-content-between fw-bold mb-2">
            <div>TOTAL</div>
            <div>Rp ${trx.total_harga.toLocaleString('id-ID')}</div>
          </div>
          <hr>
          <div class="text-center mt-3 fs-12px">
            <p>Terima kasih atas kunjungan Anda!</p>
            <p>Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.</p>
          </div>
        `;

        document.getElementById('receiptContent').innerHTML = receiptHtml;
        const myModal = new bootstrap.Modal(document.getElementById('receiptModal'));
        myModal.show();
      });
    });

    // 3. DataTable Inisialisasi
    $('#recentTransactionsTable').DataTable({
      "aLengthMenu": [
        [5, 10, 25, 50, -1],
        [5, 10, 25, 50, "Semua"]
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
      "order": [[1, "desc"]] // default sorting by tanggal desc
    });
  });
</script>

<style>
  @media print {
    body * {
      visibility: hidden;
    }
    #receiptContent, #receiptContent * {
      visibility: visible;
    }
    #receiptContent {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
    }
  }
</style>
@endpush