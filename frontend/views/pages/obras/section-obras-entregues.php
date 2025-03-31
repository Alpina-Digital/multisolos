<?php

/**
 * Template Part Name: Obras
 * Template Part Type: SECTION
 * Template Part Page: Obras
 * Description: Seção obras entregues.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 * 
 */

extract($args);

// print_r($args);

foreach ($itens as $obra): ?>
    <section class="section-obras-entregues margin-bottom-xs border-radius-lg margin-top-xxl">
        <div class="section-obras-entregues__interno bg-white max-width-md container grid">

            <div class="col-12 col-5@md flex-shrink-0 flex-grow-0">
                implementar o carrossel
            </div>

            <div class="col-12 col-7@md flex flex-column gap-md padding-md@md">

                <h3 class="section-obras-entregues__titulo">Multisolos <span>+ <?= $obra['titulo'] ?? ''; ?></span></h3>
                <h2 class="section-obras-entregues__slogan"><?= $slogan ?? ''; ?></h2>
                <hr>
                <div class="section-obras-entregues__texto"><?= $obra['texto'] ?? ''; ?></div>
                <hr>
                <div class="section-obras-entregues__depoimento_texto"><?= $obra['depoimento_texto'] ?? ''; ?></div>
                <div class="flex justify-between items-center">
                    <div>
                        <p class="section-obras-entregues__depoimento_nome"><?= $obra['depoimento_nome'] ?? ''; ?></p>
                        <p class="section-obras-entregues__depoimento_responsavel"><?= $obra['depoimento_responsavel'] ?? ''; ?></p>
                    </div>
                    <div>
                        <img class="section-obras-entregues__depoimento_imagem" src="<?= $obra['depoimento_imagem'] ?? ''; ?>" alt="Foto do responsável">
                    </div>
                </div>
            </div>

        </div>
    </section>
<?php endforeach; ?>