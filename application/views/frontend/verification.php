<div id="banner-area" class="banner-area" style="background-image:url(<?php base_url() ?>assets/frontend/images/indosulaimanmakmur/banner-5.jpeg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Verifikasi Register</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Register</a></li>
                                <li class="breadcrumb-item"><a href="#">VERIFIKASI REGISTER</a></li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->


<section id="main-container" class="main-container">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3 class="column-title">VERIFIKASI REGISTER</h3>
                <!-- contact form works with formspree.io  -->
                <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
                <form id="contact-form" action="<?= base_url('submit_verifikasi') ?>" method="post" role="form">
                    <div class="error-container"></div>
                    <div class="alert alert-info">Silahkan input kode verifikasi yang anda terima di email!</div>
                    <?php echo $this->session->flashdata('msg');?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control form-control-name" name="nama" id="nama" value="<?= $nama ?>" placeholder="Nama sesuai dengan KTP" type="text" readonly required>
                                <input class="form-control form-control-token" name="token" id="token" value="<?= $token ?>" type="hidden" readonly required>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nomor Induk Kependudukan</label>
                                <input class="form-control form-control-name" name="nik" id="nik" value="<?= $nik ?>" placeholder="NIK sesuai dengan KTP" type="text" readonly required>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control form-control-email" name="email" id="email" value="<?= $email ?>" placeholder="" type="email" readonly
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kode Verifikasi</label>
                                <input class="form-control form-control-kode_verifikasi" name="kode_verifikasi" id="kode_verifikasi" placeholder="6 digit kode verifikasi di email" type="text"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="text-right"><br>
                        <button class="btn btn-primary solid blank" type="submit">REGISTER</button>
                    </div>
                </form>
            </div>

        </div><!-- Content row -->
    </div><!-- Conatiner end -->
</section><!-- Main container end -->