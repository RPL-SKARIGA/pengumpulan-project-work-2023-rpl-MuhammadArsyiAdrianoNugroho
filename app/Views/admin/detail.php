<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Detail &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin') ?>" class="btn btn-danger "><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Produk</h1>
    </div>
    <div class="section-body">

        <div class="card">
            <div class="card-header">
                <h4>Detail </h4>
            </div>
            <div class="card-body col-md-6">
                <div class="form-group">
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row">
                            <div class="col">
                                <img src="/img/produk/<?= $produk['image']; ?>" class="img-fluid rounded-start" alt="">
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                                    <p class="card-text">Deskripsi<br><?= $produk['deskripsi']; ?></p>
                                    <p class="card-text">Make In:
                                        <?= $produk['create_at']; ?></p>
                                    <p class="card-text">Harga
                                        Rp.<?= $produk['harga']; ?>
                                    </p>
                                    <p>
                                        <a href="/admin/edit/<?= $produk['slug']; ?>" type="submit" class="btn btn-outline-info"><i class="fas fa-pencil-alt">Edit</i></a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                </form>
            </div>
        </div>
</section>
<?= $this->endSection() ?>