<?php

/**
 * Template Name: Página Resultados do Simulador
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @since 4.0
 */

get_header();

(new SV_Resultados_Simulador())->render();

get_footer();
