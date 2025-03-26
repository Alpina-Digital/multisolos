<?php

/**
 * Classe responsável pela página de Quem Somos.
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
class MS_Quem_Somos extends Alp_Page
{
  use MS_Banner_Topo;

  /**
   * Faz o setup da estrutura da página no backend.
   * @hooked action 'after_setup_theme'
   */
  public function setup(): void
  {
    $this->template = new Alp_Page_Template('template-quem-somos.php', 'quem_somos');
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

      //SEÇÃO SOBRE
      ->add_metabox_box('sobre', 'Seção Sobre')
      ->add_metabox_field_text('Título', 'titulo', 4)
      ->add_metabox_field_image('Selo', 'selo', 1, 3)
      ->add_metabox_field_image('Foto principal', 'foto_principal', 1, 5)
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto Superior', 'texto', 12)
      ->close_metabox_group()

      //SEÇÃO MISSAO VALORES
      ->add_metabox_box('missao_visao', 'Missão Valores')
      ->add_metabox_field_biu('Missão', 'missao', 6)
      ->add_metabox_field_biu_list('Valores', 'valores', 6)

      //SEÇÃO NOSSA EQUIPE
      ->add_metabox_box('equipe', 'Nossa equipe')
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {nome}')
      ->add_metabox_field_image('Foto', 'foto', 1, 12)
      ->add_metabox_field_text('Nome', 'nome', 6)
      ->add_metabox_field_text('Cargo', 'cargo', 6)
      ->add_metabox_field_text('Especialidade', 'especialidade', 6)
      ->add_metabox_field_text('Link do currículo', 'link', 6)
      ->close_metabox_group()



      ->render();
  }

  /**
   * Renderiza toda a página.
   * @return void
   */
  public function render(): void
  {
    $avulsos = new MS_Avulsos();

    $this->add_render($this->render_banner_topo())
      ->add_render($this->render_section_sobre())
      ->add_render($this->render_section_missao_valores())
      ->add_render($this->render_section_equipe())
      ->add_render($avulsos->render_section_quem_ja_confiou())
      ->add_render($avulsos->render_section_timeline())

      ->echo_render();
  }

  /**
   * Renderiza a seção Sobre.
   * @return string HTML da seção.
   */
  private function render_section_sobre($white = true): string
  {
    /**
     * @var array{titulo:string,cards:array<int,array>} $args  Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('sobre');
    foreach ($args['cards'] as $key => $card) {
      $args['cards'][$key] = $this->render_card_sobre($card);
    }
    $args['cards'] = implode(PHP_EOL, $args['cards']);
    $args['swiper_class'] = 'quem-somos-sobre';
    $args['white'] = $white;
    return $this->html('frontend/views/pages/quem-somos/section-sobre', $args);
  }

  /**
   * Renderiza um card de Sobre.
   * @param array{titulo?:string,texto?:string,} $card Card de sobre.
   * 
   * @return string HTML do card.
   */
  private function render_card_sobre(array $card): string
  {
    if (empty($card['itens']) || !is_array($card['itens'])) $card['itens'] = [];
    $card['itens'] = array_map(fn($item) => $item['texto'] ?? '', $card['itens']);
    return $this->html('frontend/views/cards/card-sobre', $card);
  }

  /**
   * Renderiza a seção Missão Valores.
   * @return string HTML da seção.
   */
  private function render_section_missao_valores(): string
  {
    /**
     * @var array{missao:string,valores:string} $args Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('missao_visao');

    return $this->html('frontend/views/pages/quem-somos/section-missao-valores', $args);
  }

  /**
   * Renderiza a seção Equipe.
   * @return string HTML da seção.
   */
  private function render_section_equipe(): string
  {
    /**
     * @var array{titulo:string,cards:array<int,array>} $args  Metaboxes da seção.
     */
    $args = $this->get_post_metas_values('equipe');
    foreach ($args['cards'] as $key => $card) {
      $args['cards'][$key] = $this->render_card_equipe($card);
    }
    $args['cards'] = implode(PHP_EOL, $args['cards']);
    return $this->html('frontend/views/pages/quem-somos/section-equipe', $args);
  }

  /**
   * Renderiza um card de Sobre.
   * @param array{titulo?:string,texto?:string,} $card Card de sobre.
   * 
   * @return string HTML do card.
   */
  private function render_card_equipe(array $card): string
  {
    if (empty($card['itens']) || !is_array($card['itens'])) $card['itens'] = [];
    $card['itens'] = array_map(fn($item) => $item['texto'] ?? '', $card['itens']);
    if (!empty($card['foto'])) {
      $card['foto'] = wp_get_attachment_image_url($card['foto']);
  }
    return $this->html('frontend/views/cards/card-equipe', $card);
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', [new MS_Quem_Somos(), 'setup']);
