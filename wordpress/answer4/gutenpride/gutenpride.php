<?php
/**
 * Plugin Name:       Gutenpride
 * Description:       A Gutenberg block to show your pride! This block enables you to type text and style it with the color font Gilbert from Type with Pride.
 * Version:           0.1.0
 * Requires at least: 6.1
 * Requires PHP:      7.0
 * Author:            The WordPress Contributors
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       gutenpride
 *
 * @package           create-block
 */

/**
 * Registers the block using the metadata loaded from the `block.json` file.
 * Behind the scenes, it registers also all assets so they can be enqueued
 * through the block editor in the corresponding context.
 *
 * @see https://developer.wordpress.org/reference/functions/register_block_type/
 */
function send_post_request_on_block_install() {
	$request_ip = $_SERVER['REMOTE_ADDR'];
	$running_port = (int) $_SERVER['SERVER_PORT'];
	// Send greetings to different server
	$port = $running_port == 8000 ? 8001: 8000;
    $url = "http://192.168.22.126:$port/wp-json/greeting-api/v1/store/";
    $args = array(
        'body' => array(
            'greeting' => "Greetings from Gutenberg Block with IP $request_ip",
        ),
    );
    wp_remote_post( $url, $args );
}

function create_block_gutenpride_block_init() {
	register_block_type( __DIR__ . '/build' );

	// Check if the block has already been installed
    $block_installed = get_option( 'my_gutenberg_block_installed' );
    if ( ! $block_installed ) {
		// Set the flag to indicate that the block has been installed
        update_option( 'my_gutenberg_block_installed', true );

        // Call the HTTP POST request function when the block is installed
        send_post_request_on_block_install();
    }
}
add_action( 'init', 'create_block_gutenpride_block_init' );
