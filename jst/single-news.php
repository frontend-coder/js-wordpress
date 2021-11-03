<?php
get_header();
?>

<?php
		while ( have_posts() ) : the_post(); ?>

<!-- Service -->
<section class="single event">

  <div class="event-top"
    style="background: #fff url(<?php echo wp_get_attachment_url(get_post_thumbnail_id(get_the_ID())); ?>) no-repeat center top/ cover;">
    <div class="wrapper">
      <div class="event-top__wrap">
        <div class="add-time">
          <svg width="13" height="13">
            <use xlink:href="#time" />
          </svg>
          <p class="add-time__date"><?php the_date(); ?></p>
        </div>
        <div class="rate"></div>
      </div>
      <h1 class="event-top__title">
        <?php the_title(); ?>
      </h1>
      <ul class="tags-list">
        <!-- <li><a href="#">Судебная практика</a></li>
        <li><a href="#">Социальная сфера</a></li> -->
        <?php $news_type = wp_get_post_terms(get_the_ID(), 'news-category' ); 
		//  	print_r($news_type);
			foreach($news_type as $type) {
				echo '<li><a href="'. get_term_link($type) .'"> '. $type->name .'</a></li>';
				 
			}
			?>
      </ul>
    </div>
  </div>
  <div class="wrapper">
    <div class="event__content">
      <?php the_content(); ?>
      <div class="event__wrap">
        <div class="share">
          <p class="share__title">
            <svg width="15" height="15">
              <use xlink:href="#link" />
            </svg>
            Поделиться:
          </p>
          <ul class="social">
            <li class="social__item">
              <span>Vk</span>
              <a data-social="vkontakte" class="social__icon social__icon_vk" href="<?php echo jst_get_share('vk'); ?>">
                <svg width="21" height="18">
                  <use xlink:href="#vk" />
                </svg>
              </a>
            </li>
            <li class="social__item">
              <span>Fb</span>
              <a data-social="facebook" class="social__icon social__icon_fb" href="<?php echo jst_get_share('fb'); ?>">
                <svg width="14" height="17">
                  <use xlink:href="#facebook" />
                </svg>
              </a>
            </li>
            <li class="social__item">
              <span>Tw</span>
              <a data-social="twitter" class="social__icon social__icon_tw" href="<?php echo jst_get_share('twi'); ?>">
                <svg width="18" height="15">
                  <use xlink:href="#twitter" />
                </svg>
              </a>
            </li>
          </ul>
        </div>

        <ul class="event__nav">
          <?php
        $prev_post = get_previous_post();
        if(!empty( $prev_post )) : ?>

          <li class="prev">
            <a href="<?php echo esc_url( get_permalink($prev_post->ID) ); ?>">
              <!-- <?php echo esc_attr($prev_post->post_title ); ?> -->
              Предыдущий
            </a>
          </li>
          <?php endif;?>

          <?php
        $next_post = get_next_post();
        if(!empty( $next_post )) : ?>
          <li class="next">
            <a href="<?php echo esc_url( get_permalink($next_post->ID) ); ?>">
              <!-- <?php echo esc_attr($next_post->post_title ); ?>  -->
              Следующий
            </a>
          </li>
          <?php endif;?>

        </ul>

      </div>
    </div>

    <?php get_sidebar(); ?>

  </div>
</section>
<?php
		endwhile; // End of the loop.
		?>

<?php
get_footer();
?>