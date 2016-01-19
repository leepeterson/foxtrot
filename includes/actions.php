<?php
/**
 * A collection of all the default actions added within the theme.
 *
 * @package    Foxtrot\Actions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_content_width
 */
add_action( 'after_setup_theme', 'foxtrot_content_width', 0 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_setup
 */
add_action( 'genesis_setup', 'foxtrot_setup', 20 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_unregister_sidebars
 */
add_action( 'genesis_setup', 'foxtrot_unregister_sidebars', 20 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_register_image_sizes
 */
add_action( 'init', 'foxtrot_register_image_sizes', 5 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_add_editor_styles
 */
add_action( 'init', 'foxtrot_add_editor_styles', 10 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_register_layouts
 */
add_action( 'init', 'foxtrot_register_layouts', 10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see foxtrot_enqueue_styles
 */
add_action( 'wp_enqueue_scripts', 'foxtrot_enqueue_styles', 10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see foxtrot_enqueue_scripts
 */
add_action( 'wp_enqueue_scripts', 'foxtrot_enqueue_scripts', 10 );

/**
 * Callback defined in includes/scripts.php
 *
 * @see foxtrot_rtl_add_data
 */
add_action( 'wp_enqueue_scripts', 'foxtrot_rtl_add_data', 12 );

/**
 * Callback defined in includes/theme-setup.php
 *
 * @see foxtrot_site_layouts
 */
add_action( 'genesis_before', 'foxtrot_site_layouts', 10 );

/**
 * Callback defined in includes/template-global.php
 *
 * @see foxtrot_menu_toggle
 */
add_action( 'genesis_header_right', 'foxtrot_menu_toggle', 4 );

/**
 * Callback defined in Genesis core.
 *
 * @see genesis_do_nav
 */
add_action( 'genesis_header_right', 'genesis_do_nav', 10 );

/**
 * Callback defined in Genesis core.
 *
 * @see genesis_do_nav
 */
remove_action( 'genesis_after_header', 'genesis_do_nav' );

/**
 * Callback defined in includes/template-entry.php
 *
 * @see foxtrot_sticky_banner
 */
add_action( 'genesis_entry_header', 'foxtrot_sticky_banner', 4 );
