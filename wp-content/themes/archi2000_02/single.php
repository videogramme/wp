<?php get_header(); ?>

<?php get_sidebar(); ?>

		<!-- Row for main content area -->
		<div id="content" class="eight columns">
	
			<div class="post-box">
				<?php get_template_part('loop', 'single'); ?>
			</div>

		</div><!-- End Content row -->
		
		

		
		
<?php get_footer(); ?>