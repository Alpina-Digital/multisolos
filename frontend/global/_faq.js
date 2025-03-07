(function ($) {
  const bloco_faqs = $("#conteudo-faq");

  $('[name=buscar_duvidas').on('input', function () {
    change_bloco_faqs();
  });

  function change_bloco_faqs() {

    chamaLoader(bloco_faqs);

    const buscar_duvidas = $('[name=buscar_duvidas]').val();
    const id = $('[data-id]').data("id");

    $.ajax({
      'url': alp_urls.ajax,
      'type': 'POST',
      'data': {
        action: 'conteudo_faq',
        buscar_duvidas,
        id,
      }
    }).done(function (m) {
      bloco_faqs.html(m);
      var accordions = document.getElementsByClassName('js-accordion');
      if (accordions.length > 0) {
        for (var i = 0; i < accordions.length; i++) {
          (function (i) { new Accordion(accordions[i]); })(i);
        }
      }
    });
  }

})(jQuery);