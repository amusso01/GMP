<?php
/**
 * Template Name: Contact layout
 *
 * The template for displaying the content ina a contact container
 * 
 * Template Post Type: page
 *
 * @package Strapped
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

get_header();

$ingredients = array(
  'root' => array(
    'slug' => 'home',
    'url' => get_home_url(),
  ),
  'separator' => '<span class="separator">→</span>',
);
?>

<main class="main contact__main" role="main">
  
  <section  class="block-hero-page">
		<div class="content-block">

			<div class="block-hero-page__wrapper">
				<h1 class="title">
					<?= get_the_title() ?>
				</h1>

			</div>

      <div class="hero-page__breadcrumb">
        <div class="content-block">
          <?php the_bread( $ingredients ); ?>
        </div>
      </div>

		</div>
  </section>
  
  <?php get_template_part( 'components/page/address-map' ); ?>
  
  <?php the_content() ?>
</main>

<?php get_footer(); ?>