<?php
/**
 * Single Card 
 *
 * @author      Andrea Musso
 *
 *
 */

?>
<article class="single-card">
  <figure class="single-card__img-wrapper">
    <img data-sizes="auto"
      data-srcset="<?php bml_the_image_srcset( get_post_thumbnail_id()) ?>"
      data-parent-fit="cover"
      style="max-width: 100%; max-height: 100%;"
      class="lazyload" alt="article image" />
      <h3 class="single-card__title">
        <a href="<?= get_the_permalink() ?>" 
          data-aos="fade-up"
          data-aos-duration="600"
        >
          <?= get_the_title() ?>
        </a>
      </h3>
  </figure>

  <div class="single-card__body">
    <div class="line"></div>
    <p><?= get_the_excerpt() ?></p>
    <a href="<?= get_the_permalink() ?>" class="single-card__link">Approfondisci</a>
  </div>
</article>