(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.maincarousel = {
		attach: function (context, settings) {
			$('#carousel-dm').owlCarousel({
					margin: 5,
					responsiveClass: true,
					navText: ["<span><i class='flaticon-back'></i></span>", "<span><i class='flaticon-next-1'></i></span>"],
					navClass: ["owl-prev", "owl-next"],
					nav: true,
					dots: true,
					autoplay: true,
					loop: true,
					smartSpeed: 900,
					autoplayHoverPause:true,
					responsive: {
						0: {
							items: 1
						},
						600: {
							items: 1
						},
						1000: {
							items: 4
						}
					}
			});
		}
	
	}
})(jQuery, Drupal);