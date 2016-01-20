<?php
/**
 * Theme helper functions for single entries.
 *
 * @package    Foxtrot\Functions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Output markup for a sticky ribbon on sticky posts in archive views.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_sticky_banner() {
	if ( ! is_singular() && is_sticky() ) {
		printf( '<div %s><p class="ribbon-content">%s<p></div>',
			genesis_attr( 'corner-ribbon' ),
			esc_html__( 'Featured', 'foxtrot' )
		);
	}
}

/**
 * Wrapper for the Genesis post title function which has no method to return.
 *
 * @since  0.1.0
 * @access public
 * @return string
 */
function foxtrot_get_post_title() {
	ob_start();
	genesis_do_post_title();
	return ob_get_clean();
}

/**
 * Wrapper for the Genesis post info function which has no method to return.
 *
 * @since  0.1.0
 * @access public
 * @return string
 */
function foxtrot_get_post_info() {
	ob_start();
	genesis_post_info();
	return ob_get_clean();
}

/**
 * Wrapper for the Genesis post content function which has no method to return.
 *
 * @since  0.1.0
 * @access public
 * @return string
 */
function foxtrot_get_post_content() {
	ob_start();
	genesis_do_post_content();
	return ob_get_clean();
}

/**
 * Wrapper for the Genesis post meta function which has no method to return.
 *
 * @since  0.1.0
 * @access public
 * @return string
 */
function foxtrot_get_post_meta() {
	ob_start();
	genesis_post_meta();
	return ob_get_clean();
}
