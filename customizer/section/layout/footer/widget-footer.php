<?php

/******************/
//Widegt footer
/******************/
if(class_exists('Top_Store_WP_Customize_Control_Radio_Image')){
               $wp_customize->add_setting(
               'top_store_bottom_footer_widget_layout', array(
               'default'           => 'ft-wgt-four',
               'sanitize_callback' => 'top_store_sanitize_radio',
            )
        );
$wp_customize->add_control(
            new Top_Store_WP_Customize_Control_Radio_Image(
                $wp_customize, 'top_store_bottom_footer_widget_layout', array(
                    'label'    => esc_html__( 'Layout','top-store'),
                    'section'  => 'top-store-widget-footer',
                    'choices'  => array(
                       'ft-wgt-none'   => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_NONE,
                        ),
                        'ft-wgt-one'   => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_1,
                        ),
                        'ft-wgt-two' => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_2,
                        ),
                        'ft-wgt-three' => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_3,
                        ),
                        'ft-wgt-four' => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_4,
                        ),
                        'ft-wgt-five' => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_5,
                        ),
                        'ft-wgt-six' => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_6,
                        ),
                        'ft-wgt-seven' => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_7,
                        ),
                        'ft-wgt-eight' => array(
                            'url' => TOP_STORE_FOOTER_WIDGET_LAYOUT_8,
                        ),
                    ),
                )
            )
        );
    } 
/******************************/
/* Widget Redirect
/****************************/
if (class_exists('top_store_Widegt_Redirect')){ 
$wp_customize->add_setting(
            'top_store_bottom_footer_widget_redirect', array(
            'sanitize_callback' => 'top_store_sanitize_text',
     )
);
$wp_customize->add_control(
            new top_store_Widegt_Redirect(
                $wp_customize, 'top_store_bottom_footer_widget_redirect', array(
                    'section'      => 'top-store-widget-footer',
                    'button_text'  => esc_html__( 'Go To Widget', 'top-store' ),
                    'button_class' => 'focus-customizer-widget-redirect',  
                )
            )
        );
} 
/****************/
//doc link
/****************/
$wp_customize->add_setting('top_store_ftr_wdgt_learn_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_ftr_wdgt_learn_more',
            array(
        'section'    => 'top-store-widget-footer',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#widget-footer',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));