(function ($, Drupal) {

  $('form:first *:input[type!=hidden]:first').focus();

  if($("[id^='taxonomy-term-tipos-de-clientes']").length>0) {
    $("[id^='taxonomy-term-tipos-de-clientes'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-tipos-de-clientes'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-tipos-de-equipos']").length>0) {
    $("[id^='taxonomy-term-tipos-de-equipos'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-tipos-de-equipos'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-marcas']").length>0) {
    $("[id^='taxonomy-term-marcas'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-marcas'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-modelos']").length>0) {
    $("[id^='taxonomy-term-modelos'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-modelos'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-tipos-de-so']").length>0) {
    $("[id^='taxonomy-term-tipos-de-so'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-tipos-de-so'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-tipo-paquete']").length>0) {
    $("[id^='taxonomy-term-tipo-paquete'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-tipo-paquete'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-tipo-de-plan']").length>0) {
    $("[id^='taxonomy-term-tipo-de-plan'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-tipo-de-plan'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-temas-faq']").length>0) {
    $("[id^='taxonomy-term-temas-faq'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-temas-faq'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-provincias']").length>0) {
    $("[id^='taxonomy-term-provincias'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-provincias'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-tipos-de-establecimientos']").length>0) {
    $("[id^='taxonomy-term-tipos-de-establecimientos'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-tipos-de-establecimientos'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-segmento']").length>0) {
    $("[id^='taxonomy-term-segmento'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-segmento'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-cargo']").length>0) {
    $("[id^='taxonomy-term-cargo'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-cargo'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-tipo-de-instalacion']").length>0) {
    $("[id^='taxonomy-term-tipo-de-instalacion'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-tipo-de-instalacion'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-operadores-form']").length>0) {
    $("[id^='taxonomy-term-operadores-form'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-operadores-form'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='taxonomy-term-paises-form']").length>0) {
    $("[id^='taxonomy-term-paises-form'] #edit-name-0-value").after("<div class='description'>Admite hasta 120 caracteres.</div>");
    $("[id^='taxonomy-term-paises-form'] #edit-name-0-value").attr('maxlength',120);
  }
  if($("[id^='node-directivos']").length>0) {
    $("[id^='node-directivos'] #edit-field-telefon-0-value").attr('maxlength',30);
    
  }
  if($("[id^='node-page']").length>0) {
    $("[id^='node-page'] #edit-field-subtitulo-0-value").attr('maxlength',120);
  }
  if($("[id^='node-cart-flotante']").length>0) {
    $("[id^='node-cart-flotante'] #edit-field-titulo-0-value").attr('maxlength',50);
  }
  if($("[id^='node-asistente-virtual']").length>0) {
    $("[id^='node-asistente-virtual'] #edit-title-0-value").attr('maxlength',50);
  }
  if($("[id^='node-promocion-form']").length>0) {
      $("[id^='node-promocion-form'] #edit-field-titulo-0-value").attr('maxlength',120);
  }
  if($("[id^='node-promocion-corta']").length>0) {
    $("[id^='node-promocion-corta'] #edit-field-titulo-0-value").attr('maxlength',120);
    $("[id^='node-promocion-corta'] #edit-field-subtitulo-0-value").attr('maxlength',120);
  }
  if($("[id^='node-equipo']").length>0) {
    $("[id^='node-equipo'] #edit-field-nombre-0-value").attr('maxlength',120);
    $("[id^='node-equipo'] #edit-field-precio-0-value").attr('maxlength',10);
  }
  if($("[id^='node-noticia']").length>0) {
    $("[id^='node-noticia'] #edit-field-titulo-0-value").attr('maxlength',120);
    $("[id^='node-noticia'] #edit-field-subtitulo-0-value").attr('maxlength',120);
    $("[id^='node-noticia'] #edit-field-fuente-0-value").attr('maxlength',120);
  }
  if($("[id^='node-enlace-auxiliar']").length>0) {
    if($("[id^='node-enlace-auxiliar'] #edit-field-tipo-enl-aux").val()=="Utilidad"){
      $("[id^='node-enlace-auxiliar'] .js-form-item-field-descripcion-0-value label").addClass("form-required");
    }
    $("[id^='node-enlace-auxiliar'] #edit-field-tipo-enl-aux").on("change", function () {
       if($(this).val()=='Utilidad'){
        $("[id^='node-enlace-auxiliar'] .js-form-item-field-descripcion-0-value label").addClass("form-required");
      }
    });
    $("[id^='node-enlace-auxiliar'] #edit-field-descripcion-0-value")[0].setAttribute("maxlength", "200");
  }
  if($("[id^='node-aplicacion']").length>0) {
      $("[id^='node-aplicacion'] #edit-field-nombre-0-value").attr('maxlength',120);
      $("[id^='node-aplicacion'] #edit-field-autor-0-value").attr('maxlength',120);
      $("[id^='node-aplicacion'] #edit-field-version-0-value").attr('maxlength',50);
      $("[id^='node-aplicacion'] #edit-field-requisitos-0-value").attr('maxlength',150);
  }
  if($("[id^='node-etecsa']").length>0) {
    $("[id^='node-etecsa'] #edit-field-mi-empresa-0-value").attr('maxlength',700);
    $("[id^='node-etecsa'] #edit-field-direcc-0-value").attr('maxlength',120);
    $("[id^='node-etecsa'] #edit-field-copyright-0-value").attr('maxlength',120);
    $("[id^='node-etecsa'] #edit-field-tel-et-0-value").attr('maxlength',30);
  }
  if($("[id^='node-consejos-utiles']").length>0) {
      $("[id^='node-consejos-utiles'] #edit-field-titulo-wrapper input[type='text']").attr('maxlength',120);
  }
  if($("[id^='node-sede']").length>0) {
    $("[id^='node-sede'] #edit-field-telef-0-value").attr('maxlength',50);
}
  if($("[id^='node-divisiones-territoriales']").length>0) {
      $("[id^='node-divisiones-territoriales'] #edit-field-nombre-0-value").attr('maxlength',120);
      $("[id^='node-divisiones-territoriales'] #edit-field-telefono-0-value").attr('maxlength',30);
      $("[id^='node-divisiones-territoriales-form'] #edit-field-direccion-0-value").attr('maxlength',120);
  }
  if($("[id^='node-espacios-publicos']").length>0) {
      $("[id^='node-espacios-publicos'] #edit-field-nombre-0-value").attr('maxlength',120);
      $("[id^='node-espacios-publicos'] #edit-field-direccion-0-value").attr('maxlength',120);
      $("[id^='node-espacios-publicos'] #edit-field-horario-0-value").attr('maxlength',120);
  }

  if($("[id^='node-establecimiento']").length>0) {
    $("[id^='node-establecimiento'] #edit-field-direccion-0-value").attr('maxlength',120);
    $("[id^='node-establecimiento'] #edit-field-horario-0-value").attr('maxlength',120);
  }
  if($("[id^='node-info-gen-nues-sedes]").length>0) {
    $("[id^='node-info-gen-nues-sedes'] #edit-title-0-value").attr('maxlength',120);
  }
  if($("[id^='node-operador-roaming-form']").length>0) {
    $("[id^='node-operador-roaming-form'] #edit-field-nombre-0-value").attr('maxlength',120);
    $("[id^='node-operador-roaming-form'] #edit-field-tip-acu-0-value").attr('maxlength',120);
    $("[id^='node-operador-roaming-form'] #edit-field-sms-roa-0-value").attr('maxlength',120);
    $("[id^='node-operador-roaming-form'] #edit-field-roa-camei-0-value").attr('maxlength',120);
    $("[id^='node-operador-roaming-form'] #edit-field-acu-gprs-0-value").attr('maxlength',120);
  }

  if($("[id^='node-oportunidad']").length>0) {
    $("[id^='node-oportunidad'] #edit-field-titulo-0-value").attr('maxlength',23);
    $("[id^='node-oportunidad'] #edit-field-subtitulo-0-value").attr('maxlength',42);
  }
  if($("[id^='node-prot-cons-contactos']").length>0) {
    $("[id^='node-prot-cons-contactos'] #edit-field-nombre-0-value").attr('maxlength',120);
    $("[id^='node-prot-cons-contactos'] #edit-field-direccion-0-value").attr('maxlength',120);
    $("[id^='node-prot-cons-contactos'] #edit-field-correo-0-value").attr('maxlength',120);
    $("[id^='node-prot-cons-contactos'] #edit-field-horario-0-value").attr('maxlength',120);
    $("[id^='node-prot-cons-contactos'] #edit-field-telefono-0-value").attr('maxlength',30);
  }

  if($("[id^='node-proteccion-al-consumidor']").length>0) {
    $("[id^='node-proteccion-al-consumidor'] #edit-field-titulo-0-value").attr('maxlength',120);
  }

  if($("[id^='node-proteccion-al-consumidor-home']").length>0) {
    $("[id^='node-proteccion-al-consumidor-home'] #edit-title-0-value").attr('maxlength',120);
  }
  if($("[id^='node-revista-tono']").length>0) {
    $("[id^='node-revista-tono-form'] #edit-subtitulo-0-value").attr('maxlength',120);
  }

  if($("[id^='node-sede']").length>0) {
    $("[id^='node-sede'] #edit-field-nombre-0-value").attr('maxlength',120);
    $("[id^='node-sede'] #edit-field-direccion-0-value").attr('maxlength',120);
    $("[id^='node-sede'] #edit-field-telefono-0-value").attr('maxlength',30);
  }

  if($("[id^='node-servicio-de-atencion-telefonica']").length>0) {
    $("[id^='node-servicio-de-atencion-telefonica'] #edit-field-nombre-0-value").attr('maxlength',60);
    $("[id^='node-servicio-de-atencion-telefonica'] #edit-field-n-0-value").attr('maxlength',20);
  }

  if($("[id^='node-sobre-de-nosotros']").length>0) {
    $("[id^='node-sobre-de-nosotros'] #edit-field-titulo-0-value").attr('maxlength',120);
  }

  if($("[id^='node-solucion']").length>0) {
    $("[id^='node-solucion'] #edit-field-titulo-0-value").attr('maxlength',23);
    $("[id^='node-solucion'] #edit-field-subtitulo-0-value").attr('maxlength',42);
  }

  if($("[id^='node-preguntas-frecuentes']").length>0) {
    $("[id^='node-preguntas-frecuentes'] label[for*='-summary']").text("Pregunta");    
    $("[id^='node-preguntas-frecuentes'] [id*='-summary--']")[0].setAttribute("maxlength", "170"); 
    $("[id^='node-preguntas-frecuentes'] [id*='-summary--']").after("<label> Respuesta </label>");    
  } 
  
})(jQuery, Drupal);
