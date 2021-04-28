<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from designreset.com/cork/ltr/demo3/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Apr 2021 06:45:53 GMT -->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title>Login Cover | CORK - Multipurpose Bootstrap Dashboard Template </title>
  <link rel="icon" type="image/x-icon" href="/assets/crm/assets/img/favicon.ico"/>
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  <link href="/assets/crm/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/crm/assets/css/plugins.css" rel="stylesheet" type="text/css"/>
  <link href="/assets/crm/assets/css/authentication/form-1.css" rel="stylesheet" type="text/css"/>
  <!-- END GLOBAL MANDATORY STYLES -->
  <link rel="stylesheet" type="text/css" href="/assets/crm/assets/css/forms/theme-checkbox-radio.css">
  <link rel="stylesheet" type="text/css" href="/assets/crm/assets/css/forms/switches.css">
</head>
<body class="form">


<div class="form-container">
  <div class="form-form">
    <div class="form-form-wrap">
      <div class="form-container">
        <div class="form-content">

          <h1 class="">Log In</h1>
          <form class="text-left"
                method="POST"
                enctype="multipart/form-data"
                action="{{ route('crm.login') }}">
            @csrf
            <div class="form">
              <div id="username-field" class="field-wrapper input">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="feather feather-user">
                  <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                  <circle cx="12" cy="7" r="4"></circle>
                </svg>
                <input id="username"
                       name="email"
                       type="email"
                       class="form-control"
                       placeholder="Email">
              </div>

              <div id="password-field" class="field-wrapper input mb-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                     fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                     stroke-linejoin="round" class="feather feather-lock">
                  <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                  <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                </svg>
                <input id="password"
                       name="password"
                       type="password" class="form-control" placeholder="Password">
              </div>
              <div class="d-sm-flex justify-content-between">
                <div class="field-wrapper toggle-pass">
                  <p class="d-inline-block">Show Password</p>
                  <label class="switch s-primary">
                    <input type="checkbox" id="toggle-password" class="d-none">
                    <span class="slider round"></span>
                  </label>
                </div>
                <div class="field-wrapper">
                  <button type="submit" class="btn btn-primary" value="">Log In</button>
                </div>

              </div>

              <div class="field-wrapper text-center keep-logged-in">
                <div class="n-chk new-checkbox checkbox-outline-primary">
                  <label class="new-control new-checkbox checkbox-outline-primary">
                    <input type="checkbox" class="new-control-input">
                    <span class="new-control-indicator"></span>Keep me logged in
                  </label>
                </div>
              </div>

              {{--                            <div class="field-wrapper">--}}
              {{--                                <a href="auth_pass_recovery.html" class="forgot-pass-link">Forgot Password?</a>--}}
              {{--                            </div>--}}

            </div>
          </form>
          {{--                    <p class="terms-conditions">© 2020 All Rights Reserved. <a href="index-2.html">CORK</a> is a product of Designreset. <a href="javascript:void(0);">Cookie Preferences</a>, <a href="javascript:void(0);">Privacy</a>, and <a href="javascript:void(0);">Terms</a>.</p>--}}

        </div>
      </div>
    </div>
  </div>
  <div class="form-image">
    <div class="l-image">
    </div>
  </div>
</div>


<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="/assets/crm/assets/js/libs/jquery-3.1.1.min.js"></script>
<script src="/assets/crm/bootstrap/js/popper.min.js"></script>
<script src="/assets/crm/bootstrap/js/bootstrap.min.js"></script>

<!-- END GLOBAL MANDATORY SCRIPTS -->
<script src="/assets/crm/assets/js/authentication/form-1.js"></script>

</body>

<!-- Mirrored from designreset.com/cork/ltr/demo3/auth_login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 28 Apr 2021 06:45:53 GMT -->
</html>