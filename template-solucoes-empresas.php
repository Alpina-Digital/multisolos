<?php

/**
 * Template Name: Página Soluções para empresas
 * Description: Soluções para empresas
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_Empresas())->render();
get_footer();
