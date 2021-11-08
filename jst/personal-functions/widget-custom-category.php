<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}
 

/**
* Blog Widget
*/
class Jst_Category_Widget extends WP_Widget
{ 
public $image_field = 'image';
/**
* General Setup
*/
public function __construct() {

/* Widget settings. */
$widget_ops = array(
'classname' => 'jst_category_widget',
'description' => __('A widget that displays a category of custom post type.', 'jst')
);

/* Widget control settings. */
$control_ops = array(
'width' => 500,
'height' => 450,
'id_base' => 'jst_category_widget'
);

/* Create the widget. */
parent::__construct( 'jst_category_widget', __('JST | Category News', 'jst'), $widget_ops, $control_ops );
}

/**
* Display Widget
* @param array $args
* @param array $instance
*/
public function widget( $args, $instance )
{
extract( $args );

$title =  $instance['title'] ;

// Display Widget
?>

<div class="categories side-nav">
  <h5 class="categories__title">
    <svg width="19" height="19">
      <use xlink:href="#content-post" />
    </svg>
    <?php echo $title ; ?>
  </h5>
  <ul>

    <?php $news_cat = get_terms( array(
	'taxonomy' => 'news-category',
	'hide_empty' => false,
));
foreach( $news_cat as $cat ) {
?>
    <li><a href="<?php echo get_term_link($cat); ?>"><?php echo $cat->name; ?></a>
      <span><?php echo $cat->count; ?></span>
    </li>
    <?php
}  
?>
  </ul>
</div>


<?php
		/* After widget (defined by themes). */
	//	echo $after_widget;
	}

	/**
	 * Update Widget
	 * @param array $new_instance
	 * @param array $old_instance
	 * @return array 
	 */
	public function update( $new_instance, $old_instance ) 
	{
		$instance = $old_instance;
		$instance['title'] = strip_tags( $new_instance['title'] );
		return $instance;
	}
	
	/**
	 * Widget Settings
	 * @param array $instance 
	 */
	public function form( $instance ) 
	{
		//default widget settings.
		$defaults = array(
			'title'		=> __('Категории новостей', 'jst'),
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
  ?>
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'jst') ?></label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
    name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>

<?php
	}
}
