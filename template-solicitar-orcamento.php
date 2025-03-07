<?php

/**
 * Template Name: Página Solicitar Orçamento
 * Description: Solicitar orçamento
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Orcamento())->render();
get_footer();
