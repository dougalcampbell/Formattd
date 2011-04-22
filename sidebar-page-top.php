<?php
/**
 * The widget area above the content of a page.
 *
 * @package WordPress
 * @subpackage Initializr
 * @since Initializr 1.0
 */
?>
<?php
	if (   ! is_active_sidebar( 'page-top' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="page-top" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'page-top' ); ?>
					</ul>
			</div><!-- #page-top .widget-area -->
