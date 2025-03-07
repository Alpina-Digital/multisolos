<?php

/**
 * Esta classe é responsável por gerenciar o header da Solarvolt.
 */
class SV_Header
{
  use Alp_Renderable;

  public function render(): void
  {
    $this
      ->add_render($this->render_block_preloader())
      ->add_render($this->render_header())
      ->echo_render();
  }

  /**
   * Renderiza o conteúdo do header.
   * @return string HTML do header.
   */
  public function render_header(): string
  {
    // $cols = implode(PHP_EOL, [
    //   $this->get_col_logo(),
    //   $this->get_col_contato(),
    //   $this->get_col_menu('Soluções', 'footer-solucoes'),
    //   $this->get_col_menu('Menu', 'footer-menu'),
    // ]);

    // $args = compact('cols');
    return $this->html('frontend/views/header/header-main.php', $args = []);
  }

  public function render_block_preloader(): string
  {
    return $this->html('frontend/base/preloader/block-preloader.php');
  }
}
