<?php
/**
 * Info Bar header component
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */
?>

<?php 
// GET INFO FROM INFO GENERALI

$phone = get_field( 'telefono', 'option' );
$address = get_field( 'indirizzo_info_bar', 'option' );
$email = get_field( 'email', 'option' );
?>

<aside class="mobile-info-bar color-dark-bg">
    <div class="content-block">
        <div class="mobile-info-bar__grid">
            <div class="mobile-info-bar__item">
                <i class="fa-solid fa-phone"></i>
                <a href="tel:<?= $phone ?>"><?= $phone ?></a>
            </div>
            <div class="mobile-info-bar__item">
                <i class="fa-solid fa-location-dot"></i>
                <p><?= $address ?></p>
            </div>
            <div class="mobile-info-bar__item">
                <i class="fa-solid fa-envelope"></i>
                <a href="mailto:<?= $email ?>"><?= $email ?></a>
            </div>
        </div>
    </div>
</aside>