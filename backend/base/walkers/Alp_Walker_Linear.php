<?php
class Alp_Walker_Linear extends Walker_Nav_Menu
{
  private $li_class = '';

  public function set_li_class(array|string $css_classes): void
  {
    if (is_array($css_classes)) $css_classes = implode(" ", $css_classes);
    $this->li_class = $css_classes;
  }

  /**
   * Início de um item do menu.
   * @param string $output Usado para acrescentar as informações a serem impressas.
   * @param WP_Post $item Objeto do item atual.
   * @param int $depth Nível atual do menu. (Esse menu não terá outros níveis).
   * @param stdClass $args Objeto com os argumentos do wp_nav_menu().
   * @param int $item_id Opcional. ID do item sendo iterado.
   * @return void
   */
  public function start_el(&$output, $item, $depth = 0, $args = null, $item_id = 0): void
  {
    $target = $item->target === "_blank" ? "_blank" : "_self";

    ob_start();
?>
    <li class="<?= $this->li_class; ?>">
      <a href="<?= $item->url; ?>" target="<?= $target; ?>" <?= $target; ?>>
        <?= $item->title; ?>
      </a>
  <?php
    $output .= ob_get_clean();
  }

  function end_el(&$output, $item, $depth = 0, $args = null)
  {
    $output .= "</li>";
  }
}
