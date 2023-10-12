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
    'name'				     => 'gmp_hero-home-block',
    'title'				     => __('Banner Image parallax'),
    'description'		   => __('A full width image with parrallax'),
    'render_callback'	 => 'gmp_gutenblock_bannerParallax',
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
    'keywords'		     => ['gmp', 'image', 'banner', 'parallax']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_bannerParallax() {
  // Get Options


  // Get Content



  // Return HTML
  ?>
  

  <section  class="block-banner-parallax">
    <div class="content-block">

      <div class="block-banner-parallax__wrapper">


      </div>

    </div>
  </section>


<?php
}