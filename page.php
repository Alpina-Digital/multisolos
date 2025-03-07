<?php
/**
 * @package Alp Cody
 * @since 1.0
 */

get_header(); ?>

	<section class="">
		<div class="">
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				// Include the page content template.
				get_template_part( 'content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				// if ( comments_open() || get_comments_number() ) :
				// 	comments_template();
				// endif;
			endwhile;
			?>
			<div class="clearfix"></div>
		</div>
	</section>
	
<?php
get_footer();
