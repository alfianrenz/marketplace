<!-- Breadcrumb Area -->
<div class="breadcrumb-area bg-grey">
    <div class="container">
        <div class="ho-breadcrumb">
            <ul>
                <li><a href="<?= site_url('home'); ?>">Home</a></li>
                <li>Keranjang</li>
            </ul>
        </div>
    </div>
</div>

<div class="cart-page-area ptb-30 bg-white">
    <div class="container">

        <!-- Cart Products -->
        <div class="cart-table table-responsive">
            <table class="table table-bordered table-hover mb-0">
                <thead>
                    <tr>
                        <th class="cart-column-image" scope="col">FOTO</th>
                        <th class="cart-column-productname" scope="col">Nama</th>
                        <th class="cart-column-price" scope="col">HARGA</th>
                        <th class="cart-column-quantity" scope="col">JUMLAH</th>
                        <th class="cart-column-total" scope="col">TOTAL</th>
                        <th class="cart-column-remove" scope="col">REMOVE</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($this->cart->contents() as $produk) : ?>
                        <tr>
                            <td>
                                <a href="product-details-right-sidebar.html" class="product-image">
                                    <img src="<?= base_url('assets/upload/foto_produk/' . $produk['foto']); ?>" alt="product image">
                                </a>
                            </td>
                            <td>
                                <a href="<?= site_url('produk/detail_produk'); ?>/<?= $produk['id']; ?>" class="product-title"><?= $produk['name']; ?></a>
                            </td>
                            <td>Rp<?= number_format($produk['price'], 0, ',', '.'); ?></td>
                            <td>
                                <input type="number" class="text-center" name="qty" value="<?= $produk['qty']; ?>" onchange="updateCartItem(this, '<?= $produk['rowid']; ?>')" min="0" step="1" class="c-input-text qty text">
                            </td>
                            <td>
                                <span class="total-price">Rp<?= number_format($produk['subtotal'], 0, ',', '.'); ?></span>
                            </td>
                            <td>
                                <a href="<?= site_url('produk/hapus_cart_produk'); ?>/<?= $produk['rowid']; ?>" class="remove-product"><i class="ion ion-ios-close"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Cart Content -->
        <div class="cart-content">
            <div class="row justify-content-between">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="cart-content-left">
                        <div class="ho-buttongroup">
                            <a href="<?= site_url('produk/kosongkan_keranjang'); ?>" class="ho-button ho-button-sm">
                                <span>Kosongkan Keranjang</span>
                            </a>
                            <a href="<?= site_url('produk'); ?>" class="ho-button ho-button-sm">
                                <span>Lanjutkan Belanja</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="cart-content-right">
                        <h3>TOTAL BELANJA</h3>
                        <table class="cart-pricing-table">
                            <tbody>
                                <tr class="cart-total">
                                    <td>Rp<?= number_format($this->cart->total(), 0, ',', '.'); ?></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="<?= site_url('checkout'); ?>" class="ho-button">
                            <span>Proses Pembayaran</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    /* Update item quantity */
    function updateCartItem(obj, rowid) {
        $.get("<?php echo base_url('produk/update_keranjang/'); ?>", {
            rowid: rowid,
            qty: obj.value
        }, function(resp) {
            if (resp == 'ok') {
                location.reload();
            } else {
                alert('Cart update failed, please try again.');
            }
        });
    }
</script>