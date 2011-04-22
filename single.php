<?php get_header(); ?>
<div id="content">
<div class="spacer">
<?php
	dynamic_sidebar( 'single-top' );
	get_template_part('loop', 'single');
	dynamic_sidebar( 'single-bottom' );
?>
</div><!--.spacer-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
