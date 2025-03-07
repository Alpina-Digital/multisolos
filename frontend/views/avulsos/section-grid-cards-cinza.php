<?php

/**
 * Template Part Name: Grid Cards Cinza
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 *  @var string $titulo Título da seção.
 *  @var string $texto Texto opcional abaixo do título.
 *  @var string $cards Cards a serem exibidos.
 *  @var string $texto_rodape Texto opcional no rodapé.
 *  @var string $icone_rodape Ícone opcional no rodapé.
 *  @var string $cta_texto Texto do botão.
 *  @var string $cta_link Link do botão.
 *  @var string $cta_target Target do link do botão.
 *  @var string $video URL do vídeo.
 *  @var string $video_play Ícone de play do vídeo.
 *  @var string $imagem Imagem de fundo do vídeo.
 * }
 */
extract($args);
?>
<section id="<?= $id; ?>" class="section-grid-cards-cinza">
  <div class="max-width-lg container flex flex-column gap-<?= empty($texto) ? 'xl' : 'lg'; ?>">
    <h2 class="section-grid-cards-cinza__titulo titulo-secao titulo-secao--dark text-center"><?= $titulo ?? ''; ?></h2>
    <?php if (!empty($texto)): ?>
      <div class="section-grid-cards-cinza__texto texto-paragrafo text-center"><?= $texto; ?></div>
    <?php endif; ?>

    <?php if (!empty($video)): ?>
      <div class="section-grid-cards-cinza__video text-center" aria-controls="modal-footer" data-url="<?= $video; ?>" style="--section-grid-cards-cinza-video-imagem: url('<?= $imagem; ?>');">
        <?= $video_play ?? ''; ?>
      </div>
    <?php endif; ?>

    <div class="grid gap-sm">
      <?= $cards; ?>
    </div>

    <?php if (!empty($texto_rodape)): ?>
      <div class="section-grid-cards-cinza__rodape text-center flex flex-column flex-row@sm gap-md items-center">
        <?php if (empty($cta_texto) || empty($cta_link)): ?>
          <div class="flex-shrink-0"><?= $icone_rodape ?? ''; ?></div>
        <?php endif; ?>
        <div class="text-left"> <?= $texto_rodape; ?> </div>
        <?php if (!empty($cta_texto) && !empty($cta_link)): ?>
          <a href="<?= $cta_link; ?>" class="btn btn--accent btn--hover-white" target="<?= $cta_target ?? '_self'; ?>"><?= $cta_texto; ?></a>
        <?php endif; ?>
      </div>
    <?php endif; ?>

  </div>

</section>