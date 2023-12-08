<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Create &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin') ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Produk</h1>
    </div>
    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Create</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="/admin/save" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <?= $validation->listErrors(); ?>
                    <div class="form-group row my-3">
                        <label for="image" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-2">
                            <img src="/img/default.jpg" class="img-thumbnail img-preview">
                        </div>
                        <div class="col-sm-8">
                            <div class="input-group">
                                <label class="input-group-text" for="image"></label>
                                <label class="custom-file-label" for="image">Choose File
                                </label>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input 
                            <?= (session()->getFlashdata('image')) ? 'is-invalid' : ''; ?>" id="image" name="image" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('image'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>

                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control <?= (session()->getFlashdata('nama_produk')) ? 'is-invalid' : ''; ?>" required autofocus value="<?= old('nama_produk'); ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('nama_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kategori" class="col-sm-2 col-form text-black">Kategori</label>
                        <select class="form-select form-control <?= session()->getFlashdata('id_kategori') ? 'is-invalid' : ''; ?>" name="id_kategori" id="id_kategori" aria-label=".form-select-sm example" required>
                            <option disabled selected>Pilih Kategori</option>
                            <?php if (!empty($kategori)) : ?>
                                <?php foreach ($kategori as $k) : ?>
                                    <option value="<?= $k['id_kategori'] ?>" <?= old('id_kategori') == $k['id_kategori'] ? 'selected' : ''; ?>>
                                        <?= $k['nama_kategori'] ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <option value="">Tidak ada kategori</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" required autofocus value="<?= old('harga'); ?>">
                    </div>
                    <label>Deskripsi</label>
                    <textarea type="text" name="deskripsi" class="form-control" required autofocus value="<?= old('deskripsi'); ?>"></textarea>
                    <br>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Save</i></button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
</section>
<?= $this->endSection() ?>