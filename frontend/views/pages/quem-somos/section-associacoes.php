<?php

/**
 * Template Part Name: Associações
 * Template Part Type: SECTION
 * Template Part Page: Quem Somos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção.
 *  @var array{logo:string,nome:string,texto:string,descricao_curta:string} $itens Lista de associações.
 */
extract($args);
?>
<section class="section-associacoes bg-cinza-escuro-ultra padding-top-xl padding-top-xxxl@md">
  <div class="max-width-lg container">

    <div class="flex flex-column gap-xl">
      <h2 class="titulo-secao text-center">Associações que participamos</h2>

      <div class="grid gap-md items-start">
        <?php foreach ($itens as $item): ?>
          <div class="section-associacoes__associacao col-12 col-6@sm col-4@md flex flex-column gap-md">
            <figure class="section-associacoes__logo">
              <?= $item['logo']; ?>
            </figure>
            <div class="flex flex-column gap-xs">
              <div class="section-associacoes__texto text-component line-clamp-13"><?= $item['texto']; ?></div>
              <div class="section-associacoes__leia-mais js-read-more" data-read-more="section-associacoes__texto">Leia mais</div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

    </div>

  </div>
</section>