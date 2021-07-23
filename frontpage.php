<?php 
/**
 * Template Name: Homepage Template
 *
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 */
get_header();
$top_store_sidebar_front_option = get_theme_mod('top_store_sidebar_front_option','active-sidebar');
?>
   <div id="content" class="front">
        	<div class="content-wrap" >
        		<div class="container">
        			<div class="main-area <?php echo esc_attr($top_store_sidebar_front_option);?>">
                <?php if($top_store_sidebar_front_option!=='disable-left-sidebar'){
                  get_sidebar('primary');
                }?>
        				<div id="primary" class="primary-content-area">
        					<div class="primary-content-wrap">
                        <?php
                          if( shortcode_exists( 'top-store' ) ){
                             do_shortcode("[top-store section='top_store_show_frontpage']");
                          }
                        ?>
        					</div> <!-- end primary-content-wrap-->
        				</div> <!-- end primary primary-content-area-->
        				<?php if($top_store_sidebar_front_option!=='disable-right-sidebar'){get_sidebar('secondary');};?>
        			</div> <!-- end main-area -->     
        		</div>
        	</div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();