<?php
/**
 * Theme helper functions for custom page templates.
 *
 * @package    Foxtrot\Functions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Add a 'landing' class to the <body> element.
 *
 * @since  1.0.0
 * @access public
 * @param  array $classes The existing body classes.
 * @return array $classes The modified body classes.
 */
function foxtrot_landing_body_class( $classes ) {
	$classes[] = 'landing';
	return $classes;
}
