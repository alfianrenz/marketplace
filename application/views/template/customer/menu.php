<div class="header-bottom bg-theme">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-10 d-none d-lg-block">

                <!-- Menu -->
                <nav class="ho-navigation">
                    <ul>
                        <li class="<?= active_menu('home'); ?>">
                            <a href="<?= site_url('home'); ?>">Home</a>
                        </li>
                        <li class="<?= active_menu('seller'); ?>">
                            <a href="<?= site_url('seller'); ?>">Seller</a>
                        </li>
                        <li class="<?= active_menu('produk'); ?>">
                            <a href="<?= site_url('produk'); ?>">Produk</a>
                        </li>

                        <li class="<?= active_menu('profil'); ?>">
                            <a href="<?= site_url('profil'); ?>">About</a>
                        </li>
                        <!-- <li class="<?= active_menu('kontak'); ?>">
                            <a href="<?= site_url('kontak'); ?>"> Kontak</a>
                        </li> -->
                    </ul>
                </nav>

            </div>
            <div class="col-lg-2">
                <div class="header-contactinfo">
                    <i class="flaticon-support"></i>
                    <span>Contact Person:</span>
                    <b>089660979061</b>
                </div>
            </div>
            <div class="col-12 d-block d-lg-none">
                <div class="mobile-menu clearfix"></div>
            </div>
        </div>
    </div>
</div>