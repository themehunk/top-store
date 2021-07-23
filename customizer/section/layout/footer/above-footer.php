<?php

/******************/
//Above footer
/******************/
//choose col layout
if(class_exists('Top_Store_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'top_store_above_footer_layout', array(
                'default'           => 'ft-abv-none',
                'sanitize_callback' => 'top_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Top_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'top_store_above_footer_layout', array(
                    'label'    => esc_html__('Layout','top-store'),
                    'section'  => 'top-store-above-footer',
                    'choices'  => array(
                        'ft-abv-none'   => array(
                            'url' => TOP_STORE_TOP_HEADER_LAYOUT_NONE,
                        ),
                        'ft-abv-one'   => array(
                            'url' => TOP_STORE_TOP_HEADER_LAYOUT_1,
                        ),
                        'ft-abv-two' => array(
                            'url' => TOP_STORE_TOP_HEADER_LAYOUT_2,
                        ),
                        'ft-abv-three' => array(
                            'url' => TOP_STORE_TOP_HEADER_LAYOUT_3,
                        ),
                    ),
                )
            )
        );
    } 
//********************************/
// col1-setting
//*******************************/
$wp_customize->add_setting('top_store_above_footer_col1_set', array(
        'default'        => 'text',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control('top_store_above_footer_col1_set', array(
        'settings' => 'top_store_above_footer_col1_set',
        'label'    => __('Column 1','top-store'),
        'section'  => 'top-store-above-footer',
        'type'     => 'select',
        'choices'  => array(
        'none'             => __('None','top-store'),
        'text'             => __('Text','top-store'),
        'menu'             => __('Menu','top-store'),
        'widget'           => __('Widget','top-store'),
        'social'           => __('Social Media','top-store'),   
    ),
));
//col1-text/html
$wp_customize->add_setting('top_store_footer_col1_texthtml', array(
        'default'           => __('Add your content here','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text',
        'transport'         => 'postMessage',
        
    ));
$wp_customize->add_control('top_store_footer_col1_texthtml', array(
        'label'    => __('Text', 'top-store'),
        'section'  => 'top-store-above-footer',
        'settings' => 'top_store_footer_col1_texthtml',
         'type'    => 'text',
    ));
// col1 widget redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_footer_col1_widget_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize,'top_store_footer_col1_widget_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__('Go To Widget','top-store'),
                    'button_class' => 'focus-customizer-widget-redirect-col1',  
                )
            )
        );
} 
// col1 menu redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_footer_col1_menu_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize,'top_store_footer_col1_menu_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__('Go To Menu','top-store'),
                    'button_class' => 'focus-customizer-menu-redirect-col1',  
                )
            )
        );
} 
// col1 social media redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_footer_col1_social_media_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize, 'top_store_footer_col1_social_media_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'top-store' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col1',  
                )
            )
        );
} 
/***************************************/
// col2
/***************************************/
$wp_customize->add_setting('top_store_above_footer_col2_set',array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control( 'top_store_above_footer_col2_set',array(
        'settings' => 'top_store_above_footer_col2_set',
        'label'   => __('Column 2','top-store'),
        'section' => 'top-store-above-footer',
        'type'    => 'select',
        'choices'    => array(
        'none'                 => __('None','top-store'),
        'text'             => __('Text','top-store'),
        'menu'                 => __('Menu','top-store'),
        'widget'                 => __('Widget','top-store'),
        'social'             => __('Social Media','top-store'),     
        ),
    ));
//col2-text/html
$wp_customize->add_setting('top_store_above_footer_col2_texthtml', array(
        'default'           => __('Add your content here','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text', 
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control('top_store_above_footer_col2_texthtml', array(
        'label'    => __('Text', 'top-store'),
        'section'  => 'top-store-above-footer',
        'settings' => 'top_store_above_footer_col2_texthtml',
         'type'    => 'text',
    ));
// col2 widget redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_above_footer_col2_widget_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize,'top_store_above_footer_col2_widget_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'top-store' ),
                    'button_class' => 'focus-customizer-widget-redirect-col2',  
                )
            )
        );
}    
// col2 menu redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_above_footer_col2_menu_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize,'top_store_above_footer_col2_menu_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'top-store' ),
                    'button_class' => 'focus-customizer-menu-redirect-col2',  
                )
            )
        );
}    
// col2 social media redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_above_footer_col2_social_media_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize, 'top_store_above_footer_col2_social_media_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'top-store' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col2',  
                )
            )
        );
} 
// col3
$wp_customize->add_setting('top_store_above_footer_col3_set', array(
        'default'        => 'none',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_select',
    ));
