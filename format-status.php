		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'initializr' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header>
			<div class="author-avatar">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( 'initializr_author_bio_avatar_size', 32 ) ); ?>
			</div><!-- .author-avatar -->
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'initializr' ) ); ?>
			</div><!-- .entry-content -->

			<footer>
			<?php echo timeAgo(); ?> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'initializr' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">#</a>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'initializr' ), __( '1 Comment', 'initializr' ), __( '% Comments', 'initializr' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'initializr' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</footer>	
		</article>
