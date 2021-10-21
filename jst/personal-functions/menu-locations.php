<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}

	// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'jst' ),
				'menu-footer' => esc_html__( 'Footer Navigation One', 'jst' ),
				'menu-footer-two' => esc_html__( 'Footer Navigation Two', 'jst' ),
			)
		);
