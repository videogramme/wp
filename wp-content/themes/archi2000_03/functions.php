<?php
// cpt archive page problem
// register_post_type('products', array(   'rewrite' => array('slug' => 'products') ));

function reverie_setup() {
	// Add language supports. Please note that Reverie Framework does not include language files.
	load_theme_textdomain('archi2000', get_template_directory() . '/lang');
	
	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	set_post_thumbnail_size(186, 132, false);
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	//add_theme_support('post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'video', 'audio', 'chat'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary_navigation' => __('Primary Navigation', 'reverie'),
		//'utility_navigation' => __('Utility Navigation', 'reverie')
	));	
}
add_action('after_setup_theme', 'reverie_setup');

// Enqueue for header and footer, thanks to flickapix on Github.
// Enqueue css files
function archi2000_css() {
  if ( !is_admin() ) {
  
    wp_register_style( 'normalize',get_template_directory_uri() . '/css/normalize.min.css', false );
    wp_enqueue_style( 'normalize' );
    
    wp_register_style( 'isotope',get_template_directory_uri() . '/css/isotope.css', false );
    wp_enqueue_style( 'isotope' );

    wp_register_style( 'isotope',get_template_directory_uri() . '/css/flexslider.css', false );
    wp_enqueue_style( 'isotope' );

// !!!! en enlever apres def
    wp_register_style( 'google_font',"http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900", false );
	wp_enqueue_style( 'google_font' );
     
    // Load style.css to allow contents overwrite
    wp_register_style( 'style',get_template_directory_uri() . '/style.css', false );
    wp_enqueue_style( 'style' );
     
  }
}
add_action( 'init', 'archi2000_css' );  

// Enqueue js files
function archi2000_scripts() {

  if ( !is_admin() ) {
  
  // Enqueue to header
     wp_deregister_script( 'jquery' );
     wp_register_script( 'jquery', get_template_directory_uri() . '/js/vendor/jquery-1.8.3.min.js' );
     wp_enqueue_script( 'jquery' );
     
     wp_register_script( 'isotope', get_template_directory_uri() . '/js/vendor/jquery.isotope.min.js', array( 'jquery' ),  false, true );
     wp_enqueue_script( 'isotope' );
 
  // Enqueue to footer
     wp_register_script( 'ba-bbq', get_template_directory_uri() . '/js/vendor/jquery.ba-bbq.min.js', array( 'jquery','isotope' ), false, true );
     wp_enqueue_script( 'ba-bbq' );

     wp_register_script( 'history', get_template_directory_uri() . '/js/vendor/jquery.history.js', array( 'jquery','isotope','ba-bbq' ), false, true );
     wp_enqueue_script( 'history' );
     
     wp_register_script( 'flexslider', get_template_directory_uri() . '/js/vendor/jquery.flexslider-min.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'flexslider' );
     
     wp_register_script( 'plugins', get_template_directory_uri() . '/js/plugins.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'plugins' );

     wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), false, true );
     wp_enqueue_script( 'main' );
     
    
     
  }
}
add_action( 'init', 'archi2000_scripts' );

// create widget areas: sidebar, footer
// $sidebars = array('Sidebar');
// foreach ($sidebars as $sidebar) {
// 	register_sidebar(array('name'=> $sidebar,
// 		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="sidebar-section twelve columns">',
// 		'after_widget' => '</div></article>',
// 		'before_title' => '<h6><strong>',
// 		'after_title' => '</strong></h6>'
// 	));
// }
// $sidebars = array('Footer');
// foreach ($sidebars as $sidebar) {
// 	register_sidebar(array('name'=> $sidebar,
// 		'before_widget' => '<article id="%1$s" class="four columns widget %2$s"><div class="footer-section">',
// 		'after_widget' => '</div></article>',
// 		'before_title' => '<h6><strong>',
// 		'after_title' => '</strong></h6>'
// 	));
// }

// return entry meta information for posts, used by multiple loops.
// function reverie_entry_meta() {
// 	echo '<time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time>';
// 	echo '<p class="byline author vcard">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
// }

/* Customized the output of caption, you can remove the filter to restore back to the WP default output. Courtesy of DevPress. http://devpress.com/blog/captions-in-wordpress/ */
add_filter( 'img_caption_shortcode', 'cleaner_caption', 10, 3 );

