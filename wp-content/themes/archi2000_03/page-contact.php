<?php
/*
Template Name: News
*/
?>
<?php get_header(); ?>

<?php while (have_posts()) : the_post(); ?>

		<article id="post" class="<?php the_title(); ?>">
	
			<section id="post-img" style="height: 660px; overflow: hidden">

				<iframe width="100%" height="700" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.be/maps?oe=utf-8&amp;client=firefox-a&amp;q=Avenue+du+Vivier+d'Oie,&amp;ie=UTF8&amp;hq=&amp;hnear=Avenue+du+Vivier+d'Oie,+1000+Bruxelles&amp;gl=be&amp;t=h&amp;z=14&amp;ll=50.802574,4.377545&amp;output=embed"></iframe>
			</section>
		
			<section id="post-text">

				Archi 2000 sprl				T +32 2 375 87 20
Avenue du Vivier d'Oie, 4	F +32 2 375 75 68
1000 Bruxelles				E info@archi2000.be

			</section>	

		</article>
<?php endwhile; // End the loop ?>
		              
	
<?php get_footer(); ?>