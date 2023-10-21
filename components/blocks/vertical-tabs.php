<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */


 /*==================================================================================
   Vertical tabs, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/

 if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
    'name'				     => 'gmp_vertical_tabs',
    'title'				     => __('Vertical tabs'),
    'description'		   => __('Tabs with info'),
    'render_callback'	 => 'gmp_gutenblock_verticalTabs',
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
    'keywords'		     => ['gmp', 'Vertical tabs', 'tabs']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_verticalTabs($result) {
  // Get Options

  // Get Content
  $tabs = get_field('tabs');

  // Return HTML
  ?>
  <script src="//unpkg.com/alpinejs" defer></script>


  <section  class="block-verticalTabs"  <?= array_key_exists('anchor' ,$result) ? 'id="'.esc_attr( $result["anchor"]).'"' : '' ?> >
    <div class="content-block">


      <div 
        x-data="{ 
          activeTab: 0,
          active: 'active',
          inactive: 'inactive',
          isMobile: false
        }" 

        x-init="window.matchMedia('(max-width: 920px)').matches ? isMobile=true : isMobile=false"

        class="tab-grid"
      >
        <ul class="tab-nav"   role="tablist">
          <?php foreach($tabs as $key=>$tab) : ?>
          <li @click="isMobile ? document.getElementById('tabPanel').scrollIntoView({ behavior: 'smooth'}) : ''" >
            <button id="tab-nav-<?= $key ?>" aria-controls="tab-<?= $key ?>" role="tab" @click.prevent="activeTab = <?= $key ?>"  :class="activeTab === <?= $key ?> ? active : inactive" class="tab-nav__btn">
              <?= $tab['titolo']; ?>
            </button>
          </li>
          <?php endforeach; ?>
        </ul>
    
        <div class="tab-panel" id=tabPanel>
          <?php foreach($tabs as $key=>$tab) : ?>
            <div 
              role="tabpanel"
              x-show="activeTab === <?= $key ?>"
              x-transition:enter.duration.500ms
              x-transition:leave.duration.700ms
              x-transition:leave.scale.0
              x-transition:leave.opacity.0

              id="tab-<?= $key ?>"
              aria-labelledby="tab-nav-<?= $key ?>"
            > 
              <!-- Slider main container -->
              <div class="swiper swiper-tab <?= count($tab['immagini']) <= 1 ? 'disabled' : '' ?>"> 
                <!-- Additional required wrapper -->
                <div class="swiper-wrapper">
                  <?php if(count($tab['immagini']) > 0) : ?>
                  <?php foreach ($tab['immagini'] as $pic) : ?>
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

              <div class="tab-paragraph">
                <?= $tab['paragrafo'] ?>
              </div>
            </div>
          
          <?php endforeach; ?>
        </div>
		  </div>


    </div>
  </section>


<?php
}

?>

