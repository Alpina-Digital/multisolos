<?php

/**
 * Template Name: Página Simulador de Investimento
 * Description: Simulador de investimento
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Simulador())->render();
get_footer();
