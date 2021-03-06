<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package jstheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="https://gmpg.org/xfn/11">

  <?php wp_head(); ?>


  <div class="svg-placeholder" style="display: none;"></div>
  <script>
  document.querySelector('.svg-placeholder').innerHTML = SVG_SPRITE;
  </script>

</head>

<body <?php  body_class(); ?>>
  <?php wp_body_open(); ?>
  <?php 
 global $jst_options;
 $class_header = '';
$style_header = '';
if(is_page_template('template-home.php')) {
$class_header = 'header-home';
$style_header = 'style="background: #fff url('. $jst_options['headerslider_fone']['url'] .') no-repeat
  center top/ cover;"';
  } else {
  $class_header = 'header-inner';
  $style_header = '';

  }

  ?>

  <!-- Header -->
  <header class="header <?php echo esc_attr( $class_header ); ?>" <?php echo $style_header; ?>>

    <div class="heading">
      <ul class="social">
        <?php $socials_link = $jst_options['global_sortable1'];
       // print_r( $socials_link );
foreach($socials_link as $social=> $link) {
$icon_social = ''; 
  $svg = '';
  $class = '';
  if($social == 'VK Link') {
  $icon_social = '<span>Vk</span>'; 
  $svg = '<svg  width="21" height="18"><use xlink:href="#vk"/></svg>'; 
  $class = 'social__icon_vk';
} elseif($social == 'FB Link') {
  $icon_social = '<span>Fb</span>'; 
   $svg = '<svg  width="14" height="17"><use xlink:href="#facebook"/></svg>'; 
$class = 'social__icon_fb';
  }
elseif($social == 'TW Link') {
  $icon_social = '<span>Tw</span>'; 
 $svg = '<svg  width="18" height="15"><use xlink:href="#twitter"/></svg>'; 
$class = 'social__icon_tw';
}
elseif($social == 'Instagram Link') {
  $icon_social = '';
  $class= 'social__icon_inst';
 $svg = '<svg width="16" height="16"><use xlink:href="#instagram"/></svg>'; 
}
// ???????? ???????????? ??????: ?????????? ?????? ????????????????????
 if($link) { ?>
        <li class="social__item">
          <?php echo $icon_social; ?>
          <a class="social__icon <?php echo $class; ?>" target="_blank" href="<?php echo $link; ?>">
            <?php echo $svg; ?>
          </a>
        </li>
        <?php
}
}
   ?>
      </ul>
      <div class="heading__block">
        <a href="cart.html" class="heading__bag">
          <svg width="17" height="20">
            <use xlink:href="#bag" />
          </svg>
        </a>
        <div class="language">
          <ul>
            <li class="lang-item active">
              <a href="#">Ru</a>
            </li>
            <li class="lang-item">
              <a href="#">En</a>
            </li>
          </ul>
        </div>
      </div>
      <div class="control">
        <a href="#enter" class="control__enter popup-link-1">
          <svg class="control__icon" width="19" height="17">
            <use xlink:href="#login" />
          </svg>
          ????????
        </a>
        <a style="display: none;" href="cabinet.html" class="control__enter control__enter_cab">
          <svg class="control__icon" width="16" height="16">
            <use xlink:href="#user" />
          </svg>
          ???????????? ??????????????
        </a>
        <a href="#reg" class="control__reg noise popup-link-2">??????????????????????</a>
      </div>
    </div>

    <div class="navigation">
      <div class="logo noise">
        <p class="logo__icon"><?php bloginfo('name'); ?></p>
        <p class="logo__desc"><?php bloginfo('description'); ?></p>
      </div>

      <div class="navigation__wrap">
        <?php $jstOptionsGet = $jst_options['contact_phone'];        
        if ( $jstOptionsGet ) { ?>
        <a href="tel:<?php echo str_replace(array( " ", "(", ")", "-"), "", $jstOptionsGet ); ?>"
          class="call popup-link-1">
          <div class="call__icon btn">
            <svg width="22" height="22">
              <use xlink:href="#phone-solid" />
            </svg>
          </div>
          <div class="call__block">
            <p class="call__text">???????????????? ????????????</p>
            <p class="call__number"><?php echo $jstOptionsGet; ?></p>
          </div>
        </a>
        <?php } ?>
        <!-- Main menu -->
        <nav id="nav-wrap" class="menu">

          <a class="mobile-btn" href="#nav-wrap"
            title="<?php esc_html_e('Show navigation', 'jst'); ?>"><?php esc_html_e('Show navigation', 'jst'); ?></a>
          <a class="mobile-btn" href="#"
            title="<?php esc_html_e('Hide navigation', 'jst'); ?>"><?php esc_html_e('Hide navigation', 'jst'); ?> </a>

          <!-- <ul id="nav" class="menu__list">
            <li class="active"><a href="index.html">??????????????</a></li>
            <li><a href="about.html">?? ????????????????</a></li>
            <li><span><a href="services.html">????????????</a></span>
              <ul>
                <li><a href="service.html">?????????????????????????? ????????????????, M&A</a></li>
                <li><a href="service.html">???????????????????????????????? ??????????????????????????</a></li>
                <li><a href="service.html">????????????????-???????????? ?? ???????????????? ??????????????????</a></li>
                <li><a href="service.html">???????????????????????????? ???????????????????? / TMT</a></li>
                <li><a href="service.html">Government Relations</a></li>
                <li><a href="service.html">???????????????????????? ????????????????</a></li>
              </ul>
            </li>
            <li><a href="reviews.html">????????????</a></li>
            <li><a href="contacts.html#">????????????????</a></li>
            <li><a href="market.html">??????????????</a></li>
          </ul> -->

          <!-- // .current-menu-item => .active  -->
          <!-- // li.menu-item-has-children => .active  -->

          <?php wp_nav_menu( array(
  'theme_location' => 'menu-1',
  'menu_id' =>'nav',
  'menu_class' =>'menu__list',
)); ?>

        </nav><!-- End main menu -->

        <div class="widget widget_search">
          <?php echo get_search_form(); ?>
          <!-- <form role="search" method="get" id="searchform" action="#">

            <input class="text-search" type="search" value="" placeholder="??????????">
            <input type="submit" class="submit-search" value="" />

          </form>
         -->
        </div>
      </div>

    </div>

    <?php if(is_page_template( 'template-home.php' )) { ?>
    <div class="offer">
      <div class="wrapper">
        <div class="offer__slider">
          <?php $homeSliders = $jst_options['home_sliders'];
          
        //  print_r($homeSliders);
          
          foreach($homeSliders as $homeSlider) { ?>
          <div class="offer__slide">
            <p class="offer__text"> <?php echo $homeSlider['title']; ?></p>
            <?php echo $homeSlider['description']; ?>
            <a href="<?php echo $homeSlider['url']; ?>" class="offer__btn btn popup-link">
              <?php esc_html_e(' ???????????????????? ???????????????????????? ', 'jst'); ?> </a>
          </div>
          <?php } ?>

        </div>
        <?php $header_slider_urlvideo = esc_url($jst_options['header_slider_urlvideo'] );
        if($header_slider_urlvideo) {
        ?>
        <a class="offer__video popup-with-zoom-anim popup-youtube" href="<?php echo $header_slider_urlvideo;  ?>"
          rel="nofollow">
          <?php } ?>
          <?php $header_slider_duration = esc_url($jst_options['header_slider_Duration'] );
        $header_slider_title = esc_attr($jst_options['header_slider_title'] );
          if($header_slider_duration || $header_slider_title) {
          ?>
          <p class="offer__time"><?php echo $header_slider_duration; ?></p>
          <div class="offer__play"></div>
          <p class="offer__watch"><?php echo $header_slider_title; ?></p>
          <?php } ?>
        </a>
      </div>
    </div>
    <?php } else { ?>
    <div class="caption">
      <div class="wrapper">
        <h1 class="caption__title">
          <?php
        
         if( is_single() ) {   

         $currentPostType = get_post_type( get_the_ID() );
         // echo $currentPostType;
          $postTypeObject = get_post_type_object($currentPostType);
        //  print_r($postTypeObject);
        echo $postTypeObject->labels->singular_name;
         } elseif( is_tax() ) {
           $currentPostType = get_post_type( get_the_ID() );
         // echo $currentPostType;
          $postTypeObject = get_post_type_object($currentPostType);
        //  print_r($postTypeObject);
        echo $postTypeObject->labels->name;
         } else {
          echo wp_title(''); 

         }
        
        ?>
        </h1> <!--  // ?????????????????? ???????????????? -->

        <?php echo jst_get_breadcrumbs(); ?>
        <!-- <div class="caption__bc">
           <span>
            <a href="index.html">??????????????</a>
          </span>
          <span class="sep">/</span>
          <span class="current">????????????????</span> -->
      </div>
    </div>
    </div>
    <?php } ?>


  </header><!-- End header -->