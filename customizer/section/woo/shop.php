<?php 
/************************/
//Shop product pagination
/************************/
   $wp_customize->add_setting('top_store_pagination', array(
        'default'        => 'num',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
    $wp_customize->add_control('top_store_pagination', array(
        'settings' => 'top_store_pagination',
        'label'   => __('Post Pagination','top-store'),
        'section' => 'top-store-woo-shop-page',
        'type'    => 'select',
        'choices' => array(
        'num'     => __('Numbered','top-store'),
        'click'   => __('Load More (Pro)','top-store'), 
        'scroll'  => __('Infinite Scroll (Pro)','top-store'), 
        )
    ));

$wp_customize->add_setting( 'top_store_shop_sidebr_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_shop_sidebr_disable', array(
                'label'                 => esc_html__('Disable Sidebar', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top-store-woo-shop-page',
                'settings'              => 'top_store_shop_sidebr_disable',
            ) ) );
/****************/
// doc link
/****************/
$wp_customize->add_setting('top_store_shop_page_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_shop_page_more',
            array(
        'section'     => 'top-store-woo-shop-page',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#shop-page',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>  100,
    )));