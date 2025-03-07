<?php

/**
 * Template Part Name: Modal iframe
 * Template Part Type: Modal
 * Template Part Page: -
 * Description: É um iframe de URL do Cody para ser incorporado ao tema.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 3.0
 * 
 * @cody _1_modal-window
 * @cody _2_modal-video
 * 
 * @var $args {
 * 	@type string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<div class="modal modal--is-loading flex flex-center bg-black bg-opacity-90% padding-x-md js-modal" id="<?= $id_modal; ?>">
  <div class="modal__content width-100% max-width-md max-height-100% overflow-auto shadow-md" role="alertdialog" aria-labelledby="modal-video-iframe-title" aria-describedby="">

    <p class="sr-only" id="modal-video-iframe-title">Algo será exibido</p>

    <figure class="aspect-ratio-16:9">
      <iframe src="" class="js-modal-video__media" width="640" height="360" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
    </figure>
  </div>

  <div class="modal__loader" aria-hidden="true">
    <svg class="icon icon--lg color-bg icon--is-spinning">
      <path d="M24,48A24,24,0,1,1,48,24,24.027,24.027,0,0,1,24,48ZM24,4A20,20,0,1,0,44,24,20.023,20.023,0,0,0,24,4Z" opacity="0.4"></path>
      <path d="M48,24H44A20.023,20.023,0,0,0,24,4V0A24.028,24.028,0,0,1,48,24Z"></path>
    </svg>
  </div>

  <button class="reset modal__close-btn modal__close-btn--outer  js-modal__close js-tab-focus">
    <svg class="icon icon--sm" viewBox="0 0 24 24">
      <title>Fecha a janela do mapa</title>
      <g fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
        <line x1="3" y1="3" x2="21" y2="21" />
        <line x1="21" y1="3" x2="3" y2="21" />
      </g>
    </svg>
  </button>
</div>