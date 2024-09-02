<?php
// main header

/***************************************/
// Disable product category search box
/****************************************/
// choose col layout
if(class_exists('Top_Store_WP_Customize_Control_Radio_Image')){
        $wp_customize->add_setting(
            'top_store_main_header_layout', array(
                'default'           => 'mhdrfour',
                'sanitize_callback' => 'top_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Top_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'top_store_main_header_layout', array(
                    'label'    => esc_html__( 'Header Layout', 'top-store' ),
                    'section'  => 'top-store-main-header',
                    'choices'  => array(
                        'mhdrfour' => array(
                            'url' => TOP_STORE_MAIN_HEADER_LAYOUT_ONE,
                        ),
                        'mhdrfive' => array(
                            'url' => TOP_STORE_MAIN_HEADER_LAYOUT_TWO,
                        ),
                        'mhdrsix' => array(
                            'url' => TOP_STORE_MAIN_HEADER_LAYOUT_THREE,
                        ),
                        'mhdrseven' => array(
                            'url' => TOP_STORE_MAIN_HEADER_LAYOUT_FOUR,
                        ),
                                     
                    ),
                )
            )
        );
} 
/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('top_store_menu_alignment', array(
                'default'               => 'left',
                'sanitize_callback'     => 'top_store_sanitize_select',
            ) );
$wp_customize->add_control( new top_store_Customizer_Buttonset_Control( $wp_customize, 'top_store_menu_alignment', array(
                'label'                 => esc_html__( 'Menu Alignment', 'top-store' ),
                'section'               => 'top-store-main-header',
                'settings'              => 'top_store_menu_alignment',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'top-store' ),
                    'center'            => esc_html__( 'center', 'top-store' ),
                    'right'             => esc_html__( 'Right', 'top-store' ),
                ),
        ) ) );
//Main menu option
$wp_customize->add_setting('top_store_main_header_option', array(
        'default'        => 'callto',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control( 'top_store_main_header_option', array(
        'settings' => 'top_store_main_header_option',
        'label'    => __('Right Column','top-store'),
        'section'  => 'top-store-main-header',
        'type'     => 'select',
        'choices'    => array(
        'none'       => __('None','top-store'),
        'button'     => __('Button (Pro)','top-store'),
        'callto'     => __('Call-To','top-store'),
        'widget'     => __('Widget (Pro)','top-store'),     
        ),
    ));
//**************/
// BUTTON TEXT //
//**************/
$wp_customize->add_setting('top_store_main_hdr_btn_txt', array(
        'default' => __('Button Text','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'top_store_main_hdr_btn_txt', array(
        'label'    => __('Button Text', 'top-store'),
        'section'  => 'top-store-main-header',
         'type'    => 'text',
));

$wp_customize->add_setting('top_store_main_hdr_btn_lnk', array(
        'default' => __('#','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        
));
$wp_customize->add_control( 'top_store_main_hdr_btn_lnk', array(
        'label'    => __('Button Link', 'top-store'),
        'section'  => 'top-store-main-header',
         'type'    => 'text',
));
/*****************/
// Call-to
/*****************/
$wp_customize->add_setting('top_store_main_hdr_calto_txt', array(
        'default' => __('Call To','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        'transport'         => 'postMessage',
));
$wp_customize->add_control( 'top_store_main_hdr_calto_txt', array(
        'label'    => __('Call To Text', 'top-store'),
        'section'  => 'top-store-main-header',
         'type'    => 'text',
));

$wp_customize->add_setting('top_store_main_hdr_calto_nub', array(
        'default' =>'',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
   
));
$wp_customize->add_control( 'top_store_main_hdr_calto_nub', array(
        'label'    => __('Call To Number', 'top-store'),
        'section'  => 'top-store-main-header',
         'type'    => 'text',
));
// col1 widget redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_main_header_widget_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize, 'top_store_main_header_widget_redirect', array(
                    'section'      => 'top-store-main-header',
                    'button_text'  => esc_html__( 'Go To Widget', 'top-store' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/***********************************/  
// menu alignment
/***********************************/ 
$wp_customize->add_setting('top_store_mobile_menu_open', array(
                'default'               => 'overcenter',
                'sanitize_callback'     => 'top_store_sanitize_select',
            ) );
$wp_customize->add_control( new top_store_Customizer_Buttonset_Control( $wp_customize, 'top_store_mobile_menu_open', array(
                'label'                 => esc_html__( 'Mobile Menu', 'top-store' ),
                'section'               => 'top-store-main-header',
                'settings'              => 'top_store_mobile_menu_open',
                'choices'               => array(
                    'left'              => esc_html__( 'Left', 'top-store' ),
                    'overcenter'        => esc_html__( 'center', 'top-store' ),
                    'right'             => esc_html__( 'Right', 'top-store' ),
                ),
        ) ) );

/***********************************/  
// Sticky Header
/***********************************/ 
  $wp_customize->add_setting( 'top_store_sticky_header', array(
    'default'           => false,
    'sanitize_callback' => 'top_store_sanitize_checkbox',
  ) );
  $wp_customize->add_control( new top_store_Toggle_Control( $wp_customize, 'top_store_sticky_header', array(
    'label'       => esc_html__( 'Sticky Header', 'top-store' ),
    'section'     => 'top-store-main-header',
    'type'        => 'toggle',
    'settings'    => 'top_store_sticky_header',
  ) ) );
/******************/
// Disable in Mobile
/******************/
$wp_customize->add_setting( 'top_store_whislist_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_whislist_mobile_disable', array(
                'label'                 => esc_html__('Check to disable wishlist icon in mobile device', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top-store-main-header',
                'settings'              => 'top_store_whislist_mobile_disable',
                'priority'   => 10,
            ) ) );

$wp_customize->add_setting( 'top_store_account_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_account_mobile_disable', array(
                'label'                 => esc_html__('Check to disable account icon in mobile device', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top-store-main-header',
                'settings'              => 'top_store_account_mobile_disable',
                'priority'   => 12,
            ) ) );

$wp_customize->add_setting( 'top_store_cart_mobile_disable', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ) );
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_cart_mobile_disable', array(
                'label'                 => esc_html__('Check to disable cart icon in mobile device', 'top-store'),
                'type'                  => 'checkbox',
                'section'               => 'top-store-main-header',
                'settings'              => 'top_store_cart_mobile_disable',
                'priority'   => 13,
            ) ) );

/****************/
//doc link
/****************/
$wp_customize->add_setting('top_store_main_header_doc_learn_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_main_header_doc_learn_more',
            array(
        'section'    => 'top-store-main-header',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#main-header',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));