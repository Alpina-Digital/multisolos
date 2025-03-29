<?php

/**
 * Single Name: Single Serviço
 * Description: Single Serviço
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new MS_Servico(get_queried_object_id()))->render();
get_footer();
