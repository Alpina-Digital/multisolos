<?php
trait MS_Carrossel
{

  /**
   * Chain das metaboxes da seção do carrossel.
   * @param Alp_Metabox $metaboxes Objeto de entrada.
   * @param bool $texto Se o campo de texto deve ser adicionado.
   * @return Alp_Metabox Objeto saindo.
   */
  public function chain_metaboxes_section_carrossel(Alp_Metabox $metaboxes, bool $texto = false): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('carrossel', 'Seção com Carrossel')
      ->add_metabox_field_biu('Título', 'titulo', 6);

    if ($texto) $metaboxes->add_metabox_field_biu('Texto', 'texto', 6);

    $metaboxes
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 4)
      ->add_metabox_field_biu('Texto', 'texto', 5)
      ->add_metabox_field_image('Imagem', 'imagem', 1, 3)
      ->close_metabox_group();

    return $metaboxes;
  }

  /**
   * Renderiza a seção do carrossel.
   * @param string $swiper_class Classe do swiper (somente o miolo).
   * @param bool $darker Se o fundo deve ser mais escuro.
   * @param bool $show_text Se o texto deve ser exibido sem necessidade do hover.
   * @return string HTML renderizado.
   */
  public function render_section_carrossel(string $swiper_class, bool $darker = false, bool $show_text = false): string
  {
    $avulsos = new MS_Avulsos();
    $args = $this->get_post_metas_values('carrossel', ['metafields' => ['imagem' => 'src']]);
    $args['swiper_class'] = $swiper_class;

    if (!isset($args['cards'])) return '';
    if (!is_array($args['cards'])) $args['cards'] = [$args['cards']];

    foreach ($args['cards'] as &$card) {
      if (!is_array($card)) continue;
      $card = $avulsos->render_card_feature($card, $show_text ? 'card-feature--show-text' : '');
    }

    $args['cards'] = implode('', $args['cards']);
    $args['darker'] = $darker;

    return $this->html('frontend/views/avulsos/section-carrossel.php', $args);
  }
}
