# Bigcommerce #

Integrate Bigcommerce hosted eCommerce shopping cart product images and links into WordPress.

> <a href="http://wordpress.org/support/view/plugin-reviews/interspire-bigcommerce?rate=5#postform">__Please rate this plugin!__</a>

You want to spend your time writing the best content, not hunting for the link or image for the product you're blogging about. This plugin is powerful and simple to set up. It's a must have if you use WordPress and Bigcommerce.

<h3>Easily find and link to your Bigcommerce products from within WordPress</h3>

This plugin adds a button to the post/page editor that makes it easy to link to your products.

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

1. Click to have the plugin updated.
1. Click Bigcommerce on the administration sidebar menu. Click the Settings tab. Check to ensure that your settings are properly configured. Click to rebuild your products list.

### New Automatic Installation

1. Log in to your blog and go to the plugins page.
1. Click Add New button.
1. Search for Benchmark Email Lite.
1. Click Install Now link.
1. (sometimes required) Enter your FTP or FTPS username and password, as provided by your web host.
1. Click Activate plugin link.
1. If you are creating a new Bigcommerce account, please click the `Visit Bigcommerce.com to start your own online store today!` link at the top of the Settings page to do so.
1. Obtain your Bigcommerce API Key by following the instructions adjacent to that field.
1. Back on your site, click Bigcommerce on the administration sidebar menu. Click the Settings tab. Check to ensure that your settings are properly configured. Click to rebuild your products list.
1. On any page or post, click on the Bigcommerce icon to insert product links, or click on the media library icon and the Bigcommerce tab to insert product images.

### New Manual Installation

1. Download the plugin and un-zip it.
1. Upload the `interspire-bigcommerce` folder to your `wp-content/plugins/` directory.
1. Activate the plugin through the plugins menu in WordPress.
1. If you are creating a new Bigcommerce account, please click the `Visit Bigcommerce.com to start your own online store today!` link at the top of the Settings page to do so.
1. Obtain your Bigcommerce API Key by following the instructions adjacent to that field.
1. Back on your site, click Bigcommerce on the administration sidebar menu. Click the Settings tab. Check to ensure that your settings are properly configured. Click to rebuild your products list.
1. On any page or post, click on the Bigcommerce icon to insert product links, or click on the media library icon and the Bigcommerce tab to insert product images.

## Screenshots ##

###1. This is the plugin settings page.###
![This is the plugin settings page.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-1.png)

###2. This is the icon you click to open the Add Product popup.###
![This is the icon you click to open the Add Product popup.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-2.png)

###3. This is the Add Product popup showing how to add a listing of products by category.###
![This is the Add Product popup showing how to add a listing of products by category.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-3.png)

###4. This is the product category shortcode that gets created by the Add Product popup.###
![This is the product category shortcode that gets created by the Add Product popup.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-4.png)

###5. This is an example page or post showing a listing of products from a category.###
![This is an example page or post showing a listing of products from a category.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-5.png)

###6. This is the Add Product popup showing how to create a product link.###
![This is the Add Product popup showing how to create a product link.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-6.png)

###7. This is the product link shortcode that gets created by the Add Product popup.###
![This is the product link shortcode that gets created by the Add Product popup.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-7.png)

###8. This is the icon you click to open the Add Media popup containing the Bigcommerce tab.###
![This is the icon you click to open the Add Media popup containing the Bigcommerce tab.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-8.png)

###9. This is the Add Media popup Bigcommerce tab, to insert product images into the pages/posts editor.###
![This is the Add Media popup Bigcommerce tab, to insert product images into the pages/posts editor.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-9.png)

###10. This is the inserted product image within the pages/posts editor, which can be further adjusted using the WordPress image editor tool.###
![This is the inserted product image within the pages/posts editor, which can be further adjusted using the WordPress image editor tool.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-10.png)

