<?php	
/**
* Products limit status widget.
*/

function products_lfw_dashboard_widget_function() {
	
	$min_num_products = get_option('number_field');
	
	$max_num_products = get_option('number_field2');
	
	$shop_button = get_option('button_auto_insert'); ?>
	
		<ul class="products-limit-box">
			
			<li class="maximum-count">
			<span class="dashicons dashicons-arrow-up-alt"></span>
			
	
	<?php  // Check if maximum limit is enabled
				if ($max_num_products != '') { 
				printf(__( 'You have set a maximum limit of %s products before checking out.', 'products-limit'), $max_num_products );
				} else {
				echo _e('You have not set a maximum limit of products','products-limit');
				} ?>
			</li>
			
			<li class="minimum-count">
			<span class="dashicons dashicons-arrow-down-alt"></span>
			
	
	<?php // Check if minimum limit is enabled
				if ($min_num_products != '') {
				printf(__( 'You have set a minimum limit of %s products before checking out.', 'products-limit'), $min_num_products );
				} else {
				echo _e('You have not set a minimum limit of products','products-limit');
				} ?>
			</li>
			
			<li class="return-button">
				<span class="dashicons dashicons-marker"></span>
				
				<?php if(get_option('button_auto_insert') == 'yes') { 
				
				echo _e( 'Return to shop button enabled', 'products-limit');
				} else {
				echo _e('Return to shop button disabled','products-limit');
				}	?>
				
			</li>
			
		</ul>
				
	<ul class="sub-settings">	
	<li><a href="<?php echo admin_url( 'admin.php?page=wc-settings&tab=products&section=products_limit_woo'); ?>">
	<?php printf(__('Settings','products-limit')); ?></a></li>
	</ul>
	<?php
	
}
	
	
	
// Action hook for status widget
function products_lfw_add_dashboard_widgets() {
	wp_add_dashboard_widget('dashboard_widget', __('Products limit for WooCommerce status','products-limit'), 'products_lfw_dashboard_widget_function');
}
add_action('wp_dashboard_setup', 'products_lfw_add_dashboard_widgets' );
