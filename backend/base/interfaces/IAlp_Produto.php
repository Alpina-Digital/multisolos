<?php
interface IAlp_Produto
{
  function get_preco(): string;
  function get_preco_original(): string;
  function get_desconto(): ?string;
  function get_titulo(): string;
  function get_subtitulo(): string;
  function get_link(): string;
  function get_link_adicionar_carrinho(): string;
  function get_parcelas_texto(): ?string;
  function get_descricao(): string;
  function get_resumo(): string;
  function get_relacionados(bool $objeto, int $maximo): array|WP_Query;
  function get_produtos_mesma_categoria(int $maximo): array;
  function get_numero_avaliacoes(bool $return_int): int|string;
  function get_media_avaliacoes(): float;
  function get_estrelas_avaliacoes(): array;
  function get_imagem_destaque(string $tamanho): string;
  function get_conteudo_meta(string $campo, ?string $prefixo = 'produto_', $single = true): string;
  function get_tags(): array;
  static function get_imagem_placeholder(): string;
}
