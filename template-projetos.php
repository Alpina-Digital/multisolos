<?php

/**
 * Template Name: Página Projetos
 * Description: Projetos
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new MS_Projetos())->render();
get_footer();
