<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Detail &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="<?= site_url('admin/transaksi') ?>" class="btn btn-danger "><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Transaksi</h1>
    </div>
    <div class="section-body">
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
                                <h5>
                                    <strong><?= $p['nama_produk']; ?></strong>
                                </h5>
                            </div>

                            <div class="col-lg-4 col-md-6 mb-4 mb-lg-0  d-flex align-items-center justify-content-center">
                                <!-- Price -->
                                <h5>
                                    <strong><?= number_format($p['harga']); ?></strong>
                                </h5>
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
                        <div class="d-flex flex-column mb-4">
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="<?= ($transaksi->status >= 1) ? 'text-success' : ''?>">Pembayaran Selesai</div>
                                </div>
                                <?php
                                if ($transaksi->status >= 1) {
                                ?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/0') ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Batal</button>
                                </form>
                                <?php } else {?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/1') ?>" method="post">
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </form>
                                <?php }?>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="<?= ($transaksi->status >= 2) ? 'text-success' : ''?>">Proses Packing</div>
                                </div>
                                <?php
                                if ($transaksi->status >= 2) {
                                ?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/1') ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Batal</button>
                                </form>
                                <?php } else {?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/2') ?>" method="post">
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </form>
                                <?php }?>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="<?= ($transaksi->status >= 3) ? 'text-success' : ''?>">Dalam Pengiriman</div>
                                </div>
                                <?php
                                if ($transaksi->status >= 3) {
                                ?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/2') ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Batal</button>
                                </form>
                                <?php } else {?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/3') ?>" method="post">
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </form>
                                <?php }?>
                            </div>
                            <div class="d-flex justify-content-between mb-1">
                                <div class="d-flex align-items-center">
                                    <div class="<?= ($transaksi->status >= 4) ? 'text-success' : ''?>">Sudah Diterima</div>
                                </div>
                                <?php
                                if ($transaksi->status >= 4) {
                                ?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/3') ?>" method="post">
                                    <button type="submit" class="btn btn-danger">Batal</button>
                                </form>
                                <?php } else {?>
                                <form action="<?= site_url('admin/transaksi/update/'.$transaksi->id_transaksi.'/4') ?>" method="post">
                                    <button type="submit" class="btn btn-success">Selesai</button>
                                </form>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?= $this->endSection() ?>