<?php

  /* ***** ----------------------------------------------- ***** **
  ** ***** ACF
  ** ***** ----------------------------------------------- ***** */

  if ( function_exists( 'acf_add_options_page' ) ) {

    // Add Global Options tab to WP Admin
    acf_add_options_page( array(
      'menu_title'  => __( 'Info Generali', 'bymattlee' ),
      'page_title'  => __( 'Info Generali', 'bymattlee' ),
      'menu_slug'   => 'global-options',
      'position'    => '31',
      'capability'  => 'edit_posts',
      'icon_url'    => 'dashicons-admin-generic',
    ));
    
    // Add Footer Options section under the Info Generali tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Contatti', 'bymattlee' ),
      'menu_title'  => __( 'Contatti', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

    // Add Code Options section under the Info Generali tab
    acf_add_options_sub_page( array(
      'page_title'  => __( 'Footer', 'bymattlee' ),
      'menu_title'  => __( 'Footer', 'bymattlee' ),
      'parent_slug' => 'global-options',
    ));

  }

?>