<?php
//Enable Loader
$wp_customize->add_setting( 'top_store_preloader_enable', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_preloader_enable', array(
                'label'                 => esc_html__('Enable Loader', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top-store-pre-loader',
                'settings'              => 'top_store_preloader_enable',
                'priority'   => 1,
            ) ) );
// BG color
 $wp_customize->add_setting('top_store_loader_bg_clr', array(
        'default'           => '#9c9c9c',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Top_Store_Customizer_Color_Control($wp_customize,'top_store_loader_bg_clr', array(
        'label'      => __('Background Color', 'top-store' ),
        'section'    => 'top-store-pre-loader',
        'settings'   => 'top_store_loader_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 
/*******************/ 
// Pre loader Image
/*******************/ 
$wp_customize->add_setting('top_store_preloader_image_upload', array(
        'default'       => TOP_STORE_PRELOADER,
        'capability'    => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_upload',
    ));
$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize, 'top_store_preloader_image_upload', array(
        'label'          => __('Pre Loader Image', 'top-store'),
        'description'    => __('(You can also use GIF image.)', 'top-store'),
        'section'        => 'top-store-pre-loader',
        'settings'       => 'top_store_preloader_image_upload',
 )));

/****************/
// doc link
/****************/
$wp_customize->add_setting('top_store_loader_link_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_loader_link_more',
            array(
        'section'     => 'top-store-pre-loader',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#pre-loader',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));