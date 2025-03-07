<?php

/**
 * Classe responsável pela página de Soluções para GridZero.
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_GridZero extends Alp_Page
{
  use
    SV_Banner_Topo,
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
    $this->template = new Alp_Page_Template('template-solucoes-gridzero.php', 'gridzero');
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
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v2'])
      //SEÇÃO COMO FUNCIONA
      ->chain_from_callable([$this, 'chain_metaboxes_grid_cards_cinza'], id: 'como_funciona', name: 'Como Funciona', texto: true, icones: false, texto_rodape: true, itens_numericos: true, video: true, cta_rodape: true)
      //SEÇÃO DE VANTAGENS
      ->add_metabox_box('vantagens', 'Seção de Vantagens')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_image('Ícone', 'icone', 1, 2)
      ->add_metabox_field_text('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->close_metabox_group()
      //SEÇÃO PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      //BANNER PRÉ-FAQ
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
      ->add_render($this->render_section_apresentacao_v2())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_grid_cards_cinza('como_funciona')
      ))
      ->add_render($this->render_section_vantagens())
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
   * Renderiza a seção de Vantagens.
   * @return string HTML da seção.
   */
  public function render_section_vantagens(): string
  {
    $args = $this->get_post_metas_values('vantagens');

    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    return $this->html('frontend/views/pages/grid-zero/section-vantagens-gridzero', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes_GridZero(), 'setup']);
