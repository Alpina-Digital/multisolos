<?php

/**
 * Classe responsável pela página de Soluções para Geração Centralizada.
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_Geracao_Centralizada extends Alp_Page
{
  use SV_Banner_Topo,
    SV_Apresentacao,
    SV_Section_FAQ,
    SV_Grid_Cards_Cinza,
    SV_Banner_Energia_Investimento,
    SV_Card_Azul_Solucao,
    SV_Etapas_Projeto,
    SV_Section_Projetos;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes-geracao-centralizada.php', 'geracao-centralizada');
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
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v2'])
      // VANTAGENS DE GERAÇÃO CENTRALIZADA
      ->chain_from_callable([$this, 'chain_metaboxes_grid_cards_cinza'], id: 'vantagens', name: 'Vantagens de Geração Centralizada', texto: true, icones: true)
      //ETAPAS DE PROJETO
      ->chain_from_callable([$this, 'chain_metaboxes_etapas_projeto'], texto_item: true)
      //SEÇÃO PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      //BANNER PRÉ-FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_banner_pre_faq'])
      //SECTION FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_section_faq'], false)
      ->render();
  }


  public function render(): void
  {
    $avulsos = new SV_Avulsos();
    $this
      ->add_render($this->render_banner_topo())
      ->add_render($this->render_section_apresentacao_v2())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_grid_cards_cinza('vantagens'),
      ))
      ->add_render($this->render_section_etapas_projeto(true, 'padding-y-xxxl'))
      ->add_render($avulsos->render_section_big_numbers_associacoes())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_nossos_projetos(),
        fn() => $avulsos->render_section_quem_ja_confiou(),
        fn() => $avulsos->render_section_depoimentos(),
        fn() => $avulsos->render_section_reconhecimentos()
      ))
      ->add_render($this->render_banner_pre_faq())
      ->add_render($this->render_section_faq_v1())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Solucoes_Geracao_Centralizada(), 'setup']);
