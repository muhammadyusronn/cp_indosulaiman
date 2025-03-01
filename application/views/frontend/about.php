<div id="banner-area" class="banner-area" style="background-image:url(<?php base_url() ?>assets/frontend/images/indosulaimanmakmur/banner-5.jpeg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">About</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">company</a></li>
                                <li class="breadcrumb-item active" aria-current="page">About Us</li>
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
            <div class="col-lg-6">
                <?php
                if (count($data) > 0) { ?>
                    <?= $data[0]->isi ?>
                <?php }
                ?>
            </div><!-- Col end -->

            <div class="col-lg-6 mt-5 mt-lg-0">

                <img class="img-responsive" style="max-width: 350px;" src="<?= base_url() ?>uploads/file-konten/<?= isset($data) ? $data[0]->file : "Undefined" ?>" alt="File Not Found">
            </div><!-- Col end -->
        </div><!-- Content row end -->

    </div><!-- Container end -->
</section><!-- Main container end -->

<section id="facts" class="facts-area dark-bg">
    <div class="container">
        <div class="facts-wrapper">
            <div class="row">
                <div class="col-md-3 col-sm-6 ts-facts">
                    <div class="ts-facts-img">
                        <img
                            loading="lazy"
                            src="<?= base_url() ?>assets/frontend/images/icon-image/project.png"
                            style="max-width: 30%"
                            alt="facts-img" />
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num">
                            <span class="counterUp" data-count="1789">0</span>
                        </h2>
                        <h3 class="ts-facts-title">Total Pekerja</h3>
                    </div>
                </div>
                <!-- Col end -->

                <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-sm-0">
                    <div class="ts-facts-img">
                        <img
                            loading="lazy"
                            src="<?= base_url() ?>assets/frontend/images/icon-image/alumni.png"
                            style="max-width: 30%"
                            alt="facts-img" />
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num">
                            <span class="counterUp" data-count="647">0</span>
                        </h2>
                        <h3 class="ts-facts-title">Alumni</h3>
                    </div>
                </div>
                <!-- Col end -->

                <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                    <div class="ts-facts-img">
                        <img
                            loading="lazy"
                            src="<?= base_url() ?>assets/frontend/images/icon-image/mitra.png"
                            style="max-width: 30%"
                            alt="facts-img" />
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num">
                            <span class="counterUp" data-count="999">0</span>
                        </h2>
                        <h3 class="ts-facts-title">MITRA KAMI</h3>
                    </div>
                </div>
                <!-- Col end -->

                <div class="col-md-3 col-sm-6 ts-facts mt-5 mt-md-0">
                    <div class="ts-facts-img">
                        <img
                            loading="lazy"
                            src="<?= base_url() ?>assets/frontend/images/icon-image/global.png"
                            style="max-width: 30%"
                            alt="facts-img" />
                    </div>
                    <div class="ts-facts-content">
                        <h2 class="ts-facts-num">
                            <span class="counterUp" data-count="44">0</span>
                        </h2>
                        <h3 class="ts-facts-title">Total Pengunjung</h3>
                    </div>
                </div>
                <!-- Col end -->
            </div>
            <!-- Facts end -->
        </div>
        <!--/ Content row end -->
    </div>
    <!--/ Container end -->
</section>
<!-- Facts end -->