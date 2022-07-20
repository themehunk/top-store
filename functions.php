<?php
/**
 * Top Store functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 */
/**
 * Theme functions and definitions
 */
if ( ! function_exists( 'top_store_setup' ) ) :
define( 'TOP_STORE_THEME_VERSION','1.3.2');
define( 'TOP_STORE_THEME_DIR', get_template_directory() . '/' );
define( 'TOP_STORE_THEME_URI', get_template_directory_uri() . '/' );
define( 'TOP_STORE_THEME_SETTINGS', 'top-store-settings' );
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_top_store_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function top_store_setup(){
		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'top-store', get_template_directory() . '/languages' );
		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		add_theme_support( 'woocommerce' );
	
		// Add support for Block Styles.
        add_theme_support( 'wp-block-styles' );

        // Add support for full and wide align images.
        add_theme_support( 'align-wide' );

        // Add support for editor styles.
        add_theme_support( 'editor-styles' );

        // Enqueue editor styles.
        add_editor_style( 'style-editor.css' );
        // Add support for responsive embedded content.
        add_theme_support( 'responsive-embeds' );
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
		// Remove theme support for widget block editor
		remove_theme_support( 'widgets-block-editor' );
		/**
		 * Add support for core custom logo.
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		// Add support for Custom Header.
		add_theme_support( 'custom-header', 

		apply_filters( 'top_store_custom_header_args', array(
				'default-image' => '',
				'flex-height'   => true,
				'header-text'   => false,
				'video'          => false,
		) 
		) );


		// Recommend plugins
        add_theme_support( 'recommend-plugins', array(

            'hunk-companion' => array(
                'name' => esc_html__( 'Hunk Companion (Highly Recommended)', 'top-store' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'hunk-companion/hunk-companion.php',
            ),

            'th-advance-product-search' => array(
            'name' => esc_html__( 'TH Advance Product Search', 'top-store' ),
            'img' => 'icon-128x128.gif',
            'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            ),
            'th-all-in-one-woo-cart' => array(
                 'name' => esc_html__( 'Th All In One Woo Cart', 'top-store' ),
                  'img' => 'icon-128x128.png',
                 'active_filename' => 'th-all-in-one-woo-cart/th-all-in-one-woo-cart.php',
             ),
            'th-product-compare' => array(
                 'name' => esc_html__( 'Th Product Compare', 'top-store' ),
                  'img' => 'icon-128x128.png',
                 'active_filename' => 'th-product-compare/th-product-compare.php',
             ),
            'th-variation-swatches' => array(
                'name' => esc_html__( 'TH Variation Swatches', 'top-store' ),
                 'img' => 'icon-128x128.gif',
                'active_filename' => 'th-variation-swatches/th-variation-swatches.php',
            ),
            'lead-form-builder' => array(
                'name' => esc_html__( 'Lead Form Builder', 'top-store' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'lead-form-builder/lead-form-builder.php',
            ),
            'wp-popup-builder' => array(
                'name' => esc_html__( 'WP Popup Builder – Popup Forms & Newsletter', 'top-store' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'wp-popup-builder/wp-popup-builder.php',
            ), 

			'unlimited-blocks' => array(
				'name' => esc_html__( 'Unlimited blocks For Gutenberg', 'top-store' ),
				'img' => 'icon-128x128.png',
				'active_filename' => 'unlimited-blocks/unlimited-blocks.php',
				),
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'top-store' ),
                 'img' => 'icon-128x128.png',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),
            'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'ThemeHunk Megamenu – Menu builder', 'top-store' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
            ), 
			'yith-woocommerce-wishlist' => array(
				'name' => esc_html__( 'YITH WooCommerce Wishlist', 'top-store' ),
				 'img' => 'icon-128x128.jpg',
				'active_filename' => 'yith-woocommerce-wishlist/init.php',
			),  

        ) );

        // Import Data Content plugins
        add_theme_support( 'import-demo-content', array(

             'hunk-companion' => array(
                'name' => esc_html__( 'Hunk Companion', 'top-store' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'hunk-companion/hunk-companion.php',
            ),

            'one-click-demo-import' => array(
                'name' => esc_html__( 'One Click Demo Import', 'top-store' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'one-click-demo-import/one-click-demo-import.php',
            ), 
            
            'woocommerce' => array(
                'name' => esc_html__( 'Woocommerce', 'top-store' ),
                'img' => 'icon-128x128.png',
                'active_filename' => 'woocommerce/woocommerce.php',
            ),

            'th-advance-product-search' => array(
            'name' => esc_html__( 'TH Advance Product Search', 'top-store' ),
            'img' => 'icon-128x128.gif',
            'active_filename' => 'th-advance-product-search/th-advance-product-search.php',
            ),

            'th-all-in-one-woo-cart' => array(
                 'name' => esc_html__( 'TH All In One Woo Cart', 'top-store' ),
                  'img' => 'icon-128x128.png',
                 'active_filename' => 'th-all-in-one-woo-cart/th-all-in-one-woo-cart.php',
             ),

        ));

        // Useful plugins
        add_theme_support( 'useful-plugins', array(
             'themehunk-megamenu-plus' => array(
                'name' => esc_html__( 'Megamenu plugin from Themehunk.', 'top-store' ),
                'active_filename' => 'themehunk-megamenu-plus/themehunk-megamenu.php',
            ),
        ) );

        
		// Add support for Custom Background.
        if(get_theme_mod('top_store_color_scheme')=='opn-dark'){
        $args = array(
	    'default-color' => '2f2f2f',
        );
        }else{
        $args = array(
	    'default-color' => 'f1f1f1',
        );	
        }
        add_theme_support( 'custom-background',$args );
        
        $GLOBALS['content_width'] = apply_filters( 'top_store_content_width', 640 );
        add_theme_support( 'woocommerce', array(
                                                 'thumbnail_image_width' => 320,
                                             ) );
	}
endif;
add_action( 'after_setup_theme', 'top_store_setup' );
/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 */
/**
 * Register widget area.
 */
