<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package foundry
 */

 get_header();


 $args = array(
	'post_type' => 'post',
	'posts_per_page' => 9,
	'order' => 'ASC'
 );
 ?>
 
 <main role="main" class="site-main single-main">

 	<?php get_template_part( 'components/page/hero-page' ); ?>

	<artilce class="single-post__wrapper">
		
		<div class="content-block">
			<figure class="post-featured-image">
				<img src="<?= get_the_post_thumbnail_url() ?>" alt="article image" />
			</figure>

			<h2 class="h4 post-title"><?= get_the_title() ?></h2>
		</div>

		<div class="single-post__body">
			<?php the_content() ?>
		</div>

	</artilce>

	
 
 </main><!-- #main -->
 
 
 <?php
 get_footer();
