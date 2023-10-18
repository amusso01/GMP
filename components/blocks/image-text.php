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
    'anchor' => true,
    'id' => true
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

function gmp_gutenblock_imageText($result) {
  // Get Options
  $showSlider = get_field('mostra_galleria');
  $showDownload = get_field('mostra_download');

  // Get Content
  $title = get_field('titolo');
  $body = get_field('paragrafo');
  $image = get_field('immagine_statica');
  $slider = get_field('galleria_immagini');
  $files = get_field('files');

  // Return HTML
  ?>
  

  <section  class="block-image-text"  <?= array_key_exists('anchor' ,$result) ? 'id="'.esc_attr( $result["anchor"]).'"' : '' ?> >
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
            <figure class="block-image-text__figure" 
       
          >
            <img data-sizes="auto"
              data-srcset="<?php bml_the_image_srcset($image) ?>"
              data-parent-fit="cover"
              data-aos="fade-left" 
              data-aos-easing="ease-in-sine"
              data-aos-duration="500"
              alt=""
              style="max-width: 100%; max-height: 100%;"
              class="lazyload" alt="<?= $alt_text ?>"/>
            </figure>
          <?php endif; ?>

          <?php if($showSlider) : ?>
            <h5>GALLERY</h5>
            <!-- Slider main container -->
            <div class="swiper swiper-gallery <?= count($slider) < 5 ? 'disabled' : '' ?>">
              <!-- Additional required wrapper -->
              <div class="swiper-wrapper">
                <!-- Slides -->
                <?php if(count($slider) > 0) : ?>
                <?php foreach ($slider as $pic) : ?>
                <?php $alt_text = get_post_meta($pic, '_wp_attachment_image_alt', true);?>
                <div class="swiper-slide ">
                    <a href="<?= wp_get_attachment_image_url( $pic, 'full' ) ?>" class="chocolat-image">    
                      <img data-sizes="auto"
                      data-srcset="<?php bml_the_image_srcset($pic) ?>"
                      data-parent-fit="cover"
                      style="max-width: 100%; max-height: 100%;"
                      class="lazyload" alt="<?= $alt_text ?>" />
                    </a>
                </div>
                <?php endforeach; ?>
                <?php endif ?>
              </div>

              <!-- If we need navigation buttons -->
              <div class="swiper-gallery-button-prev swiper-gallery-button"><i class="fa-solid fa-angle-left"></i></div>
              <div class="swiper-gallery-button-next swiper-gallery-button"><i class="fa-solid fa-angle-right"></i></div>
            </div>
          <?php endif; ?>

          <?php if($showDownload) : ?>
          <div class="line-grey"></div>
     
          <div class="block-text-image__download">
              <h5>DOWNLOAD</h5>
              <?php foreach($files as $file)  :?>
                <p><i class="fa-regular fa-file"></i> <a target="_blank" href="<?= $file['file']['url'] ?>"><?= $file['file']['title'] ?></a></p>
              <?php endforeach; ?>
          </div>

          <div class="line-grey"></div>
          <?php endif; ?>

        </div>



        

      </div>

    </div>
  </section>


<?php
}

