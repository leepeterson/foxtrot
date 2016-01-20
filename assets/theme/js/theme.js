/* global skipLinkFocus */
/**
 * JavaScript for Foxtrot
 *
 * Includes all JS which is required within all sections of the theme.
 */
window.foxtrot = window.foxtrot || {};

(function( window, $, undefined ) {
	'use strict';

	var $document = $( document ),
		$body     = $( 'body' ),
		foxtrot   = window.foxtrot;

	$.extend( foxtrot, {

		// Global script initialization
		globalInit: function() {
			var $videos = $( '#site-inner' );
			$body.addClass( 'ontouchstart' in window || 'onmsgesturechange' in window ? 'touch' : 'no-touch' );
			$document.gamajoAccessibleMenu();
			$( '#genesis-nav-primary' ).foxtrotMobileMenu();
			$videos.fitVids();
		}

	});

	// Document ready.
	jQuery(function() {
		foxtrot.globalInit();
	});
})( this, jQuery );
