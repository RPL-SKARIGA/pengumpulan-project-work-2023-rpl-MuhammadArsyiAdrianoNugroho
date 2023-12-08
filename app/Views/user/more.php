<?= $this->extend('layout/navbar') ?>

<?= $this->section('title') ?>
<title>More &mdash; Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('./css/cart.css') ?>">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <!-- Left -->
            <div class="col-md-9">
                <div class="rounded border py-2 px-4 mb-3 d-flex justify-content-center flex-wrap text-center">
                    <?php
                    $alfabet = range('A', 'Z');
                    foreach ($alfabet as $a) :
                    ?>
                    <a href="/more/<?= $a ?>" class="text-dark border py-1 px-2 my-1 mx-2 rounded bg-secondary"><?= $a ?></a>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <?php foreach ($produk as $p) : ?>
                        <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                            <div class="single-product my-2">
                                <div class="product-img">
                                    <a href="/user/detail_produk/<?= $p['slug']; ?>">
                                        <img src="/img/produk/<?= $p['image'] ?>" class="img-fluid w-100 object-fit-cover" style="height: 12em;">
                                    </a>
                                </div>
                                <div class="product-content pb-3">
                                    <div class="mb-2">
                                        <a href="product-detail.html" class="text-dark"><?= (strlen($p['nama_produk']) > 18) ? substr($p['nama_produk'], 0 ,18).'...' : $p['nama_produk'] ?></a>
                                    </div>
                                    <div class="d-flex justify-content-end" style="position: absolute; right: 23px;">
                                        <a href="/keranjang/add/<?= $p['kode_produk']; ?>" type="submit" class="btn btn-outline-success" style="padding: 5px 10px 5px 10px;"><i class="fa fa-plus"></i></a>
                                    </div>
                                    <div class="product-price fw-bold">
                                        <span>Rp. <?= $p['harga'] ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- Right -->
            <div class="col-md-3">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Kategori</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <?php foreach ($kategori as $k) : ?>
                        <a href="/more/<?= $k['id_kategori'] ?>" class="text-dark my-1"><?= $k['nama_kategori']?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Harga Mulai</h5>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex justify-content-between">
                            <a href="/more/termurah" class="text-dark" style="font-weight: bold;">Termurah</a>
                            &mdash;
                            <a href="/more/termahal" class="text-dark text-end" style="font-weight: bold;">Termahal</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection() ?>