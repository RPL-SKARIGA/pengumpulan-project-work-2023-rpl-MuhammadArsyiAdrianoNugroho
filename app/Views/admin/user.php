<?= $this->extend('layout/default') ?>

<?= $this->section('title') ?>
<title>User &mdash; Admin Secondnyot</title>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<section class="section">
    <div class="section-header">
        <h1>Table User</h1>
        <div class="section-header-button">
        </div>
    </div>
    <div class="section-body">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
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
                            <th class="text-center">Name</th>
                            <th class="text-center">Username</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Telepon</th>
                            <th class="text-center">Alamat</th>
                            <th class="text-center">Kota</th>
                            <th class="text-center">Provinsi</th>
                            <th class="text-center">Kode Pos</th>
                            <th class="text-center">Action</th>
                        </tr>
                        <tr>
                            <?php $i = 1; ?>
                            <?php foreach ($user as $u) : ?>
                                <th class="text-center" scope="row">
                                    <?= $i++; ?>
                                </th>
                                <td class="text-center">
                                    <?= $u['nama'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['username'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['email'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['telp'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['alamat'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['kota'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['provinsi'] ?>
                                </td>
                                <td class="text-center">
                                    <?= $u['kode_pos'] ?>
                                </td>
                                <td class="text-center">
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
                <?= $pager->links('customer', 'pager'); ?>
            </div>
        </div>
    </div>
    </div>
    <?= $this->endSection() ?>