{{-- <a href="index3.html" class="brand-link">
    <img src="{{ asset('bootstrap/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">RizzCom</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{ asset('bootstrap/dist/img/profil.jpg') }}" class="img-circle elevation-2"
                alt="User Image">
        </div>
        <div class="info">
            <a href="#" class="d-block">Abdel Haris Aragati</a>
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="{{'/'}}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-layer-group"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>

            <li class="nav-header">MENU</li>
            <li class="nav-item">
                <a href="{{ '/stok' }}" class="nav-link {{ request()->is('stok*') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-solid fa-cubes"></i>
                    <p>
                        Stok Produk
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ '/pemasok' }}" class="nav-link {{ request()->is('pemasok*') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-solid fa-truck-fast"></i>
                    <p>
                        Pemasok
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ '/stok' }}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-tag"></i>
                    <p>
                        Jual
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ '/stok' }}" class="nav-link">
                    <i class="nav-icon fas fa-solid fa-bag-shopping"></i>
                    <p>
                        Beli
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{'/kategori'}}" class="nav-link">
                    <i class="nav-icon fa-solid fa-list"></i>
                    <p>
                        Kategori
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/kanban.html" class="nav-link">
                    <i class="nav-icon fa-solid fa-box"></i>
                    <p>
                        Satuan
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/kanban.html" class="nav-link">
                    <i class="nav-icon fa-solid fa-receipt"></i>
                    <p>
                        Mutasi
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="pages/kanban.html" class="nav-link">
                    <i class="nav-icon fa-solid fa-user"></i>
                    <p>
                        Pelanggan
                    </p>
                </a>
            </li>
            <li class="nav-item menu-open">
                <a href="" class="nav-link active">
                    <i class="nav-icon fas fa-solid fa-layer-group"></i>
                    <p>
                        Master Data Produk
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{'/produk/list'}}" class="nav-link active">
                            <i class="nav-icon bi bi-grid-1x2-fill"></i>
                            <p>Tambah Produk</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index2.html" class="nav-link">
                            <i class="nav-icon bi bi-grid-1x2-fill"></i>
                            <p>Dashboard v2</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="./index3.html" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Dashboard v3</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div> --}}



<aside class="navbar-aside" id="offcanvas_aside">
    <div class="aside-top"><a class="brand-wrap" href="index.html"><img class="logo" src="{{ asset('homepage-section/imgs/template/logo-1.png')}}"></a>
      <div>
        <button class="btn btn-icon btn-aside-minimize"><i class="text-muted material-icons md-menu_open"></i></button>
      </div>
    </div>
    <nav>
      <ul class="menu-aside">
        <li class="menu-item {{ request()->is('admin*') ? ' active' : '' }}">
            <a class="menu-link" href="{{ route('admin.dashboard')}}"><i class="icon material-icons md-home">
                </i><span class="text">Dashboard</span></a></li>
        <li class="menu-item has-submenu {{ request()->is('stok*') || request()->is('kategori*') || request()->is('satuan*') ? 'active' : '' }}">
            <a class="menu-link" href="page-products-list.html">
                <i class="icon material-icons md-shopping_bag"></i>
                <span class="text">Produk</span>
            </a>
            <div class="submenu">
                <a href="{{ url('/stok') }}" class="{{ request()->is('stok*') ? 'active' : '' }}">List Produk</a>
                <a href="{{ url('/kategori') }}" class="{{ request()->is('kategori*') ? 'active' : '' }}">Kategori</a>
                <a href="{{ url('/satuan') }}" class="{{ request()->is('satuan*') ? 'active' : '' }}">Satuan</a>
            </div>
        </li>
        <li class="menu-item has-submenu {{request()->is('penjualan*') ? 'active' : '' }}">
            <a class="menu-link" href="page-orders-1.html">
                <i class="icon material-icons md-shopping_cart"></i>
                <span class="text">Penjualan</span>
            </a>
            <div class="submenu">
                <a href="{{ route('admin.transaksi') }}" class="{{ request()->is('admin/transaksi*') ? 'active' : '' }}">Transaksi Penjualan</a>
                <a href="{{ route('admin.laporan.penjualan') }}" class="{{ request()->is('admin/laporan/penjualan*') ? 'active' : '' }}">Laporan Penjualan</a>
            </div>
        </li>

        <li class="menu-item has-submenu {{ request()->is('beli*') || request()->is('pemasok*') ? 'active' : '' }}" >
            <a class="menu-link"><i class="icon material-icons md-store"></i><span class="text">Beli</span></a>
          <div class="submenu">
            <a href="{{route('daftar.beli')}}" class="{{ request()->is('beli*') ? 'active' : '' }}">Daftar Beli</a>
            <a href="{{ '/pemasok' }}"  class="{{ request()->is('pemasok*') ? 'active' : '' }}">Pemasok</a></div>
        </li>

      </ul>
    </nav>
  </aside>
