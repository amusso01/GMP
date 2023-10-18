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
    'name'				     => 'gmp_banner-parallax',
    'title'				     => __('Banner Image parallax'),
    'description'		   => __('A full width image with parrallax'),
    'render_callback'	 => 'gmp_gutenblock_bannerParallax',
    'supports' => [
    'align'           => ['wide', 'center', 'full'],
    'anchor' => true,
   ],
    'category'		     => 'gmp-category', // common, formatting, layout, widgets, embed
    'icon' => array(
           // Specifying a background color to appear with the icon e.g.: in the inserter.
           'background' => '#ff0000 ',
           // Specifying a color for the icon (optional: if not set, a readable color will be automatically defined)
           'foreground' => '#000000',
           // Specifying a dashicon for the block
           'src' => 'cover-image',
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
  $height= get_field('altezza');

  // Get Content
  $bgimage = get_field('immagine_di_background')
  // Return HTML
  ?>
  

  <section  class="block-banner-parallax" >

      <div class="block-banner-parallax__wrapper parallax" style="background-image: url(<?= $bgimage ?>); height:<?= $height ?>px">

      </div>

  </section> 


<?php
}