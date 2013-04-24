<?php

// Plugin Parser Class
class Bigcommerce_parser {

	// Cleans Store URL
	public function storepath( $api=false ) {
    	$options = Bigcommerce_settings::get_options();

		// Ensure API URL Is Secure
		$options->storepath = str_replace( 'http://', 'https://', $options->storepath );

		// Convert API v1 URLs To v2
		$options->storepath = str_replace( '/xml.php', '/api/v2/', $options->storepath );

		// Ensure The API URL Has a Trailing Slash
		$options->storepath = (
			substr( $options->storepath, ( strlen( $options->storepath ) - 1 ), 1 ) != '/'
		) ? "{$options->storepath}/" : $options->storepath;

		// Ensure The API URL Contains The API Path
		$options->storepath = ( strstr( $options->storepath, '/api/v2/' ) )
			? $options->storepath
			: "{$options->storepath}api/v2/";

		// Remove API Path, Except For The API
		return ( $api )
			? $options->storepath
			: str_replace( '/api/v2/', '/', $options->storepath );
	}

	// Converts XML To Object
	public function XmlToObject( $xml, $test ) {

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

	// Gets Live Image URL
	public function GetImage( $link ) {
		$image = Bigcommerce_api::GetDetail( substr( $link, 1 ) );
		if(!$image) { return false; }
		$xml = self::XmlToObject( $image, 'image' );
		$image = isset($xml->image) ? $xml->image : $xml;
		$path = is_array($image) ? $image[0]->image_file : $image->image_file;
		return self::storepath() . 'product_images/' . (string)$path;
	}

	// Builds Select Box For Products
	public function BuildProductsSelect( $rebuild ) {

		// Not Forcing Rebuild
		if( ! $rebuild ) {
			return get_option( 'wpinterspire_productselect' );
		}

		// Get Products
		if ( ! $items = Bigcommerce_api::GetProducts() ) { return false; }

		// Generate HTML Selector
		$output = '
			<select id="interspire_add_product_id">
			<option value="" disabled="disabled" selected="selected">Products</option>
		';
		foreach( $items as $item ) {
			if( ! isset( $item->is_visible ) || ! $item->is_visible ) { continue; }
			if( ! isset( $item->name ) ) { continue; }
			$value = sanitize_title( $item->name );
			$name = esc_html( $item->name );
			$output .= "<option value='{$value}'>{$name}</option>";
		}
		$output .= '</select>';

		// Save HTML Selector To Cache
		update_option( 'wpinterspire_productselect', $output );
		return $output;
	}

	// Builds Select Box For Categories
	public function BuildCategoriesSelect( $rebuild ) {

		// Not Forcing Rebuild
		if( ! $rebuild ) {
			return get_option( 'wpinterspire_categoryselect' );
		}

		// Get Products
		if ( ! $items = Bigcommerce_api::GetCategories() ) { return false; }

		// Generate HTML Selector
		$output = '
			<select id="interspire_add_category_id">
			<option value="" disabled="disabled" selected="selected">Categories</option>
		';
		$categories = array();
		$options = array();
		foreach( $items as $item ) {
			$categories[(int) $item->id] = esc_html( $item->name );
			if( ! isset( $item->is_visible ) || ! $item->is_visible ) { continue; }
			if( ! isset( $item->name ) ) { continue; }
			$value = $item->id;
			$name = esc_html( $item->name );
			foreach( $item->parent_category_list as $val ) {
				$parent = $categories[(int) $val->value];
				if( $parent == $name ) { continue; }
				$name = "{$parent} &gt; {$name}";
			}
			$options[$name] = "<option value='{$value}'>{$name}</option>";
		}
		ksort( $options );
		foreach( $options as $option ) { $output .= $option; }
		$output .= '</select>';

		// Save HTML Selector To Cache
		update_option( 'wpinterspire_categoryselect', $output );
		return $output;
	}

	// Outputs Products In a Category
	function DisplayProductsInCategory( $catid ) {
		$output = '';

		// Find Products
		$products = Bigcommerce_api::GetProducts();

		if( $products ) {

			foreach( $products as $product ) {
				foreach( $product->categories as $product_category ) {
					$product_category = intval( $product_category->value );

					// Product Matches Category
					if( $catid == $product_category ) {

						// Ensure Visible
						if( (string) $product->is_visible != 'true' ) { continue; }

						// Check For Image
						$image = '<p>No image available</p>';
						if( isset( $product->images->link ) ) {
							$image = self::GetImage($product->images->link);
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