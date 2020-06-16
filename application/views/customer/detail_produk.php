<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('home'); ?>">Home</a></li>
                <li>Detail Produk</li>
            </ul>
        </div>
    </div>
</div>

<!-- Page Conttent -->
<main class="page-content">
    <!-- Product Details Area -->
    <div class="product-details-area bg-white ptb-30">
        <div class="container">

            <div class="pdetails">
                <div class="row mtb-30">
                    <div class="col-lg-5">
                        <div class="pdetails-images mr-3">
                            <div class="pdetails-largeimages pdetails-imagezoom">
                                <a href="">
                                    <div class="pdetails-singleimage" data-src="<?= base_url('assets/upload/foto_produk/' . $produk['foto_produk']); ?>">
                                        <img src="<?= base_url('assets/upload/foto_produk/' . $produk['foto_produk']); ?>" alt="Gambar produk">
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="pdetails-content">
                            <h2><?= $produk['nama_produk']; ?></h2>
                            <div class="pdetails-pricebox">
                                <span class="price">Rp<?= number_format($produk['harga_produk'], 0, ',', '.'); ?></span>
                            </div>
                            <div class="pdetails-quantity">
                                <a href="<?= site_url('produk/tambah_kekeranjang'); ?>/<?= $produk['id_produk']; ?>" class="ho-button">
                                    <i class="lnr lnr-cart"></i>
                                    <span>Tambahkan ke Keranjang</span>
                                </a>
                            </div>
                            <div class="pdetails-categories">
                                <span>Kategori :</span>
                                <ul>
                                    <li><a href=""><?= $produk['nama_kategori']; ?></a></li>
                                </ul>
                            </div>
                            <div class="pdetails-categories">
                                <span>Tersedia :</span>
                                <ul>
                                    <li><a href=""></a><?= $produk['stok_produk']; ?> Stok Barang</li>
                                </ul>
                            </div>
                            <div class="pdetails-categories">
                                <span>Alamat :</span>
                                <?= $produk['alamat_seller']; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pdetails-allinfo">

                <ul class="nav pdetails-allinfotab" id="product-details" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="product-details-area1-tab" data-toggle="tab" href="#product-details-area1" role="tab" aria-controls="product-details-area1" aria-selected="true">Deskripsi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="product-details-area2-tab" data-toggle="tab" href="#product-details-area2" role="tab" aria-controls="product-details-area2" aria-selected="false">Profil Seller</a>
                    </li>
                </ul>

                <div class="tab-content" id="product-details-ontent">
                    <div class="tab-pane fade show active" id="product-details-area1" role="tabpanel" aria-labelledby="product-details-area1-tab">
                        <div class="col-sm-6">
                            <div class="pdetails-description">
                                <?= $produk['deskripsi_produk']; ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="product-details-area2" role="tabpanel" aria-labelledby="product-details-area2-tab">
                        <div class="pdetails-moreinfo">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>