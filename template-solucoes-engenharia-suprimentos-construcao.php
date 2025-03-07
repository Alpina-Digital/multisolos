<?php

/**
 * Template Name: Página Soluções Engenharia, Suprimentos e Construção
 * Description: Soluções para agronegócio
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_EPC())->render();
get_footer();
