<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}
 

/**
* Blog Widget
*/
class Jst_Subscribe_Widget extends WP_Widget
{ 
public $image_field = 'image';

/**
* General Setup
*/
public function __construct() {

/* Widget settings. */
$widget_ops = array(
'classname' => 'jst_subscribe_widget',
'description' => __('A widget that displays a subscribe form of custom post type.', 'jst')
);

/* Widget control settings. */
$control_ops = array(
'width' => 500,
'height' => 450,
'id_base' => 'jst_subscribe_widget'
);

/* Create the widget. */
parent::__construct( 'jst_subscribe_widget', __('JST | Subscribe\'s Form', 'jst'), $widget_ops, $control_ops );
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
$subscribe =  $instance['subscribe'] ;

// Display Widget
?>

<div class="subscr">
  <div class="subscr__title">
    <svg width="19" height="19">
      <use xlink:href="#mail" />
    </svg>
    <?php echo $title ; ?>
  </div>
  <?php echo do_shortcode($subscribe); ?>
  <!-- <form action="#" class="subscr__form log" id="popupSubscribe">
    <div class="log__group">
      <label>Имя</label>
      <input type="text" name="name_mod" class="log__input">
    </div>
    <div class="log__group">
      <label>Email</label>
      <input type="email" name="email" class="log__input">
    </div>
    <div class="log__btn">
      <input id="subscribe" type="submit" data-submit value="Подписаться" class="btn" />
    </div>
  </form> -->
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
		$instance['subscribe'] = strip_tags( $new_instance['subscribe'] );
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
			'title'		=> __('Подписаться', 'jst'),
			'subscribe'		=> '',
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
  ?>
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'jst') ?></label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
    name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>
<p>
  <label for="<?php echo $this->get_field_id( 'subscribe' ); ?>"><?php _e('Form Shotcode:', 'jst') ?></label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'subscribe' ); ?>"
    name="<?php echo $this->get_field_name( 'subscribe' ); ?>" value="<?php echo $instance['subscribe']; ?>" />
</p>
<?php
	}
}
