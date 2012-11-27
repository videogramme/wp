<?php /* Start loop */ ?>
<?php while (have_posts()) : the_post(); ?>
	<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
		<header>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php reverie_entry_meta(); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>


		
			<?php
		// c'est aps ca	

		// $images = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );

		// if ($images) {
		// 	echo '<div class="gallery">';
		// 	foreach( $images as $imageID => $imagePost ){
		// 		$l = wp_get_attachment_image_src( $imageID, 'large' );
		// 		$t = wp_get_attachment_image_src( $imageID, 'thumbnail');
		// 		echo '<div class="obj_thumb"><a href="'.$l[0].'"><span></span><img src="'.$t[0].'" width="'.$t[1].'" height="'.$t[2].'"></a></div>';   
		// 	}
		// 	echo '</div>';
		?>


		</div>
		<footer>
			<?php wp_link_pages(array('before' => '<nav id="page-nav"><p>' . __('Pages:', 'reverie'), 'after' => '</p></nav>' )); ?>
			<p><?php the_tags(); ?></p>
		</footer>
		<?php comments_template(); ?>
	</article>
<?php endwhile; // End the loop ?>