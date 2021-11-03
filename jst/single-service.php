<?php
get_header();
global $jst_options;
?>

<!-- Service -->
<section class="inner service">
  <div class="wrapper">

    <?php
		while ( have_posts() ) :
			the_post(); ?>

    <div class="inner__content">
      <h2 class="inner__title inner-title"><?php the_title(); ?></h2>
      <div class="inner__img blue-noise">
        <?php echo get_the_post_thumbnail(get_the_ID(), 'service-thumb' ); ?>
        <!-- <img src="img/service-img.jpg" alt="Корпоративное право и M&A"> -->
        <?php $innerShort = jst_get_attachment(get_post_thumbnail_id(get_the_ID())); ?>
        <p class="inner__short"> <?php echo $innerShort['description']; ?></p>
        <?php $jst_service_price = get_metadata('post', get_the_ID(), 'jst_service_price', true); 
        if($jst_service_price) {
        ?>
        <span class="inner__price">$ <?php echo $jst_service_price;  ?></span>
        <?php } ?>
      </div>
      <div class="inner__text">
        <?php the_content(); ?>

        <!-- <p>Каждая сделка рассматривается нами как уникальная и ее реализация является нашей приоритетной задачей. С
          большой степенью ответственности мы подходим к разрешению вопросов в области инкорпорации и деятельности
          компаний, акционерных соглашений, других способов структуризации отношений между участниками, иных вопросов в
          области корпоративного права.
          Мы также разрабатываем варианты по использованию институтов коллективных инвестиций для существенного снижения
          рисков рейдерского захвата и иных недружественных действий с имуществом, для оптимизации налоговой нагрузки.
        </p>
        <p>Преимуществом компании является наличие опыта решения ситуаций, прямо неурегулированных в законодательстве
          или не имеющих практики разрешения. </p>
        <p>Мы оказываем содействие в решении любой юридической задачи в вопросах слияний и поглощений, корпоративного
          права, независимо от ее сложности (консультации, аналитика, реализация сделок).</p> -->

        <?php 
          $price = get_metadata('post', get_the_ID(), 'jst_service_price', true); 
          ?>

        <a href="<?php echo home_url('/').'/oformyt-zakaz/?price='.$price.'&title='.get_the_title() ; ?>"
          class="inner__btn btn">Заказать</a>
      </div>
    </div>

    <!--
    // If comments are open or we have at least one comment, load up the comment template.
    // if ( comments_open() || get_comments_number() ) :
    // comments_template();
    // endif;
    -->
    <?php
		endwhile; // End of the loop.
		?>

    <!-- Slider -->
    <div class="cases">
      <h4 class="cases__cap">Посмотрите наши последние кейсы</h4>
      <div class="cases__slider">
        <?php

$cases = new WP_Query( array(
'post_type' => 'cases',
'post_per_page' => 4  
) );

		if ($cases->have_posts() ) :
			while ($cases->have_posts() ) : $cases->the_post(); ?>


        <div class="cases__slide">
          <div class="cases__item">
            <div class="cases__block">
              <h3 class="cases__heading"><?php the_title(); ?></h3>
              <a href="<?php the_permalink(); ?>" class="cases__link link-more">
                <?php esc_html_e('Читать больше', 'jst') ?>
                <svg width="18" height="20">
                  <use xlink:href="#nav-right" />
                </svg>
              </a>
            </div>
            <div class="cases__img">
              <?php echo get_the_post_thumbnail( get_the_ID(), 'case-thumb'  ); ?>
              <!-- <img src="img/case4.jpg" alt="Изображение"> -->
            </div>
          </div>
        </div>

        <?php endwhile;
    wp_reset_postdata();
		endif;
		?>
      </div>
    </div>

  </div>
</section><!-- End slider -->
<?php
get_footer();
?>