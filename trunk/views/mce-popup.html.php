<style type="text/css">
	.bigcommerce_modal select {
		max-width: 400px;
		width: 400px;
	}
</style>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$('.bigcommerce_modal select').select2({
			width: 'element'
		});
	});
</script>
<div id="interspire_select_product" style="display:none;">
	<div class="wrap bigcommerce_modal">
	<div id="media-upload">

		<?php
		// Check Settings
		if( ! get_option('wpinterspire_productselect') ) {
			echo '
				<p>Your settings are correct, however your product list has not been generated.</p>
				<p>
					<a href="' . admin_url( 'options-general.php?page=wpinterspire' ) . '" class="button">
					Bigcommerce Settings</a>
				</p>
			';
		} else {
		?>

		<h2><?php _e( 'Insert Product Link', 'wpinterspire' ); ?></h2>
		<table>
			<tbody>
				<tr>
					<th valign="top" scope="row" class="label">
						<span class="alignleft">
							<label for="interspire_display_title">
								<?php _e( 'Link Text', 'wpinterspire' ); ?>:
							</label>
						</span>
					</th>
					<td class="field">
						<input type="text" id="interspire_display_title" />
					</td>
				</tr>
				<tr>
					<th valign="top" scope="row" class="label">
						<span class="alignleft">
							<label for="interspire_add_product_id">
								<?php _e( 'Select the Product', 'wpinterspire' ); ?>:
							</label>
						</span>
					</th>
					<td class="field">
						<?php echo get_option( 'wpinterspire_productselect' ); ?>
					</td>
				</tr>
				<tr>
					<th valign="top" scope="row" class="label">
						<span class="alignleft">
							<label for="url">
								<?php _e( 'Additional options', 'wpinterspire' ); ?>:
							</label>
						</span>
					</th>
					<td class="field">
						<input type="checkbox" id="link_nofollow2" />
						<label for="link_nofollow2">
							<?php _e( 'Nofollow the link', 'wpinterspire' ); ?>
						</label><br />

						<input type="checkbox" id="link_target2" />
						<label for="link_target2">
							<?php _e( 'Open link in a new window', 'wpinterspire' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" class="button-primary" onclick="BigcommerceShortcodeProduct();"
							value="<?php _e( 'Insert Product', 'wpinterspire'); ?>" />
					</td>
				</tr>
			</tbody>
		</table>

		<h2><?php _e( 'Insert All Products By Category', 'wpinterspire' ); ?></h2>
		<table>
			<tbody>
				<tr>
					<th valign="top" scope="row" class="label">
						<span class="alignleft">
							<label for="interspire_add_product_id">
								<?php _e( 'Select the Category', 'wpinterspire' ); ?>:
							</label>
						</span>
					</th>
					<td class="field">
						<?php echo get_option( 'wpinterspire_categoryselect' ); ?>
					</td>
				</tr>
				<tr>
					<th valign="top" scope="row" class="label">
						<span class="alignleft">
							<label for="url">
								<?php _e( 'Additional options', 'wpinterspire' ); ?>:
							</label>
						</span>
					</th>
					<td class="field">
						<input type="checkbox" id="link_nofollow1" />
						<label for="link_nofollow1">
							<?php _e( 'Nofollow the links', 'wpinterspire' ); ?>
						</label><br />

						<input type="checkbox" id="link_target1" />
						<label for="link_target1">
							<?php _e( 'Open links in a new window', 'wpinterspire' ); ?>
						</label>
					</td>
				</tr>
				<tr>
					<td></td>
					<td>
						<input type="button" class="button-primary" onclick="BigcommerceShortcodeCategory();"
							value="<?php _e( 'Insert Products', 'wpinterspire'); ?>" />
					</td>
				</tr>
			</tbody>
		</table>

		<?php } /* End Of Settings Check */ ?>
	</div>
	</div>
</div>

<script type="text/javascript">
function BigcommerceShortcodeCategory() {
	var item_id = jQuery( '#interspire_add_category_id' ).val();
	var link_category = ' category="' + item_id + '"';
	var link_target = '';
	var link_nofollow = '';
	if( jQuery( '#link_target1' ).is( ':checked' ) ) { link_target = ' target="_blank"'; }
	if( jQuery( '#link_nofollow1' ).is( ':checked' ) ) { link_nofollow = ' rel="nofollow"'; }
	var win = window.dialogArguments || opener || parent || top;
	win.send_to_editor('[bigcommerce' + link_category + link_target + link_nofollow + ' /]');
}

function BigcommerceShortcodeProduct() {
	var item_id = jQuery( '#interspire_add_product_id' ).val();
	if( item_id == '' ) {
		alert("<?php _e('The product you selected does not have a link. Try rebuilding your product list in settings.', 'wpinterspire'); ?>");
		return;
	} else {
		var link_product = ' link="' + item_id + '"';
	}
	var display_title = jQuery( '#interspire_display_title' ).val();
	if( display_title == '' ) {
		alert( 'Please add link text.' );
		jQuery( '#interspire_display_title' ).focus();
		return;
	}
	var link_target = '';
	var link_nofollow = '';
	<?php if( ! empty( $storepath ) ) { ?>
	item_id = item_id.replace( '<?php echo $storepath; ?>', '');
	<?php } ?>
	if( jQuery( '#link_target2' ).is( ':checked' ) ) { link_target = ' target="_blank"'; }
	if( jQuery( '#link_nofollow2' ).is( ':checked' ) ) { link_nofollow = ' rel="nofollow"'; }
	var win = window.dialogArguments || opener || parent || top;
	win.send_to_editor('[bigcommerce' + link_product + link_target + link_nofollow + ']' + display_title + '[/bigcommerce]');
}
</script>