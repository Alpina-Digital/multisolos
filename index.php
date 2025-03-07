<?php 
  if (!defined('ABSPATH')) exit;
  get_header(); 
?>

<div id="main">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'content', get_post_format() );
		}
		posts_nav_link('separator','prelabel','nextlabel');
	} else {
		echo '<h2>Nenhum post encontrado.</h2>';
	}
	?>
</div>

<?php
get_footer();