<?= $this->extend('layout/navbar') ?>

<?= $this->section('title') ?>
<title>Checkout &mdash; Secondnyot</title>
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
                        <h5 class="mb-0">Produk</h5>
                    </div>
                    <div class="card-body">
                    <?php
                    $grand = 0;
                    foreach ($produk as $p) :
                        foreach ($detailTransaksi as $d) :
                            if ($p['kode_produk'] == $d['kode_produk']) :
                    ?>
                        <!-- Single item -->
                        <div class="row">
                            <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
                                <!-- Image -->
                                <div class="bg-image hover-overlay hover-zoom ripple rounded" data-mdb-ripple-color="light">
                                    <img img src="/img/produk/<?= $p['image'] ?>" class="w-75" alt="" />
                                    <a href="#!">
                                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.2)"></div>
                                    </a>
                                </div>
                                <!-- Image -->
                            </div>
                            <div class="col-lg-5 col-md-6 mb-4 mb-lg-0 d-flex align-items-center">
                                <!-- Data -->
                                <h4>
                                    <strong><?= $p['nama_produk']; ?></strong>
                                </h4>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0  d-flex align-items-center justify-content-center">
                                <!-- Price -->
                                <h4>
                                    <strong><?= number_format($p['harga']); ?></strong>
                                </h4>
                                <!-- Price -->
                            </div>
                        </div>
                        <hr class="my-4" />
                        <!-- Single item -->
                    <?php
                        $grand += $p['harga'];
                                continue;
                            endif;
                        endforeach;
                    endforeach; 
                    ?>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-header py-3">
                        <h5 class="mb-0">Detail Status</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <strong>Total Harga</strong>
                            <span><strong><?=  number_format($grand) ?></strong></span>
                        </div>
                        <hr>
                        <div class="text-center mb-4">
                            <div class="<?= ($transaksi->status >= 1) ? 'text-success' : ''?>">Pembayaran Selesai</div>
                            <div class="<?= ($transaksi->status >= 2) ? 'text-success' : ''?>">|</div>
                            <div class="<?= ($transaksi->status >= 2) ? 'text-success' : ''?>">Proses Packing</div>
                            <div class="<?= ($transaksi->status >= 3) ? 'text-success' : ''?>">|</div>
                            <div class="<?= ($transaksi->status >= 3) ? 'text-success' : ''?>">Dalam Pengiriman</div>
                            <div class="<?= ($transaksi->status >= 4) ? 'text-success' : ''?>">|</div>
                            <div class="<?= ($transaksi->status >= 4) ? 'text-success' : ''?>">Sudah Diterima</div>
                        </div>
                        <hr>
                        <form action="/transaksi/remove" method="post">
                            <input type="hidden" name="id_transaksi" value="<?= $transaksi->id_transaksi?>">
                            <button type="submit" class="btn btn-danger btn-lg btn-block" <?= ($transaksi->status > 0) ? 'disabled' : ''?>>
                                Batal Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<?= $this->endSection() ?>