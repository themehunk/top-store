
<!--- tab first -->
<div class="theme_link">
    <h3><?php _e('1. Install Recommended Plugins','top-store'); ?></h3>
    <p><?php _e('We highly Recommend to install Hunk Companion plugin to get all customization options in Top Store theme. Also install recommended plugins available in recommended tab.','top-store'); ?></p>
</div>
<div class="theme_link">
    <h3><?php _e('2. Setup Home Page','top-store'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
        <p><?php _e('To set up the HomePage in Top Store theme, Just follow the below given Instructions.','top-store'); ?> </p>
<p><?php _e('Go to Wp Dashboard > Pages > Add New > Create a Page using “Home Page Template” available in Page attribute.','top-store'); ?> </p>
<p><?php _e('Now go to Settings > Reading > Your homepage displays > A static page (select below) and set that page as your homepage.','top-store'); ?> </p>
     <p>
        <?php
		if($this->_check_homepage_setup()){
            $class = "activated";
            $btn_text = __("Home Page Activated",'top-store');
            $Bstyle = "display:none;";
            $style = "display:inline-block;";
        }else{
            $class = "default-home";
             $btn_text = __("Set Home Page",'top-store');
             $Bstyle = "display:inline-block;";
            $style = "display:none;";


        }
        ?>
        <button style="<?php echo $Bstyle; ?>"; class="button activate-now <?PHP echo $class; ?>"><?php _e($btn_text,'top-store'); ?></button>
		
         </p>
		 	 
		 
    <p>
        <a target="_blank" href="https://themehunk.com/docs/top-store/#homepage-setting" class="button"><?php _e('Go to Doc','top-store'); ?></a>
    </p>
</div>

<!--- tab third -->





<!--- tab second -->
<div class="theme_link">
    <h3><?php _e('3. Customize Your Website','top-store'); ?><!-- <php echo $theme_config['plugin_title']; ?> --></h3>
    <p><?php _e('Top Store theme support live customizer for home page set up. Everything visible at home page can be changed through customize panel','top-store'); ?></p>
    <p>
    <a href="<?php echo admin_url('customize.php'); ?>" class="button button-primary"><?php _e("Start Customize","top-store"); ?></a>
    </p>
</div>
<!--- tab third -->

  <div class="theme_link">
    <h3><?php _e("4. Customizer Links","top-store"); ?></h3>
    <div class="card-content">
        <div class="columns">
                <div class="col">
                    <a href="<?php echo admin_url('customize.php?autofocus[control]=custom_logo'); ?>" class="components-button is-link"><?php _e("Upload Logo","top-store"); ?></a>
                    <hr><a href="<?php echo admin_url('customize.php?autofocus[section]=top-store-gloabal-color'); ?>" class="components-button is-link"><?php _e("Global Colors","top-store"); ?></a><hr>
                    <a href="<?php echo admin_url('customize.php?autofocus[panel]=woocommerce'); ?>" class="components-button is-link"><?php _e("Woocommerce","top-store"); ?></a><hr>

                </div>

               <div class="col">
                <a href="<?php echo admin_url('customize.php?autofocus[section]=top-store-section-header-group'); ?>" class="components-button is-link"><?php _e("Header Options","top-store"); ?></a>
                <hr>

                <a href="<?php echo admin_url('customize.php?autofocus[section]=top-store-woo-shop-page'); ?>" class="components-button is-link"><?php _e("Shop Page Options","top-store"); ?></a><hr>


                 <a href="<?php echo admin_url('customize.php?autofocus[section]=top-store-section-footer-group'); ?>" class="components-button is-link"><?php _e("Footer Section","top-store"); ?></a><hr>
            </div>

        </div>
    </div>

</div>
<!--- tab fourth -->