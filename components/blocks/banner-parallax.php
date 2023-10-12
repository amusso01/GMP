<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */


 /*==================================================================================
   banner-parallax, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/

 if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
    'name'				     => 'gmp_banner_image_parallax',
    'title'				     => __('Hero homepage block'),
    'description'		   => __('Hero banner for the homepage'),
    'render_callback'	 => 'gmp_gutenblock_heroBlockHome',
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
    'keywords'		     => ['gmp', 'banner-parallax', 'image', 'banner', 'carousel']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_heroBlockHome() {
  // Get Options


  // Get Content



  // Return HTML
  ?>
  

  <section  class="block-hero-home">
    <div class="content-block">

      <div class="block-hero-home__wrapper">


      </div>

    </div>
  </section>


<?php
}