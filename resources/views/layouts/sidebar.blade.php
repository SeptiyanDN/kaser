<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element"> <span>
                        <img alt="image" class="img" width="175" src={{asset("assets/logo.png")}} />
                         </span>
                    
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        
                        <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">{{Auth::user()->name}}</strong>
                         {{-- </span> <span class="text-muted text-xs block">{{Auth::user()->role->nama}}<b class="caret"></b></span> </span> </a> --}}
                         
                         <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a href="user/profile">Profile</a></li>
                        <li class="divider"></li>
                        <li><a href="login.html">Ubah Password</a></li>
                    </ul>
                    
                </div>
                <div class="logo-element">
                    CMS
                </div>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboards</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/">Dashboard v.1</a></li>
                </ul>
            </li>
            {{-- <li>
                <a href="index.html"><i class="fa fa-database"></i> <span class="nav-label">Master Data</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Pemilik Bisnis</a></li>
                </ul>
            </li> --}}
            <li>
                <a href="index.html"><i class="fa fa-book"></i> <span class="nav-label">Laporan</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Ringkasan Penjualan</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Metode Pembayaran</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Penjualan Per Produk</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Penjualan Per Kategori</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Penjualan Per Merek</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Laporan Pajak</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Laporan Pelanggan</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Laporan Pegawai</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Laporan Absensi</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Laporan Diskon</a></li>
                </ul>
            </li>
            <li>
                <a href="/cabang-outlet"><i class="fa fa-newspaper-o"></i> <span class="nav-label">Laporan Transaksi</span></a>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-money"></i> <span class="nav-label">Pembayaran</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Menunggu Pembayaran</a></li>
                </ul>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-dropbox"></i> <span class="nav-label">Produk</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Katalog Produk</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Kategori Produk</a></li>
                </ul>
            </li>
            <li>
                <a href="/cabang-outlet"><i class="fa fa-calendar"></i> <span class="nav-label">Pengingat</span></a>
            </li>
            <li>
                <a href="/cabang-outlet"><i class="fa fa-drivers-license-o"></i> <span class="nav-label">Pegawai</span></a>
            </li>
            <li>
                <a href="index.html"><i class="fa fa-truck"></i> <span class="nav-label">Inventaris</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Ringakasan</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Supplier</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Pembelian</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Pemindahan Stock</a></li>
                </ul>
                <ul class="nav nav-second-level">
                    <li><a href="/admin/daftar-pemilik-bisnis">Penyesuaian Stock</a></li>
                </ul>
            </li>
            <li>
                <a href="/cabang-outlet"><i class="fa fa-university"></i> <span class="nav-label">Outlet</span></a>
            </li>
            <li>
                <a href="/cabang-outlet"><i class="fa fa-diamond"></i> <span class="nav-label">Kelola Kas</span></a>
            </li>
            <li>
                <a href="/cabang-outlet"><i class="fa fa-diamond"></i> <span class="nav-label">Pelanggan</span></a>
            </li>
        </ul>

    </div>
</nav>

