<?php

/**
 * Template Name: Página Contato
 * Description: Contato
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new MS_Contato())->render();
get_footer();
