<!DOCTYPE html>
<html>

<?= $this->extend('layout/navbar') ?>

<?= $this->section('title') ?>
<title>Welcome to Secondnyot</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>
<!-- End Services -->
<section class="products-grids trending pb-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <br>
                    <h2>Best Produk</h2>
                </div>
            </div>
        </div>
        <!-- product -->
        <div class="row mt-4">
            <?php foreach ($produk as $p) : ?>
                <div class="col-xl-3 col-lg-4 col-md-4 col-12">
                    <div class="single-product my-2">
                        <div class="product-img">
                            <a href="/user/detail_produk/<?= $p['slug']; ?>">
                                <img src="/img/produk/<?= $p['image'] ?>" class="img-fluid w-100 object-fit-cover" style="height: 15em;">
                            </a>
                        </div>
                        <div class="product-content">
                            <h3 class="text-center"><a href="product-detail.html"><?= $p['nama_produk'] ?></a></h3>
                            <div class="product-price text-center">
                                <span>Rp. <?= $p['harga'] ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?= $this->endSection() ?>  
</html>