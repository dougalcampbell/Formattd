<?php
/**
 * The widget area between the content and comments on a single post page.
 *
 * @package WordPress
 * @subpackage Formattd
 * @since Formattd 0.1
 */
?>
<?php
	if (   ! is_active_sidebar( 'single-insert' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="single-insert" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'single-insert' ); ?>
					</ul>
			</div><!-- #single-insert .widget-area -->
