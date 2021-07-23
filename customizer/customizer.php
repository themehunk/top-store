<?php 
/**
 * all customizer setting includeed
 *
 * @param  
 * @return mixed|string
 */
function top_store_customize_register( $wp_customize ){
//Registered panel and section
require TOP_STORE_THEME_DIR . '/customizer/register-panels-and-sections.php';	
//site identity
require TOP_STORE_THEME_DIR . '/customizer/section/layout/header/set-identity.php';
require TOP_STORE_THEME_DIR . '/customizer/section/layout/header/header.php';	
//Header
require TOP_STORE_THEME_DIR . '/customizer/section/layout/header/above-header.php';	
require TOP_STORE_THEME_DIR . '/customizer/section/layout/header/main-header.php';
require TOP_STORE_THEME_DIR . '/customizer/section/layout/header/loader.php';
//Footer
require TOP_STORE_THEME_DIR . '/customizer/section/layout/footer/above-footer.php';
require TOP_STORE_THEME_DIR . '/customizer/section/layout/footer/widget-footer.php';
require TOP_STORE_THEME_DIR . '/customizer/section/layout/footer/bottom-footer.php';
//section ordering
require TOP_STORE_THEME_DIR . '/customizer/section-ordering.php';
//social Icon
require TOP_STORE_THEME_DIR . '/customizer/section/layout/social-icon/social-icon.php';
//Blog
require TOP_STORE_THEME_DIR . '/customizer/section/layout/blog/blog.php';
//Color Option
require TOP_STORE_THEME_DIR . '/customizer/section/color/global-color.php';
//woo-product
require TOP_STORE_THEME_DIR . '/customizer/section/woo/product.php';
require TOP_STORE_THEME_DIR . '/customizer/section/woo/single-product.php';
require TOP_STORE_THEME_DIR . '/customizer/section/woo/cart.php';
require TOP_STORE_THEME_DIR . '/customizer/section/woo/shop.php';
// scroller
if ( class_exists('top_store_Customize_Control_Scroll')){
      $scroller = new top_store_Customize_Control_Scroll();
  }
}
add_action('customize_register','top_store_customize_register');
function top_store_is_json( $string ){
    return is_string( $string ) && is_array( json_decode( $string, true ) ) ? true : false;
}