###11. This is an example page or post showing a product image and link to a Bigcommerce product page.###
![This is an example page or post showing a product image and link to a Bigcommerce product page.](http://s.wordpress.org/extend/plugins/interspire-bigcommerce/screenshot-11.png)


## Frequently Asked Questions ##

### Where can I view or submit bugs or feature requests? ###

Please submit issues <a href="https://github.com/katzwebservices/Bigcommerce-WordPress-Plugin/issues?state=open">on the plugin's Github development page</a>.

### This plugin uses PressTrends ###
By installing this plugin, you agree to allow gathering anonymous usage stats through PressTrends. The data gathered is the active Theme name, WordPress version, plugins installed, and other metrics. This allows the developer of this plugin to know what compatibility issues to test for.

To remove PressTrends integration, add the code to your theme's functions.php file:

`
add_action('plugins_loaded', 'remove_CTCTCF7_presstrends_plugin', 20);
function remove_CTCTCF7_presstrends_plugin() {
	remove_action('admin_init', array('CTCTCF7', 'presstrends_plugin'));
}
`

### What are the system requirements ###

* Requires PHP version 5. If your web host does not support PHP5, please contact your host and see if they can upgrade your PHP version.
* Activate `curl` if your web host doesn't already have it running. Generally this can be done at no cost.

### When should I rebuild my products/cache? ###

* Rebuild your products list whenever you upgrade the plugin, or whenever you add new products or change existing product names, links, or images within your store.

### How can I replace the "No Image Available" image with my own? ###
Add a filter on `bigcommerce_no_image` that includes HTML output of an image file of your choosing.
`
add_filter( 'bigcommerce_no_image', 'replace_bigcommerce_no_image_with_my_image');
function replace_bigcommerce_no_image_with_my_image($content) {
	return '<img src="http://example.com/my-no-image-image.jpg" alt="No image available" />';
}
`

### How can I change the product listings by category HTML? ###

__To modify the output:__

* Find the file `customize-category-output.php.txt` in this plugin folder.
* Copy the file to your `/wp-content/plugins/` directory
* Rename the file by removing `.txt`. The file name should be `customize-category-output.php`
* Modify the code inside the file to your heart's content
* Activate the "Customize Bigcommerce Product Listings Template" plugin in your WordPress administration


## Changelog ##

### 1.7.2 on 2013-09-23 ###
* Updated the plugin to include a sample plugin file. See the <a href="http://wordpress.org/plugins/interspire-bigcommerce/faq/">plugin FAQ</a> "How can I change the product listings by category HTML?"


### 1.7.1 on 2013-09-17 ###
* <a href="http://wordpress.org/support/view/plugin-reviews/interspire-bigcommerce?rate=5#postform">__Please rate the plugin!__</a>
*** Added:** Rating box that also alerts you to new versions on the plugin page.  
*** Modified:** Moved items around on the plugin page.  

### 1.7 on 2013-08-19 ###
*** Improved:** Now uses a script that allows searching of products and categories to insert  
*** Improved:** Now you can watch the generation of the product and category list while it's processing. No more guessing whether it's working or not.  
*** Fixed:** Product links are now properly fetched from the `custom_url` parameter.  
*** Fixed:** Cache would always need to be rebuilt  
*** Fixed:** Only 50 categories were retrieved at once  
*** Fixed:** Child categories were not properly displayed  

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

*** Fixed:** New contributor, beAutomated, rewrote most of the plugin to get everything up to date and working again.  
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

### 1.7.2 on 2013-09-23 ###
* Updated the plugin to include a sample plugin file. See the <a href="http://wordpress.org/plugins/interspire-bigcommerce/faq/">plugin FAQ</a> "How can I change the product listings by category HTML?"


### 1.7.1 on 2013-09-17 ###
* <a href="http://wordpress.org/support/view/plugin-reviews/interspire-bigcommerce?rate=5#postform">__Please rate the plugin!__</a>
*** Added:** Rating box that also alerts you to new versions on the plugin page.  
*** Modified:** Moved items around on the plugin page.  
*** Added:** PressTrends service to improve compatibility and support.  

### 1.7 on 2013-08-19 ###
*** Improved:** Now uses a script that allows searching of products and categories to insert  
*** Improved:** Now you can watch the generation of the product and category list while it's processing. No more guessing whether it's working or not.  
*** Fixed:** Product links are now properly fetched from the `custom_url` parameter.  
*** Fixed:** Cache would always need to be rebuilt  
*** Fixed:** Only 50 categories were retrieved  
*** Fixed:** Child categories were not properly displayed  

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

* This plugin has been essentially rewritten by beAutomated, in partnership with Katz Web Services.

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
