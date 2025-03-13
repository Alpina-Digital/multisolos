<?php

/**
 * Reproduz uma seção com um Grid de Cards Azul.
 * @package Alpina V4
 * @version 4.0
 */
trait MS_Card_Azul_Solucao
{
  use Alp_Renderable;

  /**
   * Renderiza um card azul.
   * @param array $card Informações do card.
   * @param int|false $num Número do card.
   * @return string HTML renderizado.
   */
  public function render_card_azul(array $card, string $classes = 'col-12 col-4@md', int|false $num = false, $cta = []): string
  {
    if ($num) $card['numero'] = str_pad($num, 2, 0, STR_PAD_LEFT);

    $cta = [
      'cta_link' => $cta['cta_link'] ?? '',
      'cta_target' => $cta['cta_target'] ?? '_self',
      'cta_texto' => $cta['cta_texto'] ?? ''
    ];

    $card = array_merge($card, $cta, compact('classes'));

    return $this->html('frontend/views/cards/card-azul-solucoes', $card);
  }
}
