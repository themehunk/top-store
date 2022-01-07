<?php 
/**
 * all file includeed
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 * @param  
 * @return mixed|string
 */
get_template_part( 'inc/admin-function');
get_template_part( 'inc/header-function');
get_template_part( 'inc/footer-function');
get_template_part( 'inc/blog-function');
//breadcrumbs
get_template_part( 'lib/breadcrumbs/breadcrumbs');
//custom-style
get_template_part( 'inc/top-store-custom-style');
// customizer
get_template_part('customizer/extend-customizer/class-top-store-wp-customize-panel');
get_template_part('customizer/extend-customizer/class-top-store-wp-customize-section');
get_template_part('customizer/customizer-radio-image/class/class-top-store-customize-control-radio-image');
get_template_part('customizer/customizer-range-value/class/class-top-store-customizer-range-value-control');
get_template_part('customizer/customizer-scroll/class/class-top-store-customize-control-scroll');
get_template_part('customizer/color/class-control-color');
get_template_part('customizer/customize-buttonset/class-control-buttonset');
get_template_part('customizer/sortable/class-top-store-control-sortable');
get_template_part('customizer/background/class-top-store-background-image-control');
get_template_part('customizer/customizer-toggle/class-top-store-toggle-control');


get_template_part('customizer/custom-customizer');
get_template_part('customizer/customizer-constant');
get_template_part('customizer/customizer');
/******************************/
// woocommerce
/******************************/
if ( ! function_exists( 'is_plugin_active' ) ){
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
get_template_part( 'inc/woocommerce/woo-core');
get_template_part( 'inc/woocommerce/woo-function');
get_template_part('inc/woocommerce/woocommerce-ajax');

//Th Option
get_template_part( '/lib/th-option/th-option');
get_template_part( '/lib/th-option/notify');

// Probutton
/******************************/
get_template_part('customizer/pro-button/class-customize');