<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?= base_url('assets/upload/foto_user/' . $session['foto_seller']); ?>" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details"><?= $session['nama_mahasiswa']; ?></div>
                    </div>
                </div>
            </div>
            <br>

            <ul class="nav pcoded-inner-navbar">
                <li class="<?= active_menu('dashboard'); ?> nav-item">
                    <a href="<?= site_url('dashboard/seller'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Utama</label>
                </li>
                <li class="<?= active_menu('produk'); ?> nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-box"></i></span><span class="pcoded-mtext">Produk</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?= site_url('produk/daftar_produk'); ?>">Daftar Produk</a></li>
                        <li><a href="<?= site_url('produk/tambah_produk'); ?>">Tambah Produk</a></li>
                    </ul>
                </li>

                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Penjualan</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?= site_url('penjualan/daftar_pesanan'); ?>">Daftar Pesanan</a></li>
                        <li><a href="">Pesanan Baru</a></li>
                        <li><a href="">Belum Bayar</a></li>
                        <li><a href="">Diproses</a></li>
                        <li><a href="">Dikirim</a></li>
                    </ul>
                </li>
                <li class="<?= active_menu('laporan'); ?> nav-item">
                    <a href="<?= site_url('laporan'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">Laporan</span></a>
                </li>
                <li class="<?= active_menu('statistik'); ?> nav-item">
                    <a href="<?= site_url('statistik'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-pie-chart"></i></span><span class="pcoded-mtext">Statistik</span></a>
                </li>


                <li class="nav-item pcoded-menu-caption">
                    <label>Pengaturan</label>
                </li>
                <li class="<?= active_menu('profil'); ?> nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?= site_url('profil/profil_seller'); ?>">Edit Profile</a></li>
                        <li><a href="<?= site_url('profil/ubah_password_seller'); ?>">Ubah Password</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-briefcase"></i></span><span class="pcoded-mtext">Waroeng</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="user-profile.html">Profil Waroeng</a></li>
                        <li><a href="user-card.html">Edit Waroeng</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>