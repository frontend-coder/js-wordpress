<?php
/**
 * Product loop sale flash
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/sale-flash.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post, $product;

?>
<?php if ( $product->is_on_sale() ) {
	
	       $regular_price = (float) $product->get_regular_price(); // Regular price
         $sale_price = (float) $product->get_price(); // Active price (the "Sale price" when on-sale)
         $precision = 0; // Max number of decimals
         $saving_percentage = round( 100 - ( $sale_price / $regular_price * 100 ), $precision ) . '%';


	
//echo '<span class="discount">' . $saving_percentage . '</span>'; 
$resuilt = '<span class="discount">' . $saving_percentage . '</span>'; 
} else {
//	echo '';
$resuilt='';
}


?>
<?php if(get_post_meta(get_the_ID(), 'jst_product__stutus_title', true )) {
 $resuilt1 = '<span class="attantion">' . get_post_meta(get_the_ID(), 'jst_product__stutus_title', true) .'</span>';
}
 else  $resuilt1 = '';


$terms = get_the_terms( get_the_ID(), 'product_cat' );
foreach ( $terms as $term ){
    if ( $term->parent == 0 ) {
      // echo '<div class="parent '.$term->slug.'">' . $term->name . '</div>';
  //  print_r( $term->parent);
	 if(  $term->slug === 'akvarium-volna') {
 	$resuilt3 =  '<span class="attantion">Волна</span>';
 } elseif( $term->slug === 'pryamougolnye-akvariumy') {
 $resuilt3 =  '<span class="attantion">Прямоугольный</span>';
 }  elseif( $term->slug === 'akvariumy-krevetochniki') {
 $resuilt3 =  '<span class="attantion">Креветочник</span>';
 } 
 else {
 	$resuilt3 = '';
 }
	}  elseif ( $term->parent !== 0 ) {
// print_r( $term->parent);
	 if(  $term->slug === 'bolshoj-krevetochnik') {
 	$resuilt3 =  '<span class="attantion">Большой креветочник</span>';
	 }
		}

} 
?>
<?php
echo '<ul class="discounter">';
echo '<li>'.  $resuilt . '</li>';
echo '<li>'. $resuilt1 . '</li>';
echo '<li>'. $resuilt3 . '</li>';

echo '</ul>';


/* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */