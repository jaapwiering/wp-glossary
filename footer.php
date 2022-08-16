<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Fanagalo_underscores_core
 */

?>

	<div class="footer-full-bg"></div>
	<footer id="colophon" class="footer-area">

		<div class="footer-rights-acknowledgements">
		<p>	Copyright <?php echo date("Y"); ?> | <a href="https://fanagalo.nl">Fanagalo</a><br/>

		<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'fngl-s-core' ) ); ?>">
			<?php
			/* translators: %s: CMS name, i.e. WordPress. */
			printf( esc_html__( 'Proudly powered by %s', 'fngl-s-core' ), 'WordPress' );
			?>
		</a></p>
		</div><!-- .footer-rights-acknowledgements -->

		<div class="fanagalo-me-fecit">
			Design and development by <a href="https://fanagalo.nl" target="_blank">Fanagalo</a>
		</div>

		</footer>

<?php wp_footer(); ?>

</body>
</html>
