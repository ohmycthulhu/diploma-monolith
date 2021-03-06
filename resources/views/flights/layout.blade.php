<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from transvelo.github.io/mytravel-html/html/flights/flights-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Apr 2021 15:37:38 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
<head>
  <!-- Title -->
  <title>Flight List | MyTravel - Responsive Website Template</title>

  <!-- Required Meta Tags Always Come First -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Favicon -->
  <link rel="shortcut icon" href="/favicon.png">

  <!-- Google Fonts -->
  <link href="http://fonts.googleapis.com/css?family=Lato:300,400,500,600,700" rel="stylesheet">
  <link href="http://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900&amp;display=swap" rel="stylesheet">

  <!-- CSS Implementing Plugins -->
  <link rel="stylesheet" href="/assets/vendor/font-awesome/css/fontawesome-all.min.css">
  <link rel="stylesheet" href="/assets/vendor/animate.css/animate.min.css">
  <link rel="stylesheet" href="/assets/css/font-mytravel.css">
  <link rel="stylesheet" href="/assets/vendor/custombox/dist/custombox.min.css">
  <link rel="stylesheet" href="/assets/vendor/hs-megamenu/src/hs.megamenu.css">
  <link rel="stylesheet" href="/assets/vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
  <link rel="stylesheet" href="/assets/vendor/fancybox/jquery.fancybox.css">
  <link rel="stylesheet" href="/assets/vendor/jquery-ui/themes/base/jquery-ui.min.css">
  <link rel="stylesheet" href="/assets/vendor/prism/prism.css">
  <link rel="stylesheet" href="/assets/vendor/slick-carousel/slick/slick.css">
  <link rel="stylesheet" href="/assets/vendor/flatpickr/dist/flatpickr.min.css">
  <link rel="stylesheet" href="/assets/vendor/bootstrap-select/dist/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="/assets/vendor/dzsparallaxer/dzsparallaxer.css">
  <link rel="stylesheet" href="/assets/vendor/ion-rangeslider/css/ion.rangeSlider.css">

  <!-- CSS MyTravel Template -->
  <link rel="stylesheet" href="/assets/css/theme.css">

