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


  $meta_boxes[] = array(
        'id'         => 'service_page_metabox',
        'title'      => 'Service Meta Options',
        'pages'      => array( 'service', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
     //   'show_on'    => array( 'key' => 'page-template', 'value' => array('page-home.php'), ), // Specific post templates to display this metabox
        'fields' => array(
            array(
                'name' => 'Стоимость услуги',
                'desc' => 'Enter price of service',
                'id'   => $prefix . 'service_price',
                'type' => 'text',
            ),
             array(
                'name' => 'Фоновое изображение',
                'desc' => 'Выберите фоновое изображение',
                'id'   => $prefix . 'service_fonitemss',
                'type' => 'select',
                'options' => array(
                    array('name' => 'Стиль статистика', 'value' => 'stat'),
                    array('name' => 'Стиль идея', 'value' => 'idea'),
                    array('name' => 'Стиль интернет', 'value' => 'internet'),
                    array('name' => 'Стиль информация', 'value' => 'info'),
                    array('name' => 'Стиль деловой', 'value' => 'busy'),
                    array('name' => 'Стиль цель', 'value' => 'target'),
                )
            ),
        )
    );



  $meta_boxes[] = array(
        'id'         => 'order_page',
        'title'      => 'Order Meta Options',
        'pages'      => array( 'page', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
       'show_on'    => array( 'key' => 'page-template', 'value' => array('template-order.php'), ), 
        'fields' => array(
            array(
                'name' => 'Форма заказа',
                'desc' => 'Enter shortcede of CF7',
                'id'   => $prefix . 'order_service_form',
                'type' => 'text',
            ),
        )
    );


 $meta_boxes[] = array(
        'id'         => 'product__stutus',
        'title'      => 'Stutus Product',
        'pages'      => array( 'product', ), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
  //    'show_on'    => array( 'key' => 'page-template', 'value' => array('template-order.php'), ), 
        'fields' => array(
            array(
                'name' => 'Текст кнопки',
                'desc' => 'Укажите текст для вывода в качестве надписи в кнопке',
                'id'   => $prefix . 'product__stutus_title',
                'type' => 'text',
            ),

            array(
                'name' => 'Цвет кнопки',
                'desc' => 'Выберите цвет для окрашивания фона кнопки',
                'id'   => $prefix . 'product__stutus_color',
                'type' => 'text',
            ),



        )
    );









	return $meta_boxes;
}