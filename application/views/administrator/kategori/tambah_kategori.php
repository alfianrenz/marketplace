<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Tambah Kategori</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="">Tambah Kategori</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Tambah Kategori</h5>
                    </div>
                    <div class="card-body">
                        <form action="<?= site_url('kategori/tambah_kategori'); ?>" method="POST">

                            <div class="form-group row">
                                <div class="col-sm-2"></div>
                                <label for="b-t-name" class="col-sm-2 col-form-label">Nama Kategori <span class="text-danger">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="kategori" name="kategori" placeholder="Masukkan nama kategori" value="<?= set_value('kategori'); ?>">
                                    <?= form_error('kategori', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>

                            <div class="form-group row mt-4">
                                <div class="col-sm-4"></div>
                                <div class="col-sm-5">
                                    <a href="<?= site_url('kategori'); ?>" class="btn btn-warning"><i class="feather icon-rotate-ccw"></i>&nbsp;Kembali </a>
                                    <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>