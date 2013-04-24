<?php

// Plugin Media Class
class Bigcommerce_media {

	// Tied To WP Hook By The Same Name - Adds Product Images Tab To Media Popup
	function media_upload_tabs( $tabs ) {
		return array_merge(
			$tabs, array( 'wpinterspire' => __( 'Bigcommerce', 'wpinterspire' ) )
		);
	}

	// Tied To WP Hook By The Same Name - Adds Menu Item For Processing Media
	function media_upload_wpinterspire() {
		return wp_iframe( array( 'Bigcommerce_media', 'media_process' ) );
	}

	// Tied To WP Hook By The Same Name - Ads Icon To WYSIWYG Posts/Pages Editor
	function media_buttons_context( $context ) {
		if( ! Bigcommerce_settings::$configured ) { return $context; }
		return $context . '
			<style>
			.wp-media-buttons .wpinterspire { padding-left: 3px!important; }
			.wp-media-buttons .wpinterspire span.wp-media-buttons-icon {
				background: transparent url(' . plugins_url( 'favicon-small.png', dirname( __FILE__ ) ) . ') left top no-repeat;
				width: 12px;
				height:17px;
			}
			</style>
			<a href="#TB_inline?width=640&inlineId=interspire_select_product" class="thickbox button wpinterspire"
				title="' . __( 'Add Bigcommerce Link', 'wpinterspire' ) . '">
				<span class="wp-media-buttons-icon"></span>
				'.__( 'Add Bigcommerce Link', 'wpinterspire' ).'</a>
		';
	}

	// Tied To WP Hook By The Same Name - Admin Area Footer
	function admin_footer() {
		$storepath = Bigcommerce_parser::storepath();
		require( dirname( __FILE__ ) . '/../views/mce-popup.html.php' );
	}

	// Presents Product Image Choices
	function media_process() {

		$Products = Bigcommerce_api::GetProducts();

		// Present Other Tabs
		media_upload_header();

		// Handle No Products
		if( ! $Products ) {
			echo '
				<div class="tablenav">
					<form id="filter">
						<h3>'
							. __( 'The Plugin settings have not been properly configured.', 'wpinterspire' ) .
						'</h3>
					</form>
				</div>
			';
			return;
		}

		// Pagination Variables
		$perpage = apply_filters('wpinterspire_images_per_page', 20);
		$page = isset( $_GET['paged'] ) ? $_GET['paged'] : 1;
	   	$start = $perpage * ( $page - 1 );
	   	$end = $start + ( $perpage - 1 );
		$total_images = 0;

		$all_images = maybe_unserialize(get_option( 'wpinterspire_product_images'));

		if(empty($all_images) || isset($_GET['cache'])) {

			// Loop Products
			$all_images = array();
			foreach( $Products as $product ) {
				// Skip Products Without Images
				if( empty( $product->images->link ) ) { continue; }
				$path = Bigcommerce_parser::GetImage( $product->images->link );
				if(!$path) { continue; }
				$all_images[(string)$product->id] = array(
					'productid'	=> (string)$product->id,
					'name' => (string)$product->name,
					'path' => (string)$path,
				);
			}

			update_option( 'wpinterspire_product_images', $all_images);
		}

		$total_images = sizeof($all_images);
		$i = -1;
		foreach($all_images as $image) {
			$i++;

			// Limit To Per Page Quantity
			if( $i < $start || $i > $end ) { continue; }

			$images[$image['productid']] = $image;
		}

		$paginate_links = paginate_links(
			array(
				'base' => add_query_arg( 'paged', '%#%' ),
				'show_all' => true,
				'format' => '',
				'total' => ceil( $total_images / $perpage ),
				'current' => $page,
			)
		);

		// Output
		require( dirname( __FILE__ ) . '/../views/media.html.php' );
	}
}

?>