<?php
/*
Plugin Name: Bigcommerce
Plugin URI: http://www.seodenver.com/interspire-bigcommerce-wordpress/
Description: Integrate Bigcommerce products into your WordPress pages and posts.
Author: Katz Web Services, Inc.
Version: 1.7
Author URI: http://www.katzwebservices.com
License: GPLv2

This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
(at your option) any later version, see <http://www.gnu.org/licenses/>.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.
*/

define('BIGCOMMERCE_PLUGIN_FILE', __FILE__);

// Includes
require_once( 'lib/class.api.php' );
require_once( 'lib/class.display.php' );
require_once( 'lib/class.media.php' );
require_once( 'lib/class.parser.php' );
require_once( 'lib/class.settings.php' );
require_once( 'lib/class.ajax.php' );

// WP Hooks - Settings
add_action( 'admin_init', array( 'Bigcommerce_settings', 'admin_init' ) );
add_action( 'admin_menu', array( 'Bigcommerce_settings', 'admin_menu' ) );
add_filter(
	'plugin_action_links_' . plugin_basename( BIGCOMMERCE_PLUGIN_FILE ),
	array( 'Bigcommerce_settings', 'plugin_action_links' )
);

// WP Hooks - General
add_action( 'wp_footer', array( 'Bigcommerce_display', 'wp_footer' ) );

// WP Hooks - Media
add_action( 'wp_ajax_bigcommerce_rebuild', array( 'Bigcommerce_ajax', 'BuildAjax'));
add_action( 'admin_enqueue_scripts', array( 'Bigcommerce_media', 'print_scripts') );
add_action( 'admin_footer',  array( 'Bigcommerce_media', 'admin_footer' ) );
add_action( 'media_buttons_context', array( 'Bigcommerce_media', 'media_buttons_context' ) );
add_filter( 'media_upload_tabs', array( 'Bigcommerce_media', 'media_upload_tabs' ), 11 );
add_action( 'media_upload_wpinterspire', array( 'Bigcommerce_media', 'media_upload_wpinterspire' ) );

// Shortcodes
add_shortcode( 'BigCommerce', array( 'Bigcommerce_display', 'shortcode' ) );
add_shortcode( 'Bigcommerce', array( 'Bigcommerce_display', 'shortcode' ) );
add_shortcode( 'bigcommerce', array( 'Bigcommerce_display', 'shortcode' ) );
add_shortcode( 'Interspire', array( 'Bigcommerce_display', 'shortcode' ) );
add_shortcode( 'interspire', array( 'Bigcommerce_display', 'shortcode' ) );
