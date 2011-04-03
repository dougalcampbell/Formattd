<?php
/**
 * Initializr functions and definitions
 *
 * Sets up the theme and provides some helper functions. Some helper functions
 * are used in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * The first function, initializr_setup(), sets up the theme by registering support
 * for various features in WordPress, such as post thumbnails, navigation menus, and the like.
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development and
 * http://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook. The hook can be removed by using remove_action() or
 * remove_filter() and you can attach your own function to the hook.
 *
 * We can remove the parent theme's hook only after it is attached, which means we need to
 * wait until setting up the child theme:
 *
 * <code>
 * add_action( 'after_setup_theme', 'my_child_theme_setup' );
 * function my_child_theme_setup() {
 *     // We are providing our own filter for excerpt_length (or using the unfiltered value)
 *     remove_filter( 'excerpt_length', 'initializr_excerpt_length' );
 *     ...
 * }
 * </code>
 *
 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
 *
 * @package WordPress
 * @subpackage Initializr
 * @since Initializr 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 680;

/** Tell WordPress to run initializr_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'initializr_setup' );

add_action( 'template_redirect', 'initializr_redirect' );

if ( ! function_exists( 'initializr_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * To override initializr_setup() in a child theme, add your own initializr_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Initializr 1.0
 */
function initializr_setup() {

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Post Format support. You can also use the legacy "gallery" or "asides" (note the plural) categories.
	add_theme_support( 'post-formats', array( 'aside', 'link', 'image', 'video', 'quote', 'gallery', 'status' ) );

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Auto-add a float-right thumbnail featured image, when set
        if (function_exists('set_post_thumbnail_size')) {
        	set_post_thumbnail_size(150,150);
	}
	
	add_filter('the_content', 'gr_post_thumbnail');
	
  	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'initializr', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'initializr' ),
	) );

}
endif;

// Add X-UA-Compatible header in HTTP, not in HTML
if ( ! function_exists( 'initializr_redirect' ) ) :
function initializr_redirect() {
	// Send as an HTTP header instead using meta http-equiv.
	// See: http://lists.w3.org/Archives/Public/www-validator/2010Nov/0050.html
	@header( 'X-UA-Compatible: IE=edge,chrome=1' );
}
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the wp_page_menu_args filter hook.
 *
 * @since Initializr 1.0
 */
function initializr_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'initializr_page_menu_args' );

/**
 * Sets the post excerpt length to 75 words.
 *
 * To override this length in a child theme, remove the filter and add your
 * own function tied to the excerpt_length filter hook.
 *
 * @since Initializr 1.0
 * @return int
 */
function initializr_excerpt_length( $length ) {
	return 75;
}
add_filter( 'excerpt_length', 'initializr_excerpt_length' );

/**
 * Returns a "Continue Reading" link for excerpts
 *
 * @since Initializr 1.0
 * @return string "Continue Reading" link
 */
function initializr_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'initializr' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and initializr_continue_reading_link().
 *
 * To override this in a child theme, remove the filter and add your own
 * function tied to the excerpt_more filter hook.
 *
 * @since Initializr 1.0
 * @return string An ellipsis
 */
function initializr_auto_excerpt_more( $more ) {
	return ' &hellip;' . initializr_continue_reading_link();
}
add_filter( 'excerpt_more', 'initializr_auto_excerpt_more' );

/**
 * Adds a pretty "Continue Reading" link to custom post excerpts.
 *
 * To override this link in a child theme, remove the filter and add your own
 * function tied to the get_the_excerpt filter hook.
 *
 * @since Initializr 1.0
 * @return string Excerpt with a pretty "Continue Reading" link
 */
function initializr_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= initializr_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'initializr_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Initializr's style.css. This is just
 * a simple filter call that tells WordPress to not use the default styles.
 *
 * @since Initializr 1.2
 */
add_filter( 'use_default_gallery_style', '__return_false' );

