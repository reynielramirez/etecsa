
(function ($, Drupal) {
	"use strict";
	Drupal.behaviors.aclientes = {
		attach: function (context, settings) {
			$('legend').css('display', 'none');
		}
	}
})(jQuery, Drupal);