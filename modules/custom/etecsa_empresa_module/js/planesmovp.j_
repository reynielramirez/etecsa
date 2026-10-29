(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.planesmovp = {
		attach: function (context, settings) {
			$("[id^='carousel-pmp']").owlCarousel({
				margin: 5,
				responsiveClass: true,
				navText: ["<span><i class='flaticon-back'></i></span>", "<span><i class='flaticon-next-1'></i></span>"],
				navClass: ["owl-prev", "owl-next"],
				nav: true,
				dots: true,
				loop: true,
				autoplay: true,
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
			$('#combo').on("change", function () {
				var tipo = $(this).val();
				$(this).value = tipo;
				$("[id^='seccion-']").each(function () {
					if ($(this).hasClass(tipo) || tipo == 'todos') {
						$(this).show();
						$(this).next().show();
					}
					else {
						$(this).hide();
						$(this).next().hide();
					}
				});
			});

			let arrowOnScreenPMT = function(ele){
				let countImg=$(".planesmov .tab-pane.show.active .owl-carousel-hw .owl-item");
				if (countImg.length > ele) {
					$(".planesmov .tab-pane.show.active .owl-carousel-hw .owl-dots").css('display', 'block');
					$(".planesmov .tab-pane.show.active .owl-carousel-hw .owl-nav").css('display', 'block');
				}
				else {
					$(".planesmov .tab-pane.show.active .owl-carousel-hw .owl-dots").css('display', 'none');
					$(".planesmov .tab-pane.show.active .owl-carousel-hw .owl-nav").css('display', 'none');
					
				}
			}
			if (screen.width >= 992) {
				arrowOnScreenPMT(3);
			}
			else if(screen.width >= 768) {
				arrowOnScreenPMT(2);
			}
			else {
				$(".planesmov .tab-pane.show.active .owl-carousel-hw .owl-dots").css('display', 'none');
			}

			$(window).resize(function(){
				if (screen.width >= 992) {
					arrowOnScreenPMT(3);
				}
				else if(screen.width >= 768) {
					arrowOnScreenPMT(2);
				}
				else {
					$(".planesmov .tab-pane.show.active .owl-carousel-hw .owl-dots").css('display', 'none');
				}
			});
			
		}
	};
})(jQuery, Drupal);