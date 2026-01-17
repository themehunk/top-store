<?php
// below code is to remove fatal error for redeclaraion of function in child theme
 

if (is_child_theme()) {
    $theme = wp_get_theme();
    $child_theme_version = $theme->get('Version');
    
    if (get_stylesheet() === 'top-x') {
        // For 'top-x' theme, check version and apply your condition
        if ($child_theme_version == '1.0.0' || $child_theme_version == '1.0.1' || $child_theme_version == '1.0.2' || $child_theme_version == '1.0.3') {
             return;
        }
    } elseif (get_stylesheet() === 'the-store') {
        // For 'the-store' theme, check version and apply your condition
        if ($child_theme_version == '1.0.0' || $child_theme_version == '1.0.1' || $child_theme_version == '1.0.2') {
            return;
        }
    } elseif (get_stylesheet() === 'th-top') {
        // For 'th-top' theme, check version and apply your condition
        if ($child_theme_version == '1.0.0' || $child_theme_version == '1.0.1' || $child_theme_version == '1.0.2' || $child_theme_version == '1.0.3' || $child_theme_version == '1.0.4' || $child_theme_version == '1.0.5' || $child_theme_version == '1.0.6' ) {
            return;
        }
    } elseif (get_stylesheet() === 'just-store') {
        // For 'th-top' theme, check version and apply your condition
        if ( $child_theme_version == '1.0.0') {
            return;
        }
    }
}


/**
* Header Function for Top Store theme.
*
* @package ThemeHunk
* @subpackage Top Store
* @since 1.0.0
*/
/**************************************/
//Top Header function
/**************************************/
  if ( ! function_exists( 'top_store_top_header_markup' ) ){
function top_store_top_header_markup(){
$top_store_above_header_layout     = get_theme_mod( 'top_store_above_header_layout','abv-none');
$top_store_above_header_col1_set   = get_theme_mod( 'top_store_above_header_col1_set','text');
$top_store_above_header_col2_set   = get_theme_mod( 'top_store_above_header_col2_set','text');
$top_store_above_header_col3_set   = get_theme_mod( 'top_store_above_header_col3_set','text');
$top_store_menu_open = get_theme_mod('top_store_mobile_menu_open','overcenter');
if($top_store_above_header_layout!=='abv-none'):?>
<div class="top-header">
  <div class="container">
    <?php if($top_store_above_header_layout=='abv-three'){?>
    <div class="top-header-bar thnk-col-3">
      <div class="top-header-col1">
        <?php top_store_top_header_conetnt_col1($top_store_above_header_col1_set,$top_store_menu_open); ?>
      </div>
      <div class="top-header-col2">
        <?php top_store_top_header_conetnt_col2($top_store_above_header_col2_set,$top_store_menu_open); ?>
      </div>
      <div class="top-header-col3">
        <?php top_store_top_header_conetnt_col3($top_store_above_header_col3_set,$top_store_menu_open); ?>
      </div>
    </div>
    <?php } ?>
    <?php if($top_store_above_header_layout=='abv-two'){?>
    <div class="top-header-bar thnk-col-2">
      <div class="top-header-col1">
        <?php top_store_top_header_conetnt_col1($top_store_above_header_col1_set,$top_store_menu_open); ?>
      </div>
      <div class="top-header-col2">
        <?php top_store_top_header_conetnt_col2($top_store_above_header_col2_set,$top_store_menu_open); ?>
      </div>
    </div>
    <?php } ?>
    <?php if($top_store_above_header_layout=='abv-one'){
    ?>
    <div class="top-header-bar thnk-col-1">
      <div class="top-header-col1">
        <?php top_store_top_header_conetnt_col1($top_store_above_header_col1_set,$top_store_menu_open); ?>
      </div>
    </div>
    <?php } ?>
    <!-- end top-header-bar -->
  </div>
</div>
<?php endif;
}
}
add_action( 'top_store_top_header', 'top_store_top_header_markup' );
//************************************/
// top header col1 function
//************************************/
if ( ! function_exists( 'top_store_top_header_conetnt_col1' ) ){
function top_store_top_header_conetnt_col1($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('top_store_col1_texthtml',  __( 'Add your content here', 'top-store' )));?>
</div>
<?php }elseif($content=='menu'){
if ( has_nav_menu('top-store-above-menu' ) ){?>
<!-- Menu Toggle btn-->
<nav>
  <div class="menu-toggle">
    <button type="button" class="menu-btn" id="menu-btn-abv">
    <div class="btn">
      <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-text-align-justify w-5 h-5 text-gray-500 group-hover:text-gray-700" aria-hidden="true"><path d="M3 5h18"></path><path d="M3 12h18"></path><path d="M3 19h18"></path></svg>
    </div>
    </button>
  </div>
  <div class="sider above top-store-menu-hide  <?php echo esc_attr($mobileopen);?>">
    <div class="sider-inner">
      <?php top_store_abv_nav_menu();?>
    </div>
  </div>
</nav>
<?php
}else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'top-store' );?></a>
<?php }
}elseif($content=='widget'){?>
<div class="content-widget">
  <?php if( is_active_sidebar('top-header-widget-col1' ) ){
  dynamic_sidebar('top-header-widget-col1' );
  }else{?>
  <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'top-store' );?></a>
  <?php }?>
