@extends('layout.master')

@push('plugin-styles')
  <link href="{{ asset('build/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
@endpush

@push('plugin-scripts')
  <script src="{{ asset('build/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
@endpush

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin mb-3">
  <div>
    <h4 class="mb-3 mb-md-0">Point of Sale (POS)</h4>
  </div>
</div>

<div class="row">
  <!-- Left Side: Catalog of Products -->
  <div class="col-md-7 grid-margin stretch-card">
    <div class="card">
      <div class="card-body d-flex flex-column h-100">
        <!-- Catalog Search and Filter Headers -->
        <div class="row mb-3">
          <div class="col-md-7">
            <div class="input-group">
              <span class="input-group-text bg-transparent border-end-0">
                <i data-lucide="search" class="icon-sm text-secondary"></i>
              </span>
              <input type="text" class="form-control border-start-0 ps-0" id="catalogSearch" placeholder="Cari nama barang...">
            </div>
          </div>
          <div class="col-md-5">
            <select class="form-select" id="catalogCategoryFilter">
              <option value="">Semua Kategori</option>
              @foreach($categories as $category)
                <option value="{{ $category }}">{{ $category }}</option>
              @endforeach
            </select>
          </div>
        </div>

        <!-- Catalog Products Container -->
        <div class="row g-2 overflow-y-auto" style="max-height: 450px;" id="productCatalog">
          @foreach($products as $product)
            <div class="col-sm-6 col-md-4 product-card-item" data-id="{{ $product->id }}" data-name="{{ strtolower($product->nama_barang) }}" data-category="{{ $product->kategori }}" data-price="{{ $product->harga_jual }}" data-stock="{{ $product->stok }}">
              <div class="card h-100 border border-secondary-subtle hover-shadow cursor-pointer transition-all product-clickable">
                <div class="card-body p-2 d-flex flex-column justify-content-between">
                  <div>
                    <span class="badge bg-secondary-subtle text-secondary fs-10px mb-1">{{ $product->kategori }}</span>
                    <h6 class="card-title fs-13px mb-1 text-truncate-2" title="{{ $product->nama_barang }}">{{ $product->nama_barang }}</h6>
                  </div>
                  <div class="mt-2">
                    <div class="d-flex justify-content-between align-items-baseline">
                      <strong class="text-primary fs-14px">Rp {{ number_format($product->harga_jual, 0, ',', '.') }}</strong>
                      <span class="fs-10px text-secondary">Stok: <strong class="stock-display">{{ $product->stok }}</strong></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <!-- Right Side: Shopping Cart -->
  <div class="col-md-5 grid-margin stretch-card">
    <div class="card border border-primary-subtle">
      <div class="card-body d-flex flex-column justify-content-between h-100">
        <div>
          <h5 class="card-title d-flex justify-content-between align-items-center mb-3">
            <span>Keranjang Belanja</span>
            <button class="btn btn-xs btn-outline-danger" id="clearCartBtn"><i class="icon-sm" data-lucide="trash-2"></i> Bersihkan</button>
          </h5>
          
          <!-- Cart Table Container -->
          <div class="table-responsive overflow-y-auto" style="max-height: 250px;">
            <table class="table align-middle table-sm">
              <thead>
                <tr>
                  <th>Barang</th>
                  <th width="100px">Qty</th>
                  <th>Subtotal</th>
                  <th width="40px"></th>
                </tr>
              </thead>
              <tbody id="cartTableBody">
                <tr id="emptyCartRow">
                  <td colspan="4" class="text-center py-4 text-secondary">Keranjang belanja kosong. Klik barang di katalog.</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>

        <!-- Cart Total Calculations & Checkout -->
        <div class="border-top pt-3 mt-3">
          <div class="d-flex justify-content-between mb-2">
            <span class="text-secondary">Subtotal</span>
            <strong id="cartSubtotal">Rp 0</strong>
          </div>
          <div class="d-flex justify-content-between mb-3 fs-5">
            <strong>Total Bayar</strong>
            <strong class="text-primary" id="cartTotal">Rp 0</strong>
          </div>

          <!-- Payment Input -->
          <div class="mb-3">
            <label class="form-label">Uang Bayar (Nominal Cash)</label>
            <div class="input-group">
              <span class="input-group-text">Rp</span>
              <input type="number" class="form-control form-control-lg fw-bold text-success fs-4" id="payAmount" min="0" placeholder="Masukkan nominal...">
            </div>
          </div>

          <div class="d-flex justify-content-between mb-3 fs-5" id="changeAmountContainer" style="display:none !important;">
            <strong>Kembalian</strong>
            <strong class="text-success" id="changeAmount">Rp 0</strong>
          </div>

          <button class="btn btn-primary btn-lg w-100 py-3" id="btnCheckout" disabled>
            <i class="me-1 icon-lg" data-lucide="credit-card"></i> PROSES TRANSAKSI
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Receipt Modal -->
<div class="modal fade" id="posReceiptModal" data-bs-backdrop="static" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Struk Penjualan</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" id="closeReceiptBtn"></button>
      </div>
      <div class="modal-body" id="posReceiptContent">
        <!-- Receipt template filled by JS -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="closeReceiptBtn2">Tutup</button>
        <button type="button" class="btn btn-primary" onclick="window.print()"><i data-lucide="printer" class="icon-sm me-1"></i> Cetak</button>
      </div>
    </div>
  </div>
