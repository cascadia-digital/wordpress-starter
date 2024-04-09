<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Cascadia_Starter
 */

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function cascadia_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'cascadia_pingback_header' );
