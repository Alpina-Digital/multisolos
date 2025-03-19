<?php

/**
 * Template Part: Footer
 * Description: Não esqueça de fechar o <body> e o <html> após renderizar o footer.
 * 
 * @author Alpina Digital
 * @package Alpina V4
 * @version 4.0
 */
?>
<footer class="footer__wrapper">
	<div class="footer bg-primary overflow-hidden">
		<?php (new MS_Footer())->render(); ?>
	</div>
</footer>
<?php
echo Alp_Settings::print_modal();
wp_footer();
?>
</body>

</html>