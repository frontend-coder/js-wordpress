<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}

function jst_register_testimonial_post_type() {
 


 
    register_post_type( 'news', array(
        'labels'             => array(
        'name'                  => __( 'Новости', 'jst' ),
        'singular_name'         => __( 'Новость', 'jst' ),
        'menu_name'             => __( 'Новости', 'jst' ),
        'name_admin_bar'        => __( 'Новости',  'jst' ),
        'add_new'               => __( 'Add New Новость', 'jst' ),
        'add_new_item'          => __( 'Add New СНовость', 'jst' ),
        'new_item'              => __( 'New Новость', 'jst' ),
        'edit_item'             => __( 'Edit Новость', 'jst' ),
        'view_item'             => __( 'View Новость', 'jst' ),
        'all_items'             => __( 'All Новости', 'jst' ),
        'search_items'          => __( 'Search Новость', 'jst' ),
        'parent_item_colon'     => __( 'Parent Новости:', 'jst' ),
        'not_found'             => __( 'No Новости found.', 'jst' ),
        'not_found_in_trash'    => __( 'No Новости found in Trash.', 'jst' ),
        'featured_image'        => __( 'Seе Cover Image for Новости', 'jst' ),
        'set_featured_image'    => __( 'Set cover image for Новости', 'jst' ),
        'remove_featured_image' => __( 'Remove cover image for Новости', 'jst' ),
        'use_featured_image'    => __( 'Use as cover image for Новости', 'jst' ),
        'archives'              => __( 'Testimonial archives for Новостей',  'jst' ),
        'insert_into_item'      => __( 'Insert into Новость', 'jst' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Новости', 'jst' ),
        'filter_items_list'     => __( 'Filter Новость list', 'jst' ),
        'items_list_navigation' => __( 'Новости list navigation', 'jst' ),
        'items_list'            => __( 'Новости list', 'jst' ),
    ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'news' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 8,
        'show_in_admin_bar'  => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'exclude_from_search'   => false,
     'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'  ),
    ) );

// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy(
        'news-category',
        array('news'),
		array(
            'label'         => esc_html__('News category'), 
            'rewrite'       => array( 'slug' => 'news-category' ), // свой слаг в URL
            'hierarchical'  => true,
        )
	);

 

    
    register_post_type( 'cases', array(
        'labels'             => array(
        'name'                  => _x( 'Сases', 'jst' ),
        'singular_name'         => _x( 'Сase', 'jst' ),
        'menu_name'             => _x( 'Сases', 'jst' ),
        'name_admin_bar'        => _x( 'Сases',  'jst' ),
        'add_new'               => __( 'Add New Сase', 'jst' ),
        'add_new_item'          => __( 'Add New Сase', 'jst' ),
        'new_item'              => __( 'New Сase', 'jst' ),
        'edit_item'             => __( 'Edit Сase', 'jst' ),
        'view_item'             => __( 'View Сase', 'jst' ),
        'all_items'             => __( 'All Сases', 'jst' ),
        'search_items'          => __( 'Search Сase', 'jst' ),
        'parent_item_colon'     => __( 'Parent Сases:', 'jst' ),
        'not_found'             => __( 'No Сases found.', 'jst' ),
        'not_found_in_trash'    => __( 'No Сases found in Trash.', 'jst' ),
        'featured_image'        => _x( 'Seе Cover Image for Сases ', 'jst' ),
        'set_featured_image'    => _x( 'Set cover image for Сases', 'jst' ),
        'remove_featured_image' => _x( 'Remove cover image for Сases', 'jst' ),
        'use_featured_image'    => _x( 'Use as cover image for Services', 'jst' ),
        'archives'              => _x( 'Testimonial archives for Сases',  'jst' ),
        'insert_into_item'      => _x( 'Insert into Сase', 'jst' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Сase', 'jst' ),
        'filter_items_list'     => _x( 'Filter Сases list', 'jst' ),
        'items_list_navigation' => _x( 'Сases list navigation', 'jst' ),
        'items_list'            => _x( 'Сases list', 'jst' ),
    ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'cases' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'show_in_admin_bar'  => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'exclude_from_search'   => false,
     'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'  ),
    ) );


 
    register_post_type( 'service', array(
        'labels'             => array(
        'name'                  => _x( 'Services', 'jst' ),
        'singular_name'         => _x( 'Service', 'jst' ),
        'menu_name'             => _x( 'Services', 'jst' ),
        'name_admin_bar'        => _x( 'Services',  'jst' ),
        'add_new'               => __( 'Add New Service', 'jst' ),
        'add_new_item'          => __( 'Add New Service', 'jst' ),
        'new_item'              => __( 'New Service', 'jst' ),
        'edit_item'             => __( 'Edit Service', 'jst' ),
        'view_item'             => __( 'View Service', 'jst' ),
        'all_items'             => __( 'All Services', 'jst' ),
        'search_items'          => __( 'Search Service', 'jst' ),
        'parent_item_colon'     => __( 'Parent Services:', 'jst' ),
        'not_found'             => __( 'No Services found.', 'jst' ),
        'not_found_in_trash'    => __( 'No Services found in Trash.', 'jst' ),
        'featured_image'        => _x( 'See Cover Image for Services ', 'jst' ),
        'set_featured_image'    => _x( 'Set cover image for Services', 'jst' ),
        'remove_featured_image' => _x( 'Remove cover image for Services', 'jst' ),
        'use_featured_image'    => _x( 'Use as cover image for Services', 'jst' ),
        'archives'              => _x( 'Testimonial archives for Services',  'jst' ),
        'insert_into_item'      => _x( 'Insert into Service', 'jst' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this Service', 'jst' ),
        'filter_items_list'     => _x( 'Filter Services list', 'jst' ),
        'items_list_navigation' => _x( 'Services list navigation', 'jst' ),
        'items_list'            => _x( 'Services list', 'jst' ),
    ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'service' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 6,
        'show_in_admin_bar'  => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'exclude_from_search'   => false,
     'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'  ),
    ) );

 	// Добавляем древовидную таксономию 'genre' (как категории)
	register_taxonomy(
        'service-type',
        array('service'),
		array(
            'label'            => esc_html__('Service type'), 
            'rewrite'       => array( 'slug' => 'service-type' ), // свой слаг в URL
            'hierarchical'  => true,
        )
	);

 
    register_post_type( 'recall', array(
        'labels'             => array(
        'name'                  => __( 'Recalls', 'jst' ),
        'singular_name'         => __( 'Recall', 'jst' ),
        'menu_name'             => __( 'Recalls', 'jst' ),
        'name_admin_bar'        => __( 'Recalls', 'jst' ),
        'add_new'               => __( 'Add New Recall', 'jst' ),
        'add_new_item'          => __( 'Add New Recall', 'jst' ),
        'new_item'              => __( 'New Recall', 'jst' ),
        'edit_item'             => __( 'Edit Recall', 'jst' ),
        'view_item'             => __( 'View Recall', 'jst' ),
        'all_items'             => __( 'All Recalls', 'jst' ),
        'search_items'          => __( 'Search Recall', 'jst' ),
        'parent_item_colon'     => __( 'Parent Recalls:', 'jst' ),
        'not_found'             => __( 'No Recalls found.', 'jst' ),
        'not_found_in_trash'    => __( 'No Recalls found in Trash.', 'jst' ),
        'featured_image'        => __( 'See Cover Image for Recalls ', 'jst' ),
        'set_featured_image'    => __( 'Set cover image for Recalls', 'jst' ),
        'remove_featured_image' => __( 'Remove cover image for Recalls', 'jst' ),
        'use_featured_image'    => __( 'Use as cover image for Recalls', 'jst' ),
        'archives'              => __( 'Testimonial archives for Recalls',  'jst' ),
        'insert_into_item'      => __( 'Insert into Recall', 'jst' ),
        'uploaded_to_this_item' => __( 'Uploaded to this Recall', 'jst' ),
        'filter_items_list'     => __( 'Filter Recalls list', 'jst' ),
        'items_list_navigation' => __( 'Recalls list navigation', 'jst' ),
        'items_list'            => __( 'Recalls list',  'jst' ),
    ),
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'recall' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'show_in_admin_bar'  => true,
		'show_in_nav_menus'  => true,
		'can_export'         => true,
		'exclude_from_search'  => false,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
    ) );


}
 
add_action( 'init', 'jst_register_testimonial_post_type' );   


function jst_posts_per_archivepage( $query ) {
global $jst_options;
$posts_per_page_recall = -1  ;
if ( $jst_options['custom_recall_on_page']) {
   $posts_per_page_recall = $jst_options['custom_recall_on_page'];
  }

$posts_per_page_news = -1  ;
if ( $jst_options['custom_news_per_page']) {
   $posts_per_page_news = $jst_options['custom_news_per_page'];
  }


    if( !is_admin() && is_post_type_archive('recall') ) {
        $query->set( 'posts_per_page', $posts_per_page_recall);
    }
     
    if( !is_admin() &&  is_post_type_archive('news') ) {
        $query->set( 'posts_per_page', $posts_per_page_news);
    }
}
add_action('pre_get_posts', 'jst_posts_per_archivepage');