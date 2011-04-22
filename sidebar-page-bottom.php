<?php
/**
 * The widget area below the content of a page.
 *
 * @package WordPress
 * @subpackage Initializr
 * @since Initializr 1.0
 */
?>
<?php
	if (   ! is_active_sidebar( 'page-bottom' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="page-bottom" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'page-bottom' ); ?>
					</ul>
			</div><!-- #page-bottom .widget-area -->
