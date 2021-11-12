<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}

if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

// function jst_add_woocommerce_support() {
// 	add_theme_suport('woocommerce');
// }
// add_action('after_setup_theme', 'jst_add_woocommerce_support');


// как убрать сайдбар по умолчанию
remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);

function get_custom_sidebar() {
	get_sidebar('shop');
}

add_action('woocommerce_sidebar', 'get_custom_sidebar', 10);

















}