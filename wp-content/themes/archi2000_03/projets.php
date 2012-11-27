<?php
/*
Template Name: Projets
*/
?>
<?php get_header(); ?>

		<!-- Row for main content area -->
		<div id="content" class="eight columns">
	
			<div class="post-box">
				<?php get_template_part('loop', 'projets'); ?>
			</div>

		</div><!-- End Content row -->
		
	
		
<?php get_footer(); ?>