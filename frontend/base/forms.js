/**
 * Aplica um loader mais elegante nos CF7.
 * Para isso, aplique a classe .cf7-form-block no bloco onde você vai renderizar o formulário.
 * Isso deve ser feito fora do CF7, e sim no PHP, no container de onde você chama o CF7.
 */
(function ($) {

  $(document).on("wpcf7beforesubmit", ".cf7-form-block form", function () {
    const bloco = $(this).parents('.cf7-form-block');

    bloco.append(`<div class="cf7-form-block-loader"></div>`);
    chamaLoader(bloco.find('.cf7-form-block-loader'));

    bloco.find('.wpcf7').css({ opacity: '.2' });
  });

  $(document).on("wpcf7submit", ".cf7-form-block form", function () {
    const bloco = $(this).parents('.cf7-form-block');

    bloco.find('.cf7-form-block-loader').remove();

    $(this).parents('.cf7-form-block').find('.wpcf7').css({ opacity: '1' });
  });
})(jQuery);

(function ($) {

  /**
   * Arruma o DOM para o 'custom-checkbox' do Cody funcionar com a caixa de aceite do CF7.
   * Para isso, o código no seu CF7 deve ser algo como:
   * <div class="form-contato">
   * ...
   * <label class="label-aceite flex items-center gap-xs">
      <div class="custom-checkbox">
        [acceptance aceite-termos class:custom-checkbox__input]
        <div class="custom-checkbox__control" aria-hidden="true"></div>
      </div>
      <p>Li e concordo com os termos da <a href="politica-de-privacidade" target="_blank" class="text-underline">Política de
          Privacidade.</a></p>
    </label>
    ...
    </div>
    Observe a importância de usar a classe 'form-contato' no container do formulário.
   */
  function fix_forms_checkboxes() {
    const $checkbox = $('.custom-checkbox__input');
    const $control = $('.custom-checkbox__control');

    if (!$checkbox.length && !$control.length) return;
    $control.insertAfter($checkbox);
  }

  window.fix_forms_checkboxes = fix_forms_checkboxes;

  fix_forms_checkboxes();
})(jQuery);

/**
 * Ajustes para transformar os radio buttons do CF7 em checkboxes.
 */
(function ($) {
  function fix_forms_radios() {
    const radio = $('.block-contato-form__radio');

    if (!radio.length) return;

    radio.find('.wpcf7-list-item').each(function () {
      $(this).append('<label><div class="custom-checkbox"></div></label>');
      $(this).find('input').addClass('custom-checkbox__input').appendTo($(this).find('.custom-checkbox'));
      $(this).find('.custom-checkbox').append('<div class="custom-checkbox__control" aria-hidden="true"></div>');
      $(this).find('.wpcf7-list-item-label').appendTo($(this).find('label'));
    });

    // radio.find('.wpcf7-list-item').eq(0).find('.custom-checkbox__input').attr('checked', 'checked');
  }

  window.fix_forms_radios = fix_forms_radios;

  fix_forms_radios();

})(jQuery);