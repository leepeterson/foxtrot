<?php
/**
 * Include library and setup files.
 *
 * @package    Foxtrot\Functions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
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
define( 'FOXTROT_DIR',  trailingslashit( get_stylesheet_directory() ) );

require_once FOXTROT_DIR . 'includes/theme-setup.php';
require_once FOXTROT_DIR . 'includes/plugins.php';
require_once FOXTROT_DIR . 'includes/scripts.php';
require_once FOXTROT_DIR . 'includes/template-entry.php';
require_once FOXTROT_DIR . 'includes/template-pages.php';
require_once FOXTROT_DIR . 'includes/actions.php';
require_once FOXTROT_DIR . 'includes/filters.php';

/**
 * A hook within the global scope; common to all WP Site Care themes.
 *
 * This is meant for plugins to execute code after the child theme setup has
 * been completed.
 *
 * @since  1.0.0
 * @access public
 */
do_action( 'sitecare_after_setup_child' );
