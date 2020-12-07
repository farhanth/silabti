<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $tittle ?></title>
    <!-- plugins:css -->
    <script src="<?= base_url('/asset/js/jquery-3.5.1.min.js') ?>"></script>
    <link rel="stylesheet" href="<?= base_url('/asset/vendors/iconfonts/mdi/css/materialdesignicons.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('/asset/vendors/css/vendor.bundle.base.css') ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <!-- endinject -->
    <!-- inject:css -->
    <link rel="stylesheet" href="<?= base_url('/asset/css/style.css') ?>">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url('/asset/images/favicon.png') ?>" />
    <!--DataTables -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/DataTables/datatables.min.css') ?>" />
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.min.css" integrity="sha512-87wkTHUArAnTBwQ5XL6+G68i54R3TXYDZoXewRsdhIv/ztcEr2Z1Mrk+aXBCKOZUtih0XWiBhXv3/bWjHTL2Bw==" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker3.standalone.min.css" integrity="sha512-p4vIrJ1mDmOVghNMM4YsWxm0ELMJ/T0IkdEvrkNHIcgFsSzDi/fV7YxzTzb3mnMvFPawuIyIrHcpxClauEfpQg==" crossorigin="anonymous" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('/asset/js/jquery-ui/jquery-ui-1.12.1/jquery-ui.min.css') ?>">
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="<?= base_url() ?>"><img src="<?= base_url('/asset/images/logo_large.svg') ?>" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="<?= base_url() ?>"><img src="<?= base_url('/asset/images/logo_mini.svg') ?>" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="<?=base_url('profil/'.$this->session->userdata('npm'))?>" class="nav-link">
                            <div class="nav-profile-image">
                                <img src="<?= base_url('gambar_profil/'.$this->session->userdata('gambar_profil')) ?>" alt="profile">
                                <span class="login-status online"></span>
                                <!--change to offline or busy as needed-->
                            </div>
                            <div class="nav-profile-text d-flex flex-column">
                                <?php
                                    $nama = $this->session->userdata('nama_lengkap');
                                    $nama_edit = explode(" ", $nama);
                                    $nama_view = $nama;
                                    if (count($nama_edit) > 2) {
                                        $nama_view = $nama_edit[0]." ".$nama_edit[1]." ".substr($nama_edit[2], 0, 1).".";
                                    }
                                ?>
                                <span class="font-weight-bold mb-2"><?=$nama_view?></span>
                                <span class="text-secondary text-small"><?=$this->session->userdata('jabatan')?></span>
                            </div>
                            <i class="ml-2 mdi mdi-bookmark-check text-success nav-profile-badge"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard') ?>">
                            <span class="menu-title">Dashboard</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <?php if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Asisten Tetap" || $this->session->userdata('jabatan') == "AT (Editor)" || $this->session->userdata('jabatan') == "Staff"): ?>
                        <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#dropdown-absen" aria-expanded="false" aria-controls="ui-basic">
                          <span class="menu-title">Absen Asisten</span>
                          <i class="menu-arrow"></i>
                          <i class="mdi mdi-account-check menu-icon"></i>
                        </a>
                        <div class="collapse" id="dropdown-absen">
                          <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen/E531/1') ?>">E531</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen/E532/1') ?>">E532</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen/H402/1') ?>">H402</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen/H4045/1') ?>">H4045</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen/H406/1') ?>">H406</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen/H407/1') ?>">H407</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen/H408/1') ?>">H408</a></li>
                            <?php if ($this->session->userdata('jabatan') == "Staff"): ?>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('absen_action/manual') ?>">Tambah Manual</a></li>
                            <?php endif ?>
                          </ul>
                        </div>
                      </li>
                    <?php endif ?>
                    <?php if ($this->session->userdata('jabatan') == "Staff"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('list_rekap') ?>">
                            <span class="menu-title">List Rekap Absen</span>
                            <i class="mdi mdi-calendar-multiple-check menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="collapse" href="#dropdown-laporan-rekap" aria-expanded="false" aria-controls="ui-basic">
                          <span class="menu-title">Laporan Rekap Absen</span>
                          <i class="menu-arrow"></i>
                          <i class="mdi mdi-database menu-icon"></i>
                        </a>
                        <div class="collapse" id="dropdown-laporan-rekap">
                          <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('laporan_rekap/dasar') ?>">Lab. Dasar</a></li>
                            <li class="nav-item"> <a class="nav-link" href="<?= base_url('laporan_rekap/menengah_lanjut') ?>">Lab. Menengah & Lanjut</a></li>
                          </ul>
                        </div>
                    </li>
                    <?php endif ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('jadwal') ?>">
                            <span class="menu-title">Jadwal Asisten</span>
                            <i class="mdi mdi-calendar-clock menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('asisten') ?>">
                            <span class="menu-title">Asisten Aktif</span>
                            <i class="mdi mdi-account menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('matprak') ?>">
                            <span class="menu-title">Mata Praktikum</span>
                            <i class="mdi mdi-chemical-weapon menu-icon"></i>
                        </a>
                    </li>

                    <?php if ($this->session->userdata('jabatan') == "Staff"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('konfigurasi_rekap') ?>">
                            <span class="menu-title">Konfigurasi Rekap</span>
                            <i class="mdi mdi-credit-card-multiple menu-icon"></i>
                        </a>
                    </li>
                    <?php endif ?>

                    <?php if ($this->session->userdata('jabatan') == "Administrator" || $this->session->userdata('jabatan') == "Staff"): ?>
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('konfigurasi_web') ?>">
                            <span class="menu-title">Konfigurasi Web</span>
                            <i class="mdi mdi-settings menu-icon"></i>
                        </a>
                    </li>
                    <?php endif ?>

                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('logout') ?>">
                            <span class="menu-title">Logout</span>
                            <i class="mdi mdi-logout-variant menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>