/**
 * Foxtrot Mobile Menu
 *
 * Merge existing menus into an a11y-compliant, off-canvas mobile menu.
 *
 * @version   0.2.0
 * @copyright Copyright (c) 2016, WP Site Care, LLC
 * @license   MIT
 */
(function( $, undefined ) {
	'use strict';

	$.fn.foxtrotMobileMenu = function( options ) {
		var settings = {
				menuButton: $( '#menu-toggle' ),
				extraMenus: $( '#genesis-nav-secondary' ),
				menuContainer: '.genesis-nav-menu',
				submenuButton: $( '<button />', {
					'class': 'sub-menu-toggle',
					'aria-expanded': false,
					'aria-pressed': false,
					role: 'button'
				})
			},
			$body = $( 'body' ),
			$mainMenu, $extraMenus, $menuButton, $mobileMenu, $submenuButton, $submenuButtons, menuClass;

		if ( options ) {
			$.extend( settings, options );
		}

		$mainMenu       = $( this );
		$extraMenus     = settings.extraMenus;
		$menuButton     = settings.menuButton;
		$submenuButton  = settings.submenuButton;

		// Return early if we don't have any menus to work with.
		if ( 0 === $mainMenu.length && 0 === $extraMenus.length ) {
			return;
		}

		$mobileMenu = $mainMenu;

		// Use the secondary menu as the mobile menu if we don't have a primary.
		if ( 0 === $mainMenu.length ) {
			$mobileMenu = $extraMenus;
		}

		menuClass = $mobileMenu.attr( 'class' );

		$( 'nav li > ul' ).before( $submenuButton );

		$submenuButtons = $( '.' + $submenuButton.attr( 'class' ) );

		/**
		 * Debounce a window resize event.
		 *
		 * @since  0.2.0
		 * @return {Boolean} Returns true if the menu is open.
		 */
		function debouncedResize( c, t ) {
			onresize = function() {
				clearTimeout( t );
				t = setTimeout( c, 100 );
			};
			return c;
		}

		/**
		 * Check whether or not a given element is visible.
		 *
		 * @param  {object} $object a jQuery object to check
		 * @return {bool} true if the current element is hidden
		 */
		function isHidden( $object ) {
			var element = $object[0];
			return ( null === element.offsetParent );
		}

		/**
		 * Check whether or not our existing menus have been merged into a
		 * single menu for mobile display.
		 *
		 * @since  0.1.0
		 * @return {Boolean} Returns true if the menus have been merged.
		 */
		function menusMerged() {
			if ( 0 === $mainMenu.find( 'ul > ul' ).length ) {
				return false;
			}
			return true;
		}

		/**
		 * Prepare our mobile menu by merging our existing menus together if we
		 * have more than one.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function mergeMenus() {
			if ( 0 === $mainMenu.length || 0 === $extraMenus.length ) {
				return false;
			}

			if ( ! menusMerged() ) {
				$extraMenus.find( settings.menuContainer ).appendTo( $mainMenu.find( settings.menuContainer ) );
			}
		}

		/**
		 * If we have two menus which have been merged, split them back into two
		 * separate menus using the same format as before they were merged.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function splitMenus() {
			if ( menusMerged() ) {
				$mainMenu.find( 'ul > ul' ).appendTo( $extraMenus.find( '.wrap' ) );
			}
		}

		/**
		 * Split or merge our existing menus based on screen width and force the
		 * menu to close if the screen is larger than the specified width for a
		 * mobile menu to be displayed.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function reflowMenus() {
			if ( isHidden( $menuButton ) ) {
				splitMenus();
				$menuButton.removeClass( 'activated' );
				$mobileMenu.removeClass( 'activated' );
				$mobileMenu.addClass( menuClass );
				$mobileMenu.removeClass( 'menu-mobile' );
				$body.removeClass( 'menu-open' );
			} else {
				$mobileMenu.removeClass( menuClass );
				$mobileMenu.addClass( 'menu-mobile' );
				mergeMenus();
			}
		}

		/**
		 * Fire all methods required to either open or close the mobile menu.
		 *
		 * @since  0.1.0
		 * @param {object} event The current event being fired.
		 * @return void
		 */
		function toggleMenu( event ) {
			event.preventDefault();
			$mobileMenu.toggleClass( 'activated' );
			$menuButton.toggleClass( 'activated' );
			$body.toggleClass( 'menu-open' );
		}

		/**
		 * Fire all methods required to either open or close a sub menu.
		 *
		 * @since  0.1.0
		 * @param {object} event The current event being fired.
		 * @return void
		 */
		function toggleSubMenu( event ) {
			var $button = $( event.target );

			event.preventDefault();
			$button.toggleClass( 'activated' );
			$button.next( 'ul' ).toggleClass( 'activated' );
		}

		/**
		 * Load all of our mobile menu functionality.
		 *
		 * @since  0.1.0
		 * @return void
		 */
		function loadMobileMenu() {
			$menuButton.on( 'click', toggleMenu );
			$submenuButtons.on( 'click', toggleSubMenu );
			debouncedResize(function() {
				reflowMenus();
			})();
		}

		return loadMobileMenu();
	};
}( jQuery ) );
