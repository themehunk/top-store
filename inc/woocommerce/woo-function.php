<?php 
/**
 * Perform all main WooCommerce configurations for this theme
 *
 * @package  Top Store WordPress theme
 */
// If plugin - 'WooCommerce' not exist then return.
if ( ! class_exists( 'WooCommerce' ) ){
	   return;
}
/*******************************/
/** Sidebar Add Cart Product **/
/*******************************/
if ( ! function_exists( 'top_store_cart_total_item' ) ){
  /**
   * Cart Link
   * Displayed a link to the cart including the number of items present and the cart total
   */
 function top_store_cart_total_item(){
   global $woocommerce; 
  ?>
 <a class="cart-contents" href="<?php echo wc_get_cart_url(); ?>" title="<?php _e( 'View your shopping cart','top-store' ); ?>"><i class="fa fa-shopping-basket"></i> <span class="cart-content"><?php echo sprintf ( _n( '<span class="count-item">%d</span>', '<span class="count-item">%d</span>', WC()->cart->get_cart_contents_count(),'top-store' ), WC()->cart->get_cart_contents_count() ); ?><?php echo WC()->cart->get_cart_total(); ?></span></a>
  <?php }
}


// check wihsh list
if(!function_exists('top_store_whishlist_check')){

function top_store_whishlist_check($pid){
      if( class_exists( 'YITH_WCWL' ) ){
        echo top_store_whish_list($pid);
        }elseif( class_exists( 'WPCleverWoosw' )){
        echo top_store_wpc_whish_list($pid);          
    }    
        echo top_store_add_to_compare_fltr($pid);

}

}

/***********************************************/
//Sort section Woocommerce category filter show
/***********************************************/
function top_store_add_to_cart_url($product){
 $args = array();
     if ( $product ){
      $defaults = array(
        'quantity'   => 1,
        'class'      => implode(
          ' ',
          array_filter(
            array(
              'button th-button',
              'product_type_' . $product->get_type(),
              $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
              $product->supports( 'ajax_add_to_cart' ) && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
            )
          )
        ),
        'attributes' => array(
          'data-product_id'  => $product->get_id(),
          'data-product_sku' => $product->get_sku(),
          'aria-label'       => $product->add_to_cart_description(),
          'rel'              => 'nofollow',
        ),
      );

      $args = apply_filters( 'woocommerce_loop_add_to_cart_args', wp_parse_args( $args, $defaults ), $product );

      if ( isset( $args['attributes']['aria-label'] ) ) {
        $args['attributes']['aria-label'] = wp_strip_all_tags( $args['attributes']['aria-label'] );
      }

      wc_get_template( 'loop/add-to-cart.php', $args );
    }
}


function topstore_lite_plugin_get_version(){
if(is_plugin_active( 'hunk-companion/hunk-companion.php' )){  
$plugin_data = get_plugin_data(WP_PLUGIN_DIR . '/hunk-companion/hunk-companion.php');
$plugin_version = $plugin_data['Version'];
return $plugin_version;
}
}
/**********************************/
//Shop Product Markup
/**********************************/
if ( ! function_exists( 'top_store_product_meta_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function top_store_product_meta_start(){
    echo '<div class="thunk-product-wrap"><div class="thunk-product">';
  }
}
if ( ! function_exists( 'top_store_product_meta_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_product_meta_end(){

    echo '</div></div>';
  }
}
/**********************************/
//Shop Product Image Markup
/**********************************/
if ( ! function_exists( 'top_store_product_image_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function top_store_product_image_start(){
    echo '<div class="thunk-product-image">';
  }
}
if ( ! function_exists( 'top_store_product_image_end' ) ){

  /**
   * Thumbnail wrap start.
   */

  function top_store_product_image_end(){
      echo woocommerce_template_loop_rating();
      echo '<div class="thunk-icons-wrap">';
     do_action('quickview');

      global $product;
     $pid = $product->get_id();

    top_store_whishlist_check($pid);

    echo '</div></div>';
  }
}

