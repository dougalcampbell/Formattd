<?php get_header(); ?>
<div id="content">
<div class="spacer">
<?php
	get_sidebar( 'single-top' );
	get_template_part('loop', 'single');
	get_sidebar( 'single-bottom' );
?>
</div><!--.spacer-->
</div><!--#content-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>
