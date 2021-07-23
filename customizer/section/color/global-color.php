<?php
/******************/
//Global Option
/******************/
/***************/
// Scheme color 
/***************/
$wp_customize->add_setting('top_store_color_scheme', array(
                'default'               => 'opn-light',
                'sanitize_callback'     => 'top_store_sanitize_radio',
            ) );
$wp_customize->add_control( new top_store_Customizer_Buttonset_Control( $wp_customize, 'top_store_color_scheme', array(
                'label'                 => esc_html__( 'Color Scheme', 'top-store' ),
                'section'               => 'top-store-gloabal-color',
                'settings'              => 'top_store_color_scheme',
                'choices'               => array(
                    'opn-light'      => esc_html__( 'Light', 'top-store' ),
                    'opn-dark'       => esc_html__( 'Dark', 'top-store' ),
                ),
                 'priority' => 1,
            ) ) );
// theme color
 $wp_customize->add_setting('top_store_theme_clr', array(
        'default'        => '#00badb',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'top_store_theme_clr', array(
        'label'      => __('Theme Color', 'top-store' ),
        'section'    => 'top-store-gloabal-color',
        'settings'   => 'top_store_theme_clr',
        'priority' => 1,
    ) ) 
 );  
// link color
 $wp_customize->add_setting('top_store_link_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'top_store_link_clr', array(
        'label'      => __('Link Color', 'top-store' ),
        'section'    => 'top-store-gloabal-color',
        'settings'   => 'top_store_link_clr',
        'priority' => 2,
    ) ) 
 );  
// link hvr color
 $wp_customize->add_setting('top_store_link_hvr_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'top_store_link_hvr_clr', array(
        'label'      => __('Link Hover Color', 'top-store' ),
        'section'    => 'top-store-gloabal-color',
        'settings'   => 'top_store_link_hvr_clr',
        'priority' => 3,
    ) ) 
 );

// text color
 $wp_customize->add_setting('top_store_text_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'top_store_text_clr', array(
        'label'      => __('Text Color', 'top-store' ),
        'section'    => 'top-store-gloabal-color',
        'settings'   => 'top_store_text_clr',
        'priority' => 4,
    ) ) 
 );
 // title color
 $wp_customize->add_setting('top_store_title_clr', array(
        'default'        => '',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'top_store_title_clr', array(
        'label'      => __('Title Color', 'top-store' ),
        'section'    => 'top-store-gloabal-color',
        'settings'   => 'top_store_title_clr',
        'priority' => 4,
    ) ) 
 );  
// gloabal background option
$wp_customize->get_control( 'background_color' )->section = 'top-store-gloabal-color';
$wp_customize->get_control( 'background_color' )->priority = 6;
$wp_customize->get_control( 'background_image' )->section = 'top-store-gloabal-color';
$wp_customize->get_control( 'background_image' )->priority = 7;
$wp_customize->get_control( 'background_preset' )->section = 'top-store-gloabal-color';
$wp_customize->get_control( 'background_preset' )->priority = 8;
$wp_customize->get_control( 'background_position' )->section = 'top-store-gloabal-color';
$wp_customize->get_control( 'background_position' )->priority = 8;
$wp_customize->get_control( 'background_repeat' )->section = 'top-store-gloabal-color';
$wp_customize->get_control( 'background_repeat' )->priority = 9;
$wp_customize->get_control( 'background_attachment' )->section = 'top-store-gloabal-color';
$wp_customize->get_control( 'background_attachment' )->priority = 10;
$wp_customize->get_control( 'background_size' )->section = 'top-store-gloabal-color';
$wp_customize->get_control( 'background_size' )->priority = 11;
/****************/
//doc link
/****************/
$wp_customize->add_setting('top_store_global_clr_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_global_clr_more',
            array(
        'section'     => 'top-store-gloabal-color',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#global-color',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));


// BG color
 $wp_customize->add_setting('top_store_above_hdr_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Top_Store_Customizer_Color_Control($wp_customize,'top_store_above_hdr_bg_clr', array(
        'label'      => __('Background Color', 'top-store' ),
        'section'    => 'top-store-abv-header-clr',
        'settings'   => 'top_store_above_hdr_bg_clr',
        'priority'   => 2,
    ) ) 
 ); 

// main header color
// BG color
 $wp_customize->add_setting('top_store_main_hdr_bg_clr', array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Top_Store_Customizer_Color_Control($wp_customize,'top_store_main_hdr_bg_clr', array(
        'label'      => __('Background Color', 'top-store' ),
        'section'    => 'top-store-main-header-clr',
        'settings'   => 'top_store_main_hdr_bg_clr',
        'priority'   => 1,
    ) ) 
 ); 

$wp_customize->add_setting('top_store_main_hdr_txt_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'top_store_main_hdr_txt_clr', array(
        'label'      => __('Text Color', 'top-store' ),
        'section'    => 'top-store-main-header-clr',
        'settings'   => 'top_store_main_hdr_txt_clr',
        'priority' => 2,
    ) ) 
 );  