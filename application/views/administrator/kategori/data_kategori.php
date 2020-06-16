<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Kategori</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Kategori</a></li>
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
                        <h5 class="mt-2">Data Kategori</h5>
                        <a href="<?= site_url('kategori/tambah_kategori'); ?>" class="btn btn-primary btn-sm float-right"><i class="feather icon-plus"></i> Tambah Kategori </a>
                    </div>

                    <div class="card-body">
                        <div class="dt-responsive table-responsive">
                            <table id="report-table" class="table table-de table-hover nowrap">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="7%">No</th>
                                        <th>Nama Kategori</th>
                                        <th width="15%">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($kategori as $k) : ?>
                                        <tr>
                                            <td class="text-center align-middle"><?= $no++; ?></td>
                                            <td class="align-middle"><?= $k['nama_kategori']; ?></td>
                                            <td class="text-center">
                                                <a href="<?= site_url('kategori/edit_kategori'); ?>/<?= $k['id_kategori']; ?>" class="btn btn-success btn-sm"><i class="feather icon-edit"></i> Edit</a>
                                                <a href="<?= site_url('kategori/hapus_kategori'); ?>/<?= $k['id_kategori']; ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="feather icon-trash-2"></i> Hapus</a>
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