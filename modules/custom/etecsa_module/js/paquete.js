(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.etecsa_paquete = {
	  attach: function (context, settings) {
		$('#combo').on("change", function(){ 	
			var tipo=$(this).val();alert(tipo)
			 $(this).value=tipo;
		   $("[id^='seccion-']").each(function () {
			   if ($(this).hasClass(tipo)|| tipo == 'todos') {
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
	  }
  })(jQuery, Drupal);