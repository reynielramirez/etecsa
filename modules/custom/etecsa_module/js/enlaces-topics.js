(function ($, Drupal) {
    "use strict";
  Drupal.behaviors.enlacestopic = {
    attach: function (context, settings) {

      var url= window.location.pathname;
    
      $('.enlaces-topics option').each(function() {
        if (url.indexOf($(this).val()) !== -1) {
          $(this).attr('selected', 'selected');
        }
      });
      
      $('.enlaces-topics').on("change", function () {
        url = $(this).val();
        window.location.href = url;
      });
    }
  };
})(jQuery, Drupal);
