<?php

/**
 * Template Name: Página Serviços
 * Description: Página Serviços
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new MS_Servicos())->render();
get_footer();
