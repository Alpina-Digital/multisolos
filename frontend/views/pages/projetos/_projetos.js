(function ($) {

  if (!$(".section-principal-projetos").length) return;

  const atual = new URL(window.location.href);

  if (!atual.searchParams.has('categoria')) {
    console.log('entrou');
    setProjetoCat('fazenda-solar');
  }

  $("a[data-slug]").on('click', function (e) {
    e.preventDefault();
    const slug = $(this).data('slug');
    setProjetoCat(slug);
  });

  function setProjetoCat(slug) {
    if (slug) atual.searchParams.set('categoria', slug);
    else atual.searchParams.delete('categoria');

    atual.searchParams.delete('pagina');
    window.location.href = atual.toString();
  }


})(jQuery);