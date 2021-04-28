<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo3/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Apr 2021 06:41:16 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>Sales Admin | CORK - Multipurpose Bootstrap Dashboard Template </title>
  <link rel="icon" type="image/x-icon" href="/assets/crm/assets/img/favicon.ico"/>
  <link href="/assets/crm/assets/css/loader.css" rel="stylesheet" type="text/css"/>
  <script src="/assets/crm/assets/js/loader.js"></script>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link href="/assets/crm/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/crm/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
  <link href="/assets/crm/plugins/apex/apexcharts.css" rel="stylesheet" type="text/css">
  <link href="/assets/crm/assets/css/dashboard/dash_1.css" rel="stylesheet" type="text/css"/>
  <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>
<body>
<!-- BEGIN LOADER -->
<div id="load_screen">
  <div class="loader">
    <div class="loader-content">
      <div class="spinner-grow align-self-center"></div>
    </div>
  </div>
</div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
<div class="header-container fixed-top">
  <header class="header navbar navbar-expand-sm">
    <ul class="navbar-item theme-brand flex-row  text-center">
      <li class="nav-item theme-logo">
        <a href="{{ route('crm.home') }}">
          <img src="/assets/crm/assets/img/logo.svg"
               class="navbar-logo" alt="logo">
        </a>
      </li>
      <li class="nav-item theme-text">
        <a href="{{ route('crm.home') }}" class="nav-link"> CRM </a>
      </li>
    </ul>

    <ul class="navbar-item flex-row ml-md-0 ml-auto">
      <li class="nav-item align-self-center search-animated">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-search toggle-search">
          <circle cx="11" cy="11" r="8"></circle>
          <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
        </svg>
        <form class="form-inline search-full form-inline search"
              role="search">
          <div class="search-bar">
            <input type="text"
                   name="date"
                   action="{{ route('crm.home') }}"
                   value="{{ $dateRaw ?? '' }}"
                   class="form-control search-form-control  ml-lg-auto"
                   placeholder="Input date">
          </div>
        </form>
      </li>
    </ul>

    <ul class="navbar-item flex-row ml-md-auto">
      <li class="nav-item dropdown user-profile-dropdown">
        <a href="javascript:void(0);" class="nav-link dropdown-toggle user" id="userProfileDropdown"
           data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
          Hello, {{ \Illuminate\Support\Facades\Auth::user()->name }}
        </a>
        <div class="dropdown-menu position-absolute" aria-labelledby="userProfileDropdown">
          <div class="">
            <div class="dropdown-item">
              <a class="" href="{{ route('crm.logout') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="feather feather-log-out">
                  <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                  <polyline points="16 17 21 12 16 7"></polyline>
                  <line x1="21" y1="12" x2="9" y2="12"></line>
                </svg>
                Sign Out</a>
            </div>
          </div>
        </div>
      </li>
    </ul>
  </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN NAVBAR  -->
<div class="sub-header-container">
  <header class="header navbar navbar-expand-sm">
    <a href="javascript:void(0);" class="sidebarCollapse" data-placement="bottom">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
           stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
           class="feather feather-menu">
        <line x1="3" y1="12" x2="21" y2="12"></line>
        <line x1="3" y1="6" x2="21" y2="6"></line>
        <line x1="3" y1="18" x2="21" y2="18"></line>
      </svg>
    </a>

    <ul class="navbar-nav flex-row">
      <li>
        <div class="page-header">

          <nav class="breadcrumb-one" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item active" aria-current="page">
                <a href="{{ route('crm.home') }}">Dashboard</a>
              </li>
            </ol>
          </nav>

        </div>
      </li>
    </ul>
  </header>
</div>
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

  <div class="overlay"></div>
  <div class="search-overlay"></div>

  <!--  BEGIN SIDEBAR  -->
  <div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
      <div class="shadow-bottom"></div>
      <ul class="list-unstyled menu-categories" id="accordionExample">
        <li class="menu">
          <a href="#dashboard" data-active="true" data-toggle="collapse" aria-expanded="true"
             class="dropdown-toggle">
            <div class="">
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                   stroke-linejoin="round" class="feather feather-home">
                <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                <polyline points="9 22 9 12 15 12 15 22"></polyline>
              </svg>
              <span>Dashboard</span>
            </div>
            <div>
              <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                   fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                   stroke-linejoin="round" class="feather feather-chevron-right">
                <polyline points="9 18 15 12 9 6"></polyline>
              </svg>
            </div>
          </a>
          <ul class="collapse submenu list-unstyled show" id="dashboard" data-parent="#accordionExample">
            <li class="active">
              <a href="{{ route('crm.home') }}"> Flights </a>
            </li>
          </ul>
        </li>
      </ul>
      <!-- <div class="shadow-bottom"></div> -->

    </nav>

  </div>
  <!--  END SIDEBAR  -->

  <!--  BEGIN CONTENT AREA  -->
  <div id="content" class="main-content">
    @yield('content')
    <div class="footer-wrapper">
      <div class="footer-section f-section-1">
        <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com/">DesignReset</a>, All
          rights reserved.</p>
      </div>
      <div class="footer-section f-section-2">
        <p class="">Coded with
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
               stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
               class="feather feather-heart">
            <path
                d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path>
          </svg>
        </p>
      </div>
    </div>
  </div>
  <!--  END CONTENT AREA  -->

</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="/assets/crm/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="/assets/crm/bootstrap/js/popper.min.js"></script>
<script src="/assets/crm/bootstrap/js/bootstrap.min.js"></script>
<script src="/assets/crm/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
<script src="/assets/crm/assets/js/app.js"></script>
<script>
  // $(document).ready(function () {
  //   App.init();
  // });
</script>
<script src="/assets/crm/assets/js/custom.js"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="/assets/crm/plugins/apex/apexcharts.min.js"></script>
<script src="/assets/crm/assets/js/dashboard/dash_1.js"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/ by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Apr 2021 06:45:04 GMT -->
</html>