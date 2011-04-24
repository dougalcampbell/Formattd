		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h2 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'formattd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
			</header>
			<div class="entry-content">
				<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'formattd' ) ); ?>
			</div><!-- .entry-content -->
			<footer>
				<?php echo timeAgo(); ?> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'formattd' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">#</a>
				<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'formattd' ), __( '1 Comment', 'formattd' ), __( '% Comments', 'formattd' ) ); ?></span>
				<?php edit_post_link( __( 'Edit', 'formattd' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</footer>
		</article>
