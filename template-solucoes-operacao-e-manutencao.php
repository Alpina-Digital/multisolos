<?php

/**
 * Template Name: Página Soluções Operação e Manutenção
 * Description: Soluções operação e manutenção
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_Operacao_Manutencao())->render();
get_footer();
