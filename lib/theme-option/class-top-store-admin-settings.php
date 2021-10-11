<?php
if ( ! class_exists( 'Top_Store_Admin_Settings' ) ){
    /**
	 * Top Store Admin Settings
	 */
	class Top_Store_Admin_Settings{
    /**
		 * View all actions
		 *
		 * @since 1.0
		 * @var array $view_actions
		 */
		static public $view_actions = array();

		/**
		 * Menu page title
		 *
		 * @since 1.0
		 * @var array $menu_page_title
		 */
		static public $menu_page_title = 'Top Store Theme';

		/**
		 * Page title
		 *
		 * @since 1.0
		 * @var array $page_title
		 */
		static public $page_title = 'Top Store';

		/**
		 * Plugin slug
		 *
		 * @since 1.0
		 * @var array $plugin_slug
		 */
		static public $plugin_slug = 'top-store';

		/**
		 * Default Menu position
		 *
		 * @since 1.0
		 * @var array $default_menu_position
		 */
		static public $default_menu_position = 'themes.php';

		/**
		 * Parent Page Slug
		 *
		 * @var array $parent_page_slug
		 */
		static public $parent_page_slug = 'general';

		/**
		 * Current Slug
		 *
		 * @var array $current_slug
		 */
		static public $current_slug = 'general';

		/**
		 * Constructor
		 */
		function __construct() {

			if ( ! is_admin() ) {
				return;
			}
			add_action( 'after_setup_theme', __CLASS__ . '::init_admin_settings', 99 );
		}
        /**
		 * Admin settings init
		 */
		static public function init_admin_settings(){
			self::$menu_page_title = apply_filters( 'top_store_menu_page_title', __( 'Top Store Options', 'top-store' ) );
			self::$page_title      = apply_filters( 'top_store_page_title', __( 'Top Store', 'top-store' ) );

			if ( isset( $_REQUEST['page'] ) && strpos( $_REQUEST['page'], self::$plugin_slug ) !== false ) {
				add_action( 'admin_enqueue_scripts', __CLASS__ . '::styles_scripts' );
            		
			}
			// Let extensions hook into saving.
		    do_action( 'top_store_admin_settings_scripts' );
			self::save_settings();
            add_action( 'admin_enqueue_scripts', __CLASS__ . '::top_store_admin_style' );
			add_action( 'admin_menu', __CLASS__ . '::add_admin_menu', 99 );

			add_action( 'top_store_menu_general_action', __CLASS__ . '::general_page',99 );
			add_action( 'top_store_header_right_section', __CLASS__ . '::top_header_right_section' );
			add_filter( 'admin_title', __CLASS__ . '::top_store_admin_title', 10, 2 );
			
			add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_welcome_page_knowledge_base_scetion', 11 );
            add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_welcome_page_community_scetion', 12 );
            add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_welcome_page_five_star_scetion', 13 );
            add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_recommend_plugins',10 );

             add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_useful_plugins',10 );

             add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_child_theme_download',10 );
           
			add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_welcome_page_pro_content',15 );
			add_action( 'top_store_recommend_plugins_setup', __CLASS__ . '::top_store_plugin_setup_api',17);
			add_action( 'top_store_useful_plugins_setup', __CLASS__ . '::top_store_useful_plugin_setup_api',17);

			add_action( 'top_store_child_theme_download_setup', __CLASS__ . '::top_store_child_theme_download_setup_api',17);

			add_action( 'top_store_welcome_page_main_content', __CLASS__ . '::top_store_welcome_page_starter_sites_section',10 );
			// AJAX.
			add_action( 'wp_ajax_top_store_activeplugin', __CLASS__ . '::top_store_activeplugin' );
			add_action( 'wp_ajax_top_store_sites_plugin_activate', __CLASS__ . '::required_plugin_activate' );
		}
		 /**
		 * View actions
		 */
		static public function get_view_actions() {

			if ( empty( self::$view_actions ) ) {

				$actions            = array(
					'general' => array(
						'label' => __( 'Welcome', 'top-store' ),
						'show'  => ! is_network_admin(),
					),
				);
				self::$view_actions = apply_filters( 'top_store_menu_options', $actions );
			}

			return self::$view_actions;
		}
        /**
		 * Save All admin settings here
		 */
		static public function save_settings() {

			// Only admins can save settings.
			if ( ! current_user_can( 'manage_options' ) ){
				return;
			}

			// Let extensions hook into saving.
			do_action( 'top_store_admin_settings_save' );
		}

        /**
		 * Enqueues the needed CSS/JS for the builder's admin settings page.
		 *
		 */
		static public function styles_scripts(){
			// Styles.
			wp_enqueue_style( 'top-store-admin-settings', TOP_STORE_THEME_URI . 'lib/theme-option/assets/css/top-store-admin-menu-settings.css', array(), TOP_STORE_THEME_VERSION );
			// Script.
			wp_enqueue_script( 'top-store-admin-settings', TOP_STORE_THEME_URI . 'lib/theme-option/assets/js/top-store-admin-menu-settings.js', array( 'jquery', 'wp-util', 'updates' ), TOP_STORE_THEME_VERSION );
			
			$localize = array(
				'ajaxUrl'  => esc_url(admin_url( 'admin-ajax.php' )),
				'btnActivating'       => __( 'Activating Importer Plugin ', 'top-store' ) . '&hellip;',
				'topstoreSitesLink'      => esc_url(admin_url( 'themes.php?page=pt-one-click-demo-import' )),
				'topstoreSitesLinkTitle' => __( 'See Library', 'top-store' ),
			);
			wp_localize_script( 'top-store-admin-settings', 'topstore', apply_filters( 'top_store_theme_js_localize', $localize ) );
		}

		/**
		 * Enqueues the needed CSS/JS for Backend.
		 *
		 */
		static public function top_store_admin_style(){
			// Styles.
			wp_register_style( 'top-store-admin-css', TOP_STORE_THEME_URI . 'lib/theme-option/assets/css/top-store-admin.css', false, TOP_STORE_THEME_VERSION );
			wp_enqueue_style( 'top-store-admin-css' );
			
		}
        /**
		 * Add main menu
		 *
		 */
		static public function add_admin_menu(){

			$parent_page    = self::$default_menu_position;
			$page_title     = self::$menu_page_title;
			$capability     = 'manage_options';
			$page_menu_slug = self::$plugin_slug;
			$page_menu_func = __CLASS__ . '::menu_callback';

			if ( apply_filters( 'top_store_dashboard_admin_menu', true ) ) {
				add_theme_page( $page_title, $page_title, $capability, $page_menu_slug, $page_menu_func );
			} else {
				do_action( 'top_store_register_admin_menu', $parent_page, $page_title, $capability, $page_menu_slug, $page_menu_func );
			}
		}

        /**
		 * Menu callback
		 *
		 */
		static public function menu_callback() {

			$current_slug = isset( $_GET['action'] ) ? esc_attr( $_GET['action'] ) : self::$current_slug;

			$active_tab   = str_replace( '_', '-', $current_slug );
			$current_slug = str_replace( '-', '_', $current_slug );

			$top_store_icon           = apply_filters( 'top_store_page_top_icon', true );
			
			$almshp_wrapper_class  = apply_filters( 'top_store_welcome_wrapper_class', array( $current_slug ) );
			$my_theme = wp_get_theme();
			$top_store_theme_version = $my_theme->get( 'Version' );
            
			?>
			<div class="top-store-menu-page-wrapper wrap top-store-clear <?php echo esc_attr( implode( ' ', $almshp_wrapper_class ) ); ?>">
					
				<?php do_action( 'top_store_menu_' . esc_attr( $current_slug ) . '_action' ); ?>
			</div>
			<?php
		}
        /**
		 * Include general page
		 *
		 * @since 1.0
		 */
		static public function general_page(){
			get_template_part( 'lib/theme-option/view-general');
		}
         /**
		 * Include Recommend Plugin
		 *
		 */
		static public function top_store_recommend_plugins(){	
			?>
			<div id="top-store-recommend-plugins" class="postbox top-store-recommend-plugins panel">
				<div class="inside">
					<?php do_action( 'top_store_recommend_plugins_setup' ); ?>
			    </div>
			</div>
			<?php } 

			/**
		 * Include Useful Plugins
		 *
		 */
		static public function top_store_useful_plugins(){	
			?>
			<div id="top-store-useful-plugins" class="postbox top-store-useful-plugins panel">
				<div class="inside">
					<?php do_action( 'top_store_useful_plugins_setup' ); ?>
			    </div>
			</div>
			<?php } 


			/**
		 * Child Theme Download
		 *
		 */
		static public function top_store_child_theme_download(){	
			?>
			<div id="top-store-child-theme-download" class="postbox top-store-child-theme-download panel">
				<div class="inside">

					<div class="rcp">
					<div class="rcp-name"><h4><?php echo esc_html__('Top Store Child Theme Download','top-store'); ?></h4> </div>
					<?php 
					echo'<img src="'.esc_url( TOP_STORE_THEME_URI. '/screenshot.png' ).'"  width="75" />';

						$top_store_child_theme_download_link       = apply_filters( 'top_store_child_theme_download_link','https://themehunk.com/?smd_process_download=1&download_id=26235');
						$top_store_support_link_text  = apply_filters( 'top_store_child_theme_download_link_text', __( 'Child Theme Download', 'top-store' ));
                echo '<p class="action-btn">
                        <span>Version:'.esc_html('1.0.0').'</span></p>';
                echo'<button> <a class="download-btn"  href="'.esc_url($top_store_child_theme_download_link).'"  > '.esc_html($top_store_support_link_text) .'</a>'.'</button>';

							?>

							</div>

			    </div>
			</div>
			<?php } 




        /**
		 * Include Welcome page right demo import
		 *
		 * @since 1.2.4
		 */
		static public function top_store_welcome_page_starter_sites_section(){
			?>
			<div class="postbox">
				<h2 class="hndle alm-normal-cusror">
					<span class="dashicons dashicons-admin-customizer"></span>
					<span><?php echo esc_html__('Import Demo Site', 'top-store'); ?></span>
				</h2>
				
				<div class="inside">
					<div class="rcp">
					
					<p>
					<?php	
						printf(
							esc_html__('Install and Activate recommended plugins given above and Import the whole demo data of %1$s in just one click. You can further customize the whole site.', 'top-store' ),
							self::$page_title
						);
						?>
					</p>
					</div>
						<?php
						// Sita Sites - Installed but Inactive.
						// Sita Premium Sites - Inactive.
						if ( (file_exists( WP_PLUGIN_DIR . '/one-click-demo-import/one-click-demo-import.php' ) && is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' )) && (file_exists( WP_PLUGIN_DIR . '/hunk-companion/hunk-companion.php' ) && is_plugin_active( 'hunk-companion/hunk-companion.php' )) && (file_exists( WP_PLUGIN_DIR . '/woocommerce/woocommerce.php' ) && is_plugin_active( 'woocommerce/woocommerce.php' ))){
							
							$button_text = __( 'See Library', 'top-store' );
							$link        = admin_url( 'themes.php?page=pt-one-click-demo-import' );
							printf('<a class="demo-active"  href="'.esc_url($link).'"  > '.esc_html($button_text) .'</a>');
						}
						?>
						<div class="demo-active"></div>
					<div>
					</div>
				</div>
			</div>

			<?php
		}
        /**
		 * Include Welcome page right side knowledge base content
		 */
		static public function top_store_welcome_page_knowledge_base_scetion(){
			?>

			<div class="postbox">
				<h2 class="hndle top-store-normal-cusror">
					<span class="dashicons dashicons-book"></span>
					<span><?php esc_html_e( 'Learn More', 'top-store' ); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php
						printf(
							esc_html__( 'Our WordPress Theme is well Documented, you can go with our Documentation and learn to customize %1$s.', 'top-store' ),
							self::$page_title
						);
						?>
					</p>
					<?php
					$top_store_knowledge_base_doc_link      = 'https://themehunk.com/docs/top-store/';
					$top_store_knowledge_base_doc_link_text = apply_filters( 'top_store_knowledge_base_documentation_link_text', __( 'Visit Us', 'top-store' ) );
					printf(
						'%1$s',
						! empty( $top_store_knowledge_base_doc_link ) ? '<a href=' . esc_url( $top_store_knowledge_base_doc_link ) . ' target="_blank" rel="noopener">' . esc_html( $top_store_knowledge_base_doc_link_text ) . '</a>' :
						esc_html( $top_store_knowledge_base_doc_link_text )
					);
					?>
				</div>
			</div>
			<?php
		}

		/**
		 * Include Welcome page right side top store community content
		 */
		static public function top_store_welcome_page_community_scetion(){
			?>
			<div class="postbox">
				<h2 class="hndle top-store-normal-cusror">
					<span class="dashicons dashicons-groups"></span>
					<span>
						<?php
						printf(
							/* translators: %1$s: top store Theme name. */
							esc_html__( 'Join Community', 'top-store' ),
							self::$page_title
						);
						?>
				</h2>
				<div class="inside">
					<p>
						<?php
						printf(
							
							esc_html__( 'Join the community of friendly ThemeHunk users. Get connected, share opinion, ask questions and help each other !', 'top-store' ), self::$page_title
						);
						?>
					</p>
					<?php
					$top_store_community_group_link      = apply_filters( 'top_store_community_group_link', 'https://www.facebook.com/groups/2105964519696964/?source_id=1561680410762717' );
					$top_store_community_group_link_text = apply_filters( 'top_store_community_group_link_text', __('Join us on Facebook', 'top-store' ) );

					printf(
						
						'%1$s',
						! empty( $top_store_community_group_link ) ? '<a href=' . esc_url( $top_store_community_group_link ) . ' target="_blank" rel="noopener">' . esc_html( $top_store_community_group_link_text ) . '</a>' :
						esc_html( $top_store_community_group_link_text )
					);
					?>
				</div>
			</div>
			<?php
		}
        /**
		 * Include Welcome page right side Five Star Support
		 *
		 */
		static public function top_store_welcome_page_five_star_scetion(){
			?>
			<div class="postbox">
				<h2 class="hndle top-store-normal-cusror">
					<span class="dashicons dashicons-sos"></span>
					<span><?php esc_html_e( 'Customer Support', 'top-store' ); ?></span>
				</h2>
				<div class="inside">
					<p>
						<?php
						printf(
							esc_html__( 'Our Products are completely User-Friendly but Still you feel any Difficulty while Using it. Feel Free to Contact us on our Support Forum. Our Excellent Team will be happy to assist you with any theme related questions.', 'top-store' ),

							self::$page_title
						);
						?>
					</p>
					<?php
						$top_store_support_link       = apply_filters( 'top_store_support_link','https://www.support.themehunk.com/');
						$top_store_support_link_text  = apply_filters( 'top_store_support_link_text', __( 'Submit a Ticket', 'top-store' ) );

						printf(
							/* translators: %1$s: top_store Knowledge doc link. */
							'%1$s',
							! empty( $top_store_support_link ) ? '<a href=' . esc_url( $top_store_support_link ) . ' target="_blank" rel="noopener">' . esc_html( $top_store_support_link_text ) . '</a>' :
							esc_html( $top_store_support_link_text )
						);
					?>
				</div>
			</div>
			<?php
		}
		/**
		 * Include Welcome page content
		 *
		 * @since 1.2.4
		 */
		static public function top_store_welcome_page_pro_content(){

 

			$top_store_addon_tagline = apply_filters( 'top_store_addon_list_tagline', __( 'Get More Options with Top Store Pro!', 'top-store' ) );
			
			
			?>
			<div class="postbox">
			
				<h2 class="hndle top-store-normal-cusror">
					<span class="dashicons dashicons-admin-network"></span>
					<span><?php echo esc_html( $top_store_addon_tagline ); ?></span>
				
					<?php do_action( 'top_store_addon_bulk_action' ); ?>
				</h2>
				<div class="inside">
					<p>
                      <?php
						printf(
							esc_html__( 'You\'ll get more advanced features and functionalities with Top Store pro. Switch to pro version and enjoy creating online store.', 'top-store' ),
							self::$page_title
						);
						?>
                  </p>
                      <?php
						$top_store_pro_link       = apply_filters( 'top_store_pro_link', 'https://themehunk.com/product/top-store-pro/' );
						$top_store_pro_link_text  = apply_filters( 'top_store_pro_link_text', __( 'Go with Top Store Pro', 'top-store' ) );

						printf(
							/* translators: %1$s: top_store Knowledge doc link. */
							'%1$s',
							! empty( $top_store_pro_link ) ? '<a href=' . esc_url( $top_store_pro_link ) . ' target="_blank" rel="noopener">' . esc_html( $top_store_pro_link_text ) . '</a>' :
							esc_html( $top_store_pro_link_text )
						);
					?>
			    </div>
			</div>

			<?php

	}
		/**
		 * Include Welcome page content
		 */
       static public  function top_store_plugin_setup_api(){
       include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
       network_admin_url( 'plugin-install.php' );
       $recommend_plugins = get_theme_support( 'recommend-plugins' );


       if ( is_array( $recommend_plugins ) && isset( $recommend_plugins[0] ) ){
        foreach($recommend_plugins[0] as $slug=>$plugin){
            $plugin_info = plugins_api( 'plugin_information', array(
                       'slug' => $slug,
                    	'fields' => array(
                        'downloaded'        => false,
                        'sections'          => true,
                        'homepage'          => true,
                        'added'             => false,
                        'compatibility'     => false,
                        'requires'          => false,
                        'downloadlink'      => false,
                        'icons'             => false,
                    )
                ) );
                    $plugin_name = $plugin_info->name;
                    $plugin_slug = $plugin_info->slug;
                    $version = $plugin_info->version;
                    $author = $plugin_info->author;
                    $download_link = $plugin_info->download_link;
                   
            

            $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_slug );
            if($plugin_slug=='yith-woocommerce-wishlist' || $plugin_slug=='yith-woocommerce-compare'){
                $active_file_name = $plugin_slug . '/init.php';
                }
            elseif($plugin_slug=='woo-smart-wishlist'){
                $active_file_name = $plugin_slug . '/wpc-smart-wishlist.php';
                }
            elseif($plugin_slug=='woo-smart-compare'){
                $active_file_name = $plugin_slug . '/wpc-smart-compare.php';
                }
            else{
                	$active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
                }
            
            $button_class = 'install-now button '.$plugin_slug;

             if ( is_plugin_active( $active_file_name ) ) {
                   $button_class = 'button disabled '.$plugin_slug;
                   $button_txt = esc_html__( 'Plugin Activated', 'top-store' );
                   $detail_link = $install_url = '';

        }

            if ( ! is_plugin_active( $active_file_name ) ){
		            $button_txt = esc_html__( 'Install Now', 'top-store' );
		            if ( ! $status ) {
		                $install_url = wp_nonce_url(
		                    add_query_arg(
		                        array(
		                            'action' => 'install-plugin',
		                            'plugin' => $plugin_slug
		                        ),
		                        network_admin_url( 'update.php' )
		                    ),
		                    'install-plugin_'.$plugin_slug
		                );

		            } else {
		                $install_url = add_query_arg(array(
		                    'action' => 'activate',
		                    'plugin' => rawurlencode( $active_file_name ),
		                    'plugin_status' => 'all',
		                    'paged' => '1',
		                    '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
		                ), network_admin_url('plugins.php'));
		                $button_class = 'activate-now button-primary '.$plugin_slug;
		                $button_txt = esc_html__( 'Activate Now', 'top-store' );
		            }
		                

                }

				$detail = '';
				$detail_link = add_query_arg(
		                array(
		                    'tab' => 'plugin-information',
		                    'plugin' => $plugin_slug,
		                    'TB_iframe' => 'true',
		                    'width' => '772',
		                    'height' => '349',

		                ),
		                network_admin_url( 'plugin-install.php' )
		            );
                echo '<div class="rcp">';
                echo '<h4 class="rcp-name">';
                echo esc_html( $plugin_name );
                echo '</h4>';
				if($plugin_slug=='lead-form-builder'){
				echo'<img src="'.esc_url( TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/lead-form-builder.png' ).'" />'; 
		        $detail='';
                }elseif($plugin_slug=='wp-popup-builder'){
				echo'<img src="'.esc_url( TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/wp-popup-builder.png' ).'" />'; 
		        $detail='';
                }elseif($plugin_slug=='hunk-companion'){
                	echo'<img src="'.esc_url(TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/hunk-companion.png' ).'" />'; 
		        $detail= '';
                }elseif($plugin_slug=='woocommerce'){
                	echo'<img src="'.esc_url(TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/woocommerce.png' ).'" />'; 
                $detail='';
                }elseif($plugin_slug=='th-advance-product-search'){
     				echo'<img src="'.esc_url(TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/th-advance-product-search.png' ).'" />'; 
     			$detail='';	
                }elseif($plugin_slug=='th-variation-swatches'){
     				echo'<img src="'.esc_url(TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/th-variation-swatches.png' ).'" />'; 
                $detail='';
                }elseif($plugin_slug=='yith-woocommerce-wishlist'){
                	echo'<img src="'.esc_url(TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/yith-woocommerce-wishlist.png' ).'" />'; 
                $detail='';
                }elseif($plugin_slug=='yith-woocommerce-compare'){
                	echo'<img src="'.esc_url(TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/yith-woocommerce-compare.png' ).'" />'; 
                $detail='';
                }elseif($plugin_slug=='one-click-demo-import'){
                	echo'<img src="'.esc_url(  TOP_STORE_THEME_URI . 'lib/theme-option/assets/images/one-click-demo-import.png' ).'" />'; 
		        $detail= '';
                }
			    echo '<p class="rcp-detail">'.esc_html($detail).' </p>';
                echo '<p class="action-btn plugin-card-'.esc_attr( $plugin_slug ).'">
                        <span>Version:'.esc_html($version).'</span>
                        '.$author.'
                        | <a class="plugin-detail thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'Details', 'top-store' ).'</a>
                </p>';
                echo'<button data-activated="Plugin Activated" data-msg="Activating Plugin" data-init="'.esc_attr($active_file_name).'" data-slug="'.esc_attr( $plugin_slug ).'" class="button '.esc_attr( $button_class ).'">'.esc_html($button_txt).'</button>';
                echo '</div>';
        }
    }
}

/**
		 * Include Welcome page content
		 */
       static public  function top_store_useful_plugin_setup_api(){
       include_once( ABSPATH . 'wp-admin/includes/plugin-install.php' );
       network_admin_url( 'plugin-install.php' );
       $useful_plugins = get_theme_support( 'useful-plugins' );


       if ( is_array( $useful_plugins ) && isset( $useful_plugins[0] ) ){
        foreach($useful_plugins[0] as $slug=>$plugin){
            $plugin_info = plugins_api( 'plugin_information', array(
                       'slug' => $slug,
                    	'fields' => array(
                        'downloaded'        => false,
                        'sections'          => true,
                        'homepage'          => true,
                        'added'             => false,
                        'compatibility'     => false,
                        'requires'          => false,
                        'downloadlink'      => false,
                        'icons'             => false,
                    )
                ) );
                    $plugin_name = $plugin_info->name;
                    $plugin_slug = $plugin_info->slug;
                    $version = $plugin_info->version;
                    $author = $plugin_info->author;
                    $download_link = $plugin_info->download_link;
                   
            

            $status = is_dir( WP_PLUGIN_DIR . '/' . $plugin_slug );
        	if($plugin_slug=='themehunk-megamenu-plus'){
                $active_file_name = $plugin_slug . '/themehunk-megamenu.php';
                }
            
            else{
                	$active_file_name = $plugin_slug . '/' . $plugin_slug . '.php';
                }
            
            $button_class = 'install-now button '.$plugin_slug;

             if ( is_plugin_active( $active_file_name ) ) {
                   $button_class = 'button disabled '.$plugin_slug;
                   $button_txt = esc_html__( 'Plugin Activated', 'top-store' );
                   $detail_link = $install_url = '';

        }

            if ( ! is_plugin_active( $active_file_name ) ){
		            $button_txt = esc_html__( 'Install Now', 'top-store' );
		            if ( ! $status ) {
		                $install_url = wp_nonce_url(
		                    add_query_arg(
		                        array(
		                            'action' => 'install-plugin',
		                            'plugin' => $plugin_slug
		                        ),
		                        network_admin_url( 'update.php' )
		                    ),
		                    'install-plugin_'.$plugin_slug
		                );

		            } else {
		                $install_url = add_query_arg(array(
		                    'action' => 'activate',
		                    'plugin' => rawurlencode( $active_file_name ),
		                    'plugin_status' => 'all',
		                    'paged' => '1',
		                    '_wpnonce' => wp_create_nonce('activate-plugin_' . $active_file_name ),
		                ), network_admin_url('plugins.php'));
		                $button_class = 'activate-now button-primary '.$plugin_slug;
		                $button_txt = esc_html__( 'Activate Now', 'top-store' );
		            }
		                

                }

				$detail = '';
				$detail_link = add_query_arg(
		                array(
		                    'tab' => 'plugin-information',
		                    'plugin' => $plugin_slug,
		                    'TB_iframe' => 'true',
		                    'width' => '772',
		                    'height' => '349',

		                ),
		                network_admin_url( 'plugin-install.php' )
		            );
                echo '<div class="rcp">';
                echo '<h4 class="rcp-name">';
                echo esc_html( $plugin_name );
                echo '</h4>';
				if($plugin_slug=='themehunk-megamenu-plus'){
                	echo'<img src="'.esc_url(TOP_STORE_THEME_URI. 'lib/theme-option/assets/images/themehunk-megamenu.png' ).'" />'; 
		        $detail= '';
                }
			    echo '<p class="rcp-detail">'.esc_html($detail).' </p>';
                echo '<p class="action-btn plugin-card-'.esc_attr( $plugin_slug ).'">
                        <span>Version:'.esc_html($version).'</span>
                        '.$author.'
                        | <a class="plugin-detail thickbox open-plugin-details-modal" href="'.esc_url( $detail_link ).'">'.esc_html__( 'Details', 'top-store' ).'</a>
                </p>';
                echo'<button data-activated="Plugin Activated" data-msg="Activating Plugin" data-init="'.esc_attr($active_file_name).'" data-slug="'.esc_attr( $plugin_slug ).'" class="button '.esc_attr( $button_class ).'">'.esc_html($button_txt).'</button>';
                echo '</div>';
        }
    }
}

		


		/**
		 * Update Admin Title.
		 *
		 * @since 1.0.19
		 *
		 * @param string $admin_title Admin Title.
		 * @param string $title Title.
		 * @return string
		 */
		static public function top_store_admin_title( $admin_title, $title ){

			$screen = get_current_screen();
			if ( 'appearance_page_top_store' == $screen->id ) {

				$view_actions = self::get_view_actions();

				$current_slug = isset( $_GET['action'] ) ? esc_attr( $_GET['action'] ) : self::$current_slug;
				$active_tab   = str_replace( '_', '-', $current_slug );

				if ( 'general' != $active_tab && isset( $view_actions[ $active_tab ]['label'] ) ) {
					$admin_title = str_replace( $title, $view_actions[ $active_tab ]['label'], $admin_title );
				}
			}

			return $admin_title;
		}

        /**
		 * top store Header Right Section Links
		 *
		 * @since 1.2.4
		 */
		static public function top_header_right_section(){

			$top_links = apply_filters(
				'top_store_header_top_links',
				array(
					'top-store-theme-info' => array(
						'title' => __( 'Easy to use, Fully Customizable, Unique options', 'top-store' ),
					),
				)
			);

			if ( ! empty( $top_links ) ) {
				?>
				<div class="top-store-top-links">
					<ul>
						<?php
						foreach ( (array) $top_links as $key => $info ) {
							/* translators: %1$s: Top Link URL wrapper, %2$s: Top Link URL, %3$s: Top Link URL target attribute */
							printf(
								'<li><%1$s %2$s %3$s > %4$s </%1$s>',
								isset( $info['url'] ) ? 'a' : 'span',
								isset( $info['url'] ) ? 'href="' . esc_url( $info['url'] ) . '"' : '',
								isset( $info['url'] ) ? 'target="_blank" rel="noopener"' : '',
								esc_html( $info['title'] )
							);
						}
						?>
						</ul>
					</div>
				<?php
			}
		}
      
		 /*
		  * Plugin install
		  * Active plugin
		  * Setup Homepage
		  */
		public function top_store_activeplugin(){
				$init = isset($_POST['init'])?$_POST['init']:'';
				$slug = isset($_POST['slug']) && $_POST['slug']=='one-click-demo-import';
		        activate_plugin( $init, '', false, true );
			       			wp_die(); 

		}
		
         /**
		 * Required Plugin Activate
		 *
		 * @since 1.2.4
		 */
		static public function required_plugin_activate() {

			if ( ! current_user_can( 'install_plugins' ) || ! isset( $_POST['init'] ) || ! $_POST['init'] || ! isset( $_POST['init1'] ) || ! $_POST['init1'] ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => __( 'No plugin specified', 'top-store' ),
					)
				);
			}

			$plugin_init = ( isset( $_POST['init'] ) ) ? esc_attr( $_POST['init'] ) : '';
			$plugin_init1 = ( isset( $_POST['init1'] ) ) ? esc_attr( $_POST['init1'] ) : '';

			$activate = activate_plugin( $plugin_init, '', false, true );
            $activate1 = activate_plugin( $plugin_init1, '', false, true );
			if ( is_wp_error( $activate ) ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => $activate->get_error_message(),
					)
				);
			}
			if ( is_wp_error( $activate1 ) ) {
				wp_send_json_error(
					array(
						'success' => false,
						'message' => $activate1->get_error_message(),
					)
				);
			}

			wp_send_json_success(
				array(
					'success' => true,
					'message' => __( 'Plugin Successfully Activated', 'top-store' ),
				)
			);

		}

	}
   new Top_Store_Admin_Settings;
}