</head>
<body>
<!-- ========== HEADER ========== -->
<header id="header" class="u-header u-header--dark-nav-links-xl u-header--show-hide-xl u-header--static-xl"
        data-header-fix-moment="500" data-header-fix-effect="slide">
  <div class="u-header__section u-header__shadow-on-show-hide py-4 py-xl-0">
    <!-- Topbar -->
    <div
        class="container-fluid u-header__hide-content u-header__topbar u-header__topbar-lg border-bottom border-color-8">
      <div class="d-flex align-items-center">
        <ul class="list-inline list-inline-dark u-header__topbar-nav-divider--dark mb-0">
          <li class="list-inline-item mr-0"><a href="tel:(000)999-898-999" class="u-header__navbar-link">(000)
              999 - 898 -999</a></li>
          <li class="list-inline-item mr-0"><a href="mailto:info@mytravel.com" class="u-header__navbar-link">info@mytravel.com</a>
          </li>
        </ul>
        <div class="ml-auto d-flex align-items-center">
          <ul class="list-inline mb-0 mr-2 pr-1">
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover"
                 href="https://www.facebook.com/" target="_blank">
                <span class="fab fa-facebook-f btn-icon__inner"></span>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover"
                 href="https://twitter.com/" target="_blank">
                <span class="fab fa-twitter btn-icon__inner"></span>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover"
                 href="https://www.instagram.com/" target="_blank">
                <span class="fab fa-instagram btn-icon__inner"></span>
              </a>
            </li>
            <li class="list-inline-item">
              <a class="btn btn-xs btn-icon btn-pill btn-soft-dark btn-bg-transparent transition-3d-hover"
                 href="https://www.linkedin.com/" target="_blank">
                <span class="fab fa-linkedin-in btn-icon__inner"></span>
              </a>
            </li>
          </ul>
          @guest
            <div
                class="position-relative px-3 u-header__login-form dropdown-connector-xl u-header__topbar-divider--dark">
              <a id="signUpDropdownInvoker" href="javascript:;"
                 class="d-flex align-items-center text-dark"
                 aria-controls="signUpDropdown" aria-haspopup="true" aria-expanded="true"
                 data-unfold-event="click" data-unfold-target="#signUpDropdown"
                 data-unfold-type="css-animation" data-unfold-duration="300" data-unfold-delay="300"
                 data-unfold-hide-on-scroll="true" data-unfold-animation-in="slideInUp"
                 data-unfold-animation-out="fadeOut">
                <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                <span class="d-inline-block font-size-14 mr-1">Sign in or Register</span>
              </a>
              <div id="signUpDropdown" class="dropdown-menu dropdown-unfold dropdown-menu-right py-0 mt-0"
                   aria-labelledby="signUpDropdownInvoker" style="min-width: 500px;">
                <div class="card rounded-xs">
                  <div>
                    <!-- Login -->
                    <div id="login" style="opacity: 1;" data-target-group="idForm"
                         class="animated fadeIn">
                      <form method="post"
                            action="{{ route('login') }}"
                            enctype="multipart/form-data">
                      @csrf
                      <!-- Header -->
                        <div class="card-header text-center">
                          <h3 class="h5 mb-0 font-weight-semi-bold">Login</h3>
                        </div>
                        <!-- End Header -->
                        <div class="card-body pt-6 pb-4">
                          <!-- Form Group -->
                          <div class="form-group pb-1">
                            <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                              <label class="sr-only" for="signinSrEmail">Email</label>
                              <div
                                  class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                <input type="text" class="form-control" name="email"
                                       id="signinSrEmail" placeholder="Email"
                                       aria-label="Email Or Username"
                                       aria-describedby="signinEmail" required=""
                                       data-msg="Please enter a valid email address."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                                <div class="input-group-append">
                                <span class="input-group-text" id="signinEmail">
                                    <span
                                        class="far fa-envelope font-size-20"></span>
                                </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Form Group -->
                          <!-- Form Group -->
                          <div class="form-group pb-1">
                            <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                              <label class="sr-only"
                                     for="signinSrPassword">Password</label>
                              <div
                                  class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                <input type="password" class="form-control"
                                       name="password"
                                       id="signinSrPassword" placeholder="Password"
                                       aria-label="Password"
                                       aria-describedby="signinPassword"
                                       required=""
                                       data-msg="Your password is invalid. Please try again."
                                       data-error-class="u-has-error"
                                       data-success-class="u-has-success">
                                <div class="input-group-prepend">
                              <span class="input-group-text" id="signinPassword">
                                  <span
                                      class="flaticon-password font-size-20"></span>
                              </span>
                                </div>
                              </div>
                            </div>
                          </div>
                          <!-- End Form Group -->
                          <div class="mb-3 pb-1">
                            <button type="submit"
                                    class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">
                              Login
                            </button>
                          </div>
                          <div class="d-flex justify-content-between mb-1">
                            <div class="custom-control custom-checkbox custom-control-inline">
                              <input type="checkbox" id="customCheckboxInline1"
                                     name="customCheckboxInline1"
                                     class="custom-control-input">
                              <label class="custom-control-label"
                                     for="customCheckboxInline1">Remember
                                me</label>
                            </div>
                            {{--                        <a class="js-animation-link text-primary font-size-14"--}}
                            {{--                           href="javascript:;" data-target="#forgotPassword"--}}
                            {{--                           data-link-group="idForm" data-animation-in="fadeIn"><u>Forgot--}}
                            {{--                            Password?</u></a>--}}
                          </div>
                          <div class="card-footer__bottom p-4 text-center font-size-14">
                            <span class="text-gray-1">Do not have an account?</span>
                            <a class="js-animation-link font-weight-bold"
                               href="javascript:;" data-target="#signup"
                               data-link-group="idForm" data-animation-in="fadeIn">Sign
                              Up</a>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- End Login -->

                    <!-- Signup -->
                    <div id="signup" style="opacity: 0; display: none;" data-target-group="idForm">
                      <form method="post"
                            action="{{ route('registration') }}"
                            enctype="multipart/form-data">
                      @csrf
                      <!-- Header -->
                        <div class="card-header text-center">
                          <h3 class="h5 mb-0 font-weight-semi-bold">Register</h3>
                        </div>
                        <!-- End Header -->
                        <div class="card-body pt-5 pb-4">
                          <div class="tab-content">
                            <div class="tab-pane fade active show"
                                 id="pills-one-code-sample"
                                 role="tabpanel"
                                 aria-labelledby="pills-one-code-sample-tab">
                              <!-- Form Group -->
                              <div class="form-group pb-1">
                                <div
                                    class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                  <label class="sr-only" for="name">Full Name</label>
                                  <div
                                      class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                    <input type="text" class="form-control"
                                           name="name"
                                           id="name" placeholder="Full Name"
                                           aria-label="Full Name"
                                           aria-describedby="normalname"
                                           required
                                           data-msg="Please enter a valid name."
                                           data-error-class="u-has-error"
                                           data-success-class="u-has-success">
                                    <div class="input-group-append">
                                  <span class="input-group-text"
                                        id="normalname">
                                      <span
                                          class="flaticon-browser-1 font-size-20"></span>
                                  </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- End Form Group -->

                              <!-- Form Group -->
                              <div class="form-group pb-1">
                                <div
                                    class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                  <label class="sr-only"
                                         for="signupSrEmail">Email</label>
                                  <div
                                      class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                    <input type="email" class="form-control"
                                           name="email"
                                           id="signupSrEmail" placeholder="Email"
                                           aria-label="Email"
                                           aria-describedby="signupEmail"
                                           required=""
                                           data-msg="Please enter a valid email address."
                                           data-error-class="u-has-error"
                                           data-success-class="u-has-success">
                                    <div class="input-group-append">
                                      <span class="input-group-text"
                                            id="signupEmail">
                                          <span
                                              class="far fa-envelope font-size-20"></span>
                                      </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- End Form Group -->

                              <!-- Form Group -->
                              <div class="form-group pb-1">
                                <div
                                    class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                                  <label class="sr-only"
                                         for="signupSrPassword">Password</label>
                                  <div
                                      class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                                    <input type="password" class="form-control"
                                           name="password" id="signupSrPassword"
                                           placeholder="Password"
                                           aria-label="Password"
                                           aria-describedby="signupPassword"
                                           required=""
                                           data-msg="Your password is invalid. Please try again."
                                           data-error-class="u-has-error"
                                           data-success-class="u-has-success">
                                    <div class="input-group-prepend">
                                  <span class="input-group-text"
                                        id="signupPassword">
                                      <span
                                          class="flaticon-password font-size-20"></span>
                                  </span>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <!-- End Form Group -->
                              <div class="mb-3 pb-1">
                                <button type="submit"
                                        class="btn btn-md btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">
                                  Register
                                </button>
                              </div>
                              <div class="d-flex justify-content-between mb-1">
                                <div class="custom-control custom-checkbox custom-control-inline">
                                  <input type="checkbox" id="customCheckboxInline2"
                                         name="customCheckboxInline2"
                                         required
                                         class="custom-control-input">
                                  <label class="custom-control-label"
                                         for="customCheckboxInline2">I have read and
                                    accept
                                    the <a href="#">Terms and Privacy
                                      Policy</a></label>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                    <!-- End Signup -->

                    <!-- Forgot Passwrd -->
                    <div id="forgotPassword" style="opacity: 0; display: none;"
                         data-target-group="idForm">
                      <!-- Header -->
                      <div class="card-header bg-light text-center py-3 px-5">
                        <h3 class="h6 mb-0 font-weight-semi-bold">Recover password</h3>
                      </div>
                      <!-- End Header -->
                      <div class="card-body px-10 py-5">
                        <!-- Form Group -->
                        <div class="form-group">
                          <div class="js-form-message js-focus-state border border-width-2 border-color-8 rounded-sm">
                            <label class="sr-only" for="recoverSrEmail">Your email</label>
                            <div
                                class="input-group input-group-tranparent input-group-borderless input-group-radiusless">
                              <input type="email" class="form-control" name="email"
                                     id="recoverSrEmail" placeholder="Your email"
                                     aria-label="Your email"
                                     aria-describedby="recoverEmail"
                                     required=""
                                     data-msg="Please enter a valid email address."
                                     data-error-class="u-has-error"
                                     data-success-class="u-has-success">
                              <div class="input-group-append">
                                                                    <span class="input-group-text" id="recoverEmail">
                                                                        <span
                                                                            class="far fa-envelope font-size-20"></span>
                                                                    </span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- End Form Group -->
                        <div class="mb-2">
                          <button type="submit"
                                  class="btn btn-sm btn-block btn-blue-1 rounded-xs font-weight-bold transition-3d-hover">
                            Recover Password
                          </button>
                        </div>
                        <div class="text-center font-size-14">
                          <span class="text-gray-1">Remember your password?</span>
                          <a class="js-animation-link font-weight-bold" href="javascript:;"
                             data-target="#login" data-link-group="idForm"
                             data-animation-in="fadeIn">Log In</a>
                        </div>
                      </div>
                    </div>
                    <!-- End Forgot Passwrd -->
                  </div>
                </div>
              </div>
            </div>
          @else
            <a href="{{ route('books.all') }}" class="text-black">
                <i class="flaticon-user mr-2 ml-1 font-size-18"></i>
                Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }}
            </a>
            <span class="mx-2">|</span>
            <a href="{{ route('logout') }}" class="text-black">
              Logout
            </a>
          @endguest
        </div>
      </div>
    </div>
    <!-- End Topbar -->
    <div id="logoAndNav" class="container-fluid py-xl-2 border-bottom-xl">
      <!-- Nav -->
      <nav class="js-mega-menu navbar navbar-expand-xl u-header__navbar u-header__navbar--no-space">
        <!-- Logo -->
        <a class="navbar-brand u-header__navbar-brand-default u-header__navbar-brand-center u-header__navbar-brand-text-dark-xl"
           href="/" aria-label="MyTour">
          <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="53px" style="margin-bottom: 0;">
            <path fill-rule="evenodd" class="fill-primary"
                  d="M53.175,51.207 C50.755,53.610 46.848,53.594 44.448,51.171 L40.766,47.484 C40.378,47.082 40.378,46.443 40.766,46.041 C41.164,45.628 41.821,45.617 42.233,46.016 L45.915,49.702 C47.503,51.246 50.030,51.246 51.619,49.702 C53.243,48.125 53.283,45.528 51.708,43.902 L50.100,42.291 C49.712,41.889 49.712,41.251 50.100,40.849 C50.498,40.436 51.155,40.425 51.567,40.823 L53.174,42.433 C53.186,42.444 53.198,42.456 53.210,42.468 C55.610,44.891 55.594,48.804 53.175,51.207 ZM47.857,37.404 C47.757,37.404 47.657,37.389 47.561,37.360 C47.561,37.360 47.561,37.360 47.561,37.360 C47.012,37.196 46.700,36.617 46.864,36.068 C48.542,30.412 47.740,24.309 44.659,19.280 C38.665,9.497 25.886,6.432 16.116,12.434 C16.085,12.456 16.054,12.475 16.021,12.493 C15.518,12.767 14.888,12.581 14.614,12.077 C14.340,11.574 14.526,10.943 15.029,10.669 C18.623,8.455 22.761,7.284 26.981,7.287 C29.178,7.289 31.363,7.608 33.469,8.234 C45.556,11.831 52.442,24.559 48.851,36.662 C48.719,37.102 48.315,37.403 47.857,37.404 ZM13.802,8.022 L12.765,6.983 C12.377,6.581 12.377,5.943 12.765,5.540 C13.163,5.128 13.820,5.116 14.232,5.515 L15.269,6.553 C15.657,6.956 15.657,7.594 15.269,7.996 C14.871,8.409 14.214,8.420 13.802,8.022 ZM9.654,3.868 L9.084,3.296 C7.495,1.753 4.968,1.752 3.379,3.296 C1.755,4.873 1.715,7.470 3.291,9.096 L10.083,15.900 C10.278,16.094 10.387,16.358 10.387,16.634 C10.387,17.208 9.923,17.672 9.350,17.672 C9.075,17.672 8.812,17.563 8.617,17.368 L1.824,10.566 C1.812,10.554 1.800,10.542 1.788,10.530 C-0.611,8.107 -0.596,4.195 1.824,1.792 C4.243,-0.612 8.150,-0.596 10.550,1.827 L11.121,2.399 C11.129,2.408 11.138,2.416 11.146,2.425 C11.544,2.838 11.533,3.495 11.121,3.894 C10.709,4.292 10.052,4.280 9.654,3.868 ZM7.742,19.850 C8.260,20.095 8.480,20.715 8.234,21.233 C5.232,27.580 5.635,35.016 9.305,41.001 C15.302,50.779 28.080,53.839 37.845,47.834 C37.876,47.813 37.908,47.793 37.940,47.775 C38.444,47.501 39.073,47.687 39.347,48.191 C39.621,48.695 39.435,49.326 38.932,49.599 C35.338,51.813 31.200,52.984 26.981,52.980 C23.606,52.979 20.273,52.228 17.223,50.782 C5.829,45.379 0.966,31.751 6.360,20.342 C6.606,19.824 7.225,19.603 7.742,19.850 ZM40.262,35.347 C40.601,35.280 40.951,35.386 41.196,35.631 L43.270,37.708 C43.675,38.113 43.675,38.770 43.270,39.176 L39.551,42.900 C37.191,45.264 33.364,45.264 31.004,42.900 L24.906,36.795 L21.491,40.215 C21.086,40.620 20.430,40.620 20.025,40.215 L17.951,38.138 C17.719,37.905 17.612,37.576 17.660,37.251 L18.624,30.501 L12.590,24.460 C11.040,22.907 11.040,20.390 12.590,18.837 C14.141,17.285 16.654,17.285 18.205,18.837 L24.077,24.716 L35.851,18.820 C36.250,18.620 36.732,18.699 37.048,19.015 L39.122,21.092 C39.527,21.498 39.527,22.155 39.122,22.561 L30.521,31.173 L35.622,36.277 L40.262,35.347 ZM20.758,38.012 L23.440,35.326 L20.454,32.337 L19.784,37.036 L20.758,38.012 ZM34.541,38.138 L28.318,31.907 C27.914,31.501 27.914,30.844 28.318,30.439 L36.919,21.826 L36.107,21.013 L24.333,26.910 C23.934,27.109 23.452,27.031 23.136,26.714 L16.735,20.306 C16.379,19.949 15.897,19.749 15.394,19.749 C14.347,19.750 13.498,20.600 13.499,21.649 C13.496,22.153 13.695,22.638 14.051,22.995 L20.449,29.401 L25.635,34.593 L32.464,41.432 C34.014,42.984 36.528,42.984 38.078,41.432 L41.064,38.442 L40.115,37.492 L35.474,38.421 C35.135,38.488 34.786,38.382 34.541,38.138 Z"></path>
          </svg>
          <span class="u-header__navbar-brand-text">MyTravel</span>
        </a>
        <!-- End Logo -->

        <!-- Responsive Toggle Button -->
        <button type="button" class="navbar-toggler btn u-hamburger u-hamburger--primary order-2 ml-3"
                aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                data-toggle="collapse" data-target="#navBar">
                            <span id="hamburgerTrigger" class="u-hamburger__box">
                                <span class="u-hamburger__inner"></span>
                            </span>
        </button>
        <!-- End Responsive Toggle Button -->

        <!-- Navigation -->
        <div id="navBar"
             class="navbar-collapse u-header__navbar-collapse collapse order-2 order-xl-0 pt-4 p-xl-0 position-relative">
          <ul class="navbar-nav u-header__navbar-nav">
            <!-- Flights -->
            <li class="nav-item hs-has-sub-menu u-header__nav-item" data-event="hover"
                data-animation-in="slideInUp" data-animation-out="fadeOut">
              <a id="flightsMenu"
                 class="nav-link u-header__nav-link u-header__nav-link-toggle u-header__nav-link-border"
                 href="javascript:;" aria-haspopup="true" aria-expanded="false"
                 aria-labelledby="flightsSubMenu">Flights</a>
              <!-- Flights Submenu -->
              <ul id="flightsSubMenu"
                  class="hs-sub-menu u-header__sub-menu u-header__sub-menu-rounded u-header__sub-menu-bordered hs-sub-menu-right u-header__sub-menu--spacer"
                  aria-labelledby="flightsMenu" style="min-width: 230px;">
                <li><a class="nav-link u-header__sub-menu-nav-link" href="flights-list.html">Sidebar</a>
                </li>
                <li><a class="nav-link u-header__sub-menu-nav-link" href="flights-booking.html">Flights
                    Booking</a></li>
              </ul>
              <!-- End Flights Submenu -->
            </li>
            <!-- End Flights -->

            <!-- Pages -->
            <li class="nav-item hs-has-mega-menu u-header__nav-item" data-event="hover"
                data-animation-in="slideInUp" data-animation-out="fadeOut" data-max-width="722px"
                data-position="right">
              <a id="pagesMegaMenu" class="nav-link u-header__nav-link u-header__nav-link-toggle"
                 href="javascript:;" aria-haspopup="true" aria-expanded="false">Pages</a>
              <!-- Pages - Mega Menu -->
              <div class="hs-mega-menu u-header__sub-menu u-header__sub-menu-rounded"
                   aria-labelledby="pagesMegaMenu">
                <div class="row">
                  <div class="col-12 col-xl-4">
                    <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/others/destination.html">Destination</a></li>
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/others/about.html">About us</a></li>
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/others/contact.html">Contact</a></li>
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/others/terms-conditions.html">Terms of Use</a></li>
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/others/faq.html">FAQs</a></li>
                    </ul>
                  </div>
                  <div class="col-12 col-xl-4">
                    <ul class="u-header__sub-menu-nav-group u-header__sub-menu-bordered mb-3">
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/blog/blog-list.html">Blog</a></li>
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/blog/blog-single.html">Blog Single</a></li>
                      <li><a class="nav-link u-header__sub-menu-nav-link"
                             href="/html/others/404.html">404</a></li>
                    </ul>
                  </div>
                  <div class="col-12 col-xl-4">
                    <a href="/documentation/index.html"
                       class="btn btn-soft-primary mb-3 w-100"><span
                          class="fas fa-laptop-code mr-2"></span>Documentation</a>
                    <a href="/starter/index.html" class="btn btn-soft-secondary w-100"><span
                          class="fas fa-th mr-2"></span>Starter</a>
                  </div>
                </div>
              </div>
              <!-- End Pages - Mega Menu -->
            </li>
            <!-- End Pages -->

          </ul>
        </div>
        <!-- End Navigation -->
      </nav>
      <!-- End Nav -->
    </div>
  </div>
