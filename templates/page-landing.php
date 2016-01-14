<?php
/**
 * Template Name: Landing
 *
 * @package    Foxtrot\Templates
 * @subpackage Foxtrot
 * @author     Robert Neu
 * @copyright  Copyright (c) 2015, WP Site Care, LLC
 * @since      1.0.0
 */

/**
 * Callback defined in includes/template-pages.php
 *
 * @see foxtrot_landing_body_class
 */
add_filter( 'body_class', 'foxtrot_landing_body_class' );

add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

remove_action( 'genesis_header', 'genesis_header_markup_open', 5 );
remove_action( 'genesis_header', 'genesis_do_header', 10 );
remove_action( 'genesis_header', 'genesis_header_markup_close', 15 );
remove_action( 'genesis_after_header', 'genesis_do_nav' );
remove_action( 'genesis_footer', 'genesis_do_subnav', 7 );
remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );
remove_action( 'genesis_before_footer', 'outreach_sub_footer', 5 );
remove_action( 'genesis_before_footer', 'genesis_footer_widget_areas' );
remove_action( 'genesis_footer', 'genesis_footer_markup_open', 5 );
remove_action( 'genesis_footer', 'genesis_do_footer' );
remove_action( 'genesis_footer', 'genesis_footer_markup_close', 15 );

genesis();
