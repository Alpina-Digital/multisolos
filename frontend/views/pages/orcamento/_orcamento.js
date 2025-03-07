(function ($) {
  if (!$('.section-principal-orcamento__item').length) return;

  const $solucoes = $('[data-solucao]');
  const selectSolucoes = $('select[name="solucao"]');

  $solucoes.each(function () {
    const solucao = $(this).data('solucao');
    selectSolucoes.append($('<option>', {
      value: solucao,
      text: solucao
    }));
  });

  $solucoes.on('click', function () {
    $solucoes.find('.custom-checkbox__input').prop('checked', false);
    $solucoes.removeClass('section-principal-orcamento__item--ativo');
    $(this).find('.custom-checkbox__input').prop('checked', true);
    $(this).addClass('section-principal-orcamento__item--ativo');

    const selected = $(this).data('solucao');
    selectSolucoes.val(selected).trigger('change');
  });

  $solucoes.eq(0).click();

  carregar_ibge();
  atualizar_localizacao();

})(jQuery);