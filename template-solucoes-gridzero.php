<?php

/**
 * Template Name: Página Soluções Grid Zero
 * Description: Soluções Grid Zero
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Solucoes_GridZero())->render();
get_footer();
