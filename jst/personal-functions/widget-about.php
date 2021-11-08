<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}
 

/**
* Blog Widget
*/
class Jst_About_Widget extends WP_Widget
{ 
public $image_field = 'image';

/**
* General Setup
*/
public function __construct() {

/* Widget settings. */
$widget_ops = array(
'classname' => 'jst_about_widget',
'description' => __('A widget that displays a short information about you.', 'jst')
);

/* Widget control settings. */
$control_ops = array(
'width' => 500,
'height' => 450,
'id_base' => 'jst_about_widget'
);

/* Create the widget. */
parent::__construct( 'jst_about_widget', __('JST | About Me', 'jst'), $widget_ops, $control_ops );
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
$text = $instance['text'];
$link_more = $instance['link_more'];

/* Our variables from the widget settings. */
$image_id = $instance[$this->image_field];

$image = new Jst_WidgetImageField( $this, $image_id );

/* Before widget (defined by themes). */
//echo $before_widget;

// Display Widget
?>

<div class="banner widget" style="background: url(<?php echo $image->get_image_src(); ?>) no-repeat center top/ cover;">
  <?php /* Display the widget title if one was input (before and after defined by themes). */
				if ( $title )
					echo '<h4 class="banner__title">' . $title . '</h4>';
				?>
  <!-- <h4 class="banner__title">Юридические консультации для малого бизнеса</h4> -->
  <!-- <p class="banner__text">Не позволяйте юридическим вопросам отвлекать вас от ведения бизнеса</p> -->
  <p class="banner__text"><?php echo $text; ?></p>
  <?php if($link_more) { ?>
  <a href="<?php echo $link_more; ?>" class="banner__btn btn">Подробнее</a>
  <?php } ?>
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
		$instance['text'] = strip_tags( $new_instance['text'] );
		$instance['link_more'] = strip_tags( $new_instance['link_more'] );
		
		$instance[$this->image_field] = (int) $new_instance[$this->image_field];

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
			'title'		=> __('Юридические консультации', 'jst'),
			'text'		=> __('Не позволяйте юридическим вопросам отделять вас от ведения бизнеса', 'jst'),
			'image'		=> "",
			'link_more'		=> "",
		);
		$instance = wp_parse_args( (array) $instance, $defaults ); 
		$image_id   = isset( $instance[$this->image_field]) ? (int) $instance[$this->image_field] : 0;
		$image      = new Jst_WidgetImageField( $this, $image_id );
	
  ?>
<p>
  <label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'jst') ?></label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>"
    name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
</p>


<p>
  <label>Image: </label>
  <?php echo $image->get_widget_field(); ?>
</p>

<p>
  <label for="<?php echo $this->get_field_id( 'link_more' ); ?>"><?php _e('Link:', 'jst') ?></label>
  <input type="text" class="widefat" id="<?php echo $this->get_field_id( 'link_more' ); ?>"
    name="<?php echo $this->get_field_name( 'link_more' ); ?>" value="<?php echo $instance['link_more']; ?>" />
</p>

<p>
  <label for="<?php echo $this->get_field_id( 'text' ); ?>"><?php _e('Posts to show:', 'jst') ?></label>
  <textarea class="widefat" cols="100" rows="5" id="<?php echo $this->get_field_id( 'text' ); ?>"
    name="<?php echo $this->get_field_name( 'text' ); ?>"><?php echo $instance['text']; ?></textarea>
</p>
<p>Чтобы сохранилась картинка в виджете, нужно ее вставлять не последней, а как минимум предпоследней, после её вставки
  заполнить или изменить любое текстовое поле и нажать ставшую активной кнопку Saved </p>
<?php
	}
}