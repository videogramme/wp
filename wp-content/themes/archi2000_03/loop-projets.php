<?php /* Start loop */ ?>
<?php

echo '<section id="gallery">';


$args = array( 'post_type' => 'projet');
// $args = array( 'post_type' => 'projet', 'posts_per_page' => 16 );

$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();

//avoir l'année (custom field) pour la mettre dans la classe 
$postAnnee=get_post_meta($post->ID, 'wpcf-annee', true);

	echo ("<article ");
	post_class(array('post-thumbnail', $postAnnee));
	echo (">")."\n";
	  	
		if ( has_post_thumbnail() ) {
			echo '<a href="' . get_permalink($post->ID) . '" >'."\n";
			the_post_thumbnail('thumbnail');
			// the_post_thumbnail( 'title-image', array( 'class' => 'title-image', 'alt' => 'Title Icon' );
			echo '</a>'."\n";
		}
		the_title();

	echo '</article>'."\n";

endwhile;

echo('</section>'."\n");

?>