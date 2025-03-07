<?php

/**
 * Template Name: Página Soluções para Agronegócio
 * Description: Soluções para Agronegócio
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_Agronegocio())->render();
get_footer();
