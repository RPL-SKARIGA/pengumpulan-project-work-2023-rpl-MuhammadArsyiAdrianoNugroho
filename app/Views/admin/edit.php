<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Edit &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin') ?>" class="btn btn-danger "><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Edit Produk</h1>
    </div>
    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Edit</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="/admin/update/<?= $produk['kode_produk']; ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="slug" value="<?= $produk['slug'] ?>">
                    <input type="hidden" name="oldimage" value="<?= $produk['image'] ?>">
                    <?= csrf_field(); ?>
                    <?= $validation->listErrors(); ?>
                    <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="text" name="nama_produk" class="form-control <?= (session()->getFlashdata('nama_produk')) ? 'is-invalid' : ''; ?>" required autofocus value="<?= (old('nama_produk')) ?
                         old('nama_produk') : $produk['nama_produk'] ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('nama_produk'); ?>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" required autofocus value="<?= (old('harga')) ?
                        old('harga') : $produk['harga'] ?>">
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <input name="deskripsi" type="text" class="form-control" required autofocus value="<?= (old('deskripsi')) ?
                        old('deskripsi') : $produk['deskripsi'] ?>">
                        <div class="form-group row my-3">
                            <label for="image" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-2">
                                <img src="/img/produk/<?= $produk['image']; ?>" class="img-thumbnail img-preview">
                            </div>
                            <div class="col-sm-8">
                                <div class="input-group">
                                    <label class="input-group-text" for="image">Choose File</label>
                                    <label class="custom-file-label" for="image">
                                        <?= $produk['image']; ?>
                                    </label>
                                </div>
                                <input class="form-control invisible <?= session()->getFlashdata('image') ? 'is-invalid' : ''; ?>" type="file" id="image" name="image" value="<?= old('image'); ?>" onchange="previewImg()">
                                <div class="invalid-feedback">
                                    <?= session()->getFlashdata('image'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Save</i></button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
</section>
<?= $this->endSection() ?>