</div>
<?php }elseif($content=='social'){?>
<div class="content-social">
  <?php echo top_store_social_links();?>
</div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
//************************************/
// top header col2 function
//************************************/
if ( ! function_exists( 'top_store_top_header_conetnt_col2' ) ){
function top_store_top_header_conetnt_col2($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('top_store_col2_texthtml',  __( 'Add your content here', 'top-store' )));?>
</div>
<?php }elseif($content=='menu'){
if ( has_nav_menu('top-store-above-menu' ) ){?>
<!-- Menu Toggle btn-->
<nav>
  <div class="menu-toggle">
    <button type="button" class="menu-btn" id="menu-btn-abv">
    <div class="btn">
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-text-align-justify w-5 h-5 text-gray-500 group-hover:text-gray-700" aria-hidden="true"><path d="M3 5h18"></path><path d="M3 12h18"></path><path d="M3 19h18"></path></svg>
    </div>
    </button>
  </div>
  <div class="sider above top-store-menu-hide <?php echo esc_attr($mobileopen);?>">
    <div class="sider-inner">
      <?php top_store_abv_nav_menu();?>
    </div>
  </div>
</nav>
<?php
}else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'top-store' );?></a>
<?php }
}
elseif($content=='widget'){?>
<div class="content-widget">
  <?php if( is_active_sidebar('top-header-widget-col2' ) ){
  dynamic_sidebar('top-header-widget-col2' );
  }else{?>
  <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'top-store' );?></a>
  <?php }?>
