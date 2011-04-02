<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage Initializr
 * @since Initializr 1.0
 */
?>
	</div><!--#content-->
	</div><!--#main-->
	<div id="footer-container" role="contentinfo">
		<footer id="colophon" class="wrapper">

<?php
	/* A sidebar in the footer? Yep. You can can customize
	 * your footer with four columns of widgets.
	 */
	get_sidebar( 'footer' );
?>

			<div id="site-info">
				<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
					<?php bloginfo( 'name' ); ?>
				</a>
			</div><!-- #site-info -->

			<div id="site-generator">
				<?php do_action( 'initializr_credits' ); ?>
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'initializr' ) ); ?>" title="<?php esc_attr_e( 'Semantic Personal Publishing Platform', 'initializr' ); ?>" rel="generator"><?php printf( __( 'Proudly powered by %s.', 'initializr' ), 'WordPress' ); ?></a>
			</div><!-- #site-generator -->

		</footer><!-- #colophon -->
	</div>

	<!--[if lt IE 7 ]>
	<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/dd_belatedpng.js"></script>
	<script>DD_belatedPNG.fix('img, .png_bg');</script>
	<![endif]-->
<?php wp_footer(); ?>
	<!-- script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/script.js"></script -->
</body>
</html>

