(function ($) {
  'use strict';
  Drupal.behaviors.notinode = {
    attach: function (context, settings) {
      if ($('#carousel-noticias').length > 0) {
        $("#carousel-noticias").unitegallery({
          gallery_theme: "compact",
          gallery_mousewheel_role: "none",
          slider_scale_mode: "fill",
          slider_control_zoom: true
        });

        $('.card-header').click(function () {
          $(this).find('i').toggleClass('fas fa-plus fas fa-minus');
        });
      }

    }
  };
})(jQuery);

