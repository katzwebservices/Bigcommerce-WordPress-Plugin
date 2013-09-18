<?php

add_action('admin_init', 'bigcommerce_presstrends_plugin');

function bigcommerce_presstrends_plugin() {
	// PressTrends Account API Key
	$api_key = 'mc9ossbhdx30z6l7x4dnchacxpzhp6e054t4';
	$auth    = 'kkodio5ngy06tzxtco4z1nw0n8l9f5mzg';
	// Start of Metrics
	global $wpdb;
	$data = get_transient( 'presstrends_cache_data' );
    if ( !$data || $data == '' ) {
		$api_base = 'http://api.presstrends.io/index.php/api/pluginsites/update/auth/';
		$url      = $api_base . $auth . '/api/' . $api_key . '/';
		$count_posts    = wp_count_posts();
		$count_pages    = wp_count_posts( 'page' );
		$comments_count = wp_count_comments();
		if ( function_exists( 'wp_get_theme' ) ) {
		    $theme_data = wp_get_theme();
		    $theme_name = urlencode( $theme_data->Name );
		} else {
		    $theme_data = get_theme_data( get_stylesheet_directory() . '/style.css' );
		    $theme_name = $theme_data['Name'];
		}
		$plugin_name = '&';
		foreach ( get_plugins() as $plugin_info ) {
		    if(strlen($plugin_name) > 3000) { continue; } // Too long!
		    $plugin_name .= $plugin_info['Name'] . '&';
		}

		// CHANGE __FILE__ PATH IF LOCATED OUTSIDE MAIN PLUGIN FILE
		$plugin_data         = get_plugin_data( __FILE__ );
		$posts_with_comments = $wpdb->get_var( "SELECT COUNT(*) FROM $wpdb->posts WHERE post_type='post' AND comment_count > 0" );
		$data                = array(
		    'url'             => stripslashes( str_replace( array( 'http://', '/', ':' ), '', site_url() ) ),
		    'posts'           => $count_posts->publish,
		    'pages'           => $count_pages->publish,
		    'comments'        => $comments_count->total_comments,
		    'approved'        => $comments_count->approved,
		    'spam'            => $comments_count->spam,
		    'pingbacks'       => $wpdb->get_var( "SELECT COUNT(comment_ID) FROM $wpdb->comments WHERE comment_type = 'pingback'" ),
		    'post_conversion' => ( $count_posts->publish > 0 && $posts_with_comments > 0 ) ? number_format( ( $posts_with_comments / $count_posts->publish ) * 100, 0, '.', '' ) : 0,
		    'theme_version'   => $plugin_data['Version'],
		    'theme_name'      => $theme_name,
		    'site_name'       => str_replace( ' ', '', get_bloginfo( 'name' ) ),
		    'plugins'         => count( get_option( 'active_plugins' ) ),
		    'plugin'          => urlencode( $plugin_name ),
		    'wpversion'       => get_bloginfo( 'version' ),
		);
		foreach ( $data as $k => $v ) {
		    $url .= $k . '/' . $v . '/';
		}
		$results = wp_remote_get( $url );
		set_transient( 'presstrends_cache_data', $data, 60 * 60 * 24 );
	}
}