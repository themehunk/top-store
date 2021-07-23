<?php 
//Enable Loader
$wp_customize->add_setting( 'top_store_social_original_color', array(
                'default'               => false,
                'sanitize_callback'     => 'top_store_sanitize_checkbox',
            ));
$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'top_store_social_original_color', array(
                'label'       => esc_html__('Show Original Color', 'top-store'),
                'type'        => 'checkbox',
                'section'     => 'top-store-social-icon',
                'settings'    => 'top_store_social_original_color',
)));
$wp_customize->add_setting('top_store_social_link_facebook', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('top_store_social_link_facebook', array(
        'label'    => __('Facebook URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_facebook',
         'type'       => 'text',
        
        ));

$wp_customize->add_setting('top_store_social_link_linkedin', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('top_store_social_link_linkedin', array(
        'label'    => __('LinkedIn URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_linkedin',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('top_store_social_link_pintrest', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        ));
        $wp_customize->add_control('top_store_social_link_pintrest', array(
        'label'    => __('Pinterest URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_pintrest',
         'type'       => 'text',
        
        ));
$wp_customize->add_setting('top_store_social_link_twitter', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('top_store_social_link_twitter', array(
        'label'    => __('Twitter URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_twitter',
         'type'       => 'text',
        ));
$wp_customize->add_setting('top_store_social_link_insta', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('top_store_social_link_insta', array(
        'label'    => __('Instagram URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_insta',
         'type'       => 'text',
        ));
$wp_customize->add_setting('top_store_social_link_tumblr', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('top_store_social_link_tumblr', array(
        'label'    => __('Tumblr URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_tumblr',
         'type'       => 'text',
        ));
$wp_customize->add_setting('top_store_social_link_youtube', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('top_store_social_link_youtube', array(
        'label'    => __('Youtube URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_youtube',
         'type'       => 'text',
        ));
$wp_customize->add_setting('top_store_social_link_stumbleupon', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('top_store_social_link_stumbleupon', array(
        'label'    => __('Stumbleupon URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_stumbleupon',
        'type'     => 'text',
        ));
        $wp_customize->add_setting('top_store_social_link_dribble', array(
        'default'           => '#',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
        
        ));
        $wp_customize->add_control('top_store_social_link_dribble', array(
        'label'    => __('Dribble URL', 'top-store'),
        'section'  => 'top-store-social-icon',
        'settings' => 'top_store_social_link_dribble',
        'type'     => 'text',
        ));

/****************/
//body doc link
/****************/
$wp_customize->add_setting('top_store_social_link_more', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_social_link_more',
            array(
        'section'     => 'top-store-social-icon',
        'type'        => 'doc-link',
        'url'         => 'https://themehunk.com/docs/top-store/#social-icon',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));