<?php

/**
 * Template Part Name: Modalidades da geração de energia distribuída
 * Template Part Type: SECTION
 * Template Part Page: Como Funciona
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 *  @var array{icone:string,titulo:string,texto:string} $itens Lista de itens com ícones e textos.
 *  @var string $imagem Imagem lateral.
 * }
 */
extract($args);
?>
<section class="section-modalidades-geracao-distribuida">
  <div class="max-width-lg container flex flex-column gap-xl gap-xxl@md">

    <h2 class="titulo-secao titulo-secao--dark"><?= $titulo; ?></h2>
    <div class="grid gap-xl gap-xxl@md">

      <div class="col-12 col-6@md flex flex-column gap-lg">
        <?php foreach ($itens as $item): ?>
          <div class="section-modalidades-geracao-distribuida__item flex gap-md">
            <figure class="section-modalidades-geracao-distribuida__item-icone flex-shrink-0"><?= $item['icone'] ?? ''; ?></figure>
            <div class="flex flex-column gap-xs">
              <h3 class="section-modalidades-geracao-distribuida__item-titulo"><?= $item['titulo'] ?? ''; ?></h3>
              <div class="section-modalidades-geracao-distribuida__item-texto text-component"><?= $item['texto'] ?? ''; ?></div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <div class="col-12 col-6@md">
        <figure class="section-modalidades-geracao-distribuida__imagem">
          <?= $imagem ?? ''; ?>
        </figure>
      </div>

    </div>

  </div>
</section>