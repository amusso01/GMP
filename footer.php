<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

?>

<?php 
// VAR
$address = get_field('info_aziendali', 'options');
?>


	<footer class="site-footer color-dark-bg">
		<div class="content-block">
			<div class="site-footer__wrapper">
				<div class="site-footer__item site-footer__item-info">
					<p class="copyright h6"><?= '&copy; ' . date('Y') . ' <span class="copyright-site-name">' . get_bloginfo('name') .' MINUTERIE METALLICHE SRL</span>'?></p>
					<div class="address"><?= $address ?></div>
				</div>
				<div class="site-footer__item site-footer__item-nav">
					<?php get_template_part( 'components/navigation/footer-nav' ); ?>
				</div>
			</div>
		</div>
	</footer><!-- #colophon -->

</div><!-- #page -->

<!-- MAP Modal -->
	<?php get_template_part( 'components/modal/map' ); ?>

	<?php wp_footer(); ?>
</body>
</html>
