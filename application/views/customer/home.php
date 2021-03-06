<!-- Banners Area -->
<?= $this->session->userdata('message'); ?>
<div class="herobanner herobanner-2 slider-navigation slider-dots slider-dots-center">

    <!-- Herobanner Single -->
    <div class="herobanner-single">
        <img src="<?= base_url(); ?>assets/customer/images/hero/slider-1.png" alt="hero image">
        <div class="herobanner-content">
            <div class="herobanner-box" style="margin-left:50px">
                <h4 style="color:#7e7e7e">WELCOME TO</h4>
            </div>
            <div class="herobanner-box" style="margin-left:50px">
                <h1 style="color:#363636;"><b>Waroeng</b> <span style="color:#0B88EE"><b>Mahasiswa</b></span></h1>
            </div>
            <div class="herobanner-box" style="margin-left:50px">
                <p style="color:#7e7e7e">Pasar mahasiswa Universitas Catur Insan Cendekia</p>
            </div>
            <div class="herobanner-box" style="margin-left:50px">
                <a href="<?= site_url('profil'); ?>" class="ho-button">
                    <span>Profile</span>
                </a>
            </div>
        </div>
        <span class="herobanner-progress"></span>
    </div>

    <div class="herobanner-single">
        <img src="<?= base_url(); ?>assets/customer/images/hero/slider-2.png" alt="hero image">
        <div class="herobanner-content">
            <div class="herobanner-box" style="margin-left:50px">
                <h4 style="color:#7e7e7e">SAATNYA MENJADI</h4>
            </div>
            <div class="herobanner-box" style="margin-left:50px">
                <h1 style="color:#363636;"><b>Seorang</b><span style="color:#0B88EE"><b> Entrepeneur</b></span></h1>
            </div>
            <div class="herobanner-box" style="margin-left:50px">
                <p style="color:#7e7e7e">Daftarkan dirimu dan jadilah pengusaha di era teknlogi</p>
            </div>
            <div class="herobanner-box" style="margin-left:50px">
                <a href="<?= site_url('auth/registrasi_seller'); ?>" class="ho-button">
                    <span>Buka Waroeng</span>
                </a>
            </div>
        </div>
        <span class="herobanner-progress"></span>
    </div>
</div>

<!-- Page Content -->
<main class="page-content">
    <!-- Product -->
    <div class="ho-section newarrival-bestseller-featured-product mtb-30" style="margin-top:50px">
        <div class="container">
            <div class="section-title-2">
                <ul class="nav" id="bstab3" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="bstab3-area1-tab" data-toggle="tab" href="#bstab3-area1" role="tab" aria-controls="bstab3-area1" aria-selected="true">PRODUK TERBARU</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="bstab3-area2-tab" data-toggle="tab" href="#bstab3-area2" role="tab" aria-controls="bstab3-area2" aria-selected="false">TERPOPULER</a>
                    </li>
                </ul>
            </div>

            <div class="tab-content" id="bstab3-ontent">
                <div class="tab-pane fade show active" id="bstab3-area1" role="tabpanel" aria-labelledby="bstab3-area1-tab">
                    <div class="product-slider new-best-featured-slider slider-navigation-2">
                        <?php foreach ($produk as $p) : ?>

                            <div class="product-slider-col">
                                <!-- Single Product -->
                                <article class="hoproduct">
                                    <div class="hoproduct-image">
                                        <a class="hoproduct-thumb" href="<?= site_url('produk/detail_produk'); ?>/<?= $p['id_produk']; ?>">
                                            <img class="hoproduct-frontimage" src="<?= base_url('assets/upload/foto_produk/' . $p['foto_produk']); ?>" alt="product image" style="object-fit: cover; width:350px; height:200px">
                                        </a>
                                    </div>
                                    <div class="hoproduct-content">
                                        <h5 class="hoproduct-title"><a href="product-details.html"><?= $p['nama_produk']; ?></a></h5>
                                        <div class="hoproduct-pricebox">
                                            <div class="pricebox">
                                                <span class="price">Rp<?= number_format($p['harga_produk'], 0, ',', '.'); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="tab-pane fade" id="bstab3-area2" role="tabpanel" aria-labelledby="bstab3-area2-tab">
                    <div class="product-slider new-best-featured-slider slider-navigation-2">
                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-4.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-5.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-15.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-12.jpg" alt="product image">
                                        <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-13.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-1.jpg" alt="product image">
                                        <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-22.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-7.jpg" alt="product image">
                                        <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-8.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-18.jpg" alt="product image">
                                        <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-19.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-15.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-12.jpg" alt="product image">
                                        <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-13.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-10.jpg" alt="product image">
                                        <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-11.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>

                        <div class="product-slider-col">
                            <!-- Single Product -->
                            <article class="hoproduct">
                                <div class="hoproduct-image">
                                    <a class="hoproduct-thumb" href="product-details.html">
                                        <img class="hoproduct-frontimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-7.jpg" alt="product image">
                                        <img class="hoproduct-backimage" src="<?= base_url(); ?>assets/customer/images/product/product-image-8.jpg" alt="product image">
                                    </a>
                                    <ul class="hoproduct-actionbox">
                                        <li><a href="#"><i class="lnr lnr-cart"></i></a></li>
                                        <li><a href="#" class="quickview-trigger"><i class="lnr lnr-eye"></i></a></li>
                                        <li><a href="#"><i class="lnr lnr-heart"></i></a></li>
                                    </ul>

                                </div>
                                <div class="hoproduct-content">
                                    <h5 class="hoproduct-title"><a href="product-details.html">SonicFuel
                                            Wireless Over-Ear Headphones</a></h5>

                                    <div class="hoproduct-pricebox">
                                        <div class="pricebox">

                                            <span class="price">$34.11</span>
                                        </div>
                                    </div>
                                </div>
                            </article>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>