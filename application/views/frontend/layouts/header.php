<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Basic Page Needs
================================================== -->
    <meta charset="utf-8" />
    <title>Indo Sulaiman Makmur</title>

    <!-- Mobile Specific Metas
================================================== -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="Construction Html5 Template" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />

    <!-- Favicon
================================================== -->
    <link rel="icon" type="image/png" href="<?php base_url() ?>assets/frontend/images/logo.jpg" />

    <!-- CSS
================================================== -->
    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?php base_url() ?>assets/frontend/plugins/bootstrap/bootstrap.min.css" />
    <!-- FontAwesome -->
    <link rel="stylesheet" href="<?php base_url() ?>assets/frontend/plugins/fontawesome/css/all.min.css" />
    <!-- Animation -->
    <link rel="stylesheet" href="<?php base_url() ?>assets/frontend/plugins/animate-css/animate.css" />
    <!-- slick Carousel -->
    <link rel="stylesheet" href="<?php base_url() ?>assets/frontend/plugins/slick/slick.css" />
    <link rel="stylesheet" href="<?php base_url() ?>assets/frontend/plugins/slick/slick-theme.css" />
    <!-- Colorbox -->
    <link rel="stylesheet" href="<?php base_url() ?>assets/frontend/plugins/colorbox/colorbox.css" />
    <!-- Template styles-->
    <link rel="stylesheet" href="<?php base_url() ?>assets/frontend/css/style.css" />
  </head>
  <body>
    <div class="body-inner">
      <div id="top-bar" class="top-bar">
        <div class="container">
          <div class="row">
            <div class="col-lg-8 col-md-8">
              <ul class="top-info text-center text-md-left">
                <li>
                  <i class="fas fa-map-marker-alt"></i>
                  <p class="info-text">
                    Jl. Jerapah Raya Kav. 28, Desa Jayamukti Kec. Cikarang
                    Pusat, Kab. Bekasi 17815
                  </p>
                </li>
              </ul>
            </div>
            <!--/ Top info end -->

            <div class="col-lg-4 col-md-4 top-social text-center text-md-right">
              <ul class="list-unstyled">
                <li>
                  <a
                    title="Facebook"
                    href="https://facebbok.com/themefisher.com">
                    <span class="social-icon"
                      ><i class="fab fa-facebook-f"></i
                    ></span>
                  </a>
                  <a title="Twitter" href="https://twitter.com/themefisher.com">
                    <span class="social-icon"
                      ><i class="fab fa-twitter"></i
                    ></span>
                  </a>
                  <a
                    title="Instagram"
                    href="https://instagram.com/themefisher.com">
                    <span class="social-icon"
                      ><i class="fab fa-instagram"></i
                    ></span>
                  </a>
                  <a title="Linkdin" href="https://github.com/themefisher.com">
                    <span class="social-icon"
                      ><i class="fab fa-github"></i
                    ></span>
                  </a>
                </li>
              </ul>
            </div>
            <!--/ Top social end -->
          </div>
          <!--/ Content row end -->
        </div>
        <!--/ Container end -->
      </div>
      <!--/ Topbar end -->
      <!-- Header start -->
      <header id="header" class="header-one">
        <div class="bg-white">
          <div class="container">
            <div class="logo-area">
              <div class="row align-items-center">
                <div
                  class="logo col-lg-3 text-center text-lg-left mb-3 mb-md-5 mb-lg-0">
                  <a class="d-block" href="">
                    <img
                      loading="lazy"
                      style="min-height: 50px"
                      src="<?php base_url() ?>assets/frontend/images/logo.jpg"
                      alt="Constra" />
                  </a>
                </div>
                <!-- logo end -->

                <div class="col-lg-9 header-right">
                  <ul class="top-info-box">
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                          <p class="info-box-title">Call Us</p>
                          <p class="info-box-subtitle">0812-9890-5289</p>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="info-box">
                        <div class="info-box-content">
                          <p class="info-box-title">Email Us</p>
                          <p class="info-box-subtitle">office@indosulaimanmakmur.com</p>
                        </div>
                      </div>
                    </li>
                    <li class="header-get-a-quote">
                      <a class="btn btn-primary" href="https://forms.gle/GrgH4nNc2kDo4Bks6" target="_blank">REGISTER</a>
                    </li>
                  </ul>
                  <!-- Ul end -->
                </div>
                <!-- header right end -->
              </div>
              <!-- logo area end -->
            </div>
            <!-- Row end -->
          </div>
          <!-- Container end -->
        </div>

        <div class="site-navigation">
          <div class="container">
            <div class="row">
              <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg navbar-dark p-0">
                  <button
                    class="navbar-toggler"
                    type="button"
                    data-toggle="collapse"
                    data-target=".navbar-collapse"
                    aria-controls="navbar-collapse"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div id="navbar-collapse" class="collapse navbar-collapse">
                    <ul class="nav navbar-nav mr-auto">
                      <li class="nav-item <?= ($active=="home") ? "active" : "" ?>">
                        <a class="nav-link" href="<?= base_url('home-page') ?>">Home</a>
                      </li>
                      <li class="nav-item dropdown <?= ($active=="company") ? "active" : "" ?>">
                        <a
                          href="#"
                          class="nav-link dropdown-toggle"
                          data-toggle="dropdown"
                          >Company <i class="fa fa-angle-down"></i
                        ></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="<?= base_url('about-page') ?>">About Us</a></li>
                          <li><a href="<?= base_url('visi-page') ?>">Visi & Misi</a></li>
                          <!-- <li><a href="<?= base_url('team-page') ?>">Our People</a></li> -->
                          <!-- <li><a href="<?= base_url('testimonials-page') ?>">Testimonials</a></li> -->
                        </ul>
                      </li>
                      <!--
                      <li class="nav-item dropdown">
                        <a
                          href="#"
                          class="nav-link dropdown-toggle"
                          data-toggle="dropdown"
                          >Projects <i class="fa fa-angle-down"></i
                        ></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="">Projects All</a></li>
                          <li>
                            <a href="">Projects Single</a>
                          </li>
                        </ul>
                      </li>
                      
                      <li class="nav-item dropdown">
                        <a
                          href="#"
                          class="nav-link dropdown-toggle"
                          data-toggle="dropdown"
                          >Features <i class="fa fa-angle-down"></i
                        ></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="typography.html">Typography</a></li>
                          <li><a href="404.html">404</a></li>
                          <li class="dropdown-submenu">
                            <a
                              href="#!"
                              class="dropdown-toggle"
                              data-toggle="dropdown"
                              >Parent Menu</a
                            >
                            <ul class="dropdown-menu">
                              <li><a href="#!">Child Menu 1</a></li>
                              <li><a href="#!">Child Menu 2</a></li>
                              <li><a href="#!">Child Menu 3</a></li>
                            </ul>
                          </li>
                        </ul>
                      </li>
                      -->
                      <li class="nav-item <?= ($active=="project") ? "active" : "" ?>">
                        <a class="nav-link" href="<?= base_url('project-page') ?>">Project</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">News</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('contact-page') ?>">Contact Us</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">FAQ</a>
                      </li>
                    </ul>
                  </div>
                </nav>
              </div>
              <!--/ Col end -->
            </div>
            <!--/ Row end -->

            <div class="nav-search">
              <span id="search"><i class="fa fa-search"></i></span>
            </div>
            <!-- Search end -->

            <div class="search-block" style="display: none">
              <label for="search-field" class="w-100 mb-0">
                <input
                  type="text"
                  class="form-control"
                  id="search-field"
                  placeholder="Type what you want and enter" />
              </label>
              <span class="search-close">&times;</span>
            </div>
            <!-- Site search end -->
          </div>
          <!--/ Container end -->
        </div>
        <!--/ Navigation end -->
      </header>
      <!--/ Header end -->