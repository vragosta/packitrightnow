/**
 * Pack It Right Now - Twenty Sixteen - v0.1.0
 * http://www.packitrightnow.com
 * Copyright (c) 2017; * Licensed GPL-2.0+
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
		 * @uses click(), on(), hasClass(), removeClass(), addClass()
		 * @return void
		 */
		productsToggle : function() {
			/**
			 * Listens for click on products link on mobile menu.
			 * Toggles 'load' class.
			 */
			$( 'a[name=products]' ).click( function() {
				if ( $( '.sub-menu' ).hasClass( 'load' ) ) {
					$( '.sub-menu' ).removeClass( 'load' );
				} else {
					$( '.sub-menu' ).addClass( 'load' );
				}
			});

			/**
			 * Listens for click on dropdown-toggle button.
			 * Toggles 'change-color' class.
			 */
			$( '.dropdown-toggle' ).on( 'click', function() {
				if ( $( '.dropdown' ).hasClass( 'open' ) ) {
					$( '.dropdown' ).removeClass( 'change-color' );
					$( '.dropdown-toggle' ).removeClass( 'change-color' );
				} else {
					$( '.dropdown' ).addClass( 'change-color' );
					$( '.dropdown-toggle' ).addClass( 'change-color' );
				}
			});

			/**
			 * Listens for click on document that is not the dropdown-toggle button.
			 * Removes 'change-color' class.
			 */
			$( 'html' ).on( 'click', function(e) {
				if ( e.srcElement.className !== "dropdown-toggle change-color" ) {
					$( '.dropdown' ).removeClass( 'change-color' );
					$( '.dropdown-toggle' ).removeClass( 'change-color' );
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
		 * Sends contact information to contact endpoint for processing.
		 *
		 * @since 0.1.0
		 * @uses click(), val(), ajax(), stringify()
		 * @return void
		 */
		sendContactInformation: function() {
			$( '.contact-btn' ).click(function() {
				var firstname = $( '#firstname' ).val(),
					lastname  = $( '#lastname' ).val(),
					email     = $( '#email' ).val(),
					subject   = $( '#subject' ).val(),
					message   = $( '#message' ).val(),
					data      = {
						'firstname' : firstname,
						'lastname' : lastname,
						'email' : email,
						'subject' : subject,
						'message' : message
					};

					if ( ! firstname || ! lastname || ! email || ! subject || ! message ) {
						$( '.error' ).addClass( 'show-message' );
					} else {
						$.ajax( {
							url: PackItRightNow.options.apiUrl  + '/contact/',
							type: 'post',
							headers: {
								'X-WP-Nonce': PackItRightNow.options.nonce
							},
							data: JSON.stringify( data ),
							dataType: 'json',
						} ).then(function( response ) {
							$( '.error' ).find( '.alert-danger' ).removeClass( 'alert-danger' ).addClass( 'alert-success' );
							$( '.error' ).find( 'p' ).html( 'You message was successfully sent!' );
							$( '.error' ).addClass( 'show-message' );
						} );
					}
			});
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
			this.sendContactInformation();
		}
	};

	jQuery( document ).ready( function() {
		packitrightnow.init();
	} );
} )( jQuery );
