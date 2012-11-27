<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>

	<?php echo do_shortcode('[gallery size="full"]'); ?>
<!-- 	
	<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
 -->
<?php endwhile; // End the loop ?>