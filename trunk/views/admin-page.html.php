<div class="wrap">

	<h2 style="line-height:48px;"><img class="alignleft" alt="" src="<?php echo plugins_url('favicon.png', BIGCOMMERCE_PLUGIN_FILE); ?>" width="48" height="48" /> Bigcommerce for WordPress</h2>

	<?php $is_cache_built = Bigcommerce_settings::show_configuration_check(); ?>

	<hr />

	<?php if( self::$configured ) { ?>

	<p>
		<?php

		echo $is_cache_built ? 'Your cache has been built:</p>'
				. '<p>'.Bigcommerce_parser::BuildCategoriesSelect( false ).'</p>'
				. '<p>'.Bigcommerce_parser::BuildProductsSelect( false ).'</p>'
				. '<p><strong>Has the list changed?</strong>'
			: 'Your cache has not yet been built.';
		?>
		<a href='<?php echo admin_url( 'admin-ajax.php?action=bigcommerce_rebuild&amp;TB_iframe=true&amp;width=600&amp;height=800' ); ?>' class='thickbox' title="<?php echo  $is_cache_built ? 'Re-build your products list' : 'Build your products list'; ?>">
			<?php echo  $is_cache_built ? 'Re-build your Bigcommerce lists' : 'Build your products list'; ?>
		</a><br />
		<small>
			<?php _e( 'Note: this may take some time, depending on the size of your products.', 'wpinterspire' ); ?>
		</small>
	</p>

	<?php } else { ?>

	<h3>
		<?php _e( 'This Plugin requires a Bigcommerce account.', 'wpinterspire' ); ?>
	</h3>
	<h4>
		<?php _e( 'What is Bigcommerce?', 'wpinterspire' ); ?>
	</h4>
	<p>
		<?php _e( 'Bigcommerce is the #1 rated hosted e-commerce platform.', 'wpinterspire' ); ?>
		<?php _e( 'If you want to have an e-commerce store without having to manage the server, security, and payments, Bigcommerce is for you.', 'wpinterspire' ); ?>
	</p>
	<p>
		<a href="<?php shuffle( $vendors ); echo $vendors[0]; ?>" target="_blank">
			<?php _e( 'Visit Bigcommerce.com to start your own online store today!', 'wpinterspire' ); ?>
		</a>
		<?php _e( 'You can also check out all the', 'wpinterspire' ); ?>
		<a href="http://www.bigcommerce.com/showcase/" target="_blank">
			<?php _e( 'neat stores that use Bigcommerce', 'wpinterspire' ); ?>
		</a>.
	</p>

	<?php } ?>
	<hr />

	<h3><?php _e( 'Store Settings', 'wpinterspire' ); ?></h3>
	<form method="post" action="options.php">
		<input type='hidden' name='wpinterspire[configured]' value='<?php echo Bigcommerce_settings::$configured; ?>' />
		<?php
		wp_nonce_field( 'update-options' );
		settings_fields( 'wpinterspire_options' );
		?>
		<table class="form-table">
			<tbody>
				<tr>
					<th scope="row">
						<label for="wpinterspire_username">
							<?php _e( 'Store Username', 'wpinterspire' ); ?>:
						</label>
					</th>
					<td>
						<input type='text' name='wpinterspire[username]' id='wpinterspire_username' value='<?php echo esc_attr( $options->username ); ?>' size='40' /><br />
						<small>
							<?php _e( 'Your store username, such as ', 'wpinterspire'); ?>
							<code>admin</code>.
							<?php _e( 'Find this setting by logging into your store, and clicking on Users.', 'wpinterspire'); ?>
						</small>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="wpinterspire_xmltoken">
							<?php _e( 'API Token', 'wpinterspire' ); ?>:
						</label>
					</th>
					<td>
						<input type='text' name='wpinterspire[xmltoken]' id='wpinterspire_xmltoken' value='<?php echo esc_attr( $options->xmltoken ); ?>' size='40' /><br />
						<small>
							<?php _e( 'Your API Token for the store username specified above.', 'wpinterspire'); ?>
							<?php _e( 'Find this setting by logging into your store, clicking on Users, clicking Edit for the store username specified above, then scrolling down to the API Token.', 'wpinterspire'); ?>
						</small>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<label for="wpinterspire_storepath">
							<?php _e( 'Store URL', 'wpinterspire' ); ?>:
						</label>
					</th>
					<td>
						<input type='text' name='wpinterspire[storepath]' id='wpinterspire_storepath' value='<?php echo esc_attr( $options->storepath ); ?>' size='40' /><br />
						<small>
							<?php _e( 'Your store URL or API URL', 'wpinterspire'); ?><br />
							For example: <code>https://www.mystore.com/</code><br />
							or <code>https://store-abcdefg.mybigcommerce.com/api/v2/</code>
						</small>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<?php _e( 'Only Display Visible Products In Link Creator', 'wpinterspire' ); ?>:
					</th>
					<td>
						<input type='checkbox' name='wpinterspire[hideinvisible]' id='wpinterspire_hideinvisible' value='yes' <?php echo ( ( isset( $options->hideinvisible ) && $options->hideinvisible == 'yes' ) ? 'checked=checked' : '' ); ?> />
						<label for="wpinterspire_hideinvisible">
							<?php _e( 'Only show visible products in the "Add Bigcommerce Link" feature.', 'wpinterspire'); ?>
						</label><br />
						<small>
							<?php _e( 'You will need to rebuild the products list after changing this setting.', 'wpinterspire'); ?>
						</small>
					</td>
				</tr>
				<tr>
					<th scope="row">
						<?php _e( 'Give Thanks', 'wpinterspire' ); ?>:
					</th>
					<td>
						<input type='checkbox' name='wpinterspire[showlink]' id='wpinterspire_showlink' value='yes' <?php echo ( ( isset( $options->showlink ) && $options->showlink == 'yes' ) ? 'checked=checked' : '' ); ?> />
						<label for="wpinterspire_showlink">
							<?php _e( 'Help show the love by telling the world you use this plugin.', 'wpinterspire'); ?>
						</label><br />
						<small>
							<?php _e( 'A link will be added to your footer.', 'wpinterspire'); ?>
							<?php _e( 'Please show support for this Plugin by enabling.', 'wpinterspire'); ?>
						</small>
					</td>
				</tr>
			</tbody>
		</table>
		<input type="hidden" name="action" value="update" />
		<p>
			<input type="submit" class="button-primary" name="save"
				value="<?php _e( 'Save Changes', 'wpinterspire' ); ?>" />
		</p>
	</form>
	<style>
	.wrap select {width: 400px; max-width: 400px; }
	</style>
	<script>
	jQuery(document).ready(function($) {
		$('.wrap select').select2({
			width: 'element'
		});
	});
	</script>
</div>