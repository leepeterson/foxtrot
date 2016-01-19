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
			genesis_attr( 'corner-ribbon', 'sticky' ),
			esc_html__( 'Featured', 'foxtrot' )
		);
	}
}
