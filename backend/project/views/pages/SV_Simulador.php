<?php

/**
 * Classe responsável pela página Simulador de Investimento.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_Simulador extends Alp_Page
{
  use SV_Apresentacao;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-simulador-investimento.php', 'simulador');
    $this->create_metaboxes();
  }

  /**
   * Cria os metaboxes da página.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_azul'])
      ->render();
  }

  /**
   * Renderiza a página Simulador.
   * @return void
   */
  public function render(): void
  {
    $this
      ->add_render($this->render_section_apresentacao_azul())
      ->add_render($this->render_section_principal())
      ->echo_render();
  }

  /**
   * Renderiza a seção principal do Simulador.
   * @return string HTML renderizado
   */
  public function render_section_principal(): string
  {
    $passo = intval($_REQUEST['passo'] ?? 1);
    if ($passo === 1) $form = Alp_Settings::get_form('simulador1');
    else $form = self::render_block_form_etapa2();
    return $this->html('frontend/views/pages/simulador/section-principal-simulador.php', compact('form'));
  }

  /**
   * Recebe o HTML do formulário de simulação.
   * @return void
   */
  public static function render_form_simulacao(): void
  {
    $passo = intvaL($_REQUEST['passo'] ?? 1);

    if ($passo === 1) {
      wp_send_json(Alp_Settings::get_form('simulador1'));
      die;
    }

    wp_send_json(self::render_block_form_etapa2());
    die;
  }

  /**
   * Renderiza o bloco do formulário da etapa 2.
   * @return string HTML renderizado
   */
  public static function render_block_form_etapa2(): string
  {
    $tipos = [
      'empresas' => [
        'nome' => 'Empresas',
        'icone' => get_svg_content('orcamento/empresas.svg', 'section_principal_orcamento__item-icone', true, [], 'stroke')
      ],
      'industrias' => [
        'nome' => 'Indústrias',
        'icone' => get_svg_content('orcamento/industrias.svg', 'section_principal_orcamento__item-icone', true, [], 'stroke')
      ],
      'agronegocio' => [
        'nome' => 'Agronegócio',
        'icone' => get_svg_content('orcamento/agronegocio.svg', 'section_principal_orcamento__item-icone', true, [], 'stroke')
      ],
      'residencias' => [
        'nome' => 'Residências',
        'icone' => get_svg_content('orcamento/residencias.svg', 'section_principal_orcamento__item-icone', true, [], 'stroke')
      ],
    ];

    $form = Alp_Settings::get_form('simulador2');

    $args = compact('tipos', 'form');

    return (new self)->html('frontend/views/pages/simulador/block-form-etapa2.php', $args);
  }

  public static function ajax_distribuidoras(): void
  {
    $file = json_decode(file_get_contents(__DIR__ . '/../../json/tarifas.json'), true);

    $distribuidoras = array_column($file, 'distribuidora');
    wp_send_json_success($distribuidoras);
    wp_die();
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Simulador(), 'setup']);

add_action('wp_ajax_distribuidoras', ['SV_Simulador', 'ajax_distribuidoras']);
add_action('wp_ajax_nopriv_distribuidoras', ['SV_Simulador', 'ajax_distribuidoras']);
