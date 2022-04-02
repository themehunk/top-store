<?php
/**
 * Register customizer panels & sections.
 */
/*************************/
/*WordPress Default Panel*/
/*************************/
$top_store_shop_panel_default = new top_store_WP_Customize_Panel( $wp_customize,'top-store-panel-default', array(
    'priority' => 1,
    'title'    => __( 'WordPress Default', 'top-store' ),
  ));
$wp_customize->add_panel($top_store_shop_panel_default);
$wp_customize->get_section( 'title_tagline' )->panel = 'top-store-panel-default';
$wp_customize->get_section( 'static_front_page' )->panel = 'top-store-panel-default';
$wp_customize->get_section( 'custom_css' )->panel = 'top-store-panel-default';

$wp_customize->add_setting('top_store_home_page_setup', array(
    'sanitize_callback' => 'top_store_sanitize_text',
    ));
$wp_customize->add_control(new top_store_Misc_Control( $wp_customize, 'top_store_home_page_setup',
            array(
        'section'    => 'static_front_page',
        'type'      => 'doc-link',
        'url'       => 'https://themehunk.com/docs/top-store/#homepage-setting',
        'description' => esc_html__( 'To know more go with this', 'top-store' ),
        'priority'   =>100,
    )));
/************************/
// Background option
/************************/
$top_store_shop_bg_option = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-bg-option', array(
    'title' =>  __( 'Background', 'top-store' ),
    'panel' => 'top-store-panel-default',
    'priority' => 10,
  ));
$wp_customize->add_section($top_store_shop_bg_option);

/*************************/
/*Layout Panel*/
/*************************/
$wp_customize->add_panel( 'top-store-panel-layout', array(
				'priority' => 3,
				'title'    => __( 'Layout', 'top-store' ),
) );

// Header
$top_store_section_header_group = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-section-header-group', array(
    'title' =>  __( 'Header', 'top-store' ),
    'panel' => 'top-store-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section( $top_store_section_header_group );

// above-header
$top_store_above_header = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-above-header', array(
    'title'    => __( 'Above Header', 'top-store' ),
    'panel'    => 'top-store-panel-layout',
        'section'  => 'top-store-section-header-group',
        'priority' => 3,
  ));
$wp_customize->add_section( $top_store_above_header );
// main-header
$top_store_shop_main_header = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-main-header', array(
    'title'    => __( 'Main Header', 'top-store' ),
    'panel'    => 'top-store-panel-layout',
    'section'  => 'top-store-section-header-group',
    'priority' => 4,
  ));
$wp_customize->add_section( $top_store_shop_main_header );

//blog
$top_store_section_blog_group = new  top_store_WP_Customize_Section( $wp_customize,'top-store-section-blog-group', array(
    'title' =>  __( 'Blog', 'top-store' ),
    'panel' => 'top-store-panel-layout',
    'priority' => 2,
  ));
$wp_customize->add_section($top_store_section_blog_group);

$top_store_section_footer_group = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-section-footer-group', array(
    'title' =>  __( 'Footer', 'top-store' ),
    'panel' => 'top-store-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section( $top_store_section_footer_group);
// sidebar
$top_store_section_sidebar_group = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-section-sidebar-group', array(
    'title' =>  __( 'Sidebar', 'top-store' ),
    'panel' => 'top-store-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($top_store_section_sidebar_group);
// Scroll to top
$top_store_move_to_top = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-move-to-top', array(
    'title' =>  __( 'Move To Top', 'top-store' ),
    'panel' => 'top-store-panel-layout',
    'priority' => 3,
  ));
