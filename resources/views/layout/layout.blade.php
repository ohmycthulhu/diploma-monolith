<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from transvelo.github.io/mytravel-html/html/home/home-v10.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 12 Apr 2021 09:23:53 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=utf-8"/><!-- /Added by HTTrack -->
@include('layout.head')
<body>
@include('layout.header')

<!-- ========== MAIN CONTENT ========== -->
<main id="content">
    @yield('content')
</main>
<!-- ========== END MAIN CONTENT ========== -->

@include('layout.footer')

<!-- Page Preloader -->
<div id="jsPreloader" class="page-preloader">
    <div class="page-preloader__content-centered">
        <div class="spinner-grow text-primary" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
</div>
<!-- End Page Preloader -->

<!-- Go to Top -->
<a class="js-go-to u-go-to-modern" href="#" data-position='{"bottom": 15, "right": 15 }' data-type="fixed"
   data-offset-top="400" data-compensation="#header" data-show-effect="slideInUp" data-hide-effect="slideOutDown">
    <span class="flaticon-arrow u-go-to-modern__inner"></span>
</a>
<!-- End Go to Top -->

@include('layout.script')

</body>

</html>
