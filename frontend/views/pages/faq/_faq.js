(function ($) {

  const $form = $('.section-principal-faq__form');
  if (!$form.length) return;

  const $select = $form.find('.section-principal-faq__form-select');
  const $input = $form.find('.section-principal-faq__form-input');
  const $conteudo = $('.section-principal-faq__conteudo');
  let timerDigitando;

  $input.on('input', function () {
    clearTimeout(timerDigitando);
    timerDigitando = setTimeout(function () {
      $form.submit();
    }, 1000);
  });

  $select.on('change', function () {
    $form.submit();
  });

  $form.on('submit', function (e) {
    e.preventDefault();

    chamaLoader($conteudo);

    const data = {
      action: 'conteudo_faq',
      busca: $input.val(),
      cat: $select.val()
    }

    updateURLParam('busca', data.busca);
    updateURLParam('cat', data.cat);

    $.ajax({
      url: alp_urls.ajax,
      type: 'POST',
      data,
      success: function (response) {
        $conteudo.html(response.data);

        $conteudo.find('.accordion').each(function () {
          new Accordion(this);
        });

      }
    });
  });

  function updateURLParam(param, value) {
    var url = new URL(window.location);
    if (value) url.searchParams.set(param, value);
    else url.searchParams.delete(param);
    window.history.pushState({}, '', url);
  }

})(jQuery);