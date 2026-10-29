(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.planesmovt = {
		attach: function (context, settings) {
			$("#carousel-pmt").owlCarousel({
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
					768: {
						items: 2
					},
					992: {
						items: 3
					}
				}
			});
			let arrowOnScreen = function(ele){
				let countImg=$(".planesmov  #carousel-pmt .owl-item");
				if (countImg.length > ele) {
					$(".planesmov  #carousel-pmt .owl-dots").css('display', 'block');
					$(".planesmov  #carousel-pmt .owl-nav").css('display', 'block');
				}
				else {
					$(".planesmov  #carousel-pmt .owl-dots").css('display', 'none');
					$(".planesmov  #carousel-pmt .owl-nav").css('display', 'none');
					
				}
			}
			if (screen.width >= 992) {
				arrowOnScreen(3);
			}
			else if(screen.width >= 768) {
				arrowOnScreen(2);
			}
			else {
				$(".planesmov  #carousel-pmt .owl-dots").css('display', 'none');
			}

			$(window).resize(function(){
				if (screen.width >= 992) {
					arrowOnScreen(3);
				}
				else if(screen.width >= 768) {
					arrowOnScreen(2);
				}
				else {
					$(".planesmov  #carousel-pmt .owl-dots").css('display', 'none');
				}
			});
			
		}
	};
})(jQuery, Drupal);