<?php
/**
 * Lang Nav
 * 
 * @author Andrea Musso
 * 
 * @package Foundry
 */

if ( has_nav_menu( 'languagemenu' ) ) :
    wp_nav_menu([
        'theme_location'    => 'languagemenu',
        'menu_class'        => 'language-menu',
        'menu_id'           => 'lang-nav',
        'container'         => 'nav',
        'depth'             => 1
    ]);
endif;
