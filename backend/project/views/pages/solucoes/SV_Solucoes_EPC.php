<?php

/**
 * Classe responsável pela página de Soluções para Engenharia, Suprimentos e Construção.
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_EPC extends Alp_Page
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
    $this->template = new Alp_Page_Template('template-solucoes-engenharia-suprimentos-construcao.php', 'epc');
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
      // SEÇÃO APRESENTAÇÃO
      ->add_metabox_box('apresentacao', 'Seção de Apresentação')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->close_metabox_group()
      //TABELA
      ->add_metabox_box('tabela', 'Seção com Tabela')
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_heading('Tabela')
      ->add_metabox_group('Linhas', 'linhas', 'Linha {#} - {etapa_projeto} | {equipamento}')
      ->add_metabox_field_text('Etapa do Projeto', 'etapa_projeto', 6)
      ->add_metabox_field_text('Equipamento', 'equipamento', 6)
      //COMO FUNCIONA
      ->chain_from_callable([$this, 'chain_metaboxes_grid_cards_cinza'], id: 'como_funciona', name: 'Como Funciona', texto: true, icones: true)
      //ETAPAS DO PROJETO
      ->chain_from_callable([$this, 'chain_metaboxes_etapas_projeto'], texto_item: true)
      //VANTAGENS
      ->chain_from_callable([$this, 'chain_metaboxes_subsecoes_multiplos_accordions'], id: 'vantagens', name: 'Seção de Vantagens')
      //SEÇÂO PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      // BANNER PRÉ-FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_banner_pre_faq'])
      // SECTION FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_section_faq'], true)

      ->render();
  }

  public function render(): void
  {
    $avulsos = new SV_Avulsos();
    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_apresentacao())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_tabela(),
        fn() => $this->render_section_grid_cards_cinza('como_funciona'),
      ))
      ->add_render($this->render_section_etapas_projeto(true, 'padding-top-xl padding-top-xxxl@md padding-bottom-lg padding-bottom-xl@md'))
      ->add_render($this->render_section_subsecoes_multiplos_accordions('vantagens', 'padding-top-xl padding-bottom-md padding-bottom-xxxl@md'))
      ->add_render($avulsos->render_section_big_numbers_associacoes())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        //projetos cases de sucesso
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

  public function render_section_apresentacao(): string
  {
    $args = $this->get_post_metas_values('apresentacao', false);

    if (empty($args['cards'])) $args['cards'] = [];
    if (!is_array($args['cards'])) $args['cards'] = [$args['cards']];

    foreach ($args['cards'] as $i => &$card) {
      $card = $this->render_card_azul($card, num: $i + 1);
    }

    $args['cards'] = implode('', $args['cards']);

    return $this->html('frontend/views/pages/epc/section-apresentacao-epc.php', $args);
  }

  public function render_section_tabela(): string
  {
    $args = $this->get_post_metas_values('tabela', false);
    return $this->html('frontend/views/pages/epc/section-tabela-epc.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes_EPC(), 'setup']);