if ( ! function_exists( 'initializr_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own initializr_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Initializr 1.0
 */
function initializr_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	$GLOBALS['depth'] = $depth;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 40 ); ?>
			<?php printf( __( '%s <span class="says">says:</span>', 'initializr' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'initializr' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __( '%1$s at %2$s', 'initializr' ), get_comment_date(),  get_comment_time() ); ?></a><?php edit_comment_link( __( '(Edit)', 'initializr' ), ' ' );
			?>
		</div><!-- .comment-meta .commentmetadata -->

		<div class="comment-body"><?php comment_text(); ?></div>

		<div class="reply">
			<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
		</div><!-- .reply -->
	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'initializr' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'initializr' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override initializr_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @since Initializr 1.0
 * @uses register_sidebar
 */
function initializr_widgets_init() {
	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'initializr' ),
		'id' => 'primary-widget-area',
		'description' => __( 'The primary widget area', 'initializr' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'initializr' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area', 'initializr' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 3, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'initializr' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'initializr' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'initializr' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'initializr' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'initializr' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'initializr' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'initializr' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'initializr' ),
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => '</li>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}
/** Register sidebars by running initializr_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'initializr_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * To override this in a child theme, remove the filter and optionally add
 * your own function tied to the widgets_init action hook.
 *
 * This function uses a filter (show_recent_comments_widget_style) new in
 * WordPress 3.1 to remove the default style.  Using Initializr 1.2 in
 * WordPress 3.0 will show the styles, but they won't have any effect on the
 * widget in default Initializr styling.
 *
 * @since Initializr 1.0
 */
function initializr_remove_recent_comments_style() {
	add_filter( 'show_recent_comments_widget_style', '__return_false' );
}
add_action( 'widgets_init', 'initializr_remove_recent_comments_style' );

if ( ! function_exists( 'initializr_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Initializr 1.0
 */
function initializr_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'initializr' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'initializr' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'initializr_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Initializr 1.0
 */
function initializr_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'initializr' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'initializr' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'initializr' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

if ( ! function_exists( 'initializr_post_date' ) ) :
function initializr_post_date() {
	$mon = get_the_time('M');
	$day = get_the_time('d');
	$year = get_the_time('Y');
	
	printf('<div class="post-date"><span class="month">%s</span><span class="day">%s</span><span class="year">%s</span></div>', $mon, $day, $year);
}
endif;

function gr_post_thumbnail($text) {
  if (function_exists('has_post_thumbnail') && has_post_thumbnail() /* && (is_home() || is_singular()) */) {
    $text = '<div style="float: right;">' . get_the_post_thumbnail() . '</div>' . $text;
  }
  
  return $text;
}

/*
 * Extract the title and url for a post object for a 'link' post format.
 */
function extract_first_link($post) {
  $str = $post->post_content;
  if ( preg_match('%^(https?://[^\s]*)$%', trim($str), $matches) ) {
    $url = $matches[1];
    if ($post->post_title) {
      $title = $post->post_title;
    } else {
      $title = $url;
    }
    return array('url' => $url, 'title' => $title );
  }
  
  preg_match('%<a\s*+(.*?)href=(["\']?)(.*?)\2(.*?)>(.*?)</a>%', trim($str), $matches);
  $url = $matches[3];
  $title = $post->post_title ? $post->post_title : $matches[5];
  
  return array( 'url' => $url, 'title' => $title );
}

function  timeAgo($timestamp=0, $granularity=2, $format='Y-m-d H:i:s'){
        if ( 0 === $timestamp ) {
          $timestamp = get_the_time("U");
        }
        $difference = time() - $timestamp;
        if($difference < 0) return 'just now';
        elseif($difference < 31536000){
                $periods = array('mon' => 2592000, 'wk' => 604800,'day' => 86400,'hr' => 3600,'min' => 60,'sec' => 1);
                $output = '';
                foreach($periods as $key => $value){
                        if($difference >= $value){
                                $time = round($difference / $value);
                                $difference %= $value;
                                $output .= ($output ? ' ' : '').$time.' ';
                                $output .= (($time > 1 /* && $key == 'day' */) ? $key.'s' : $key);
                                $granularity--;
                        }
                        if($granularity == 0) break;
                }
                return ($output ? $output : 'Just now').' ago';
        }
        else return date($format, $timestamp);
}

