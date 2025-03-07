<?php

/**
 * Classe responsável pela página "Como Funciona".
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class SV_Como_Funciona extends Alp_Page
{

  use SV_Banner_Topo,
    SV_Apresentacao,
    SV_Grid_Cards_Cinza,
    SV_Banner_Energia_Investimento,
    SV_Section_FAQ;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-como-funciona.php', 'como_funciona');
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
      //PASSOS
      ->add_metabox_box('passos', 'Seção dos Cards Empilhadáveis')
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_biu('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->add_metabox_field_image('Imagem', 'imagem', 1, 2)
      ->close_metabox_group()
      //VANTAGENS
      ->chain_from_callable([$this, 'chain_metaboxes_grid_cards_cinza'], id: 'vantagens', name: 'Seção de Vantagens')
      //BANNER ENERGIA E INVESTIMENTO
      ->chain_from_callable([$this, 'chain_metaboxes_banner_energia_investimento'])
      //MODALIDADES
      ->add_metabox_box('modalidades', 'Seção de Modalidades')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_image('Imagem Lateral', 'imagem', 1, 6)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_image('Ícone', 'icone', 1, 2)
      ->add_metabox_field_biu('Título', 'titulo', 5)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      //BANNER PRÉ-FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_banner_pre_faq'])
      //SECTION FAQ
      ->chain_from_callable([$this, 'chain_metaboxes_section_faq'], false)

      ->close_metabox_group()

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
      ->add_render($this->render_section_como_funciona())
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_grid_cards_cinza()
      ))
      // ->add_render('<div class="bg-cinza-escuro-ultra padding-top-xxxl">xxx</div>')
      ->add_render($avulsos->render_section_solucoes('padding-y-xl padding-y-xxxl@md'))
      ->add_render($this->render_banner_energia_investimento('padding-bottom-xl padding-bottom-xxxl@md'))
      ->add_render($avulsos->render_wrapper_branco_por_cima(
        fn() => $this->render_section_modalidades()
      ))
      ->add_render($this->render_banner_pre_faq())
      ->add_render($this->render_section_faq_v1())
      ->add_render($avulsos->render_section_blog())
      ->add_render($avulsos->render_section_newsletter())
      ->echo_render();
  }

  /**
   * Renderiza a seção "Como Funciona".
   * @return string HTML renderizado.
   */
  public function render_section_como_funciona(): string
  {
    $args = $this->get_post_metas_values('passos');

    foreach ($args['cards'] as $i => &$card) {
      $card = $this->render_card_como_funciona($card, $i + 1);
    }

    $args['cards'] = implode('', $args['cards']);

    return $this->html('frontend/views/pages/como-funciona/section-como-funciona.php', $args);
  }

  /**
   * Renderiza um card da seção "Como Funciona".
   * @param array $card Array com os dados do card.
   * @param int $numero Número do card.
   * 
   * @return string HTML renderizado.
   */
  private function render_card_como_funciona(array $card, int $numero): string
  {
    $card['numero'] = str_pad($numero, 2, "0", STR_PAD_LEFT);

    return $this->html('frontend/views/cards/card-como-funciona.php', $card);
  }

  /**
   * Renderiza a seção de modalidades.
   * @return string HTML renderizado.
   */
  public function render_section_modalidades(): string
  {
    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    $args = $this->get_post_metas_values('modalidades');
    return $this->html('frontend/views/pages/como-funciona/section-modalidades-geracao-distribuida.php', $args);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new SV_Como_Funciona(), 'setup']);
