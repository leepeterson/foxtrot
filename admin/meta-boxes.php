<?php
/**
 * Functions for interacting with admin meta boxes.
 *
 * @package    Foxtrot\Admin\Fucntions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Remove unwanted theme settings metaboxes.
 *
 * @since  0.1.0
 * @access public
 * @param  string $hook The current admin meta box hook.
 * @return void
 */
function foxtrot_admin_remove_theme_boxes( $hook ) {
	remove_meta_box( 'genesis-theme-settings-feeds',    $hook, 'main' );
	remove_meta_box( 'genesis-theme-settings-blogpage', $hook, 'main' );
}
