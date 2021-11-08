<?php


if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside class="sidebar">
  <?php dynamic_sidebar( 'sidebar-2' ); ?>

</aside>