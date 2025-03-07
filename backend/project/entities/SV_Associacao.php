<?php

/**
 * Classe para a entidade de Associação.
 */
class SV_Associacao
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
      ->create_post_type('Associação', 'Associações', 'associacao', true, 'businesswoman', false, false);

    self::create_metaboxes();
  }

  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      ->add_metabox_box('', 'Informações Gerais')
      ->add_metabox_field_image('Logo', 'logo')
      ->add_metabox_field_text('Descrição curta', 'descricao_curta', 12, ['desc' => 'Aparece na página inicial e demais páginas que utilizam esse recurso.'])
      ->add_metabox_field_biu('Texto sobre a Associação', 'texto', 12, ['desc' => 'Aparece na página Quem Somos.'])
      ->render();
  }

  public function get_post_metas_values(): array
  {
    return self::$entity->get_metaboxes()->get_post_metas_values($this->id, '', ['metafields' => ['logo' => 'img']])['_main'];
  }
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['SV_Associacao', 'setup']);
