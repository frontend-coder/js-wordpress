<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}




/**
 * Add Metaboxes
 * @param array $meta_boxes
 * @return array 
 */
function  jst_metaboxes($meta_boxes) {
	
	$meta_boxes = array();
  $prefix = "jst_";

  $meta_boxes[] = array(
        'id'         => 'recall_page_metabox',
        'title'      => 'Recall Meta Options',
        'pages'      => array( 'recall', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
     //   'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox

        'fields' => array(
           
            array(
                'name' => 'Social link',
                'desc' => 'Enter link',
                'id'   => $prefix . 'social_link',
                'type' => 'text',
            ),
						  array(
                'name' => 'Date REcall',
                'desc' => 'Enter link when you got recall',
                'id'   => $prefix . 'social_daterecall',
                'type' => 'text_date',
            ),
        )
    );



	return $meta_boxes;
}