</div>
<?php }elseif($content=='social'){?>
<div class="content-social">
  <?php echo top_store_social_links();?>
</div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
//************************************/
// top header col3 function
//************************************/
if ( ! function_exists( 'top_store_top_header_conetnt_col3' ) ){
function top_store_top_header_conetnt_col3($content,$mobileopen){ ?>
<?php if($content=='text'){?>
<div class='content-html'>
  <?php echo esc_html(get_theme_mod('top_store_col3_texthtml',  __( 'Add your content here', 'top-store' )));?>
</div>
<?php }elseif($content=='menu'){
if ( has_nav_menu('top-store-above-menu' ) ){?>
<!-- Menu Toggle btn-->
<nav>
  <div class="menu-toggle">
    <button type="button" class="menu-btn" id="menu-btn-abv">
    <div class="btn">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-text-align-justify w-5 h-5 text-gray-500 group-hover:text-gray-700" aria-hidden="true"><path d="M3 5h18"></path><path d="M3 12h18"></path><path d="M3 19h18"></path></svg>
    </div>
    </button>
  </div>
  <div class="sider above top-store-menu-hide <?php echo esc_attr($mobileopen);?>">
    <div class="sider-inner">
      <?php top_store_abv_nav_menu();?>
    </div>
  </div>
</nav>
<?php
}else{?>
<a href="<?php echo esc_url( admin_url( 'nav-menus.php' ) ); ?>"><?php esc_html_e( 'Assign Above header menu', 'top-store' );?></a>
<?php }
}
elseif($content=='widget'){?>
<div class="content-widget">
  <?php if( is_active_sidebar('top-header-widget-col2' ) ){
  dynamic_sidebar('top-header-widget-col2' );
  }else{?>
  <a href="<?php echo esc_url( admin_url( 'widgets.php' ) ); ?>"><?php esc_html_e( 'Add Widget', 'top-store' );?></a>
  <?php }?>
</div>
<?php }elseif($content=='social'){?>
<div class="content-social">
  <?php echo top_store_social_links();?>
</div>
<?php }elseif($content=='none'){
return true;
}?>
<?php }
}
/**************************************/
//Below Header function
/**************************************/
  if ( ! function_exists( 'top_store_below_header_markup' ) ){
function top_store_below_header_markup(){
$main_header_layout = get_theme_mod('top_store_main_header_layout','mhdrfour');
$main_header_opt = get_theme_mod('top_store_main_header_option','callto');
$top_store_menu_alignment = get_theme_mod('top_store_menu_alignment','left');
$top_store_menu_open = get_theme_mod('top_store_mobile_menu_open','overcenter');
?>
<div class="below-header  <?php echo esc_attr($main_header_layout);?> <?php echo esc_attr($top_store_menu_alignment);?> <?php echo esc_attr($main_header_opt);?>">
  <div class="container">
    <div class="below-header-bar thnk-col-3">
      <?php if ($main_header_layout == 'mhdrfour') {?>
      <div class="below-header-col1">
        <?php if ( class_exists( 'WooCommerce' ) ){ ?>
        <div class="menu-category-list">
          <div class="toggle-cat-wrap">
            <p class="cat-toggle" tabindex="0">
              <span class="cat-icon">
        <svg width="1em" height="1em" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" xmlns="http://www.w3.org/2000/svg" style="display: inline-block; vertical-align: middle;">
  <path d="M5 7h14"></path>
  <path d="M5 12h9"></path>
  <path d="M5 17h11"></path>
</svg>
              </span>
              <span class="toggle-title"><?php _e('Category','top-store'); ?></span>
              <span class="toggle-icon"></span>
            </p>
          </div>
          <?php top_store_product_list_categories(); ?>
          </div><!-- menu-category-list -->
          <?php } ?>
          <nav>
            <!-- Menu Toggle btn-->
            <div class="menu-toggle">
              <button type="button" class="menu-btn" id="menu-btn">
              <div class="btn">
       <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-text-align-justify w-5 h-5 text-gray-500 group-hover:text-gray-700" aria-hidden="true"><path d="M3 5h18"></path><path d="M3 12h18"></path><path d="M3 19h18"></path></svg>
              </div>
              <span class="icon-text"><?php _e('Menu','top-store'); ?></span>
              </button>
            </div>
            <div class="sider main  top-store-menu-hide <?php echo esc_attr($top_store_menu_open);?>">
              <div class="sider-inner">
                <?php if(has_nav_menu('top-store-main-menu' )){
                if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false || wp_is_mobile()!== false){
                if(has_nav_menu('top-store-above-menu' )){
                top_store_abv_nav_menu();
                }
                }
                top_store_main_nav_menu();
                }else{
                wp_page_menu(array(
              'items_wrap'  => '<ul class="top-store-menu" data-menu-style="horizontal">%3$s</ul>',
              'link_before' => '<span>',
              'link_after'  => '</span>'));
              }?>
            </div>
          </div>
        </nav>
      </div>
      <?php if($main_header_opt!=='none'):?>
      <div class="below-header-col2">
        <?php
        top_store_main_header_optn();?>
      </div>
      <?php endif; }?>
    </div>
    </div> <!-- end below-header -->
    <?php }
    }
    add_action( 'top_store_below_header', 'top_store_below_header_markup' );
    /**************************************/
    //Main Header function
    /**************************************/
    if ( ! function_exists( 'top_store_main_header_markup' ) ){
    function top_store_main_header_markup(){
    $main_header_layout = get_theme_mod('top_store_main_header_layout','mhdrfour');
    $main_header_opt = get_theme_mod('top_store_main_header_option','callto');
    $top_store_menu_alignment = get_theme_mod('top_store_menu_alignment','left');
    $offcanvas = get_theme_mod('top_store_canvas_alignment','cnv-none');
    $top_store_menu_open = get_theme_mod('top_store_mobile_menu_open','overcenter');
    ?>
    <div class="main-header <?php echo esc_attr($main_header_layout);?> <?php echo esc_attr($main_header_opt);?> <?php echo esc_attr($top_store_menu_alignment);?>  <?php echo esc_attr($offcanvas);?>">
      <div class="container">
        <div class="main-header-bar parent-theme thnk-col-3">
          <?php if ($main_header_layout == 'mhdrfour') { ?>
          <div class="main-header-col1">
            <span class="logo-content">
              <?php top_store_logo();?>
            </span>
            
          </div>
          <div class="main-header-col2">
             <?php  
                top_store_th_advance_product_search();
               ?>
          </div>
          <div class="main-header-col3">
            <div class="thunk-icon-market">
              <?php if ( class_exists( 'WooCommerce' ) ){ top_store_header_icon();}?>
            </div>
          </div>
          <?php  } ?>
          </div> <!-- end main-header-bar -->
        </div>
      </div>
      <?php }
      }
      add_action( 'top_store_main_header', 'top_store_main_header_markup' );

      if ( ! function_exists( 'top_store_main_header_optn' ) ){
      function top_store_main_header_optn(){
      $top_store_main_header_option = get_theme_mod('top_store_main_header_option','callto');
      if($top_store_main_header_option =='button'){?>
      <a href="<?php echo esc_url(get_theme_mod('top_store_main_hdr_btn_lnk','#')); ?>" class="btn-main-header"><?php echo esc_html(get_theme_mod('top_store_main_hdr_btn_txt', __('Button Text','top-store'))); ?></a>
      <?php }
      elseif($top_store_main_header_option =='callto'){
      if(get_theme_mod('top_store_main_hdr_calto_nub','')!==''){?>
      <div class="header-support-wrap">
        <div class="header-support-icon">
          <a class="callto-icon" href="tel:<?php echo esc_html(get_theme_mod('top_store_main_hdr_calto_nub')); ?>">
            <svg width="0.833em" height="1em" viewBox="0 0 12.5 15" fill="currentColor" stroke="currentColor" stroke-width="0" xmlns="http://www.w3.org/2000/svg" style="display: inline-block; vertical-align: middle;">
  <path 
    d="M10.5 13.5c-0.8 0.8 -2.1 1.1 -3.2 0.7 -1.8 -0.7 -3.5 -1.8 -4.8 -3.1 -1.3 -1.3 -2.4 -3 -3.1 -4.8 -0.4 -1.1 -0.1 -2.4 0.7 -3.2L1.5 1.7c0.4 -0.4 1 -0.4 1.4 0L4.5 3.3c0.4 0.4 0.4 1 0 1.4L3.8 5.4c-0.2 0.2 -0.2 0.5 -0.1 0.7 0.5 1.1 1.2 2.1 2.1 3 0.9 0.9 1.9 1.6 3 2.1 0.2 0.1 0.5 0.1 0.7 -0.1l0.7 -0.7c0.4 -0.4 1 -0.4 1.4 0l1.6 1.6c0.4 0.4 0.4 1 0 1.4L10.5 13.5z" 
  />
</svg>
          </a>
        </div>
        <div class="header-support-content">
          <span class="sprt-tel"><span><?php echo esc_html(get_theme_mod('top_store_main_hdr_calto_txt','Call To')); ?></span> <a href="tel:<?php echo esc_html(get_theme_mod('top_store_main_hdr_calto_nub')); ?>"><?php echo esc_html(get_theme_mod('top_store_main_hdr_calto_nub')); ?></a></span>
        </div>
      </div>
      <?php }
      }elseif($top_store_main_header_option =='widget'){?>
      <div class="header-widget-wrap">
        <?php
        if ( is_active_sidebar('main-header-widget') ){
        dynamic_sidebar('main-header-widget');
        }
        ?>
      </div>
      <?php  }
      }
    }
      /**************************************/
      //logo & site title function
      /**************************************/
      if ( ! function_exists( 'top_store_logo' ) ){
      function top_store_logo(){
      $title_disable          = get_theme_mod( 'title_disable','enable');
      $tagline_disable        = get_theme_mod( 'tagline_disable','');
      $description            = get_bloginfo( 'description', 'display' );
      top_store_custom_logo();
      if($title_disable!='' || $tagline_disable!=''){
      if($title_disable!=''){
      ?>
      <div class="site-title"><span>
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
      </span>
    </div>
    <?php
    }
    if($tagline_disable!=''){
    if( $description || is_customize_preview() ):?>
    <div class="site-description">
      <p><?php echo esc_html($description); ?></p>
    </div>
    <?php endif;
    }
    }
    }
    }
    /**********************************/
    // header icon function (Header Layout 1)
    /**********************************/
   if (!function_exists('top_store_header_icon')) {
     
    function top_store_header_icon(){
    $whs_icon = get_theme_mod('top_store_whislist_mobile_disable',false);
    $acc_icon = get_theme_mod('top_store_account_mobile_disable',false);
    ?>
    <div class="header-icon">
      <?php
      //THWL_Wishlist Icon
      if( class_exists( 'THWL_Wishlist' ) || class_exists( 'YITH_WCWL' )){
      if($whs_icon == true){
      if (wp_is_mobile()!== true):
      ?>
      <a class="whishlist" href="<?php echo esc_url( top_store_whishlist_url() ); ?>" title="Show Wishlist">
         <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-6 h-6 stroke-[1.5px]" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg></a>
        
        <?php endif; }
        elseif($whs_icon == false){?>
        <a class="whishlist" href="<?php echo esc_url( top_store_whishlist_url() ); ?>" title="Show Wishlist">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-6 h-6 stroke-[1.5px]" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg></a>
          <?php  }
          } 
              if($acc_icon == true){
              if (wp_is_mobile()!== true):
              top_store_account();
              endif;
              }elseif($acc_icon == false){
              top_store_account();
              } ?>

             <?php if(class_exists( 'WooCommerce' )){
              if(get_theme_mod('top_store_cart_mobile_disable')==true){
              if (wp_is_mobile()!== true):
              
              ?>
              <div class="cart-icon" >

                  <?php top_store_th_cart(); ?> 

                
              </div>
              <?php  endif; }
              elseif(get_theme_mod('top_store_cart_mobile_disable')==false){?>
              <div class="cart-icon" >

                 <?php top_store_th_cart(); ?> 
                

              </div>
              <?php  } } ?>

            </div>
            <?php }
          }
            /**************************/
            //PRELOADER
            /**************************/
            if( ! function_exists( 'top_store_preloader' ) ){
            function top_store_preloader(){
            if (( isset( $_REQUEST['action'] ) && 'elementor' == $_REQUEST['action'] ) ||
            isset( $_REQUEST['elementor-preview'] )){
            return;
            }else{
            $top_store_preloader_enable = get_theme_mod('top_store_preloader_enable',false);
            $top_store_preloader_image_upload = get_theme_mod('top_store_preloader_image_upload',TOP_STORE_PRELOADER);
            if($top_store_preloader_enable==true){ ?>
            <div class="top_store_overlayloader">
              <div class="top-store-pre-loader"><img src="<?php echo esc_url($top_store_preloader_image_upload);?>"></div>
            </div>
            <?php }
            }
            }
            }
            add_action('top_store_site_preloader','top_store_preloader');
            /**********************/
            // Sticky Header
            /**********************/
            if( ! function_exists( 'top_store_sticky_header_markup' )){
            function top_store_sticky_header_markup(){
            $top_store_menu_open = get_theme_mod('top_store_mobile_menu_open','overcenter'); ?>
            <div class="sticky-header">
              <div class="container">
                <div class="sticky-header-bar thnk-col-3">
                  <div class="sticky-header-col1">
                    <span class="logo-content">
                      <?php top_store_logo();?>
                    </span>
                  </div>
                  <div class="sticky-header-col2">
                    <nav>
                      <!-- Menu Toggle btn-->
                      <div class="menu-toggle">
                        <button type="button" class="menu-btn" id="menu-btn-stk">
                        <div class="btn">
             <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-text-align-justify w-5 h-5 text-gray-500 group-hover:text-gray-700" aria-hidden="true"><path d="M3 5h18"></path><path d="M3 12h18"></path><path d="M3 19h18"></path></svg>
                        </div>
                        </button>
                      </div>
                      <div class="sider main  top-store-menu-hide  <?php echo esc_attr($top_store_menu_open); ?>">
                        <div class="sider-inner">
                          <?php if(has_nav_menu('top-store-sticky-menu' )){
                          if (strpos($_SERVER['HTTP_USER_AGENT'], 'iPad')!== false  || wp_is_mobile()!== false){
                          if(has_nav_menu('top-store-above-menu')){
                          top_store_abv_nav_menu();
                          }
                          }
                          top_store_stick_nav_menu();
                          }else{
                          wp_page_menu(array(
                        'items_wrap'  => '<ul class="top-store-menu" data-menu-style="horizontal">%3$s</ul>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>'));
                        }?>
                      </div>
                    </div>
                  </nav>
                </div>
                <div class="sticky-header-col3">
                  <div class="thunk-icon">
                    
                    <div class="header-icon">
                      <a class="prd-search-icon"><?php  if ( shortcode_exists('tapsp') ){

          echo do_shortcode('[tapsp layout="icon_style"]'); 

        }elseif( shortcode_exists('th-aps') ){

              echo do_shortcode('[th-aps layout="icon_style"]'); 
              
        }?></a>     
                      <?php

                      if( class_exists( 'THWL_Wishlist' ) || class_exists( 'YITH_WCWL' )){

                      ?>
                      <a class="whishlist" href="<?php echo esc_url( top_store_whishlist_url() ); ?>"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-heart w-6 h-6 stroke-[1.5px]" aria-hidden="true"><path d="M2 9.5a5.5 5.5 0 0 1 9.591-3.676.56.56 0 0 0 .818 0A5.49 5.49 0 0 1 22 9.5c0 2.29-1.5 4-3 5.5l-5.492 5.313a2 2 0 0 1-3 .019L5 15c-1.5-1.5-3-3.2-3-5.5"></path></svg></a>

                      <?php }

                      top_store_account();

                      ?>

                      <?php if(class_exists( 'WooCommerce' )){ ?>

                      <div class="cart-icon" >

                      <?php top_store_th_cart(); ?> 
                        
                      </div>

                      <?php  } ?>

                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="search-wrapper">
            <div class="container">
              <div class="search-close"><a class="search-close-btn"></a></div>
              <?php  top_store_th_advance_product_search(); ?>
            </div>
          </div>
          <?php }
          }
          if(get_theme_mod('top_store_sticky_header',false)==true):
          add_action('top_store_sticky_header','top_store_sticky_header_markup');
          endif;

