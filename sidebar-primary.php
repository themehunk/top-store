<?php
/**
 * Primary sidebar
 *
 * @package ThemeHunk
 * @package  Top Store
 * @since 1.0.0
 */
?>
<div id="sidebar-primary" class="sidebar-content-area sidebar-1 <?php echo esc_attr(apply_filters( 'top_store_stick_sidebar_class',''));?>">
  <div class="sidebar-main">
    <?php 
    if ( class_exists( 'WooCommerce' ) ){ ?>
            <div class="menu-category-list">
              <div class="toggle-cat-wrap">
                  <p class="cat-toggle">
                    <span class="cat-icon"> 
                   <svg width="1.44em" height="1em" viewBox="0 0 26 18" fill="none" xmlns="http://www.w3.org/2000/svg" style="display: inline-block; vertical-align: middle;">
  <path d="M4 4.5H22" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M4 9H22" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
  <path d="M4 13.5H22" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
                     </span>
                    <span class="toggle-title"><?php _e('Category','top-store');?></span>
                    <span class="toggle-icon"></span>
                  </p>
               </div>
              <?php top_store_product_list_categories(); ?>
             </div><!-- menu-category-list -->
           <?php }
            if(class_exists( 'WooCommerce' ) && is_shop()){
                  if ( is_active_sidebar('top-store-woo-shop-sidebar') ){
                           dynamic_sidebar('top-store-woo-shop-sidebar');
                    }
                  }
                  else{
                  if ( is_active_sidebar('sidebar-1') ){
                           dynamic_sidebar('sidebar-1');
                    }
                }
			    
           ?>
  </div> <!-- sidebar-main End -->
</div> <!-- sidebar-primary End -->                 