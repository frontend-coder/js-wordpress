<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}


function remove_canonical() {
 if ( is_post_type_archive( 'recall' ) ) {
        add_filter( 'wpseo_canonical', '__return_false',  10, 1 );
    }
    // Disable for 'shop' page
    if ( is_shop() ) {
        add_filter( 'wpseo_canonical', '__return_false',  10, 1 );
    }
}
add_action('wp', 'remove_canonical');


 /**
 * Начало каноникал shop-page
 */
add_action( 'wpseo_head', 'uncode_nocanonical', 0 );
function uncode_nocanonical() {
if ( is_post_type_archive( 'recall' ) ) {
		echo '<link rel="canonical" href="http://js.local/recall/" />'."\n";
	}
	if ( is_shop() ) {
		echo '<link rel="canonical" href="http://js.local/shop/" />'."\n";
	}
}


add_filter('wpseo_title', 'my_wpseo_title');
function my_wpseo_title($title) {
	if( !is_paged() ){
    $title = str_replace(' - Страница 1', '', $title);
	} 
	elseif ( is_page() && $post->post_parent || !is_paged() ) {
		$title = str_replace(' - Страница 1', '', $title);
	}

	return $title;
}

add_filter('wpseo_opengraph_title', 'my_opengraph_title');
function my_opengraph_title($ogtitle) {
	if( !is_paged() ){
    $ogtitle = str_replace(' - Страница 1', '', $ogtitle);
	} elseif ( is_page() && $post->post_parent || !is_paged() ) {
		$ogtitle = str_replace(' - Страница 1', '', $ogtitle);
	}
	return $ogtitle;
}

add_filter('wpseo_metadesc', 'my_metadesc');
function my_metadesc($metadesc){
	if( !is_paged() ){
    $metadesc = str_replace(' - Страница 1', '', $metadesc);
	} elseif ( is_page() && $post->post_parent || !is_paged() ) {
		$metadesc = str_replace(' - Страница 1', '', $metadesc);
	}
	return $metadesc;
}

// add_filter( 'wpseo_opengraph_desc', 'filter_wpseo_opengraph_desc', 10, 1 ); 

add_filter( 'wpseo_opengraph_desc', 'filter_wpseo_opengraph_desc' ); 

function filter_wpseo_opengraph_desc( $ogdesc ) { 
		if( !is_paged() ){
    $ogdesc = str_replace(' - Страница 1', '', $ogdesc); 
	}  elseif ( is_page() && $post->post_parent || !is_paged() ) {
		$ogdesc = str_replace(' - Страница 1', '', $ogdesc);
	}
	return $ogdesc; 
}; 


add_filter( 'wpseo_twitter_title', 'filter_wpseo_twitter_title' ); 
function filter_wpseo_twitter_title( $twitogtitle ) { 
		if( !is_paged() ){
    $twitogtitle = str_replace(' - Страница 1', '', $twitogtitle); 
	} elseif ( is_page() && $post->post_parent || !is_paged() ) {
		$twitogtitle = str_replace(' - Страница 1', '', $twitogtitle);
	} 
	
	return $twitogtitle; 

}; 

add_filter( 'wpseo_twitter_description', 'filter_wpseo_twitter_desc' ); 
function filter_wpseo_twitter_desc( $twitogdesc ) { 
		if( !is_paged() ){
    $twitogdesc = str_replace(' - Страница 1', '', $twitogdesc); 
	} elseif ( is_page() && $post->post_parent || !is_paged() ) {
		$twitogdesc = str_replace(' - Страница 1', '', $twitogdesc);
	}
	return $twitogdesc; 

}; 
//  конец сео первых страниц тегов

add_action( 'wp_head', 'uncode_noindex_paged', 0 );
function uncode_noindex_paged() {
	
/*	!is_shop() && is_paged() ||
*/	
if (  is_paged()   ) {
   add_filter( 'wp_robots', 'wp_robots_no_robots' );	
	}
	
	if (  isset( $_GET['orderby'] ) ) {
    add_filter( 'wp_robots', 'wp_robots_no_robots' );	
	}
	
// 	if (strpos($_SERVER['REQUEST_URI'], "?upage=") !== false) {
// 	add_filter( 'wp_robots', 'wp_robots_no_robots' );
// }
}