<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Katalog Produk - BMC Computer Sukawati</title>
  
  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  
  <!-- Lucide Icons -->
  <script src="https://unpkg.com/lucide@latest"></script>
  
  <style>
    :root {
      --primary-blue: #1A56DB;
      --primary-blue-hover: #1E40AF;
      --accent-red: #E02424;
      --accent-red-hover: #C21D1D;
      --text-dark: #111827;
      --text-muted: #6B7280;
      --bg-light: #F8F9FA;
      --border-color: #E5E7EB;
      --font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
    }

    body {
      font-family: var(--font-family);
      color: var(--text-dark);
      background-color: #FFFFFF;
      overflow-x: hidden;
      scroll-behavior: smooth;
    }

    /* Navbar */
    .navbar {
      height: 80px;
      background-color: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(10px);
      border-bottom: 1px solid var(--border-color);
      transition: all 0.3s ease;
    }
    .navbar-brand .brand-title {
      font-weight: 800;
      font-size: 1.4rem;
      letter-spacing: -0.5px;
      color: var(--text-dark);
      margin-bottom: 0;
      line-height: 1.1;
      text-decoration: none;
    }
    .navbar-brand .brand-subtitle {
      font-size: 0.75rem;
      color: var(--primary-blue);
      font-weight: 600;
      letter-spacing: 0.5px;
      text-transform: uppercase;
    }
    .nav-link {
      font-weight: 500;
      color: var(--text-dark);
      transition: color 0.2s ease;
      font-size: 0.95rem;
    }
    .nav-link:hover, .nav-link.active {
      color: var(--primary-blue);
    }
    .btn-wa-nav {
      background-color: var(--primary-blue);
      color: white;
      font-weight: 600;
      border-radius: 50px;
      padding: 8px 20px;
      transition: all 0.2s ease;
      border: none;
    }
    .btn-wa-nav:hover {
      background-color: var(--primary-blue-hover);
      color: white;
      transform: translateY(-2px);
    }

    /* Hero Section */
    .catalog-hero {
      padding: 130px 0 60px 0;
      background: linear-gradient(135deg, #FFFFFF 0%, #EFF6FF 100%);
      border-bottom: 1px solid var(--border-color);
    }
    .hero-title {
      font-size: 2.5rem;
      font-weight: 800;
      letter-spacing: -1px;
      color: var(--text-dark);
      margin-bottom: 15px;
    }
    .hero-subtitle {
      font-size: 1.05rem;
      color: var(--text-muted);
      max-width: 700px;
      margin: 0 auto;
      line-height: 1.6;
    }

    /* Catalog Content */
    .catalog-section {
      padding: 60px 0 80px 0;
      background-color: var(--bg-light);
    }

    /* Product Card */
    .product-card {
      background-color: white;
      border: 1px solid var(--border-color);
      border-radius: 12px;
      overflow: hidden;
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      position: relative;
      height: 100%;
      display: flex;
      flex-direction: column;
    }
    .product-card:hover {
      transform: translateY(-8px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.08);
    }
    .product-img-wrapper {
      height: 200px;
      background-color: #F3F4F6;
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      color: var(--text-muted);
      overflow: hidden;
    }
    .product-img {
      transition: transform 0.3s ease-in-out;
    }
    .product-card:hover .product-img {
      transform: scale(1.08);
    }
    .badge-category {
      position: absolute;
      top: 15px;
      left: 15px;
      background-color: var(--primary-blue);
      color: white;
      font-weight: 600;
      font-size: 0.75rem;
      padding: 4px 12px;
      border-radius: 50px;
      z-index: 2;
    }
    .badge-promo {
      position: absolute;
      top: 15px;
      right: 15px;
      background-color: var(--accent-red);
      color: white;
      font-weight: 700;
      font-size: 0.72rem;
      padding: 4px 10px;
      border-radius: 4px;
      z-index: 2;
      letter-spacing: 0.3px;
      text-transform: uppercase;
    }
    .product-info-wrapper {
      padding: 20px;
      display: flex;
      flex-direction: column;
      flex-grow: 1;
    }
    .product-name {
      font-weight: 700;
      font-size: 1.05rem;
      margin-bottom: 6px;
      color: var(--text-dark);
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;  
      overflow: hidden;
      line-height: 1.4;
      min-height: 40px;
    }
    .product-desc {
      font-size: 0.85rem;
      color: var(--text-muted);
      margin-bottom: 18px;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;  
      overflow: hidden;
      line-height: 1.5;
      min-height: 38px;
    }
    .product-price-row {
      margin-top: auto;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin-bottom: 18px;
    }
    .price-label {
      font-size: 0.75rem;
      color: var(--text-muted);
      display: block;
      margin-bottom: 2px;
    }
    .btn-ask-wa {
      background-color: white;
      border: 1px solid var(--primary-blue);
      color: var(--primary-blue);
      font-weight: 600;
      width: 100%;
      border-radius: 8px;
      padding: 10px;
      font-size: 0.9rem;
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 6px;
      transition: all 0.2s ease;
      text-decoration: none;
    }
    .btn-ask-wa:hover {
      background-color: var(--primary-blue);
      color: white;
      border-color: var(--primary-blue);
    }

    /* Footer */
    footer {
      background-color: #111827;
      color: #9CA3AF;
      padding: 60px 0 30px 0;
      font-size: 0.9rem;
    }
    .footer-brand .brand-title {
      color: white;
      font-weight: 800;
      font-size: 1.3rem;
      margin-bottom: 4px;
    }
    .footer-brand .brand-subtitle {
      color: var(--primary-blue);
      font-weight: 600;
      font-size: 0.75rem;
      text-transform: uppercase;
      letter-spacing: 0.5px;
    }
    .footer-title {
      color: white;
      font-weight: 700;
      margin-bottom: 20px;
      font-size: 1rem;
    }
    .footer-links {
      list-style: none;
      padding-left: 0;
    }
    .footer-links li {
      margin-bottom: 10px;
    }
    .footer-links a {
      color: #9CA3AF;
      text-decoration: none;
      transition: color 0.2s ease;
    }
    .footer-links a:hover {
      color: white;
    }
    .footer-bottom {
      border-top: 1px solid #374151;
      padding-top: 30px;
      margin-top: 50px;
      font-size: 0.8rem;
    }

    @media (max-width: 991px) {
      .hero-title {
        font-size: 2rem;
      }
      .navbar {
        height: auto;
        padding: 15px 0;
      }
    }
  </style>
</head>
<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg fixed-top shadow-sm">
    <div class="container">
      <a class="navbar-brand d-flex flex-column text-decoration-none" href="{{ route('home') }}">
        <span class="brand-title">BMC Computer</span>
        <span class="brand-subtitle">Sukawati, Bali</span>
      </a>
      
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i data-lucide="menu" class="text-dark"></i>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1 gap-lg-3 mt-3 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="{{ route('catalog.index') }}">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}#keunggulan">Keunggulan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}#cara-beli">Cara Pembelian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('home') }}#tentang-kami">Tentang Kami</a>
          </li>
        </ul>
        <div class="d-flex align-items-center gap-3">
          <a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo%20BMC%20Computer%20Sukawati%2C%20saya%20ingin%20bertanya%20mengenai%20produk%20komputer." target="_blank" class="btn btn-wa-nav d-flex align-items-center gap-2">
            <i data-lucide="message-square" class="icon-sm"></i>
            <span>WhatsApp Kami</span>
          </a>
        </div>
      </div>
    </div>
  </nav>

  <!-- Hero Section -->
  <section class="catalog-hero text-center">
    <div class="container py-4">
      <h1 class="hero-title">Katalog Produk Elektronik</h1>
      <p class="hero-subtitle">Jelajahi seluruh koleksi laptop, aksesoris, hardware upgrade, printer, dan router berkualitas resmi yang kami sediakan untuk Anda.</p>
    </div>
  </section>

  <!-- Catalog Content Section -->
  <section class="catalog-section">
    <div class="container">
      
      <!-- Search & Filter Controls -->
      <form id="catalogFilterForm" class="card mb-5 border-0 shadow-sm">
        <div class="card-body p-4">
          <div class="row g-3 align-items-center">
            <div class="col-md-6">
              <div class="input-group">
                <span class="input-group-text bg-transparent border-end-0">
                  <i data-lucide="search" class="icon-sm text-secondary"></i>
                </span>
                <input type="text" class="form-control border-start-0 ps-0" id="catalogSearch" placeholder="Cari nama barang..." value="">
              </div>
            </div>
            <div class="col-md-4">
              <select class="form-select" id="catalogCategoryFilter">
                <option value="">Semua Kategori</option>
                @foreach($categories as $cat)
                  <option value="{{ $cat }}">{{ $cat }}</option>
                @endforeach
              </select>
            </div>
            <div class="col-md-2 d-grid gap-2">
              <a href="#" class="btn btn-outline-secondary w-100" id="btnResetFilters">Reset</a>
            </div>
          </div>
        </div>
      </form>

      <!-- Products Grid -->
      <div class="row g-4" id="productGrid">
        @forelse($products as $product)
          @php
            // Map categories for landing design look
            $catLower = strtolower($product->kategori);
            $filterClass = 'aksesoris';
            if (str_contains($catLower, 'laptop')) {
                $filterClass = 'laptop';
            } elseif (str_contains($catLower, 'pc') || str_contains($catLower, 'komponen') || str_contains($catLower, 'sparepart') || str_contains($catLower, 'penyimpanan') || str_contains($catLower, 'monitor')) {
                $filterClass = 'pc-komponen';
            } elseif (str_contains($catLower, 'printer')) {
                $filterClass = 'printer';
            } elseif (str_contains($catLower, 'jaringan') || str_contains($catLower, 'wifi') || str_contains($catLower, 'router')) {
                $filterClass = 'jaringan';
            }

            // Map Icons
            $lucideIcon = 'package';
            if ($filterClass == 'laptop') {
                $lucideIcon = 'laptop';
            } elseif ($filterClass == 'pc-komponen') {
                if (str_contains($catLower, 'monitor')) {
                    $lucideIcon = 'monitor';
                } elseif (str_contains($catLower, 'ram') || str_contains($catLower, 'ssd') || str_contains($catLower, 'penyimpanan')) {
                    $lucideIcon = 'cpu';
                } else {
                    $lucideIcon = 'hard-drive';
                }
            } elseif ($filterClass == 'aksesoris') {
                if (str_contains($catLower, 'keyboard')) {
                    $lucideIcon = 'keyboard';
                } elseif (str_contains($catLower, 'mouse')) {
                    $lucideIcon = 'mouse';
                } else {
                    $lucideIcon = 'headphones';
                }
            } elseif ($filterClass == 'printer') {
                $lucideIcon = 'printer';
            } elseif ($filterClass == 'jaringan') {
                $lucideIcon = 'wifi';
            }

            // WhatsApp link
            $waMessage = "Halo BMC Computer, saya tertarik dengan produk " . $product->nama_barang . ". Apakah stoknya tersedia dan bisa info detail lebih lanjut?";
            $waUrl = "https://api.whatsapp.com/send?phone=6281234567890&text=" . urlencode($waMessage);
            $defaultDesc = "Produk berkualitas tinggi bergaransi resmi untuk kebutuhan Anda.";
          @endphp
          
          <div class="col-sm-6 col-md-4 col-lg-3 product-card-item" data-name="{{ strtolower($product->nama_barang) }}" data-category="{{ $product->kategori }}">
            <div class="product-card">
              <div class="product-img-wrapper bg-white">
                <span class="badge-category">{{ $product->kategori }}</span>
                @if($product->stok <= 3 && $product->stok > 0)
                  <span class="badge-promo bg-danger">Stok Tipis</span>
                @elseif($product->stok == 0)
                  <span class="badge-promo bg-secondary">Habis</span>
                @endif
                
                @if($product->gambar)
                  <img src="{{ asset('storage/' . $product->gambar) }}" alt="{{ $product->nama_barang }}" class="img-fluid w-100 h-100 p-2 product-img" style="object-fit: contain; transition: transform 0.3s ease-in-out;">
                @else
                  <i data-lucide="{{ $lucideIcon }}" style="width: 55px; height: 55px; opacity: 0.4;"></i>
                @endif
              </div>
              <div class="product-info-wrapper">
                <h5 class="product-name" title="{{ $product->nama_barang }}">{{ $product->nama_barang }}</h5>
                <p class="product-desc" title="{{ $product->deskripsi ?: $defaultDesc }}">{{ $product->deskripsi ?: $defaultDesc }}</p>
                <div class="product-price-row">
                  <div>
                    <span class="price-label">Status Stok</span>
                    <span class="badge {{ $product->stok > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} fs-11px">
                      {{ $product->stok > 0 ? 'Tersedia' : 'Hubungi WA' }}
                    </span>
                  </div>
                </div>
                
                <a href="{{ $waUrl }}" target="_blank" class="btn btn-ask-wa">
                  <i data-lucide="message-circle" class="icon-sm"></i>
                  <span>Tanya via WhatsApp</span>
                </a>
              </div>
            </div>
          </div>
        @empty
          <div class="col-12 py-5 text-center text-secondary" id="noProductsMsg">
            <i data-lucide="alert-circle" class="icon-lg mb-2"></i>
            <h5>Produk Tidak Ditemukan</h5>
            <p>Silakan gunakan kata kunci atau kategori lain.</p>
          </div>
        @endforelse
      </div>

      <!-- Client-side Pagination Links -->
      <div id="catalogPagination" class="d-flex justify-content-center mt-5"></div>
      
    </div>
  </section>

  <!-- Footer -->
  <footer>
    <div class="container">
      <div class="row g-4">
        <div class="col-md-5">
          <div class="footer-brand mb-4">
            <div class="brand-title">BMC Computer</div>
            <div class="brand-subtitle">Sukawati, Bali</div>
          </div>
          <p class="mb-4 text-secondary">Pusat penjualan perangkat komputer, laptop, perakitan PC, upgrade hardware, printer, wifi, dan aksesoris elektronik original bergaransi resmi.</p>
          <p class="mb-0 text-white"><i data-lucide="message-square" class="icon-sm me-2 text-primary"></i> 6281234567890</p>
        </div>
        
        <div class="col-md-3 ms-md-auto">
          <h5 class="footer-title">Jam Operasional</h5>
          <ul class="footer-links">
            <li>Senin – Sabtu: 09.00 – 21.00 WITA</li>
            <li>Minggu & Tanggal Merah: Libur</li>
          </ul>
        </div>
        
        <div class="col-md-3">
          <h5 class="footer-title">Link Cepat</h5>
          <ul class="footer-links">
            <li><a href="{{ route('home') }}">Beranda</a></li>
            <li><a href="{{ route('catalog.index') }}">Katalog</a></li>
            <li><a href="{{ route('home') }}#keunggulan">Keunggulan</a></li>
            <li><a href="{{ route('home') }}#cara-beli">Cara Pembelian</a></li>
            <li><a href="{{ route('home') }}#tentang-kami">Tentang Kami</a></li>
          </ul>
        </div>
      </div>
      
      <div class="footer-bottom text-center">
        <p class="mb-0">Copyright &copy; 2025 BMC Computer Sukawati. All rights reserved.</p>
      </div>
    </div>
  </footer>

  <!-- JS Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
      // Initialize Lucide Icons
      lucide.createIcons();

      const itemsPerPage = 16;
      let currentPage = 1;
      let currentCategory = '';
      let searchQuery = '';

      const searchInput = document.getElementById('catalogSearch');
      const categorySelect = document.getElementById('catalogCategoryFilter');
      const filterForm = document.getElementById('catalogFilterForm');
      const resetBtn = document.getElementById('btnResetFilters');
      
      const productCards = document.querySelectorAll('.product-card-item');
      const paginationContainer = document.getElementById('catalogPagination');
      const containerTop = document.getElementById('productGrid');

      function filterAndPaginate() {
        let matchingCards = [];
        
        productCards.forEach(card => {
          const name = card.getAttribute('data-name');
          const category = card.getAttribute('data-category');
          
          const matchesSearch = name.includes(searchQuery);
          const matchesCategory = !currentCategory || category === currentCategory;

          if (matchesSearch && matchesCategory) {
            matchingCards.push(card);
            card.style.display = 'none';
          } else {
            card.style.display = 'none';
          }
        });

        const totalItems = matchingCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        if (currentPage > totalPages) currentPage = totalPages || 1;
        if (currentPage < 1) currentPage = 1;

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Show matching items for current page
        for (let i = startIndex; i < endIndex; i++) {
          matchingCards[i].style.display = 'block';
        }

        // Empty state
        const noProductsMsg = document.getElementById('noProductsMsg');
        if (totalItems === 0) {
          if (!noProductsMsg) {
            const emptyDiv = document.createElement('div');
            emptyDiv.id = 'noProductsMsg';
            emptyDiv.className = 'col-12 py-5 text-center text-secondary';
            emptyDiv.innerHTML = `<i data-lucide="alert-circle" class="icon-lg mb-2"></i><h5>Produk Tidak Ditemukan</h5><p>Silakan gunakan kata kunci atau kategori lain.</p>`;
            containerTop.appendChild(emptyDiv);
            if (typeof lucide !== 'undefined') lucide.createIcons();
          } else {
            noProductsMsg.style.display = 'block';
          }
        } else {
          if (noProductsMsg) noProductsMsg.style.display = 'none';
        }

        renderPagination(totalPages);
      }

      function renderPagination(totalPages) {
        if (!paginationContainer) return;
        paginationContainer.innerHTML = '';

        if (totalPages <= 1) return;

        const ul = document.createElement('ul');
        ul.className = 'pagination';

        // Prev Button
        const prevLi = document.createElement('li');
        prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
        prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
        if (currentPage > 1) {
          prevLi.addEventListener('click', function(e) {
            e.preventDefault();
            currentPage--;
            filterAndPaginate();
            containerTop.scrollIntoView({ behavior: 'smooth' });
          });
        }
        ul.appendChild(prevLi);

        // Numbers
        for (let i = 1; i <= totalPages; i++) {
          const li = document.createElement('li');
          li.className = `page-item ${currentPage === i ? 'active' : ''}`;
          li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
          li.addEventListener('click', function(e) {
            e.preventDefault();
            currentPage = i;
            filterAndPaginate();
            containerTop.scrollIntoView({ behavior: 'smooth' });
          });
          ul.appendChild(li);
        }

        // Next Button
        const nextLi = document.createElement('li');
        nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
        nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
        if (currentPage < totalPages) {
          nextLi.addEventListener('click', function(e) {
            e.preventDefault();
            currentPage++;
            filterAndPaginate();
            containerTop.scrollIntoView({ behavior: 'smooth' });
          });
        }
        ul.appendChild(nextLi);

        paginationContainer.appendChild(ul);
      }

      // Event listeners
      if (searchInput) {
        searchInput.addEventListener('input', function() {
          searchQuery = this.value.toLowerCase().trim();
          currentPage = 1;
          filterAndPaginate();
        });
      }

      if (categorySelect) {
        categorySelect.addEventListener('change', function() {
          currentCategory = this.value;
          currentPage = 1;
          filterAndPaginate();
        });
      }

      // Handle form submit prevention
      if (filterForm) {
        filterForm.addEventListener('submit', function(e) {
          e.preventDefault(); // prevent reload on enter
        });
      }

      // Reset button click
      if (resetBtn) {
        resetBtn.addEventListener('click', function(e) {
          e.preventDefault();
          if (searchInput) searchInput.value = '';
          if (categorySelect) categorySelect.value = '';
          searchQuery = '';
          currentCategory = '';
          currentPage = 1;
          filterAndPaginate();
        });
      }

      // Initial run
      filterAndPaginate();
    });
  </script>
</body>
</html>