function top_store_widgets_init(){
	register_sidebar( array(
		'name'          => esc_html__( 'Primary Sidebar', 'top-store' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here to appear in your primary sidebar.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="top-store-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar( array(
		'name'          => esc_html__( 'Secondary Sidebar', 'top-store' ),
		'id'            => 'sidebar-2',
		'description'   => esc_html__( 'Add widgets here to appear in your secondary sidebar.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="top-store-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header First Widget', 'top-store' ),
		'id'            => 'top-header-widget-col1',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Second Widget', 'top-store' ),
		'id'            => 'top-header-widget-col2',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Above Header Third Widget', 'top-store' ),
		'id'            => 'top-header-widget-col3',
		'description'   => esc_html__( 'Add widgets here to appear in top header.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar(array(
		'name'          => esc_html__( 'Main Header Widget', 'top-store' ),
		'id'            => 'main-header-widget',
		'description'   => esc_html__( 'Add widgets here to appear in main header.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
    register_sidebar(array(
		'name'          => esc_html__( 'Footer Top First Widget', 'top-store' ),
		'id'            => 'footer-top-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Second Widget', 'top-store' ),
		'id'            => 'footer-top-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Top Third Widget', 'top-store' ),
		'id'            => 'footer-top-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below First Widget', 'top-store' ),
		'id'            => 'footer-below-first',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Second Widget', 'top-store' ),
		'id'            => 'footer-below-second',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	register_sidebar(array(
		'name'          => esc_html__( 'Footer Below Third Widget', 'top-store' ),
		'id'            => 'footer-below-third',
		'description'   => esc_html__( 'Add widgets here to appear in top footer.', 'top-store' ),
		'before_widget' => '<div id="%1$s" class="widget %2$s">',
		'after_widget'  => '</div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
	for ( $i = 1; $i <= 4; $i++ ){
		register_sidebar( array(
			'name'          => sprintf( esc_html__( 'Footer Widget Area %d', 'top-store' ), $i ),
			'id'            => 'footer-' . $i,
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h4 class="widget-title">',
			'after_title'   => '</h4>',
		) );
	}
}
add_action( 'widgets_init', 'top_store_widgets_init' );
/**
 * Enqueue scripts and styles.
 */
function top_store_scripts(){
	// enqueue css
	wp_enqueue_style( 'font-awesome', TOP_STORE_THEME_URI . '/third-party/fonts/font-awesome/css/font-awesome.css', '', TOP_STORE_THEME_VERSION );
	wp_enqueue_style( 'th-icon', TOP_STORE_THEME_URI . '/third-party/fonts/th-icon/style.css', '', TOP_STORE_THEME_VERSION );
	wp_enqueue_style( 'animate', TOP_STORE_THEME_URI . '/css/animate.css','',TOP_STORE_THEME_VERSION);
	wp_enqueue_style( 'top-store-menu', TOP_STORE_THEME_URI . '/css/top-store-menu.css','',TOP_STORE_THEME_VERSION);
	wp_enqueue_style( 'top-store-style', get_stylesheet_uri(), array(), TOP_STORE_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );
	wp_add_inline_style('top-store-style', top_store_custom_style());
    //enqueue js
    wp_enqueue_script("jquery-effects-core",array( 'jquery' ));
    wp_enqueue_script( 'jquery-ui-autocomplete',array( 'jquery' ),'1.0.0',true );
    wp_enqueue_script('imagesloaded');
    wp_enqueue_script('top-store-menu-js', TOP_STORE_THEME_URI .'/js/top-store-menu.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script('sticky-sidebar-js', TOP_STORE_THEME_URI .'/js/sticky-sidebar.js', array( 'jquery' ), TOP_STORE_THEME_VERSION , true );
    wp_enqueue_script('top-store-accordian-menu-js', TOP_STORE_THEME_URI .'/js/top-store-accordian-menu.js', array( 'jquery' ), TOP_STORE_THEME_VERSION , true );
    wp_enqueue_script( 'top-store-custom-js', TOP_STORE_THEME_URI .'/js/top-store-custom.js', array( 'jquery' ), TOP_STORE_THEME_VERSION , true );
    $topstorelocalize = array(
				'top_store_move_to_top_optn' => (bool) get_theme_mod('top_store_move_to_top',false),
			);
    wp_localize_script( 'top-store-custom-js', 'top_store',  $topstorelocalize);
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'top_store_scripts' );
/**
 * Load init.
 */
require_once trailingslashit(TOP_STORE_THEME_DIR).'inc/init.php';

//custom function conditional check for blog page
function top_store_is_blog (){
    return ( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag()) && 'post' == get_post_type();
}

if ( ! function_exists( 'wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}

if (!is_array( get_option( 'theme_mods_top-store-pro')) ) {
function top_store_theme_switch() {
    update_option( 'theme_mods_top-store-pro', get_option( 'theme_mods_top-store') );
}
add_action('switch_theme', 'top_store_theme_switch');
}