<nav class="sidebar">
  <div class="sidebar-header">
    <a href="{{ route('dashboard') }}" class="sidebar-brand">
      BMC<span>Computer</span>
    </a>
    <div class="sidebar-toggler not-active">
      <span></span>
      <span></span>
      <span></span>
    </div>
  </div>
  <div class="sidebar-body">
    <ul class="nav" id="sidebarNav">
      <li class="nav-item nav-category">Menu Utama</li>
      <li class="nav-item {{ Request::is('dashboard*') ? 'active' : '' }}">
        <a href="{{ route('dashboard') }}" class="nav-link">
          <i class="link-icon" data-lucide="home"></i>
          <span class="link-title">Dashboard</span>
        </a>
      </li>
      
      <li class="nav-item {{ Request::is('pos*') ? 'active' : '' }}">
        <a href="{{ route('pos.index') }}" class="nav-link">
          <i class="link-icon" data-lucide="shopping-cart"></i>
          <span class="link-title">POS (Penjualan)</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
        <a href="{{ route('products.index') }}" class="nav-link">
          <i class="link-icon" data-lucide="package"></i>
          <span class="link-title">Data Barang (Produk)</span>
        </a>
      </li>

      <li class="nav-item {{ Request::is('stock-in*') ? 'active' : '' }}">
        <a href="{{ route('stock-in.index') }}" class="nav-link">
          <i class="link-icon" data-lucide="download"></i>
          <span class="link-title">Stok Masuk (Restock)</span>
        </a>
      </li>

      @if(auth()->user() && auth()->user()->role === 'admin')
        <li class="nav-item nav-category">Administrasi</li>
        
        <li class="nav-item {{ Request::is('reports*') ? 'active' : '' }}">
          <a href="{{ route('reports.index') }}" class="nav-link">
            <i class="link-icon" data-lucide="file-text"></i>
            <span class="link-title">Laporan Penjualan</span>
          </a>
        </li>

        <li class="nav-item {{ Request::is('users*') ? 'active' : '' }}">
          <a href="{{ route('users.index') }}" class="nav-link">
            <i class="link-icon" data-lucide="users"></i>
            <span class="link-title">Kelola Pengguna (Staff)</span>
          </a>
        </li>
      @endif
      
      <li class="nav-item nav-category">Sesi</li>
      <li class="nav-item">
        <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">
          <i class="link-icon text-danger" data-lucide="log-out"></i>
          <span class="link-title">Logout</span>
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
          @csrf
        </form>
      </li>
    </ul>
  </div>
</nav>