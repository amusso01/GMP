<?php
/**
 * Hero for page
 *
 * @author      Andrea Musso
 *
 *
 */

 $crumbs = get_the_crumbs();

  // REBUILD BREADCRUMB IF IS PAGINATION
  if(is_paged(  )){
    array_splice($crumbs, 0);
    array_push( $crumbs,
          array(
              'slug' => 'news',
              'url' => site_url( '/news' ),
          )
    );
  }
  //  TODO ADD NEWS IF IS SINGULAR
  if(is_singular( 'post' )){
   

  }

$ingredients = array(
  'crumbs' => $crumbs,
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

