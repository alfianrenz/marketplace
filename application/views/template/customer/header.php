<div class="header-middle bg-theme">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-6 order-1 order-lg-1">
                <a href="index.html" class="header-logo">
                    <img src="<?= base_url(); ?>assets/customer/images/logo/logo-warma.png" alt="logo">
                </a>
            </div>
            <div class="col-lg-6 col-12 order-3 order-lg-2">
                <form action="<?= site_url('produk/cari_produk'); ?>" class="header-searchbox" method="POST">
                    <select class="select-searchcategory" name="kategori">
                        <option value="0">Kategori</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <input type="text" name="cari" placeholder="Cari produk..." autocomplete="off" autofocus>
                    <button type="submit"><i class="lnr lnr-magnifier"></i></button>
                </form>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-6 order-2 order-lg-3">
                <div class="header-icons">

                    <!-- <div class="header-account">
                        <button class="header-accountbox-trigger"><span class="lnr lnr-user"></span> Masuk <i class="ion ion-ios-arrow-down"></i></button>
                        <ul class="header-accountbox dropdown-list">
                            <li>
                                <a href="<?= site_url('auth/login_seller'); ?>">Login Seller</a>
                            </li>
                            <li>
                                <a href="<?= site_url('auth/registrasi_seller'); ?>">Login Customer</a>
                            </li>
                        </ul>
                    </div> -->
                    <?php if ($this->session->userdata('id_member')) { ?>
                        <div class="header-account">
                            <button class="header-accountbox-trigger"><span class="lnr lnr-user"></span> <?= $this->session->userdata('nama'); ?> <i class="ion ion-ios-arrow-down"></i></button>
                            <ul class="header-accountbox dropdown-list">
                                <li>
                                    <a href="">History Pembelian</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('produk/keranjang_belanja'); ?>">Keranjang</a>
                                </li>
                                <li>
                                    <a href="<?= site_url('auth/logout_member'); ?>">Logout</a>
                                </li>
                            </ul>
                        </div>
                    <?php } else { ?>
                        <div class="header-account">
                            <a href="<?= site_url('auth/login_seller'); ?>">
                                <button class="header-accountbox-trigger" data-toggle="tooltip" data-placement="bottom" title data-original-title="Profile"><span class="lnr lnr-user"></span> Login Seller &nbsp;</button>
                            </a>
                        </div>
                    <?php } ?>


                    <?php $keranjang = $this->cart->total_items(); ?>
                    <div class="header-cart">
                        <a class="header-carticon" href=""><i class="lnr lnr-cart"></i>
                            <span class="count"><?= $keranjang; ?></span>
                        </a>


                        <!-- Minicart -->
                        <div class="header-minicart minicart">
                            <div class="minicart-header">
                                <?php foreach ($this->cart->contents() as $items) : ?>
                                    <div class="minicart-product">
                                        <div class="minicart-productimage">
                                            <a href="product-details.html">
                                                <img src="<?= base_url('assets/upload/foto_produk/' . $items['foto']); ?>" alt="product image">
                                            </a>
                                            <span class="minicart-productquantity"><?= $items['qty']; ?>x</span>
                                        </div>
                                        <div class="minicart-productcontent">
                                            <h6><a href="<?= site_url('produk/detail_produk'); ?>/<?= $items['id']; ?>"><?= $items['name']; ?></a></h6>
                                            <span class="minicart-productprice">Rp<?= number_format($items['price'], 0, ',', '.'); ?></span>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <!-- <div class="minicart-header">
                                <div class="text-center mb-4">
                                    <img src="<?= base_url(); ?>assets/customer/images/logo/keranjang_empty.png" width="100px">
                                </div>
                                <div>
                                    <h5 class="text-dark text-center mb-2">Hah Kosong?</h5>
                                    <p class="text-muted text-center mb-4">Dari pada kosong, mending lihat produk yang dijual oleh mahasiswa UCIC</p>
                                </div>
                            </div>
                            <div class="minicart-footer">
                                <a href="<?= site_url('produk'); ?>" class="ho-button ho-button-fullwidth">
                                    <span><b>LIHAT PRODUK</b></span>
                                </a>
                            </div> -->

                            <ul class="minicart-pricing">
                                <li>Total <span>Rp<?= number_format($this->cart->total(), 0, ',', '.'); ?></span></li>
                            </ul>
                            <div class="minicart-footer">
                                <a href="<?= site_url('produk/keranjang_belanja'); ?>" class="ho-button ho-button-fullwidth">
                                    <span><b>Lihat Keranjang</b></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>