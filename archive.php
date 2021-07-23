<?php
/**
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 */
get_header();
$top_store_pages_sidebar = top_store_pages_sidebar(); ?>
<div id="content" class="page-content archive">
            <div class="content-wrap" >
                <div class="container">
                    <div class="main-area <?php echo esc_attr($top_store_pages_sidebar);?>">
                        <?php if($top_store_pages_sidebar !=='no-sidebar' && $top_store_pages_sidebar !=='disable-left-sidebar'){get_sidebar('primary');}?>
                        <div id="primary" class="primary-content-area">
                            <div class="page-head">
                   <?php top_store_get_page_title();?>
                   <?php top_store_breadcrumb_trail();?>
                    </div>
                            <div class="primary-content-wrap">
                                 <?php
            if( have_posts()):
                /* Start the Loop */
                while ( have_posts() ) : the_post();
                    /*
                     * Include the Post-Format-specific template for the content.
                     * If you want to override this in a child theme, then include a file
                     * called content-___.php (where ___ is the Post Format name) and that will be used instead.
                     */
                get_template_part( 'template-parts/content', get_post_format() );
                endwhile;
                
            else :
                get_template_part( 'template-parts/content', 'none' );
            endif;

           top_store_post_loader();
            ?>
                           </div> <!-- end primary-content-wrap-->
                        </div> <!-- end primary primary-content-area-->
                       <?php if($top_store_pages_sidebar !=='no-sidebar' && $top_store_pages_sidebar !=='disable-right-sidebar'){ get_sidebar('secondary');}?>
                    </div> <!-- end main-area -->
                </div>
            </div> <!-- end content-wrap -->
        </div> <!-- end content page-content -->
<?php get_footer();?>