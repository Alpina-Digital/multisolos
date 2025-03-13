<?php

/**
 * Template Name: Página Blog
 * Description: Página do blog
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new MS_Blog())->render();
get_footer();
