<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('home'); ?>">Home</a></li>
                <li>Kontak</li>
            </ul>
        </div>
    </div>
</div>

<!-- Page Conttent -->
<main class="page-content">

    <!-- Contact Us Area -->
    <div class="contact-us-area ptb-30 mt-30 mb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mr-5">
                    <div class="commentbox">
                        <h2>KRITIK DAN SARAN</h2>
                        <BR>
                        <form id="contact-form" action="" method="POST" class="ho-form contact-form">
                            <div class="ho-form-inner">
                                <div class="single-input">
                                    <input type="email" name="name" id="new-review-name" placeholder="Email">
                                </div>
                                <div class="single-input">
                                    <textarea id="new-review-textbox" name="message" cols="30" rows="5" placeholder="Kritik dan saran yang membangun terhadap Waroeng Mahasiswa"></textarea>
                                </div>
                                <div class="single-input">
                                    <button class="ho-button" type="submit"><span>Kirim</span></button>
                                </div>
                            </div>
                        </form>
                        <p class="form-message"></p>
                    </div>
                </div>
                <div class="col-lg-5 pt-50 pt-lg-0">
                    <h2>KONTAK KAMI</h2>
                    <div class="contact-content">
                        <div class="single-content">
                            <span class="single-content-icon">
                                <i class="lnr lnr-map-marker"></i>
                            </span>
                            <b>Alamat :</b><br>
                            Universitas Catur Insan Cendekia -
                            Jalan Kesambi No. 202 Kota Cirebon, Jawa Barat
                        </div>
                        <div class="single-content">
                            <span class="single-content-icon">
                                <i class="lnr lnr-envelope"></i>
                            </span>
                            <b>Email :</b><br>
                            <a href="#">bkmcic.official@gmail.com</a>
                        </div>
                        <div class="single-content">
                            <span class="single-content-icon">
                                <i class="lnr lnr-phone-handset"></i>
                            </span>
                            <b>Whats App :</b><br>
                            <a href="#">089660979061</a>
                        </div>
                        <div class="single-content">
                            <span class="single-content-icon">
                                <i class="ion ion-logo-instagram"></i>
                            </span>
                            <b>Instagram: </b><br>
                            @warmacic
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</main>