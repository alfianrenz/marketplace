<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li>Produk</li>
            </ul>
        </div>
    </div>
</div>

<!-- Page Conttent -->
<main class="page-content">

    <!-- Shop Page Area -->
    <div class="shop-page-area bg-white ptb-30">
        <div class="container">

            <?= $this->session->userdata('message'); ?>

            <div class="row">
                <div class="col-lg-9 order-1 order-lg-2">
                    <div class="shop-filters">
                        <div class="shop-filters-viewmode">
                            <button class="is-active" data-view="grid"><i class="ion ion-ios-keypad"></i></button>
                            <button data-view="list"><i class="ion ion-ios-list"></i></button>
                        </div>
                        <span class="shop-filters-viewitemcount">DAFTAR PRODUK</span>
                        <div class="shop-filters-sortby">
                            <b>Sort by:</b>
                            <div class="select-sortby">
                                <button class="select-sortby-current">Relevance</button>
                                <ul class="select-sortby-list dropdown-list">
                                    <li><a href="#">Relevance</a></li>
                                    <li><a href="#">Name, A-Z</a></li>
                                    <li><a href="#">Name, Z-A</a></li>
                                    <li><a href="#">Price, Hight-Low</a></li>
                                    <li><a href="#">Price, Low-High</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="shop-page-products mt-30">
                        <div class="row no-gutters">

                            <?php foreach ($produk as $p) : ?>
                                <div class="col-lg-4 col-md-4 col-sm-6 col-12">
                                    <!-- Single Product -->
                                    <article class="hoproduct">
                                        <div class="hoproduct-image">
                                            <a class="hoproduct-thumb" href="<?= site_url('produk/detail_produk'); ?>/<?= $p['id_produk']; ?>">
                                                <img class="hoproduct-frontimage" src="<?= base_url('assets/upload/foto_produk/' . $p['foto_produk']); ?>" alt="product image" style="object-fit: cover; width:300px; height:230px">
                                            </a>
                                        </div>
                                        <div class="hoproduct-content">
                                            <h5 class="hoproduct-title"><a href="product-details.html"><?= $p['nama_produk']; ?></a></h5>
                                            <div class="hoproduct-pricebox">
                                                <div class="pricebox">
                                                    <span class="price">Rp <?= number_format($p['harga_produk'], 0, ',', '.'); ?></span>
                                                </div>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 order-2 order-lg-1">
                    <div class="shop-widgets">
                        <div class="single-widget widget-categories">
                            <h5 class="widget-title">Kategori</h5>
                            <ul>
                                <li><a href="shop-rightsidebar.html">Semua Produk</a></li>
                                <?php foreach ($kategori as $k) : ?>
                                    <li><a href="shop-rightsidebar.html"><?= $k['nama_kategori']; ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>