(function ($) {

  if (!$(".section-principal-materiais").length) return;

  $("a[data-slug]").on('click', function (e) {
    e.preventDefault();
    const slug = $(this).data('slug');
    const atual = new URL(window.location.href);

    if (slug) atual.searchParams.set('categoria', slug);
    else atual.searchParams.delete('categoria');

    atual.searchParams.delete('pagina');

    window.location.href = atual.toString();
  });


})(jQuery);