//********************************//
//th advance product search 
//*******************************//
          if (!function_exists('top_store_th_advance_product_search')) {
      
function top_store_th_advance_product_search(){

              if ( shortcode_exists('th-aps') ){

                echo do_shortcode('[th-aps]');

              }elseif ( shortcode_exists('tapsp') ){

                echo do_shortcode('[tapsp]');

              }elseif ( !shortcode_exists('th-aps') && !shortcode_exists('tapsp') && is_user_logged_in()) {

                $url = admin_url('themes.php?page=thunk_started&th-tab=recommended-plugin');

                ?>

                <a target="_blank" class="plugin-active-msg" href="<?php echo esc_url($url);?>">

                  <?php _e('Please Install "th advance product search" Plugin','top-store');?>
                  
                </a>


                <?php      

            }
}
}

//********************************//
//th woo cart 
//*******************************//
if (!function_exists('top_store_th_cart')) {

  function top_store_th_cart(){

  if ( shortcode_exists('taiowc') ){

                echo do_shortcode('[taiowc]');

              }elseif ( shortcode_exists('taiowcp') ){

                echo do_shortcode('[taiowcp]');

              } elseif ( !shortcode_exists('taiowc') && !shortcode_exists('taiowcp') && is_user_logged_in()) {

                $url = admin_url('themes.php?page=thunk_started&th-tab=recommended-plugin');

                ?>

                <a target="_blank" class="cart-plugin-active-msg" href="<?php echo esc_url($url);?>">

                  <?php _e('Add Cart','top-store');?>
                  
                </a>


                <?php      

            }
}
}