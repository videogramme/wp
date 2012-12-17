<?php
/*
Template Name: Profils
*/
?>
<?php get_header(); ?>


<?php while (have_posts()) : the_post(); ?>

		<article id="post" class="<?php the_title(); ?>">
	
			<section id="post-img">

		        <div class="flexslider">
		          <ul class="slides">
		           
		              <?php 
		              $photos = aldenta_get_images('original');
		              foreach ($photos as $photo) {
		              	echo "\n".'<li>'."\n";
		              		echo '<a>'."\n";
				              	echo '<figure class="grd-img">'."\n";
				              	echo $photo;
				              	echo '<figcaption class="flex-caption">blabla 1</figcaption>'."\n";
				              	echo '</figure>'."\n";
				            echo '</a>'."\n";
				        echo '</li>'."\n";    
		              }

endwhile; // End the loop?>

		          </ul>
		        </div>  

			</section>
		
			<section id="post-text">

				<?php 
					
					// query the posts of your custom post types
query_posts( array(
		'post_type' => array(
					'profils',
				),
				'paged' => $paged ) // for paging links to work
			);

				// have some posts?
				if (have_posts()) :
					while (have_posts()) : the_post(); // begin the Loop

						echo '<a href="' . get_permalink($post->ID) . '" >'."\n";
						the_title();
						echo '</a>'."\n";

					endwhile;
				endif;
				?>

			</section>	

		</article>

	
<?php get_footer(); ?>