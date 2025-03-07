<?php

require_once __DIR__ . '/Alp_API.php';

/**
 * Solução para puxar Cidades e Estados para formulários usando a API do IBGE
 */
class Alp_IBGE extends Alp_API
{
  /**
   * Retorna um array com todos os estados como cadastrados no IBGE.
   * @return array<int,string> Lista dos Estados do Brasil chaveados com o ID do IBGE.
   */
  public static function carregar_select_estados(): array
  {
    $options = [];
    $data = self::obter_dados('https://servicodados.ibge.gov.br/api/v1/localidades/estados?orderBy=nome');

    if (empty($data) || !is_array($data)) return [];

    foreach ($data as $item) {
      $options[$item['id']] = $item['nome'];
    }
    return $options;
  }

  /**
   * Dado um Estado, retorna um array com todos os municípios como cadastradas no IBGE.
   * @param int $estado_id ID do Estado como cadastrado no IBGE.
   * @return array<int,string> Lista dos Municípios chaveados com o ID do IBGE.
   */
  public static function carregar_select_municipios(int $estado_id): array
  {
    $options = [];

    $data = self::obter_dados("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$estado_id}/municipios?orderBy=nome");

    if (empty($data) || !is_array($data)) return [];

    foreach ($data as $item) {
      $options[$item['id']] = $item['nome'];
    }
    return $options;
  }

  /**
   * Obtém todas as cidades via AJAX dado que um id de Estado é passado via POST.
   * @return void
   */
  public static function ajax_obter_estados(): void
  {
    $estados = self::carregar_select_estados();
    wp_send_json_success($estados);
    wp_die();
  }

  /**
   * Obtém todas as cidades via AJAX dado que um id de Estado é passado via POST.
   * @return void
   */
  public static function ajax_obter_cidades(): void
  {
    if (!isset($_POST['estado_id'])) {
      wp_send_json_error('Estado não fornecido');
      wp_die();
    }

    $estado_id = intval($_POST['estado_id']);
    $cidades = self::carregar_select_municipios($estado_id);

    wp_send_json_success($cidades);
    wp_die();
  }

  /**
   * @param int|string $cidade_id ID do Município, segundo IBGE.
   * @return string O nome do município, ou $cidade_id se não for encontrado na base do IBGE.
   */
  public static function get_cidade(int|string $cidade_id): string
  {
    if (empty($cidade_id)) return '';
    $data = self::obter_dados("https://servicodados.ibge.gov.br/api/v1/localidades/municipios/{$cidade_id}");

    if (!$data) return $cidade_id;
    return $data['nome'];
  }

  /**
   * @param int|string $estado_id ID do Estado, segundo IBGE.
   * @param bool $sigla True se desejar usar apenas a sigla do Estado em vez do nome completo.
   * @return string A sigla ou nome do estado, ou $estado_id se não for encontrado na base do IBGE.
   */
  public static function get_estado(int|string $estado_id, bool $sigla = false): string
  {
    if (!$estado_id) return '';
    $data = self::obter_dados("https://servicodados.ibge.gov.br/api/v1/localidades/estados/{$estado_id}");

    if (!$data) return $estado_id;

    if ($sigla) return $data['sigla'];
    else return $data['nome'];
  }

  public static function script_metabox_cidades(): void
  {
    $screen = get_current_screen();
?>
    <script>
      (function($) {
        $('#projeto_estado').on('change', function() {
          var estado_id = $(this).val();

          $.ajax({
            url: '<?= admin_url('admin-ajax.php'); ?>',
            type: 'POST',
            data: {
              action: 'obter_cidades',
              estado_id: estado_id
            },
            success: function(response) {
              if (!response.success) return console.log(response.data);

              const cidades = response.data;
              const $cidadeSelect = $('#projeto_cidade');

              $cidadeSelect.empty();
              $.each(cidades, function(id, nome) {
                $cidadeSelect.append($('<option>', {
                  value: id,
                  text: nome
                }));
              });

              $cidadeSelect.trigger('change');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.error('Erro AJAX:', textStatus, errorThrown);
            }
          });
        });

        <?php if ($screen && $screen->base === 'post' && $screen->action === 'add' && $screen->post_type === 'projeto'): ?>
          $('#projeto_estado').trigger('change');
        <?php endif; ?>

      })(jQuery);
    </script>
<?php
  }
}

add_action('wp_ajax_ibge_estados', ['Alp_IBGE', 'ajax_obter_estados']);
add_action('wp_ajax_nopriv_ibge_estados', ['Alp_IBGE', 'ajax_obter_estados']);

add_action('wp_ajax_ibge_cidades', ['Alp_IBGE', 'ajax_obter_cidades']);
add_action('wp_ajax_nopriv_ibge_cidades', ['Alp_IBGE', 'ajax_obter_cidades']);

add_action('admin_footer', ['Alp_IBGE', 'script_metabox_cidades']);
