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


  // Get Content



  // Return HTML
  ?>
  

  <section  class="block-hero-page">
    <div class="content-block">

      <div class="block-hero-page__wrapper">


      </div>

    </div>
  </section>


<?php
}