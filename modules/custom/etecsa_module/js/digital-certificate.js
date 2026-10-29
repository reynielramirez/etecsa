(function ($, Drupal) {
  let labels = [];
  Drupal.behaviors.digitalCertificate = {
	attach: function (context, settings) {
		let digital_certificates = drupalSettings.digital_certificates;
		let without_parameters = drupalSettings.without_parameters;
		if (!without_parameters) {
			if (!digital_certificates.display_status) {
				labels = digital_certificates.labels;
				if (digital_certificates.data.length > 0) {
				  $('.certificate-paginator').pagination({
					dataSource: digital_certificates.data,
					pageSize: digital_certificates.item_page,
					showSizeChanger: true,
					callback: function (digital_certificates, pagination) {
					  template(digital_certificates);
					}
				  });
				}
				else {
					$('.certificate-container').html(
						"<div class='certificate-error'>" + 
						"<h4 class='message'>" + digital_certificates.message + "</h4></div>"
					  );
				}
			}
			else {
				if (digital_certificates.error || digital_certificates.not_found) {
					$('.certificate-container').html(
						"<div class='certificate-error'>" + 
						"<h4 class='message'>" + digital_certificates.message + "</h4></div>"
					  );
				} 
				else {
					template_status(digital_certificates.data);
				}
			}
		}
	}
  }
   
  let template = function (data) {
	clear_elements();
    $.each(data, function (i, item) {
      let row = "<div class='p-3 mb-3 certificate-card'>" +
        "<div class='certificate-header'>" +
        "<div class='certificate-body'><ul>" +
        "<li><span>" + labels.subject + ": " + item.subject + "</span></li>" +
        "<li><span>" + labels.issuer + ": " + item.issuer + "</span></li>" +
        "<li><span>" + labels.serial_number + ": " + item.serial_number + "</span></li>" +
        "<li><span>" + labels.revoked + ": " + item.revoked + "</span></li>" +
        "<li><span>" + labels.created + ": " + item.created + "</span></li></ul></div>" +
        "<div class='certificate-footer'>" +
        "<a class='certificate-download' href='" + item.link_download + "'>" + 
        labels.download + "</a></div></div>";
      $(".certificate-container").append(row);
    });
    $('.paginationjs-pages ul').addClass('pagination');
    $('.paginationjs-pages ul li').addClass('page-item');
    $('.paginationjs-pages ul li a').addClass('page-link');
  }
  
  let template_status = function (data) {
	clear_elements();
	let row = "<div class='p-3 mb-3 certificate-card'>" +
        "<div class='certificate-header'>" +
        "<div class='certificate-body'><ul>" +
        "<li><span>" + labels.status + ": " + data.status + "</span></li>" +
        "</ul></div>" +
        "<div class='certificate-footer'></div></div>";
     $(".certificate-container").append(row);
	
  }
  
  let clear_elements = function () {
	$(".certificate-card").remove();
    $(".certificate-error").remove();
  }
  
  let element_changer = $('.form-item-serie');
  element_changer.css('display', 'none');
 
  $('#edit-type-request').change(function () {
	let type_request_selected = $(this).val();
	if (type_request_selected === 'serie') {
		element_changer.css('display', 'block');
	}
	else {
		element_changer.css('display', 'none');
	}
  });
})(jQuery, Drupal);
