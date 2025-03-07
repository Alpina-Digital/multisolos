<?php

/**
 * Classe para a entidade de Materiais Ricos.
 */
class SV_Material
{
  use Alp_Entitable;

  /**
   * Setup da entidade.
   * @hooked action 'after_setup_theme'
   * @return void
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Material', 'Materiais Ricos', 'material', false, 'download', false, false)
      ->create_taxonomy('Categoria de Material', 'material_cat');

    self::create_metaboxes();
  }

  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      ->add_metabox_box('', 'Informações do Material')
      ->add_metabox_field_image('Imagem do Card', 'imagem', 1, 2)
      ->add_metabox_field_biu('Texto no Card', 'texto', 10)
      ->add_metabox_field_select('Tipo do Material', 'tipo', [
        'url' => 'Link Externo',
        'arquivo' => 'Arquivo para Download',
        'video' => 'Vídeo'
      ], 4)
      //SE VÍDEO
      ->add_metabox_field_oembed('Link para o vídeo', 'video', 12)
      ->add_logic('tipo', 'video')
      //SE URL
      ->add_metabox_field_text('Link', 'url', 12)
      ->add_logic('tipo', 'url')
      //SE ARQUIVO
      ->add_metabox_field_file('Arquivo para Download', 'arquivo', 1, 12)
      ->add_logic('tipo', 'arquivo')
      ->render();
  }

  public function get_post_metas_values(): array
  {
    return self::$entity->get_metaboxes()->get_post_metas_values($this->id, '', ['metafields' => ['imagem' => 'src']])['_main'];
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['SV_Material', 'setup']);
