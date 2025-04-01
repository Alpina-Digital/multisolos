<?php

/**
 * Template Name: Página de um Serviço
 * Description: Página interna de um Serviço
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new MS_Servico())->render();
get_footer();
