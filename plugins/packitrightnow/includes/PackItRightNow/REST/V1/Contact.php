<?php
/**
 * Contact Form API Class
 *
 * Namespace: v1
 *
 * ENDPOINTS:
 *   /contact
 *     - CREATABLE
 */

namespace PackItRightNow\REST\V1;

class Contact extends \WP_REST_Controller {

	/**
	 * Register the routes for the objects of the controller.
	 *
	 * @param  void
	 * @uses   add_action, reigster_rest_route
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
	 * @param  wp_rest_request $request
	 * @uses   json_decode, get_body, wp_rest_response, sprintf, wp_mail
	 * @return wp_rest_response
	 */
	public function send_email( $request ) {
		$sender = json_decode( $request->get_body() );

		if ( ! $sender ) {
			return new WP_REST_Response( 'There was an error with the request.', 500 );
		}

		$to      = 'vincentpasqualeragosta@gmail.com';
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
