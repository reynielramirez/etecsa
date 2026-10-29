(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.noticias = {
	attach: function (context, settings) {
		if ($(window).width() <= 992) {
			if ($(".owl-carousel-noticias").length > 0) {
				$(".owl-carousel-noticias").each(function () {
					$(this).owlCarousel({
						margin: 5,
						responsiveClass: true,
						dots: false,
						navs: false,
						autoplay: true,
						smartSpeed: 900,
						loop: true,
						autoplayHoverPause:true,
						responsive: {
							0: {
								items: 1
							},
							400: {
								items: 1
							},
							600: {
								items: 1
							},
							990: {
								items: 1
							}
						}
					});
				});
			}	
		}
		}
	}
})( jQuery, Drupal);

