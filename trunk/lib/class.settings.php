<?php

// Plugin Settings Class
class Bigcommerce_settings {
	static $options;
	static $configured = false;
	static $errors = array();

	// Gets Stored Settings, Failover To Defaults
	function get_options() {
		if(!empty(self::$options)) {
			return self::$options;
		}

		self::$options = ( object ) get_option(
			'wpinterspire', array(
				'username' => '',
				'xmltoken' => '',
				'storepath' => '',
				'showlink' => '',
				'hideinvisible' => 'yes'
			)
		);

		return self::$options;
	}

	// Gets Stored Settings, Failover To Defaults
	function get_option($key) {

		$options = self::get_options();

		if(isset($options->{$key})) {

			if($options->{$key} === 'yes') {
				return true;
			} elseif($options->{$key} === 'no') {
				return false;
			}

			return $options->{$key};
		}

		return NULL;
	}

	// Tied To WP Hook By The Same Name
	function admin_init() {
		global $pagenow;

		// Handles Saving Of Settings
        register_setting(
        	'wpinterspire_options',
        	'wpinterspire',
        	array( 'Bigcommerce_settings', 'sanitize_settings' )
        );

		// Load Support For Localizations
		load_plugin_textdomain( 'bigcommerce', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
		load_plugin_textdomain( 'wpinterspire', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

		// Only Continue For Self Settings Page
		if(
			$pagenow == 'options-general.php'
			&& isset( $_REQUEST['page'] )
			&& $_REQUEST['page'] != 'bigcommerce'
		) { return; }

		// Run Settings Check
		self::$configured = self::CheckSettings();

		// (Re)Build Products Upon Request
		if (
			isset( $_REQUEST['rebuild'] )
			&& $_REQUEST['rebuild'] == 'all'
		) {
			Bigcommerce_parser::BuildProductsSelect( true );
			Bigcommerce_parser::BuildCategoriesSelect( true );
		}
    }

	// Sanitizes Setting Value Submissions
	function sanitize_settings( $input ) {
		return $input;
	}

	// Checks Saved Settings
	function CheckSettings() {
    	return ( Bigcommerce_api::GetCategories(!isset($_GET['settings-updated'])) );
	}

	// Tied To WP Hook By The Same Name - Adds Settings Link
	function plugin_action_links( $links ) {
		$links['settings'] = '<a href="options-general.php?page=bigcommerce">'
			. __( 'Settings', 'wpinterspire' ) . '</a>';
		return $links;
	}

	// Tied To WP Hook By The Same Name - Adds Admin Submenu Link
    function admin_menu() {
		add_options_page(
			__('Bigcommerce', 'wpinterspire'),
			__('Bigcommerce', 'wpinterspire'),
			'administrator',
			'bigcommerce',
			array( 'Bigcommerce_settings', 'admin_page' )
		);
    }

    // Tied To Admin Submenu Link
	function admin_page() {
    	$options = self::get_options();
		$vendors = array(
			'http://katz.si/bigc',
		);
		require( dirname( __FILE__ ) . '/../views/admin-page.html.php' );
    }

	// Displays The Configuration Check
	function show_configuration_check() {

		// Configured
		if( self::$configured ) {

			$built = self::is_cache_built();

			// Configured Message
			$content = __( 'Your Bigcommerce API settings are configured properly.', 'wpinterspire' )
				. (

					// Add Caching Status Messages
					!$built
					? __( ' However, your products and categories have not yet been built.', 'wpinterspire' )
					: __( ' When editing posts, look for the ', 'wpinterspire' )
						. '<img src="' . plugins_url( 'favicon.png', dirname( __FILE__ ) )
						. '" width="16" height="16" alt="' . __( 'Bigcommerce icon', 'wpinterspire') . '" />'
						. __( ' icon. Click it to add a product to your post or page.', 'wpinterspire' )
				);
		// Unconfigured
		} else {
			$built = false;
			$content =  __( 'Your Bigcommerce API settings are not configured properly.', 'wpinterspire' );

			// Add Specific Errors
			if( self::$errors ) {
				$content .= '<br /><blockquote>' . implode( '<br />', self::$errors ) . '</blockquote>';
			}
		}

		// Output
		echo self::make_notice_box(
			$content, ( ( self::$configured ) ? false : true )
		);

		return $built;
	}

	function is_cache_built() {
		$cat_select = get_option( 'wpinterspire_categoryselect' );
		$prod_select = get_option( 'wpinterspire_productselect' );
		return (!empty($cat_select) && !empty($prod_select));
	}

	// Generic Notice Box Maker
    function make_notice_box( $content, $error=false ) {
        $output = '';
        if( ! $error ) {
        	$output .= '<div id="message" class="updated">';
        } else {
            $output .= '<div id="messgae" class="error">';
        }
        $output .= '<p>' . $content . '</p></div>';
        return $output;
    }
}

?>