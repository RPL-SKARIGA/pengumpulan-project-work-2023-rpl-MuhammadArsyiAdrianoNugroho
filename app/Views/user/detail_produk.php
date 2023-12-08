<?= $this->extend('layout/navbar') ?>

<?= $this->section('title') ?>
<title>Detail &mdash; Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-body">
        <div class="d-flex justify-content-center mx-5">
            <div class="text-center mx-3">
                <img src="/img/produk/<?= $produk['image']; ?>" class="postImage" style="width: 30vw;">
            </div>
            <div class="d-flex flex-column mx-3">
                <div>
                    <h5 class="card-title"><?= $produk['nama_produk']; ?></h5>
                    <p class="card-text">Deskripsi<br><?= $produk['deskripsi']; ?></p>
                    <p class="card-text">Make In:
                        <?= $produk['create_at']; ?></p>
                    <p class="card-text">Harga
                        Rp.<?= $produk['harga']; ?>
                    </p>
                </div>
                <div class="mt-auto">
                    <p>
                        <a href="/keranjang/add/<?= $produk['kode_produk']; ?>" type="submit" class="btn btn-outline-success"><i class="fas fa-pencil-alt">Tambah Keranjang</i></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>