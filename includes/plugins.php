<?php
/**
 * Provides compatibility with various WordPress plugins.
 *
 * @package    Foxtrot\Functions\Plugins
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      1.0.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Change the default related posts image size.
 *
 * @since  1.0.0
 * @access public
 * @return string
 */
function foxtrot_related_posts_image() {
	return 'related-posts';
}
