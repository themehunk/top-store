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
<?php do_action('top_store_site_preloader'); ?>
<div id="page" class="top-store-site">
<?php do_action( 'top_store_before_header' ); ?>
<?php do_action( 'top_store_header' ); ?>
<?php do_action( 'top_store_after_header' ); ?>