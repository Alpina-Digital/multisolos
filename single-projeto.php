<?php

/**
 * Single Name: Single Projeto
 * Description: Single Projeto
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new SV_Projeto(get_queried_object_id()))->render();
get_footer();
