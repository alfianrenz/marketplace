<nav class="pcoded-navbar menu-light">
    <div class="navbar-wrapper">
        <div class="navbar-content scroll-div ">

            <div class="">
                <div class="main-menu-header">
                    <img class="img-radius" src="<?= base_url('assets/upload/foto_user/' . $session['foto_admin']); ?>" alt="User-Profile-Image">
                    <div class="user-details">
                        <div id="more-details"><?= $session['nama_admin']; ?></div>
                    </div>
                </div>
            </div>
            <br>

            <ul class="nav pcoded-inner-navbar">
                <li class="<?= active_menu('dashboard'); ?> nav-item">
                    <a href="<?= site_url('dashboard'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-home"></i></span><span class="pcoded-mtext">Dashboard</span></a>
                </li>

                <li class="nav-item pcoded-menu-caption">
                    <label>Menu Utama</label>
                </li>
                <li class="<?= active_menu('data_seller'); ?> nav-item">
                    <a href="<?= site_url('data_seller'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-users"></i></span><span class="pcoded-mtext">Kelola Seller</span></a>
                </li>
                <li class="<?= active_menu('kategori'); ?> nav-item">
                    <a href="<?= site_url('kategori'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-calendar"></i></span><span class="pcoded-mtext">Kelola Kategori</span></a>
                </li>
                <li class="<?= active_menu('transaksi'); ?> nav-item">
                    <a href="<?= site_url('transaksi'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-shopping-cart"></i></span><span class="pcoded-mtext">Data Transaksi</span></a>
                </li>
                <li class="<?= active_menu('transaksi'); ?> nav-item">
                    <a href="<?= site_url('transaksi'); ?>" class="nav-link "><span class="pcoded-micon"><i class="feather icon-file"></i></span><span class="pcoded-mtext">Laporan</span></a>
                </li>


                <li class="nav-item pcoded-menu-caption">
                    <label>Pengaturan</label>
                </li>
                <li class="<?= active_menu('profil'); ?> nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Profile</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="<?= site_url('profil/profil_admin'); ?>">Edit Profile</a></li>
                        <li><a href="<?= site_url('profil/ubah_password_admin'); ?>">Ubah Password</a></li>
                    </ul>
                </li>
                <li class="nav-item pcoded-hasmenu">
                    <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-globe"></i></span><span class="pcoded-mtext">Website</span></a>
                    <ul class="pcoded-submenu">
                        <li><a href="user-profile.html">Slider</a></li>
                        <li><a href="user-card.html">About</a></li>
                        <li><a href="user-card.html">Kontak</a></li>
                        <li><a href="user-card.html">Bantuan</a></li>
                        <li><a href="user-card.html">Footer</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>