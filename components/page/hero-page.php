<?php
/**
 * Hero for page
 *
 * @author      Andrea Musso
 *
 *
 */


$ingredients = array(
  'root' => array(
    'slug' => 'home',
    'url' => get_home_url(),
  ),
  'separator' => '<span class="separator">→</span>',
);
?>

  <section  class="block-hero-page">
    <div class="content-block">

      <div class="block-hero-page__wrapper">
        <h1 class="title">
         <?php single_post_title() ?>
        </h1>

      </div>
      
 
      <div class="hero-page__breadcrumb">
        <div class="content-block">
          <?php the_bread( $ingredients ); ?>
        </div>
      </div>
 

    </div>
  </section>

