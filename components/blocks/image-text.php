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
  $showSlider = get_field('mostra_galleria');

  // Get Content
  $title = get_field('titolo');
  $body = get_field('paragrafo');
  $image = get_field('immagine_statica');
  $slider = get_field('galleria_immagini');


  // Return HTML
  ?>
  

  <section  class="block-image-text">
    <div class="content-block">

      <div class="block-image-text__wrapper">

        <div class="block-image-text__body">
          <h2 class="underline"><?= $title ?></h2>
          <div class="paragraph">
            <?= $body ?>
          </div>
        </div>

        <div class="block-image-text__pictures <?= $showSlider ? '' : 'align-center' ?>">
          <?php if($image): ?>
            <?php $alt_text = get_post_meta($image , '_wp_attachment_image_alt', true);?>
            <figure class="block-image-text__figure">
            <img data-sizes="auto"
              data-srcset="<?php bml_the_image_srcset($image) ?>"
              data-parent-fit="cover"
              alt=""
              style="max-width: 100%; max-height: 100%;"
              class="lazyload" alt="<?= $alt_text ?>"/>
            </figure>
          <?php endif; ?>

          <?php if($showSlider) : ?>
            <h5>GALLERY</h5>
            <!-- Slider main container -->
            <div class="swiper swiper-gallery">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <?php foreach ($slider as $pic) : ?>
                <?php $alt_text = get_post_meta($pic, '_wp_attachment_image_alt', true);?>
                <div class="swiper-slide">
                    <img data-sizes="auto"
                    data-srcset="<?php bml_the_image_srcset($pic) ?>"
                    data-parent-fit="cover"
                    style="max-width: 100%; max-height: 100%;"
                    class="lazyload" alt="<?= $alt_text ?>" />
                </div>
                <?php endforeach; ?>
              </div>

              <!-- If we need navigation buttons -->
              <div class="swiper-gallery-button-prev swiper-gallery-button"><i class="fa-solid fa-angle-left"></i></div>
              <div class="swiper-gallery-button-next swiper-gallery-button"><i class="fa-solid fa-angle-right"></i></div>
            </div>
          <?php endif; ?>
     
        </div>

        

      </div>

    </div>
  </section>


<?php
}