<?php
get_header();
?>

<?php
		if ( have_posts() ) :
			while ( have_posts() ) : 	the_post();
				get_template_part( 'template-parts/content', get_post_type() );
			endwhile;
			the_posts_navigation();
		else :
			echo "Нет отзывов на сайте ";
		endif;
		?>



<?php
get_footer();
?>