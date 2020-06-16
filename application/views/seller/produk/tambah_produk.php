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
                            <li class="breadcrumb-item"><a href="#!">Tambah Produk</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- [ Main Content ] -->
        <form action="<?= site_url('produk/tambah_produk'); ?>" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- Foto Produk -->
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <h5>Tambah Produk</h5>
                        </div>
                        <div class="card-body">
                            <div class="input-group row">
                                <div class="col-sm-3 mr-4 ml-5">
                                    <!-- Preview Image -->
                                    <img src="<?= base_url('assets/admin/images/logo/icon-foto-produk.png'); ?>" width="300px" class="img-fluid mt-3" style="object-fit: cover" id="image-field">

                                    <!-- Custom Input File -->
                                    <button type="button" class="btn btn-outline-primary col-sm-12" onclick="document.getElementById('foto').click()"><i class="feather icon-camera"></i> Upload Foto</button>
                                    <input type="file" id="foto" name="foto" style="visibility: hidden" onchange="previewImage(event)">
                                </div>
                                <div class="col-sm-8 align-self-center">
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="nama" name="nama" aria-describedby="emailHelp" placeholder="Nama Produk" value="<?= set_value('nama'); ?>">
                                        <?= form_error('nama', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" id="kategori" name="kategori">
                                            <option>Pilih Kategori</option>
                                            <?php foreach ($kategori as $k) : ?>
                                                <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="form-control" name="kondisi">
                                            <option>Pilih Kondisi</option>
                                            <option value="Baru"> Baru</option>
                                            <option value="Bekas"> Bekas</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="harga" name="harga" placeholder="Harga Produk" value="<?= set_value('harga'); ?>">
                                        <?= form_error('harga', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" id="stok" name="stok" placeholder="Stok Produk" value="<?= set_value('stok'); ?>">
                                        <?= form_error('stok', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Deskripsi Produk </label>
                                        <textarea class="ckeditor" id="deskripsi" name="deskripsi" rows="1" placeholder=""></textarea>
                                        <?= form_error('deskripsi', '<small class="text-danger font-weight-bold">', '</small>'); ?>
                                    </div>
                                    <div class="form-group row mt-4">
                                        <div class="col-sm-9">
                                            <a href="<?= site_url('produk/daftar_produk'); ?>" class="btn btn-warning"><i class="feather icon-rotate-ccw"></i>&nbsp;Kembali </a>
                                            <button type="submit" class="btn btn-primary"><i class="feather icon-save"></i> Simpan</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>