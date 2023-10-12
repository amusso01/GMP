<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */


 /*==================================================================================
   image with text, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/

 if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
    'name'				     => 'gmp_image_text',
    'title'				     => __('Image with text'),
    'description'		   => __('Two columns image tewxt layout'),
    'render_callback'	 => 'gmp_gutenblock_imageText',
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
           'src' => 'analytics',
           'mode'           => 'edit',
            'align'         => 'full',
           ),
    'keywords'		     => ['gmp', 'image with text', 'image', 'carousel']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_imageText() {
  // Get Options


  // Get Content



  // Return HTML
  ?>
  

  <section  class="block-image-text">
    <div class="content-block">

      <div class="block-image-text__wrapper">


      </div>

    </div>
  </section>


<?php
}