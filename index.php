<?php get_header(); ?>
<div id="content">
<div class="spacer">
<?php
	dynamic_sidebar( 'index-top' );
	get_template_part('loop', 'index');	
	dynamic_sidebar( 'index-bottom' );
?>
</div><!--.spacer-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
