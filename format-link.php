<?php
	$link_info = extract_first_link($post);
	$link_url = $link_info['url'] ? $link_info['url'] : get_permalink();
	$link_title = $link_info['title'] ? $link_info['title'] : get_the_title();
	$link_domain = parse_url($link_url, PHP_URL_HOST);
?>
		<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<header>
				<h2 class="entry-title"><a href="<?php echo $link_url; ?>"><?php echo $link_title; ?></a></h2>
			</header>

			<footer>
			<?php echo timeAgo(); ?> <a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'initializr' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark">#</a> <img class="favicon" height="16" width="16" src="http://www.google.com/s2/u/0/favicons?domain=<?php echo esc_attr($link_domain); ?>" />
			<span class="comments-link"><?php comments_popup_link( __( 'Leave a comment', 'initializr' ), __( '1 Comment', 'initializr' ), __( '% Comments', 'initializr' ) ); ?></span>
			<?php edit_post_link( __( 'Edit', 'initializr' ), '<span class="meta-sep">|</span> <span class="edit-link">', '</span>' ); ?>
			</footer>	
		</article>
