<?php
class MS_Servico
{
  use Alp_Entitable;

  /**
   * Faz o setup da Entidade.
   * @hooked action 'after_setup_theme'
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Serviço', 'Serviços', 'servico', false, 'editor-kitchensink', true, true)
      ->create_taxonomy('', '');

    self::create_metaboxes();
  }

  /**
   * Estabelece os metaboxes de Serviço.
   * @return void
   */
  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      //PRINCIPAL
      ->add_metabox_box('', 'Informações Gerais')
      ->add_metabox_field_text('Texto do card', 'texto_card', 9)
      ->add_metabox_field_image('Imagem de Destaque', 'imagem', 1, 3)
      ->add_metabox_field_biu('Texto', 'texto', 12, ['options' => ['textarea_rows' => 10]])
      //GALERIA
      ->add_metabox_box('', 'Galerias')
      ->add_metabox_group('Vídeos', 'videos', 'Vídeo {#}', 6, 12)
      ->add_metabox_field_image('Imagem de Destaque', 'imagem', 1, 3, 'Tamanho sugerido: 1216px x 640px')
      ->add_metabox_field_oembed('URL do Vídeo', 'url', 9)
      ->close_metabox_group()
      ->add_metabox_field_image('Galeria de Imagens', 'imagens', 12, 6, 'Tamanho sugerido: 1216px x 640px')
      ->render();
  }

  /**
   * Retorna os valores dos metadados do post.
   * @return array{} Valores dos metadados.
   */
  public function get_post_metas_values(): array
  {
    return self::$entity->get_metaboxes()->get_post_metas_values($this->id, '');
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['MS_Servico', 'setup']);
