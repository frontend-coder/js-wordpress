<?php 
if ( ! defined( 'ABSPATH' ) ) {
	// Replace the version number of the theme on each release.
	exit;
}
?>

<form role="search" method="get" id="searchform" action="<?php echo home_url('/'); ?>">

  <input class="text-search" name="s" type="search" value="" placeholder="Поиск">
  <input type="submit" class="submit-search" value="" />

</form>