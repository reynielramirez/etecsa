(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.utilitypeople = {
	attach: function (context, settings) {
		if ($(window).width() <= 992) {
			if ($(".owl-carousel-uti-person").length > 0) {
				$(".owl-carousel-uti-person").each(function () {
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
								items: 3
							},
							400: {
								items: 3
							},
							600: {
								items: 3
							},
							990: {
								items: 3
							}
						}
					});
				});
			}	
		}
		}
	}
})( jQuery, Drupal);

