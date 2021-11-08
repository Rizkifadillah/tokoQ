<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="{{ asset($setting->path_logo ?? 'assets/shopping.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
            style="opacity: .8">
        {{-- <img src="{{ asset('assets/shopping.png')}}" alt="User Avatar" class="img-size-50 mr-3 img-circle"> --}}

        @php
          $words = explode(' ', $setting->nama_toko);
          $word = "";
          foreach ($words as $w) {
            # code...
            $word .= $w[0];
          }
          // dd($word);
        @endphp
        <span class="brand-text font-weight-light nama-toko"><b> {{$setting->nama_toko}} </b></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset( auth()->user()->foto ?? 'assets/dist/img/user2-160x160.jpg') }}"
                    class="img-circle img-foto-profil elevation-2" alt="User Image" style="height: 30px;  width:30px;">
            </div>
            <div class="info">
                <a href="{{ route('user.profil')}}" class="d-block">{{ auth()->user()->name ?? '-' }}</a>
            </div>
            {{-- <form method="POST" action="{{ route('logout') }}">
                @csrf

                <x-jet-dropdown-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                this.closest('form').submit();">
                    {{ __('Log Out') }}
                </x-jet-dropdown-link>
            </form> --}}
            {{-- <div class="out">
              <a href="#" onclick="$('#logout-form').submit()">
                Keluar
              </a>
            </div> --}}
        </div>

        <!-- SidebarSearch Form -->
        {{-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> --}}

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                {{-- <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Forms
                    <i class="fas fa-angle-left right"></i>
                  </p>
                </a>
                <ul class="nav nav-treeview" style="display: none;">
                  <li class="nav-item">
                    <a href="pages/forms/general.html" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>General Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/advanced.html" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Advanced Elements</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/editors.html" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Editors</p>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="pages/forms/validation.html" class="nav-link">
                      <i class="fas fa-circle nav-icon"></i>
                      <p>Validation</p>
                    </a>
                  </li>
                </ul>
              </li> --}}
                {{-- <li class="nav-item ">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-copy"></i>
              <p>
                Master Data
                <i class="fas fa-angle-left right"></i>
                <span class="badge badge-info right">6</span>
              </p>
            </a> --}}
                {{-- <ul class="nav nav-treeview"> --}}
                {{-- <li class="nav-item">
                <a href="{{ route('dashboard.index')}}" class="nav-link {{ set_active(['dashboard.index','dashboard.create','dashboard.edit','dashboard.show']) }}">
                  <i class="fas fa-circle nav-icon"></i>
                  <p>Dashboard</p>
                </a>
              </li> --}}
              @if (auth()->user()->lavel == 1)
                  
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ set_active(['dashboard']) }} ">
                        <i class="fas fa-chart-pie text-default"></i>
                        <p>Beranda</p>
                    </a>
                </li>

                <li class="nav-header">MASTER DATA</li>
                <li class="nav-item">
                    <a href="{{ route('kategori.index') }}" class="nav-link {{ set_active(['kategori.index']) }} ">
                        <i class="fas fa-th nav-icon text-warning"></i>
                        <p>Kategori</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}" class="nav-link {{ set_active(['supplier.index']) }} ">
                        <i class="fas fa-truck nav-icon text-success"></i>
                        <p>Supplier</p>
                    </a>
                </li>
                </li>
                <li class="nav-item">
                    <a href="{{ route('product.index') }}" class="nav-link {{ set_active(['product.index']) }} ">
                        <i class="fas fa-barcode nav-icon text-teal"></i>
                        <p>Produk</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('member.index') }}" class="nav-link {{ set_active(['member.index']) }} ">
                        <i class="fas fa-users nav-icon text-maroon"></i>
                        <p>Member</p>
                    </a>

                </li>
                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item">
                    <a href="{{ route('pengeluaran.index') }}" class="nav-link {{ set_active(['pengeluaran.index']) }} ">
                        <i class="fas fa-upload nav-icon text-danger"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('pembelian.index') }}" class="nav-link {{ set_active(['pembelian.index']) }} ">
                        <i class="fas fa-inbox text-orange nav-icon"></i>
                        <p>Pembelian</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('penjualan.index')}}" class="nav-link {{ set_active(['penjualan.index']) }} ">
                        <i class="fas fa-store text-fuchsia nav-icon"></i>
                        <p>Penjualan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transaksi.baru')}}" class="nav-link {{ set_active(['transaksi.baru']) }} ">
                        <i class="fas fa-cart-arrow-down text-info nav-icon"></i>
                        <p>Transaksi Baru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.index')}}" class="nav-link {{ set_active(['transaksi.index']) }} ">
                        <i class="fas fa-cart-arrow-down text-lime nav-icon"></i>
                        <p>Transaksi Lama</p>
                    </a>
                </li>
                <li class="nav-header">REPORT</li>
                <li class="nav-item">
                    <a href="{{ route('laporan.index')}}" class="nav-link {{ set_active(['laporan.index']) }} ">
                        <i class="fas fa-book nav-icon text-lightblue"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <li class="nav-header">SYSTEM</li>
                <li class="nav-item">
                    <a href="{{ route('user.index')}}" class="nav-link {{ set_active(['user.index']) }}">
                        <i class="fas fa-user-plus nav-icon text-olive"></i>
                        <p>User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('setting.index')}}" class="nav-link {{ set_active(['setting.index','setting.create','setting.show','setting.edit']) }}">
                        <i class="fas fa-cogs nav-icon text-grey"></i>
                        <p>Setting</p>
                    </a>
                </li>
              @else
                <li class="nav-header">DASHBOARD</li>

                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ set_active(['dashboard']) }}  ">
                        <i class="fas fa-chart-pie text-primary nav-icon"></i>
                        <p>Beranda</p>
                    </a>
                </li>
                <li class="nav-header">TRANSAKSI</li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.baru')}}" class="nav-link {{ set_active(['transaksi.baru', 'transaksi.selesai']) }}  ">
                        <i class="fas fa-cart-arrow-down text-info nav-icon"></i>
                        <p>Transaksi Baru</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('transaksi.index')}}" class="nav-link {{ set_active(['transaksi.index']) }}  ">
                        <i class="fas fa-cart-arrow-down text-lime nav-icon"></i>
                        <p>Transaksi Lama</p>
                    </a>
                </li>
              @endif


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>


    <!-- /.sidebar -->
</aside>
