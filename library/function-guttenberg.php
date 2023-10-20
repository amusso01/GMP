<?php 

/*==================================================================================
Register color paette for guttenberg
==================================================================================*/
function ea_setup() {
	// Disable Custom Colors
	add_theme_support( 'disable-custom-colors' );
  
	// Editor Color Palette
	add_theme_support( 'editor-color-palette', array(
		array(
			'name'  => __( 'Rosso', 'ea-starter' ),
			'slug'  => 'red',
			'color'	=> '#FF0000',
		),
		array(
			'name'  => __( 'Nero', 'ea-starter' ),
			'slug'  => 'black',
			'color' => '#000000',
		),
		array(
			'name'  => __( 'Bianco', 'ea-starter' ),
			'slug'  => 'white',
			'color' => '#FFFFFF',
		),
		array(
			'name'  => __( 'Grigio', 'ea-starter' ),
			'slug'  => 'grey',
			'color' => '#555555',
		),
		array(
			'name'  => __( 'Grigio chiaro', 'ea-starter' ),
			'slug'  => 'light-grey',
			'color' => '#8c8c8c',
		)
	) );
}
add_action( 'after_setup_theme', 'ea_setup' );

/*==================================================================================
Allow certain block on Guttenberg
==================================================================================*/
 
/* function misha_allowed_block_types( $allowed_blocks ) {
 
	return array(
		'acf/fd-greybgtext',
		'acf/fd-sharetitle',
		'acf/fd-bluebg',
		'acf/fd-button',
		'acf/fd-teamcard',
		'acf/fd-imagetext',
		'acf/mediatextareablock',
		'core/image',
		'core/separator',
		'core/spacer',
		'core/paragraph',
		'core/heading',
		'core/list'
	);
 
}

add_filter( 'allowed_block_types', 'misha_allowed_block_types' );*/

/*==================================================================================
ADD JS
==================================================================================*/
/**
 * Enqueue block JavaScript and CSS for the editor
 */
function my_block_plugin_editor_scripts()
{
    // Enqueue block editor styles
		wp_enqueue_style( 'root_editor_gmp',  get_template_directory_uri() . '/dist/styles/root.css', false, '1.0', 'all' );
		wp_enqueue_style( 'main_editor_gmp',  get_template_directory_uri() . '/dist/styles/main.css', false, '1.0', 'all' );

    // Enqueue block editor JS
    wp_enqueue_script('lazysizes', get_template_directory_uri() . '/js/lazysizes.js', array(), true);
    wp_enqueue_script('main_editor', get_template_directory_uri() . '/dist/scripts/main.js', array(), true);
}

// Hook the enqueue functions into the editor
add_action('enqueue_block_editor_assets', 'my_block_plugin_editor_scripts');

/*==================================================================================
Register back-end CSS editor
==================================================================================*/
// add_theme_support('editor-styles');
// add_editor_style( './dist/styles/root.css' );
// add_editor_style( './dist/styles/main.css' );


/*==================================================================================
wrapp certain block with div
==================================================================================*/
function wporg_block_wrapper( $block_content, $block ) {
	if ( $block['blockName'] === 'core/paragraph' ) {
			$content = '<div class="wp-block-paragraph narrow-width__container content-block">';
			$content .= $block_content;
			$content .= '</div>';
			return $content;
	} elseif ( $block['blockName'] === 'core/heading' ) {
			$content = '<div class="wp-block-title narrow-width__container content-block">';
			$content .= $block_content;
			$content .= '</div>';
			return $content;
	}elseif ( $block['blockName'] === 'core/image' ) {
		$content = '<div class="wp-block-image narrow-width__container content-block">';
		$content .= $block_content;
		$content .= '</div>';
		return $content;
	}elseif ( $block['blockName'] === 'core/separator' ) {
		$content = '<div class="wp-block-separator narrow-width__container content-block">';
		$content .= $block_content;
		$content .= '</div>';
		return $content;
	}elseif ( $block['blockName'] === 'core/list' ) {
		$content = '<div class="wp-block-list narrow-width__container content-block">';
		$content .= $block_content;
		$content .= '</div>';
		return $content;
	}elseif ( $block['blockName'] === 'core/table' ) {
		$content = '<div class="wp-block-table content-block">';
		$content .= $block_content;
		$content .= '</div>';
		return $content;
	}elseif ( $block['blockName'] === 'core/embed' ) {
		$content = '<div class="wp-block-embed__wrapper content-block">';
		$content .= $block_content;
		$content .= '</div>';
		return $content;
	}

	return $block_content;
}

add_filter( 'render_block', 'wporg_block_wrapper', 10, 2 );

/*==================================================================================
Register new category in guttenberg block
==================================================================================*/

function my_gmp_category( $categories, $post ) {
	return array_merge(
		$categories,
		array(
			array(
				'slug' => 'gmp-category',
				'title' => __( 'GMP', 'gmp-category' ),
			),
		)
	);
}
add_filter( 'block_categories', 'my_gmp_category', 10, 2);


/*==================================================================================
LOAD CUSTOM ACF-GUTENBERG-BLOCKS
==================================================================================*/

require get_template_directory().'/components/blocks/hero-page.php';
require get_template_directory().'/components/blocks/image-text.php';
require get_template_directory().'/components/blocks/hero-homepage.php';
require get_template_directory().'/components/blocks/banner-parallax.php';
require get_template_directory().'/components/blocks/three-columns-card.php';
require get_template_directory().'/components/blocks/vertical-tabs.php';