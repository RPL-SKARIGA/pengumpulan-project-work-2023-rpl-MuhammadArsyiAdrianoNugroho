<?= $this->extend('layout/navbar') ?>

<?= $this->section('title') ?>
<title>Keranjang &mdash; Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('./css/cart.css') ?>">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="row d-flex justify-content-center my-4">
            <div class="col-md-8">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Keranjang</h5>
                    </div>
                    <?php
                    $data = [];
                    $grand = 0;
                    foreach ($produk as $p) :
                        foreach ($keranjang as $k) :
                            if ($p['kode_produk'] == $k['kode_produk']) :
                                array_push($data, $p['kode_produk'])
                    ?>
                                <div class="card-body">
                                    <!-- Single item -->
                                    <div class="row">
                                        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                            <!-- Image -->
                                            <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                                <img img src="/img/produk/<?= $p['image'] ?>" class="w-100" alt="" />
                                                <a href="#!">
                                                    <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                                </a>
                                            </div>
                                            <!-- Image -->
                                        </div>
                                        <div class="col-lg-5 col-md-6 mb-4 mb-lg-0">
                                            <!-- Data -->
                                            <h3><strong><?= $p['nama_produk']; ?></strong></p>
                                                <form action="/keranjang/delete/<?= $k['id_keranjang']; ?>" method="post" class="d-inline">
                                                    <?= csrf_field(); ?>
                                                    <input type="hidden" name=" _method" value="DELETE">
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                        </div>

                                        <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                                            <!-- Quantity -->
                                            <form action="/keranjang/update" method="post">
                                                <div class="d-flex mb-4" style="max-width: 300px">
                                                    <div class="form-outline">
                                                        <input name="id" value="<?= $k['kode_produk']; ?>" type="hidden" class="form-control" />
                                                        <!-- <label class="form-label" for="form1">Quantity</label> -->
                                                    </div>
                                                </div>
                                            </form>
                                            <!-- Quantity -->

                                            <!-- Price -->
                                            <p class="text-start text-md-center">
                                                <strong><?= number_format($k['harga']); ?></strong>
                                            </p>
                                            <!-- Price -->
                                        </div>
                                    </div>
                                    <!-- Single item -->
                                    <?php
                                    $grand += $k['harga'];
                                    ?>
                                    <hr class="my-4" />

                                    <!-- Single item -->

                                </div>
                    <?php
                                continue;
                            endif;
                        endforeach;
                    endforeach; ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Summary</h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3">
                                <div>
                                    <strong>Total Harga</strong>
                                </div>
                                <span><strong><?= number_format($grand); ?></strong></span>
                            </li>
                        </ul>
                        <form action="/keranjang/checkout" method="post">
                            <?= csrf_field(); ?>
                            <input type="hidden" value="<?= htmlspecialchars(implode(",", $data)) ?>" name="kode_produk">
                            <input type="hidden" value="<?= $grand ?>" name="total_harga">
                            <button type="submit" class="btn btn-primary btn-lg btn-block">
                                Go to checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection() ?>