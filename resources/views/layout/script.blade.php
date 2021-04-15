
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
<script src="/assets/vendor/svg-injector/dist/svg-injector.min.js"></script>
<script src="/assets/vendor/appear.js"></script>

<!-- JS MyTravel -->
<script src="/assets/js/hs.core.js"></script>
<script src="/assets/js/components/hs.header.js"></script>
<script src="/assets/js/components/hs.unfold.js"></script>
<script src="/assets/js/components/hs.validation.js"></script>
<script src="/assets/js/components/hs.show-animation.js"></script>
<script src="/assets/js/components/hs.range-datepicker.js"></script>
<script src="/assets/js/components/hs.selectpicker.js"></script>
<script src="/assets/js/components/hs.go-to.js"></script>
<script src="/assets/js/components/hs.slick-carousel.js"></script>
<script src="/assets/vendor/dzsparallaxer/dzsparallaxer.js"></script>
<script src="/assets/js/components/hs.svg-injector.js"></script>
<script src="/assets/js/components/hs.quantity-counter.js"></script>
<script src="/assets/js/components/hs.counter.js"></script>

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

    // initialization of svg injector module
    $.HSCore.components.HSSVGIngector.init('.js-svg-injector');

    // Page preloader
    setTimeout(function () {
      $('#jsPreloader').fadeOut(500)
    }, 800);
  });

  $(document).on('ready', function () {
    // initialization of header
    $.HSCore.components.HSHeader.init($('#header'));

    // initialization of unfold component
    $.HSCore.components.HSUnfold.init($('[data-unfold-target]'));

    // initialization of show animations
    $.HSCore.components.HSShowAnimation.init('.js-animation-link');

    // initialization of datepicker
    $.HSCore.components.HSRangeDatepicker.init('.js-range-datepicker');

    // initialization of select
    $.HSCore.components.HSSelectPicker.init('.js-select');

    // initialization of quantity counter
    $.HSCore.components.HSQantityCounter.init('.js-quantity');

    // initialization of slick carousel
    $.HSCore.components.HSSlickCarousel.init('.js-slick-carousel');

    // initialization of counters
    var counters = $.HSCore.components.HSCounter.init('[class*="js-counter"]');

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');
  });
</script>