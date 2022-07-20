<?php
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package Top Store WordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
	return;
}
/**
 * Top Store WooCommerce Compatibility
 */
if ( ! class_exists( 'top_store_Woocommerce_Ext' ) ) :
	/**
	 * top_store_Woocommerce_Ext Compatibility
	 *
	 * @since 1.0.0
	 */
	class top_store_Woocommerce_Ext{

        /**
		 * Member Variable
		 *
		 * @var object instance
		 */
		private static $instance;

		/**
		 * Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}
        /**
		 * Constructor
		 */
		public function __construct(){
		    add_action( 'wp_enqueue_scripts',array( $this, 'top_store_add_scripts' ));	
		    add_action( 'wp_enqueue_scripts',array( $this, 'top_store_add_style' ));	

		    add_filter( 'post_class', array( $this, 'top_store_post_class' ) );
		   
		    add_action( 'after_setup_theme', array( $this, 'top_store_common_actions' ), 999 );
		    add_filter( 'top_store_theme_js_localize', array( $this, 'top_store_js_localize' ) );
		    add_action( 'woocommerce_before_shop_loop_item_title', array( $this, 'top_store_product_flip_image' ), 10 );
		    // Register Store Sidebars.
			add_action( 'widgets_init', array( $this, 'top_store_store_widgets_init' ), 15 );
			add_action( 'after_setup_theme', array( $this, 'top_store_setup_theme' ) );
		    // quick view ajax.
			add_action( 'wp_ajax_alm_load_product_quick_view', array( $this, 'top_store_load_product_quick_view_ajax' ) );
			add_action( 'wp_ajax_nopriv_alm_load_product_quick_view', array( $this, 'top_store_load_product_quick_view_ajax' ) );
			add_action('top_store_woo_quick_view_product_summary', array( $this, 'top_store_woo_single_product_content_structure' ), 10, 1 );
			//shop
			 add_action('woocommerce_before_shop_loop', array($this, 'top_store_before_shop_loop'), 35);
			 add_action('woocommerce_after_shop_loop_item', array($this, 'top_store_list_after_shop_loop_item'),5);
			
			// Custom Template Quick View.
			$this->top_store_quick_view_content_actions();
			
		    add_action( 'wp', array( $this, 'top_store_single_product_customization' ) );
           
            // Alter cross-sells display
			remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cross_sell_display' );
			if ( '0' != get_theme_mod( 'top_store_cross_num_col_shw', '2' ) ) {
				add_action( 'woocommerce_cart_collaterals', array( $this, 'top_store_cross_sell_display' ) );
			}


		 }
		 // woocommerce sidebar
		/**
		 * Store widgets init.
		 */
		function top_store_store_widgets_init(){
			register_sidebar(array(
		              'name'          => esc_html__( 'WooCommerce Sidebar', 'top-store' ),
		              'id'            => 'top-store-woo-shop-sidebar',
		              'description'   => esc_html__( 'Add widgets here to appear in your WooCommerce Sidebar.', 'top-store' ),
		              'before_widget' => '<div id="%1$s" class="widget %2$s"><div class="top-store-widget-content">',
		'after_widget'  => '</div></div>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	        ) );
		}
	
       /**
		 * Setup theme
		 *
		 * @since 1.0.3
		 */
		function top_store_setup_theme(){
			// WooCommerce.
			add_theme_support( 'wc-product-gallery-zoom' );
			add_theme_support( 'wc-product-gallery-lightbox' );
			add_theme_support( 'wc-product-gallery-slider' );
		}
		/**
		 * Product Flip Image
		 */
		function top_store_product_flip_image(){
			global $product;
			$hover_style = get_theme_mod( 'top_store_woo_product_animation' );

			if ( 'swap' === $hover_style ) {

				$attachment_ids = $product->get_gallery_image_ids();

				if ( $attachment_ids ) {

					$image_size = apply_filters( 'single_product_archive_thumbnail_size', 'shop_catalog' );

					echo apply_filters( 'open_woocommerce_top_store_product_flip_image', wp_get_attachment_image( reset( $attachment_ids ), $image_size, false, array( 'class' => 'show-on-hover' ) ) );
				}
			}
		}
		
		/**
		 * Post Class
		 *
		 * @param array $classes Default argument array.
		 *
		 * @return array;
		 */
		function top_store_post_class( $classes ){
			if (!top_store_is_blog()|| is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
                $classes[] = 'thunk-woo-product-list';
				$qv_enable = get_theme_mod( 'top_store_woo_quickview_enable',true);
				if ( true == $qv_enable ){
					$classes[] = 'opn-qv-enable';

				}
			}
			if (is_shop() || is_product_taxonomy() ||  post_type_exists( 'product' )){
				$hover_style = get_theme_mod( 'top_store_woo_product_animation' );
				if ( '' !== $hover_style ) {
					$classes[] = 'top-store-woo-hover-' . esc_attr($hover_style);
				}
				
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$single_product_tab_style = get_theme_mod( 'top_store_single_product_tab_layout','horizontal' );
				if ( '' !== $single_product_tab_style ){
					$classes[] = 'top-store-single-product-tab-'.esc_attr($single_product_tab_style);
				}
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$shadow_style = get_theme_mod( 'top_store_product_box_shadow' );
				if ( '' !== $shadow_style ){
					$classes[] = 'top-store-shadow-' . esc_attr($shadow_style);
				}	
			}
			if (is_shop() || is_product_taxonomy() || post_type_exists( 'product' )){
			$shadow_hvr_style = get_theme_mod( 'top_store_product_box_shadow_on_hover' );
				if ( '' !== $shadow_hvr_style ){
					$classes[] = 'top-store-shadow-hover-' . esc_attr($shadow_hvr_style);
				}	
			}

			if(class_exists('Taiowc_Pro')){
                $classes[] ='taiowc-fly-cart';
			}
		
			return $classes;
		}
		/**
		 * Infinite Products Show on scroll
		 *
		 * @since 1.1.0
		 * @param array $localize   JS localize variables.
		 * @return array
		 */
		function top_store_js_localize( $localize ){
			global $wp_query;
		
			$localize['ajax_url']                   = esc_url(admin_url( 'admin-ajax.php' ));
			$localize['is_cart']                    = is_cart();
			$localize['is_single_product']          = is_product();
			$localize['query_vars']                 = json_encode( $wp_query->query );
			$localize['shop_quick_view_enable']     = get_theme_mod('top_store_woo_quickview_enable','true' );
			$localize['query_vars']                 = json_encode( $wp_query->query );
			$localize['shop_no_more_post_message']  = apply_filters( 'top_store_no_more_product_text', __( 'No more products to show.', 'top-store' ) );
			return $localize;
			
		}
       /**
		 * Common Actions.
		 *
		 * @since 1.1.0
		 * @return void
		 */
		function top_store_common_actions(){
			
			// Quick View.
			$this->top_store_shop_init_quick_view();

		}
		/**
		 * Init Quick View
		 */
		function top_store_shop_init_quick_view(){
			$qv_enable = get_theme_mod( 'top_store_woo_quickview_enable','true' );
			if ( true == $qv_enable ){
				add_filter( 'top_store_theme_js_localize', array( $this, 'top_store_top_store_qv_js_localize' ) );
				add_action( 'quickview', array( $this,'top_store_add_quick_view_on_img' ),15);
				// load modal template.
				add_action( 'wp_footer', array( $this, 'top_store_quick_view_html' ) );
			}
		}
		/**
		 * Add Scripts
		 */
		function top_store_add_scripts(){
		   wp_enqueue_script( 'top-store-woocommerce-js', TOP_STORE_THEME_URI .'/inc/woocommerce/js/woocommerce.js', array( 'jquery' ), '1.0.0', true );
           $localize = array(
				'ajaxUrl'  => esc_url(admin_url( 'admin-ajax.php' )),
			);
           wp_localize_script( 'top-store-woocommerce-js', 'topstore',  $localize );	
           wp_enqueue_script('top-store-quick-view', TOP_STORE_THEME_URI.'inc/woocommerce/quick-view/js/quick-view.js', array( 'jquery' ), '', true );
           wp_localize_script('top-store-quick-view', 'topstoreqv', array('ajaxurl' => esc_url(admin_url( 'admin-ajax.php' ))));
 
		  }
		/**
		 * Add Style
		 */
		function top_store_add_style(){
        wp_enqueue_style( 'top-store-quick-view', TOP_STORE_THEME_URI. 'inc/woocommerce/quick-view/css/quick-view.css', null, '');
		}
        /**
		 * Quick view localize.
		 *
		 * @since 1.0
		 * @param array $localize   JS localize variables.
		 * @return array
		 */
		function top_store_top_store_qv_js_localize( $localize ){
			global $wp_query;
			$loader = '';
			if ( ! isset( $localize['ajax_url'] ) ){
				$localize['ajax_url'] = esc_url(admin_url( 'admin-ajax.php', 'relative' ));
			}
			$localize['qv_loader'] = $loader;
			return $localize;
		}
		
		/**
		 * Quick view on image
		 */
		function top_store_add_quick_view_on_img(){
			global $product;
            $button='';
			$product_id = $product->get_id();

			// Get label.
			$label = __( 'Quick View', 'top-store' );

			$button.='<div class="thunk-quik">
			             <div class="thunk-quickview">
                               <span class="quik-view">
                                   <a href="#" class="opn-quick-view-text" data-product_id="' . esc_attr($product_id) . '">
                                      <span><i class="th-icon th-icon-search" aria-hidden="true"></i></span>
                                    
                                   </a>
                            </span>
                          </div>';
            $button.= '</div>';
			$button = apply_filters( 'top_store_woo_add_quick_view_text_html', $button, $label, $product );
			echo $button;
		}
		/**
		 * Quick view html
		 */
		function top_store_quick_view_html(){
			$this->top_store_quick_view_dependent_data();
			require_once TOP_STORE_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-modal.php';
		}
		/**
		 * Quick view dependent data
		 */
		function top_store_quick_view_dependent_data(){
			wp_enqueue_script( 'wc-add-to-cart-variation' );
			wp_enqueue_script( 'flexslider' );
		}
        /**
		 * Quick view ajax
		 */
		function top_store_load_product_quick_view_ajax(){
			if ( ! isset( $_REQUEST['product_id'] ) ){
				die();
			}
			$product_id = intval( $_REQUEST['product_id'] );
			// set the main wp query for the product.
			wp( 'p=' . $product_id . '&post_type=product' );
			// remove product thumbnails gallery.
			remove_action( 'woocommerce_product_thumbnails', 'woocommerce_show_product_thumbnails', 20 );
			ob_start();
			// load content template.
			require_once TOP_STORE_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-product.php';
			echo ob_get_clean();
			die();
		}
		/**
		 * Quick view actions
		 */
		public function top_store_quick_view_content_actions(){
			// Image.
			add_action('top_store_woo_qv_product_image', 'woocommerce_show_product_sale_flash', 10 );
			add_action('top_store_woo_qv_product_image', array( $this, 'top_store_qv_product_images_markup' ), 20 );
		} 
			
		/**
		 * Footer markup.
		 */
		function top_store_qv_product_images_markup(){
           require_once TOP_STORE_THEME_DIR . 'inc/woocommerce/quick-view/quick-view-product-image.php';
		}
        function top_store_woo_single_product_content_structure(){
							/**
							 * Add Product Title on single product page for all products.
							 */
							do_action( 'top_store_woo_single_title_before' );
							woocommerce_template_single_title();
							do_action( 'top_store_woo_single_title_after' );
							/**
							 * Add Product Price on single product page for all products.
							 */
							do_action( 'top_store_woo_single_price_before' );
							woocommerce_template_single_price();
							do_action( 'top_store_woo_single_price_after' );
							/**
							 * Add rating on single product page for all products.
							 */
							do_action( 'top_store_woo_single_rating_before' );
							woocommerce_template_single_rating();
							do_action( 'top_store_woo_single_rating_after' );
							
							do_action( 'top_store_woo_single_short_description_before' );
							woocommerce_template_single_excerpt();
							do_action( 'top_store_woo_single_short_description_after' );
							
							do_action( 'top_store_woo_single_add_to_cart_before' );
							woocommerce_template_single_add_to_cart();
							do_action( 'top_store_woo_single_add_to_cart_after' );
							
							do_action( 'top_store_woo_single_category_before' );
							woocommerce_template_single_meta();
							do_action( 'top_store_woo_single_category_after' );
			
		}
        /**
		 * Single Product customization.
		 *
		 * @return void
		 */
		function top_store_single_product_customization(){
			if ( ! is_product() ){
				return;
			}
            remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
            remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40 );
            add_filter('woocommerce_product_description_heading', '__return_empty_string');
            add_filter('woocommerce_product_reviews_heading', '__return_empty_string');
            add_filter('woocommerce_product_additional_information_heading', '__return_empty_string');
            add_action( 'woocommerce_after_single_product_summary','woocommerce_template_single_meta',15 );
			
			/* Display Related Products */
			if ( ! get_theme_mod( 'top_store_related_product_display',true ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );
			}
			/* Display upsell Products */
			if ( ! get_theme_mod( 'top_store_upsell_product_display',true ) ) {
				remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 20 );
			}

			if(get_theme_mod( 'top_store_upsell_product_display',true )==true){
			  add_action( 'woocommerce_after_single_product_summary',array( $this, 'top_store_woocommerce_output_upsells' ),15);
             }else{
             remove_action( 'woocommerce_after_single_product_summary',array( $this, 'top_store_woocommerce_output_upsells' ));	
             }
             add_filter( 'woocommerce_output_related_products_args', array( $this, 'top_store_related_no_col_product_show' ) );

		}
	    /*****************/
		// upsale product
       /*****************/
		function top_store_woocommerce_output_upsells(){
		$upsell_columns = get_theme_mod('top_store_upsale_num_col_shw','4');
		$upsell_no_product = get_theme_mod( 'top_store_upsale_num_product_shw','4');	
        woocommerce_upsell_display($upsell_no_product,$upsell_columns); // Display max 3 products, 3 per row
         }
        /*****************************/ 
        // realted product argument pass
        /*****************************/ 
        function top_store_related_no_col_product_show( $args){
		$rel_columns = get_theme_mod('top_store_related_num_col_shw','4');
		$rel_no_product = get_theme_mod( 'top_store_related_num_product_shw','4');
		$args['posts_per_page'] = $rel_no_product; // related products
	    $args['columns'] = $rel_columns; // arranged in columns
	    return $args;
		}   
		
        /**
		 * Shop page view list and grid view.
		 */
        function top_store_before_shop_loop(){
        echo '<div class="thunk-list-grid-switcher">';
        echo '<a title="' . esc_attr__('Grid View', 'top-store') . '" href="#" data-type="grid" class="thunk-grid-view selected"><i class="fa fa-th"></i></a>';

        echo '<a title="' . esc_attr__('List View', 'top-store') . '" href="#" data-type="list" class="thunk-list-view"><i class="fa fa-bars"></i></a>';

        echo '</div>';
        }
        // shop page content
        function top_store_list_after_shop_loop_item(){
        ?>
           <div class="os-product-excerpt"><?php the_excerpt(); ?></div>
        <?php   
        }

		/**
		 * Change products per row for crossells.
		 */
		 function top_store_cross_sell_display(){
			// Get count
			$count = get_theme_mod( 'top_store_cross_num_product_shw', '4' );
			$count = $count ? $count : '4';
			// Get columns
			$columns = get_theme_mod( 'top_store_cross_num_col_shw', '2' );
			$columns = $columns ? $columns : '2';
			// Alter cross-sell display
			woocommerce_cross_sell_display( $count, $columns );
		} 

	}
endif;
top_store_Woocommerce_Ext::get_instance();