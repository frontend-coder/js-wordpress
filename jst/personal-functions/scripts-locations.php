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

wp_enqueue_script( 'jquery3.1.1', 'http://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js', array(), '', false
);
wp_enqueue_script( 'goodshare', 'https://cdn.jsdelivr.net/npm/goodshare.js@4/goodshare.min.js', array('jquery3.1.1'),
'', true );

wp_enqueue_script( 'jst-comon', get_template_directory_uri() . '/assets/js/common.min.js', array('jst-vendor'),
_S_VERSION, true );
wp_enqueue_script( 'jst-vendor', get_template_directory_uri() . '/assets/js/vendor.min.js', array('goodshare'),
_S_VERSION, true );
wp_enqueue_script( 'jst-svgsprite', get_template_directory_uri() . '/assets/img/svg-sprite/svg-sprite.js', array(),
_S_VERSION, false );

if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
wp_enqueue_script( 'comment-reply' );
}
}
add_action( 'wp_enqueue_scripts', 'jst_scripts' );
