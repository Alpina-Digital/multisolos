<?php

/**
 * Template Name: Página Soluções Mobilidade Elétrica
 * Description: Soluções mobilidade elétrica
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_Mobilidade())->render();
get_footer();
