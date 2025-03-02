<div id="banner-area" class="banner-area" style="background-image:url(<?php base_url() ?>assets/frontend/images/indosulaimanmakmur/banner-5.jpeg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Register</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Register</a></li>
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
                <h3 class="column-title">Let's join us!</h3>
                <!-- contact form works with formspree.io  -->
                <!-- contact form activation doc: https://docs.themefisher.com/constra/contact-form/ -->
                <form id="contact-form" action="<?= base_url('register') ?>" method="post" role="form">
                    <div class="error-container"></div>
                    <div class="alert alert-info">Plase fill this form with a valid data!</div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama</label>
                                <input class="form-control form-control-name" name="nama" id="nama" placeholder="Nama sesuai dengan KTP" type="text" required>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nomor Induk Kependudukan</label>
                                <input class="form-control form-control-name" name="nik" id="nik" placeholder="NIK sesuai dengan KTP" type="text" required>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Whatsapp</label>
                                <input class="form-control form-control-whatsapp" name="whatsapp" id="whatsapp" placeholder="Contoh : 6282186422722" type="text"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tempat Lahir</label>
                                <input class="form-control form-control-subject" name="tempat_lahir" id="tempat_lahir" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" class="form-control form-control-subject" name="tanggal_lahir" id="tanggal_lahir" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Usia</label>
                                <input type="number" class="form-control form-control-subject" name="usia" id="usia" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tinggi Badan</label>
                                <input type="number" class="form-control form-control-subject" name="tinggi_badan" id="tinggi_badan" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan Terakhir</label>
                                <select class="form-control form-control-subject" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="" required>
                                <?php foreach($pendidikan_terakhir as $i): ?>
                                        <option value="<?= $i->id?>"><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label>Dari mana anda mengetahui LPK kami?</label>
                                <select class="form-control form-control-subject" name="sumber_informasi" id="sumber_informasi" placeholder="" required>
                                    <?php foreach($sumber_informasi as $i): ?>
                                        <option value="<?= $i->id?>"><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea class="form-control form-control-message" name="alamat" id="alamat" placeholder="" rows="5"
                                    required></textarea>
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