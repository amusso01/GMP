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

<aside class="main-info-bar color-dark-bg">
    <div class="content-block">
        <div class="main-info-bar__grid">
            <div class="main-info-bar__item">
                <i class="fa-solid fa-phone"></i>
                <a href="tel:<?= $phone ?>"><?= $phone ?></a>
            </div>
            <div class="main-info-bar__item">
                <i class="fa-solid fa-location-dot"></i>
                <?= $address ?>
            </div>
            <div class="main-info-bar__item">
                <i class="fa-solid fa-envelope"></i>
                <a href="mailto:<?= $email ?>"><?= $email ?></a>
            </div>
            <div class="main-info-bar__item">
			    <?php get_template_part( 'components/navigation/lang-nav' ); ?>
            </div>
        </div>
    </div>
</aside>