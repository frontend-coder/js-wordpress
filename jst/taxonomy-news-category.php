<?php
get_header();
global $wp_query;
?>


<!-- Service -->
<section class="inner events">
  <div class="wrapper">
    <div class="news">
      <h2 class="news__title secondary-title"><span>Категория</span>
        <br><?php echo single_term_title(); ?>
      </h2>
      <?php

		if (have_posts() ) :
			while (have_posts() ) : the_post(); ?>
      <!-- One new -->
      <article class="news__item">
        <div class="news__wrap">
          <div class="news__img blue-noise">
            <?php echo get_the_post_thumbnail( get_the_ID(), 'litlenews-thumb'  ); ?>
            <!-- <img src="img/photo1.jpg" alt="Изображение"> -->
            <ul class="tags-list">
              <?php $news_type = wp_get_post_terms(get_the_ID(), 'news-category' ); 
		//  	print_r($news_type);
			foreach($news_type as $type) {
				echo '<li><a href="'. get_term_link($type) .'"> '. $type->name .'</a></li>';
				 
			}
			?>
              <!-- <li><a href="#">Бизнес</a></li>
              <li><a href="#">Социальная сфера</a></li> -->
            </ul>
          </div>
          <div class="news__side">
            <div class="add-time">
              <svg width="13" height="13">
                <use xlink:href="#time" />
              </svg>
              <p class="add-time__date"><?php echo get_the_date(); ?></p>
            </div>
            <div class="rate"></div>
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
                  <a data-social="vkontakte"
                    onclick="window.open(this.href, 'Share on VK', 'width=600,height=300');return false"
                    class="social__icon social__icon_vk"
                    href="<?php echo jst_get_share('vk', get_the_permalink(), get_the_title() ); ?>">
                    <svg width="21" height="18">
                      <use xlink:href="#vk" />
                    </svg>
                  </a>
                </li>
                <li class="social__item">
                  <span>Fb</span>
                  <a data-social="facebook"
                    onclick="window.open(this.href, 'Share on Facebook', 'width=600,height=300');return false"
                    class="social__icon social__icon_fb"
                    href="<?php echo jst_get_share('fb', get_the_permalink(), get_the_title() ); ?>">
                    <svg width="14" height="17">
                      <use xlink:href="#facebook" />
                    </svg>
                  </a>
                </li>
                <li class="social__item">
                  <span>Tw</span>
                  <a data-social="twitter"
                    onclick="window.open(this.href, 'Share on Twitter', 'width=600,height=300');return false"
                    class="social__icon social__icon_tw"
                    href="<?php echo jst_get_share('twi',get_the_permalink(), get_the_title() ); ?>">
                    <svg width="18" height="15">
                      <use xlink:href="#twitter" />
                    </svg>
                  </a>
                </li>
              </ul>
            </div>
            <a href="<?php the_permalink(); ?>" class="news__link link-more">
              Читать больше
              <svg width="18" height="20">
                <use xlink:href="#nav-right" />
              </svg>
            </a>
          </div>
        </div>
        <h5 class="news__heading"><?php the_title(); ?></h5>
        <div class="news__text"><?php the_excerpt(); ?></div>
      </article><!-- End one new -->
      <?php endwhile;
    wp_reset_postdata();
			else :
			echo '<div>Нет новостей на сайте </div> ';
		endif;
		?>


      <!-- Pagination -->
      <?php if( $wp_query->max_num_pages > 1  ) { ?>
      <nav class="pagination">
        <div class="nav-links">
          <?php if(  get_query_var( 'paged' ) == 0 ) { ?>
          <span class="prev page-numbers"></span>
          <?php
}
?>
          <?php
$big = 999999999;
echo paginate_links( array(
  'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link( $big) ) ),
	'format' => '?paged=%#%', 
  'current' => max( 1, get_query_var( 'paged' ) ),
	'total'   => $wp_query->max_num_pages,
'prev_text' => '',
'next_text' => '',

));
?>
          <?php if(  get_query_var( 'paged' ) == $wp_query->max_num_pages ) { ?>
          <span class="next page-numbers"></span>
          <?php
}
?>
        </div>
      </nav>
      <?php } ?>

    </div>


    <?php
get_sidebar();
?>


  </div>
</section>

<?php
get_footer();
?>
