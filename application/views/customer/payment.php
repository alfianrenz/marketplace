<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('home'); ?>">Home</a></li>
                <li>Pembayaran</li>
            </ul>
        </div>
    </div>
</div>

<?= $this->session->userdata('message'); ?>
<main class="page-content">
    <!-- Product Details Area -->
    <div class="product-details-area bg-white ptb-30">
        <div class="container">
            <div class="blogitem2-image">
                <h2>TOKEN</h2>
                <p><?= $snaptoken ?></p>
            </div>
            <div class="blogitem2-image">
                <button type="button" id="payment" class="ho-button ho-button-sm">
                    <span>Bayar</span>
                </button>
            </div>
        </div>
    </div>
</main>