<?php

/**
 * Template Part Name: Tabela EPC
 * Template Part Type: SECTION
 * Template Part Page: Avulsos
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 * 
 * @var $args {
 * 	@var string $titulo Título da seção
 *  @var string $cards Cards a serem exibidos
 * }
 */
extract($args);
?>
<section class="section-tabela-epc">
  <div class="max-width-lg container flex flex-column gap-md">

    <div class="flex flex-column gap-lg">
      <h2 class="section-tabela-epc__titulo titulo-secao titulo-secao--dark text-center"><?= $titulo ?? ''; ?></h2>
      <div class="section-tabela-epc__texto texto-paragrafo text-center"><?= $texto ?? ''; ?></div>
    </div>

    <div class="overflow-auto">
      <table>
        <tr>
          <th rowspan="5" class="section-tabela-epc__full"><span>Full EPC (Turnkey)</span></th>
          <th rowspan="2" class="section-tabela-epc__full"></th>
          <th class="section-tabela-epc__heading">Etapa do Projeto</th>
          <th class="section-tabela-epc__heading">Equipamento</th>
        </tr>
        <?php foreach ($linhas as $i => $linha) : ?>
          <tr>
            <?php if ($i === 1): ?>
              <td rowspan="3" class="section-tabela-epc__bos"><span>EPC (BoS)</span></td>
            <?php endif; ?>
            <td><?= $linha['etapa_projeto']; ?></td>
            <td><?= $linha['equipamento']; ?></td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>


  </div>
</section>