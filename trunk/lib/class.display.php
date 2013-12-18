<?php

// Plugin Display Class
class Bigcommerce_display {

	// Handle Shortcodes
	static function shortcode( $atts, $content = '') {
		extract(
			shortcode_atts(
				array(
					'link' => '',
					'rel' => '',
					'target' => '',
					'nofollow' => '',
					'category' => '',
				), $atts
			)
		);

		// Handle Category Lookup
		if( $category ) {
			return Bigcommerce_parser::DisplayProductsInCategory( $category );
		}

		// Handle Link
		if( $rel ) { $rel = " rel='{$rel}'"; }
		if( $target ) { $target = " target='{$target}'"; };
		if( $nofollow ) { $nofollow = " nofollow='nofollow'"; };
		$extra = "{$rel}{$target}{$nofollow}";
		$storepath = untrailingslashit( Bigcommerce_parser::storepath() );
		return "<a href='{$storepath}{$link}'{$extra}>{$content}</a>";
	}

	// Give Thanks Footer Link
	static function wp_footer() {
		$options = Bigcommerce_settings::get_options();
		if( ! empty( $options->showlink ) && $options->showlink == 'yes' ) {
			echo '
				<p style="text-align:center;">
					This site uses the
					<a href="http://wordpress.org/extend/plugins/interspire-bigcommerce/">
					Bigcommerce WordPress Plugin</a>
				</p>
			';
		}
	}

	// Products Listings Row
	static function DisplayProductRow( $data ) {
		$storepath = Bigcommerce_parser::storepath();

		if(!empty($data->image)) {
			$image = sprintf("<a href='{$data->image}' title='%s'>
								<img src='{$data->image}' style='float:left;max-width:35%%;max-height:200px;padding:10px;' class='bigcommerce_image' alt='%s' />
					</a>", __( 'Click to enlarge', 'wpinterspire' ), esc_html( $data->name ));
		} else {
			$image = apply_filters( 'bigcommerce_no_image', sprintf("<img src='".plugins_url( 'no_image_available.png', BIGCOMMERCE_PLUGIN_FILE )."' style='float:left;max-width:35%%;max-height:200px;padding:10px;' class='bigcommerce_image' alt='%s' />", esc_html( $data->name )));
		}

		return apply_filters(
			'bigcommerce_display_product_row',
			sprintf(
				"
					<div class='bigcommerce-row'>
						<h2 class='title {$data->is_featured}'>{$data->name}</h2>
						<div style='padding:10px 20px;'>
							%s
							<table style='border:0;width:55%%;float:right;'>
								<tbody>
									<tr>
										<th>%s</th>
										<td>{$data->sku}</td>
									</tr>
									<tr>
										<th>%s</th>
										<td>{$data->availability}</td>
									</tr>
									<tr>
										<th>%s</th>
										<td>{$data->condition}</td>
									</tr>
									<tr>
										<th>%s</th>
										<td>{$data->price}</td>
									</tr>
									<tr>
										<th>%s</th>
										<td>{$data->warranty}</td>
									</tr>
									<tr>
										<th>%s</th>
										<td>{$data->rating}</td>
									</tr>
									<tr>
										<th></th>
										<td><a href='{$storepath}{$data->link}/' title='%s'>%s</a></td>
									</tr>
								</tbody>
							</table>
							<div style='clear:both;'></div>
						</div>
					</div>
				",
				$image,
				__( 'SKU', 'wpinterspire' ),
				__( 'Availability', 'wpinterspire' ),
				__( 'Condition', 'wpinterspire' ),
				__( 'Price', 'wpinterspire' ),
				__( 'Warranty', 'wpinterspire' ),
				__( 'Rating', 'wpinterspire' ),
				sprintf( __( 'View %s in the store', 'wpinterspire' ), esc_html( $data->name ) ),
				__( 'Buy Now', 'wpinterspire' )
			),
			$data,
			$storepath
		);
	}
}

