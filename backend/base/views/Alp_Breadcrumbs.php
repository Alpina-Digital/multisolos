<?php
class Alp_Breadcrumbs
{
  private static array $path = [];

  /**
   * Inicia a configuração dos argumentos dos Breadcrumbs.
   */
  public static function init()
  {
    self::set_home_path();
  }

  /**
   * Seta um caminho.
   * @param string $conteudo String com nome do item ou algum conteúdo HTML.
   * @param string|false|null $url URL que será acessada quando clicar no item, se existir.
   * @param string|array $classes_css Classes CSS que devem ser aplicadas no item.
   */
  public static function set_path(string $conteudo, string|false|null $url = false, string|array $classes_css = ''): void
  {
    self::$path[] = self::gerar_path($conteudo, $url, $classes_css);
  }

  /**
   * Imprime a caixa com os breadcrumbs.
   */
  public static function print_breadcrumbs(string|array $classes_css_nav = '', string|array $classes_css_wrapper = ''): string
  {
    $path = self::set_delimiters();

    if (is_array($classes_css_nav)) $classes_css_nav = implode(" ", $classes_css_nav);
    if (is_array($classes_css_wrapper)) $classes_css_wrapper = implode(" ", $classes_css_wrapper);

    $args = compact('path', 'classes_css_nav', 'classes_css_wrapper');

    ob_start();
    get_template_part('template-parts/base/breadcrumbs/block-breadcrumbs', NULL, $args);
    return ob_get_clean();
  }

  /**
   * Gera o HTML de um caminho.
   * @param string $conteudo String com nome do item ou algum conteúdo HTML.
   * @param string|false|null $url URL que será acessada quando clicar no item, se existir.
   * @param string|array $classes_css Classes CSS que devem ser aplicadas no item.
   * @return string HTML do caminho.
   */
  private static function gerar_path(string $conteudo, string|false|null $url = false, string|array $classes_css = ''): string
  {
    if (is_array($classes_css)) $classes_css = implode(" ", $classes_css);

    $url = esc_url($url);

    $args = compact('url', 'classes_css', 'conteudo');

    ob_start();
    get_template_part('template-parts/base/breadcrumbs/item-breadcrumbs', NULL, $args);
    return ob_get_clean();
  }

  /**
   * Seta o caminho da HOME.
   */
  private static function set_home_path(): void
  {
    $url = get_home_url();
    self::set_path(self::get_home_svg(), $url);
  }

  /**
   * Seta os delimiters e entrega o path como string.
   */
  private static function set_delimiters(): string
  {
    $delimiter = self::gerar_path(self::get_delimiter_svg());
    $path = self::$path;

    $path = implode($delimiter, $path);
    return $path;
  }

  /**
   * Retorna o ícone do delimiter.
   * @return string SVG do delimiter.
   */
  private static function get_delimiter_svg(): string
  {
    return get_svg_content('base/breadcrumbs-delimiter.svg');
  }

  /**
   * Retorna o ícone da home.
   * @return string SVG da home.
   */
  private static function get_home_svg(): string
  {
    return get_svg_content('base/breadcrumbs-home.svg');
  }
}

add_action('init', ['Alp_Breadcrumbs', 'init']);
