
(function ($, Drupal) {

  'use strict';
  Drupal.behaviors.equipo_galeria = {
    attach: function (context, settings) {
        $('.owl-carousel-eq-mobile').owlCarousel({
            navText: ["<span><i class='flaticon-back'></i></span>", "<span><i class='flaticon-next-1'></i></span>"],
            navClass: ["owl-prev", "owl-next"],
            nav: true,
            dots: true,
            autoplay: false,
            autoplayHoverPause:true,
            smartSpeed: 900,
            responsiveClass: true,
            responsive: {
                0:{
                    items:1,
                },
                625:{
                    items:3,
                },
                1000: {
                    items: 4
                }
            }
        });
    }
  };
})(jQuery, Drupal);
