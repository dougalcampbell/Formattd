<?php get_header(); ?>
<div id="content">
<div class="spacer">
<?php
	dynamic_sidebar( 'page-top' );
	get_template_part('loop', 'page');	
	dynamic_sidebar( 'page-bottom' );
?>
</div><!--.spacer-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
