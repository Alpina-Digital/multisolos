<?php

/**
 * Template Name: Página Soluções
 * Description: Conheça nossas soluções
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */


get_header();
(new SV_Solucoes())->render();
get_footer();
