<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Seller</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Data Seller</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ Main Content ] -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-2">Data Seller</h5>
                    </div>

                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="report-table" class="table table-de table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>Foto</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Prodi</th>
                                        <th>Telepon</th>
                                        <th class="text-center">Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($seller as $s) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $no++; ?></td>
                                            <td class="align-middle">
                                                <img src="<?= base_url('assets/upload/foto_user/' . $s['foto_seller']); ?>" class="img-fluid img-radius wid-40" alt="">
                                            </td>
                                            <td class="align-middle"><?= $s['nama_mahasiswa']; ?></td>
                                            <td class="align-middle"><?= $s['email_seller']; ?></td>
                                            <td class="align-middle"><?= $s['nama_prodi']; ?></td>
                                            <td class="align-middle"><?= $s['telepon_seller']; ?></td>
                                            <td class="align-middle text-center">
                                                <?php if ($s['status_aktif'] == 1) { ?>
                                                    <span class="badge badge-success">Aktif</span>
                                                <?php } else { ?>
                                                    <span class="badge badge-danger">Tidak Aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="" class="btn btn-primary btn-sm"><i class="feather icon-eye"></i> Detail</a>
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