<?php

// Plugin Parser Class
class Bigcommerce_parser {

	// Cleans Store URL
	static public function storepath( $api=false ) {
    	$options = Bigcommerce_settings::get_options();

		// Ensure API URL Is Secure
		$options->storepath = str_replace( 'http://', 'https://', $options->storepath );

		// Convert API v1 URLs To v2
		$options->storepath = str_replace( '/xml.php', '/api/v2/', $options->storepath );

		// Ensure The API URL Has a Trailing Slash
		$options->storepath = trailingslashit( $options->storepath );

		// Ensure The API URL Contains The API Path
		$options->storepath = ( strstr( $options->storepath, '/api/v2/' ) )
			? $options->storepath
			: "{$options->storepath}api/v2/";

		// Remove API Path, Except For The API
		return ( $api )
			? $options->storepath
			: str_replace( '/api/v2/', '/', $options->storepath );
	}

	// Converts JSON To Object
	static public function JSONToObject( $json ) {

		// Try To Convert
		try {
			$response = json_decode($json);
			return $response;

		// Catch Error In Conversion
		} catch ( Exception $error ) {
			Bigcommerce_settings::$errors[] = $error;
			return false;
		}

		// Handle Bad Response
		if( isset( $response->errors->error[0]->message ) ) {
			Bigcommerce_settings::$errors[] = $response->errors->error[0]->message;
			return false;
		}

		// Handle Good Response
		return isset( $response->$test ) ? $response->$test : false;
	}

	// Converts XML To Object
	static public function XmlToObject( $xml, $test ) {

		// Try To Convert
		try {
			$response = new SimpleXMLElement( $xml, LIBXML_NOCDATA );
			return $response;

		// Catch Error In Conversion
		} catch ( Exception $error ) {
			Bigcommerce_settings::$errors[] = $error;
			return false;
		}

		// Handle Bad Response
		if( isset( $response->errors->error[0]->message ) ) {
			Bigcommerce_settings::$errors[] = $response->errors->error[0]->message;
			return false;
		}

		// Handle Good Response
		return isset( $response->$test ) ? $response->$test : false;
	}

	// Get an array of all image paths
	static public function GetImages( $link, $all = false ) {
		return self::GetImage($link, true);
	}

	// Gets Live Image URL
	static public function GetImage( $link, $all = false ) {
		if(is_object($link)) {
			if(!empty($link->images->url)) {
				$link = $link->images->url;
			} else {
				return false;
			}
		}
		$image = Bigcommerce_api::GetDetail( $link );
		if(!$image) { return false; }
		$images = self::JSONToObject( $image );
		if(!$images) { return false; }
		foreach((array)$images as $image) {
			if(!empty($image->is_thumbnail) && empty($all)) {
				return self::storepath() . 'product_images/' . (string)$image->image_file;
			}
			$output[] = self::storepath() . 'product_images/' . (string)$image->image_file;
		}
		if($all) { return $output; }
	}


	// Builds Select Box For Products
	static public function BuildProductsSelect( $rebuild, $show_output = false) {

		// Not Forcing Rebuild
		if( ! $rebuild ) {
			return get_option( 'wpinterspire_productselect' );
		}

		// Get Products
		$items = Bigcommerce_api::GetProducts( empty($rebuild), $show_output);

		if ( empty($items) ) { return false; }

		// Generate HTML Selector
		$output = '
			<select id="interspire_add_product_id">
			<option value="" disabled="disabled" selected="selected">Products</option>
		';

		$hide_invisible = Bigcommerce_settings::get_option('hideinvisible');

		foreach( $items as $item ) {
			if( ! isset( $item->name ) ) { continue; }
			$value = $item->custom_url;
			$name = esc_html( $item->name );
			$hidden = '';
			if( ! isset( $item->is_visible ) || ! $item->is_visible) {
				if($hide_invisible) { continue; }
				$hidden = __(' (Not Visible in Store)', 'wpinterspire');
			}
			$output .= "<option value='{$value}'>{$name}{$hidden}</option>";
		}
		$output .= '</select>';

		// Save HTML Selector To Cache
		// Delete first and add so it can specify no autoload.
		delete_option( 'wpinterspire_productselect' );
		add_option( 'wpinterspire_productselect', $output, '', 'no' );

		return $output;
	}

