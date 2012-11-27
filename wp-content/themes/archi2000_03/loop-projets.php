<?php /* Start loop */ ?>
<?php
$args = array( 'post_type' => 'projet', 'posts_per_page' => 16 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
	
	echo '<div class="projet-box four columns">';
	if ( has_post_thumbnail() ) {
		echo '<a href="' . get_permalink($post->ID) . '" >';
	the_post_thumbnail('thumbnail');
		echo '</a>';
	}




  // the_post_thumbnail( 'title-image', array( 'class' => 'title-image', 'alt' => 'Title Icon' );


	echo '<br />'; 
	the_title();
	echo '</div>';
endwhile;
?>