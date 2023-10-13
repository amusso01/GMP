<?php
/**
 * Show map and Addresses
 *
 * @author Andrea Musso
 * 
 * @package foundry
 **/

?>

<?php 
// GET VAR FROM INFO GENERALI

$map = get_field( 'url_mappa', 'option' );
$phone = get_field( 'telefono', 'option' );
$address = get_field( 'indirizzo', 'option' );
$addressAlternative = get_field( 'indirizzo_secondario', 'option' );
$email = get_field( 'email', 'option' );

?>

<section class="gmp-contact-info">
  <div class="content-block">
    <div class="gmp-contact-info__wrapper">
      <div class="info-box color-dark-bg">
        <div class="single-info">
          <i class="fa-solid fa-location-dot"></i>
          <div>
            <?= $address ?>
          </div>
        </div>
        <div class="single-info">
          <i class="fa-solid fa-location-dot"></i>
          <div>
            <?=$addressAlternative ?>
          </div>
        </div>
        <div class="single-info">
          <i class="fa-solid fa-phone"></i>
          <a href="tel:<?= $phone ?>"><?= $phone ?></a>
        </div>
        <div class="single-info">
          <i class="fa-solid fa-envelope"></i>
          <a href="mailto:<?= $email ?>"><?= $email ?></a>
        </div>
      </div>

      <div class="map-wrapper">
        <?= $map ?>
      </div>
    </div>
  </div>
</section>