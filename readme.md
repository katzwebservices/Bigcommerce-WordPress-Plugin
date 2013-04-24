# Bigcommerce #
**Contributors:** katzwebdesign, katzwebservices  
Donate link:https://www.paypal.com/cgi-bin/webscr?cmd=_donations&business=zackkatz%40gmail%2ecom&item_name=Bigcommerce%20for%20WordPress&no_shipping=0&no_note=1&tax=0&currency_code=USD&lc=US&bn=PP%2dDonationsBF&charset=UTF%2d8
**Tags:** ecommerce, interspire, bigcommerce, e-commerce, woocommerce, shop, cart, paypal, authorize, authorize.net, stock control, ecommerce, zencart, volition, shopsite, oscommerce, zen cart, prestashop, merchant, big commerce  
**Requires at least:** 3.2  
**Tested up to:** 3.5.1  
**Stable tag:** 1.6  
**License:** GPLv2  

Integrate Bigcommerce hosted eCommerce shopping cart product images and links into WordPress.

## Description ##

You want to spend your time writing the best content, not hunting for the link or image for the product you're blogging about. This Plugin is powerful and simple to set up. It's a must have if you use WordPress and Bigcommerce.

<h3>Easily find and link to your Bigcommerce products from within WordPress</h3>

This Plugin adds a button to the post/page editor that makes it easy to link to your products.

*	Set custom link text.
*	Choose to open the link in the same window or a new window.
*	Choose to "nofollow" the link.

<h3>Easily embed your store's images</h3>

You can easily insert product images using the WordPress Add an Image button.

*	Browse all of your store's products with images.
*	Use the WordPress image editor tool to choose to link to the product page, the product image, or the full-sized product image.
*	Use the WordPress image editor tool to add alt, title, alignment and captions.

<h3>What is Bigcommerce?</h3>

Bigcommerce is the world’s leading e-commerce platform, powering more than 30,000 stores. You’ll get everything you need to create a successful online store, including a securely hosted site, shopping cart, product catalog and CRM. Themes and point-and-click design features make it easy to build a gorgeous site without any design or technical skills, while powerful built-in marketing and conversion optimization tools help you promote your store and sell more.

## Installation ##

### Update Instructions

1. Click to have the Plugin updated.
1. Click Bigcommerce on the administration sidebar menu. Click the Settings tab. Check to ensure that your settings are properly configured. Click to rebuild your products list.

### New Automatic Installation

1. Log in to your blog and go to the Plugins page.
1. Click Add New button.
1. Search for Benchmark Email Lite.
1. Click Install Now link.
1. (sometimes required) Enter your FTP or FTPS username and password, as provided by your web host.
1. Click Activate Plugin link.
1. If you are creating a new Bigcommerce account, please click the `Visit Bigcommerce.com to start your own online store today!` link at the top of the Settings page to do so.
1. Obtain your Bigcommerce API Key by following the instructions adjacent to that field.
1. Back on your site, click Bigcommerce on the administration sidebar menu. Click the Settings tab. Check to ensure that your settings are properly configured. Click to rebuild your products list.
1. On any page or post, click on the Bigcommerce icon to insert product links, or click on the media library icon and the Bigcommerce tab to insert product images.

### New Manual Installation

1. Download the Plugin and un-zip it.
1. Upload the `interspire-bigcommerce` folder to your `wp-content/plugins/` directory.
1. Activate the Plugin through the Plugins menu in WordPress.
1. If you are creating a new Bigcommerce account, please click the `Visit Bigcommerce.com to start your own online store today!` link at the top of the Settings page to do so.
1. Obtain your Bigcommerce API Key by following the instructions adjacent to that field.
1. Back on your site, click Bigcommerce on the administration sidebar menu. Click the Settings tab. Check to ensure that your settings are properly configured. Click to rebuild your products list.
1. On any page or post, click on the Bigcommerce icon to insert product links, or click on the media library icon and the Bigcommerce tab to insert product images.

## Screenshots ##

