<?php
/**
 * The WooCommerce template file
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#woocommerce
 * @package ThemeHunk
 * @package Top Store
 * @since 1.0.0
 */
if ( ! class_exists( 'WooCommerce' ) ){
    return;
}
get_header();
$shop_sidebar = get_theme_mod('top_store_shop_sidebr_disable',false);
if(is_shop() && $shop_sidebar==true){
$top_store_pages_sidebar = 'no-sidebar';
}else{
$top_store_pages_sidebar = top_store_pages_sidebar();     
}
?>
        <div id="content" class="page-content">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area  <?php echo esc_attr($top_store_pages_sidebar);?>">
                        <?php if($top_store_pages_sidebar !=='no-sidebar' && $top_store_pages_sidebar !=='disable-left-sidebar'){
                            get_sidebar('primary');
                        }?>
        				<div id="primary" class="primary-content-area">
        					<div class="primary-content-wrap">
                            <div class="page-head">
                            <?php top_store_get_page_title();?>
                            <?php top_store_breadcrumb_trail();?>
                            </div>
                            <?php woocommerce_content();?>	
                           </div> 
        				</div>
        				<?php if($top_store_pages_sidebar !=='no-sidebar' && $top_store_pages_sidebar !=='disable-right-sidebar'){
                            get_sidebar('secondary');
                        }?>
        			</div><!-- end main-area -->
        		</div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>