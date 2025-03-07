<?php

/**
 * Classe responsável pela página de Soluções para Autoprodução.
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_Autoproducao extends Alp_Page
{
  use SV_Banner_Topo,
    SV_Apresentacao,
    SV_Section_FAQ,
    SV_Grid_Cards_Cinza,
    SV_Banner_Energia_Investimento,
    SV_Card_Azul_Solucao,
    SV_Etapas_Projeto,
    SV_Subsecoes_Multiplos_Accordions,
    SV_Section_Projetos;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes-autoproducao.php', 'autoproducao');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   */
  public function create_metaboxes(): void
  {
    $this->template->create_metaboxes()

      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'])
      //APRESENTAÇÃO
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v3'])
      // TIPOS DE AUTOPRODUÇÃO
      ->chain_from_callable([$this, 'chain_metaboxes_grid_cards_cinza'], id: 'tipos', name: 'Tipos de Autoprodução', texto: true, icones: true, texto_rodape: true)
      //SEÇÃO DE POR QUE AUTOPRODUÇÃO
      ->add_metabox_box('por_que', 'Seção de Por Que Autoprodução')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_image('Ícone', 'icone', 1, 6)
      ->close_metabox_group()
      //MODELOS DE NEGÓCIO
      ->add_metabox_box('modelos', 'Modelos de Negócio')
      ->add_metabox_field_text('Subtítulo', 'subtitulo', 6)
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group()
      ->add_metabox_field_text('Texto do Botão nos Cards', 'cta_texto', 4)
      ->add_metabox_field_text('Link do Botão nos Cards', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link?', 'cta_target', 4)
      //ETAPAS DE PROJETO
      ->chain_from_callable([$this, 'chain_metaboxes_etapas_projeto'], texto_item: false)
      //BENEFÍCIOS
      ->chain_from_callable([$this, 'chain_metaboxes_subsecoes_multiplos_accordions'], id: 'beneficios', name: 'Benefícios')
      //BANNER INVESTIMENTOS
      ->chain_from_callable([$this, 'chain_metaboxes_banner_energia_investimento'])
      //SEÇÃO PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      //BANNER PRÉ-FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_banner_pre_faq'])
      //SECTION FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_section_faq'], true)
      ->render();
  }


  public function render(): void
  {
    $avulsos = new SV_Avulsos();
    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_apresentacao_v3())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_grid_cards_cinza('tipos'),
      ))
      ->add_render($this->render_section_por_que())
      ->add_render($this->render_section_modelos_autoproducao())
      ->add_render($this->render_section_etapas_projeto())
      ->add_render($this->render_section_subsecoes_multiplos_accordions('beneficios'))
      ->add_render($avulsos->render_section_big_numbers_associacoes())
      ->add_render($this->render_banner_energia_investimento('padding-bottom-xl padding-bottom-xxxl@md'))
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
   * Renderiza a seção Serviços de Por Que Autoprodução.
   * @return string HTML da seção.
   */
  public function render_section_por_que(): string
  {
    $args = $this->get_post_metas_values('por_que');

    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    return $this->html('frontend/views/pages/autoproducao/section-por-que', $args);
  }

  /**
   * Renderiza a seção Modelos de Autoprodução.
   * @return string HTML da seção.
   */
  public function render_section_modelos_autoproducao(): string
  {
    $args = $this->get_post_metas_values('modelos');

    if (empty($args['cards'])) $args['cards'] = [];
    if (!is_array($args['cards'])) $args['cards'] = [$args['cards']];

    foreach ($args['cards'] as $i => &$card) {
      $card = $this->render_card_azul($card, 'col-12 col-4@md', $i + 1, $args);
    }

    $args['cards'] = implode('', $args['cards']);

    return $this->html('frontend/views/pages/autoproducao/section-modelos-autoproducao', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes_Autoproducao(), 'setup']);
