<?php
/**
 * Theme helper functions for custom page templates.
 *
 * @package    Foxtrot\Functions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Output the markup for the primary menu toggle button.
 *
 * @since  0.1.0
 * @access public
 * @return void
 */
function foxtrot_menu_toggle() {
	if ( has_nav_menu( 'primary' ) || has_nav_menu( 'secondary' ) ) {
		printf( '<button %s>%s</button>',
			genesis_attr( 'menu-toggle', 'primary' ),
			esc_html( apply_filters( 'foxtrot_menu_toggle_text', '' ) )
		);
	}
}
