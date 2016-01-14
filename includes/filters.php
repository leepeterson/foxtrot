<?php
/**
 * A collection of all the default filters added within the theme.
 *
 * @package    Foxtrot\Functions\Hooks
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Callback defined in includes/plugins.php
 *
 * @see foxtrot_related_posts_image
 */
add_filter( 'rp4wp_thumbnail_size', 'foxtrot_related_posts_image' );

/**
 * Callback defined in includes/scripts.php
 *
 * @see foxtrot_min_stylesheet_uri
 */
add_filter( 'stylesheet_uri', 'foxtrot_min_stylesheet_uri', 5, 2 );
