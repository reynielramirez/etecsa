jQuery(document).ready(function ($) {
	$('.links-col nav').children().addClass("hide");
	$('.links-col nav').click(function () {
        if ($(this).children().hasClass("show")) {
			$(this).children().addClass("hide");
            $(this).children().removeClass("show");
        } else {
            $(this).children().addClass("show");
		    $(this).children().removeClass("hide");
        }
     });
});