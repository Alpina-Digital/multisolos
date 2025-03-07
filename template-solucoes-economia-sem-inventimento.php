<?php

/**
 * Template Name: Página Soluções - Economia sem Investimento
 * Description: Soluções economia sem investimento
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_ESI())->render();
get_footer();
