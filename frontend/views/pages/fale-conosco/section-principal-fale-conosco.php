<?php

/**
 * Template Part Name: Principal Contato
 * Template Part Type: SECTION
 * Template Part Page: Contato
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-principal-contato bg-cinza-escuro-ultra padding-top-lg">
  <div class="max-width-lg container grid gap-lg gap-xxxl@md padding-y-xl padding-top-xxxl@md padding-bottom-xxl@md">

    <div class="col-12 col-5@md position-relative order-2 order-1@md">
      <div class="flex flex-column gap-xl position-sticky top-sm">
        <h2 class="titulo-secao hide block@md"><?= $titulo; ?></h2>

        <div class="flex flex-column gap-sm">
          <h3 class="footer__title hide@md" style="margin-bottom: 0;">Contato</h3>
          <?php foreach ($contatos as $i => $item): ?>
            <a href="<?= $item->link; ?>" class="footer__link flex gap-xxs"
              <?php if ($item->modal): ?> aria-controls="modal-footer" data-url="<?= $item->modal; ?>" <?php endif; ?>>
              <?= $item->icone; ?>
              <div class="flex flex-column gap-xxs">
                <span><?= $item->value; ?></span>
                <?php if ($i + 1 === count($contatos)): ?>
                  <span class="color-accent text-sm flex gap-xxs items-center">Ver no mapa
                    <?= get_svg_content('seta-direita.svg', '', true, [16, 16]); ?>
                  </span>
                <?php endif; ?>
              </div>
            </a>
          <?php endforeach; ?>
        </div>

        <div>
          <h3 class="footer__title">Conecte-se com a gente</h3>
          <div class="flex gap-xs">
            <?php foreach ($sociais as $item):
              if (empty($item->link)) continue; ?>
              <a href="<?= $item->link; ?>" class="footer__social" target="_blank" aria-label="<?= $item->nome; ?>">
                <?= $item->icone; ?>
              </a>
            <?php endforeach; ?>
          </div>
        </div>

        <div class="flex flex-column flex-row@xs gap-xs">
          <a href="#1" class="btn btn--accent btn--hover-white padding-x-sm" target="_blank" aria-label="<?= $item->nome; ?>">Trabalhe conosco</a>
          <a href="#1" class="btn btn--primary btn--hover-white padding-x-sm" target="_blank" aria-label="<?= $item->nome; ?>">Seja nosso fornecedor </a>
        </div>

      </div>
    </div>

    <div class="col-12 col-7@md section-principal-contato__form-container cf7-form-block order-1 order-2@md">
      <h2 class="titulo-secao hide@md margin-bottom-lg"><?= $titulo; ?></h2>
      <?= $form; ?>
    </div>

</section>