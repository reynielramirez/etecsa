(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.etecsa_faq = {
	  attach: function (context, settings) {
		
		var url= window.location.href;
		var faq=url.indexOf('preguntas-frecuentes?clientef');
		if(faq!=-1){
			var id=url.split("=")
			$('#edit-clientes').val(id[1]);
		}
		var tema= $('#edit-temasfaq option:selected').text();
		
		$(".faq").each(function () {
			if ($(this).hasClass(tema)) {
				$(this).show();
			} 
			else {
				$(this).hide();
			}
		});
		$('#edit-temasfaq').on("change", function(){
			var tema= this.options[this.selectedIndex].text;
	
			$(".faq").each(function () {
				if ($(this).hasClass(tema)) {
					$(this).show();
				} 
				else {
					$(this).hide();
				}
			});
		});
		
	  }
	};
  })(jQuery, Drupal);