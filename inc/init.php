<?php 
/**
 * all file includeed
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 * @param  
 * @return mixed|string
 */
if ( ! function_exists( 'is_plugin_active' ) ){
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}
$plugin_companion_file = 'hunk-companion/hunk-companion.php';
require_once TOP_STORE_THEME_DIR. 'inc/admin-function.php';
require_once TOP_STORE_THEME_DIR. 'inc/header-function.php';
require_once TOP_STORE_THEME_DIR. 'inc/footer-function.php';
require_once TOP_STORE_THEME_DIR. 'inc/blog-function.php';
//breadcrumbs
require_once TOP_STORE_THEME_DIR. 'lib/breadcrumbs/breadcrumbs.php';
//custom-style
require_once TOP_STORE_THEME_DIR. 'inc/top-store-custom-style.php';
// customizer
require_once TOP_STORE_THEME_DIR.'customizer/customizer-constant.php';
if (is_customize_preview()) {
require_once TOP_STORE_THEME_DIR.'customizer/extend-customizer/class-top-store-wp-customize-panel.php';
require_once TOP_STORE_THEME_DIR.'customizer/extend-customizer/class-top-store-wp-customize-section.php';
require_once TOP_STORE_THEME_DIR.'customizer/customizer-radio-image/class/class-top-store-customize-control-radio-image.php';
require_once TOP_STORE_THEME_DIR.'customizer/customizer-range-value/class/class-top-store-customizer-range-value-control.php';
require_once TOP_STORE_THEME_DIR.'customizer/customizer-scroll/class/class-top-store-customize-control-scroll.php';
require_once TOP_STORE_THEME_DIR.'customizer/color/class-control-color.php';
require_once TOP_STORE_THEME_DIR.'customizer/customize-buttonset/class-control-buttonset.php';
// require_once TOP_STORE_THEME_DIR.'customizer/sortable/class-top-store-control-sortable.php';
require_once TOP_STORE_THEME_DIR.'customizer/background/class-top-store-background-image-control.php';
require_once TOP_STORE_THEME_DIR.'customizer/customizer-toggle/class-top-store-toggle-control.php';

require_once TOP_STORE_THEME_DIR.'customizer/custom-customizer.php';
require_once TOP_STORE_THEME_DIR.'customizer/customizer.php';
	if ( !is_plugin_active($plugin_companion_file) ) {
	require_once TOP_STORE_THEME_DIR.'lib/notification/customizer-notification/thsm-custom-section.php';
	}
}
/******************************/
// woocommerce
/******************************/
require_once TOP_STORE_THEME_DIR. 'inc/woocommerce/woo-core.php';
require_once TOP_STORE_THEME_DIR. 'inc/woocommerce/woo-function.php';
require_once TOP_STORE_THEME_DIR.'inc/woocommerce/woocommerce-ajax.php';

//Th Option
require_once TOP_STORE_THEME_DIR. '/lib/th-option/th-option.php';

// Probutton
/******************************/
require_once TOP_STORE_THEME_DIR.'customizer/pro-button/class-customize.php';

/******************************/
// Plugin Activation
/******************************/
if ( !is_plugin_active($plugin_companion_file) ) {
	require_once TOP_STORE_THEME_DIR. 'lib/notification/notify.php';
}