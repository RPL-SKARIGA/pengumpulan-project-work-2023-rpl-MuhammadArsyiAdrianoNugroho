<?= $this->extend('layout/navbar') ?>

<?= $this->section('title') ?>
<title>Edit Profile Secondnyot</title>
<?= $this->endSection() ?>


<?= $this->section('content') ?>

 <h2 class="text-center">EDIT PROFILE</h2>
<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
    <div class="login-brand text-center" >
        <img src="/img/profile.jpg" alt="logo" width="200" >
    </div>
    <div class="card card-primary">
        <div class="card-body">
        <form action="/home/uppro/<?= $user['id']; ?>" method="post" enctype="multipart/form-data">
        <?= csrf_field(); ?>
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" class="form-control <?= (session()->getFlashdata('username')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('username')) ?
                    old('username') : $user['username'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" class="form-control <?= (session()->getFlashdata('nama')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('nama')) ?
                    old('nama') : $user['nama'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('username'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control <?= (session()->getFlashdata('email')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('email')) ?
                    old('email') : $user['email'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('email'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="telp">Telepon</label>
                    <input type="text" name="telp" class="form-control <?= (session()->getFlashdata('telp')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('telp')) ?
                    old('telp') : $user['telp'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('telp'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" class="form-control <?= (session()->getFlashdata('alamat')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('alamat')) ?
                    old('alamat') : $user['alamat'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('alamat'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kota">Kota</label>
                    <input type="text" name="kota" class="form-control <?= (session()->getFlashdata('kota')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('kota')) ?
                    old('kota') : $user['kota'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('kota'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="provinsi">Provinsi</label>
                    <input type="text" name="provinsi" class="form-control <?= (session()->getFlashdata('provinsi')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('provinsi')) ?
                    old('provinsi') : $user['provinsi'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('provinsi'); ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="kode_pos">Kode Pos</label>
                    <input type="text" name="kode_pos" class="form-control <?= (session()->getFlashdata('kode_pos')) ? 'is-invalid' : ''; ?>" 
                    required autofocus value="<?= (old('kode_pos')) ?
                    old('kode_pos') : $user['kode_pos'] ?>">
                    <div class="invalid-feedback">
                    <?= session()->getFlashdata('kode_pos'); ?>
                    </div>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                        Save
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<br>

<?= $this->endSection() ?>