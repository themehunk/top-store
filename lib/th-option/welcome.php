
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('Setup Home Page','top-store'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Click button to set theme default home page','top-store'); ?></p>
     <p>
        <?php
        if($this->_check_homepage_setup()){
            $class = "activated disabled";
            $btn_text = "Default Homepage Activated";
        }else{
            $class = "default-home";
             $btn_text = "Setup Default Homepage";
        }
        ?>
        <button class="button activate-now button-primary <?PHP echo $class; ?>"><?php _e('Set Home Page','top-store'); ?></button>
         </p>
    <p>
        <a target="_blank" href="https://www.youtube.com/watch?v=lyYYCNaTjrk"><?php _e('Manually Setup','top-store'); ?></a>
    </p>


</div> 

<!--- tab second -->
<div class="theme_link">


<h3><?php _e('Documentation','top-store'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Our WordPress Theme is well Documented, you can go with our Documentation and learn to customize Top Store.','top-store'); ?></p>
    <p><a target="_blank" href="https://themehunk.com/docs/top-store/"><?php _e(' Go to docs','top-store'); ?></a></p>

             
</div>
<!--- tab third -->



<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('Customize Your Website','top-store'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Top Store Lite theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','top-store'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e('Start Customize','top-store'); ?></a>
    </p>
</div>


<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e('Customizer Links','top-store'); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e('Upload Logo','top-store'); ?></a>
                    <hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[section]=site_color'); ?>" class="components-button is-link"><?php _e('Site Colors','top-store'); ?></a>
                    <hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[section]=global_set'); ?>" class="components-button is-link"><?php _e('Global Options','top-store'); ?></a>

                </div>


            <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=top-store-main-header'); ?>" class="components-button is-link"><?php _e('Header Options','top-store'); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[section]=top-store-woo-shop-page'); ?>" class="components-button is-link"><?php _e('Shop Page Options','top-store'); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[section]=top-store-section-blog-group'); ?>" class="components-button is-link"><?php _e('Blog Section','top-store'); ?></a><hr>
            </div>


        </div>
    </div>

</div>
<!--- tab fourth -->