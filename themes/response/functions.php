<?php

require_once('lib/clean.php'); // do all the cleaning and enqueue here
require_once('lib/enqueue-sass.php'); 

require_once('lib/foundation.php'); // load Foundation specific functions like top-bar

/**********************
Add theme supports
**********************/
function reverie_theme_support() {

	// Add post thumbnail supports. http://codex.wordpress.org/Post_Thumbnails
	add_theme_support('post-thumbnails');
	add_image_size( 'homepage-thumb', 220, 180, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
	add_image_size( 'page-thumb', 300, 300, true ); // 220 pixels wide by 180 pixels tall, hard crop mode
	// set_post_thumbnail_size(150, 150, false);
	
	// rss thingy
	add_theme_support('automatic-feed-links');
	
	// Add post formarts supports. http://codex.wordpress.org/Post_Formats
	add_theme_support('post-formats', array('gallery', 'link', 'image', 'video', 'audio'));
	
	// Add menu supports. http://codex.wordpress.org/Function_Reference/register_nav_menus
	add_theme_support('menus');
	register_nav_menus(array(
		'primary' => __('Primary Navigation', 'reverie')
	));

}
add_action('after_setup_theme', 'reverie_theme_support'); /* end Reverie theme support */

// create widget areas: sidebar, footer
$sidebars = array('Sidebar');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="row widget %2$s"><div class="small-12 columns">',
		'after_widget' => '</div></article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}
$sidebars = array('Footer');
foreach ($sidebars as $sidebar) {
	register_sidebar(array('name'=> $sidebar,
		'before_widget' => '<article id="%1$s" class="large-4 columns widget %2$s">',
		'after_widget' => '</article>',
		'before_title' => '<h6><strong>',
		'after_title' => '</strong></h6>'
	));
}

// return entry meta information for posts, used by multiple loops.
function reverie_entry_meta() {
	echo '<p class="byline"><time class="updated" datetime="'. get_the_time('c') .'" pubdate>'. sprintf(__('Posted on %s at %s.', 'reverie'), get_the_time('l, F jS, Y'), get_the_time()) .'</time></p>';
	//echo '<p class="byline author">'. __('Written by', 'reverie') .' <a href="'. get_author_posts_url(get_the_author_meta('ID')) .'" rel="author" class="fn">'. get_the_author() .'</a></p>';
}

function custom_admin() {
	global $user_level;
	if ($user_level = '2' ) {
	   echo '<style type="text/css">
		   	#wpcontent #wpbody .subsubsub .all, #wpcontent #wpbody .subsubsub .publish, #wpcontent #wpbody .subsubsub .pending {display:none;}
		   		 </style>';
   }
}

add_action('admin_head', 'custom_admin');

add_action('after_setup_theme', 'remove_admin_bar');

function remove_admin_bar() {
  show_admin_bar(false);
  $user_id = get_current_user_id();
    if ($user_id ==  1 || $user_id ==  14 ) {
      show_admin_bar(true);
    }
  }



//Derigister Style for frontend form:

add_action( 'wp_print_styles', 'my_deregister_styles', 100 );
 
function my_deregister_styles() {
	wp_deregister_style( 'wp-admin' );
}