if ( ! function_exists( 'top_store_product_content_start' ) ){
  /**
   * Thumbnail wrap start.
   */
  function top_store_product_content_start(){
    echo '<div class="thunk-product-content">';
  }
}
if ( ! function_exists( 'top_store_product_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_product_content_end(){

    echo '</div>';
  }
}
 /**
   * Thunk-product-hover start.
   */
 if ( ! function_exists( 'top_store_product_hover_start' ) ){
  function top_store_product_hover_start(){

    echo'<div class="thunk-product-hover">';
    // do_action('top_store_wishlist');
    // do_action('top_store_compare');
      
  }
}
if ( ! function_exists( 'top_store_product_hover_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_product_hover_end(){
    
    echo '</div>';
  }
}

if ( ! function_exists( 'top_store_shop_content_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_shop_content_start(){
    
    echo '<div id="shop-product-wrap">';
  }
}

if ( ! function_exists( 'top_store_shop_content_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_shop_content_end(){
    
    echo '</div>';
  }
}
/**
* Shop customization.
*
* @return void
*/
add_action( 'woocommerce_before_shop_loop_item', 'top_store_product_meta_start', 10);
add_action( 'woocommerce_after_shop_loop_item', 'top_store_product_meta_end', 12 );
add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_open',5);
add_action( 'woocommerce_before_shop_loop_item_title','woocommerce_template_loop_product_link_close',10);
add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_open',0);
add_action( 'woocommerce_shop_loop_item_title','woocommerce_template_loop_product_link_close',10);
add_action( 'woocommerce_before_shop_loop_item_title', 'top_store_product_image_start', 0);
add_action( 'woocommerce_before_shop_loop_item_title', 'top_store_product_image_end',10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10 );
add_action( 'woocommerce_after_shop_loop_item_title', 'top_store_product_hover_start',50);
add_action( 'woocommerce_after_shop_loop_item', 'top_store_product_hover_end',20);
add_action( 'woocommerce_before_shop_loop', 'top_store_shop_content_start',1);
add_action( 'woocommerce_after_shop_loop', 'top_store_shop_content_end',1);
remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open');
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action('woocommerce_init','th_compare_add_action_shop_list');
//To disable th compare Pro button 
remove_action('woocommerce_init', 'tpcp_add_action_shop_list');
//To integrate with a theme, please use bellow filters to hide the default buttons. hide default wishlist button on product archive page
add_filter( 'woosw_button_position_archive', function() {
    return '0';
} );

