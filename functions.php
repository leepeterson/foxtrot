<?php
/**
 * Include library and setup files.
 *
 * @package    Foxtrot\Functions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * The name of the child theme. Should match the info in style.css.
 *
 * @since 0.1.0
 */
define( 'CHILD_THEME_NAME', 'Foxtrot' );

/**
 * The URL where information about the child theme can be found.
 *
 * @since 0.1.0
 */
define( 'CHILD_THEME_URL', 'http://demos.wpsitecare.com/foxtrot/' );

/**
 * The current version of the child theme. Should match the version in style.css.
 *
 * @since 0.1.0
 */
define( 'CHILD_THEME_VERSION', '0.1.0' );

/**
 * The absolute path to the child theme's root directory with a trailing slash.
 *
 * @since 0.1.0
 * @uses  get_stylesheet_directory()
 * @uses  trailingslashit()
 */
define( 'CHILD_THEME_DIR',  trailingslashit( get_stylesheet_directory() ) );

add_action( 'genesis_setup', 'foxtrot_includes', 15 );
/**
 * Include all required theme files within a hookable function.
 *
 * This is necessary to avoid including Genesis' init function and must be
 * hooked into `genesis_setup` to ensure access to all of Genesis core.
 *
 * @since 0.1.0
 * @access public
 * @return void
 */
function foxtrot_includes() {
	require_once CHILD_THEME_DIR . 'includes/theme-setup.php';
	require_once CHILD_THEME_DIR . 'includes/attributes.php';
	require_once CHILD_THEME_DIR . 'includes/plugins.php';
	require_once CHILD_THEME_DIR . 'includes/scripts.php';
	require_once CHILD_THEME_DIR . 'includes/template-entry.php';
	require_once CHILD_THEME_DIR . 'includes/template-global.php';
	require_once CHILD_THEME_DIR . 'includes/template-pages.php';
	require_once CHILD_THEME_DIR . 'includes/actions.php';
	require_once CHILD_THEME_DIR . 'includes/filters.php';
}

add_action( 'genesis_setup', 'foxtrot_admin_includes', 15 );
/**
 * Include all required admin theme files within a hookable function.
 *
 * @since 0.1.0
 * @access public
 * @return void
 */
function foxtrot_admin_includes() {
	if ( is_admin() ) {
		require_once CHILD_THEME_DIR . 'admin/meta-boxes.php';
		require_once CHILD_THEME_DIR . 'admin/actions.php';
	}
}

/**
 * A hook within the global scope; common to all WP Site Care themes.
 *
 * This is meant for plugins to execute code after the child theme setup has
 * been completed.
 *
 * @since  0.1.0
 * @access public
 */
do_action( 'sitecare_after_setup_child' );
