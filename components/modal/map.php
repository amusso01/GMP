<?php
/**
 * Map Modal
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */
?>

<?php 
// GET MAP FROM INFO GENERALI

$map = get_field( 'url_mappa', 'option' );
?>

<div class="modal micromodal-slide" id="modal-map" aria-hidden="true">
  <div class="modal__overlay" tabindex="-1" data-micromodal-close>
    <div class="modal__container" role="dialog" aria-modal="true" aria-labelledby="modal-map-title">
      <header class="modal__header">
        <h2 class="modal__title" id="modal-map-title">
          La Nostra Sede
        </h2>
        <button class="modal__close" aria-label="Close modal" data-micromodal-close></button>
      </header>
      <main class="modal__content" id="modal-map-content">
        <?= $map ?>
      </main>
    </div>
  </div>
</div>