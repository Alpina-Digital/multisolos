<?php
class Alp_Walker_Mega extends Walker_Nav_Menu
{
  private array $filhos;

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    if ($depth < 1) return;

    $parent = intval($item->menu_item_parent);
    $this->filhos[$parent][] = $item;
  }

  function end_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    if ($depth > 0) return;

    $filhos = $this->filhos[$item->ID] ?? [];
    $titulo = $item->title;

    if (mb_strtolower($titulo) === 'produtos') return $this->gerar_mega($output, $item, $filhos, 'product');
    if (mb_strtolower($titulo) === 'objetivos') return $this->gerar_mega($output, $item, $filhos, 'product_objetivo');
    if (mb_strtolower($titulo) === 'categorias') return $this->gerar_mega($output, $item, $filhos, 'product_cat');

    $url = $item->url;
    $part_args = compact('filhos', 'titulo', 'url');

    ob_start();
    get_template_part('template-parts/header/mega/item-menu-lvl0', NULL, $part_args);
    $output .= ob_get_clean();
  }

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    return;
  }

  function end_lvl(&$output, $depth = 0, $args = null)
  {
    return;
  }

  function gerar_mega(&$output, $item, $filhos, $tipo_objeto)
  {
    $titulo = $item->title;
    $url = $item->url;

    $filhos = array_filter($filhos, fn ($item) => $item->object === $tipo_objeto);
    $filhos = array_map(fn ($item) => $item->object_id, $filhos);

    $megamenu = $titulo === 'Produtos' ? $this->conteudo_mega_produtos($filhos) : $this->conteudo_mega_cats($filhos, $titulo);

    $args = compact('filhos', 'titulo', 'url', 'megamenu');

    ob_start();
    get_template_part('template-parts/header/mega/item-menu-lvl0', NULL, $args);
    $output .= ob_get_clean();
  }

  function conteudo_mega_produtos($produtos)
  {
    $produtos = array_map(fn ($item) => new Health_Produto($item), $produtos);

    $args = compact('produtos');

    ob_start();
    get_template_part('template-parts/header/mega/mega-produtos', NULL, $args);
    return ob_get_clean();
  }

  function conteudo_mega_cats($filhos, $titulo)
  {
    if (preg_match('%categoria%uis', $titulo)) $taxonomia = 'product_cat';
    else $taxonomia = 'product_objetivo';

    $objetivos = get_terms([
      'taxonomy' => $taxonomia,
      'hide_empty' => false,
      'include' => $filhos,
    ]);

    $conteudo = '';

    foreach ($objetivos as $objetivo) {
      $conteudo .= Health_Home::conteudo_card_navegue($objetivo);
    }

    if (!$conteudo) return false;
    $args = compact('conteudo', 'objetivos');

    ob_start();
    get_template_part('template-parts/header/mega/mega-objetivos', NULL, $args);
    return ob_get_clean();
  }
}
