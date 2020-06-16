<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Produk</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Daftar Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?= $this->session->userdata('message'); ?>

        <!-- [ Main Content ] -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-2">Daftar Produk</h5>
                    </div>
                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="report-table" class="table table-de table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Foto</th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Kategori</th>
                                        <th>Kondisi</th>
                                        <th>Stok</th>
                                        <th class="text-center">Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($produk as $p) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $no++; ?></td>
                                            <td class="align-middle">
                                                <img src="<?= base_url('assets/upload/foto_produk/' . $p['foto_produk']); ?>" alt="contact-img" title="contact-img" class="rounded mr-3" height="48" width="48" style="object-fit: cover">
                                            </td>
                                            <td class="align-middle"><?= $p['nama_produk']; ?></td>
                                            <td class="align-middle">Rp <?= number_format($p['harga_produk'], 0, ',', '.'); ?></td>
                                            <td class="align-middle"><?= $p['nama_kategori']; ?></td>
                                            <td class="align-middle"><?= $p['kondisi_produk']; ?></td>
                                            <td class="align-middle text-center"><?= $p['stok_produk']; ?></td>
                                            <td class="align-middle text-center">
                                                <?php if ($p['status_produk'] == 1) { ?>
                                                    <span class="badge badge-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="" class="btn btn-icon btn-outline-primary"><i class="feather icon-eye"></i></a>
                                                <a href="" class="btn btn-icon btn-outline-success"><i class="feather icon-edit"></i></a>
                                                <a href="" class="btn btn-icon btn-outline-danger"><i class="feather icon-trash-2"></i></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>