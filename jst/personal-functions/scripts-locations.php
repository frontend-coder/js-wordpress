<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}


/**
* Enqueue scripts and styles.
*/
function jst_scripts() {
wp_enqueue_style( 'jst-style', get_stylesheet_uri(), array(), _S_VERSION );
wp_enqueue_style( 'jst-mainstyle', get_template_directory_uri() .'/assets/css/main.min.css' , array('jst-style'),
_S_VERSION );
wp_enqueue_style( 'jst-vendor', get_template_directory_uri() .'/assets/css/vendor.min.css' , array('jst-mainstyle'),
_S_VERSION );
wp_deregister_script('jquery');

wp_enqueue_script( 'jquery3.1.1', 'http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '', false);
wp_enqueue_script( 'goodshare', 'https://cdn.jsdelivr.net/npm/goodshare.js@4/goodshare.min.js', array('jquery3.1.1'), '', true );

wp_enqueue_script( 'jst-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array('jquery3.1.1'), _S_VERSION, true );
wp_enqueue_script( 'jst-comon', get_template_directory_uri() . '/assets/js/common.min.js', array('jquery3.1.1'), _S_VERSION, true );
wp_enqueue_script( 'jst-svgsprite', get_template_directory_uri() . '/assets/img/svg-sprite/svg-sprite.js', array('jquery3.1.1'), _S_VERSION, false );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'wp_enqueue_scripts', 'jst_scripts' );





function jst_add_scripts($hook) {
	// Add scripts for metaboxes
	if ( $hook == 'post.php' || $hook == 'post-new.php' || $hook == 'page-new.php' || $hook == 'page.php' ) {
		wp_enqueue_style( 'jst-metaboxs', get_template_directory_uri() .'/assets/css/admin.css' , array(), _S_VERSION );
		wp_enqueue_script( 'jst_metaboxes', get_template_directory_uri() . '/assets/js/metaboxes.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-datepicker', 'media-upload', 'thickbox') );
//		wp_enqueue_script( 'jst_shortcodes',get_template_directory_uri() . '/assets/js/shortcodes.js', array( 'jquery', 'thickbox') );
  	}
	
}
add_action( 'admin_enqueue_scripts', 'jst_add_scripts', 10 );


// возвращает данные по полученным ID картинки
function jst_get_attachment($attachment_id) {

	$attachment = get_post( $attachment_id );
return array(
	'alt'=> get_post_meta($attachment->ID, '_wp_attachment_image_alt ', true),
	'description' => $attachment->post_content,
	'href' => get_permalink($attachment->ID ),
	'src' => $attachment->guid,
	'title' => $attachment->post_title,
	 'caption'=>$attachment->post_excerpt  
);

}