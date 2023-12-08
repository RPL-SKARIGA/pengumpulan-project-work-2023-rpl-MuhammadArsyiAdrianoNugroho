<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>Kategori &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Tabel Kategori</h1>
        <div class="section-header-button">
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <a href="<?= site_url('admin/crekat') ?>" class="btn btn-success rounded-pill mx-4" style="width: 150px;">Create Kategori</a>
                <form class="d-flex" method="post">
                    <input type="text" class="form-control mx-2" placeholder="Search" name="keyword">
                    <button class="btn btn-outline-success" type="submit" name="submit">Search</button>
                </form>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-striped table-md">
                    <tbody>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Name Kategori</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <tr>
                            <?php $i = 1; ?>
                            <?php foreach ($kategori as $k) : ?>
                                <th class="text-center" scope="row">
                                    <?= $i++; ?>
                                </th>
                                <td class="text-center">
                                    <?= $k['nama_kategori'] ?>
                                </td>
                                <td class="text-center">
                                <form action="/admin/dekat/<?= $k['id_kategori']; ?>" method="post" class="d-inline">
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
            </div>
        </div>
    </div>
    </div>
    <?= $this->endSection() ?>