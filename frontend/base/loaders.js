/**
 * Gera o conteúdo HTML do loader.
 * @returns {HTMLElement} Conteúdo HTML do loader.
 */
function htmlLoader() {
  const loader = `
  <div class="loading">
    <div class="circle-loader circle-loader--v1 ajax-circle-loader" role="alert">
      <p class="circle-loader__label">Carregando conteúdo...</p>
      <div aria-hidden="true">
          <div class="circle-loader__circle"></div>
      </div>
    </div>
  </div>`;

  return loader;
}

/**
 * Aplica o loader como conteúdo HTML de um elemento do DOM.
 * @param {Element} el Elemento a ser aplicado o loader. 
 */
function chamaLoader(el) {
  const loader = htmlLoader();
  jQuery(el).html(loader);
}

/**
 * Coloca um loader de página inteira após o body.
 */
function chamaFullLoader() {
  const loader = htmlLoader();
  const fullLoader = `<div class="full-page-loader">${loader}</div>`;

  if (jQuery(".full-page-loader").length > 0) return;

  jQuery("body").append(fullLoader);
}

/**
 * Remove o loader de página inteira.
 */
function removeFullLoader() {
  jQuery(".full-page-loader").remove();
}

jQuery(document).ready(function ($) {
  // Mostrar o loader quando o checkout está sendo atualizado
  $(document.body).on('update_checkout', function () {
    chamaFullLoader();
  });

  // Esconder o loader quando a atualização do checkout é completada
  $(document.body).on('updated_checkout', function () {
    removeFullLoader();
  });

  // Mostrar o loader quando o pedido está sendo finalizado
  $('form.checkout').on('checkout_place_order', function () {
    chamaFullLoader();
  });

  // Esconder o loader após o pedido ser finalizado
  $(document.body).on('checkout_error', function () {
    removeFullLoader();
  });
});