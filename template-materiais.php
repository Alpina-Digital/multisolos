<?php

/**
 * Template Name: Página Materiais
 * Description: Materiais
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Materiais())->render();
get_footer();
