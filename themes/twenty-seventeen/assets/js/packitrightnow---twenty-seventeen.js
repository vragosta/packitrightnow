/**
 * VincentRagosta - Twenty Sixteen - v0.1.0
 * https://vincentragosta.com
 * Copyright (c) 2016; * Licensed GPL-2.0+
 */
'use strict';

( function( $ ) {

	var packitrightnow = {

		/**
		 * When the dropdown button is clicked ( hamburger button ),
		 * toggle mobile menu with standard site menu.
		 *
		 * @since 0.1.0
		 * @uses removeClass(), addClass()
		 * @return void
		 */
		setupMenuToggle : function() {

			// Listener for drop down button.
			$( '.drop-down' ).click( function() {
				$( this ).fadeOut();

				$( '#mobile-menu' )
					.addClass( 'load' );
			});

			// Listener for close menu button.
			$( '.fa-times' ).click( function () {
				$( '.drop-down' ).fadeIn();

				$( '#mobile-menu' )
					.removeClass( 'load' );
			});

		},

		/**
		 * When the products link is clicked,
		 * toggle the products dropdown.
		 *
		 * @since 0.1.0
		 * @uses removeClass(), addClass()
		 * @return void
		 */
		productsToggle : function() {
			$( 'a[name=products]' ).click( function() {
				if ( $( '.sub-menu' ).hasClass( 'load' ) ) {
					$( '.sub-menu' ).removeClass( 'load' );
				} else {
					$( '.sub-menu' ).addClass( 'load' );
				}
			});

			$( '.dropdown-toggle' ).on( 'click', function() {
				if ( $( '.dropdown' ).hasClass( 'open' ) ) {
					$( this ).css({
						'background-color' : '#157702',
						'color' : '#fff'
					});
				} else {
					$( this ).css({
						'background-color' : '#fff',
						'color' : '#157702'
					});
				}
			});
		},

		/**
		 * Declare carousel settings.
		 *
		 * @since 0.1.0
		 * @uses slick()
		 * @return void
		 */
		setCarouselSettings: function() {
			$( '.carousel' ).slick( {
				infinite: true,
				slidesToShow: 1,
				autoplay: true,
				autoplaySpeed: 3000,
				dots: true,
				prevArrow: false,
				nextArrow: false
			} );
		},

		/**
		 * VincentRagosta class initializer.
		 *
		 * @since 0.1.0
		 * @uses menuFadeIn(), setupMenuToggle()
		 * @return void
		 */
		init: function() {
			this.setupMenuToggle();
			this.productsToggle();
			this.setCarouselSettings();
		}
	};

	jQuery( document ).ready( function() {
		packitrightnow.init();
	} );
} )( jQuery );
