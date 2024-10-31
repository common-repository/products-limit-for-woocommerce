<?php
/*
Plugin Name: Products limit for WooCommerce
Plugin URI: http://iacopocutino.it/products-limit-for-woocommerce/
Description: Allow to set minimum and maximum quantity of products in WooCommerce and display a warning banner in the cart or checkout page.
Author: Iacopo Cutino
Version: 3.6
Domain Path: /languages
Author URI: www.iacopocutino.it
License: GPL2
WC requires at least: 2.6
WC tested up to: 3.3

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/

if (! defined('ABSPATH')) {
	exit();
}

/**
 * Languages support
 **/
function products_lfw_language() {
	load_plugin_textdomain('products-limit', false, dirname( plugin_basename( __FILE__ )) . '/languages/');
}
add_action('init','products_lfw_language');


/**
 * Enqueue css
 **/
function products_lfw_admin_style() {
        wp_register_style( 'style.css', plugins_url('/css/style.css', __FILE__), false, '1.0.0' );
        wp_enqueue_style( 'style.css' );
}
add_action( 'admin_enqueue_scripts', 'products_lfw_admin_style' );



/**
 * Check if WooCommerce is active or if is enabled Multisite
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) || array_key_exists('woocommerce/woocommerce.php', get_site_option('active_sitewide_plugins')) ) {

	
/**
 * Include WooCommerce settings
 **/
include ('settings.php');
		
include ('includes/main.php');
	
include('includes/status-widget.php');
	
}
