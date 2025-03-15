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
                <form id="contact-form" action="<?= base_url('register') ?>" method="post" role="form" enctype="multipart/form-data">
                    <div class="error-container"></div>
                    <div class="alert alert-info">Mohon lengkali dengan data yang valid <br/> Catatan : <br/>
                    <span class="text-danger">*</span> Wajib di input</div>
                    <?php echo $this->session->flashdata('msg'); ?>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nama <span class="text-danger">*</span></label>
                                <input class="form-control form-control-name" name="nama" id="nama" placeholder="Nama sesuai dengan KTP" type="text" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Nomor Induk Kependudukan <span class="text-danger">*</span></label>
                                <input class="form-control form-control-name" name="nik" id="nik" placeholder="NIK sesuai dengan KTP" type="text" required>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Email <span class="text-danger">*</span></label>
                                <input class="form-control form-control-email" name="email" id="email" placeholder="" type="email"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Whatsapp <span class="text-danger">*</span></label>
                                <input class="form-control form-control-whatsapp" name="whatsapp" id="whatsapp" placeholder="Contoh : 6282186422722" type="text"
                                    required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-control form-control-subject" name="jenis_kelamin" id="jenis_kelamin" placeholder="" required>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Agama <span class="text-danger">*</span></label>
                                <select class="form-control form-control-subject" name="agama" id="agama" placeholder="" required>
                                    <?php foreach ($agama as $i): ?>
                                        <option value="<?= $i->id ?>"><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <label>Link Sosial Media (Fb, Istagram, X, Tiktok, dll) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control form-control-subject" name="sosial_media" id="sosial_media" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tempat Lahir <span class="text-danger">*</span></label>
                                <input class="form-control form-control-subject" name="tempat_lahir" id="tempat_lahir" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" class="form-control form-control-subject" name="tanggal_lahir" id="tanggal_lahir" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Usia <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-subject" name="usia" id="usia" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Tinggi Badan <span class="text-danger">*</span></label>
                                <input type="number" class="form-control form-control-subject" name="tinggi_badan" id="tinggi_badan" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pendidikan Terakhir <span class="text-danger">*</span></label>
                                <select class="form-control form-control-subject" name="pendidikan_terakhir" id="pendidikan_terakhir" placeholder="" required>
                                    <?php foreach ($pendidikan_terakhir as $i): ?>
                                        <option value="<?= $i->id ?>"><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dari mana anda mengetahui LPK kami? <span class="text-danger">*</span></label>
                                <select class="form-control form-control-subject" name="sumber_informasi" id="sumber_informasi" placeholder="" required>
                                    <?php foreach ($sumber_informasi as $i): ?>
                                        <option value="<?= $i->id ?>"><?= $i->object_text ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Alamat  <span class="text-danger">*</span></label>
                                <textarea class="form-control form-control-message" name="alamat" id="alamat" placeholder="" rows="5"
                                    required></textarea>
                            </div>
                        </div>
                    </div>
                    <h4>Mohon untuk upload semua file berikut dengan maksimum size 2MB</h4>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>File KTP (JPG/PNG/PDF) <span class="text-danger">*</span></label>
                                <input type="file" name="file_ktp" id="file_ktp" accept=".jpg, .jpeg, .png, .pdf"  required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Pas Foto (JPG/PNG) <span class="text-danger">*</span></label>
                                <input type="file" name="file_pas_foto" id="file_pas_foto" accept=".jpg, .jpeg, .png"  required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Ijazah Terakhir (PDF) <span class="text-danger">*</span></label>
                                <input type="file" name="file_ijazah_terakhir" id="file_ijazah_terakhir" accept="application/pdf"  required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>CV (PDF) <span class="text-danger">*</span></label>
                                <input type="file" name="file_cv" id="file_cv" accept="application/pdf"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>SKCK (PDF)</label>
                                <input type="file" name="file_skck" id="file_skck" accept="application/pdf">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>NPWP (PDF) <span class="text-danger">*</span></label>
                                <input type="file" name="file_npwp" id="file_npwp" accept="application/pdf"  required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>KIS (PDF) <span class="text-danger">*</span></label>
                                <input type="file" name="file_kis" id="file_kis" accept="application/pdf"  required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>BPJS (PDF) <span class="text-danger">*</span></label>
                                <input type="file" name="file_bpjs" id="file_bpjs" accept="application/pdf"  required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Kartu Keluarga (PDF) <span class="text-danger">*</span></label>
                                <input type="file" name="file_kk" id="file_kk" accept="application/pdf"  required>
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