	// Builds Select Box For Categories
	static public function BuildCategoriesSelect( $rebuild, $show_output = false ) {

		// Not Forcing Rebuild
		if( ! $rebuild ) {
			return get_option( 'wpinterspire_categoryselect' );
		}

		// Get Products
		if ( ! $items = Bigcommerce_api::GetCategories($rebuild, $show_output) ) { return false; }

		// Generate HTML Selector
		$output = '
			<select id="interspire_add_category_id">
			<option value="" disabled="disabled" selected="selected">Categories</option>
		';
		$categories = array();
		$options = array();

		// Build all cats for reference
		$categories = array();
		foreach( $items as $item ) {
			$name = esc_html( $item->name );
			$categories[(int) $item->id] = esc_html( $name );
		}

		foreach( $items as $item ) {
			$name = esc_html( $item->name );

			if( empty($item->is_visible) ) { continue; }
			if( ! isset( $item->name ) ) { continue; }
			$value = $item->id;

			foreach( $item->parent_category_list as $val ) {
				if(empty($val)) { continue; }
				$parent = $categories[(int) $val];
				if( empty($parent) || $parent == $name ) { continue; }
				$name = "{$parent} &gt; {$name}";
			}
			$options[$name] = "<option value='{$value}'>{$name}</option>";
		}
		ksort( $options );
		foreach( $options as $option ) { $output .= $option; }
		$output .= '</select>';

		// Save HTML Selector To Cache
		// Delete first and add so it can specify no autoload.
		delete_option( 'wpinterspire_categoryselect' );
		add_option( 'wpinterspire_categoryselect', $output, '', 'no' );

		return $output;
	}

	// Outputs Products In a Category
	static function DisplayProductsInCategory( $catid ) {
		$output = '';

		// Find Products
		$products = Bigcommerce_api::GetProducts();

		if( $products ) {

			foreach( $products as $product ) {
				foreach( $product->categories as $product_category ) {

					$product_category = isset($product_category->value) ? intval( $product_category->value ) : intval($product_category);

					// Product Matches Category
					if( (int)$catid === $product_category ) {

						// Ensure Visible
						if( $product->is_visible != 'true' && $product->is_visible != '1' ) { continue; }

						// Check For Image
						$image = self::GetImage( $product );
						if(empty($image)) {
							$image = '<p>No image available</p>';
						}

						// Output The Row
						$output .= Bigcommerce_display::DisplayProductRow(
							(object) array(
								'is_featured' => (
									( (string) $product->is_featured == 'true' )
										? 'featured' : ''
								),
								'name' => (string) $product->name,
								'sku' => (
									( (string) $product->sku )
										? (string) $product->sku
										: 'Not specified'
								),
								'price' => (
									( (string) $product->is_price_hidden == 'true' )
										? 'Not specified'
										: (
											( (int) $product->retail_price > 0 )
											? '$' . number_format( (int) $product->retail_price, 2 )
											: '$' . number_format( (int) $product->price, 2 )
										)
								),
								'condition' => (
									( (string) $product->is_condition_shown == 'false' )
										? 'Not specified'
										: (string) $product->condition
								),
								'availability' => ucwords( (string) $product->availability ),
								'link' => sanitize_title( (string) $product->name ),
								'image' => $image,
								'warranty' => (
									( (string) $product->warranty )
										? (string) $product->warranty
										: 'Not specified'
								),
								'rating' => (
									( (int) $product->rating_count === 0 )
										? 'No ratings available'
										: (int) $product->rating_total
											. " (from {$data->rating_count} ratings)"
								),
							)
						);
					}
				}
			}
		}

		// Output
		return ( $output )
			? $output
			: __(
				sprintf( "Unable to find any products within category ID: %d</p>", $catid ),
				'wpinterspire'
			);
	}
}

?>