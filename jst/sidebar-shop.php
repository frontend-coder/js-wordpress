<?php


if ( ! is_active_sidebar( 'sidebar-shop' ) ) {
	return;
}
?>

<aside class="sidebar">
  <?php dynamic_sidebar( 'sidebar-shop' ); ?>
</aside>