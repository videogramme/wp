<?php
/*
Template Name: Accueil
*/
?>

<?php get_header(); ?>

<?php get_template_part('sidebar', 'accueil'); ?>

		<!-- Row for main content area -->
		<div id="content" class="eight columns">
	
			<div class="post-box">
				iiioiooi
				<?php get_template_part('loop', 'accueil'); ?>
			</div>

		</div><!-- End Content row -->
		
<?php get_footer(); ?>