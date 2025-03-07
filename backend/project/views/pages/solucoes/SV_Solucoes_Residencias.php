<?php

/**
 * Classe responsável pela página de Soluções para Residências.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_Solucoes_Residencias extends Alp_Page
{
  use
    SV_Banner_Topo,
    SV_Apresentacao,
    SV_Grid_Cards_Cinza,
    SV_Tres_Passos,
    SV_Section_FAQ,
    SV_Banner_Energia_Investimento,
    SV_Section_Projetos;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-solucoes-residencia.php', 'residencias');
    $this->create_metaboxes();
  }

  /**
   * Cria as metaboxes do template.
   * @return void
   */
  public function create_metaboxes(): void
  {
    $this
      ->template->create_metaboxes()
      //BANNER
      ->chain_from_callable([$this, 'chain_metaboxes_banner_topo'])
      //APRESENTAÇÃO
      ->chain_from_callable([$this, 'chain_metaboxes_apresentacao_v1'])
      //VANTAGENS
      ->chain_from_callable([$this, 'chain_metaboxes_grid_cards_cinza'], id: 'vantagens', name: 'Seção de Vantagens', texto: false, icones: true)
      // SEÇÃO COM PASSOS
      ->chain_from_callable([$this, 'chain_metaboxes_tres_passos'])
      //BANNER INVESTIMENTOS
      ->chain_from_callable([$this, 'chain_metaboxes_banner_energia_investimento'])
      //SEÇÃO PROJETOS
      ->chain_from_callable([$this, 'chain_metaboxes_section_projetos'])
      //BANNER PRÉ-FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_banner_pre_faq'])
      //SECTION FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_section_faq'], false)

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
      ->add_render($this->render_section_apresentacao_v1())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_grid_cards_cinza()
      ))
      ->add_render($this->render_section_tres_passos())
      ->add_render($this->render_banner_energia_investimento('padding-bottom-xl padding-bottom-xxxl@md'))
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
add_action('after_setup_theme', [new SV_Solucoes_Residencias(), 'setup']);
