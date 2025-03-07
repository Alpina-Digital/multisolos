<?php

/**
 * Classe responsável pela página de Soluções para Economia Sem Investimento.
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_ESI extends Alp_Page
{
  use SV_Banner_Topo,
    SV_Apresentacao,
    SV_Section_FAQ,
    SV_Grid_Cards_Cinza,
    SV_Banner_Energia_Investimento,
    SV_Section_Projetos;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes-economia-sem-inventimento.php', 'esi');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()

      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'])
      // SEÇÃO APRESENTAÇÃO
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v2'])
      //SEÇÃO COMO FUNCIONA
      ->chain_from_callable([$this, 'chain_metaboxes_grid_cards_cinza'], id: 'como_funciona', name: 'Como Funciona', texto: true, itens_numericos: true)
      //SEÇÃO BENEFÍCIOS
      ->add_metabox_box('beneficios', 'Benefícios')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_group('Tabs', 'tabs', 'Tab {#} - {titulo}')
      ->add_metabox_field_image('Ícone', 'icone', 1, 2)
      ->add_metabox_field_biu('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->add_metabox_field_text('Texto Lateral', 'texto_lateral', 6, ['std' => 'Principais vantagens'])
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group()
      ->close_metabox_group()
      //SEÇÃO MOTIVOS PARA ESCOLHER
      ->add_metabox_box('motivos', 'Motivos para Escolher')
      ->add_metabox_field_biu('Título', 'titulo', 12)
      ->add_metabox_group('Motivos', 'motivos', 'Motivo {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group()
      //SEÇÂO PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      //BANNER PRÉ-FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_banner_pre_faq'])
      //SECTION FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_section_faq'], true)
      ->render();
  }

  /**
   * Renderiza a página.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new SV_Avulsos();
    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_apresentacao_v2())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_grid_cards_cinza('como_funciona'),
      ))
      ->add_render($this->render_section_tabs_esi())
      ->add_render($this->render_section_motivos_esi())
      ->add_render($avulsos->render_section_big_numbers_associacoes())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_nossos_projetos(),
        fn() => $avulsos->render_section_quem_ja_confiou(),
        fn() => $avulsos->render_section_depoimentos(),
        fn() => $avulsos->render_section_reconhecimentos()
      ))

      ->add_render($this->render_banner_pre_faq())
      ->add_render($this->render_section_faq_v2())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }

  /**
   * @return string
   */
  public function render_section_tabs_esi(): string
  {
    $args = $this->get_post_metas_values('beneficios');

    if (empty($args['tabs'])) return '';
    if (!is_array($args['tabs'])) return '';

    $args['tabs_conteudo'] = [];

    foreach ($args['tabs'] as $i => $tab) {
      $args['tabs_conteudo'][] = $this->render_item_tab_esi($tab, $i + 1);
    }

    $args['tabs_conteudo'] = implode('', $args['tabs_conteudo']);

    return $this->html('frontend/views/pages/esi/section-tabs-esi.php', $args);
  }

  /**
   * @param array $args
   * @param int $i
   * 
   * @return string
   */
  public function render_item_tab_esi(array $args, int $i): string
  {
    $args['i'] = $i;
    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    return $this->html('frontend/views/pages/esi/item-tab-esi.php', $args);
  }

  /**
   * Renderiza a seção de motivos ESI.
   * @return string
   */
  public function render_section_motivos_esi(): string
  {
    $args = $this->get_post_metas_values('motivos');

    if (empty($args['motivos'])) return '';
    if (!is_array($args['motivos'])) return '';

    return $this->html('frontend/views/pages/esi/section-motivos-esi.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes_ESI(), 'setup']);
