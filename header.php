<?php

/**
 * Template Part: Header
 * Description: Configure o que é necessário aqui e depois renderize o header.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script>
    document.getElementsByTagName("html")[0].className += " js";
  </script>
  <?php /* browsers not supporting CSS variables */ ?>
  <script>
    if (!('CSS' in window) || !CSS.supports('color', 'var(--color-var)')) {
      var cfStyle = document.getElementById('codyframe');
      if (cfStyle) {
        var href = cfStyle.getAttribute('href');
        href = href.replace('style.css', 'style-fallback.css');
        cfStyle.setAttribute('href', href);
      }
    }
  </script>
  <meta name="robots" content="index, follow">
  <meta name="author" content="Alpina Digital">
  <link rel="shortcut icon" href="<?= home_url('favicon.ico'); ?>" type="image/x-icon">
  <link rel="icon" href="<?= home_url('favicon.ico'); ?>" type="image/x-icon">
  <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
  <link rel="alternate" type="application/rss+xml" href="<?php echo esc_url(home_url('/')); ?>feed/" title="Feed de <?php wp_title('/', true, 'right'); ?>">

  <?php /* fazer download da font em segundo plano para ganhar performance */ ?>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?= (new MS_Header())->render(); ?>