<?php
/**
 * The widget area above the header.
 *
 * @package WordPress
 * @subpackage Initializr
 * @since Initializr 1.0
 */
?>
<?php
	if (   ! is_active_sidebar( 'above-header' ) )
		return;
	// If we get this far, we have widgets. Let's do this.
?>

			<div id="above-header" class="widget-area" role="complementary">

					<ul class="xoxo">
						<?php dynamic_sidebar( 'above-header' ); ?>
					</ul>
			</div><!-- #above-header .widget-area -->
