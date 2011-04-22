<?php
/**
 * The widget area at the bottom of a single post page.
 *
 * @package WordPress
 * @subpackage Initializr
 * @since Initializr 1.0
 */
?>
<?php
	if (   ! is_active_sidebar( 'single-bottom' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="single-bottom" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'single-bottom' ); ?>
					</ul>
			</div><!-- #single-bottom .widget-area -->
