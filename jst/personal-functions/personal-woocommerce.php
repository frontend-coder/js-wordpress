<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}

// if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

// как убрать сайдбар по умолчанию
 remove_action('woocommerce_sidebar', 'woocommerce_get_sidebar', 10);



function get_custom_sidebar() {
	get_sidebar('shop');
}

 add_action('woocommerce_sidebar', 'get_custom_sidebar', 10);

// удалил описание категории и таксономии товаром 
remove_action('woocommerce_archive_description', 'woocommerce_taxonomy_archive_description', 10);
remove_action('woocommerce_archive_description', 'woocommerce_product_archive_description', 10);

remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

// разрабоатываю карточку товара

remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5);
add_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', 15);

function jst_addwrap_product_image() {
	echo "<div class='products__img'>";
}
function jst_addwrap_product_image_close() {
	echo "</div>";
}

add_action('woocommerce_before_shop_loop_item', 'jst_addwrap_product_image', 5);
add_action('woocommerce_before_shop_loop_item_title', 'jst_addwrap_product_image_close', 15);

function jst_addwrap_before_title() {
	echo "<div class='products__bottom'>";
	echo "<div class='products__detail'>";

}
function jst_addwrap_after_price() {
	echo "</div>";
}
function jst_addwrap_after_cart() {
	echo "</div>";
}
add_action('woocommerce_shop_loop_item_title', 'jst_addwrap_before_title', 5);
add_action('woocommerce_after_shop_loop_item_title', 'jst_addwrap_after_price', 15);
add_action('woocommerce_after_shop_loop_item_title', 'jst_addwrap_after_price', 15);
add_action('woocommerce_after_shop_loop_item', 'jst_addwrap_after_cart', 15);


function jst_product_data() { 
	global $product;
	$rating_count = $product->get_rating_count();
	$average = $product->get_average_rating();
	?>
<div class="products__detail" style="width:100%">
  <a href="<?php the_permalink(); ?>" class="products__name"><?php the_title(); ?></a>
  <div class="price" style="width:100%">

    <!-- <div class="price__old" style="padding-right:10px"><span class="currency">$</span>303</div>
    <div class="price__now"><span class="currency">$</span>154</div>
 -->
    <?php echo $product->get_price_html(); ?>

  </div>
  <?php echo wc_get_rating_html( $average, $rating_count ); ?>
  <!-- <div class="rate"></div> -->
</div>

<?php
}

add_action('woocommerce_after_shop_loop_item_title', 'jst_product_data', 12);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);



//страница товара
function jst_tamplate_single_title() {
echo '<h1 class="product__title">' . the_title() . '</h1>';
}









// }