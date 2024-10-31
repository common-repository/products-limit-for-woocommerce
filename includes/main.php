<?php

// Function for min product in  check out or cart

add_action( 'woocommerce_check_cart_items', 'products_lfw_set_min_num_products' );

function products_lfw_set_min_num_products() {
	// Only run in the Cart or Checkout pages
	if( is_cart() || is_checkout() ) {
		global $woocommerce, $post;

		$min_num_products = get_option('number_field');
		
		$cart_num_products = WC()->cart->cart_contents_count;

		//Variable that contain the shop permalink for the button in the warning banner
	    $return_to  = get_permalink(wc_get_page_id('shop'));
		

	    // Compare values and add an error is Cart's total number of products

		if( $min_num_products != '' && $cart_num_products < $min_num_products ) {
			
			// If the checkbox for button is enabled add the shop button to the warning message in cart or checkout page display our error message

			if(get_option('button_auto_insert') == 'yes') {

	        wc_add_notice( sprintf(__( 'A Minimum of %s products is required before checking out. Current number of items in the cart: %s. <a href="%s" class="button wc-forwards">Continue Shopping</a>', 'products-limit'),
	        	$min_num_products,
	        	$cart_num_products, $return_to ),
	        'error' );

	    	} else {

	    	wc_add_notice( sprintf(__( 'A Minimum of %s products is required before checking out. Current number of items in the cart: %s.', 'products-limit'),
	        	$min_num_products,
	        	$cart_num_products ),
	        'error' );	

	    }

	    }


		}

	}







// Function for max products in check out or cart

add_action( 'woocommerce_check_cart_items', 'products_lfw_set_max_num_products' );

function products_lfw_set_max_num_products() { 

if( is_cart() || is_checkout() ) {
		global $woocommerce, $post;

		//variable that contain the shop permalink for the button in the warning banner
		$return_to  = get_permalink(wc_get_page_id('shop'));

		$max_num_products = get_option('number_field2');

		$cart_num_products = WC()->cart->cart_contents_count;

		// Compare values and add an error is Cart's total number of products

		if( $max_num_products != '' && $cart_num_products > $max_num_products ) {

		// If the checkbox for button is enabled add the shop button to the warning message in cart or checkout page display our error message

			if(get_option('button_auto_insert') == 'yes') {

	        wc_add_notice( sprintf(__( 'A Maximum of %s products is allowed before checking out. Current number of items in the cart: %s. <a href="%s" class="button wc-forwards">Continue Shopping</a>', 'products-limit'),
	        	$max_num_products,
	        	$cart_num_products, $return_to ),
	        'error' );
	    
	    	} else {

	    	wc_add_notice( sprintf(__( 'A Maximum of %s products is allowed before checking out. Current number of items in the cart: %s.', 'products-limit'),
	        	$max_num_products,
	        	$cart_num_products),
	        'error' );
	    
	    }

		}

	}
}