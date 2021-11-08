<?php
get_header();
global $jst_options;
?>



<section class="inner clients">
  <div class="wrapper">
    <?php $custom_recall_title = $jst_options['custom_recall_title'];
     $custom_recall_descr = $jst_options['custom_recall_descr'];

if( $custom_recall_title ||  $custom_recall_descr ) {
?> <h2 class="clients__title secondary-title">
      <span><?php echo esc_attr( $custom_recall_descr); ?></span><br><?php echo esc_attr( $custom_recall_title); ?>
    </h2>
    <?php
}
  $paged =(get_query_var('paged')) ? get_query_var('paged') : 1;

$recalls = new WP_Query( array(
  'post_type' => 'recall',
  'paged' => $paged 
));



		if ($recalls->have_posts() ) :
			while ($recalls->have_posts() ) : $recalls->the_post(); ?>


    <div class="clients__box">
      <div class="clients__photo">
        <div class="clients__img">
          <?php echo get_the_post_thumbnail( get_the_ID(), 'recall-thumb'  ); ?>
        </div>

        <?php $jst_social_link = get_metadata('post', get_the_ID(), 'jst_social_link', true); 
        if($jst_social_link) {
        ?>
        <a href="<?php echo esc_url( $jst_social_link ); ?>" class="clients__link">
          <svg width="14" height="17">
            <use xlink:href="#facebook" />
          </svg>
        </a>
        <?php } ?>
      </div>
      <div class="clients__say">
        <p class="clients__name"><?php the_title(); ?></p>
        <div class="clients__text">
          <?php the_content (); ?>
        </div>
      </div>
      <?php $jst_social_date = get_metadata('post', get_the_ID(), 'jst_social_daterecall', true); 
        if($jst_social_date) {
        ?>
      <div class="add-time">
        <svg width="13" height="13">
          <use xlink:href="#time" />
        </svg>
        <p class="add-time__date"><?php echo esc_attr( $jst_social_date ); ?></p>
      </div>
      <?php } ?>

    </div>

    <?php endwhile;
    wp_reset_postdata();
			else :
			echo '<div>Нет отзывов на сайте </div> ';
		endif;
		?>
    <?php if( $recalls->max_num_pages > 1  ) { ?>
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
	'total'   => $recalls->max_num_pages,
'prev_text' => '',
'next_text' => '',

));
?>
        <?php if(  get_query_var( 'paged' ) == $recalls->max_num_pages ) { ?>
        <span class="next page-numbers"></span>
        <?php
}
?>
      </div>
    </nav>
    <?php } ?>

    <!-- <nav class="pagination">
      <div class="nav-links">
        <a href="#" class="prev page-numbers"></a>
        <a href="#" class=" page-numbers">1</a>
        <span href="#" class="current page-numbers">2</span>
        <a href="#" class="page-numbers">3</a>
        <a href="#" class="page-numbers">4</a>
        <a href="#" class="page-numbers">5</a>
        <span class="page-numbers page-break">...</span>
        <a href="#" class=" page-numbers">7</a>
        <a href="#" class="next page-numbers"></a>
      </div>
    </nav> -->




    <div class="clients__form-block">

      <?php $shotcode = $jst_options['custom_recall_shotcod_form'];
      echo do_shortcode($shotcode);
      ?>

      <!-- <form action="#" class="log clients__form review-form" id="popupMessage">
        <p class="log__title">Оставьте ваш отзыв</p>
        <div class="log__wrap">
          <div class="log__group">
            <label>Имя</label>
            <input type="text" name="name" class="log__input">
          </div>
          <div class="log__group">
            <label>Email</label>
            <input type="email" name="email" class="log__input">
          </div>
          <div class="log__group">
            <label>Телефон</label>
            <input type="tel" name="tel" class="log__input">
          </div>
          <div class="log__group log__group_socials">
            <label>Ссылка на соцсеть</label>
            <input type="text" name="social" class="log__input">
          </div>
          <div class="log__group log__group_textarea">
            <label>Ваш отзыв</label>
            <textarea type="text" name="message" class="log__input"></textarea>
          </div>
          <p class="log__line"><span>*</span>Поля обязательные для заполнения</p>
          <div class="log__btn">
            <input id="send" type="submit" data-submit value="Отправить" class="btn" />
          </div>
        </div>
      </form> -->

    </div>
  </div>
</section>

<?php
get_footer();
?>
