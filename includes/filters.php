<?php
/**
 * A collection of all the default filters added within the theme.
 *
 * @package    Foxtrot\Functions\Hooks
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/plugins.php
 *
 * @see foxtrot_related_posts_image
 */
add_filter( 'rp4wp_thumbnail_size', 'foxtrot_related_posts_image' );

/**
 * Prevent Genesis from loading deprecated files.
 *
 * Callback defined in WordPress Core.
 *
 * @see genesis_load_deprecated
 */
add_filter( 'genesis_load_deprecated', '__return_false' );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_disable_old_templates
 */
add_filter( 'theme_page_templates', 'foxtrot_disable_old_templates' );

/**
 * Callback defined in includes/scripts.php
 *
 * @see foxtrot_min_stylesheet_uri
 */
add_filter( 'stylesheet_uri', 'foxtrot_min_stylesheet_uri', 5, 2 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see foxtrot_menu_toggle
 */
add_filter( 'genesis_attr_menu-toggle', 'foxtrot_attr_menu_toggle', 5 );

/**
 * Callback defined in includes/attributes.php
 *
 * @see foxtrot_attr_menu_secondary
 */
add_filter( 'genesis_attr_nav-secondary', 'foxtrot_attr_menu_secondary' );

/**
 * Prevent Genesis from adding an edit link when users are logged-in.
 *
 * Callback defined in WordPress Core.
 *
 * @see genesis_edit_post_link
 */
add_filter( 'genesis_edit_post_link' , '__return_false' );
