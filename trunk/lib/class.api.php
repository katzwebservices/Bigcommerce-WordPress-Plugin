<?php

// Bigcommerce Communications Class
class Bigcommerce_api {

	// Communications
	static private function communicate( $path, $cache = true, $filters = array()) {
		$key = 'ispr'.sha1('wpinterspire_'.$path.implode('.', $filters));

		$cached_data = get_option($key);
		if($cache && !empty($cached_data) && !isset($_GET['bc-cache']) && !(isset( $_REQUEST['rebuild'] ) && $_REQUEST['rebuild'] == 'all')) {
			return $cached_data;
		}

		$options = Bigcommerce_settings::get_options();
		$path = preg_match('/http/', $path) ? $path : Bigcommerce_parser::storepath( true ) . $path;
		$args = array(
			'headers' => array(
				'Authorization' => 'Basic ' . base64_encode(
					"{$options->username}:{$options->xmltoken}"
				)
			),
			'sslverify' => 0,
			'timeout' => 20,
			'method' => 'GET'
		);

		$response = wp_remote_request( add_query_arg($filters, $path), $args );

		if( is_wp_error( $response )) {
			Bigcommerce_settings::$errors[] = $response->get_error_message();
			delete_option( $key );
			return false;
		} elseif(isset($response['response']['code']) && (int)$response['response']['code'] !== 200) {
			return false;
		}

		if($cached_data) {
			update_option( $key, $response['body']);
		} else {
			add_option( $key, $response['body'], '', 'no');
		}

		return isset( $response['body'] ) ? $response['body'] : false;
	}

	// Get Product Image
	static function GetDetail( $uri ) {

		// Query Bigcommerce API
		$response = self::communicate( $uri );

		// Handle Lack Of Response
		if( ! $response || empty( $response ) ) { return false; }

		// Output
		return $response;
	}

	static function GetProductsCount($cache = true) {
		$product_count = self::communicate( 'products/count.json', $cache);
		$product_count = json_decode($product_count);
		if(isset($product_count->count)) {
			$product_count = $product_count->count;
			return $product_count;
		}

		return NULL;
	}

	// Get Products
	static function GetProducts($cache = true, $show_output = false) {

		$per_page = 200;

		$count = self::GetProductsCount($cache);
		$pageCount = ceil($count/$per_page);

		if($show_output) {
			printf('<li>There are %d products to fetch.</li>', $count);
			ob_flush();
		}

		$i = 0;
		$responses = array();
		while ($i < $pageCount) {

	    	if($show_output) {
	    		$low = $per_page * $i;
	    		$low = $low + 1;
	    		$high = $per_page * ($i + 1);
	    		if($high > $count) { $high = $count; }
	    		printf('<li>Fetching products %s - %s (page %d of %d)', $low, $high, ($i + 1), $pageCount);
	    		ob_flush();
	    	}

	    	$i++;
	    	$filter = array('limit' => $per_page, 'page' => $i);
			$response = self::communicate( 'products.json', $cache, $filter);
			$responses = @array_merge($responses, json_decode($response));
			if($show_output) {
				echo '&hellip;done.</li>';
				ob_flush();
			}
	    }

	    // Handle Lack Of Response
		if( ! $response || empty( $response ) ) { return false; }

	    return $responses;
	}

	static function GetCategoriesCount($cache = true) {
		$cat_count = self::communicate( 'categories/count.json', $cache);
		$cat_count = json_decode($cat_count);
		if(isset($cat_count->count)) {
			$cat_count = $cat_count->count;
			return $cat_count;
		}

		return NULL;
	}

	// Get Categories
	static function GetCategories($cache = true, $show_output = false) {

		$per_page = 50;

		$count = self::GetCategoriesCount($cache);
		$pageCount = ceil($count/$per_page);

		if($show_output) {
			printf('<li>There are %d categories to fetch.</li>', $count);
			ob_flush();
		}

		$i = 0;
		$responses = array();
		while ($i < $pageCount) {

			if($show_output) {
				$low = $per_page * $i;
				$low = $low + 1;
				$high = $per_page * ($i + 1);
				if($high > $count) { $high = $count; }
				printf(__('<li>Fetching: categories %s - %s (page %d of %d)', 'wpinterspire'), $low, $high, ($i + 1), $pageCount);
				ob_flush();
			}

			$i++;
			$filter = array('limit' => $per_page, 'page' => $i);
			$response = self::communicate( 'categories.json', $cache, $filter);
			$responses = @array_merge($responses, json_decode($response));

			if($show_output) {
				echo __('&hellip;done.', 'wpinterspire');
				echo '</li>';
				ob_flush();
			}
		}

		// Handle Lack Of Response
		if( !isset($response) || empty( $response ) ) { return false; }

	    return $responses;
	}
}
