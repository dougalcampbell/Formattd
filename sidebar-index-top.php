<?php
/**
 * The widget area between the header and the posts on the index page.
 *
 * @package WordPress
 * @subpackage Formattd
 * @since Formattd 1.0
 */
?>
<?php
	if (   ! is_active_sidebar( 'index-top' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="index-top" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'index-top' ); ?>
					</ul>
			</div><!-- #index-top .widget-area -->
