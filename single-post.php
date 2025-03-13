<?php

/**
 * Template Part Page: Single do Blog
 * Description: 
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */

get_header();
(new MS_Post())->render();
get_footer();
