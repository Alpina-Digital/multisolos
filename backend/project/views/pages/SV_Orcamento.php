<?php

/**
 * Classe responsável pela página Solicitar Orçamento.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_Orcamento extends Alp_Page
{
  use SV_Apresentacao;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solicitar-orcamento.php', 'orcamento');
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
   * Renderiza a página Solicitar Orçamento.
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
   * Renderiza a seção principal da página.
   * @return string HTML renderizado.
   */
  public function render_section_principal(): string
  {
    $tipos = [
      'autoproducao' => [
        'nome' => 'Autoprodução',
        'icone' => get_svg_content('orcamento/autoproducao.svg', 'section_principal_orcamento__item-icone', true, [], 'stroke')
      ],
      'bot' => [
        'nome' => 'Economia sem Investimento - BOT',
        'icone' => get_svg_content('orcamento/autoproducao.svg', 'section_principal_orcamento__item-icone', true, [], 'stroke')
      ],
      'empresas' => [
        'nome' => 'Empresas e Indústria',
        'icone' => get_svg_content('orcamento/empresas.svg', 'section_principal_orcamento__item-icone', true, [], 'stroke')
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

    $solucoes = [
      'epc' => 'EPC',
      'usina' => 'Usina de Investimento',
      'sistema' => 'Sistema de Armazenamento',
      'gridzero' => 'Grid Zero'
    ];

    $form = Alp_Settings::get_form('orcamento');

    $args = compact('tipos', 'solucoes', 'form');
    return $this->html('frontend/views/pages/orcamento/section-principal-orcamento.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Orcamento(), 'setup']);
