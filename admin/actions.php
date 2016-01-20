<?php
/**
 * A collection of all the default admin actions added within the theme.
 *
 * @package    Foxtrot\Admin\Actions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in admin/meta-boxes.php
 *
 * @see foxtrot_content_width
 */
add_action( 'genesis_theme_settings_metaboxes', 'foxtrot_admin_remove_theme_boxes' );
