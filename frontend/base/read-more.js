(function ($) {
  if (!$('.js-read-more').length) return;

  /**
   * Remove o botão de "Leia mais" se o conteúdo não ultrapassar o limite de linhas.
   */
  $('.js-read-more').each(function (i, e) {
    const target = $(this).data('read-more');
    const sibling = $(this).siblings(`.${target}`)[0];

    const visibleHeight = sibling.offsetHeight;
    const scrollHeight = sibling.scrollHeight;

    if (scrollHeight <= visibleHeight)
      $(this).remove();
  });

  /**
   * Adiciona ou remove a classe 'line-clamp-13' no elemento que contém o texto a ser truncado.
   * Além disso, altera o texto do botão de acordo com a ação realizada.
   */
  $('.js-read-more').on("click", function () {
    const target = $(this).data('read-more');
    const sibling = $(this).siblings(`.${target}`);

    if (hasClassLineClamp(sibling)) {
      removeClassLineClamp(sibling);
      $(this).text('Leia menos');
    }
    else {
      sibling.addClass('line-clamp-13');
      $(this).text('Leia mais');
    }

  });

  /**
   * Checa se o elemento tem uma classe que inicia com 'line-clamp'.
   * @param HTMLElement $element Elemento a ser verificado.
   * @return bool Se tem ou não a classe.
   */
  function hasClassLineClamp($element) {
    return $element.attr('class').split(' ').some(className => className.startsWith('line-clamp'));
  }

  /**
   * Remove todas as classes que iniciam com 'line-clamp' do elemento.
   * @param HTMLElement $element Elemento a ser verificado.
   * @return void
   */
  function removeClassLineClamp($element) {
    const classes = $element.attr('class').split(' ');
    const classesToRemove = classes.filter(className => className.startsWith('line-clamp'));
    $element.removeClass(classesToRemove.join(' '));
  }

})(jQuery);