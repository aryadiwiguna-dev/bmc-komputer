<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>BMC Computer Sukawati - Perangkat Komputer & Aksesoris Terlengkap</title>
  <meta name="description" content="BMC Computer Sukawati menyediakan laptop, komputer rakitan, hardware upgrade, printer, router, dan aksesoris original berkualitas tinggi dengan garansi resmi. Siap kirim cepat ke seluruh Bali.">
  
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
      --primary-red: #E11D48;          /* Soft rose red */
      --primary-red-hover: #BE123C;    /* Deeper rose red for hover */
      --primary-red-light: #FFF1F2;    /* Very soft pink/rose bg tint */
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

    /* Bootstrap color overrides */
    .text-primary {
      color: var(--primary-red) !important;
    }
    .bg-primary {
      background-color: var(--primary-red) !important;
    }
    .btn-primary {
      background-color: var(--primary-red) !important;
      border-color: var(--primary-red) !important;
    }
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
      background-color: var(--primary-red-hover) !important;
      border-color: var(--primary-red-hover) !important;
    }
    .pagination .page-item.active .page-link {
      background-color: var(--primary-red) !important;
      border-color: var(--primary-red) !important;
      color: white !important;
    }
    .pagination .page-link {
      color: var(--primary-red);
    }
    .pagination .page-link:hover {
      color: var(--primary-red-hover);
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
    }
    .navbar-brand .brand-subtitle {
      font-size: 0.75rem;
      color: var(--primary-red);
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
    .nav-link:hover {
      color: var(--primary-red);
    }
    .btn-wa-nav {
      background-color: var(--primary-red);
      color: white;
      font-weight: 600;
      border-radius: 50px;
      padding: 8px 20px;
      transition: all 0.2s ease;
      border: none;
    }
    .btn-wa-nav:hover {
      background-color: var(--primary-red-hover);
      color: white;
      transform: translateY(-2px);
    }

    /* Hero Section */
    .hero-section {
      padding: 120px 0 80px 0;
      background: linear-gradient(135deg, #FFFFFF 0%, var(--primary-red-light) 100%);
      position: relative;
    }
    .hero-title {
      font-size: 3rem;
      font-weight: 800;
      line-height: 1.15;
      letter-spacing: -1.5px;
      color: var(--text-dark);
      margin-bottom: 20px;
    }
    .hero-subtitle {
      font-size: 1.15rem;
      color: var(--text-muted);
      margin-bottom: 35px;
      line-height: 1.6;
    }
    .btn-hero-catalog {
      background-color: var(--primary-red);
      color: white;
      font-weight: 700;
      border-radius: 50px;
      padding: 14px 30px;
      transition: all 0.2s ease;
      border: none;
      box-shadow: 0 4px 14px rgba(225, 29, 72, 0.25);
    }
    .btn-hero-catalog:hover {
      background-color: var(--primary-red-hover);
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(225, 29, 72, 0.35);
    }
    .btn-hero-wa {
      background-color: #25D366;
      color: white;
      font-weight: 700;
      border-radius: 50px;
      padding: 14px 30px;
      transition: all 0.2s ease;
      border: none;
      box-shadow: 0 4px 14px rgba(37, 211, 102, 0.3);
    }
    .btn-hero-wa:hover {
      background-color: #1ebd57;
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 6px 20px rgba(37, 211, 102, 0.4);
    }

    /* Hero Image Animation & Glow */
    .hero-image-card {
      transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }
    .hero-image-card:hover {
      transform: translateY(-8px) scale(1.02);
      box-shadow: 0 20px 40px rgba(225, 29, 72, 0.25) !important;
    }

    /* Keunggulan Kami */
    .features-section {
      padding: 80px 0;
      border-bottom: 1px solid var(--border-color);
    }
    .feature-card {
      padding: 30px;
      background-color: #FFFFFF;
      border: 1px solid var(--border-color);
      border-radius: 16px;
      transition: all 0.3s ease;
      height: 100%;
    }
    .feature-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.05);
      border-color: rgba(225, 29, 72, 0.2);
    }
    .feature-icon-wrapper {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      background-color: rgba(225, 29, 72, 0.08);
      display: flex;
      align-items: center;
      justify-content: center;
      color: var(--primary-red);
      margin-bottom: 20px;
    }
    .feature-title {
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 10px;
      color: var(--text-dark);
    }
    .feature-desc {
      color: var(--text-muted);
      font-size: 0.9rem;
      line-height: 1.5;
      margin-bottom: 0;
    }

    /* Katalog */
    .catalog-section {
      padding: 80px 0;
      background-color: var(--bg-light);
    }
    .section-header {
      margin-bottom: 50px;
      text-align: center;
    }
    .section-title {
      font-weight: 800;
      font-size: 2.2rem;
      letter-spacing: -0.8px;
      margin-bottom: 15px;
    }
    .section-subtitle {
      color: var(--text-muted);
      max-width: 600px;
      margin: 0 auto;
    }
    
    /* Filter Pills */
    .filter-pills-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
      gap: 10px;
      margin-bottom: 40px;
    }
    .filter-btn {
      border: 1px solid var(--border-color);
      background-color: white;
      color: var(--text-dark);
      font-weight: 600;
      padding: 8px 24px;
      border-radius: 50px;
      transition: all 0.2s ease;
      font-size: 0.9rem;
    }
    .filter-btn:hover {
      border-color: var(--primary-red);
      color: var(--primary-red);
    }
    .filter-btn.active {
      background-color: var(--primary-red);
      color: white;
      border-color: var(--primary-red);
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
    .product-card:hover .product-img {
      transform: scale(1.08) !important;
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
    .badge-category {
      position: absolute;
      top: 15px;
      left: 15px;
      background-color: var(--primary-red);
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
      -webkit-line-clamp: 1;
      -webkit-box-orient: vertical;  
      overflow: hidden;
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
    .price-value {
      font-weight: 800;
      color: var(--primary-red);
      font-size: 1.25rem;
    }
    .btn-ask-wa {
      background-color: white;
      border: 1px solid var(--primary-red);
      color: var(--primary-red);
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
    }
    .btn-ask-wa:hover {
      background-color: var(--primary-red);
      color: white;
      border-color: var(--primary-red);
    }

    /* Cara Pembelian */
    .steps-section {
      padding: 80px 0;
    }
    .step-card {
      text-align: center;
      position: relative;
      padding: 20px;
    }
    .step-number-bubble {
      width: 60px;
      height: 60px;
      border-radius: 50%;
      background-color: rgba(225, 29, 72, 0.08);
      color: var(--primary-red);
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 24px auto;
      font-size: 1.4rem;
      font-weight: 800;
    }
    .step-title {
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 10px;
    }
    .step-desc {
      color: var(--text-muted);
      font-size: 0.9rem;
      line-height: 1.5;
    }

    /* Tentang Kami */
    .about-section {
      padding: 80px 0;
      background-color: var(--bg-light);
    }
    .about-text {
      line-height: 1.7;
      color: var(--text-muted);
    }
    .btn-maps {
      background-color: var(--primary-red);
      color: white;
      font-weight: 600;
      border-radius: 8px;
      padding: 12px 24px;
      border: none;
      transition: all 0.2s ease;
    }
    .btn-maps:hover {
      background-color: var(--primary-red-hover);
      color: white;
    }
    .maps-placeholder {
      width: 100%;
      height: 350px;
      background-color: #F3F4F6;
      border-radius: 16px;
      overflow: hidden;
      border: 1px solid var(--border-color);
      transition: all 0.3s ease;
    }
    .maps-placeholder:hover {
      border-color: rgba(225, 29, 72, 0.3);
      box-shadow: 0 10px 20px rgba(225, 29, 72, 0.05);
    }

    /* Footer */
    footer {
      background-color: #3B0712; /* Deep premium dark red */
      color: #FFE4E6; /* Soft rose tint white */
      padding: 60px 0 30px 0;
      font-size: 0.9rem;
    }
    footer p:not(.text-white), 
    footer span:not(.text-white),
    footer li:not(.text-white),
    footer .text-secondary {
      color: #FFE4E6 !important; /* Soft rose white for main body/text, overriding Bootstrap defaults */
      opacity: 0.95;
    }
    .footer-brand .brand-title {
      color: white;
      font-weight: 800;
      font-size: 1.3rem;
      margin-bottom: 4px;
    }
    .footer-brand .brand-subtitle {
      color: #FDA4AF; /* Soft pink-red accent for footer subtitle (higher contrast) */
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
      color: #FECDD3 !important; /* Soft Rose-200 color for links */
      text-decoration: none;
      transition: all 0.2s ease;
    }
    .footer-links a:hover {
      color: white !important;
      text-shadow: 0 0 8px rgba(255, 255, 255, 0.4);
    }
    .footer-bottom {
      border-top: 1px solid #9F1239; /* Rose-800 for bottom line divider */
      padding-top: 30px;
      margin-top: 50px;
      font-size: 0.8rem;
    }

    @media (max-width: 991px) {
      .hero-title {
        font-size: 2.3rem;
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
      <a class="navbar-brand d-flex flex-column" href="#beranda">
        <span class="brand-title">BMC Computer</span>
        <span class="brand-subtitle">Sukawati, Bali</span>
      </a>
      
      <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i data-lucide="menu" class="text-dark"></i>
      </button>
      
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto mb-2 mb-lg-0 gap-1 gap-lg-3 mt-3 mt-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="#beranda">Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('catalog.index') }}">Katalog</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#keunggulan">Keunggulan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#cara-beli">Cara Pembelian</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#tentang-kami">Tentang Kami</a>
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
  <section class="hero-section" id="beranda">
    <div class="container py-4">
      <div class="row align-items-center g-5">
        <div class="col-lg-6">
          <h1 class="hero-title">Perangkat Komputer & Aksesoris Terlengkap di Sukawati</h1>
          <p class="hero-subtitle">Kami menyediakan laptop, komputer rakitan, hardware upgrade, printer, router, dan aksesoris original berkualitas tinggi dengan garansi resmi. Siap kirim cepat ke seluruh Bali.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="{{ route('catalog.index') }}" class="btn btn-hero-catalog d-flex align-items-center gap-2">
              <span>Lihat Katalog Produk</span>
              <i data-lucide="arrow-right" class="icon-sm"></i>
            </a>
            <a href="https://api.whatsapp.com/send?phone=6281234567890&text=Halo%20BMC%20Computer%20Sukawati%2C%20saya%20ingin%20berkonsultasi%20mengenai%20kebutuhan%20perangkat%20komputer." target="_blank" class="btn btn-hero-wa d-flex align-items-center gap-2">
              <i data-lucide="message-circle" class="icon-sm"></i>
              <span>Chat WhatsApp</span>
            </a>
          </div>
        </div>
        <div class="col-lg-6 text-center text-lg-end">
          <div class="hero-image-card p-3 bg-white rounded-4 shadow-lg d-inline-block border border-secondary-subtle">
            <img src="https://images.unsplash.com/photo-1587202372775-e229f172b9d7?auto=format&fit=crop&w=600&q=80" alt="BMC Computer Hero Image" class="img-fluid rounded-3" style="width: 100%; max-width: 500px; height: 320px; object-fit: cover;">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Keunggulan Kami -->
  <section class="features-section" id="keunggulan">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Mengapa Memilih Kami?</h2>
        <p class="section-subtitle">Layanan terbaik dan jaminan produk berkualitas untuk kepuasan operasional Anda.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="feature-icon-wrapper">
              <i data-lucide="shield-check"></i>
            </div>
            <h5 class="feature-title">Produk Original & Bergaransi</h5>
            <p class="feature-desc">Semua barang yang kami jual dijamin 100% original dari brand terpercaya dan memiliki garansi resmi.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="feature-icon-wrapper">
              <i data-lucide="truck"></i>
            </div>
            <h5 class="feature-title">Pengiriman Seluruh Bali</h5>
            <p class="feature-desc">Kami melayani pengiriman cepat dan aman langsung ke rumah Anda di wilayah Sukawati, Gianyar, dan seluruh Bali.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="feature-icon-wrapper">
              <i data-lucide="message-square-text"></i>
            </div>
            <h5 class="feature-title">Konsultasi Gratis via WA</h5>
            <p class="feature-desc">Bingung spesifikasi komputer? Konsultasikan kebutuhan Anda gratis via WhatsApp untuk opsi terbaik.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-3">
          <div class="feature-card">
            <div class="feature-icon-wrapper">
              <i data-lucide="wrench"></i>
            </div>
            <h5 class="feature-title">Servis & Perakitan</h5>
            <p class="feature-desc">Tersedia perakitan PC kustom (gaming/kantor) dan servis hardware dengan pengerjaan transparan.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Katalog Produk -->
  <section class="catalog-section" id="katalog">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Katalog Produk Kami</h2>
        <p class="section-subtitle">Pilih produk terbaik di bawah ini dan tanyakan langsung ketersediaan stoknya lewat link WhatsApp.</p>
      </div>

      <!-- Filter Pills -->
      <div class="filter-pills-container">
        <button class="filter-btn active" data-filter="all">Semua</button>
        <button class="filter-btn" data-filter="laptop">Laptop</button>
        <button class="filter-btn" data-filter="pc-komponen">PC & Komponen</button>
        <button class="filter-btn" data-filter="aksesoris">Aksesoris</button>
        <button class="filter-btn" data-filter="printer">Printer</button>
        <button class="filter-btn" data-filter="jaringan">Jaringan</button>
      </div>

      <!-- Products Grid -->
      <div class="row g-4" id="productsGrid">
        @foreach($products as $product)
          @php
            // Map database categories to landing page filter classes
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

            // Map Lucide icons based on category
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

            // Description mock depending on product
            $description = "Produk berkualitas tinggi bergaransi resmi untuk kebutuhan Anda.";
            if (str_contains(strtolower($product->nama_barang), 'gaming')) {
                $description = "Performa monster untuk bermain game berat dan render video cepat.";
            } elseif (str_contains(strtolower($product->nama_barang), 'thinkpad')) {
                $description = "Sangat andal untuk bekerja, belajar, dengan ketahanan kelas militer.";
            } elseif (str_contains(strtolower($product->nama_barang), 'ryzen')) {
                $description = "Komputer desktop kustom, siap pakai untuk kantor dan multimedia.";
            } elseif (str_contains(strtolower($product->nama_barang), 'monitor')) {
                $description = "Visual tajam, akurasi warna tinggi untuk kenyamanan mata Anda.";
            } elseif (str_contains(strtolower($product->nama_barang), 'keyboard')) {
                $description = "Ketik responsif dengan tactile feel premium dan lampu RGB.";
            } elseif (str_contains(strtolower($product->nama_barang), 'mouse')) {
                $description = "Desain ergonomis presisi tinggi untuk produktivitas maksimal.";
            } elseif (str_contains(strtolower($product->nama_barang), 'headset')) {
                $description = "Audio jernih dengan isolasi suara mikrofon berkualitas.";
            } elseif (str_contains(strtolower($product->nama_barang), 'printer')) {
                $description = "Cetak dokumen, scan, & copy praktis dengan biaya tinta super irit.";
            } elseif (str_contains(strtolower($product->nama_barang), 'router')) {
                $description = "Koneksi internet stabil berkecepatan tinggi ke seluruh ruangan.";
            } elseif (str_contains(strtolower($product->nama_barang), 'ram') || str_contains(strtolower($product->nama_barang), 'ssd')) {
                $description = "Upgrade kecepatan loading data dan multitasking sistem Anda.";
            }
          @endphp
          
          <div class="col-sm-6 col-md-4 col-lg-3 product-item-card" data-category="{{ $filterClass }}">
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
                <p class="product-desc" title="{{ $product->deskripsi ?: $description }}">{{ $product->deskripsi ?: $description }}</p>
                <div class="product-price-row">
                  <div>
                    <span class="price-label">Status Stok</span>
                    <span class="badge {{ $product->stok > 0 ? 'bg-success-subtle text-success' : 'bg-danger-subtle text-danger' }} fs-11px">
                      {{ $product->stok > 0 ? 'Tersedia' : 'Hubungi WA' }}
                    </span>
                  </div>
                </div>
                
                @php
                  $waMessage = "Halo BMC Computer, saya tertarik dengan produk " . $product->nama_barang . ". Apakah stoknya tersedia dan bisa info detail lebih lanjut?";
                  $waUrl = "https://api.whatsapp.com/send?phone=6281234567890&text=" . urlencode($waMessage);
                @endphp
                
                <a href="{{ $waUrl }}" target="_blank" class="btn btn-ask-wa">
                  <i data-lucide="message-circle" class="icon-sm"></i>
                  <span>Tanya via WhatsApp</span>
                </a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
      
      <!-- Client-side Pagination Links -->
      <div id="catalogPagination" class="d-flex justify-content-center mt-5"></div>
    </div>
  </section>

  <!-- Cara Pembelian -->
  <section class="steps-section" id="cara-beli">
    <div class="container">
      <div class="section-header">
        <h2 class="section-title">Cara Mudah Membeli</h2>
        <p class="section-subtitle">Ikuti langkah-langkah praktis di bawah ini untuk berbelanja di toko kami.</p>
      </div>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="step-card">
            <div class="step-number-bubble">1</div>
            <h5 class="step-title">Pilih Produk</h5>
            <p class="step-desc">Jelajahi katalog online kami di atas dan pilih produk komputer atau aksesoris yang Anda inginkan.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="step-card">
            <div class="step-number-bubble">2</div>
            <h5 class="step-title">Hubungi via WhatsApp</h5>
            <p class="step-desc">Klik tombol "Tanya via WhatsApp" pada produk. Anda akan terhubung langsung dengan admin kami untuk konfirmasi ketersediaan.</p>
          </div>
        </div>
        <div class="col-md-4">
          <div class="step-card">
            <div class="step-number-bubble">3</div>
            <h5 class="step-title">Kirim atau Ambil Langsung</h5>
            <p class="step-desc">Lakukan pembayaran, lalu produk siap kami kirim cepat ke rumah Anda, atau bisa diambil langsung ke toko offline kami.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Tentang Kami -->
  <section class="about-section" id="tentang-kami">
    <div class="container">
      <div class="row g-5 align-items-center">
        <div class="col-lg-6">
          <span class="brand-subtitle d-block mb-2 text-uppercase fw-bold text-primary" style="font-size: 0.8rem; letter-spacing: 1px;">Tentang Toko Kami</span>
          <h2 class="section-title text-start mb-4">BMC Computer Sukawati</h2>
          <p class="about-text mb-3">BMC Computer Sukawati berdiri sebagai solusi penyedia kebutuhan komputer, laptop, sparepart upgrade, printer, jaringan, dan aksesoris elektronik berkualitas di daerah Sukawati, Gianyar, Bali. Kami berdedikasi melayani baik perorangan, pelajar, perkantoran, hingga instansi dengan harga bersaing dan garansi resmi terpercaya.</p>
          <p class="about-text mb-4">Selain penjualan unit baru, kami juga melayani kustomisasi rakitan PC gaming/desain, jasa instalasi sistem operasi, pembersihan hardware laptop, dan konsultasi kelayakan upgrade hardware agar perangkat Anda kembali prima.</p>
          <div class="d-flex gap-3">
            <a href="https://maps.google.com/?q=Sukawati,+Gianyar,+Bali" target="_blank" class="btn btn-maps d-flex align-items-center gap-2">
              <i data-lucide="map-pin" class="icon-sm"></i>
              <span>Kunjungi Toko Kami (Maps)</span>
            </a>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="maps-placeholder d-flex align-items-center justify-content-center text-secondary">
            <div class="text-center p-4">
              <i data-lucide="map" class="mb-3 opacity-50" style="width: 60px; height: 60px;"></i>
              <h5>Lokasi Toko Fisik</h5>
              <p class="fs-12px text-muted max-width-300">Sukawati, Gianyar, Bali. Klik tombol navigasi di kiri untuk membuka rute langsung via Google Maps.</p>
            </div>
          </div>
        </div>
      </div>
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
            <li><a href="#beranda">Beranda</a></li>
            <li><a href="#katalog">Katalog</a></li>
            <li><a href="#keunggulan">Keunggulan</a></li>
            <li><a href="#cara-beli">Cara Pembelian</a></li>
            <li><a href="#tentang-kami">Tentang Kami</a></li>
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
      let currentCategory = 'all';

      const filterButtons = document.querySelectorAll('.filter-btn');
      const productCards = document.querySelectorAll('.product-item-card');
      const paginationContainer = document.getElementById('catalogPagination');
      const catalogSection = document.getElementById('katalog');

      function filterAndPaginate() {
        // 1. Filter items by category
        let matchingCards = [];
        productCards.forEach(card => {
          const category = card.getAttribute('data-category');
          if (currentCategory === 'all' || category === currentCategory) {
            matchingCards.push(card);
            card.style.display = 'none'; // hide first, show page items later
          } else {
            card.style.display = 'none';
          }
        });

        // 2. Paginate filtered items
        const totalItems = matchingCards.length;
        const totalPages = Math.ceil(totalItems / itemsPerPage);

        // Adjust currentPage if out of bounds
        if (currentPage > totalPages) currentPage = totalPages || 1;
        if (currentPage < 1) currentPage = 1;

        const startIndex = (currentPage - 1) * itemsPerPage;
        const endIndex = Math.min(startIndex + itemsPerPage, totalItems);

        // Show items for the current page
        for (let i = startIndex; i < endIndex; i++) {
          matchingCards[i].style.display = 'block';
        }

        // 3. Render pagination buttons
        renderPagination(totalPages);
      }

      function renderPagination(totalPages) {
        if (!paginationContainer) return;
        paginationContainer.innerHTML = '';

        if (totalPages <= 1) return;

        const ul = document.createElement('ul');
        ul.className = 'pagination';

        // Previous button
        const prevLi = document.createElement('li');
        prevLi.className = `page-item ${currentPage === 1 ? 'disabled' : ''}`;
        prevLi.innerHTML = `<a class="page-link" href="#" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a>`;
        if (currentPage > 1) {
          prevLi.addEventListener('click', function(e) {
            e.preventDefault();
            currentPage--;
            filterAndPaginate();
            catalogSection.scrollIntoView({ behavior: 'smooth' });
          });
        }
        ul.appendChild(prevLi);

        // Page numbers
        for (let i = 1; i <= totalPages; i++) {
          const li = document.createElement('li');
          li.className = `page-item ${currentPage === i ? 'active' : ''}`;
          li.innerHTML = `<a class="page-link" href="#">${i}</a>`;
          li.addEventListener('click', function(e) {
            e.preventDefault();
            currentPage = i;
            filterAndPaginate();
            catalogSection.scrollIntoView({ behavior: 'smooth' });
          });
          ul.appendChild(li);
        }

        // Next button
        const nextLi = document.createElement('li');
        nextLi.className = `page-item ${currentPage === totalPages ? 'disabled' : ''}`;
        nextLi.innerHTML = `<a class="page-link" href="#" aria-label="Next"><span aria-hidden="true">&raquo;</span></a>`;
        if (currentPage < totalPages) {
          nextLi.addEventListener('click', function(e) {
            e.preventDefault();
            currentPage++;
            filterAndPaginate();
            catalogSection.scrollIntoView({ behavior: 'smooth' });
          });
        }
        ul.appendChild(nextLi);

        paginationContainer.appendChild(ul);
      }

      // Bind filter buttons
      filterButtons.forEach(button => {
        button.addEventListener('click', function(e) {
          e.preventDefault();
          filterButtons.forEach(btn => btn.classList.remove('active'));
          this.classList.add('active');

          currentCategory = this.getAttribute('data-filter');
          currentPage = 1; // reset to first page when category changes
          filterAndPaginate();
        });
      });

      // Initial load
      filterAndPaginate();
    });
  </script>
</body>
</html>
