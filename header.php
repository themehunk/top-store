<?php
/**
 * The template for displaying the header
 *
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 * 
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="theme-color" content="<?php echo esc_attr(get_theme_mod('top_store_mobile_header_clr','#fff')); ?>" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php echo esc_url(bloginfo( 'pingback_url' )); ?>">
	<?php endif; ?>
	<?php wp_head(); ?>
</head>
<body <?php body_class();?>>
	<?php wp_body_open();?>	
<?php 
$classes = '';
if(is_page_template( 'page-contact.php' ) || is_page_template( 'page-faq.php' ) ||is_page_template( 'page-aboutus.php' )){
$classes = 'no-sidebar';
}
elseif(!is_404() && !is_search() && is_page()){ 
	$page_post_meta_sidebar = get_post_meta( $post->ID, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(is_single()){
	    $page_post_meta_sidebar = get_post_meta( $post->ID, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(top_store_is_blog()){
	    $blog_page_id = get_option( 'page_for_posts' );
        $page_post_meta_sidebar = get_post_meta( $blog_page_id, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(class_exists( 'WooCommerce' ) && is_shop()){
	    $shop_page_id = get_option( 'woocommerce_shop_page_id' );
        $page_post_meta_sidebar = get_post_meta( $shop_page_id, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}elseif(class_exists( 'WooCommerce' ) && is_product()){
	    $page_post_meta_sidebar = get_post_meta( $post->ID, 'top_store_disable_page_sidebar', true );
		if ($page_post_meta_sidebar=='on'){
			$classes = 'no-sidebar';
		}
}
?>
<?php do_action('top_store_site_preloader'); ?>
<div id="page" class="top-store-site  <?php echo esc_attr($classes);?>">
	<header>
		<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'top-store' ); ?></a>
		<?php do_action( 'top_store_sticky_header' ); ?> 
        <!-- sticky header -->
		<?php if(get_theme_mod('top_store_above_mobile_disable')==true){
			if (wp_is_mobile()!== true):
              do_action( 'top_store_top_header' );  
              endif;
		     }elseif(get_theme_mod('top_store_above_mobile_disable',false)==false){
			 do_action( 'top_store_top_header' );  
		} ?> 
		<!-- end top-header -->
        <?php do_action( 'top_store_main_header' ); ?> 
		<!-- end main-header -->
		<?php do_action( 'top_store_below_header' ); ?> 
		<!-- end below-header -->
	</header> <!-- end header -->