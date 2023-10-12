<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package foundry
 */

get_header(); ?>

<?php 
 $ingredients = array(
	'root' => array(
		'slug' => 'home',
		'url' => get_home_url(),
	),
	'separator' => '<span class="separator">→</span>',
);
?>

<main class="main main-error" role="main">

	<section  class="block-hero-page">
		<div class="content-block">

			<div class="block-hero-page__wrapper">
				<h1 class="title">
					404
				</h1>

				<h2 class="page-title error-title"><?php esc_html_e( 'Content Cannot Be Found', 'foundry' ); ?></h2>

			</div>

		</div>
  </section>


	<section class="content-block" id="section-error-page">


		<div class="page-body error-body">

			<p><?php esc_html_e( 'Unfortunately the content you were looking for could not be found. Please check that the URL is correct or go back to ' , 'gmp' ); ?><a href="<?= site_url('/') ?>">Homepage.</a></p>


		</div>

	</section>

</main>

<?php get_footer(); ?>