$wp_customize->add_section($top_store_move_to_top);
//above-footer
$top_store_above_footer = new  top_store_WP_Customize_Section( $wp_customize, 'top-store-above-footer',array(
    'title'    => __( 'Above Footer','top-store' ),
    'panel'    => 'top-store-panel-layout',
        'section'  => 'top-store-section-footer-group',
        'priority' => 1,
));
$wp_customize->add_section( $top_store_above_footer);
//widget footer
$top_store_shop_widget_footer = new  top_store_WP_Customize_Section($wp_customize,'top-store-widget-footer', array(
    'title'    => __('Widget Footer','top-store'),
    'panel'    => 'top-store-panel-layout',
    'section'  => 'top-store-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $top_store_shop_widget_footer);
//Bottom footer
$top_store_shop_bottom_footer = new  top_store_WP_Customize_Section($wp_customize,'top-store-bottom-footer', array(
    'title'    => __('Below Footer','top-store'),
    'panel'    => 'top-store-panel-layout',
    'section'  => 'top-store-section-footer-group',
    'priority' => 5,
));
$wp_customize->add_section( $top_store_shop_bottom_footer);

/*************************/
/* Preloader */
/*************************/
$wp_customize->add_section( 'top-store-pre-loader' , array(
    'title'      => __('Preloader','top-store'),
    'priority'   => 30,
) );
/*************************/
/* Social   Icon*/
/*************************/
$top_store_social_header = new top_store_WP_Customize_Section( $wp_customize, 'top-store-social-icon', array(
    'title'    => __( 'Social Icon', 'top-store' ),
    'priority' => 30,
  ));
$wp_customize->add_section( $top_store_social_header );
/*************************/
/* Frontpage Panel */
/*************************/
$wp_customize->add_panel( 'top-store-panel-frontpage', array(
                'priority' => 5,
                'title'    => __( 'Frontpage Sections', 'top-store' ),
) );

$top_store_top_slider_section = new top_store_WP_Customize_Section( $wp_customize, 'top_store_top_slider_section', array(
    'title'    => __( 'Top Slider', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 1,
  ));
$wp_customize->add_section( $top_store_top_slider_section );

$top_store_category_tab_section = new top_store_WP_Customize_Section( $wp_customize, 'top_store_category_tab_section', array(
    'title'    => __( 'Tabbed Product Carousel', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 3,
  ));
$wp_customize->add_section( $top_store_category_tab_section );

$top_store_product_slide_section = new top_store_WP_Customize_Section( $wp_customize, 'top_store_product_slide_section', array(
    'title'    => __( 'Product Carousel', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 5,
  ));
$wp_customize->add_section( $top_store_product_slide_section );

$top_store_cat_slide_section = new top_store_WP_Customize_Section( $wp_customize, 'top_store_cat_slide_section', array(
    'title'    => __( 'Woo Category', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 4,
  ));
$wp_customize->add_section( $top_store_cat_slide_section );

$top_store_product_slide_list = new top_store_WP_Customize_Section( $wp_customize, 'top_store_product_slide_list', array(
    'title'    => __( 'Product List Carousel', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 7,
  ));
$wp_customize->add_section( $top_store_product_slide_list );
// ribbon
$top_store_ribbon = new top_store_WP_Customize_Section( $wp_customize, 'top_store_ribbon', array(
    'title'    => __( 'Ribbon', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 2,
  ));
$wp_customize->add_section( $top_store_ribbon );

$top_store_banner = new top_store_WP_Customize_Section( $wp_customize, 'top_store_banner', array(
    'title'    => __( 'Banner', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 6,
  ));
$wp_customize->add_section( $top_store_banner );

$top_store_brand = new top_store_WP_Customize_Section( $wp_customize, 'top_store_brand', array(
    'title'    => __( 'Brand', 'top-store' ),
    'panel'    => 'top-store-panel-frontpage',
    'priority' => 8,
  ));
$wp_customize->add_section( $top_store_brand );

/******************/
// Color Option
/******************/
$wp_customize->add_panel( 'top-store-panel-color-background', array(
        'priority' => 22,
        'title'    => __( 'Total Color & BG Options', 'top-store' ),
    ) );
// Section gloab color and background
$wp_customize->add_section('top-store-gloabal-color', array(
    'title'    => __('Global Colors', 'top-store'),
    'panel'    => 'top-store-panel-color-background',
    'priority' => 1,
));
//header
$top_store_header_color = new  top_store_WP_Customize_Section($wp_customize,'top-store-header-color', array(
    'title'    => __('Header', 'top-store'),
    'panel'    => 'top-store-panel-color-background',
    'priority' => 1,
));
$wp_customize->add_section( $top_store_header_color );

$top_store_abv_header_clr = new  top_store_WP_Customize_Section($wp_customize,'top-store-abv-header-clr', array(
    'title'    => __('Above Header','top-store'),
    'panel'    => 'top-store-panel-color-background',
    'section'  => 'top-store-header-color',
    'priority' => 1,
));
$wp_customize->add_section( $top_store_abv_header_clr);

$top_store_main_header_clr = new  top_store_WP_Customize_Section($wp_customize,'top-store-main-header-clr', array(
    'title'    => __('Main Header','top-store'),
    'panel'    => 'top-store-panel-color-background',
    'section'  => 'top-store-header-color',
    'priority' => 2,
));
$wp_customize->add_section( $top_store_main_header_clr);
/******************/
// Shop Page
/******************/
$top_store_woo_shop = new top_store_WP_Customize_Section( $wp_customize, 'top-store-woo-shop', array(
    'title'    => __( 'Product Style', 'top-store' ),
     'panel'    => 'woocommerce',
     'priority' => 2,
));
$wp_customize->add_section( $top_store_woo_shop );

$top_store_woo_single_product = new top_store_WP_Customize_Section( $wp_customize, 'top-store-woo-single-product', array(
    'title'    => __( 'Single Product', 'top-store' ),
     'panel'    => 'woocommerce',
     'priority' => 3,
));
$wp_customize->add_section($top_store_woo_single_product );

$top_store_woo_cart_page = new top_store_WP_Customize_Section( $wp_customize, 'top-store-woo-cart-page', array(
    'title'    => __( 'Cart Page', 'top-store' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($top_store_woo_cart_page);

$top_store_woo_shop_page = new top_store_WP_Customize_Section( $wp_customize, 'top-store-woo-shop-page', array(
    'title'    => __( 'Shop Page', 'top-store' ),
     'panel'    => 'woocommerce',
     'priority' => 4,
));
$wp_customize->add_section($top_store_woo_shop_page);