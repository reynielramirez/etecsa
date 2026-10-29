(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.equipos = {
		attach: function (context, settings) {
			$('.owl-carousel-eq').each(function () {
				$(this).owlCarousel({
					margin: 5,
					responsiveClass: true,
					navText: ["<span><i class='flaticon-back'></i></span>", "<span><i class='flaticon-next-1'></i></span>"],
					navClass: ["owl-prev", "owl-next"],
					nav: true,
					dots: true,
					autoplay: true,
					loop: true,
					smartSpeed: 900,
					autoplayHoverPause: true,
					responsive: {
						0: {
							items: 1
						},
						600: {
							items: 1
						},
						768: {
							items: 3
						},
						1000: {
							items: 4
						}
					}
				});
			});

			$('.owl-carousel-todos').owlCarousel({
				responsiveClass: true,
				navText: ["<span><i class='flaticon-back'></i></span>", "<span><i class='flaticon-next-1'></i></span>"],
				navClass: ["owl-prev", "owl-next"],
				nav: true,
				dots: true,
				autoplay: true,
				loop: true,
				smartSpeed: 900,
				autoplayHoverPause: true,
				responsive: {
					0: {
						items: 1
					},
					600: {
						items: 2,
						nav: false
					},
					1000: {
						items: 4
					}
				}
			});
			let arrowOnScreenEQ = function (ele) {
				let countImg = $("#block-equipos-accesorios-persona .tab-pane.show.active .owl-carousel-eq .owl-item");
				if (countImg.length > ele) {
					$("#block-equipos-accesorios-persona .tab-pane.show.active .owl-carousel-eq .owl-dots").css('display', 'block');
					$("#block-equipos-accesorios-persona .tab-pane.show.active .owl-carousel-eq .owl-nav").css('display', 'block');
				}
				else {
					$("#block-equipos-accesorios-persona .tab-pane.show.active .owl-carousel-eq .owl-dots").css('display', 'none');
					$("#block-equipos-accesorios-persona .tab-pane.show.active .owl-carousel-eq .owl-nav").css('display', 'none');
				}
			}
			if (screen.width >= 992) {
				arrowOnScreenEQ(4);
			}
			else if (screen.width >= 768) {
				arrowOnScreenEQ(2);
			}
			else {
				$("#carousel-eq-todos .owl-dots").css('display', 'none');
			}

			$(window).resize(function () {
				if (screen.width >= 992) {
					arrowOnScreenEQ(4);
				}
				else if (screen.width >= 768) {
					arrowOnScreenEQ(2);
				}
				else {
					$("#carousel-eq-todos .owl-dots").css('display', 'none');
				}
			});

		}

	}
})(jQuery, Drupal);