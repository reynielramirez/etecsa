(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.hospweb = {
		attach: function (context, settings) {
			$('.owl-carousel-hw').each(function(){
				$(this).owlCarousel({
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
			
		});

		let arrowOnScreenHW = function(ele, selector){
			let countImg=$(selector + " .owl-item");
			if (countImg.length > ele) {
				$(selector + " .owl-dots").css('display', 'block');
				$(selector + " .owl-nav").css('display', 'block');
			}
			else {
				$(selector + " .owl-dots").css('display', 'none');
				$(selector + " .owl-nav").css('display', 'none');
				
			}
		}

		if (screen.width >= 992) {
			let hw = ".hospedajeweb .tab-pane.show.active .owl-carousel-hw";
			let im = ".sesion-internet-movil .tab-pane.active .owl-carousel";
			arrowOnScreenHW(3, hw);
			arrowOnScreenHW(3, im);
		}
		else if(screen.width >= 768) {
			let hw = ".hospedajeweb .tab-pane.show.active .owl-carousel-hw";
			let im = ".sesion-internet-movil .tab-pane.active .owl-carousel";
			arrowOnScreenHW(2, hw);
			arrowOnScreenHW(2, im);
		}
		else {
			let hw = ".hospedajeweb .tab-pane.show.active .owl-carousel-hw";
			let im = ".sesion-internet-movil .tab-pane.active .owl-carousel";
			$(hw + " .owl-dots").css('display', 'none');
			$(im + " .owl-dots").css('display', 'none');
		}

		$(window).resize(function(){
			if (screen.width >= 992) {
				let hw = ".hospedajeweb .tab-pane.show.active .owl-carousel-hw";
				let im = ".sesion-internet-movil .tab-pane.active .owl-carousel";
				arrowOnScreenHW(9, hw);
				arrowOnScreenHW(9, im);
			}
			else if(screen.width >= 768) {
				let hw = ".hospedajeweb .tab-pane.show.active .owl-carousel-hw";
				let im = ".sesion-internet-movil .tab-pane.active .owl-carousel";
				arrowOnScreenHW(2, hw);
				arrowOnScreenHW(2, im);
			}
			else {
				let hw = ".hospedajeweb .tab-pane.show.active .owl-carousel-hw";
				let im = ".sesion-internet-movil .tab-pane.active .owl-carousel";
				$(hw + " .owl-dots").css('display', 'none');
				$(im + " .owl-dots").css('display', 'none');
			}
		});

	}
}
})(jQuery, Drupal);