</header>
<!-- ========== END HEADER ========== -->

<!-- ========== MAIN CONTENT ========== -->
<main id="content" role="main">
  @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->

<!-- ========== FOOTER ========== -->
<footer class="footer border-top border-gray-33 pt-4">
  <div class="space-bottom-2 space-top-1">
    <div class="container">
      <div class="row justify-content-xl-between">
        <div class="col-12 col-lg-4 col-xl-3dot1 mb-6 mb-md-10 mb-xl-0">
          <!-- Contacts -->
          <div class="d-md-flex d-lg-block">
            <div class="mb-5 mr-md-7 mr-lg-0">
              <h4 class="h6 mb-4 font-weight-bold">Need My Travel Help?</h4>
              <a href="tel:(888)-1234-56789">
                <div class="d-flex align-items-center">
                  <div class="mr-4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="40px">
                      <path fill-rule="evenodd" class="fill-primary"
                            d="M36.093,16.717 L33.133,16.717 L30.864,19.693 C30.717,19.886 30.487,20.000 30.244,20.000 C30.244,20.000 30.243,20.000 30.243,20.000 C30.000,20.000 29.771,19.888 29.623,19.695 L27.335,16.717 L24.372,16.717 C22.218,16.717 20.465,14.965 20.465,12.811 L20.465,3.907 C20.465,1.753 22.218,0.001 24.372,0.001 L36.093,0.001 C38.247,0.001 40.000,1.753 40.000,3.907 L40.000,12.811 C40.000,14.965 38.247,16.717 36.093,16.717 ZM38.437,3.907 C38.437,2.615 37.386,1.563 36.093,1.563 L24.372,1.563 C23.080,1.563 22.028,2.615 22.028,3.907 L22.028,12.811 C22.028,14.103 23.080,15.155 24.372,15.155 L27.721,15.155 C27.964,15.155 28.193,15.268 28.340,15.460 L30.240,17.934 L32.124,15.462 C32.272,15.269 32.502,15.155 32.746,15.155 L36.093,15.155 C37.386,15.155 38.437,14.103 38.437,12.811 L38.437,12.811 L38.437,3.907 ZM31.014,8.429 L31.014,9.647 C31.014,10.078 30.664,10.428 30.232,10.428 C29.801,10.428 29.451,10.078 29.451,9.647 L29.451,8.239 C29.451,7.618 29.876,7.089 30.485,6.953 C31.041,6.829 31.416,6.323 31.376,5.752 C31.337,5.186 30.881,4.730 30.316,4.691 C29.992,4.669 29.685,4.777 29.451,4.996 C29.216,5.216 29.086,5.514 29.086,5.834 C29.086,6.266 28.736,6.616 28.305,6.616 C27.873,6.616 27.523,6.266 27.523,5.834 C27.523,5.087 27.837,4.365 28.384,3.854 C28.939,3.336 29.663,3.081 30.423,3.132 C31.763,3.225 32.843,4.304 32.935,5.644 C33.024,6.927 32.225,8.068 31.014,8.429 ZM30.233,11.646 C30.438,11.646 30.640,11.729 30.785,11.874 C30.930,12.020 31.014,12.221 31.014,12.427 C31.014,12.633 30.930,12.834 30.785,12.980 C30.640,13.125 30.438,13.209 30.233,13.209 C30.027,13.209 29.825,13.125 29.680,12.980 C29.535,12.834 29.451,12.633 29.451,12.427 C29.451,12.221 29.535,12.020 29.680,11.874 C29.825,11.729 30.027,11.646 30.233,11.646 ZM14.440,16.019 L23.973,25.550 L24.760,24.764 C24.760,24.764 24.760,24.764 24.760,24.764 C24.760,24.764 24.761,24.763 24.761,24.763 L26.731,22.794 C27.574,21.951 28.695,21.487 29.887,21.487 C31.079,21.487 32.200,21.951 33.043,22.794 L38.693,28.442 C39.536,29.285 40.000,30.406 40.000,31.598 C40.000,32.790 39.536,33.910 38.693,34.753 L37.204,36.242 C34.780,38.665 31.557,40.000 28.129,40.000 C24.701,40.000 21.478,38.665 19.054,36.242 L13.486,30.676 C13.181,30.370 13.181,29.875 13.486,29.570 C13.792,29.265 14.286,29.265 14.592,29.570 L20.159,35.137 C22.288,37.265 25.118,38.438 28.129,38.438 C30.646,38.438 33.038,37.617 34.998,36.104 L25.313,26.421 L24.526,27.208 C24.221,27.513 23.726,27.513 23.421,27.208 L12.782,16.572 C12.636,16.425 12.553,16.227 12.553,16.019 C12.553,15.812 12.636,15.614 12.782,15.467 L16.092,12.158 C17.223,11.027 17.223,9.187 16.092,8.056 L10.448,2.413 C9.317,1.282 7.476,1.282 6.345,2.413 L4.928,3.830 L10.929,9.830 C11.234,10.135 11.234,10.630 10.929,10.935 C10.776,11.087 10.576,11.163 10.376,11.163 C10.176,11.163 9.976,11.087 9.824,10.935 L3.890,5.002 C0.490,9.418 0.812,15.794 4.856,19.837 L10.346,25.326 C10.651,25.631 10.651,26.126 10.346,26.431 C10.041,26.736 9.546,26.736 9.241,26.431 L3.751,20.943 C-1.253,15.940 -1.253,7.800 3.751,2.797 L5.240,1.308 C6.981,-0.432 9.813,-0.432 11.553,1.308 L17.197,6.951 C18.938,8.691 18.938,11.522 17.197,13.263 L14.440,16.019 ZM36.170,35.066 L37.588,33.648 C38.135,33.101 38.437,32.372 38.437,31.598 C38.437,30.823 38.135,30.094 37.587,29.547 L31.938,23.899 C31.390,23.351 30.662,23.049 29.887,23.049 C29.112,23.049 28.384,23.351 27.836,23.899 L26.418,25.316 L36.170,35.066 ZM11.492,12.280 C11.492,12.074 11.576,11.873 11.721,11.727 C11.866,11.581 12.068,11.498 12.274,11.498 C12.479,11.498 12.681,11.581 12.826,11.727 C12.971,11.873 13.055,12.074 13.055,12.280 C13.055,12.485 12.971,12.687 12.826,12.832 C12.681,12.977 12.479,13.061 12.274,13.061 C12.068,13.061 11.866,12.977 11.721,12.832 C11.576,12.687 11.492,12.485 11.492,12.280 ZM12.046,27.349 C12.252,27.349 12.453,27.433 12.599,27.578 C12.744,27.724 12.828,27.925 12.828,28.130 C12.828,28.336 12.744,28.538 12.599,28.683 C12.453,28.828 12.252,28.912 12.046,28.912 C11.841,28.912 11.639,28.828 11.494,28.683 C11.348,28.538 11.265,28.336 11.265,28.130 C11.265,27.925 11.348,27.724 11.494,27.578 C11.639,27.433 11.841,27.349 12.046,27.349 Z"/>
                    </svg>
                  </div>
                  <div>
                    <div class="mb-2 h6 font-weight-normal text-gray-1">Got Questions ? Call us
                      24/7!
                    </div>
                    <small class="d-block font-size-18 font-weight-normal text-primary">Call Us:
                      <span class="text-primary font-weight-semi-bold">(888) 1234 56789</span></small>
                  </div>
                </div>
              </a>
            </div>
            <div class="ml-md-6 ml-lg-0">
              <div class="mb-4">
                <h4 class="h6 font-weight-bold mb-2 font-size-17">Contact Info</h4>
                <address class="pr-4">
                                            <span class="mb-2 h6 font-weight-normal text-gray-1">
                                                PO Box CT16122 Collins Street West, Victoria 8007,Australia.
                                            </span>
                </address>
              </div>
              <ul class="list-inline mb-0">
                <li class="list-inline-item mr-2">
                  <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fab fa-facebook-f btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mr-2">
                  <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fab fa-twitter  btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mr-2">
                  <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fab fa-instagram btn-icon__inner"></span>
                  </a>
                </li>
                <li class="list-inline-item mr-2">
                  <a class="btn btn-icon btn-social btn-bg-transparent" href="#">
                    <span class="fab fa-linkedin-in btn-icon__inner"></span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
          <!-- End Contacts -->
        </div>
        <div class="col-12 col-md-6 col-lg-4 col-xl-1dot8 mb-6 mb-md-10 mb-xl-0">
          <h4 class="h6 font-weight-bold mb-2 mb-xl-4">Company</h4>
          <!-- List Group -->
          <ul class="list-group list-group-flush list-group-borderless mb-0">
            <li><a class="text-decoration-on-hover list-group-item list-group-item-action"
                   href="/html/others/about.html">About us</a></li>
            <li><a class="text-decoration-on-hover list-group-item list-group-item-action"
                   href="/html/others/contact.html">Careers</a></li>
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/terms-conditions.html">Terms of Use</a></li>
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/terms-conditions.html">Privacy Statement</a></li>
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/terms-conditions.html">Give Us Feedbacks</a></li>
          </ul>
          <!-- End List Group -->
        </div>

        <div class="col-12 col-md-6 col-lg-4 col-xl-1dot8 mb-6 mb-md-10 mb-xl-0">
          <h4 class="h6 font-weight-bold mb-2 mb-xl-4">Other Services</h4>
          <!-- List Group -->
          <ul class="list-group list-group-flush list-group-borderless mb-0">
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/about.html">Investor Relations</a></li>
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/about.html">Rewards Program</a></li>
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/about.html">PointsPLUS</a></li>
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/about.html">Partners</a></li>
            <li><a class="list-group-item list-group-item-action text-decoration-on-hover"
                   href="/html/others/about.html">List My Hotel</a></li>
          </ul>
          <!-- End List Group -->
        </div>

        <div class="col-12 col-md-6 col-lg-4 col-xl-1dot8 mb-6 mb-md-0">
          <h4 class="h6 font-weight-bold mb-2 mb-xl-4">Support</h4>
          <!-- List Group -->
          <ul class="list-group list-group-flush list-group-borderless mb-0">
            <li>
              <a class="list-group-item list-group-item-action text-decoration-on-hover"
                 href="/html/others/terms-conditions.html">Account</a>
            </li>
            <li>
              <a class="list-group-item list-group-item-action text-decoration-on-hover"
                 href="/html/others/terms-conditions.html">Legal</a>
            </li>
            <li>
              <a class="list-group-item list-group-item-action text-decoration-on-hover"
                 href="/html/others/contact.html">Contact</a>
            </li>
            <li>
              <a class="list-group-item list-group-item-action text-decoration-on-hover"
                 href="/html/others/terms-conditions.html">Affiliate Program</a>
            </li>
            <li>
              <a class="list-group-item list-group-item-action text-decoration-on-hover"
                 href="/html/others/terms-conditions.html">Privacy Policy</a>
            </li>
          </ul>
          <!-- End List Group -->
        </div>
        <div class="col-12 col-md-6 col-lg col-xl-3dot1">
          <div class="mb-4 mb-xl-2">
            <h4 class="h6 font-weight-bold mb-2 mb-xl-4">Mailing List</h4>
            <p class="m-0 text-gray-1">Sign up for our mailing list to get latest updates and offers.</p>
          </div>
          <form class="js-validate js-focus-state js-form-message" novalidate="novalidate">
            <label class="sr-only text-gray-1" for="subscribeSrEmailExample1">Your Email</label>
            <div class="input-group">
              <input type="email"
                     class="form-control height-54 font-size-14 border-radius-3 border-width-2 border-color-8"
                     name="email" id="subscribeSrEmailExample1" placeholder="Your Email"
                     aria-label="Your email address" aria-describedby="subscribeButtonExample3"
                     required="" data-msg="Please enter a valid email address."
                     data-error-class="u-has-error" data-success-class="u-has-success">
              <div class="input-group-append ml-3">
                <button class="btn btn-sea-green border-radius-3 height-54 min-width-112 font-size-14"
                        type="submit" id="subscribeButtonExample3">Subscribes
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <div class="border-top border-bottom border-color-8 space-1">
    <div class="container">
      <div class="row d-block d-xl-flex align-items-md-center">
        <div class="col-xl-4 mb-4 mb-xl-0">
          <!-- Logo -->
          <a class="d-inline-flex align-items-center" href="/" aria-label="MyTravel">
            <svg xmlns="http://www.w3.org/2000/svg" width="55px" height="53px" style="margin-bottom: 0;">
              <path fill-rule="evenodd" class="fill-primary"
                    d="M53.175,51.207 C50.755,53.610 46.848,53.594 44.448,51.172 L40.766,47.484 C40.378,47.082 40.378,46.444 40.766,46.041 C41.164,45.628 41.821,45.617 42.233,46.016 L45.915,49.702 C47.503,51.246 50.030,51.246 51.619,49.703 C53.243,48.125 53.283,45.528 51.708,43.902 L50.100,42.291 C49.712,41.889 49.712,41.251 50.100,40.849 C50.498,40.436 51.155,40.425 51.567,40.823 L53.174,42.433 C53.186,42.445 53.198,42.457 53.210,42.469 C55.610,44.892 55.594,48.804 53.175,51.207 ZM47.857,37.404 C47.757,37.404 47.657,37.389 47.561,37.360 C47.561,37.360 47.561,37.360 47.561,37.360 C47.012,37.196 46.700,36.618 46.864,36.068 C48.542,30.413 47.740,24.309 44.659,19.281 C38.665,9.497 25.886,6.432 16.116,12.435 C16.085,12.456 16.054,12.476 16.021,12.493 C15.518,12.767 14.888,12.581 14.614,12.077 C14.340,11.574 14.526,10.943 15.029,10.669 C18.623,8.455 22.761,7.284 26.981,7.288 C29.178,7.289 31.363,7.608 33.469,8.235 C45.556,11.831 52.442,24.559 48.851,36.662 C48.719,37.102 48.315,37.404 47.857,37.404 ZM13.802,8.022 L12.765,6.984 C12.377,6.581 12.377,5.943 12.765,5.540 C13.163,5.128 13.820,5.116 14.232,5.515 L15.269,6.554 C15.657,6.956 15.657,7.594 15.269,7.996 C14.871,8.409 14.214,8.420 13.802,8.022 ZM9.654,3.868 L9.084,3.297 C7.495,1.753 4.968,1.753 3.379,3.296 C1.755,4.874 1.715,7.470 3.291,9.097 L10.083,15.900 C10.278,16.095 10.387,16.358 10.387,16.634 C10.387,17.207 9.923,17.672 9.350,17.672 C9.075,17.672 8.812,17.563 8.617,17.368 L1.824,10.566 C1.812,10.554 1.800,10.542 1.788,10.530 C-0.611,8.108 -0.596,4.195 1.824,1.792 C4.243,-0.611 8.150,-0.595 10.550,1.827 L11.121,2.399 C11.129,2.408 11.138,2.417 11.146,2.425 C11.544,2.837 11.533,3.495 11.121,3.893 C10.709,4.292 10.052,4.281 9.654,3.868 ZM7.742,19.850 C8.260,20.096 8.480,20.715 8.234,21.233 C5.232,27.580 5.635,35.016 9.305,41.001 C15.302,50.780 28.080,53.839 37.845,47.834 C37.876,47.813 37.908,47.793 37.940,47.775 C38.444,47.501 39.073,47.687 39.347,48.191 C39.621,48.695 39.435,49.325 38.932,49.600 C35.338,51.814 31.200,52.984 26.981,52.981 C23.606,52.979 20.273,52.228 17.223,50.782 C5.829,45.380 0.966,31.752 6.360,20.342 C6.606,19.824 7.225,19.604 7.742,19.850 ZM40.262,35.347 C40.601,35.281 40.951,35.387 41.196,35.631 L43.270,37.708 C43.675,38.114 43.675,38.771 43.270,39.176 L39.551,42.900 C37.191,45.264 33.364,45.264 31.004,42.900 L24.906,36.795 L21.491,40.215 C21.086,40.620 20.430,40.620 20.025,40.215 L17.951,38.138 C17.719,37.905 17.612,37.576 17.660,37.251 L18.624,30.501 L12.590,24.460 C11.040,22.908 11.040,20.390 12.590,18.838 C14.141,17.285 16.654,17.285 18.205,18.838 L24.077,24.716 L35.851,18.820 C36.250,18.620 36.732,18.699 37.048,19.015 L39.122,21.092 C39.527,21.497 39.527,22.155 39.122,22.560 L30.521,31.173 L35.622,36.277 L40.262,35.347 ZM20.758,38.012 L23.440,35.327 L20.454,32.337 L19.784,37.036 L20.758,38.012 ZM34.541,38.138 L28.318,31.907 C27.914,31.501 27.914,30.844 28.318,30.438 L36.919,21.826 L36.107,21.013 L24.333,26.910 C23.934,27.109 23.452,27.031 23.136,26.714 L16.735,20.306 C16.379,19.949 15.897,19.749 15.394,19.749 C14.347,19.750 13.498,20.600 13.499,21.649 C13.496,22.154 13.695,22.638 14.051,22.995 L20.449,29.401 L25.635,34.593 L32.464,41.432 C34.014,42.984 36.528,42.984 38.078,41.432 L41.064,38.442 L40.115,37.492 L35.474,38.421 C35.135,38.488 34.786,38.382 34.541,38.138 Z"/>
            </svg>
            <span class="brand brand-dark">MyTravel</span>
          </a>
          <!-- End Logo -->
        </div>
        <div class="bootstrap-select__custom col-xl-8 d-block d-lg-flex justify-content-xl-end align-items-center">
          <div class="mb-4 mb-lg-0">
            <ul class="d-flex list-unstyled mb-0">
              <li class="mr-2 ml-0"><img class="max-width-40" src="/assets/img/icons/img3.png"
                                         alt="Payment Icons"></li>
              <li class="mx-2"><img class="max-width-40" src="/assets/img/icons/img4.png"
                                    alt="Payment Icons"></li>
              <li class="mx-2"><img class="max-width-40" src="/assets/img/icons/img5.png"
                                    alt="Payment Icons"></li>
              <li class="mx-2"><img class="max-width-40" src="/assets/img/icons/img6.png"
                                    alt="Payment Icons"></li>
              <li class="ml-2 mr--0"><img class="max-width-40" src="/assets/img/icons/img7.png"
                                          alt="Payment Icons"></li>
            </ul>
          </div>
          <select
              class="js-select selectpicker dropdown-select min-width-256 w-100 w-md-auto border-radius-3 mb-3 mb-md-0 mr-md-5"
              data-style="border border-width-2 border-color-8">
            <option class="border-bottom py-2 font-size-16" value="one" selected>English(United States)
            </option>
            <option class="border-bottom py-2 font-size-16" value="one">English(United Kingdom)</option>
            <option class="border-bottom py-2 font-size-16" value="one">English</option>
            <option class="border-bottom py-2 font-size-16" value="two">Deutsch</option>
            <option class="border-bottom py-2 font-size-16" value="two">Francais</option>
            <option class="py-2 font-size-16" value="four">Espanol</option>
          </select>
          <select class="js-select selectpicker dropdown-select pr-0 max-width-155 w-100 border-radius-3"
                  data-style="border border-width-2 border-color-8">
            <option class="border-bottom py-2 font-size-16" value="one" selected>$ USD</option>
            <option class="border-bottom py-2 font-size-16" value="two">??? EUR</option>
            <option class="border-bottom py-2 font-size-16" value="three">??? TL</option>
            <option class="py-2 font-size-16" value="four">??? RUB</option>
          </select>
        </div>
      </div>
    </div>
  </div>
  <div class="space-1">
    <div class="container">
      <div class="d-lg-flex d-md-block justify-content-between align-items-center">
        <!-- Copyright -->
        <p class="text-muted mb-3 mb-lg-0 text-gray-1">?? 2020 MyTravel. All rights reserved</p>
        <!-- End Copyright -->

        <!-- Social Networks -->
        <ul class="list-inline mb-0">
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/index.html">Home</a>
          </li>
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/home-v4.html">Hotel</a>
          </li>
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/home-v5.html">Tour</a>
          </li>
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/home-v6.html">Activity</a>
          </li>
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/home-v7.html">Rental</a>
          </li>
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/home-v8.html">Car</a>
          </li>
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/home-v9.html">Yacht</a>
          </li>
          <li class="list-inline-item  pb-3 pb-md-0">
            <a class="list-group-item-action text-decoration-on-hover pr-3" href="/html/home/home-v10.html">Flights</a>
          </li>
          <li class="list-inline-item">
            <a class="list-group-item-action text-decoration-on-hover" href="/html/others/destination.html">Pages</a>
          </li>
        </ul>
        <!-- End Social Networks -->
      </div>
    </div>
  </div>
