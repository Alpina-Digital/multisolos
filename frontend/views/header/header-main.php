<header class="f-header js-f-header hide-nav hide-nav--fixed js-hide-nav js-hide-nav--main" data-nav-target-class="f-header--expanded">
  <div class=" f-header__mobile-content container max-width-xxl">
    <a href="<?= home_url(); ?>" class="f-header__logo" aria-label="">
      <?= get_svg_content('logo/logo-header.svg'); ?>
    </a>

    <button class="reset anim-menu-btn js-anim-menu-btn f-header__nav-control js-tab-focus" aria-label="Toggle menu">
      <i class="anim-menu-btn__icon anim-menu-btn__icon--close" aria-hidden="true"></i>
    </button>
  </div>

  <div class="f-header__nav" role="navigation">
    <div class="f-header__nav-grid justify-between@md container max-width-xxl">
      <div class="f-header__nav-logo-wrapper flex-grow flex-basis-0">
        <a href="<?= home_url(); ?>" class="f-header__logo" aria-label="">
          <?= get_svg_content('logo/logo-header.svg'); ?>
        </a>
      </div>

      <?= Alp_Menus::flexi('menu-principal', 'f-header__list justify-end@md'); ?>

    </div>
  </div>
</header>