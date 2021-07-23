<?php
/*********************/
// Sticky Sidebar
/********************/
 $wp_customize->add_setting( 'top_store_sticky_sidebar', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new top_store_Toggle_Control( $wp_customize, 'top_store_sticky_sidebar', array(
    'label'       => esc_html__( 'Sticky Sidebar', 'top-store' ),
    'section'     => 'top-store-section-sidebar-group',
    'type'        => 'toggle',
    'settings'    => 'top_store_sticky_sidebar',
  ) ) );

$wp_customize->add_setting('top_store_sidebar_front_option', array(
        'default'        => 'active-sidebar',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control( 'top_store_sidebar_front_option', array(
        'settings' => 'top_store_sidebar_front_option',
        'label'    => __('Front Page','top-store'),
        'section'  => 'top-store-section-sidebar-group',
        'type'     => 'select',
        'choices'    => array(
        'active-sidebar' => __('Active Both Sidebar','top-store'),
        'disable-left-sidebar'  => __('Disable Left Sidebar','top-store'),
        'disable-right-sidebar' => __('Disable Right Sidebar','top-store'),
        ),
    ));

$wp_customize->add_setting('top_store_sidebar_ineternal_option', array(
        'default'        => 'active-sidebar',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control( 'top_store_sidebar_ineternal_option', array(
        'settings' => 'top_store_sidebar_ineternal_option',
        'label'    => __('Internal Pages','top-store'),
        'section'  => 'top-store-section-sidebar-group',
        'type'     => 'select',
        'choices'    => array(
        'active-sidebar' => __('Active Both Sidebar','top-store'),
        'no-sidebar' => __('No Sidebar','top-store'),
        'disable-left-sidebar'  => __('Disable Left Sidebar','top-store'),
        'disable-right-sidebar' => __('Disable Right Sidebar','top-store'),
        ),
    ));

/****************/
//doc link
/****************/
$wp_customize->add_setting('top_store_sticky_sidebar_learn_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_sticky_sidebar_learn_more',
            array(
        'section'    => 'top-store-section-sidebar-group',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#sidebar-setting',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));
/*********************/
// Move To Top
/********************/
 $wp_customize->add_setting( 'top_store_move_to_top', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new top_store_Toggle_Control( $wp_customize, 'top_store_move_to_top', array(
    'label'       => esc_html__( 'Enable', 'top-store' ),
    'section'     => 'top-store-move-to-top',
    'type'        => 'toggle',
    'settings'    => 'top_store_move_to_top',
  ) ) );

  // BG color
 $wp_customize->add_setting('top_store_move_to_top_bg_clr', array(
        'default'           => '#141415',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Top_Store_Customizer_Color_Control($wp_customize,'top_store_move_to_top_bg_clr', array(
        'label'      => __('Background Color', 'top-store' ),
        'section'    => 'top-store-move-to-top',
        'settings'   => 'top_store_move_to_top_bg_clr',
    ) ) 
 );  

$wp_customize->add_setting('top_store_move_to_top_icon_clr', array(
        'default'        => '#fff',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new WP_Customize_Color_Control($wp_customize,'top_store_move_to_top_icon_clr', array(
        'label'      => __('Icon Color', 'top-store' ),
        'section'    => 'top-store-move-to-top',
        'settings'   => 'top_store_move_to_top_icon_clr',
    ) ) 
 );

/****************/
//doc link
/****************/
$wp_customize->add_setting('top_store_movetotop_learn_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_movetotop_learn_more',
            array(
        'section'    => 'top-store-move-to-top',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#move-top',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));