</footer>
<!-- ========== End FOOTER ========== -->

<!-- Page Preloader -->
<!-- <div id="jsPreloader" class="page-preloader">
            <div class="page-preloader__content-centered">
                <div class="spinner-grow text-primary" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div> -->
<!-- End Page Preloader -->

<!-- Go to Top -->
<a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
   data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
  <span class="flaticon-arrow u-go-to-modern__inner"></span>
</a>
<!-- End Go to Top -->

<!-- JS Global Compulsory -->
<script src="/assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="/assets/vendor/jquery-migrate/dist/jquery-migrate.min.js"></script>
<script src="/assets/vendor/popper.js/dist/umd/popper.min.js"></script>
<script src="/assets/vendor/bootstrap/bootstrap.min.js"></script>

<!-- JS Implementing Plugins -->
<script src="/assets/vendor/hs-megamenu/src/hs.megamenu.js"></script>
<script src="/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script src="/assets/vendor/flatpickr/dist/flatpickr.min.js"></script>
<script src="/assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="/assets/vendor/slick-carousel/slick/slick.js"></script>
<script src="/assets/vendor/gmaps/gmaps.min.js"></script>
<script src="/assets/vendor/ion-rangeslider/js/ion.rangeSlider.min.js"></script>
<script src="/assets/vendor/custombox/dist/custombox.min.js"></script>
<script src="/assets/vendor/custombox/dist/custombox.legacy.min.js"></script>

