<?php
//General Section
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
// product animation
$wp_customize->add_setting('top_store_woo_product_animation', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control( 'top_store_woo_product_animation', array(
        'settings'=> 'top_store_woo_product_animation',
        'label'   => __('Product Image Hover Style','top-store'),
        'section' => 'top-store-woo-shop',
        'type'    => 'select',
        'choices'    => array(
        'none'            => __('None','top-store'),
        'zoom'            => __('Zoom','top-store'),
        'swap'            => __('Swap (Pro)','top-store'),         
        ),
    ));
/*******************/
//Quick view
/*******************/
$wp_customize->add_setting('top_store_woo_quickview_enable', array(
                'default'               => true,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'top_store_woo_quickview_enable', array(
                'label'         => esc_html__('Enable Quick View.', 'top-store'),
                'type'          => 'checkbox',
                'section'       => 'top-store-woo-shop',
                'settings'      => 'top_store_woo_quickview_enable',
            ) ) );
/****************/
// doc link
/****************/
$wp_customize->add_setting('top_store_product_style_link_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_product_style_link_more',
            array(
        'section'     => 'top-store-woo-shop',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#style-product',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));