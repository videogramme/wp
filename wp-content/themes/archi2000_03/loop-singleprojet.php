<?php /* Start loop */ ?>

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

		              ?>

		          </ul>
		        </div>  





			</section>
		
			<section id="post-text">

				<?php the_content(); ?>

				<ul>
					<li><span class="custom-field">Année :</span><span class="custom-field-result"><?php echo types_render_field('annee', ''); ?></span></li>
					<li><span class="custom-field">Surface :</span><span class="custom-field-result"><?php echo types_render_field('surface', ''); ?></span></li>
					<li><span class="custom-field">MO :</span><span class="custom-field-result"><?php echo types_render_field('mo', ''); ?></span></li>
				</ul>
				<span id="copyright">copyright : <?php echo types_render_field('copyright', ''); ?></span>
				<?php echo (types_render_field('link', array('link' => true, 'title' => 'Link','output' => 'html' ))); ?>
				<?php echo (types_render_field('dossier-pdf', array('link' => true, 'title' => 'PDF','output' => 'html' ))); ?>
			
			</section>	

		</article>


<?php endwhile; // End the loop ?>