<?php get_header(); ?>
<div id="content">
<div class="spacer">
<?php
	dynamic_sidebar( 'index-top' );
	get_template_part('loop', 'index');	
?>
</div><!--.spacer-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
