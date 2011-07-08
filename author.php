<?php
/**
 * The template for displaying Author pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Formattd
 * @since Formattd 0.1
 */

get_header(); ?>

<div id="content">
<div class="spacer">
<?php
	/* Queue the first post, that way we know
	 * what author we're dealing with (if that is the case).
	 *
	 * We reset this later so we can run the loop
	 * properly with a call to rewind_posts().
	 */
	if ( have_posts() )
		the_post();
?>

			<h1 class="page-title">
				<?php _e( 'Author Archives', 'formattd' ); ?>
			</h1>
<?php
if ( get_the_author_meta( 'description' ) ) : // If a user has filled out their description, show a bio on their entries  ?>
					<div id="entry-author-info">
						<div id="author-avatar">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'formattd_author_bio_avatar_size', 60 ) ); ?>
						</div><!-- #author-avatar -->
						<div id="author-description">
							<h2><?php printf( esc_attr__( 'About %s', 'formattd' ), get_the_author() ); ?></h2>
							<?php the_author_meta( 'description' ); ?>
						</div><!-- #author-description -->
					</div><!-- #entry-author-info -->
<?php endif; ?>
<?php
	/* Since we called the_post() above, we need to
	 * rewind the loop back to the beginning that way
	 * we can run the loop properly, in full.
	 */
	rewind_posts();

	/* Run the loop for the archives page to output the posts.
	 * If you want to overload this in a child theme then include a file
	 * called loop-archive.php and that will be used instead.
	 */
	 get_template_part( 'loop', 'archive' );
?>
</div><!--.spacer-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
