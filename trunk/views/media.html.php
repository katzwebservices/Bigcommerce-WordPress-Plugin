<?php

// Handle No Product Image
if ( ! $images ) {
	echo '<div id="message" class="error"><p>'.__('Your store has no images.', 'wpinterspire').'</p></div>';
	return;
}

?>
<style type="text/css">#wpint_loading_images { display: none; }</style>
<div style="margin: 20px;">
	<div class="tablenav">
		<div class="tablenav-pages" style="float:left">
			<span class="pagination-links">
				<?php echo $paginate_links; ?>
			</span>
		</div>
		<span style="float:right;"><?php _e(sprintf('<a href="%s">%s</a>', add_query_arg(array('bc-cache' => true)), __('Refresh Images'))); ?></span>
		<span class="displaying-num" style="float:right"><?php _e(sprintf('%d %s', $total_images, _n( 'image','images', $total_images, 'wpinterspire' ))); ?></span>
	</div>

	<table style="width: 100%;">
		<tbody>

			<?php
			// Loop Product Images
			foreach( $images as $i => $imagedata ) {
				flush();
				extract( $imagedata );
				$uniqid = uniqid();
			?>

			<tr>
				<td width="20%">
					<img id="<?php echo $uniqid; ?>" src="<?php echo $path; ?>" style="max-width: 100px; max-height: 100px;" />
				</td>
				<td width="60%"><?php echo $name; ?></td>
				<td width="20%">
					<input type="button" class="button-secondary"
						onclick="Bigcommerce_send_to_editor( '<?php echo $uniqid; ?>' );"
						value="<?php _e( 'Insert into Post', 'wpinterspire' ); ?>" />
				</td>
			</tr>

			<?php } ?>

		</tbody>
	</table>
</div>

<script type="text/javascript">
function Bigcommerce_send_to_editor( uniqid ) {
	var html = '<img src="' + jQuery( '#' + uniqid ).attr( 'src' ) + '" />';
	var win = window.dialogArguments || opener || parent || top;
	win.send_to_editor( html );
}
</script>