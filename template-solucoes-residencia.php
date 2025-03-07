<?php

/**
 * Template Name: Página Soluções para residência
 * Description: Soluções para residências
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */


get_header();
(new SV_Solucoes_Residencias())->render();
get_footer();
