<?php
/**
 * The index file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @author Andrea Musso
 *
 * @package foundry
 */

 get_header();

 $args = array(
	'post_type' => 'post',
	'posts_per_page' => 6,
	'order' => 'ASC',
	'paged' => ( get_query_var('paged') ? get_query_var('paged') : 1),
 );
 ?>
 
 <main role="main" class="site-main index-main">

 	<?php get_template_part( 'components/page/hero-page' ); ?>

 	
	<div class="post__wrapper">
 		<div class="content-block">
			<div class="post__wrapper-grid">
			<?php 
				$the_query = new WP_Query( $args );

				// The Loop
				if ( $the_query->have_posts() ) :
				while ( $the_query->have_posts() ) : $the_query->the_post();

					get_template_part( 'components/cards/news-card' ); 	
					
				endwhile;
				endif;
				
				// Reset Post Data
				wp_reset_postdata();
			?>
			</div>
			<div class="pagination__wrapper">
				<?php post_pagination(); ?>
			</div>
		</div>
	</div>
	
 
 </main><!-- #main -->
 
 
 <?php
 get_footer();
 