<?php

// Bigcommerce Communications Class
class Bigcommerce_api {

	// Communications
	private function communicate( $path, $cache = true) {

		$cached_data = get_option( 'wpinterspire_'.$path );
		if($cache && !empty($cached_data) && !isset($_GET['cache']) && !(isset( $_REQUEST['rebuild'] ) && $_REQUEST['rebuild'] == 'all')) {
			return $cached_data;
		}

		$options = Bigcommerce_settings::get_options();
		$storepath = Bigcommerce_parser::storepath( true );
		$args = array(
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode(
					"{$options->username}:{$options->xmltoken}"
				)
			),
			'sslverify' => 0,
			'timeout' => 20
		);
		$response = wp_remote_request( $storepath . $path, $args );

		if( is_wp_error( $response )) {
			Bigcommerce_settings::$errors[] = $response->get_error_message();
			delete_option( 'wpinterspire_'.$path );
			return false;
		} elseif(isset($response['response']['code']) && (int)$response['response']['code'] !== 200) {
			return false;
		}

		if($cached_data) {
			update_option( 'wpinterspire_'.$path, $response['body']);
		} else {
			add_option( 'wpinterspire_'.$path, $response['body'], '', 'no');
		}

		return isset( $response['body'] ) ? $response['body'] : false;
	}

	// Get Product Image
	function GetDetail( $uri ) {

		// Query Bigcommerce API
		$response = self::communicate( $uri );

		// Handle Lack Of Response
		if( ! $response || empty( $response ) ) { return false; }

		// Output
		return $response;
	}

	// Get Products
	function GetProducts($cache = true) {

		// Query Bigcommerce API
		$response = self::communicate( 'products', $cache);

		// Handle Lack Of Response
		if( ! $response || empty( $response ) ) { return false; }

		return Bigcommerce_parser::XmlToObject( $response, 'product' );
	}

	// Get Categories
	function GetCategories($cache = true) {

		// Query Bigcommerce API
		$response = self::communicate( 'categories', $cache);

		// Handle Lack Of Response
		if( ! $response || empty( $response ) ) { return false; }

		return Bigcommerce_parser::XmlToObject( $response, 'category' );
	}
}
