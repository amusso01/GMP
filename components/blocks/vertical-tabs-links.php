<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */


 /*==================================================================================
   Vertical tabs links, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/

 if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
    'name'				     => 'gmp_vertical_tabs_link',
    'title'				     => __('Vertical tabs links per lingua EN'),
    'description'		   => __('Tabs with info with links'),
    'render_callback'	 => 'gmp_gutenblock_verticalTabsLinks',
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
           'src' => 'align-pull-left',
           'mode'           => 'edit',
            'align'         => 'full',
           ),
    'keywords'		     => ['gmp', 'Vertical tabs links', 'tabs']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_verticalTabsLinks($result) {
  // Get Options

  // Get Content
  $tabs = get_field('tabs');
  $paragrafo = get_field('paragrafo');
  $immagini = get_field('immagini');

  $pageTitle = get_the_title();

  // Return HTML
  ?>
  <script src="//unpkg.com/alpinejs" defer></script>


  <section  class="block-verticalTabs block-verticalTabs-links"  >
    <div class="content-block">


      <div 
        x-data="{ 
          isMobile: false
        }" 

        x-init="window.matchMedia('(max-width: 920px)').matches ? isMobile=true : isMobile=false"

        class="tab-grid active"
      >
        <ul class="tab-nav" >
          <?php foreach($tabs as $key=>$tab) : ?>
          <li>
            <a id="tab-nav-<?= $key ?>" href="<?= $tab['link'] ?>" class="tab-nav__btn <?= $pageTitle == $tab['titolo'] ? 'active' : 'inactive' ?>">
              <?= $tab['titolo']; ?>
            </a>
          </li>
          <?php endforeach; ?>
        </ul>

        <div class="tab-panel" id=tabPanel>
            <div > 
              <h2 class="underline"><?= get_the_title() ?></h2>

              <div class="tab-paragraph">
                <?= $paragrafo?>
              </div>

               <!-- Slider main container -->
               <div class="swiper swiper-tab <?= count($immagini) <= 1 ? 'disabled' : '' ?>"> 
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                
                  <?php if(count($immagini) > 0) : ?>
                  <?php foreach ($immagini as $pic) : ?>
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

                <!-- If we need navigation buttons -->
                <div class="swiper-tab-button-prev swiper-tab-button"><i class="fa-solid fa-angle-left"></i></div>
                <div class="swiper-tab-button-next swiper-tab-button"><i class="fa-solid fa-angle-right"></i></div>
              </div> 
            </div>
        </div>
    
       
		  </div>


    </div>
  </section>


<?php
}

?>

