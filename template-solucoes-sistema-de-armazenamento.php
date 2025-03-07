<?php

/**
 * Template Name: Página Sistema de Armazenamento
 * Description: Sistema de armazenamento
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_Sistema_Armazenamento())->render();
get_footer();
