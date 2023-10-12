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
    'name'				     => 'gmp_hero-homepage',
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
           'src' => 'format-gallery',
           'mode'           => 'edit',
            'align'         => 'full',
           ),
    'keywords'		     => ['gmp', 'hero', 'image', 'banner', 'carousel', 'home']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_heroBlockHome() {
  // Get Options

  // Get Content
  $images = get_field('immagini_del_carosello');



  // Return HTML
  ?>
  

  <section  class="block-hero-home">

    <div class="block-hero-home__wrapper">

       <!-- Slider main container -->
      <div class="swiper swiper-hero-home">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
          <!-- Slides -->
          <?php foreach ($images as $image) : ?>
          <div class="swiper-slide">
            <figure>
              <img data-sizes="auto"
              data-srcset="<?php bml_the_image_srcset($image['immagine']) ?>"
              data-parent-fit="cover"
              style="max-width: 100%; max-height: 100%;"
              class="lazyload" alt="author image" />
            </figure>
          </div>
          <?php endforeach; ?>
        </div>


        <!-- If we need navigation buttons -->
        <button role="button" class="swiper-button-prev swiper-button"></button>
        <button role="button" class="swiper-button-prev swiper-button"></button>

      </div>

  </div>

  </section>

<?php
}