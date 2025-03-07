/**
 * Faz tratamento dos campos de ESTADO e CIDADE dos formulários.
 * @return void
 */
function carregar_ibge() {
  const $ = jQuery;

  const $estado = $('[name="estado"]');
  const $cidade = $('[name="cidade"]');

  $.ajax({
    url: alp_urls.ajax,
    type: 'POST',
    data: {
      action: 'ibge_estados',
    },
    success: function (response) {
      const estados = Object.entries(response.data)
        .sort((a, b) => a[1].localeCompare(b[1]));

      $estado.html('<option value="" disabled selected>Selecione um estado</option>');

      estados.forEach(function (estado) {
        $estado.append(`<option value="${estado[0]}">${estado[1]}</option>`);
      });

      $estado.trigger('change');
    }
  });

  $estado.on('change', function () {
    const estado_id = $(this).val();

    $cidade.html('<option value="">Carregando...</option>');

    $.ajax({
      url: alp_urls.ajax,
      type: 'POST',
      data: {
        action: 'ibge_cidades',
        estado_id
      },
      success: function (response) {
        const cidades = Object.entries(response.data)
          .sort((a, b) => a[1].localeCompare(b[1]));


        if (!cidades.length) {
          $cidade.html('<option value="" disabled selected>Nenhum estado selecionado</option>');
        }
        else {
          $cidade.html('<option value="" disabled selected>Selecione uma cidade</option>');
        }

        cidades.forEach(function (cidade) {
          $cidade.append(`<option value="${cidade[0]}">${cidade[1]}</option>`);
        });

        $cidade.trigger('change');
      }
    });
  });
}

/**
 * Atualiza o campo hidden de localização.
 */
function atualizar_localizacao() {
  const $ = jQuery;

  const $cidade = $('[name="cidade"]');
  const $estado = $('[name="estado"]');
  const $localizacao = $('[name="localizacao"]');

  $cidade.on('change', function () {
    $localizacao.val(`${$cidade.find('option:selected').html()} - ${$estado.find('option:selected').html()}`);
  });
}

/**
 * Ajusta o rótulo do campo de arquivo.
 */
(function ($) {
  const $arquivo = $('.form-contato__file');

  $arquivo.on('change', function () {
    const filename = this.files[0] ? this.files[0].name : "Selecione o arquivo (png, jpg, pdf)";

    $(this).parents('.form-contato__upload').find('.form-contato__input').html(filename);
  });


})(jQuery);