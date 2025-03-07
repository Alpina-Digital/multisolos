<?php
class Alp_Walker_Flexi extends Walker_Nav_Menu
{
  use Alp_Renderable;
  private array $filhos;

  public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    if ($depth < 1) return;

    $titulo = $item->title;
    $url = $item->url;
    $parent = intval($item->menu_item_parent);
    $target = $item->target === "_blank" ? "_blank" : "_self";

    $this->filhos[$parent][] = (object) compact('titulo', 'url', 'target');
  }

  public function end_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    if ($depth > 0) return;
    $filhos = $this->filhos[$item->ID] ?? false;

    $titulo = $item->title;
    $url = $item->url;

    $classes = (bool) get_post_meta($item->db_id, '_destaque', true) ? 'f-header__item--destaque' : '';

    $target =  $item->target === "_blank" ? "_blank" : "_self";

    $part_args = compact('filhos', 'titulo', 'url', 'classes', 'target');
    $output .= $this->html('frontend/views/header/item-header', $part_args);
  }

  public function start_lvl(&$output, $depth = 0, $args = null): void {}

  public function end_lvl(&$output, $depth = 0, $args = null): void {}

  public function render(): void {}
}
