(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.servoport = {
	attach: function (context, settings) {
		var language = drupalSettings.language;
		var tipo = '';
		if ($('#edit-servoportunidad').length>0) {
			var url= window.location.href;
			var tipoUrl;
			if(language=="es"){
				tipoUrl=url.indexOf('servicios-oportunidades?tipo');
			}
			else{
				tipoUrl=url.indexOf('services-opportunities?tipo');
			}
			
			if(tipoUrl!=-1){
			var id=url.split("?tipo=")
			$('#edit-servoportunidad').val(id[1]);
			}
			tipo= $('#edit-servoportunidad').val();
			$(".items").each(function () {
				if ($(this).hasClass(tipo) || tipo == 'todos') {
					$(this).show();
					$(this).next().show();
				}
				else {
					$(this).hide();
					$(this).next().hide();
				}
			});        
			$('#edit-servoportunidad').on("change", function () {
				tipo = $(this).val();
				$(this).value = tipo;
				$(".items").each(function () {
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
		}
		if ($('#edit-servoportunidadAll').length>0) {
			$('#edit-servoportunidadAll').on("change", function () {
				tipo = $(this).val();
				var url = window.location.href;
				var cliente = url.split("/");
				var text = '';
				language=="es"?text="/servicios-oportunidades":text="/services-opportunities";
				if(cliente[4]=="servicios-oportunidades" || cliente[4]=="services-opportunities" ){
					$('#edit-servoportunidad').value=tipo; 
					window.location.href = "/" + language + text+"?tipo="+tipo;
					}
				else{            
					window.location.href = "/" + language + "/" + cliente[4] + text +"?tipo="+tipo;

				}					
			});		   
		}
		if ($(window).width() <= 992) {
			if ($(".owl-carousel-servoport").length > 0) {
				$(".owl-carousel-servoport").each(function () {
					$(this).owlCarousel({
						margin: 5,
						responsiveClass: true,
						dots: true,
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
								items: 2
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

