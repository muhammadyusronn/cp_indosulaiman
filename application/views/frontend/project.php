<div id="banner-area" class="banner-area" style="background-image:url(<?php base_url() ?>assets/frontend/images/indosulaimanmakmur/banner-5.jpeg)">
    <div class="banner-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="banner-heading">
                        <h1 class="banner-title">Project</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="#">Project</a></li>
                            </ol>
                        </nav>
                    </div>
                </div><!-- Col end -->
            </div><!-- Row end -->
        </div><!-- Container end -->
    </div><!-- Banner text end -->
</div><!-- Banner area end -->


<section id="project-area" class="project-area solid-bg">
    <div class="container">
        <div class="row text-center">
            <div class="col-lg-12">
                <h2 class="section-title">Pengalaman</h2>
                <h3 class="section-sub-title">Project Kami</h3>
            </div>
        </div>
        <!--/ Title row end -->

        <div class="row">
            <div class="col-12">
                <div class="shuffle-btn-group">
                    <label class="active" for="all">
                        <input
                            type="radio"
                            name="shuffle-filter"
                            id="all"
                            value="all"
                            checked="checked" />Show All
                    </label>
                    <label for="education">
                        <input
                            type="radio"
                            name="shuffle-filter"
                            id="education"
                            value="education" />Education
                    </label>
                </div>
                <!-- project filter end -->

                <div class="row shuffle-wrapper">
                    <div class="col-1 shuffle-sizer"></div>
                    <div
                        class="col-lg-4 col-md-6 shuffle-item"
                        data-groups='["infrastructure","education"]'>
                        <div class="project-img-container">
                            <a
                                class="gallery-popup"
                                href="<?= base_url() ?>assets/frontend/images/projects/project5.jpg"
                                aria-label="project-img">
                                <img
                                    class="img-fluid"
                                    src="<?= base_url() ?>assets/frontend/images/projects/project5.jpg"
                                    alt="project-img" />
                                <span class="gallery-icon"><i class="fa fa-plus"></i></span>
                            </a>
                            <div class="project-item-info">
                                <div class="project-item-info-content">
                                    <h3 class="project-item-title">
                                        <a href="">Kalas Metrorail</a>
                                    </h3>
                                    <p class="project-cat">Infrastructure</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- shuffle item 5 end -->
                </div>
                <!-- shuffle end -->
            </div>

            <div class="col-12">
                <div class="general-btn text-center">
                    <a class="btn btn-primary" href="">View All Projects</a>
                </div>
            </div>
        </div>
        <!-- Content row end -->
    </div>
    <!--/ Container end -->
</section>
<!-- Project area end -->