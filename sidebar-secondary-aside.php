<?php
/**
 * The secondary sidebar widget area.
 *
 * @package WordPress
 * @subpackage Formattd
 * @since Formattd 1.0
 */
?>
<?php
	if (   ! is_active_sidebar( 'secondary-aside' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="secondary-aside" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'secondary-aside' ); ?>
					</ul>
			</div><!-- #secondary-aside .widget-area -->
