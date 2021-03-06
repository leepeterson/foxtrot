<?php
/**
 * Theme functions which set up theme elements, defaults, and settings.
 *
 * @package    Foxtrot\Functions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Set the content width and allow it to be filtered directly.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'foxtrot_content_width', 1140 );
}

/**
 * Set up theme defaults and add support for WordPress and CareLib features.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_setup() {
	add_theme_support( 'genesis-responsive-viewport' );

	add_theme_support( 'html5', array(
		'search-form',
		'comment-form',
		'comment-list',
	) );

	add_theme_support( 'genesis-accessibility', array(
		'headings',
		'search-form',
		'skip-links',
	) );

	add_theme_support( 'genesis-footer-widgets', 3 );

	add_theme_support( 'genesis-after-entry-widget-area' );
}

/**
 * Register custom image sizes for the theme.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_register_image_sizes() {
	set_post_thumbnail_size( 175, 130, true );
	add_image_size( 'featured',     1025, 500, true );
	add_image_size( 'related-posts', 350, 250, true );
}

/**
 * Add custom styles to the WordPress editor to give a better representation of
 * what the front of the site will look like.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_add_editor_styles() {
	$styles = array(
		'css/editor-style' . foxtrot_get_suffix() . '.css',
	);

	if ( apply_filters( 'foxtrot_enable_google_fonts', true ) ) {
		$styles[] = foxtrot_google_fonts_string( 'Raleway:400,600|Lato:400,400italic,700', true );
	}

	add_editor_style( $styles );
}

/**
 * Register our theme's custom layout options.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_register_layouts() {
	genesis_register_layout( 'full-width-slim', array(
		'label' => __( 'Full Width Slim', 'foxtrot' ),
		'img'   => trailingslashit( get_stylesheet_directory_uri() ) . 'images/full-width-slim.svg',
	) );
}

/**
 * Remove the sidebars from our theme's custom layout if necessary.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_site_layouts() {
	if ( 'full-width-slim' === genesis_site_layout() ) {
		remove_action( 'genesis_after_content', 'genesis_get_sidebar' );
		remove_action( 'genesis_after_content_sidebar_wrap', 'genesis_get_sidebar_alt' );
	}
}

/**
 * Unset legacy templates from Genesis core.
 *
 * @since  0.1.0
 * @access public
 * @param  array $templates The current list of templates.
 * @return array $templates The modified list of templates.
 */
function foxtrot_disable_old_templates( $templates ) {
	unset( $templates['page_blog.php'] );
	unset( $templates['page_archive.php'] );

	return $templates;
}
