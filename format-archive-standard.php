		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'formattd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header>
			<?php formattd_post_date(); ?>
			<div class="entry-summary">
				<?php the_excerpt(); ?>
			</div><!-- .entry-summary -->

			<footer>
			<?php echo timeAgo(); ?> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'formattd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">#</a>
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'formattd' ), __( '1 Comment', 'formattd' ), __( '% Comments', 'formattd' ) ); ?></span>
			<?php edit_post_link( __( 'Edit', 'formattd' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</footer>	
		</article>
