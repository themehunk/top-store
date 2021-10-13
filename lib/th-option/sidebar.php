<div class="sidebar-section">
            <div class="section">
            <h3 class="hndle ui-sortable-handle">
                <span><?php _e('Top Store Pro WordPress Theme','open-shop'); ?> </span>
            </h3>
            <p>
            <b><?php _e('14+ pre-made templates','top-store'); ?> </b><br>
            <?php _e('You ll get more advanced features and functionalities with Top Store pro. Switch to pro version and enjoy creating online store.','top-store'); ?> </p>
                <center><a class="button button-primary" target="_blank" href="https://themehunk.com/product/top-store-pro/"><?php _e('Upgrade','top-store'); ?> </a></center>
            </div>

            <hr>

            <div class="section">

                <h3><?php echo esc_html__('Top Store Child Theme Download','top-store'); ?></h3>

                    <div class="childtheme-info">

                     <div class="childtheme-img">   
                    <?php 
                    echo'<img src="'.esc_url( TOP_STORE_THEME_URI. '/screenshot.png' ).'"  width="128" />'; ?>

                    </div>

                    <div class="childtheme-download-btn">
                        <?php 

                        $top_store_child_theme_download_link       = apply_filters( 'top_store_child_theme_download_link','https://themehunk.com/?smd_process_download=1&download_id=26235');
                        $top_store_support_link_text  = apply_filters( 'top_store_child_theme_download_link_text', __( 'Download Now', 'top-store' ));
                echo '<p class="action-btn">
                        <span>Version:'.esc_html('1.0.0').'</span></p>';
                echo'<a class="button button-primary"  href="'.esc_url($top_store_child_theme_download_link).'"  > '.esc_html($top_store_support_link_text) .'</a>'.'';

                            ?>

                            </div>
                        </div>


            </div>    


            <hr>
            <div class="section">
                <h3><?php _e('Leave us a review','top-store'); ?></h3>
                <p><?php _e('We would love to hear your feedback.','top-store'); ?> </p>
                 <a href="https://wordpress.org/support/theme/top-store/reviews/" target="_blank" class="sidebar-link"><?php _e('Submit review','top-store'); ?></a>

            </div>
            <hr>

            <div class="section">
                <h3><?php _e('Video Tutorials','top-store'); ?></h3>
                <p><?php _e('Want a guide? We have video tutorials to walk you through getting started.','top-store'); ?> </p>
                <a href="https://www.youtube.com/watch?v=hZqdlkyDepE" target="_blank" class="sidebar-link"><?php _e('Watch Videos','top-store'); ?></a>
            </div>
            <hr>

            <div class="section">
                <h3><?php _e('Support','top-store'); ?> </h3>
                <p><?php _e('Our Products are completely User-Friendly but Still you feel any Difficulty while Using it. Feel Free to Contact us on our Support Forum. Our Excellent Team will be happy to assist you with any theme related questions.','top-store'); ?></p>
                <a href="https://themehunk.com/contact-us/" target="_blank" class="sidebar-link"><?php _e('Submit a Ticket','top-store'); ?></a>
            </div>
        </div>