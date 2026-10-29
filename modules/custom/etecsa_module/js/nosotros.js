(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.directivos = {
		attach: function (context, settings) {
			$('#carousel-directivos').owlCarousel({
				margin: 5,
				responsiveClass: true,
				navText: ["<span><i class='flaticon-back'></i></span>", "<span><i class='flaticon-next-1'></i></span>"],
				navClass: ["owl-prev", "owl-next"],
				nav: true,
				dots: true,
				autoplay: true,
				smartSpeed: 900,
				loop: true,
				responsive: {
					0: {
						items: 1
					},
					768: {
						items: 3
					},
					992: {
						items: 4
					},
					1000: {
						items: 5
					}
				}
			});
		}
	}
})(jQuery, Drupal);