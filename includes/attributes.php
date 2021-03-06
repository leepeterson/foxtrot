<?php
/**
 * HTML attribute functions, mostly used for filtering attributes.
 *
 * @package    Foxtrot\Fucntions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Menu toggle attributes.
 *
 * @since  0.1.0
 * @access public
 * @param  array $attr A list of attributes to add to the element.
 * @return array
 */
function foxtrot_attr_menu_toggle( $attr ) {
	$attr['id']            = 'menu-toggle';
	$attr['class']         = 'menu-toggle';
	$attr['role']          = 'button';
	$attr['aria-expanded'] = 'false';
	$attr['aria-pressed']  = 'false';

	return $attr;
}

/**
 * Header menu attributes.
 *
 * @since  0.1.0
 * @access public
 * @param  array $attr A list of attributes to add to the element.
 * @return array
 */
function foxtrot_attr_menu_header( $attr ) {
	$attr['id'] = 'genesis-nav-header';

	return $attr;
}

/**
 * Secondary menu attributes.
 *
 * @since  0.1.0
 * @access public
 * @param  array $attr A list of attributes to add to the element.
 * @return array
 */
function foxtrot_attr_menu_secondary( $attr ) {
	$attr['id'] = 'genesis-nav-secondary';

	return $attr;
}
