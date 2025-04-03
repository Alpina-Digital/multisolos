<?php

/**
 * Template Part Name: Principal Fale conosco
 * Template Part Type: SECTION
 * Template Part Page: Fale Conosco
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
<section class="section-fale-conosco padding-top-lg">
  <div class="max-width-lg container grid gap-lg gap-xxxl@md padding-y-xl padding-top-xxxl@md padding-bottom-xxl@md">

    <div class="col-12 col-5@md position-relative order-2 order-1@md">
      <div class="flex flex-column gap-xl position-sticky top-sm">
        <h2 class="titulo-secao hide block@md color-primary"><?= $titulo; ?></h2>
        <p class="texto-contato">Envie dúvidas, reclamações, sugestões de melhorias ou feedbacks sobre os nossos serviços.</p>

        <div class="col-contatos bg bg-white flex flex-column gap-lg position-sticky top-sm padding-md radius-lg">

          <div class="flex flex-column gap-sm">
            <?php foreach ($contatos as $i => $item): ?>
              <a href="<?= $item->link; ?>" class="footer__link flex gap-xxs color-primary"
                <?php if ($item->modal): ?> aria-controls="modal-footer" data-url="<?= $item->modal; ?>" <?php endif; ?>>
                <?= $item->icone; ?>
                <div class="flex flex-column gap-xxs">
                  <span><?= $item->value; ?></span>
                </div>
              </a>
            <?php endforeach; ?>
          </div>

          <div>
            <h3 class="titulo-conecte">Conecte-se conosco</h3>
            <div class="flex gap-xs">
              <?php foreach ($sociais as $item):
                if (empty($item->link)) continue; ?>
                <a href="<?= $item->link; ?>" class="footer__social color-primary" target="_blank" aria-label="<?= $item->nome; ?>">
                  <?= $item->icone; ?>
                </a>
              <?php endforeach; ?>
            </div>
          </div>

        </div>

      </div>
    </div>

    <div class="col-12 col-7@md section-fale-conosco__form-container cf7-form-block order-1 order-2@md">
      <h2 class="titulo-secao hide@md margin-bottom-lg color-primary"><?= $titulo; ?></h2>
      <div class="flex flex-column flex-row@xs gap-xs">

        <?php
        //DEFINE QUAL FORMULARIO EXIBIR E O CSS DO BOTAO ATIVO

        $tipo = $_GET['tipo_contato'] ?? '';

        switch ($tipo) {
          case 'fale-conosco':
            $form = $form_contato;
            break;

          case 'orcamento':
            $form = $form_orcamento;
            break;

          default:
            $form = $form_contato;
            $tipo = 'fale-conosco';
        }

        $btn_fale_conosco_class = ($tipo == 'fale-conosco') ? 'btn-tipo-contato-ativo' : '';
        $btn_orcamento_class    = ($tipo == 'orcamento') ? 'btn-tipo-contato-ativo' : '';
        ?>


        <a href="?tipo_contato=fale-conosco" class="btn btn-tipo-contato padding-x-sm <?= $btn_fale_conosco_class ?>" aria-label="<?= $item->nome; ?>">fale conosco</a>
        <a href="?tipo_contato=orcamento" class="btn btn-tipo-contato padding-x-sm <?= $btn_orcamento_class ?>" aria-label="<?= $item->nome; ?>">Solicitar orçamento</a>

      </div>

      <?= $form; ?>

    </div>

</section>