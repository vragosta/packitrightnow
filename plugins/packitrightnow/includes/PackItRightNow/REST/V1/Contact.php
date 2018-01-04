<?php

namespace PackItRightNow\REST\V1;

/**
 * Contact Form API Class
 *
 * Namespace: v1
 *
 * ENDPOINTS:
 *   /contact
 *     - CREATABLE
 */
class Contact extends \WP_REST_Controller {

	/**
	 * Register the routes for the objects of the controller.
	 *
	 * @param void
	 * @uses add_action(), register_rest_route()
	 * @return void
	 */
	public function register() {
		add_action( 'rest_api_init', function() {
			register_rest_route( 'v1', 'contact', array(
				array(
					'methods'  => \WP_REST_Server::CREATABLE,
					'callback' => array( $this, 'send_email' )
				)
			) );
		} );
	}

	/**
	 * Sends email to client.
	 *
	 * @since 1.0.0
	 * @param WP_REST_Request $request
	 * @uses json_decode(), get_body(), wp_rest_response(), sprintf(), wp_mail(), wp_send_json_success()
	 * @return WP_REST_Response
	 */
	public function send_email( $request ) {
		$sender = json_decode( $request->get_body() );

		if ( ! $sender ) {
			return new WP_REST_Response( 'There was an error with the request.', 500 );
		}

		$to      = 'packitrightnow+inquiries@gmail.com';
		$subject = $sender->subject;
		$message = $sender->message;

		$content = '
%1$s

From,
%2$s %3$s
%4$s
		';

		$content = sprintf(
			$content,
			$message,
			$sender->firstname,
			$sender->lastname,
			$sender->email
		);

		wp_mail( $to, $subject, $content );

		wp_send_json_success( 'success' );
	}
};
