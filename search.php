<?php
/**
 *
 * @package Alpina Thene
 * @since 1.0
 */

get_header(); ?>

<div id="main">
	<?php
	if (have_posts()) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content', get_post_format() );
		}
		posts_nav_link('separator','prelabel','nextlabel');

	} else {
		get_template_part( 'content', 'none' );
	}
	?>
</div>

<?php
get_footer();
