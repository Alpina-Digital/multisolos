<?php

/**
 * Reproduz uma seção com um Grid de Cards Cinza.
 * @package Alpina V4
 * @version 4.0
 */
trait SV_Grid_Cards_Cinza
{
  use Alp_Renderable;

  /**
   * Adiciona os metaboxes da seção de Grid de Cards Cinza.
   * @param Alp_Metabox $metaboxes Instância da classe de metaboxes.
   * @param string $id ID da metabox.
   * @param string $name Nome da metabox.
   * @param bool $texto Se deve adicionar o campo de texto.
   * @param bool $icones Se deve adicionar o campo de ícones.
   * @param bool $texto_rodape Se deve adicionar o campo de texto de rodapé.
   * @return Alp_Metabox Instância da classe de metaboxes.
   */
  public function chain_metaboxes_grid_cards_cinza(Alp_Metabox $metaboxes, string $id, string $name, bool $texto = false, bool $icones = false, bool $texto_rodape = false, bool $itens_numericos = false, $video = false, $cta_rodape = false): Alp_Metabox
  {
    $select = [
      '1' => '1 coluna',
      '1.3' => '1,33 coluna',
      '2' => '2 colunas',
      '2.6' => '2,66 colunas',
      '3' => '3 colunas',
      '4' => '4 colunas'
    ];

    $metaboxes
      ->add_metabox_box($id, $name)
      ->add_metabox_field_biu('Título', 'titulo', 4);

    if ($texto) $metaboxes->add_metabox_field_biu('Texto', 'texto', 8);

    if ($itens_numericos) $metaboxes->add_metabox_field_hidden('numericos', '1');

    $columns = $icones ? 3 : 4;

    $metaboxes
      ->add_metabox_group('Cards', 'cards', 'Card {#} - {titulo}')
      ->add_metabox_field_biu('Título', 'titulo', $columns)
      ->add_metabox_field_biu('Texto', 'texto', $columns)
      ->add_metabox_field_select('Espaço ocupado', 'colunas', $select, $columns, ['desc' => 'Dica: para a linha ficar totalmente preenchida, os itens devem ser arranjados de forma que a soma das colunas seja 4.']);

    if ($icones) $metaboxes->add_metabox_field_image('Ícone', 'icone', 1, $columns);

    $metaboxes->close_metabox_group();

    if ($texto_rodape && $cta_rodape) {
      $metaboxes
        ->add_metabox_heading('Rodapé')
        ->add_metabox_field_biu('Texto no Rodapé', 'texto_rodape', 12)
        ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
        ->add_metabox_field_text('Link no botão', 'cta_link', 4)
        ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4);
    } elseif ($texto_rodape) {
      $metaboxes->add_metabox_field_biu('Texto de Rodapé', 'texto_rodape', 12);
    }

    if ($video) {
      $metaboxes
        ->add_metabox_heading('Vídeo')
        ->add_metabox_field_oembed('URL', 'video', 6)
        ->add_metabox_field_image('Imagem do Vídeo', 'imagem', 1, 6);
    }

    return $metaboxes;
  }

  /**
   * Renderiza a seção de Grid de Cards Cinza.
   * @return string HTML renderizado.
   */
  public function render_section_grid_cards_cinza($box_id = 'vantagens'): string
  {
    $args = $this->get_post_metas_values($box_id, ['metafields' => ['imagem' => 'src', 'icone' => 'svg']]);

    if (empty($args['cards'])) $args['cards'] = [];
    if (!is_array($args['cards'])) $args['cards'] = [$args['cards']];

    $numericos = isset($args['numericos']) ? true : false;

    foreach ($args['cards'] as $i => &$card) {
      $card = $this->render_card_cinza($card, $numericos ? $i + 1 : false);
    }

    $args['cards'] = implode('', $args['cards']);

    if (!empty($args['texto_rodape'])) {
      $args['texto_rodape'] = apply_filters('the_content', $args['texto_rodape']);
      $args['icone_rodape'] = get_svg_content('icon-check-reverse.svg');
    }

    if (!empty($args['video'])) {
      $args['video'] = (new WP_oEmbed())->get_html($args['video']);
      $args['video'] = get_ombed_iframe_src($args['video']);
      $args['video_play'] = $this->html('frontend/base/pulse-play/block-pulse-play.php');
    }

    $args['id'] = $box_id;

    return $this->html('frontend/views/avulsos/section-grid-cards-cinza', $args);
  }


  /**
   * Renderiza um card cinza.
   * @param array $card Informações do card.
   * @return string HTML renderizado.
   */
  public function render_card_cinza(array $card, int|false $num = false): string
  {
    $card['colunas'] = match ((float)$card['colunas'] ?? 1) {
      1.0 => 'col-12 col-3@md',
      1.3 => 'col-12 col-4@md',
      2.0 => 'col-12 col-6@md',
      2.6 => 'col-12 col-8@md',
      3.0 => 'col-12 col-9@md',
      4.0 => 'col-12',
      default => 'col-12 col-3@md',
    };

    if (empty($card['icone'])) $card['icone'] = get_svg_content('icon-check.svg');
    if (!empty($card['texto'])) $card['texto'] = apply_filters('the_content', $card['texto']);

    if ($num) $card['numero'] = $num;

    return $this->html('frontend/views/cards/card-cinza', $card);
  }
}
