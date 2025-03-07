<?php

/**
 * Template Name: Página Soluções Autoprodução
 * Description: Soluções Autoprodução
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_Autoproducao())->render();
get_footer();
