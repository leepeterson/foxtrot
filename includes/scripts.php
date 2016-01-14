<?php
/**
 * Load Theme JavaScript and CSS
 *
 * @package    Foxtrot\Functions\Scripts
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Return a suffix to load minified JavaScript on production.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function foxtrot_get_suffix() {
	return defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
}

/**
 * Filter the 'stylesheet_uri' to load a minified version of 'style.css'
 * file if it is available.
 *
 * @since  0.2.0
 * @access public
 * @param  string $stylesheet_uri The URI of the active theme's stylesheet.
 * @param  string $stylesheet_dir_uri The directory URI of the active theme's stylesheet.
 * @return string $stylesheet_uri
 */
function foxtrot_min_stylesheet_uri( $stylesheet_uri, $stylesheet_dir_uri ) {
	if ( ! $suffix = foxtrot_get_suffix() ) {
		return $stylesheet_uri;
	}

	// Remove the stylesheet directory URI from the file name.
	$stylesheet = str_replace( trailingslashit( $stylesheet_dir_uri ), '', $stylesheet_uri );

	// Change the stylesheet name to 'style.min.css'.
	$stylesheet = str_replace( '.css', "{$suffix}.css", $stylesheet );

	if ( file_exists( FOXTROT_DIR . $stylesheet ) ) {
		$stylesheet_uri = esc_url( trailingslashit( $stylesheet_dir_uri ) . $stylesheet );
	}

	return $stylesheet_uri;
}

/**
 * Build a Google Fonts string.
 *
 * @since  1.0.0
 * @access public
 * @param  string $families the font families to include.
 * @param  bool   $editor_style set to true if string is being used as editor style.
 * @return string
 */
function foxtrot_google_fonts_string( $families, $editor_style = false ) {
	$string = "https://fonts.googleapis.com/css?family={$families}";
	return $editor_style ? str_replace( ',', '%2C', $string ) : $string;
}

/**
 * Load a minified version of the theme's stylesheet along with any other
 * required theme CSS files.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function foxtrot_enqueue_styles() {
	if ( apply_filters( 'foxtrot_enable_google_fonts', true ) ) {
		wp_enqueue_style(
			'foxtrot-google-fonts',
			foxtrot_google_fonts_string( 'Raleway:400,600|Lato:400,400italic,700' ),
			array(),
			null
		);
	}
}

/**
 * Register and load JavaScript files.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function foxtrot_enqueue_scripts() {
	$js_uri  = trailingslashit( get_template_directory_uri() ) . 'js/';
	$suffix  = foxtrot_get_suffix();

	wp_enqueue_script(
		'foxtrot-general',
		"{$js_uri}theme{$suffix}.js",
		array( 'jquery' ),
		CHILD_THEME_VERSION,
		true
	);
}

/**
 * Replace the default theme stylesheet with a RTL version when a RTL
 * language is being used.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function foxtrot_rtl_add_data() {
	wp_style_add_data( 'foxtrot', 'rtl', 'replace' );
	wp_style_add_data( 'foxtrot', 'suffix', foxtrot_get_suffix() );
}