###1. This is the Plugin settings page.###
![This is the Plugin settings page.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-1.png)

###2. This is the icon you click to open the Add Product popup.###
![This is the icon you click to open the Add Product popup.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-2.png)

###3. This is the Add Product popup showing how to add a listing of products by category.###
![This is the Add Product popup showing how to add a listing of products by category.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-3.png)

###4. This is the product category shortcode that gets created by the Add Product popup.###
![This is the product category shortcode that gets created by the Add Product popup.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-4.png)

###5. This is an example page or post showing a listing of products from a category.###
![This is an example page or post showing a listing of products from a category.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-5.png)

###6. This is the Add Product popup showing how to create a product link.###
![This is the Add Product popup showing how to create a product link.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-6.png)

###7. This is the product link shortcode that gets created by the Add Product popup.###
![This is the product link shortcode that gets created by the Add Product popup.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-7.png)

###8. This is the icon you click to open the Add Media popup containing the Bigcommerce tab.###
![This is the icon you click to open the Add Media popup containing the Bigcommerce tab.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-8.png)

###9. This is the Add Media popup Bigcommerce tab, to insert product images into the pages/posts editor.###
![This is the Add Media popup Bigcommerce tab, to insert product images into the pages/posts editor.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-9.png)

###10. This is the inserted product image within the pages/posts editor, which can be further adjusted using the WordPress image editor tool.###
![This is the inserted product image within the pages/posts editor, which can be further adjusted using the WordPress image editor tool.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-10.png)

