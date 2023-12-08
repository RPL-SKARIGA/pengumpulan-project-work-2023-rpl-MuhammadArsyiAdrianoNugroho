<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Transaksi &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Transaksi</h1>
        <div class="section-header-button">
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 style="color: black;">Table Transaksi</h4>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">User</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Produk</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Tanggal</th>
                            <th class="text-center"></th>
                        </tr>
                        <?php 
                        $i = 1;
                        foreach ($transaksi as $t) : 
                            foreach ($user as $u) :
                                if ($u['id'] == $t['id_customer']) :
                        ?>
                        <tr>
                            <th class="text-center" scope="row">
                                <?= $i++; ?>
                            </th>
                            <td class="text-center">
                                <?= $u['nama']; ?>
                            </td>
                            <td class="text-center">
                                <?= $u['alamat'] . ', ' .$u['kota'], ', ' .$u['provinsi'] ?>
                            </td>
                            <td class="text-center">
                                <?php
                                $count = 0;
                                foreach ($detailTransaksi as $d) :
                                    if ($d['id_transaksi'] == $t['id_transaksi']) {
                                        $count += 1;
                                    }
                                endforeach;
                                ?>
                                <?= $count . ' Produk'?>
                            </td>
                            <td class="text-center">
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
                            </td>
                            <td class="text-center">
                                <?= $t['create_at'] ?>
                            </td>
                            <td class="text-center">
                                <a href="<?= site_url('admin/transaksi/detail/'.$t['id_transaksi']) ?>" class="btn btn-primary">Detail</a>
                            </td>
                        </tr>
                        <?php 
                                endif;
                            endforeach;
                        endforeach; 
                        ?>
                    </tbody>
                </table>
                <?= $pager->links('transaksi', 'pager'); ?>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endSection() ?>