function cleaner_caption( $output, $attr, $content ) {

	/* We're not worried abut captions in feeds, so just return the output here. */
	if ( is_feed() )
		return $output;

	/* Set up the default arguments. */
	$defaults = array(
		'id' => '',
		'align' => 'alignnone',
		'width' => '',
		'caption' => ''
	);

	/* Merge the defaults with user input. */
	$attr = shortcode_atts( $defaults, $attr );

	/* If the width is less than 1 or there is no caption, return the content wrapped between the [caption]< tags. */
	if ( 1 > $attr['width'] || empty( $attr['caption'] ) )
		return $content;

	/* Set up the attributes for the caption <div>. */
	$attributes = ' class="figure ' . esc_attr( $attr['align'] ) . '"';

	/* Open the caption <div>. */
	$output = '<figure' . $attributes .'>';

	/* Allow shortcodes for the content the caption was created for. */
	$output .= do_shortcode( $content );

	/* Append the caption text. */
	$output .= '<figcaption>' . $attr['caption'] . '</figcaption>';

	/* Close the caption </div>. */
	$output .= '</figure>';

	/* Return the formatted, clean caption. */
	return $output;
}

// Clean the output of attributes of images in editor. Courtesy of SitePoint. http://www.sitepoint.com/wordpress-change-img-tag-html/
function image_tag_class($class, $id, $align, $size) {
	$align = 'align' . esc_attr($align);
	return $align;
}
add_filter('get_image_tag_class', 'image_tag_class', 0, 4);
function image_tag($html, $id, $alt, $title) {
	return preg_replace(array(
			'/\s+width="\d+"/i',
			'/\s+height="\d+"/i',
			'/alt=""/i'
		),
		array(
			'',
			'',
			'',
			'alt="' . $title . '"'
		),
		$html);
}
add_filter('get_image_tag', 'image_tag', 0, 4);

// Customize output for menu
class reverie_walker extends Walker_Nav_Menu {
  function start_lvl(&$output, $depth) {
    $indent = str_repeat("\t", $depth);
    $output .= "\n$indent<a href=\"#\" class=\"flyout-toggle\"><span> </span></a><ul class=\"flyout\">\n";
  }
}

// Add Foundation 'active' class for the current menu item 
function archi2000_active_nav_class( $classes, $item )
{
    if($item->current == 1)
    {
        $classes[] = 'active';
    }
    return $classes;
}
add_filter( 'nav_menu_css_class', 'archi2000_active_nav_class', 10, 2 );

// img unautop, Courtesy of Interconnectit http://interconnectit.com/2175/how-to-remove-p-tags-from-images-in-wordpress/
function img_unautop($pee) {
    $pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
    return $pee;
}
add_filter( 'the_content', 'img_unautop', 30 );


function add_taxo1_on_projet( $classes, $class, $ID ) {
	$taxonomy = 'type';
	$terms = get_the_terms( (int) $ID, $taxonomy );
	if( !empty( $terms ) ) {
	foreach( (array) $terms as $order => $term ) {
	if( !in_array( $term->slug, $classes ) ) {
	$classes[] = $term->slug;
	}
	}
	}
	return $classes;
	}
add_filter( 'post_class', 'add_taxo1_on_projet', 10, 3 );

function add_taxo2_on_projet( $classes, $class, $ID ) {
	$taxonomy = 'etat';
	$terms = get_the_terms( (int) $ID, $taxonomy );
	if( !empty( $terms ) ) {
	foreach( (array) $terms as $order => $term ) {
	if( !in_array( $term->slug, $classes ) ) {
	$classes[] = $term->slug;
	}
	}
	}
	return $classes;
	}
add_filter( 'post_class', 'add_taxo2_on_projet', 10, 3 );

// add custom field annee directement dans la loop de la galerie de thumb

// get all of the images attached to the current post
// http://johnford.is/programmatically-pull-attachments-from-wordpress-posts/
function aldenta_get_images($size = 'thumbnail') {
	global $post;
	
	$photos = get_children( array('post_parent' => $post->ID, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => 'ASC', 'orderby' => 'menu_order ID') );
	
	$results = array();

	if ($photos) {
		foreach ($photos as $photo) {
			// get the correct image html for the selected size
			$results[] = wp_get_attachment_image($photo->ID, $size);
		}
	}

	return $results;
}



