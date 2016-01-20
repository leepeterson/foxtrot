<?php
/**
 * Theme helper functions for archive views.
 *
 * @package    Foxtrot\Functions
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2016, WP Site Care, LLC
 * @since      0.1.0
 */

defined( 'ABSPATH' ) || exit;

/**
 * Determine if we're viewing a "plural" page.
 *
 * Note that this is similar to, but not quite the same as `! is_singular()`,
 * which wouldn't account for the 404 page.
 *
 * @since  1.0.0
 * @access public
 * @return bool True if we're on any page which displays multiple entries.
 */
function foxtrot_is_plural() {
	return is_home() || is_archive() || is_search();
}

/**
 * Determine if we're within a blog section archive.
 *
 * @since  1.0.0
 * @access public
 * @return bool True if we're on a blog archive page.
 */
function foxtrot_is_blog_archive() {
	return foxtrot_is_plural() && ! ( is_post_type_archive() || is_tax() );
}

/**
 * Determine if we're anywhere within the blog section of a Genesis site.
 *
 * @since  1.0.0
 * @access public
 * @return bool True if we're on any section of the blog.
 */
function foxtrot_is_blog() {
	return foxtrot_is_blog_archive() || is_singular( 'post' );
}

/**
 * Wrapper for the Genesis CPT archive title function which has no way to return.
 *
 * @since  0.1.0
 * @access public
 * @return string
 */
function foxtrot_get_cpt_archive_title() {
	ob_start();
	genesis_do_cpt_archive_title_description();
	return ob_get_clean();
}
