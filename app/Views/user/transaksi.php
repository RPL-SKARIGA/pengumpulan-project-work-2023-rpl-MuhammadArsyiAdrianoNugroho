<?= $this->extend('layout/navbar') ?>

<?= $this->section('title') ?>
<title>Checkout &mdash; Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('./css/cart.css') ?>">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"> -->
<section class="h-100 gradient-custom">
    <div class="container py-5">
        <div class="card">
            <div class="card-header py-3">
                <h5 class="mb-0 text-center">DAFTAR CHECKOUT</h5>
            </div>
            <div class="card-body">
                <?php
                foreach ($transaksi as $t) :
                ?>
                <div class="d-flex justify-content-between">
                    <div class="d-flex align-items-center">
                        Dipesan : <?= $t['create_at'] ?>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php
                        $count = 0;
                        foreach ($detailTransaksi as $d) :
                            if ($d['id_transaksi'] == $t['id_transaksi']) {
                                $count += 1;
                            }
                        endforeach;
                        ?>
                        <?= $count . ' Produk'?>
                    </div>
                    <div class="d-flex align-items-center">
                        <?php
                        if ($t['status'] == 0) {
                            echo 'Proses Pembayaran';
                        }else if ($t['status'] == 1) {
                            echo 'Pembayaran Selesai';
                        } if ($t['status'] == 2) {
                            echo 'Proses Packing';
                        } if ($t['status'] == 3) {
                            echo 'Dalam Pengiriman';
                        } if ($t['status'] == 4) {
                            echo 'Sudah Diterima';
                        }
                        ?>
                    </div>
                    <a href="checkout/detail/<?= $t['id_transaksi'] ?>" class="btn btn-primary">Detail</a>
                </div>
                <hr>
                <?php
                endforeach;
                ?>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>