function my_attachments( $attachments )
{
  $args = array(

    // title of the meta box (string)
    'label'         => 'My Attachments',

    // all post types to utilize (string|array)
    'post_type'     => array( 'post', 'page' , 'news' , 'projets' , 'profils' , 'equipes' ),

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Attacher vos images ici!',

    // text for 'Attach' button (string)
    'button_text'   => __( 'Attach Files', 'attachments' ),

    // text for modal 'ATTACH' button (string)
    'modal_text'    => __( 'Attach', 'attachments' ),

    // fields for this instance (array)
    'fields'        => array(
      array(
        'name'  => 'title',                          // unique field name
        'type'  => 'text',                           // registered field type (field available in 3.0: text)
        'label' => __( 'Title', 'attachments' ),     // label to display
      ),
      array(
        'name'  => 'caption',                        // unique field name
        'type'  => 'text',                           // registered field type (field available in 3.0: text)
        'label' => __( 'Caption', 'attachments' ),   // label to display
      ),
      array(
        'name'  => 'copyright',                      // unique field name
        'type'  => 'text',                           // registered field type (field available in 3.0: text)
        'label' => __( 'Copyright', 'attachments' ), // label to display
      ),
    ),

  );

  $attachments->register( 'my_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'my_attachments' );


// Function d'amin 
//Remove Annoying WP-Types Meta Box "How-to Display..."
if(is_admin()) :
    function remove_annoying_meta_boxes(){

        // Get post_type
        global $post;

        $post_type = get_post_type( $post->ID );

        remove_meta_box('wpcf-marketing', $post_type, 'side');

    }

add_action('add_meta_boxes', 'remove_annoying_meta_boxes');

endif;

// remove some add of WPML
define("ICL_DONT_PROMOTE", true);






function portfolio_in_today() {
	$types = 'projet';
        if (!post_type_exists(''.$types.'')) { return; }
        $num_posts = wp_count_posts( ''.$types.'' );
        $nbr_ = 'Projet';
	$nbr_s = 'Projets';
        $num = number_format_i18n( $num_posts->publish );
        $text = _n('' . $nbr_ . '', '' . $nbr_s . '', intval($num_posts->publish) );
        if ( current_user_can( 'edit_posts' ) ) {
            $num = "<a href='edit.php?post_type=$types'>$num</a>";
            $text = "<a href='edit.php?post_type=$types'>$text</a>";
        }
        echo '<tr><td class="first b">' . $num . '</td><td class="t">' . $text . '</td></tr>';
        if ($num_posts->pending > 0) {
            $num = number_format_i18n( $num_posts->pending );
            $text = _n( 'En attente', 'En attentes', intval($num_posts->pending) );
            if ( current_user_can( 'edit_posts' ) ) {
                $num = "<a href='edit.php?post_status=pending&post_type=$types'>$num</a>";
                $text = "<a class='waiting' href='edit.php?post_status=pending&post_type=$types'>$text</a>";
            }
            echo '<tr><td class="first b">' . $num . '</td><td class="t">' . $text . '</td></tr>';
        }
}
add_action('right_now_content_table_end', 'portfolio_in_today');





//
//Function de debug
//
//
// http://wordpress.org/support/topic/get-name-of-page-template-on-a-page
// this can live in /themes/mytheme/functions.php, or maybe as a dev plugin?
//
// function get_template_name () {
// 	foreach ( debug_backtrace() as $called_file ) {
// 		foreach ( $called_file as $index ) {
// 			if ( !is_array($index[0]) AND strstr($index[0],'/themes/') AND !strstr($index[0],'footer.php') ) {
// 				$template_file = $index[0] ;
// 			}
// 		}
// 	}
// 	$template_contents = file_get_contents($template_file) ;
// 	preg_match_all("(Template Name:(.*)\n)siU",$template_contents,$template_name);
// 	$template_name = trim($template_name[1][0]);
// 	if ( !$template_name ) { $template_name = '(default)' ; }
// 	$template_file = array_pop(explode('/themes/', basename($template_file)));
// 	return $template_file . ' > '. $template_name ;
// }






?>