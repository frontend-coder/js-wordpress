<?php
get_header();
global $jst_options;
?>

<!-- Services -->
<section class="inner services tabs">
  <div class="wrapper">
    <h2 class="services__title secondary-title"><span>Наши</span><br>услуги</h2>
    <div class="tabs__wrap">

      <p class="tabs__descr">Вы хотите реализовать свои бизнес идеи?<br> Начало вашего нового бизнеса требует прочной
        юридической основы, и мы поможем вам на каждом этапе</p>
      <!-- Cases titles -->
      <ul class="tabs__caption">
        <?php $service_type = get_terms( array(
				'taxonomy' => 'service-type',
				'hide_empty' => true,
			) ); 
		//  	print_r($service_type);
		$i = 0;
		$active ='';		
			foreach($service_type as $type) {
			if($i == 0) {$active = 'active';} else {  $active = ''; }
				echo '<li class="'. $active . '">'. $type->name .'</li>';
				$i++; 
			}
			?>

        <!-- <li class="active">Стартапы</li>
        <li>Фриланс</li>
        <li>Малый бизнес</li> -->
      </ul>

    </div>

    <!-- Cases content one-->
    <?php
		$j = 0;
		$current = 0;
		foreach($service_type as $category) { 
			if($j == 0) {$current = 'active';} else {  $current = ''; }
			?>
    <div class="tabs__content <?php echo esc_attr( $current ); ?>">
      <ul class="services__list">
        <?php  
        // Вытягивание из переменной категори(масив) переменную slug
        $servicesmy = new WP_Query( array(
        'post_type' => 'service',
        'posts_per_page' => -1,
        'tax_query' => array(
          array(
            'taxonomy' => 'service-type',
            'field' => 'slug',
            'terms' => $category->slug ,
          ),
        ),
        ));
        if( $servicesmy->have_posts() ) :
          while(  $servicesmy->have_posts() ) :  $servicesmy->the_post(); ?>

        <?php
         $jst_service_fonitems = '';
         if(get_metadata('post', get_the_ID(), 'jst_service_fonitemss', true)) {
           $jst_service_fonitems = get_metadata('post', get_the_ID(), 'jst_service_fonitemss', true);
          } else {
           $jst_service_fonitems = 'stat'; 
          } ?>
        <li class="services__item services__item_<?php echo $jst_service_fonitems; ?>">
          <h3 class="services__heading"><?php the_title(); ?></h3>
          <p class="services__descr"><?php the_excerpt(); ?></p>
          <?php $jst_service_price = get_metadata('post', get_the_ID(), 'jst_service_price', true); 
        if($jst_service_price) { ?>
          <p class="services__price">$<?php echo $jst_service_price;  ?></p>
          <?php } ?>
          <a href="<?php the_permalink(); ?>" class="services__order btn">Подробнее</a>


          <div class="services__bg services__bg_<?php echo $jst_service_fonitems; ?>"></div>

        </li>
        <?php endwhile;
        wp_reset_postdata();
        endif;
        ?>
      </ul>
    </div>
    <?php
		$j++;					
		}	?>
    <!-- End cases content one-->
  </div>
</section><!-- End services -->

<?php
get_footer();
?>