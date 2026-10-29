(function ($) {
  'use strict';
  Drupal.behaviors.global = {
    attach: function (context, settings) {
      var language = settings.language || 'es';
      $('#block-alternadordeidioma li[hreflang="' + language + '"]').css('display', 'none');
      $('.promc-close-b').click(function () {
        $('.promc-close').css('display', 'none');
        $('header').css('min-height', 0);
      });
      var currentPath = window.location.pathname;
      var mobile_menu = $('.menu-et-activo');
      var menuRoot = $('#superfish-main');
      var menuLinks = {
        personas: menuRoot.find('> li.sf-first > a.sf-depth-1'),
        empresas: menuRoot.find('li.sf-depth-1 > a[href*="empresas"], li.sf-depth-1 > a[href*="companies"]').first(),
        emprendedores: menuRoot.find('li.sf-depth-1 > a[href*="emprendedores"], li.sf-depth-1 > a[href*="entrepreneurs"]').first(),
        visitantes: menuRoot.find('li.sf-depth-1 > a[href*="visitantes"], li.sf-depth-1 > a[href*="visitors"]').first()
      };

      menuRoot.find('a.sf-depth-1').removeClass('m-active-l0-p m-active-l0-em m-active-l0-emp m-active-l0-vis');
      mobile_menu.removeClass('m-active-l0-p m-active-l0-em m-active-l0-emp m-active-l0-vis');
      menuRoot.find('a.sf-depth-1').each(function () {
        $(this).next('.aftermenu').remove();
      });

      var isPersonas = currentPath.indexOf("/empresas") === -1 && currentPath.indexOf("/companies") === -1 &&
        currentPath.indexOf("/emprendedores") === -1 && currentPath.indexOf("/entrepreneurs") === -1 &&
        currentPath.indexOf("/visitantes") === -1 && currentPath.indexOf("/visitors") === -1 &&
        currentPath.indexOf("/nosotros") === -1 && currentPath.indexOf("/us") === -1 &&
        currentPath.indexOf("/atencion-cliente") === -1 && currentPath.indexOf("/customer-care") === -1 &&
        currentPath.indexOf("/proteccion-consumidor") === -1 && currentPath.indexOf("/consumer-protection") === -1 &&
        currentPath.indexOf("/preguntas-mas-frecuentes") === -1 && currentPath.indexOf("/more-frequent-questions") === -1 &&
        currentPath.indexOf("/preguntas-frecuentes") === -1 && currentPath.indexOf("/frequent-questions") === -1;
      var isEmpresas = currentPath.indexOf("/empresas") !== -1 || currentPath.indexOf("/companies") !== -1;
      var isEmprendedores = currentPath.indexOf("/emprendedores") !== -1 || currentPath.indexOf("/entrepreneurs") !== -1;
      var isVisitantes = currentPath.indexOf("/visitantes") !== -1 || currentPath.indexOf("/visitors") !== -1;

      if (isPersonas && menuLinks.personas.length) {
        menuLinks.personas.addClass('m-active-l0-p');
        mobile_menu.addClass('m-active-l0-p');
        if (currentPath.endsWith('/es')) {
          mobile_menu.text('Personas');
        }
        if (currentPath.endsWith('/en')) {
          mobile_menu.text('People');
        }
      }
      else if (menuLinks.personas.length) {
        menuLinks.personas.after("<div class='aftermenu'></div>");
      }

      if (isEmpresas && menuLinks.empresas.length) {
        menuLinks.empresas.addClass('m-active-l0-em');
        mobile_menu.addClass('m-active-l0-em');
        if (currentPath.indexOf('/empresas') !== -1) {
          mobile_menu.text('Empresas');
        }
        if (currentPath.indexOf('/companies') !== -1) {
          mobile_menu.text('Companies');
        }
      }
      else if (menuLinks.empresas.length) {
        menuLinks.empresas.after("<div class='aftermenu'></div>");
      }

      if (isEmprendedores && menuLinks.emprendedores.length) {
        menuLinks.emprendedores.addClass('m-active-l0-emp');
        mobile_menu.addClass('m-active-l0-emp');
        if (currentPath.indexOf('/emprendedores') !== -1) {
          mobile_menu.text('emprendedores');
        }
        if (currentPath.indexOf('/entrepreneurs') !== -1) {
          mobile_menu.text('entrepreneurs');
        }
      }
      else if (menuLinks.emprendedores.length) {
        menuLinks.emprendedores.after("<div class='aftermenu'></div>");
      }

      if (isVisitantes && menuLinks.visitantes.length) {
        menuLinks.visitantes.addClass('m-active-l0-vis');
        mobile_menu.addClass('m-active-l0-vis');
        if (currentPath.indexOf('/visitantes') !== -1) {
          mobile_menu.text('visitantes');
        }
        if (currentPath.indexOf('/visitors') !== -1) {
          mobile_menu.text('visitors');
        }
      }
      else if (menuLinks.visitantes.length) {
        menuLinks.visitantes.after("<div class='aftermenu'></div>");
      }

      let menuDrupal = $('#toolbar-administration');
      var altura = $('#top-hm').offset().top;

      var nombre, tel, mensaje, correo;
      $(window).on('scroll', function () {
        if (menuDrupal.length == 0) {
          if ($(window).scrollTop() > altura) {
            $('#top-hm').addClass('fixed-top');
          } else {
            $('#top-hm').removeClass('fixed-top');
          }
        }
      });

      $('#edit-items-per-page').on("change", function () {
        $('#edit-submit-mas-noticias').click();
        $('#edit-submit-aplicaciones').click();
        $('#edit-submit-persona-equipos-fijos').click();

      });

      if (language == "en") {
        nombre = "Name*";
        tel = "Phone*";
        correo = "Email*";
        mensaje = "Message*";
      }
      else {
        nombre = "Nombre*";
        tel = "Teléfono*";
        correo = "Correo*";
        mensaje = "Mensaje*";
      }
      $("#footer-section #edit-email").attr("placeholder", correo);
      $("#contact-message-feedback-form #edit-field-nombre-0-value").attr("placeholder", nombre);
      $("#contact-message-feedback-form #edit-field-telefono-0-value").attr("placeholder", tel);
      $("#contact-message-feedback-form #edit-field-correo-electronico-0-value").attr("placeholder", correo);
      $("#contact-message-feedback-form #edit-message-0-value").attr("placeholder", mensaje);
      $('.redesocN button').on('click', function () {
        // add new buttons with share behaviour
        window.Sharer.init();
      });

      $('.col-ayu nav').click(function () {
        if ($(this).children().hasClass("show")) {
          $(this).children().removeClass("show");
        } else {
          $(this).children().addClass("show");
        }
      });

      $('#edit-fecha-publicacion').on('input', function () {
        this.value = this.value.replace(/[^0-9]/g, '');
      });

      let elements = $('.prom').length;
      function getRndInteger(min, max) {
        return Math.floor(Math.random() * (max - min + 1));
      }
      function hideShowProm() {
        let rnfInteger = getRndInteger(1, elements);
        if (rnfInteger == elements) {
          rnfInteger = elements - 1;
        }
        $('.prom').each(function (index, el) {
          if (index == rnfInteger) {
            $(this).removeClass('pdesactive');
          }
          else {
            $(this).addClass('pdesactive');
          }
        });
        $('.prommovil').each(function (index, el) {
          if (index == rnfInteger) {
            $(this).removeClass('pdesactive');
          }
          else {
            $(this).addClass('pdesactive');
          }
        });
      }
      setInterval(hideShowProm, 10000);

      $(".enlaceV").click(function () {
        $("#frame-asistente").removeClass("hidden");
      });
      $(".link-close").click(function () {
        $("#frame-asistente").addClass("hidden");
      });
      if ($("#contact-message-quejas-y-reclamaciones-form").length > 0) {

        $("#contact-message-quejas-y-reclamaciones-form #edit-field-nombre-qr-0-value").attr('maxlength', 50);
        $("#contact-message-quejas-y-reclamaciones-form #edit-field-primer-apellido-qr-0-value").attr('maxlength', 50);
        $("#contact-message-quejas-y-reclamaciones-form #edit-field-segundo-apellido-0-value").attr('maxlength', 50);
        $("#contact-message-quejas-y-reclamaciones-form #edit-field-direccion-postal-qr-0-value").attr('maxlength', 120);
        $("#contact-message-quejas-y-reclamaciones-form #edit-field-servicio-telefonico-de-loc-0-value").attr('maxlength', 15);
        $("#contact-message-quejas-y-reclamaciones-form #edit-field-servicio-afectado-0-value").attr('maxlength', 120);
        $("#contact-message-quejas-y-reclamaciones-form .form-item-field-provincia").css('display', 'none');
        $("#contact-message-quejas-y-reclamaciones-form [id^='edit-field-pais']").bind("autocompleteselect", function (event, ui) {
          var pais = ui['item']['value'];

          if (pais.indexOf("Cuba") != -1) {
            $("#contact-message-quejas-y-reclamaciones-form .form-item-field-provincia").css('display', 'block');
            $("#contact-message-quejas-y-reclamaciones-form .form-item-field-provincia label").addClass("form-required");

          }
          else {
            $("#contact-message-quejas-y-reclamaciones-form .form-item-field-provincia").css('display', 'none');
          }
        });

      }
      $("#contact-message-quejas-y-reclamaciones-form [id^='edit-field-pais-qr']").on("change", function (event, ui) {
        var pais = ui['item']['value']; alert(pais);
        if (pais.indexOf("Cuba") != -1) {
          $("#contact-message-quejas-y-reclamaciones-form .form-item-field-provincia").css('display', 'block');
          $("#contact-message-quejas-y-reclamaciones-form .form-item-field-provincia label").addClass("form-required");
        }
        else {
          $("#contact-message-quejas-y-reclamaciones-form .form-item-field-provincia").css('display', 'none');

        }
      });
      $('.sfm .sf-accordion-toggle > a, #superfish-main--2-toggle').each(function () {
        var $link = $(this);
        var $span = $link.children('span').first();
        if (!$span.length) {
          return;
        }
        if (!$link.attr('aria-label')) {
          $link.attr('aria-label', $.trim($span.text()) || 'Menu');
        }
        $span.addClass('navbar-toggler-icon').text('');
      });

      /*if($("#edit-fecha-publicacion").length>0){
          $("#edit-fecha-publicacion").on("input",function(){this.value=this.value.replace(/^[\D]/g,"")});
          $("#edit-fecha-publicacion").on("blur",function(){$("#edit-submit-revista-tono").submit()});
      }*/
      if ($("#edit-municipios").length > 0) {
        if ($("#edit-provincias").val() == "") {
          $("#edit-municipios").prop('disabled', true);
          $("#edit-municipios").addClass("disabled");
        }
        else {
          $("#edit-municipios").prop('disabled', false);
          $("#edit-municipios").removeClass("disabled");
        }
        $("#edit-provincias").on("change", function () {
          if ($("#edit-provincias").val() == "") {
            $("#edit-municipios").prop('disabled', true);
            $("#edit-municipios").addClass("disabled");
          }
          else {
            $("#edit-municipios").prop('disabled', false);
            $("#edit-municipios").removeClass("disabled");
          }
        });
      }

      // promc-close
      let promc = $('.promc-close');
      if (promc.length > 0) {
        let h = promc.heigth;
        $('#top-hm').css('top', h + 'px');
      }
      else {
        $('header').addClass('no-prom-corta');
      }
      $('.action').click(function () {
        if ($(this).parent().hasClass("show")) {
          $(this).parent().removeClass("show");
          $('#bottom-float').removeClass("hide-item");
        }
        else {
          $(this).parent().addClass("show");
          $('#bottom-float').addClass("hide-item");
        }
      });
    }
  };
})(jQuery, Drupal);

