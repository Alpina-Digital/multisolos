<?php

/**
 * Template Part Name: Linha inferior no FOOTER
 * Template Part Type: ROW
 * Template Part Page: Footer
 * Description: Copyright do site, made by Alpina e links para páginas de política de privacidade.

 * @author Alpina Digital
 * @package Alpina V4
 * @since 2.0
 */
?>
<div class="max-width-lg container padding-bottom-xl position-relative">
  <div class="flex flex-column flex-row@sm items-center gap-y-sm justify-between">

    <div class="footer__copyright flex flex-column gap-xxxs">
      <span> ©<?= date('Y'); ?> <?= get_bloginfo('title'); ?>.</span>
    </div>

    <a class="footer__alpina" href="<?= esc_url('http://alpina.digital') ?>" target="_blank" aria-label="Alpina Digital">
      <?= get_svg_content('footer/alpina-logo.svg'); ?>
    </a>

    <?= Alp_Menus::linear('footer-politicas', 'footer__menu footer__menu-politicas flex gap-xs', 'footer__menu-item', 'footer__link footer__link--small'); ?>
  </div>
</div>