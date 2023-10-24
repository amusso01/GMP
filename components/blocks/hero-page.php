<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */


 /*==================================================================================
   hero-block, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/

 if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
    'name'				     => 'gmp_hero-block',
    'title'				     => __('Hero page block'),
    'description'		   => __('Hero banner for any page'),
    'render_callback'	 => 'gmp_gutenblock_heroBlock',
    'supports' => [
    'align'           => ['wide', 'center', 'full'],
   ],
    'category'		     => 'gmp-category', // common, formatting, layout, widgets, embed
    'icon' => array(
           // Specifying a background color to appear with the icon e.g.: in the inserter.
           'background' => '#ff0000 ',
           // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
           'foreground' => '#000000',
           // Specifying a dashicon for the block
           'src' => 'align-full-width',
           'mode'           => 'edit',
            'align'         => 'full',
           ),
    'keywords'		     => ['gmp', 'hero-block', 'image', 'banner', 'hero-page']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_heroBlock() {
  // Get Options
  $show_breadcrumb = get_field('mostra_breadcrumb');

  $crumbs = get_the_crumbs();

  //  REMOVE EN for english version
  if (get_locale() == 'en_GB') {

    array_splice($crumbs, 0, 1);
  }

  $ingredients = array(
    'crumbs' => $crumbs,
    'root' => array(
      'slug' => 'home',
      'url' => get_home_url(),
    ),
    'separator' => '<span class="separator">→</span>',
  );


  // Get Content
  $title = get_field('titolo');
  $pageTitle = get_the_title();

  // Return HTML
  ?>
  

  <section  class="block-hero-page">
    <div class="content-block">

      <div class="block-hero-page__wrapper">
        <h1 class="title">
          <?php if($title == "") : ?>
            <?= $pageTitle ?>
          <?php else :?>
            <?= $title ?>
          <?php endif; ?>
        </h1>

      </div>
      
      <?php if($show_breadcrumb) : ?>
      <div class="hero-page__breadcrumb">
        <div class="content-block">
          <?php the_bread( $ingredients ); ?>
        </div>
      </div>
      <?php endif; ?>

    </div>
  </section>


<?php
}