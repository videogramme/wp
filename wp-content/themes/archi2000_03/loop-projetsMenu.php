<?php /* Start loop */ ?>


<?php


echo('<section id="nomATrouver">'."\n");
	echo('<section id="nav-second">'."\n");

		$args1 = array(
			'type'                     => 'projet',
			'child_of'                 => 0,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'etat',
			'pad_counts'               => false );

		$categories1 = get_categories($args1);



		echo ('<div class="option-combo etat">'."\n");

			echo('<ul id="tri2" class="filter option-set clearfix " data-filter-group="etat">'."\n");
		
				echo ('<li><a href="#filter-etat-any" data-filter-value="">Tous</a></li>');

				foreach ($categories1 as $cat1){
					$sPattern = '/\s*/m';
					$sReplace = '';
					$sansEspace = preg_replace( $sPattern, $sReplace, $cat1->cat_name );
					$sansAE = remove_accents($sansEspace); 
					$cat1clean = strtolower($sansAE);
					echo('<li><a href="#filter-type-'. $cat1clean .'"'.' data-filter-value=".'. $cat1clean .'">'.$cat1->cat_name.'</a></li>'."\n");
					
				}

			echo ('</ul>'."\n");
		echo ('</div>'."\n");


		$args2 = array(
			'type'                     => 'projet',
			'child_of'                 => 3,
			'parent'                   => '',
			'orderby'                  => 'name',
			'order'                    => 'ASC',
			'hide_empty'               => 1,
			'hierarchical'             => 1,
			'exclude'                  => '',
			'include'                  => '',
			'number'                   => '',
			'taxonomy'                 => 'type',
			'pad_counts'               => false );

		$categories2 = get_categories($args2);



		echo ('<div class="option-combo type">'."\n");

			echo('<ul id="tri2" class="filter option-set clearfix " data-filter-group="type">'."\n");
		
				echo ('<li><a href="#filter-type-any" data-filter-value="">Tous</a></li>');

				foreach ($categories2 as $cat2){
					$sPattern = '/\s*/m';
					$sReplace = '';
					$sansEspace = preg_replace( $sPattern, $sReplace, $cat2->cat_name );
					$sansAE = remove_accents($sansEspace); 
					$cat2clean = strtolower($sansAE);
					
					echo('<li><a href="#filter-type-'.$cat2clean.'"'.' data-filter-value=".'.$cat2clean.'">'.$cat2->cat_name.'</a></li>'."\n");
					
				}

			echo ('</ul>'."\n");
		echo ('</div>'."\n");


?>

<div id="filterGroup">
  <select class="filter option-set" data-filter-group="annee">
  	<option data-filter-value="" selected="selected">Toutes les années</option>
		  <?php
		  $metakey = 'wpcf-annee';
		  $annees = $wpdb->get_col($wpdb->prepare("SELECT DISTINCT meta_value FROM $wpdb->postmeta WHERE meta_key = %s ORDER BY meta_value ASC", $metakey) );
		  if ($annees) {
		    foreach ($annees as $annee) {
		      echo "<option data-filter-value=\"." . $annee . "\">" . $annee . "</option>";
		    }
		  }
		  ?>
  </select>
</div>








		</section>
	</section>	





			