</div>

@endsection

@push('custom-scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    let cart = [];
    const emptyRow = document.getElementById('emptyCartRow');
    const tableBody = document.getElementById('cartTableBody');
    const cartTotalDisplay = document.getElementById('cartTotal');
    const cartSubtotalDisplay = document.getElementById('cartSubtotal');
    const payAmountInput = document.getElementById('payAmount');
    const changeAmountDisplay = document.getElementById('changeAmount');
    const changeContainer = document.getElementById('changeAmountContainer');
    const btnCheckout = document.getElementById('btnCheckout');

    // 1. Search Catalog
    document.getElementById('catalogSearch').addEventListener('input', filterCatalog);
    document.getElementById('catalogCategoryFilter').addEventListener('change', filterCatalog);

    function filterCatalog() {
      const search = document.getElementById('catalogSearch').value.toLowerCase();
      const category = document.getElementById('catalogCategoryFilter').value;
      const items = document.querySelectorAll('.product-card-item');

      items.forEach(item => {
        const name = item.dataset.name;
        const cat = item.dataset.category;
        const matchesSearch = name.includes(search);
        const matchesCategory = category === "" || cat === category;

        if (matchesSearch && matchesCategory) {
          item.style.setProperty('display', 'block', 'important');
        } else {
          item.style.setProperty('display', 'none', 'important');
        }
      });
    }

    // 2. Click Catalog Product -> Add to Cart
    document.querySelectorAll('.product-clickable').forEach(card => {
      card.addEventListener('click', function() {
        const itemEl = this.closest('.product-card-item');
        const id = parseInt(itemEl.dataset.id);
        const name = itemEl.querySelector('.card-title').innerText;
        const price = parseFloat(itemEl.dataset.price);
        const stock = parseInt(itemEl.dataset.stock);

        // Check stock availability
        const existing = cart.find(x => x.product_id === id);
        const currentQty = existing ? existing.jumlah : 0;

        if (currentQty >= stock) {
          showNotification('Stok barang habis atau tidak mencukupi!', 'warning');
          return;
        }

        if (existing) {
          existing.jumlah += 1;
        } else {
          cart.push({
            product_id: id,
            nama_barang: name,
            harga_jual: price,
            jumlah: 1,
            max_stock: stock
          });
        }

        renderCart();
      });
    });

    // 3. Render Cart Items
    function renderCart() {
      if (cart.length === 0) {
        tableBody.innerHTML = '';
        tableBody.appendChild(emptyRow);
        cartTotalDisplay.innerText = 'Rp 0';
        cartSubtotalDisplay.innerText = 'Rp 0';
        payAmountInput.value = '';
        changeContainer.style.setProperty('display', 'none', 'important');
        btnCheckout.disabled = true;
        return;
      }

      // Remove empty row
      const existingEmpty = document.getElementById('emptyCartRow');
      if (existingEmpty) {
        existingEmpty.remove();
      }

      // Clear existing rows except empty row
      tableBody.querySelectorAll('tr:not(#emptyCartRow)').forEach(row => row.remove());

      let total = 0;

      cart.forEach((item, index) => {
        const subtotal = item.harga_jual * item.jumlah;
        total += subtotal;

        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td>
            <div class="fs-12px fw-bold text-truncate" style="max-width: 150px;">${item.nama_barang}</div>
            <small class="text-secondary">Rp ${item.harga_jual.toLocaleString('id-ID')}</small>
          </td>
          <td>
            <input type="number" class="form-control form-control-sm cart-qty-input" data-index="${index}" min="1" max="${item.max_stock}" value="${item.jumlah}" style="width: 65px;">
          </td>
          <td>Rp ${subtotal.toLocaleString('id-ID')}</td>
          <td>
            <button class="btn btn-link text-danger p-0 delete-cart-item" data-index="${index}"><i data-lucide="x" class="icon-sm"></i></button>
          </td>
        `;

        tableBody.appendChild(tr);
      });

      // Refresh lucide icons in dynamic elements
      lucide.createIcons();

      cartSubtotalDisplay.innerText = 'Rp ' + total.toLocaleString('id-ID');
      cartTotalDisplay.innerText = 'Rp ' + total.toLocaleString('id-ID');
      btnCheckout.disabled = false;

      // Recalculate change if paid amount is already set
      calculateChange(total);

      // Event listener for quantity changes
      document.querySelectorAll('.cart-qty-input').forEach(input => {
        input.addEventListener('change', function() {
          const idx = parseInt(this.dataset.index);
          let qty = parseInt(this.value);
          const max = parseInt(this.getAttribute('max'));

          if (isNaN(qty) || qty < 1) {
            qty = 1;
          } else if (qty > max) {
            qty = max;
            showNotification(`Stok maksimum tercapai: ${max}`, 'warning');
          }

          cart[idx].jumlah = qty;
          renderCart();
        });
      });

      // Event listener for item deletion
      document.querySelectorAll('.delete-cart-item').forEach(btn => {
        btn.addEventListener('click', function() {
          const idx = parseInt(this.dataset.index);
          cart.splice(idx, 1);
          renderCart();
        });
      });
    }

    // 4. Calculate Change
    payAmountInput.addEventListener('input', function() {
      const total = getCartTotal();
      calculateChange(total);
    });

    function getCartTotal() {
      return cart.reduce((acc, x) => acc + (x.harga_jual * x.jumlah), 0);
    }

    function calculateChange(total) {
      const pay = parseFloat(payAmountInput.value);
      if (!isNaN(pay) && pay >= total && total > 0) {
        const change = pay - total;
        changeAmountDisplay.innerText = 'Rp ' + change.toLocaleString('id-ID');
        changeContainer.style.setProperty('display', 'flex', 'important');
      } else {
        changeContainer.style.setProperty('display', 'none', 'important');
      }
    }

    // 5. Clear Cart
    document.getElementById('clearCartBtn').addEventListener('click', function() {
      cart = [];
      renderCart();
    });

    // 6. Checkout Process
    btnCheckout.addEventListener('click', function() {
      const total = getCartTotal();
      const pay = parseFloat(payAmountInput.value);

      if (isNaN(pay) || pay < total) {
        showNotification('Jumlah uang bayar tidak cukup atau belum diisi!', 'error');
        payAmountInput.focus();
        return;
      }

      // Send to server
      btnCheckout.disabled = true;
      btnCheckout.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span> MEMPROSES...';

      fetch('/pos/store', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
          items: cart,
          bayar: pay
        })
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          showNotification(data.message, 'success');
          
          // Display invoice details
          displayReceipt(data.data);

          // Update stock counts in view catalog
          data.data.transaction.details.forEach(detail => {
            const productCard = document.querySelector(`.product-card-item[data-id="${detail.product_id}"]`);
            if (productCard) {
              const currentStock = parseInt(productCard.dataset.stock);
              const newStock = currentStock - detail.jumlah;
              productCard.dataset.stock = newStock;
              productCard.querySelector('.stock-display').innerText = newStock;

              // Hide card if stock is 0
              if (newStock <= 0) {
                productCard.style.setProperty('display', 'none', 'important');
              }
            }
          });

          // Reset cart & forms
          cart = [];
          renderCart();
        } else {
          showNotification(data.message, 'error');
          resetCheckoutBtn();
        }
      })
      .catch(err => {
        showNotification('Terjadi kesalahan koneksi server.', 'error');
        resetCheckoutBtn();
      });
    });

    function resetCheckoutBtn() {
      btnCheckout.disabled = false;
      btnCheckout.innerHTML = '<i class="me-1 icon-lg" data-lucide="credit-card"></i> PROSES TRANSAKSI';
      lucide.createIcons();
    }

    function displayReceipt(data) {
      const trx = data.transaction;
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
        <div class="d-flex justify-content-between mb-1 fs-12px">
          <span>Subtotal</span>
          <span>Rp ${trx.total_harga.toLocaleString('id-ID')}</span>
        </div>
        <div class="d-flex justify-content-between mb-1 fs-12px fw-bold">
          <span>Bayar Cash</span>
          <span>Rp ${data.bayar.toLocaleString('id-ID')}</span>
        </div>
        <div class="d-flex justify-content-between mb-1 fs-12px text-success">
          <span>Kembalian</span>
          <span>Rp ${data.kembalian.toLocaleString('id-ID')}</span>
        </div>
        <hr>
        <div class="text-center mt-3 fs-12px">
          <p>Terima kasih atas kunjungan Anda!</p>
          <p>Barang yang sudah dibeli tidak dapat ditukar/dikembalikan.</p>
        </div>
      `;

      document.getElementById('posReceiptContent').innerHTML = receiptHtml;
      
      const modalElement = document.getElementById('posReceiptModal');
      const myModal = new bootstrap.Modal(modalElement);
      myModal.show();
    }

    // Refresh page when receipt modal is closed to refresh page states
    document.querySelectorAll('#closeReceiptBtn, #closeReceiptBtn2').forEach(btn => {
      btn.addEventListener('click', function() {
        resetCheckoutBtn();
      });
    });

    function showNotification(msg, type) {
      const icon = type === 'success' ? 'success' : (type === 'warning' ? 'warning' : 'error');
      const title = type === 'success' ? 'Berhasil' : (type === 'warning' ? 'Peringatan' : 'Gagal');
      Swal.fire({
        title: title,
        text: msg,
        icon: icon,
        confirmButtonColor: '#6610f2'
      });
    }
  });
</script>

<style>
  .hover-shadow:hover {
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
  }
  .cursor-pointer {
    cursor: pointer;
  }
  .transition-all {
    transition: all 0.2s ease-in-out;
  }
  .text-truncate-2 {
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;  
    overflow: hidden;
  }
  .product-clickable:active {
    transform: scale(0.95);
  }

  @media print {
    body * {
      visibility: hidden;
    }
    #posReceiptContent, #posReceiptContent * {
      visibility: visible;
    }
    #posReceiptContent {
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
    }
  }
</style>
@endpush
