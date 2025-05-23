<?php

/**
 * Esta classe é responsável por gerenciar o footer da Multisolos.
 */
class MS_Footer
{
  use Alp_Renderable;

  public function render(): void
  {
    $this
      ->add_render($this->render_row_superior())
      ->add_render($this->render_row_central())
      ->add_render($this->render_row_inferior())
      ->add_render(get_svg_content('deco-footer.svg', 'footer__deco'))
      ->echo_render();
  }

  /**
   * Renderiza a linha superior do footer.
   * @return string HTML da linha.
   */
  public function render_row_superior(): string
  {
    $sociais = $this->get_col_redes();
    $logo = $this->get_col_logo();

    $args = compact('sociais', 'logo');

    return $this->html('frontend/views/footer/row-superior.php', $args);
  }

  /**
   * Renderiza a linha central do footer.
   * @return string HTML da linha.
   */
  public function render_row_central(): string
  {
    $cols = implode(PHP_EOL, [
      // $this->get_col_logo(),
      $this->get_col_contatos(),
      $this->get_col_menu('Soluções', 'footer-1'),
      $this->get_col_menu('Institucional', 'footer-2'),
      $this->get_col_accordions_mobile(),
    ]);

    $args = compact('cols');
    return $this->html('frontend/views/footer/row-central.php', $args);
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
    $slogan = 'Estaqueamento e sondagem Ltda.';
    $cnpj = Alp_Settings::get_option('cnpj');
    $args = compact('logo', 'slogan', 'cnpj');
    return $this->html('frontend/views/footer/col-superior-logo.php', $args);
  }

  /**
   * Renderiza a coluna com os contatos.
   * @return string HTML da coluna.
   */
  public function get_col_contatos(string $class = 'hide flex@lg'): string
  {
    $titulo = 'Contatos';
    $telefone = Alp_Settings::get_telefone(1);
    $telefone_icone = get_svg_content('footer/telefone.svg', 'footer__icone color-accent', true);

    $whatsapp = Alp_Settings::get_telefone(2);
    $whatsapp_icone = get_svg_content('footer/whatsapp.svg', 'footer__icone color-accent', true);

    $whatsapp2 = Alp_Settings::get_telefone(3);
    $whatsapp_icone = get_svg_content('footer/whatsapp.svg', 'footer__icone color-accent', true);

    $email = apply_filters('the_content', Alp_Settings::get_option('email'));
    $email_icone = get_svg_content('footer/email.svg', 'footer__icone color-accent', true);

    $pin = get_svg_content('footer/pin.svg', 'footer__icone color-accent', true);
    $arrow = get_svg_content('arrow-link.svg', 'footer__icone color-accent', true, [], 'stroke');

    $endereco = apply_filters('the_content', Alp_Settings::get_option('endereco'));
    $endereco_url = Alp_Settings::get_maps_url();

    $args = compact('titulo', 'telefone', 'whatsapp', 'whatsapp2', 'telefone_icone', 'whatsapp_icone', 'endereco', 'pin', 'arrow', 'endereco_url', 'email', 'email_icone', 'class');
    return $this->html('frontend/views/footer/col-central-contato.php', $args);
  }

  /**
   * Renderiza a coluna com as redes sociais.
   * @return string HTML da coluna.
   */
  public function get_col_redes(): string
  {
    $sociais = [
      (object) [
        'nome' => 'Instagram',
        'link' => Alp_Settings::get_option('instagram'),
        'icone' => get_svg_content('footer/icon-instagram.svg', 'footer__social-icon', true, [21,21])
      ],
      (object) [
        'nome' => 'YouTube',
        'link' => Alp_Settings::get_option('youtube'),
        'icone' => get_svg_content('footer/icon-youtube.svg', 'footer__social-icon', true)
      ],
      (object) [
        'nome' => 'Facebook',
        'link' => Alp_Settings::get_option('facebook'),
        'icone' => get_svg_content('footer/icon-facebook.svg', 'footer__social-icon', true, [23,23])
      ],
      (object) [
        'nome' => 'Linkedin',
        'link' => Alp_Settings::get_option('linkedin'),
        'icone' => get_svg_content('footer/icon-linkedin.svg', 'footer__social-icon', true, [24,24])
      ]
    ];

    $args = compact('sociais');
    return $this->html('frontend/views/footer/col-superior-redes.php', $args);
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
   * @param string $menu_id ID do menu a ser renderizado.
   * @return string HTML da coluna.
   */
  private function get_col_menu(string $titulo, string $menu_id): string
  {
    $menu = Alp_Menus::linear($menu_id, 'footer__menu flex flex-column gap-xs', 'footer__menu-item', 'footer__link');

    $args = compact('titulo', 'menu');
    return $this->html('frontend/views/footer/col-central-menu.php', $args);
  }



  /**
   * Renderiza a coluna de accordion para mobile.
   * @param string $titulo Título do accordion.
   * @param string $conteudo Conteúdo do accordion.
   * @return string HTML da coluna.
   */
  private function get_col_accordions_mobile(): string
  {
    $contatos = $this->get_col_contatos('flex');

    $menu_footer1 = Alp_Menus::linear('footer-1', 'footer__menu flex flex-column gap-xs', 'footer__menu-item', 'footer__link');
    $menu_footer2 = Alp_Menus::linear('footer-2', 'footer__menu flex flex-column gap-xs', 'footer__menu-item', 'footer__link');

    $args = compact('contatos', 'menu_footer1', 'menu_footer2');
    return $this->html('frontend/views/footer/col-accordions-mobile.php', $args);
  }
}
