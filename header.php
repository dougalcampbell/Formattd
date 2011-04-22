<!doctype html>
<!--[if lt IE 7 ]><html <?php language_attributes(); ?> class="no-js ie6"><![endif]--><!--[if IE 7 ]><html <?php language_attributes(); ?> class="no-js ie7"><![endif]--><!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie8"><![endif]--><!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie9"><![endif]--><!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	
	<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '|', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'initializr' ), max( $paged, $page ) );

	?></title>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<?php
	/* We add some JavaScript to pages with the comment form
	 * to support sites with threaded comments (when in use).
	 */
	if ( is_singular() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	/* Always have wp_head() just before the closing </head>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to add elements to <head> such
	 * as styles, scripts, and meta tags.
	 */
	wp_head();
?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="shortcut icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php bloginfo( 'stylesheet_directory' ); ?>/apple-touch-icon.png">

	<script src="<?php bloginfo( 'stylesheet_directory' ); ?>/js/libs/modernizr-1.7.min.js"></script>
</head>
<body <?php body_class(); ?>>
	<div id="header-container">
		<header class="wrapper">
		<?php get_sidebar('above-header'); ?>
		  <div id="branding">
			  <h1 id="title"><a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			  <div id="site-description"><?php bloginfo( 'description' ); ?></div>
                  </div><!-- #branding -->
			<nav id="access" role="navigation">
			  <?php /*  Allow screen readers / text browsers to skip the navigation menu and get right to the good stuff */ ?>
				<div class="skip-link screen-reader-text"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'initializr' ); ?>"><?php _e( 'Skip to content', 'initializr' ); ?></a></div>
				<?php /* Our navigation menu.  If one isn't filled out, wp_nav_menu falls back to wp_page_menu.  The menu assiged to the primary position is the one used.  If none is assigned, the menu with the lowest ID is used.  */ ?>
				<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
			</nav>
		</header>
	</div><!-- #header-container -->
	<div id="main" class="wrap-outer">
	<div id="content-wrap" class="wrap-inner">