//hide default compare button on product archive page
add_filter( 'filter_wooscp_button_archive', function() {
    return '0';
} );
/***************/
// single page
/***************/
if ( ! function_exists( 'top_store_single_summary_start' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_single_summary_start(){
    
    echo '<div class="thunk-single-product-summary-wrap">';
  }
}
if( ! function_exists( 'top_store_single_summary_end' ) ){

  /**
   * Thumbnail wrap start.
   */
  function top_store_single_summary_end(){
    
    echo '</div>';
  }
}
add_action( 'woocommerce_before_single_product_summary', 'top_store_single_summary_start',0);
add_action( 'woocommerce_after_single_product_summary', 'top_store_single_summary_end',0);

/***********************/
// Th Product compare
/***********************/

function top_store_add_to_compare_fltr($pid){

if(class_exists('th_product_compare') || class_exists('Tpcp_product_compare')){
    global $product;
    $pid = $product->get_id();
    echo '<div class="thunk-compare"><span class="compare-list"><div class="woocommerce product compare-button">
          <a class="th-product-compare-btn compare" data-th-product-id="'.$pid.'"></a>
          </div></span></div>';

           }
        }
/**********************/
/** YITH wishlist **/
/**********************/

   function top_store_whish_list($pid){
     if( class_exists( 'YITH_WCWL' ) ){
        echo '<div class="thunk-wishlist"><span class="thunk-wishlist-inner">'.do_shortcode('[yith_wcwl_add_to_wishlist product_id='.$pid.' icon="th-icon th-icon-heart1" label="wishlist" already_in_wishslist_text="Already" browse_wishlist_text="Added"]' ).'</span></div>';
        } 
 }


/****************/
// WPC add to compare
/****************/
function top_store_wpc_add_to_compare_fltr($pid){
   if( class_exists( 'WPCleverWoosc' ) ){
        echo '<div class="thunk-compare">'.do_shortcode('[woosc id='.$pid.']').'</div>';
}
}

/**********************/
/** WPC WOOSW wishlist **/
/**********************/
function top_store_wpc_whish_list($pid){
   if( class_exists( 'WPCleverWoosw' ) ){
   echo '<div class="thunk-wishlist"><span class="thunk-wishlist-inner">'.do_shortcode('[woosw id='.$pid.']').'</span></div>';
 }
}



function top_store_whishlist_url(){
$wishlist_page_id =  get_option( 'yith_wcwl_wishlist_page_id' );
$wishlist_permalink = get_the_permalink( $wishlist_page_id );
return $wishlist_permalink ;
}


// display admin name
function top_store_display_admin_name(){
$user=wp_get_current_user();
echo esc_html($user->display_name); 
}
/** My Account Menu **/
function top_store_account(){
 if ( is_user_logged_in() ){?>
<a class="account" href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));?>"><span class="account-text"><?php _e('Hello , ','top-store');?> <?php top_store_display_admin_name(); ?></span><span class="account-text"><?php _e('My account','top-store');?></span><i class="th-icon th-icon-user"></i></a>
<?php } else {?>
<span><a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') ));?>"><span class="account-text"><?php _e('Login / Signup','top-store');?></span><span class="account-text"><?php _e('My account','top-store');?></span><i class="th-icon th-icon-lock1"></i></a></span>
<?php }
 }

 // Plus Minus Quantity Buttons @ WooCommerce Single Product Page
add_action( 'woocommerce_before_add_to_cart_quantity', 'top_store_display_quantity_minus',10,2 );
function top_store_display_quantity_minus(){
    echo '<div class="top-store-quantity"><button type="button" class="minus" >-</button>';
}
add_action( 'woocommerce_after_add_to_cart_quantity', 'top_store_display_quantity_plus',10,2 );
function top_store_display_quantity_plus(){
    echo '<button type="button" class="plus" >+</button></div>';
}

//Woocommerce: How to remove page-title at the home/shop page archive & category pages
add_filter('woocommerce_show_page_title', '__return_null');

function top_store_not_a_shop_page() {
    return boolval(!is_shop());
}
//************************************************************************************************//
// *****************************HOME PAGE WOO FUNCTION****************************************//
//************************************************************************************************//
//***********************/
// product category list
//************************/
function top_store_product_list_categories( $args = '' ){
    $defaults = array(
        'child_of'            => 0,
        'current_category'    => 0,
        'depth'               => 5,
        'echo'                => 0,
        'exclude'             => '',
        'exclude_tree'        => '',
        'feed'                => '',
        'feed_image'          => '',
        'feed_type'           => '',
        'hide_empty'          => 1,
        'hide_title_if_empty' => false,
        'hierarchical'        => true,
        'order'               => 'ASC',
        'orderby'             => 'menu_order',
        'separator'           => '<br />',
        'show_count'          => 0,
        'show_option_all'     => '',
        'show_option_none'    => __( 'No categories','top-store' ),
        'style'               => 'list',
        'taxonomy'            => 'product_cat',
        'title_li'            => '',
        'use_desc_for_title'  => 0,
    );
 $html = wp_list_categories($defaults);
        echo '<ul class="product-cat-list thunk-product-cat-list" data-menu-style="vertical">'.$html.'</ul>';
  }