###11. This is an example page or post showing a product image and link to a Bigcommerce product page.###
![This is an example page or post showing a product image and link to a Bigcommerce product page.](http://s.wordpress.org/extend/plugins/bigcommerce/screenshot-11.png)


## Frequently Asked Questions ##

### Where can I view or submit bugs or feature requests? ###

You may use [the Support tab](http://wordpress.org/support/plugin/interspire-bigcommerce "Open the Support tab").

### What are the system requirements ###

* Requires PHP version 5. If your web host does not support PHP5, please contact your host and see if they can upgrade your PHP version.
* Activate `curl` if your web host doesn't already have it running. Generally this can be done at no cost.

### When should I rebuild my products/cache? ###

* Rebuild your products list whenever you upgrade the Plugin, or whenever you add new products or change existing product names, links, or images within your store.

### How can I replace the "No Image Available" image with my own? ###
Add a filter on `bigcommerce_no_image` that includes HTML output of an image file of your choosing.
`
add_filter( 'bigcommerce_no_image', 'replace_bigcommerce_no_image_with_my_image');
function replace_bigcommerce_no_image_with_my_image($content) {
	return '<img src="http://example.com/my-no-image-image.jpg" alt="No image available" />';
}
`

### How can I change the product listings by category HTML? ###

*** In version 1.5 we added a filter to permit template customization using external code. This allows you to customize the product rows HTML while continuing to keep the Plugin up to date. Use the following code in a new Plugin file, for example:** `wp-content/plugins/my_custom_plugin/my_custom_plugin.php`  

`
<?php
/*
**Plugin Name:** Customize Bigcommerce Product Listings Template  
**Plugin URI:** http://wordpress.org/extend/plugins/interspire-bigcommerce/  
**Description:** Customizes the Bigcommerce product listings template.  
**Version:** 1.0  
**Author:** Myself  
**Author URI:** http://www.mysite.com/contact/  
**License:** GPL2  
*/
add_filter( 'bigcommerce_display_product_row', 'bigcommerce_product_row', 10, 1 );
function bigcommerce_product_row( $data, $storepath ) {
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
?>
`

## Changelog ##

### 1.6 on 2013-03-14 ###
* Improved and fixed issues with the insert image ("Add Media") functionality
	- Now properly paginates based on products with images, not number of products
	- Speed is much improved
	- Improved pagination style
* Improved caching of products and product images.
* Fixed rebuilding products and categories list (it now rebuilds properly)
* Fixed issue where content would be clipped after inserted Bigcommerce category (caused by using `]` instead of `/]` in the shortcode)
* Fixed issue with store validation not updating when settings were changed
* Products without images now show "No Image Available" image instead of broken image link (see FAQ to use your own custom image)
* Added `alt` text to images

### 1.5.1 on 2013-02-27 ###
* Fixed potential SSL warning caused by `sslverify`. Bigcommerce SSL is secure.

### 1.5 on 2012-12-18 ###

*** Added:** Product categories caching and display.  
*** Added:** Shortcode attribute `category` to display product listings by category name.  
*** Added:** Shortcode category builder on MCE popup.  
*** Added:** Filter `bigcommerce_display_product_row` for customizing product listings HTML. See FAQ.  
*** Updated:** Changed from using cURL to wp_remote_request() for failover handling.  
*** Updated:** Broke methods up into separate PHP class files for better OOP mojo.  
*** Fixed:** Internal bug 91. Allows the entry of store URL in either the old format, the new format, or the pretty store URL when applicable.  

### 1.4 on 2012-11-27 ###

*** Fixed:** New contributor, beAutomated, rewrote most of the Plugin to get everything up to date and working again.  
*** Updated:** Removed the copy of the WP image editing, as that can be triggered following product image insert, utilizing the latest WordPress tools for doing so.  
*** Added:** Support for the latest Bigcommerce API, powered by cURL.  

### 1.3 on 2011-09-12 ###

* Removed `curl`-only data retrieval; now uses WordPress' built-in `wp_remote_post()` functionality
* Fixed some PHP notices on fresh installation and in the product image browser
* Fixed <a href="http://www.seodenver.com/interspire-bigcommerce-wordpress/#comment-307176267">issue reported</a> by <a href="http://www.brandywinejewelrysupply.com/">Brandywine Jewelry</a>  where "Screen Options" in WordPress' Add/Edit Post screen are permanently hidden. Thanks for reporting!

### 1.2.2 2011-04-06 ###

* Fixed `Call to undefined function MakeURLSafe()` error

### 1.2.1 on 2011-04-04 ###

* Fixed <a href="http://wordpress.org/support/topic/445905">bug #445905</a> issue where product list would not appear to have been generated.
* Fixed issue where plugin says settings are configured properly, but are not.
* Fixed issue where if a store had no images, the media browser's image tab would show pagination for an empty set of products
*** Fixed pagination inside the media browser:** the pages are now based on products with images instead of the number of products  

### 1.2 on 2011-01-14 ###

* Added a tab to WordPress' `Add an Image` media tabs, allowing you to easily embed your product images and link to product pages or larger images.

### 1.1 on 2010-12-14 ###

*** Note:** Existing links will not be backward compatible with previous versions of this plugin!  
* Fixed the issues with previous versions - now lists will generate in much less time and will include unlimited numbers of products
* Added configuration option for whether or not to use SEO-friendly URLs
* Bigcommerce users will now see `[bigcommerce]` shortcode instead of `[interspire]`
*** Improved settings check:** settings are only checked when they have changed  

### 1.0.6 on 2010-11-23 ###

* Whoops! This is what 1.0.5 was supposed to be.
* Fixed generation of product list
* Fixed editor button product insertion

### 1.0.4 on 2010-08-27 ###

* Fixed bug where product lists would appear to have not been built, although they already had.
* Removed the dialog box when inserting product. That was for debug purposes.
*** Added optional `Store Path` setting. When configured, the plugin doesn't send full URL to the editor, only the product page. Example:** instead of <code>[interspire link=http://example.com/products/product.html]Anchor Text[/interspire]</code>, it will now be <code>[interspire link=/products/product.html]Anchor Text[/interspire]</code>.  
* Added <code>[bigcommerce]</code> shortcode that works the same way as `[interspire]`; figured it made sense :-)
* Added option to give thanks by adding a link to the plugin page on your footer. (please do!!!)
* Speeded up the plugin a bit by removing a few calls to the database

### 1.0.3 on 2010-08-16 ###

* Fixed issue with Bigcommerce API authentication. Sorry for the problems everyone - it should be working now. Had been using Interspire-only method of basic checking of settings.
* Updated Insert Product form to prevent conflict with other plugins (Gravity Forms, for example).

### 1.0.2 on 2010-07-27 ###

*** Quick fix, vital update:**  fixes errors caused by 1.0.1. Sorry folks!  
* Improves settings check to make sure configuration is done properly
* If settings have been configured but a products list hasn't been generated, the editor button will show a link to generate the list

### 1.0.1 on 2010-07-26 ###

* Fixes possible `Uncaught exception 'Exception' with message 'String could not be parsed as XML` error
* Added error notice if PHP5 is not supported.

### 1.0 on 2010-07-22 ###

* Initial launch

## Upgrade Notice ##

### 1.6 on 2013-03-14 ###
* Improved and fixed issues with the insert image ("Add Media") functionality
	- Now properly paginates based on products with images, not number of products
	- Speed is much improved
	- Improved pagination style
* Fixed rebuilding products and categories list (it now rebuilds properly)
* Fixed issue where content would be clipped after inserted Bigcommerce category (caused by using `]` instead of `/]` in the shortcode)
* Fixed issue with store validation not updating when settings were changed
* Products without images now show "No Image Available" image instead of broken image link (see FAQ to use your own custom image)

### 1.5.1 ###
* Fixed potential SSL warning caused by `sslverify`. Bigcommerce SSL is secure.

### 1.5 ###

* Bug fixes, updates, and a new big feature for presenting products by category shortcode.

### 1.4 ###

* This Plugin has been essentially rewritten by beAutomated, in partnership with Katz Web Services.

### 1.3 ###

* Removed `curl`-only data retrieval; now uses WordPress' built-in `wp_remote_post()` functionality
* Fixed some PHP notices on fresh installation and in the product image browser
* Fixed <a href="http://www.seodenver.com/interspire-bigcommerce-wordpress/#comment-307176267">issue reported</a> by <a href="http://www.brandywinejewelrysupply.com/">Brandywine Jewelry</a>  where "Screen Options" in WordPress' Add/Edit Post screen are permanently hidden. Thanks for reporting!

### 1.2.2 ###

* Fixed `Call to undefined function MakeURLSafe()` error

### 1.2.1 ###

* Fixed <a href="http://wordpress.org/support/topic/445905">bug #445905</a> issue where product list would not appear to have been generated.
* Fixed issue where plugin says settings are configured properly, but are not.
* Fixed issue where if a store had no images, the media browser's image tab would show pagination for an empty set of products
*** Fixed pagination inside the media browser:** the pages are now based on products with images instead of the number of products  

### 1.2 ###

* Added a tab to WordPress' `Add an Image` media tabs, allowing you to easily embed your product images and link to product pages or larger images.

### 1.1 ###

* Fixed the issues with previous versions - now lists will generate in much less time and will include unlimited numbers of products
* Added configuration option for whether or not to use SEO-friendly URLs
* Bigcommerce users will now see `[bigcommerce]` shortcode instead of `[interspire]`
*** Improved settings check:** settings are only checked when they have changed  

### 1.0.6 ###

* Whoops! This is what 1.0.5 was supposed to be.

### 1.0.5 ###

* Fixed generation of product list
* Fixed editor button product insertion

### 1.0.4 ###

* Fixed bug where product lists would appear to have not been built, although they already had.
* Speeded up the plugin a bit by removing a few calls to the database

### 1.0.3 ###

* Fixed issue with Bigcommerce API authentication. Sorry for the problems everyone - it should be working now.
* Updated Insert Product form to prevent conflict with other plugins (Gravity Forms, for example).

### 1.0.2 ###

* Very important if you upgraded to 1.0.1 without having configured your settings!
* Otherwise, it improves settings validation

### 1.0.1 ###

* Fixes possible `Uncaught exception 'Exception' with message 'String could not be parsed as XML` error
* Added error notice if PHP5 is not supported.

### 1.0 ###

* Blastoff!