$wp_customize->add_control('top_store_above_footer_col3_set', array(
        'settings' => 'top_store_above_footer_col3_set',
        'label'   => __('Column 3','top-store'),
        'section' => 'top-store-above-footer',
        'type'    => 'select',
        'choices' => array(
        'none'             => __('None','top-store'),
        'text'             => __('Text','top-store'),
        'menu'             => __('Menu','top-store'),
        'widget'           => __('Widget','top-store'),
        'social'           => __('Social Media','top-store'),   
        ),
    ));
//col3-text/html
$wp_customize->add_setting('top_store_above_footer_col3_texthtml', array(
        'default'           => __('Add your content here','top-store'),
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_text', 
        'transport'         => 'postMessage', 
    ));
$wp_customize->add_control('top_store_above_footer_col3_texthtml', array(
        'label'    => __('Text', 'top-store'),
        'section'  => 'top-store-above-footer',
        'settings' => 'top_store_above_footer_col3_texthtml',
        'type'    => 'text',
    ));
// col3 social media redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_above_footer_col3_social_media_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize, 'top_store_above_footer_col3_social_media_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Social Media', 'top-store' ),
                    'button_class' => 'focus-customizer-social_media-redirect-col3',  
                )
            )
        );
} 
// col3 widget redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_above_footer_col3_widget_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize,'top_store_above_footer_col3_widget_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'top-store' ),
                    'button_class' => 'focus-customizer-widget-redirect-col3',  
                )
            )
        );
}
// col3 menu redirection
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_above_footer_col3_menu_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize,'top_store_above_footer_col3_menu_redirect', array(
                    'section'      => 'top-store-above-footer',
                    'button_text'  => esc_html__( 'Go To Menu', 'top-store' ),
                    'button_class' => 'focus-customizer-menu-redirect-col3',  
                )
            )
        );
}
/****************************/
// common option
/****************************/
if ( class_exists( 'top_store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'top_store_above_ftr_hgt', array(
                'sanitize_callback' => 'top_store_sanitize_range_value',
                'default'           => '30',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new top_store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'top_store_above_ftr_hgt', array(
                    'label'       => esc_html__( 'Height', 'top-store' ),
                    'section'     => 'top-store-above-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 30,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                     'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
// above bottom-border
if ( class_exists( 'top_store_WP_Customizer_Range_Value_Control' ) ){
$wp_customize->add_setting(
            'top_store_abv_ftr_botm_brd', array(
                'sanitize_callback' => 'top_store_sanitize_range_value',
                'default'           => '1',
                'transport'         => 'postMessage',
            )
        );
$wp_customize->add_control(
            new top_store_WP_Customizer_Range_Value_Control(
                $wp_customize, 'top_store_abv_ftr_botm_brd', array(
                    'label'       => esc_html__( 'Bottom Border', 'top-store' ),
                    'section'     => 'top-store-above-footer',
                    'type'        => 'range-value',
                    'input_attr'  => array(
                        'min'  => 0,
                        'max'  => 1000,
                        'step' => 1,
                    ),
                     'media_query' => true,
                    'sum_type'    => true,
                )
        )
);
}
// border-color
 $wp_customize->add_setting('top_store_above_frt_brdr_clr', array(
        'default'        => '#f1f1f1',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'top_store_sanitize_color',
        'transport'         => 'postMessage',
    ));
$wp_customize->add_control( 
    new Top_Store_Customizer_Color_Control($wp_customize,'top_store_above_frt_brdr_clr', array(
        'label'      => __('Border Color', 'top-store' ),
        'section'    => 'top-store-above-footer',
        'settings'   => 'top_store_above_frt_brdr_clr',
    ) ) 
 );  
/****************/
//doc link
/****************/
$wp_customize->add_setting('top_store_abv_ftr_learn_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_abv_ftr_learn_more',
            array(
        'section'    => 'top-store-above-footer',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#above-footer',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));