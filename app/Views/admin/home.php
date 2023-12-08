<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Dashboard &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
        <div class="section-header-button">
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h4 style="color: black;">Produk</h4>
                <form class="d-flex" method="post">
                    <input type="text" class="form-control mx-2" placeholder="Search" name="keyword">
                    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                </form>
            </div>
            <a href="<?= site_url('admin/create') ?>" class="btn btn-success rounded-pill mx-4" style="width: 150px;">Create Produk</a>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Image</th>
                            <th>Name</th>
                            <th class="text-center">Kategori</th>
                            <th class="text-center">Harga</th>
                            <th class="text-center">Created At</th>
                            <th class="text-center">Updated At</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <tr>
                            <?php $i = 1; ?>
                            <?php foreach ($produk as $p) : ?>
                                    <th class="text-center" scope="row">
                                        <?= $i++; ?>
                                    </th>
                                    <td class="text-center">
                                        <img src="/img/produk/<?= $p['image'] ?>" class="gambar" style="width: 150px; height: auto ;">
                                    </td>
                                    <td>
                                        <?= $p['nama_produk'] ?>
                                    </td>
                                    <td class="text-center">
                                    <?php  
                                    if($p['id_kategori'] > 0) :
                                        foreach ($kategori as $k) :
                                            if($p['id_kategori'] == $k['id_kategori']):
                                                echo $k['nama_kategori'];
                                            endif;
                                        endforeach;
                                    else :
                                        echo 'none';
                                    endif;  ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p['harga'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p['create_at'] ?>
                                    </td>
                                    <td class="text-center">
                                        <?= $p['update_at'] ?>
                                    </td>
                                    <td class="text-center">
                                        <a href="/admin/detail/<?= $p['slug']; ?>" class="btn btn-warning btn-md">Detail</a>
                                        <form action="/admin/<?= $p['kode_produk']; ?>" method="post" class="d-inline">
                                            <?= csrf_field(); ?>
                                            <input type="hidden" name=" _method" value="DELETE">
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('apakah anda yakin?');">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                        </tr>
                <?php endforeach; ?>
                    </tbody>
                </table>
                <?= $pager->links('produk', 'pager'); ?>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endSection() ?>