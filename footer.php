<?php

/**
 * Footer
 */
?>
<footer class="footer bg-primary padding-top-xl padding-top-xxxl@md padding-bottom-xl position-relative overflow-hidden">
	<?php (new SV_Footer())->render(); ?>
	<?= get_svg_content('footer/decoration.svg', 'footer__decoration'); ?>
</footer>
<?php
echo Alp_Settings::print_modal();
wp_footer();
?>
</body>

</html>