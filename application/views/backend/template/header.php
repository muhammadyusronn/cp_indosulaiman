<?php 
function rupiah($angka){
	$hasil_rupiah = number_format($angka, 0, ".", ".");
	return $hasil_rupiah;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <title><?= $title; ?></title>
    <!-- Title Icon -->
    <link rel="icon" type="image/x-icon" href="<?php base_url() ?>assets/frontend/images/logo.jpg">
    <!-- GLOBAL MAINLY STYLES-->
    <link href="<?= base_url() ?>assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="<?= base_url() ?>assets/vendors/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <link href="<?= base_url() ?>assets/vendors/DataTables/datatables.min.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="<?= base_url() ?>assets/css/main.min.css" rel="stylesheet" />
    <style>
    div.dt-top-container {
        display: grid;
        grid-template-columns: auto auto auto;
    }

    div.dt-center-in-div {
        margin: 0 auto;
    }

    div.dt-filter-spacer {
        margin: 10px 0;
    }
    </style>
    <!-- PAGE LEVEL STYLES-->
    <!-- TinyMCE CDN -->
    <script src="https://cdn.tiny.cloud/1/h1zw54ub7syl89f1z0812m1btp3ktda4hm9ibxlb4unu1je3/tinymce/7/tinymce.min.js" referrerpolicy="origin"></script>

    <script>
    tinymce.init({
        selector: 'textarea#editor',
    });
    </script>
</head>

<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand">
                <a class="link" href="<?= base_url('dash') ?>">
                    <a class="nav-link brand" data-toggle="dropdown">
                        <img src="<?= base_url() ?>assets/frontend/images/logo.jpg" style="max-width:30px;" />
                        <span class="ml-1"></span>PT ISM
                    </a>
                    <span class="brand-mini">
                        <img src="<?= base_url() ?>assets/frontend/images/logo.jpg" style="max-width:30px;" />
                    </span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link sidebar-toggler js-sidebar-toggler"><i class="ti-menu"></i></a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <img src="<?= base_url() ?>assets/img/admin-avatar.png" />
                            <span></span><?= $this->data['token']['nama'] ?><i class="fa fa-angle-down m-l-5"></i></a>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item" href="<?= base_url('logout') ?>"><i
                                    class="fa fa-power-off"></i>Logout</a>
                        </ul>
                    </li>
                </ul>
                <!-- END TOP-RIGHT TOOLBAR-->
            </div>
        </header>
        <!-- END HEADER-->
        <!-- START SIDEBAR-->
        <nav class="page-sidebar" id="sidebar">
            <div id="sidebar-collapse">
                <div class="admin-block d-flex">
                    <div>
                        <img src="<?= base_url() ?>assets/img/admin.png" width="45px" />
                    </div>
                    <div class="admin-info">
                        <div class="font-strong"><?= $this->data['token']['nama'] ?></div>
                        <small><?= ($this->data['token']['level'] == '1') ? 'Admin' : 'User' ?></small>
                    </div>
                </div>
                <ul class="side-menu metismenu">
                    <?php if ($this->data['token']['level'] != '3') { ?>
                    <li>
                        <a class="active" href="<?= base_url('dash') ?>"><i
                                class="sidebar-item-icon fa fa-th-large"></i>
                            <span class="nav-label">Dashboard</span>
                        </a>
                    </li>
                    <?php } ?>
                    <?php if ($this->data['token']['level'] == '1') { ?>
                    <li class="heading">MASTER</li>
                    <!-- <li>
                            <a class="active" href="<?= base_url('level') ?>"><i class="sidebar-item-icon fa fa-list"></i>
                                <span class="nav-label">Level User</span>
                            </a>
                        </li> -->
                    <!-- <li>
                        <a class="active" href="<?= base_url('jenis-konten') ?>"><i
                                class="sidebar-item-icon fa fa-book"></i>
                            <span class="nav-label">Jenis Konten</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a class="active" href="<?= base_url('admin') ?>"><i class="sidebar-item-icon fa fa-user"></i>
                            <span class="nav-label">User</span>
                        </a>
                    </li> -->
                    <!-- <li>
                        <a class="active" href="<?= base_url('galeri') ?>"><i class="sidebar-item-icon fa fa-photo"></i>
                            <span class="nav-label">Galeri</span>
                        </a>
                    </li>
                    <li>
                        <a class="active" href="<?= base_url('konten') ?>"><i
                                class="sidebar-item-icon fa fa-address-card-o"></i>
                            <span class="nav-label">Konten Website</span>
                        </a>
                    </li> -->
                    <?php } ?>
                    <?php if ($this->data['token']['level'] == '1' || $this->data['token']['level'] == '3') { ?>
                    <li class="heading">Transaksi</li>
                    <li>
                        <a class="active" href="<?= base_url('peserta') ?>"><i
                                class="sidebar-item-icon fa fa-address-card-o"></i>
                            <span class="nav-label">Peserta</span>
                        </a>
                    </li>
                    <?php } ?>

                   
                </ul>
            </div>
        </nav>
        <!-- END SIDEBAR-->