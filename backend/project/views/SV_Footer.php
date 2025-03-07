<?php

/**
 * Esta classe é responsável por gerenciar o footer da Solarvolt.
 */
class SV_Footer
{
  use Alp_Renderable;

  public function render(): void
  {
    $this->add_render($this->render_row_superior())
      ->add_render($this->render_row_inferior())
      ->echo_render();
  }

  /**
   * Renderiza a linha superior do footer.
   * @return string HTML da linha.
   */
  public function render_row_superior(): string
  {
    $cols = implode(PHP_EOL, [
      $this->get_col_logo(),
      $this->get_col_contato(),
      $this->get_col_menu('Soluções', 'footer-solucoes'),
      $this->get_col_menu('Menu', 'footer-menu'),
    ]);

    $args = compact('cols');
    return $this->html('frontend/views/footer/row-superior.php', $args);
  }

  /**
   * Renderiza a linha superior do footer.
   * @return string HTML da linha.
   */
  public function render_row_inferior(): string
  {
    return $this->html('frontend/views/footer/row-inferior.php');
  }

  /**
   * Renderiza a coluna com a logo e botões.
   * @return string HTML da coluna.
   */
  private function get_col_logo(): string
  {
    $logo = get_svg_content('logo/logo-footer.svg');
    $args = compact('logo');
    return $this->html('frontend/views/footer/col-superior-logo.php', $args);
  }

  /**
   * Renderiza a coluna com os contatos.
   * @return string HTML da coluna.
   */
  private function get_col_contato(): string
  {
    $telefone = Alp_Settings::get_telefone();
    $endereco = Alp_Settings::get_option('endereco');
    $endereco_maps = Alp_Settings::get_maps_url();
    $email = Alp_Settings::get_email();

    $contatos = $this->get_contatos();
    $sociais = $this->get_sociais();

    $args = compact('contatos', 'sociais');
    return $this->html('frontend/views/footer/col-superior-contato.php', $args);
  }

  public function get_contatos(): array
  {
    $telefone = Alp_Settings::get_telefone();
    $endereco = Alp_Settings::get_option('endereco');
    $endereco_maps = Alp_Settings::get_maps_url();
    $email = Alp_Settings::get_email();

    return [
      (object) [
        'icone' => get_svg_content('footer/location.svg', 'color-accent flex-shrink-0', true),
        'link' => '#mapa',
        'value' => $endereco,
        'modal'  => $endereco_maps,
      ],
      (object) [
        'icone' => get_svg_content('footer/phone.svg', 'color-accent flex-shrink-0', true),
        'link' => $telefone->url,
        'value' => $telefone->texto,
        'modal' => false
      ],
      (object) [
        'icone' => get_svg_content('footer/email.svg', 'color-accent flex-shrink-0', true),
        'link' => $email->url,
        'value' => $email->texto,
        'modal' => false
      ],
    ];
  }

  public function get_sociais(): array
  {
    return [
      (object) [
        'nome' => 'Instagram',
        'link' => Alp_Settings::get_option('instagram'),
        'icone' => get_svg_content('footer/icon-instagram.svg', 'flex-shrink-0', true)
      ],
      (object) [
        'nome' => 'LinkedIn',
        'link' => Alp_Settings::get_option('linkedin'),
        'icone' => get_svg_content('footer/icon-linkedin.svg', 'flex-shrink-0', true)
      ],
      (object) [
        'nome' => 'Facebook',
        'link' => Alp_Settings::get_option('facebook'),
        'icone' => get_svg_content('footer/icon-facebook.svg', 'flex-shrink-0', true)
      ],
      (object) [
        'nome' => 'YouTube',
        'link' => Alp_Settings::get_option('youtube'),
        'icone' => get_svg_content('footer/icon-youtube.svg', 'flex-shrink-0', true)
      ]
    ];
  }

  /**
   * Renderiza uma coluna de menu.
   * @param string $titulo
   * @param string $menu_id
   * 
   * @return string HTML da coluna.
   */
  private function get_col_menu(string $titulo, string $menu_id): string
  {
    $menu = Alp_Menus::linear($menu_id, 'footer__menu flex flex-column gap-xs', 'footer__menu-item', 'footer__link');

    $args = compact('titulo', 'menu');
    return $this->html('frontend/views/footer/col-superior-menu.php', $args);
  }
}
