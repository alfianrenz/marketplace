<div class="pcoded-main-container">
    <div class="pcoded-content">

        <div class="user-profile user-card mb-4">
            <div class="card-header border-0 p-0 pb-0">
                <div class="cover-img-block">
                    <!-- <img src="assets/images/profile/cover.jpg" alt="" class="img-fluid"> -->
                    <div class="overlay"></div>
                    <div class="change-cover">
                        <div class="dropdown">
                            <a class="drp-icon dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="icon feather icon-camera"></i></a>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="#"><i class="feather icon-upload-cloud mr-2"></i>upload new</a>
                                <a class="dropdown-item" href="#"><i class="feather icon-image mr-2"></i>from photos</a>
                                <a class="dropdown-item" href="#"><i class="feather icon-film mr-2"></i> upload video</a>
                                <a class="dropdown-item" href="#"><i class="feather icon-trash-2 mr-2"></i>remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body py-0">
                <div class="user-about-block m-0">
                    <div class="row">
                        <div class="col-md-4 text-center mt-n5">
                            <div class="change-profile text-center">
                                <div class="dropdown w-auto d-inline-block">
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <div class="profile-dp">
                                            <div class="position-relative d-inline-block">
                                                <img class="img-radius img-fluid wid-100" src="<?= base_url('assets/upload/foto_user/' . $admin['foto_admin']); ?>" alt="User image">
                                            </div>
                                        </div>
                                        <div class="certificated-badge">
                                            <i class="fas fa-certificate text-c-blue bg-icon"></i>
                                            <i class="fas fa-check front-icon text-white"></i>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <h5 class="mb-1"><?= $admin['nama_admin']; ?></h5>
                            <p class="mb-2 text-muted">Administrator</p>
                        </div>
                        <div class="col-md-8 mt-md-4 mb-5">
                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-globe mr-2 f-18"></i>www.warma.bkmcic.com</a>
                                    <div class="clearfix"></div>
                                    <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-mail mr-2 f-18"></i><?= $admin['email_admin']; ?></a>
                                    <div class="clearfix"></div>
                                    <a href="#!" class="mb-1 text-muted d-flex align-items-end text-h-primary"><i class="feather icon-phone mr-2 f-18"></i><?= $admin['telepon_admin']; ?></a>
                                </div>
                                <div class="col-md-6">
                                    <div class="media">
                                        <i class="feather icon-map-pin mr-2 mt-1 f-18"></i>
                                        <div class="media-body">
                                            <p class="mb-0 text-muted">Universitas Catur Insan Cendekia</p>
                                            <p class="mb-0 text-muted">Jalan Kesambi No. 202</p>
                                            <p class="mb-0 text-muted">Kota Cirebon</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class=" col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="mt-2">Ubah Password</h5>
                    </div>
                    <div class="card-body">

                        <?= $this->session->userdata('message'); ?>

                        <form action="<?= site_url('profil/ubah_password_admin'); ?>" method="POST">
                            <div class="form-group row mt-3">
                                <div class="col-sm-3"></div>
                                <label for="b-t-name" class="col-sm-2 col-form-label">Password Lama</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="password_lama" name="password_lama" placeholder="Masukkan Password Lama">
                                    <?= form_error('password_lama', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <label for="b-t-name" class="col-sm-2 col-form-label">Password Baru</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="password_baru" name="password_baru" placeholder="Masukkan Password Baru">
                                    <?= form_error('password_baru', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-3"></div>
                                <label for="b-t-name" class="col-sm-2 col-form-label">Konfirmasi Password</label>
                                <div class="col-sm-4">
                                    <input type="password" class="form-control" id="konfirmasi_password" name="konfirmasi_password" placeholder="Konfirmasi Password Baru">
                                    <?= form_error('konfirmasi_password', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                </div>
                            </div>
                            <div class="form-group row mt-4">
                                <div class="col-sm-5"></div>
                                <div class="col-sm-5 mb-3">
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