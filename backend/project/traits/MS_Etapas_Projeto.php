<?php

/**
 * Reproduz uma seção com um Grid de Etapas do Projeto.
 * @package Alpina V4
 * @version 4.0
 */
trait MS_Etapas_Projeto
{
  use Alp_Renderable;

  /**
   * Adiciona metaboxes para a seção de etapas do projeto.
   * @param Alp_Metabox $metaboxes Instância da classe de metaboxes.
   * @param string $id ID da metabox.
   * @param string $name Nome da metabox.
   * @param bool $texto Se deve adicionar o campo de texto.
   * @param bool $icones Se deve adicionar o campo de ícones.
   * @param bool $texto_rodape Se deve adicionar o campo de texto de rodapé.
   * @return Alp_Metabox
   */
  public function chain_metaboxes_etapas_projeto(Alp_Metabox $metaboxes, bool $texto_item = true): Alp_Metabox
  {
    $metaboxes
      ->add_metabox_box('etapas', 'Etapas de Projeto')
      ->add_metabox_field_text('Subtítulo', 'subtitulo', 6)
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4)
      ->add_metabox_group('Itens', 'itens', 'Item {#} - {titulo}')
      ->add_metabox_field_text('Título', 'titulo', 6);

    if ($texto_item) $metaboxes->add_metabox_field_biu('Texto', 'texto', 6);

    $metaboxes->close_metabox_group();

    return $metaboxes;
  }

  /**
   * Renderiza a seção de Etapas do Projeto.
   * @param string $titulo Título da etapa.
   * @return string HTML renderizado.
   */
  public function render_section_etapas_projeto(bool $texto_itens = false, string $classes = 'padding-y-xl'): string
  {
    $args = $this->get_post_metas_values('etapas');
    $args['texto_itens'] = $texto_itens;
    $args['classes'] = $classes;

    if (empty($args['itens'])) $args['itens'] = [];
    if (!is_array($args['itens'])) $args['itens'] = [$args['itens']];

    foreach ($args['itens'] as $i => &$item) {
      $item = $this->render_item_etapa_projeto($item, $i + 1, $texto_itens ? 'v2' : 'v1');
    }

    $args['itens'] = implode('', $args['itens']);

    return $this->html('frontend/views/avulsos/etapas/section-etapas-projeto', $args);
  }

  public function render_item_etapa_projeto(array $item, int $numero, string $v): string
  {
    $item['numero'] = $numero;
    return $this->html("frontend/views/avulsos/etapas/item-etapa-projeto-{$v}", $item);
  }
}
