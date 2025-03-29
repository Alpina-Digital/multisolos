(function ($) {

  if (!$(".section-principal-servicos").length) return;

  const atual = new URL(window.location.href);

  if (!atual.searchParams.has('categoria')) {
    console.log('entrou');
    setServicoCat('fazenda-solar');
  }

  $("a[data-slug]").on('click', function (e) {
    e.preventDefault();
    const slug = $(this).data('slug');
    setServicoCat(slug);
  });

  function setServicoCat(slug) {
    if (slug) atual.searchParams.set('categoria', slug);
    else atual.searchParams.delete('categoria');

    atual.searchParams.delete('pagina');
    window.location.href = atual.toString();
  }


})(jQuery);