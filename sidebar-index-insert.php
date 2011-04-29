<?php
/**
 * The widget area between the 1st and 2nd post on the index page.
 *
 * @package WordPress
 * @subpackage Formattd
 * @since Formattd 0.1
 */
?>
<?php
	if (   ! is_active_sidebar( 'index-insert' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="index-insert" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'index-insert' ); ?>
					</ul>
			</div><!-- #index-insert .widget-area -->
