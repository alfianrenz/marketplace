<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('home'); ?>">Home</a></li>
                <li>Checkout</li>
            </ul>
        </div>
    </div>
</div>

<!-- Page Conttent -->
<main class="page-content">
    <div class="checkout-area bg-white pb-30" style="margin-bottom: 40px">
        <div class="container">
            <form action="<?= site_url('checkout'); ?>" method="POST" class="billing-info">
                <div class="row">

                    <!-- Billing Details -->
                    <div class="col-lg-6">
                        <h3 class="small-title">ALAMAT PENGIRIMAN</h3>
                        <div class="ho-form">
                            <div class="ho-form-inner">
                                <div class="single-input">
                                    <input type="text" name="nama" id="nama" placeholder="Nama Lengkap" value="<?= set_value('nama'); ?>">
                                    <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="single-input">
                                    <input type="text" name="email" id="email" placeholder="Masukkan Email" value="<?= set_value('email'); ?>">
                                    <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="single-input">
                                    <input type="text" name="handphone" id="handphone" placeholder="No Handphone" value="<?= set_value('handphone'); ?>">
                                    <?= form_error('handphone', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="single-input">
                                    <input type="text" name="kabupaten" id="kabupaten" placeholder="Kabupaten/Kota" value="<?= set_value('kabupaten'); ?>">
                                    <?= form_error('kabupaten', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="single-input">
                                    <input type="text" name="kecamatan" id="kecamatan" placeholder="Kecamatan" value="<?= set_value('kecamatan'); ?>">
                                    <?= form_error('kecamatan', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="single-input">
                                    <input type="number" name="kodepos" id="kodepos" placeholder="Kode POS">
                                    <?= form_error('kodepos', '<small class="text-danger">', '</small>'); ?>
                                </div>
                                <div class="single-input">
                                    <textarea name="alamat" id="alamat" rows="5" placeholder="Alamat (Nama Jalan, RT/RW, Kelurahan/Desa)"></textarea>
                                    <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Place Order -->
                    <div class="col-lg-6">
                        <div class="order-infobox">
                            <h3 class="small-title">DAFTAR BELANJA</h3>
                            <div class="checkout-table table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th class="text-left">PRODUK</th>
                                            <th class="text-right">TOTAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($this->cart->contents() as $items) : ?>
                                            <tr>
                                                <td class="text-left"><?= $items['name']; ?><span> × <?= $items['qty']; ?></span></td>
                                                <td class="text-right">Rp<?= number_format($items['subtotal'], 0, ',', '.'); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr class="total-price">
                                            <th class="text-left">TOTAL BAYAR</th>
                                            <td class="text-right">Rp<?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                                <button class="ho-button ho-button-fullwidth mt-30" type="submit">
                                    <span>Check Out</span>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</main>