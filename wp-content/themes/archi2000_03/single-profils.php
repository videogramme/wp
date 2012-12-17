<?php
/*
Template Name: Profils
*/
?>
<?php get_header(); ?>
qsdqdsqddqdqsd

<?php while (have_posts()) : the_post(); ?>

		<article id="post" class="<?php the_title(); ?>">
	
			<section id="post-img">

		        <div class="flexslider">
		          <ul class="slides">
		           
		              <?php 
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
		              ?>
<?php endwhile; // End the loop ?>
		              

		          </ul>
		        </div>  

			</section>
		
			<section id="post-text">

				<?php 
					the_content();
				?>
		
			</section>	

		</article>

	
<?php get_footer(); ?>