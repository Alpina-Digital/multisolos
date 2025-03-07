(function ($) {
  if (!$('.section-principal-simulador').length) return;

  const urlParams = new URLSearchParams(window.location.search);
  let passo = urlParams.get('passo');

  const nome = sessionStorage.getItem("simulador-nome");
  const email = sessionStorage.getItem("simulador-email");
  const telefone = sessionStorage.getItem("simulador-telefone");

  if (!passo) return vaiPasso(1);
  if (passo !== "1" && passo !== "2") return vaiPasso(1);
  if (passo === "2" && (!nome || !email || !telefone)) return vaiPasso(1);

  $('.section-principal-simulador__fase').attr('style', `--step-v2-current-step: ${5 * passo};`).find('p').html(`Passo ${passo} de 2`);

  if (passo === "1") passo_um();
  else passo_dois();

})(jQuery);

/**
 * Vai para o passo especificado.
 */
function vaiPasso(passo = 1) {
  const currentUrl = new URL(window.location.href);
  currentUrl.searchParams.set('passo', passo);
  window.location.assign(currentUrl);
}

/**
 * Ações a serem tomadas no primeiro passo.
 */
function passo_um() {
  const $ = jQuery;

  $(document).on('wpcf7mailsent', function (event) {

    $.each(event.detail.inputs, function (_, input) {
      if (input.name === 'nome') {
        sessionStorage.setItem('simulador-nome', input.value);
      } else if (input.name === 'email') {
        sessionStorage.setItem('simulador-email', input.value);
      } else if (input.name === 'telefone') {
        sessionStorage.setItem('simulador-telefone', input.value);
      }
    });

    vaiPasso(2);
  });
}


/**
 * Ações a serem tomadas no segundo passo.
 */
function passo_dois() {

  carregar_ibge();
  checkboxes_instalacoes();
  atualizar_localizacao();

  const $ = jQuery;

  const nome = sessionStorage.getItem("simulador-nome");
  const email = sessionStorage.getItem("simulador-email");
  const telefone = sessionStorage.getItem("simulador-telefone");

  $('.block-form-etapa2').find('input[name="nome"]').val(nome);
  $('.block-form-etapa2').find('input[name="email"]').val(email);
  $('.block-form-etapa2').find('input[name="telefone"]').val(telefone);

  const $distribuidora = $('[name="distribuidora"]');

  $.ajax({
    url: alp_urls.ajax,
    type: 'POST',
    data: {
      action: 'distribuidoras',
    },
    success: function (response) {
      const distribuidoras = Object.entries(response.data)
        .sort((a, b) => a[1].localeCompare(b[1]));

      $distribuidora.html('<option value="" disabled>Selecione uma distribuidora</option>');

      distribuidoras.forEach(function (distribuidora) {
        $distribuidora.append(`<option value="${distribuidora[1]}">${distribuidora[1]}</option>`);
      });

      $distribuidora.trigger('change');
    }
  });

  $(document).on('wpcf7mailsent', function (event) {
    event.preventDefault();

    let estado, distribuidora, consumo, instalacao, tarifa;

    console.log(event.detail.inputs);

    $.each(event.detail.inputs, function (_, input) {
      if (input.name === 'estado') estado = input.value;
      if (input.name === 'distribuidora') distribuidora = input.value;
      if (input.name === 'consumo') consumo = input.value;
      if (input.name === 'instalacao') instalacao = input.value;
      if (input.name === 'tarifa') tarifa = input.value;
    });

    const resultadosURL = new URL('resultados-do-simulador', window.location.origin);
    resultadosURL.searchParams.set('estado', estado);
    resultadosURL.searchParams.set('distribuidora', distribuidora);
    resultadosURL.searchParams.set('consumo', consumo);
    resultadosURL.searchParams.set('instalacao', instalacao);
    if (tarifa && tarifa > 0) resultadosURL.searchParams.set('tarifa', tarifa);

    window.location.assign(resultadosURL);
  });
}

/**
 * Trabalha com os checkboxes de instalações.
 */
function checkboxes_instalacoes() {
  const $ = jQuery;

  const $instalacoes = $('[data-instalacao]');
  const selectInstalacoes = $('select[name="instalacao"]');
  selectInstalacoes.html('');

  $instalacoes.each(function () {
    const instalacao = $(this).data('instalacao');
    selectInstalacoes.append($('<option>', {
      value: instalacao,
      text: instalacao
    }));
  });

  $instalacoes.on('click', function () {
    $instalacoes.find('.custom-checkbox__input').prop('checked', false);
    $instalacoes.removeClass('block-form-etapa2__item--ativo');
    $(this).find('.custom-checkbox__input').prop('checked', true);
    $(this).addClass('block-form-etapa2__item--ativo');

    const selected = $(this).data('instalacao');
    selectInstalacoes.val(selected).trigger('change');
  });

  $instalacoes.eq(0).click();
}