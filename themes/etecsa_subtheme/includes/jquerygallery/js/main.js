(function ($) {
  Drupal.behaviors.jquerygallery2 = {
    attach: function (context, settings) {
      $('.gallery').gallery();
    }
  };
})(jQuery);
