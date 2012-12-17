<?php
/*
Template Name: News
*/
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

		<article id="post" class="<?php the_title(); ?>">
	
	<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
<?php if( $attachments->exist() ) : ?>
  <h3>Attachments</h3>
  <ul>
    <?php while( $attachment = $attachments->get() ) : ?>
      <li>
        <pre><?php print_r( $attachment ); ?></pre>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; ?>



			<section id="post-img">

		        <div class="flexslider">
		          <ul class="slides">




		          	<?php 
		          		$attachments = new Attachments( 'attachments' ); /* pass the instance name */
						if( $attachments->exist() ) : 
							echo 'iooioio';
							while( $attachment = $attachments->get() ) :
      						echo "\n".'<li>'."\n";
			              		echo '<a>'."\n";
			              		print_r( $attachment );
					              	echo '<figure class="grd-img">'."\n";
					              	var_dump ($attachments->image());
					              	// echo '<figcaption class="flex-caption">'.$attachments->field( 'caption' ).'</figcaption>'."\n";
					              	echo '</figure>'."\n";
					            echo '</a>'."\n";
				        	echo '</li>'."\n";
				          
    						endwhile; 
						endif; 
		           	?>
		        


		          </ul>
		        </div>  

			</section>
		
			<section id="post-text">

				<?php 

					the_content();
				?>
		
			</section>	

		</article>
<?php endwhile; // End the loop ?>
		              
	
<?php get_footer(); ?>