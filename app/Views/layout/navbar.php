<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?= $this->renderSection('title') ?>

    <!-- Fonts -->
    <link href="<?= base_url() ?>/template_user/assets/css/fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

    <!-- Icons -->
    <link href="<?= base_url() ?>/template_user/assets/css/nucleo-icons.css" rel="stylesheet">
    <link href="<?= base_url() ?>/template_user/assets/css/font-awesome.css" rel="stylesheet">

    <!-- Jquery UI -->
    <link type="text/css" href="<?= base_url() ?>/template_user/assets/css/jquery-ui.css" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="<?= base_url() ?>/template_user/assets/css/argon-design-system.min.css" rel="stylesheet">

    <!-- Main CSS-->
    <link type="text/css" href="<?= base_url() ?>/template_user/assets/css/style.css" rel="stylesheet">

    <!-- Optional Plugins-->
    <link rel="stylesheet" href="<?= base_url() ?>/template_user/assets/css/cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
</head>

<body>
    <header class="header clearfix">
        <div class="top-bar d-none d-sm-block">
            <div class="container">
                <div class="row">
                    <div class="col-6 text-left">
                        <ul class="top-links contact-info">
                            <li><i class="fa fa-whatsapp text-danger"></i> +62 8951 6239 933</li>
                        </ul>
                    </div>
                    <div class="col-6 text-right">
                        <ul class="top-links account-links">
                            <li><i class="fa fa-user-circle-o text-danger"></i> <a href="<?= site_url('home/profile') ?>"><?= session()->has('username') ? session()->get('username') : 'Profile';; ?></a></li>
                            <li><i class="fa fa-power-off text-danger"></i> <a href="<?= session()->has('userLogin') ? base_url('home/logout') : base_url('home/login'); ?>"><?= session()->has('userLogin') ? 'Logout' : 'Login'; ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-main border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-12 col-sm-6">
                        <a class="navbar-brand mr-lg-5" href="<?= site_url('home/') ?>">
                            <img src="<?php echo base_url('img/Banner.jpeg'); ?>" href="index.php">
                        </a>
                    </div>
                    <div class="col-lg-7 col-12 col-sm-6">
                        <form action="#" class="search">
                            <div class="input-group w-100">
                                <input type="text" class="form-control" placeholder="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-danger" type="submit">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-lg-2 col-12 col-sm-6">
                        <div class="right-icons pull-right d-none d-lg-block">
                            <div class="single-icon shopping-cart">
                                <a href="<?= site_url('keranjang') ?>"><i class="fa fa-shopping-cart fa-2x text-danger"></i></a>
                                <span class="badge badge-default"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="navbar navbar-main navbar-expand-lg navbar-light border-top border-bottom">
            <div class="container">

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-controls="main_nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href="<?= site_url('home/') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('home/more')?>">More</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= site_url('home/checkout')?>">Checkout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <?= $this->renderSection('content') ?>


    <footer class="footer bg" style="background-color: #bd1c32;">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-6 col-12">
                        <!-- Single Widget -->
                        <div class="single-footer about">
                            <div class="logo-footer">
                                <img src="<?php echo base_url('img/Banner.jpeg'); ?>" href="index.php" style="width: 450px; height: auto;">
                            </div>
                            <p class="text"></p>
                            <p class="call">if there is any problem, please contact the number below :<span>
                                    <a href="wa.me/+6289516239933">+62 08951 6239 933</a></span></p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <div class="single-footer social">
                            <h4>Location Store</h4>
                            <div class="contact">
                                <ul>
                                    <li>Jl. Raya Sengkaling No.304</li>
                                    <li>Malang</li>
                                    <li>+6289516239933</li>
                                    <br>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="copyright-inner border-top">
                        <div class="row">
                            <div class="col-lg-6 col-12">
                                <div class="left">
                                    <p>Copyright &copy; 2023 Developed By <a href="">Muhammad Arsyi Adriano Nugroho</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Core -->
    <script src="<?= base_url() ?>/template_user/js/core/jquery.min.js"></script>
    <script src="<?= base_url() ?>/template_user/js/core/popper.min.js"></script>
    <script src="<?= base_url() ?>/template_user/js/core/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/template_user/js/core/jquery-ui.min.js"></script>

    <!-- Optional plugins -->
    <script src="<?= base_url() ?>/template_user/assets/css/cdn.jsdelivr.net/npm/flatpickr"></script>

    <!-- Argon JS -->
    <script src="<?= base_url() ?>/template_user/assets/js/argon-design-system.js"></script>

    <!-- Main JS-->
    <script src="<?= base_url() ?>/template_user/assets/js/main.js"></script>
</body>