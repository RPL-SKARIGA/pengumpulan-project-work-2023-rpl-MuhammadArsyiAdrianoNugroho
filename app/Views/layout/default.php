<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <?= $this->renderSection('title') ?>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/node_modules/@fortawesome/fontawesome-free/css/all.min.css">
    <!-- CSS Libraries -->

    <!-- Template CSS -->
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/style.css">
    <link rel="stylesheet" href="<?= base_url() ?>/template/assets/css/components.css">
</head>

<body>
    <div id="app">
        <div class="main-wrapper">
            <div class="navbar-bg" style="background-color: #bd1c32;"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="<?= base_url() ?>/template/assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, Admin</div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="<?= site_url('admin/logout') ?>" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i> Log Out
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="<?= site_url('admin') ?>"><img src="/img/SN2.png" style="width: 120px; height: auto;"></a>
                        <br>
                        <a href="<?= site_url('admin') ?>">Admin Secondnyot</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="<?= site_url('admin') ?>"><img src="/img/SN2.png" style="width: 60px; height: auto;"></a>
                    </div>
                    <ul class="sidebar-menu">
                        <?= $this->include('layout/menu'); ?>
                    </ul>

                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <?= $this->renderSection('content') ?>
            </div>

            <footer class="main-footer">
                <div class="footer-left">
                    Copyright &copy; 2023 <div class="bullet"></div> Developed By <a href="">Muhammad Arsyi Adriano Nugroho</a>
                </div>
                <div class="footer-right">
                    v1.0
                </div>
            </footer>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="<?= base_url() ?>/template/node_modules/jquery/dist/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template/node_modules/jquery.nicescroll/dist/jquery.nicescroll.min.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/stisla.js"></script>

    <!-- JS Libraies -->


    <!-- Template JS File -->
    <script src="<?= base_url() ?>/template/assets/js/scripts.js"></script>
    <script src="<?= base_url() ?>/template/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    <script>
        function previewImg() {
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            const imageLabel = document.querySelector('.custom-file-label');
            imageLabel.textContent = image.files[0].name;
            const fileImage = new FileReader();
            fileImage.readAsDataURL(image.files[0]);
            fileImage.onload = function(e) {
                imgPreview.src = e.target.result;
            }
        }
    </script>
</body>

</html>