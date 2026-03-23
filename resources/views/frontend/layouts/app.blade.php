<!doctype html>
  <html class="no-js is_dark" lang="zxx">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Home | Tutor123</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" type="image/x-icon" href=" {{ asset('assets/img/favicon.ico') }}" >
    <!-- Place favicon.ico in the root directory -->

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/aos.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper-bundle.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/webstyle.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">
    


    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem("theme-color") === "dark" || (!("theme-color" in localStorage) && window.matchMedia("(prefers-color-scheme: dark)").matches)) {
          document.documentElement.classList.add("is_dark");
        }
        if (localStorage.getItem("theme-color") === "light") {
          document.documentElement.classList.remove("is_dark");
        } 
      </script>
      @stack('styles')
    </head>

    <body class="body__wrapper">
      <!-- pre loader area start -->
      <div id="back__preloader">
        <div id="back__circle_loader"></div>
        <div class="back__loader_logo">
          <img loading="lazy" src="{{ asset('assets/img/pre.png') }}" alt="Preload">
        </div>
      </div>
      <!-- pre loader area end -->
      <main class="main_wrapper overflow-hidden">

        <!-- topbar__section__stert -->
        <div class="topbararea">
          <div class="container">
            <div class="row">
              <div class="col-xl-6 col-lg-6">
                <div class="topbar__left">
                  <ul>
                    <li>
                      Call Us: +1 647-996-0389
                    </li>
                    <li>
                      - Mail Us: info@tutor123.ca
                    </li>
                  </ul>
                </div>
              </div>
              <div class="col-xl-6 col-lg-6">
                <div class="topbar__right">
                  <div class="topbar__icon">
                    <i class="icofont-location-pin"></i>
                  </div>
                  <div class="topbar__text">
                    <p>1-3120 Rutherford Road, Vaughan ON L4K 0B1</p>
                  </div>
                  <div class="topbar__list">
                    <ul>
                      <!-- <li>
                        <a href="#"><i class="icofont-facebook"></i></a>
                      </li> -->
                      <!-- <li>
                        <a href="#"><i class="icofont-twitter"></i></a>
                      </li> -->
                      <li>
                        <a href="https://www.instagram.com/tutor123.ca" target="_blank"><i class="icofont-instagram"></i></a>
                      </li>
                      <li>
                        <a href="#" target="_blank"><i class="icofont-facebook"></i></a>
                      </li>
                      <li>
                        <a href="https://www.linkedin.com/company/tutor123/" target="_blank"><i class="icofont-linkedin"></i></a>
                      </li>
                      
                      <!-- <li>
                        <a href="#"><i class="icofont-youtube-play"></i></a>
                      </li> -->
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- topbar__section__end -->


        <!-- headar section start -->
        <header>
          <div class="headerarea headerarea__3 header__sticky header__area">
            <div class="container desktop__menu__wrapper">
              <div class="row">
                <div class="col-xl-2 col-lg-2 col-md-6">
                  <div class="headerarea__left">

                    <div class="headerarea__left__logo">
                      <a href="{{ url('/') }}">
                        <img loading="lazy" src="{{ asset('assets/img/logo/logo.png') }}" alt="Tutor123 Logo" class="site-logo">
                      </a>
                    </div>

                  </div>
                </div>
                <div class="col-xl-7 col-lg-7 main_menu_wrap">
                  <div class="headerarea__main__menu">
                    <nav>
                      <ul>
                        <li>
                          <a class="headerarea__has__dropdown {{ request()->is('/') ? 'active_menu' : '' }}" href="{{ url('/') }}">HOME
                          </a>
                        </li>
                        <li>
                          <a class="headerarea__has__dropdown {{ request()->is('about') ? 'active_menu' : '' }}" href="{{ url('about') }}">ABOUT US</a>
                        </li>
                        <li>
                          <a class="headerarea__has__dropdown" href="#">HOW IT WORKS</a>
                        </li>
                        <li>
                          <a class="headerarea__has__dropdown" href="#">COURSES</a>
                        </li>
                        <li>
                          <a class="headerarea__has__dropdown" href="#">PRICING</a>
                        </li>
                        <li>
                          <a class="headerarea__has__dropdown {{ request()->is('contact') ? 'active_menu' : '' }}" href="{{ url('contact') }}">CONTACT</a>
                        </li>
                      </ul>
                    </nav>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6">
                  <div class="headerarea__right">

                            <!-- <div class="headerarea__login">
                                <a href="login.html"><i class="icofont-user-alt-5"></i></a>
                              </div> -->
                              <div class="headerarea__button login_btn">
                                <a href="#" class="header_btn"> Login</a>
                              </div>
                              <div class="headerarea__button">
                                <a href="#" class="header_btn"> Book Demo</a>
                              </div>
                            </div>

                          </div>

                        </div>

                      </div>


                      <div class="container-fluid mob_menu_wrapper">
                        <div class="row align-items-center">
                          <div class="col-6">
                            <div class="mobile-logo">
                              <a class="logo__dark" href="{{ url('/') }}"><img loading="lazy"  src="{{ asset('assets/img/logo/logo.png') }}" alt="logo" class="site-logo"></a>
                            </div>
                          </div>
                          <div class="col-6">
                            <div class="header-right-wrap">

                              <div class="headerarea__right">

                              </div>

                              <div class="mobile-off-canvas">
                                <a class="mobile-aside-button" href="#"><i class="icofont-navigation-menu"></i></a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </header>
                  <!-- header section end -->
                  <!-- Mobile Menu Start Here -->
                  <div class="mobile-off-canvas-active">
                    <a class="mobile-aside-close"><i class="icofont  icofont-close-line"></i></a>
                    <div class="header-mobile-aside-wrap">
                      <div class="mobile-menu-wrap headerarea">

                        <div class="mobile-navigation">

                          <nav>
                            <ul class="mobile-menu">
                              <li class="menu-item-has-children"><a href="{{ url('/') }}">HOME</a></li>
                              <li class="menu-item-has-children"><a href="{{ url('about') }}">ABOUT US</a></li>
                              <li class="menu-item-has-children"><a href="#">HOW IT WORKS</a></li>
                              <li class="menu-item-has-children"><a href="#">COURSES</a></li>
                              <li class="menu-item-has-children"><a href="#">PRICING</a></li>
                              <li class="menu-item-has-children"><a href="{{ url('contact') }}">CONTACT</a></li>
                            </ul>
                          </nav>

                        </div>

                      </div>
           <!--  <div class="mobile-curr-lang-wrap">
                <div class="single-mobile-curr-lang">
                    <a class="mobile-account-active" href="#">My Account <i class="icofont-thin-down"></i></a>
                    <div class="lang-curr-dropdown account-dropdown-active">
                        <ul>
                            <li><a href="login.html">Login</a></li>
                            <li><a href="login.html">/ Create Account</a></li>
                            <li><a href="login.html">My Account</a></li>
                        </ul>
                    </div>
                </div>
              </div> -->
              <div class="mobile-social-wrap">
                <!-- <a class="facebook" href="#"><i class="icofont icofont-facebook"></i></a>
                <a class="twitter" href="#"><i class="icofont icofont-twitter"></i></a>
                <a class="pinterest" href="#"><i class="icofont icofont-pinterest"></i></a> -->
                <a class="instagram" href="https://www.instagram.com/tutor123.ca" target="_blank"><i class="icofont icofont-instagram"></i></a>
                <a class="linkedin" href="https://www.linkedin.com/company/tutor123/" target="_blank"><i class="icofont icofont-linkedin"></i></a>
              </div>
            </div>
          </div>
          <!-- Mobile Menu end Here -->

          <!-- theme fixed shadow -->
          <div>
            <div class="theme__shadow__circle"></div>
            <div class="theme__shadow__circle shadow__right"></div>
          </div>
          <!-- theme fixed shadow -->


          @yield('content')


          <!-- footer__section__start -->
          <div class="footerarea">
            <div class="container">
              <div class="footerline"></div>

              <div class="footerarea__wrapper footerarea__wrapper__2 sp_top_20">
                <div class="row">
                  <div class="col-xl-3 col-lg-4 col-sm-12 col-md-12" data-aos="fade-up">
                    <div class="footerarea__inner footerarea__about__us">
                      <div class="footerarea__icon ">
                        <ul>
                        <!-- <li><a href="//facebook.com"><i class="icofont-facebook"></i></a></li>
                          <li><a href="//twitter.com"><i class="icofont-twitter"></i></a></li> -->
                          <li><a href="https://www.instagram.com/tutor123.ca" target="_blank"><i class="icofont-instagram"></i></a></li>
                          <li><a href="#" target="_blank"><i class="icofont-facebook"></i></a></li>
                          <li><a href="https://www.linkedin.com/company/tutor123" target="_blank"><i class="icofont-linkedin"></i></a></li>
                          <!-- <li><a href="//skype.com"><i class="icofont-youtube-play"></i></a></li> -->
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="col-xl-2 col-lg-2 col-sm-6 col-md-6" data-aos="fade-up">
                    <div class="footerarea__inner">
                      <div class="footerarea__heading">
                        <h3>Usefull Links</h3>
                      </div>
                      <div class="footerarea__list">
                        <ul>
                          <li>
                            <a href="{{ url('/') }}">Home</a>
                          </li>
                          <li>
                            <a href="{{ url('about') }}">About Us</a>
                          </li>
                          <li>
                            <a href="{{ url('contact') }}">contact</a>
                          </li>
                        </ul>
                      </div>


                    </div>
                  </div>
                  <div class="col-xl-4 col-lg-3 col-sm-6 col-md-6" data-aos="fade-up">
                    <div class="footerarea__inner footerarea__padding__left">
                      <div class="footerarea__heading">
                        <h3>Countries</h3>
                      </div>

                      <div class="footerarea__list">
                        <div class="row">
                          <div class="col-6"><span class="fi fi-ca"></span> Canada</div>
                          <div class="col-6"><span class="fi fi-us"></span> USA</div>

                          <div class="col-6"><span class="fi fi-au"></span> Australia</div>
                          <div class="col-6"><span class="fi fi-in"></span> India</div>

                          <div class="col-6"><span class="fi fi-pk"></span> Pakistan</div>
                          <div class="col-6"><span class="fi fi-cn"></span> China</div>
                        </div>
                      </div>

                    </div>
                  </div>

                  <div class="col-xl-3 col-lg-3 col-sm-12" data-aos="fade-up">
                    <div class="footerarea__right__wraper footerarea__inner">

                      <div class="footerarea__right__list">
                        <div class="foter__bottom__text">
                          <div class="footer__bottom__icon">
                            <i class="icofont-clock-time"></i>
                          </div>
                          <div class="footer__bottom__content">
                            <h6>Opening Houres</h6>
                            <span>24/7 Available</span>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <div class="footerarea__copyright__wrapper footerarea__copyright__wrapper__2">
                <div class="row footerlogodiv">
                  <div class="col-xl-3 col-lg-3 col-md-3">
                    <div class="copyright__logo">
                      <a href="{{ url('/') }}"><img loading="lazy"  src="{{ asset('assets/img/logo/logo.png') }}" alt="logo" class="site-logo"></a>
                    </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-7">
                    <div class="footerarea__copyright__content footerarea__copyright__content__2">
                      <p>Copyright © <span>2026</span> by Tutor123. All Rights Reserved.</p>
                    </div>
                  </div>
                  <div class="col-xl-3 col-lg-3 col-md-2 text-lg-end text-start">
                    <div class="footerarea__icon ">
                      <div class="">

                            <!-- <div class="headerarea__login">
                                <a href="login.html"><i class="icofont-user-alt-5"></i></a>
                              </div> -->
                              <div class="headerarea__button">
                                <a  class="footercontact" href="{{ url('contact') }}">CONTACT</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- footer__section__end -->

              </main>

              <!-- JS here -->
              <script src="{{ asset('assets/js/vendor/modernizr-3.5.0.min.js') }}"></script>
              <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
              <script src="{{ asset('assets/js/popper.min.js') }}"></script>
              <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
              <script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
              <script src="{{ asset('assets/js/slick.min.js') }}"></script>
              <script src="{{ asset('assets/js/jquery.meanmenu.min.js') }}"></script>
              <script src="{{ asset('assets/js/ajax-form.js') }}"></script>
              <script src="{{ asset('assets/js/wow.min.js') }}"></script>
              <script src="{{ asset('assets/js/jquery.scrollUp.min.js') }}"></script>
              <script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
              <script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
              <script src="{{ asset('assets/js/waypoints.min.js') }}"></script>
              <script src="{{ asset('assets/js/jquery.counterup.min.js') }}"></script>
              <script src="{{ asset('assets/js/plugins.js') }}"></script>
              <script src="{{ asset('assets/js/swiper-bundle.min.js') }}"></script>
              <script src="{{ asset('assets/js/main.js') }}"></script>

            </body>
            </html>