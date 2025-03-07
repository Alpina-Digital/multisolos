<?php

/**
 * Template Part Name: Principal (FAQ)
 * Template Part Type: SECTION
 * Template Part Page: FAQ
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
<section class="section-principal-faq bg-cinza-escuro-ultra padding-bottom-xl padding-bottom-xxxl@md">
  <div class="max-width-lg container flex flex-column gap-md">
    <form class="section-principal-faq__form flex flex-column flex-row@sm gap-md">
      <input type="text" name="busca" class="section-principal-faq__form-input" placeholder="Digite sua dúvida...">
      <select name="cat" class="section-principal-faq__form-select">
        <option value="" disabled <?= empty($cat_selecionada) ? 'selected' : ''; ?>>Selecione o assunto</option>
        <option value="">Todos</option>
        <?php foreach ($categorias as $categoria): ?>
          <option value="<?= $categoria->slug; ?>" <?= $cat_selecionada == $categoria->slug ? 'selected' : ''; ?>><?= $categoria->name; ?></option>
        <?php endforeach; ?>
      </select>
    </form>

    <div class="section-principal-faq__conteudo">
      <?= $conteudo; ?>
    </div>

  </div>
</section>