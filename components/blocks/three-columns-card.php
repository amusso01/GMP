<?php
/**
 * Requires ACF Version 5.8+
 *
 * @author      Andrea Musso
 *
 *
 */


 /*==================================================================================
   3 column cards, Preset ACF Gutenberg Block
 ==================================================================================*/

 /* Register ACF Block
 /––––––––––––––––––––––––*/

 if( function_exists('acf_register_block') ) {

  $result = acf_register_block(array(
    'name'				     => 'gmp_cards',
    'title'				     => __('3 column cards'),
    'description'		   => __('Cards with image text and link in a 3 columns layout'),
    'render_callback'	 => 'gmp_gutenblock_cardsColumn',
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
           'src' => 'images-alt2',
           'mode'           => 'edit',
            'align'         => 'full',
           ),
    'keywords'		     => ['gmp', '3 column cards', 'image', 'cards']
  ));
}

/* Render Block
/––––––––––––––––––––––––*/

function gmp_gutenblock_cardsColumn() {
  // Get Options

  // Get Content
  $cards = get_field('cards');


  // Return HTML
  ?>
  

  <section  class="block-cards-columns">
    <div class="content-block">

      <div class="block-cards-columns__wrapper">

        <?php  foreach($cards as $card) : ?>
          <?php $alt_text = get_post_meta($card['immagine'] , '_wp_attachment_image_alt', true);?>
          <article class="single-card">
            <figure class="single-card__img-wrapper">
              <img data-sizes="auto"
                data-srcset="<?php bml_the_image_srcset($card['immagine']) ?>"
                data-parent-fit="cover"
                style="max-width: 100%; max-height: 100%;"
                class="lazyload" alt="<?= $alt_text ?>" />
                <h3 class="single-card__title">
                  <a href="<?= $card['link']['url'] ?>" 
                    data-aos="fade-up"
                    data-aos-duration="600"
                  >
                    <?= $card['titolo'] ?>
                  </a>
                </h3>
            </figure>

            <div class="single-card__body">
              <div class="line"></div>
              <p><?= $card['paragrafo'] ?></p>
              <a href="<?= $card['link']['url'] ?>" class="single-card__link"><?= $card['link']['title'] ?></a>
            </div>
          </article>
        <?php endforeach; ?>

      </div>

    </div>
  </section>


<?php
}

