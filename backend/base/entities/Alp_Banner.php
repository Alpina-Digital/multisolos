<?php
class Alp_Banner
{
  use Alp_Entitable;

  protected string $prefix = 'banner_';

  protected string $titulo;
  protected string $texto;
  protected string|false $cta_texto;
  protected string|false $cta_link;
  protected string|false $cta_target;

  protected string $imagem_desktop;
  protected string $imagem_mobile;

  protected bool $usar_video;
  protected string $video;
  protected float $duracao_video;

  /**
   * Faz o setup da Entidade.
   * @hooked action 'after_setup_theme'
   */
  public static function setup(): void
  {
    self::$entity = (new Alp_Entity())
      ->create_post_type('Banner', 'Banners', 'banner', false, 'cover-image', false, false);

    self::create_metaboxes();
  }

  /**
   * Cria as metaboxes do banner.
   * @return void
   */
  public static function create_metaboxes(): void
  {
    self::$entity
      ->create_metaboxes()
      ->add_metabox_box('', 'Informações do Banner')
      ->add_metabox_field_switch('Usar vídeo?', 'usar_video')
      ->add_metabox_field_image('Imagem de Fundo (Desktop)', 'imagem_desktop', 1, 3)->add_logic('usar_video', false)
      ->add_metabox_field_image('Imagem de Fundo (Mobile)', 'imagem_mobile', 1, 3)->add_logic('usar_video', false)
      ->add_metabox_field_video('Vídeo de Fundo', 'video', 1, 6)->add_logic('usar_video', true)
      ->add_metabox_field_biu('Título', 'titulo', 6)
      ->add_metabox_field_biu('Texto', 'texto', 6)
      ->add_metabox_field_text('Texto no botão', 'cta_texto', 4)
      ->add_metabox_field_text('Link no botão', 'cta_link', 4)
      ->add_metabox_field_select_target('Onde abrir o link', 'cta_target', 4)
      ->render();
  }

  /**
   * Retorna o título formatado do banner.
   * @return string Título.
   */
  public function get_titulo(): string
  {
    if (!empty($this->titulo)) return $this->titulo;

    return $this->titulo = get_post_meta($this->id, $this->prefix . 'titulo', true);
  }

  /**
   * Retorna o texto formatado do banner.
   * @return string Texto.
   */
  public function get_texto(): string
  {
    if (!empty($this->texto)) return $this->texto;

    return $this->texto = get_post_meta($this->id, $this->prefix . 'texto', true);
  }

  /**
   * Recebe o texto a ser impresso no CTA.
   * @return string Texto do CTA.
   */
  public function get_cta_texto(): string
  {
    if (!empty($this->cta_texto)) return $this->cta_texto;

    return $this->cta_texto = get_post_meta($this->id, $this->prefix . 'cta_texto', true);
  }

  /**
   * Recebe o link (href) para onde o CTA direciona.
   * @return string|false O link do CTA ou false se não foi definido um texto.
   */
  public function get_cta_link(): string|false
  {
    if (!empty($this->cta_link)) return $this->cta_link;
    if (empty($this->get_cta_texto())) return $this->cta_link = false;

    return $this->cta_link = get_post_meta($this->id, $this->prefix . 'cta_link', true);
  }

  /**
   * Recebe o target (_blank|_self) onde o CTA será aberto.
   * @return string|false O target do CTA ou false se não foi definido um link.
   */
  public function get_cta_target(): string
  {
    if (!empty($this->cta_target)) return $this->cta_target;
    if (empty($this->get_cta_link())) return $this->cta_target = '_self';

    $target = get_post_meta($this->id, $this->prefix . 'cta_target', true);

    if (!in_array($target, ['_self', '_blank'])) return $this->cta_target = '_self';
    return $this->cta_target = $target;
  }

  /**
   * Retorna a URL da imagem de fundo do banner.
   * @param bool $use_mobile Se deve usar a imagem mobile caso não tenha a desktop.
   * @return string URL da imagem de fundo.
   */
  public function get_imagem_desktop($use_mobile = true): string
  {
    if (!empty($this->imagem_desktop)) return $this->imagem_desktop;

    $imagem = get_post_meta($this->id, $this->prefix . 'imagem_desktop', true);
    if (!$imagem && !$use_mobile) return false;

    if (!$imagem && $this->get_imagem_mobile(false)) return $this->imagem_desktop = $this->get_imagem_mobile(false);

    if ($imagem) $imagem = wp_get_attachment_url($imagem);
    return $this->imagem_desktop = $imagem;
  }

  /**
   * Retorna a URL da imagem mobile do banner.
   * @param bool $use_desktop Se deve usar a imagem desktop caso não tenha a mobile.
   * @return string URL da imagem mobile.
   */
  public function get_imagem_mobile($use_desktop = true): string
  {
    if (!empty($this->imagem_mobile)) return $this->imagem_mobile;

    $imagem = get_post_meta($this->id, $this->prefix . 'imagem_mobile', true);
    if (!$imagem && !$use_desktop) return false;

    if (!$imagem && $this->get_imagem_desktop(false)) return $this->imagem_mobile = $this->get_imagem_desktop(false);

    if ($imagem) $imagem = wp_get_attachment_url($imagem);
    return $this->imagem_mobile = $imagem;
  }

  /**
   * Retorna se o banner deve usar vídeo.
   * @return bool Se deve usar vídeo.
   */
  public function get_usar_video(): bool
  {
    if (!empty($this->usar_video)) return $this->usar_video;

    $usar_video = get_post_meta($this->id, $this->prefix . 'usar_video', true);
    return $this->usar_video = (bool) $usar_video;
  }

  /**
   * Retorna a URL do vídeo do banner.
   * @return string URL do vídeo.
   */
  public function get_video(): string
  {
    if (!empty($this->video)) return $this->video;

    $video = get_post_meta($this->id, $this->prefix . 'video', true);
    if (!$video) return $this->video = '';

    $video = wp_get_attachment_url($video);
    if (!$video) return $this->video = '';

    return $this->video = $video;
  }

  /**
   * Retorna a duração do vídeo em milissegundos.
   * @return int Duração do vídeo.
   */
  public function get_duracao_video(): int
  {
    if (!empty($this->duracao_video)) return $this->duracao_video;

    $video = get_post_meta($this->id, $this->prefix . 'video', true);

    $video_url = wp_get_attachment_url($video);

    if (!$video_url || pathinfo($video_url, PATHINFO_EXTENSION) !== 'mp4') return $this->duracao_video = 0;

    $video_meta = wp_get_attachment_metadata($video);

    $duracao = $video_meta['length_formatted'];
    $partes = explode(':', $duracao);
    $minutos = intval($partes[0]);
    $segundos = intval($partes[1]);

    return $this->duracao_video = ($minutos * 60 + $segundos) * 1000;
  }

  /**
   * Não precisará ser implementado.
   */
  public function get_post_metas_values(): void {}
}

/**
 * Hooks
 */
add_action('after_setup_theme', ['Alp_Banner', 'setup']);
