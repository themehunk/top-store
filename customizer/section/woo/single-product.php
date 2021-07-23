<?php
/**
 * Register WooCommerce Single Product Page
 */

if ( ! class_exists( 'WooCommerce' ) ){
    return;
}

/******************************/
// Up Sell Product
/******************************/
$wp_customize->add_setting('top_store_single_upsell_product_divide', array(
        'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control( new top_store_Misc_Control( $wp_customize, 'top_store_single_upsell_product_divide',
            array(
        'section'     => 'top-store-woo-single-product',
        'type'        => 'custom_message',
        'description' => __('Up Sell Product','top-store' ),
)));
// display upsell
$wp_customize->add_setting('top_store_upsell_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'top_store_upsell_product_display', array(
                'label'         => __('Display up sell product', 'top-store'),
                'type'          => 'checkbox',
                'section'       => 'top-store-woo-single-product',
                'settings'      => 'top_store_upsell_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'top_store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'top_store_upsale_num_col_shw', array(
                'sanitize_callback' => 'top_store_sanitize_range_value',
                'default' => '4',  
            )
        );
$wp_customize->add_control(
            new top_store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'top_store_upsale_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'top-store' ),
                    'section'     => 'top-store-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'top_store_upsale_num_product_shw', array(
                'sanitize_callback' => 'top_store_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new top_store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'top_store_upsale_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'top-store' ),
                    'section'     => 'top-store-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/******************************/
// Related Product
/******************************/
$wp_customize->add_setting('top_store_single_related_product_divide', array(
        'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control( new top_store_Misc_Control( $wp_customize, 'top_store_single_related_product_divide',
            array(
        'section'     => 'top-store-woo-single-product',
        'type'        => 'custom_message',
        'description' => __('Related Product','top-store' ),
)));
// display upsell
$wp_customize->add_setting('top_store_related_product_display', array(
                'default'               => true,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize,'top_store_related_product_display', array(
                'label'         => __('Display Related product', 'top-store'),
                'type'          => 'checkbox',
                'section'       => 'top-store-woo-single-product',
                'settings'      => 'top_store_related_product_display',
            ) ) );
// up sell product column
if ( class_exists( 'top_store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'top_store_related_num_col_shw', array(
                'sanitize_callback' => 'top_store_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new top_store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'top_store_related_num_col_shw', array(
                    'label'       => __( 'Number Of Column To Show', 'top-store' ),
                    'section'     => 'top-store-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 6,
                        'step' => 1,
                    ),
                    
                )
        )
);
// no.of product to show
$wp_customize->add_setting(
            'top_store_related_num_product_shw', array(
                'sanitize_callback' => 'top_store_sanitize_range_value',
                'default' => '4',
                
                
            )
        );
$wp_customize->add_control(
            new top_store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'top_store_related_num_product_shw', array(
                    'label'       => __( 'Number Of Product To Show', 'top-store' ),
                    'section'     => 'top-store-woo-single-product',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 1,
                        'max'  => 100,
                        'step' => 1,
                    ),
                    
                )
        )
);
}
/****************/
// doc link
/****************/
$wp_customize->add_setting('top_store_single_product_link_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_single_product_link_more',
            array(
        'section'     => 'top-store-woo-single-product',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#single-product',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));