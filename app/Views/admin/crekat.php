<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Crekat &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin/kategori') ?>" class="btn btn-danger"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Create Kategori</h1>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header">
                <h4>Create</h4>
            </div>
            <div class="card-body col-md-6">
                <form action="/admin/sakat" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Nama Kategori</label>
                        <input type="text" name="nama_kategori" class="form-control <?= (session()->getFlashdata('nama_kategori')) ? 'is-invalid' : ''; ?>" required autofocus value="<?= old('nama_kategori'); ?>">
                        <div class="invalid-feedback">
                            <?= session()->getFlashdata('kategori'); ?>
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane">Save</i></button>
                        <button type="reset" class="btn btn-danger">Reset</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>