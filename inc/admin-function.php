<?php 
/**
 * Common Function for Top Store Theme.
 *
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 */
 if ( ! function_exists( 'top_store_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 * Does nothing if the custom logo is not available.
 */
function top_store_custom_logo(){
    if ( function_exists( 'the_custom_logo' ) ){?>
    	<div class="thunk-logo">
        <?php the_custom_logo();?>
      </div>
   <?php  }
}
endif;
/*********************/
// Menu 
/*********************/
function top_store_add_classes_to_page_menu( $ulclass ){
  return preg_replace( '/<ul>/', '<ul class="top-store-menu" data-menu-style="horizontal">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'top_store_add_classes_to_page_menu' );		
     // This theme uses wp_nav_menu() in two locations.
	  function top_store_custom_menu(){
		     register_nav_menus(array(
		  'top-store-above-menu' => esc_html__( 'Header Above Menu', 'top-store' ),
			'top-store-main-menu'    => esc_html__( 'Main', 'top-store' ),
			'top-store-sticky-menu'  => esc_html__( 'Sticky', 'top-store' ),
			'top-store-footer-menu'  => esc_html__( 'Footer Menu', 'top-store' ),
		) );
	  }
	  add_action( 'after_setup_theme', 'top_store_custom_menu' );
	  // MAIN MENU
           function top_store_main_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'top-store-main-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="top-store-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="top-store-menu" class="top-store-menu" data-menu-style="horizontal">%3$s</ul>',
             ));
         }
          //STICKY MENU
           function top_store_stick_nav_menu(){
              wp_nav_menu( array(
              'theme_location' => 'top-store-sticky-menu', 
              'container'      => false, 
              'link_before'    =>'<span class="top-store-menu-link">',
              'link_after'     => '</span>',
              'items_wrap'     => '<ul id="top-store-stick-menu" class="top-store-menu" data-menu-style="horizontal">%3$s</ul>',
             ));
         }
         // HEADER ABOVE MENU
         function top_store_abv_nav_menu(){
              wp_nav_menu( array('theme_location' => 'top-store-above-menu', 
              'container'   => false, 
              'link_before' => '<span class="top-store-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="top-store-above-menu" class="top-store-menu" data-menu-style="horizontal">%3$s</ul>',
             ));
         }
         // FOOTER TOP MENU
         function top_store_footer_nav_menu(){
              wp_nav_menu( array('theme_location' => 'top-store-footer-menu', 
              'container'   => false, 
              'link_before' => '<span class="top-store-menu-link">',
              'link_after'  => '</span>',
              'items_wrap'  => '<ul id="top-store-footer-menu" class="top-store-bottom-menu">%3$s</ul>',
             ));
         }
function top_store_add_classes_to_page_menu_default( $ulclass ){
return preg_replace( '/<ul>/', '<ul class="top-store-menu" data-menu-style="horizontal">', $ulclass, 1 );
}
add_filter( 'wp_page_menu', 'top_store_add_classes_to_page_menu_default' );
/************************/
// description Menu
/************************/
// function top_store_nav_description( $item_output, $item, $depth, $args ){
//     if ( !empty( $item->description ) ) {
//         $item_output = str_replace( $args->link_after . '</a>', '<p class="menu-item-description">' . esc_html($item->description) . '</p>' . $args->link_after . '</a>', $item_output );
//     }
//     return $item_output;
// }
// add_filter( 'walker_nav_menu_start_el', 'top_store_nav_description', 10, 4 );

/*********************/
/**
 * Function to check if it is Internet Explorer
 */
if ( ! function_exists( 'top_store_check_is_ie' ) ) :
	/**
	 * Function to check if it is Internet Explorer.
	 *
	 * @return true | false boolean
	 */
	function top_store_check_is_ie() {

		$is_ie = false;

		$ua = htmlentities( $_SERVER['HTTP_USER_AGENT'], ENT_QUOTES, 'UTF-8' );
		if ( strpos( $ua, 'Trident/7.0' ) !== false ) {
			$is_ie = true;
		}

		return apply_filters( 'top_store_check_is_ie', $is_ie );
	}

endif;
/**
 * ratia image
 */
if ( ! function_exists( 'top_store_replace_header_attr' ) ) :
	/**
	 * Replace header logo.
	 *
	 * @param array  $attr Image.
	 * @param object $attachment Image obj.
	 * @param sting  $size Size name.
	 *
	 * @return array Image attr.
	 */
	function top_store_replace_header_attr( $attr, $attachment, $size ){
		$custom_logo_id = get_theme_mod( 'custom_logo' );
		if ( $custom_logo_id == $attachment->ID ){
			$attach_data = array();
			if ( ! is_customize_preview() ){
				$attach_data = wp_get_attachment_image_src( $attachment->ID, 'top-store-logo-size' );


				if ( isset( $attach_data[0] ) ) {
					$attr['src'] = $attach_data[0];
				}
			}

			$file_type      = wp_check_filetype( $attr['src'] );
			$file_extension = $file_type['ext'];
			if ( 'svg' == $file_extension ) {
				$attr['class'] = 'top-store-logo-svg';
			}
			$retina_logo = get_theme_mod( 'top_store_header_retina_logo' );
			$attr['srcset'] = '';
			if ( apply_filters( 'top_store_main_header_retina', true ) && '' !== $retina_logo ) {
				$cutom_logo     = wp_get_attachment_image_src( $custom_logo_id, 'full' );
				$cutom_logo_url = $cutom_logo[0];

				if (top_store_check_is_ie() ){
					// Replace header logo url to retina logo url.
					$attr['src'] = esc_url($retina_logo);
				}

				$attr['srcset'] = $cutom_logo_url . ' 1x, ' . esc_url($retina_logo) . ' 2x';

			}
		}

		return apply_filters( 'top_store_replace_header_attr', $attr );
	}

endif;

add_filter( 'wp_get_attachment_image_attributes', 'top_store_replace_header_attr', 10, 3 );

/********************************/
// responsive slider function
/*********************************/
if ( ! function_exists( 'top_store_responsive_slider_funct' ) ) :
function top_store_responsive_slider_funct($control_name,$function_name){
  $custom_css='';
           $control_value = get_theme_mod( $control_name );
           if ( empty( $control_value ) ){
                return '';
             }  
        if ( top_store_is_json( $control_value ) ){
    $control_value = json_decode( $control_value, true );
    if ( ! empty( $control_value ) ) {

      foreach ( $control_value as $key => $value ){
        $custom_css .= call_user_func( $function_name, $value, $key );
      }
    }
    return $custom_css;
  }  
}
endif;
/********************************/
// responsive slider function add media query
/********************************/
if ( ! function_exists( 'top_store_add_media_query' ) ) :
function top_store_add_media_query( $dimension, $custom_css ){
  switch ($dimension){
      case 'desktop':
      $custom_css = '@media (min-width: 769px){' . $custom_css . '}';
      break;
      break;
      case 'tablet':
      $custom_css = '@media (max-width: 768px){' . $custom_css . '}';
      break;
      case 'mobile':
      $custom_css = '@media (max-width: 550px){' . $custom_css . '}';
      break;
  }

      return $custom_css;
}
endif;

/*************************/
//Get Page Title
/*************************/
function top_store_get_page_title(){ ?>
			<?php if(is_search()){ ?> 
            <h2 class="thunk-page-top-title entry-title">
              	<?php printf( __( 'Search Results for: %s', 'top-store' ), '<span>' . esc_html( get_search_query() ) . '</span>' ); ?></h2>

			<?php }elseif (top_store_is_blog() && !is_single() && !is_archive()){
				if( !(is_front_page()) ){
                    $our_title = get_the_title( get_option('page_for_posts', true) );
			echo '<h1 class="thunk-page-top-title entry-title">'.esc_html($our_title).'</h1>'; ?>
			<?php }else{
			echo'<h1 class="thunk-page-top-title entry-title">'.esc_html__('Blog','top-store').'</h1>'; ?>
			<?php }	 
			 }elseif(is_archive()){
             echo the_archive_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
      <?php }
      elseif(class_exists( 'WooCommerce' ) && is_shop()){
             echo the_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php }elseif(class_exists( 'WooCommerce' ) && is_shop()){ ?>
				<h1 class="thunk-page-top-title entry-title"><?php woocommerce_page_title(); ?></h1> 
			<?php }elseif(is_page()){ 
				echo the_title('<h1 class="thunk-page-top-title entry-title">','</h1>'); ?>
			<?php } ?>
   <?php 
}
/**************************/
// Dynamic Social Link
/**************************/
function top_store_social_links(){
$social='';
$original_color = get_theme_mod('top_store_social_original_color',false);
if($original_color==true){
$class_original='original-social-icon';
}else{
$class_original='';	
}
$social.='<ul class="social-icon ' .esc_attr($class_original). ' ">';
if($f_link = get_theme_mod('top_store_social_link_facebook','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($f_link).'"><i class="fa fa-facebook"></i></a></li>';
endif;
if($l_link = get_theme_mod('top_store_social_link_linkedin','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($l_link).'"><i class="fa fa-linkedin"></i></a></li>';
endif;
if($p_link = get_theme_mod('top_store_social_link_pintrest','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($p_link).'"><i class="fa fa-pinterest"></i></a></li>';
endif;
if($t_link = get_theme_mod('top_store_social_link_twitter','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($t_link).'"><i class="fa fa-twitter"></i></a></li>';
endif;
if($insta_link = get_theme_mod('top_store_social_link_insta','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($insta_link).'"><i class="fa fa-instagram"></i></a></li>';
endif;
if($tum_link = get_theme_mod('top_store_social_link_tumblr','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($tum_link).'"><i class="fa fa-tumblr"></i></a></li>';
endif;
if($y_link = get_theme_mod('top_store_social_link_youtube','#')) :
	$social.='<li><a target="_blank" href="'.esc_url($y_link).'"><i class="fa fa-youtube-play"></i></a></li>';
endif;
if($stumb_link = get_theme_mod('top_store_social_link_stumbleupon','#')):
	$social.='<li><a target="_blank" href="'.esc_url($stumb_link).'">
	 <i class="fa fa-stumbleupon"></i></a></li>';
endif;
if($dribble_link = get_theme_mod('top_store_social_link_dribble','#')):
	$social.='<li><a target="_blank" href="'.esc_url($dribble_link).'">
	 <i class="fa fa-dribbble"></i></a></li>';
endif;
$social.='</ul>';
return $social;
}

/******************************/
//Sticky sidebar function
/******************************/
function top_store_stick_sidebar($class){
            $top_store_sticky_sidebar = get_theme_mod( 'top_store_sticky_sidebar');
            if ($top_store_sticky_sidebar){
                $class = 'topstore-sticky-sidebar';
            }
            return $class;
}
add_filter( 'top_store_stick_sidebar_class','top_store_stick_sidebar', 999 );
/*****************************/
//add class active
function top_store_body_classes( $classes ){
if(class_exists( 'WooCommerce' )):
$classes[] = 'woocommerce';
endif;
$top_store_color_scheme = esc_html(get_theme_mod( 'top_store_color_scheme','opn-light' ));
         if ( $top_store_color_scheme == 'opn-dark' ){

            	 $classes[] = 'top-store-dark';

         }
         if ( $top_store_color_scheme == 'opn-light' ){

            	 $classes[] = 'top-store-light';
         }
return $classes;
}
add_filter( 'body_class', 'top_store_body_classes' );

// sideabr function for internal pages
function top_store_pages_sidebar(){
$top_store_sidebar_ineternal_option = get_theme_mod('top_store_sidebar_ineternal_option','active-sidebar');
return $top_store_sidebar_ineternal_option;
}

// default size in upload image
function top_store_attachment_display_settings(){
    update_option( 'image_default_size', 'large' );
}
add_action( 'after_setup_theme', 'top_store_attachment_display_settings' );