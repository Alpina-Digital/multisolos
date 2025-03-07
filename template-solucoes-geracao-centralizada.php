<?php

/**
 * Template Name: Página Soluções Geração Centralizada
 * Description: Soluções geração centralizada
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_Geracao_Centralizada())->render();
get_footer();