<!-- JS MyTravel -->
<script src="/assets/js/hs.core.js"></script>
<script src="/assets/js/components/hs.header.js"></script>
<script src="/assets/js/components/hs.unfold.js"></script>
<script src="/assets/js/components/hs.validation.js"></script>
<script src="/assets/js/components/hs.show-animation.js"></script>
<script src="/assets/js/components/hs.range-datepicker.js"></script>
<script src="/assets/js/components/hs.selectpicker.js"></script>
<script src="/assets/js/components/hs.range-slider.js"></script>
<script src="/assets/js/components/hs.go-to.js"></script>
<script src="/assets/js/components/hs.slick-carousel.js"></script>
<script src="/assets/js/components/hs.quantity-counter.js"></script>
<script src="/assets/js/components/hs.g-map.js"></script>
<script src="/assets/js/components/hs.modal-window.js"></script>
<script src="/assets/js/autocomplete.js"></script>

<!-- JS Plugins Init. -->
<script>
  $(window).on('load', function () {
    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
      event: 'hover',
      pageContainer: $('.container'),
      breakpoint: 1199.98,
      hideTimeOut: 0
    });

    // Page preloader
    setTimeout(function () {
      $('#jsPreloader').fadeOut(500)
    }, 800);
  });

  $(document).on('ready', function () {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#header'));

    // initialization of google map
    function initMap() {
      $.HSCore.components.HSGMap.init('.js-g-map');
    }

    // initialization of autonomous popups
    $.HSCore.components.HSModalWindow.init('[data-modal-target]', '.js-modal-window', {
      autonomous: true
    });

    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

    // initialization of show animations
    $.HSCore.components.HSShowAnimation.init('.js-animation-link');

    // initialization of datepicker
    $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

    // initialization of forms
    $.HSCore.components.HSRangeSlider.init('.js-range-slider');

    // initialization of select
    $.HSCore.components.HSSelectPicker.init('.js-select');

    // initialization of quantity counter
    $.HSCore.components.HSQantityCounter.init('.js-quantity');

    // initialization of slick carousel
    $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');

    const range = $('.js-range-slider').data('ionRangeSlider')
    if (range) {
      range.onChange = (data) => {
        console.log('Changed!', data)
      }
      console.log('Range is ', range)
    }

    function syncValues(id1, id2) {
      $(id2).html($(id1).val())
    }

    setInterval(() => {
      syncValues('#rangeSliderExample3MinResultInput', '#rangeSliderExample3MinResult')
      syncValues('#rangeSliderExample3MaxResultInput', '#rangeSliderExample3MaxResult')
    })
  });
</script>

@yield('script')

</body>

<!-- Mirrored from transvelo.github.io/mytravel-html/html/flights/flights-list.html by HTTrack Website Copier/3.x [XR&CO'2014], Sat, 17 Apr 2021 15:37:39 GMT -->
</html>
