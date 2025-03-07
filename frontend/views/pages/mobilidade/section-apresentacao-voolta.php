<?php

/**
 * Template Part Name: Apresentação Solve
 * Template Part Type: SECTION
 * Template Part Page: O&M
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 * @cody _1_example //coloque aqui os elementos do Cody que foram usados nessa template part.
 * 
 * @var $args {
 * 	@var string $exemplo Exemplo de uma variável
 * }
 */
extract($args);
?>
<section class="section-apresentacao-voolta padding-y-xxxl" style="--section-apresentacao-voolta-imagem:url('<?= $imagem; ?>')">
  <div class="max-width-lg container grid gap-xxl items-center">

    <div class="section-apresentacao-voolta__qualidades col-12 col-5@md flex gap-xl justify-center items-center">
      <?php if (!empty($texto_qualidades)) : ?>
        <div class="section-apresentacao-voolta__qualidades-texto"><?= $texto_qualidades; ?></div>
      <?php endif; ?>
      <?php if (!empty($qualidades)) : ?>
        <div class="section-apresentacao-voolta__qualidades-palavras"><?= $qualidades; ?></div>
      <?php endif; ?>
    </div>

    <div class="col-12 col-7@md flex flex-column gap-lg">
      <?= $logo ?? ''; ?>
      <?php if (!empty($texto)) : ?>
        <div class="section-apresentacao-voolta__texto paragrafo-branco"><?= $texto; ?></div>
      <?php endif; ?>
    </div>

    <!-- ->add_metabox_field_text('Título', 'titulo_trabalho', 6)
      ->add_metabox_field_biu('Texto', 'texto_trabalho', 6)
    ->add_metabox_heading('Bloco de Especializações')
      ->add_metabox_field_text('Título', 'titulo_especializacoes', 6)
      ->add_metabox_field_biu_list('Lista', 'lista_especializacoes', 6)
      ->add_metabox_heading('Bloco com Botão (CTA)')
      ->add_metabox_field_biu('Texto', 'texto_bloco_cta', 6)
      ->add_metabox_field_blank(6)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4) -->

    <div class="col-12 col-7@md flex flex-column gap-xl">
      <div class="flex flex-column gap-xs">
        <?php if (!empty($titulo_trabalho)) : ?>
          <h2 class="section-apresentacao-voolta__trabalho-titulo"><?= $titulo_trabalho; ?></h2>
        <?php endif; ?>
        <?php if (!empty($texto_trabalho)) : ?>
          <div class="section-apresentacao-voolta__trabalho-texto paragrafo-branco"><?= $texto_trabalho; ?></div>
        <?php endif; ?>
      </div>

      <div class="section-apresentacao-voolta__bloco-cta flex gap-md justify-center items-center">
        <?php if (!empty($texto_bloco_cta)) : ?>
          <div class="section-apresentacao-voolta__cta-texto"><?= $texto_bloco_cta; ?></div>
        <?php endif; ?>
        <?php if (!empty($cta_texto) && !empty($cta_link)) : ?>
          <a href="<?= $cta_link; ?>" target="<?= $cta_target ?? '_self'; ?>" class="section-apresentacao-voolta__cta-btn btn btn--accent"><?= $cta_texto; ?></a>
        <?php endif; ?>
      </div>

    </div>


    <div class="section-apresentacao-voolta__especializacoes col-12 col-5@md flex flex-column gap-md">
      <?php if (!empty($titulo_especializacoes)) : ?>
        <h3 class="section-apresentacao-voolta__especializacoes-titulo"><?= $titulo_especializacoes; ?></h3>
      <?php endif; ?>
      <?php if (!empty($lista_especializacoes)) : ?>
        <div class="section-apresentacao-voolta__especializacoes-lista"><?= $lista_especializacoes; ?></div>
      <?php endif; ?>
    </div>

  </div>
</section>