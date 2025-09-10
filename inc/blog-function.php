<?php 
if ( !function_exists('top_store_full_header_markup') ) {
function top_store_full_header_markup() { ?>
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
<?php }
add_action('top_store_header', 'top_store_full_header_markup');
}

if ( !function_exists('top_store_full_footer_markup') ) {
function top_store_full_footer_markup() { ?>
   <footer>
         <?php 
          // top-footer 
          do_action( 'top_store_top_footer' ); 
          // widget-footer
      do_action( 'top_store_widget_footer' );
      // below-footer
          do_action( 'top_store_below_footer' );  
        ?>
     </footer> <!-- end footer -->
    <?php }

// Hook the custom footer function into 'zita_footer'
add_action('top_store_footer', 'top_store_full_footer_markup');
}
/**
 *Blog Function
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 */

        /**
		 * Excerpt count.
		 *
		 * @param int $length default count of words.
		 * @return int count of words
		 */
		function top_store_excerpt_length( $length ){
			if(is_admin()){
             	return $length;
             }
			 $excerpt_length = (string) get_theme_mod( 'top_store_blog_expt_length' );

			if ( '' != $excerpt_length ) {
			   $length = $excerpt_length;
			}
			return $length;
		}
		add_filter( 'excerpt_length','top_store_excerpt_length', 999 );
/**
 * Display Blog Post Excerpt
 */
if ( ! function_exists( 'top_store_the_excerpt' ) ){
	/**
	 * Display Blog Post Excerpt
	 *
	 * @since 1.0.0
	 */
	function top_store_the_excerpt(){?>
		<div class="entry-content">
		<?php  $excerpt_type = get_theme_mod( 'top_store_blog_post_content','excerpt');
		if ( 'full' == $excerpt_type ){
			the_content();
		} elseif('excerpt' == $excerpt_type ){
			the_excerpt();
		} else {
          return false;
		}?>
		</div>	
	<?php }
}

/**
		 * Read more text.
		 *
		 * @param string $text default read more text.
		 * @return string read more text
		 */
		function top_store_read_more_text( $text ) {

			$read_more = get_theme_mod( 'top_store_blog_read_more_txt' );

			if ( '' != $read_more ) {
				$text = $read_more;
			}

			return $text;
		}
      add_filter( 'top_store_post_read_more', 'top_store_read_more_text');
/**
 * Function to get Read More Link of Post
 *
 * @since 1.0.0
 * @return html
 */
if ( ! function_exists( 'top_store_post_link' ) ){

	/**
	 * Function to get Read More Link of Post
	 *
	 * @param  string $output_filter Filter string.
	 * @return html                Markup.
	 */
	function top_store_post_link( $output_filter = '' ){

		$enabled = apply_filters( 'top_store_post_link_enabled', '__return_true' );
		if ( ( is_admin() && ! wp_doing_ajax() ) || ! $enabled ){
			return $output_filter;
		}
		$top_store_read_more_text = apply_filters( 'top_store_post_read_more', __( 'Read More', 'top-store' ) );
		$read_more_classes        = apply_filters( 'top_store_post_read_more_class', array() );
		$post_link = sprintf(
			esc_html( '%s' ),
			'<a class="' . implode( ' ', $read_more_classes ) . ' thunk-readmore button " href="' . esc_url( get_permalink() ) . '"> ' . the_title( '<span class="screen-reader-text">', '</span>', false ) . esc_html($top_store_read_more_text) . '</a>'
		);
		$output = ' &hellip;<p class="read-more"> ' . $post_link . '</p>';
		return apply_filters( 'top_store_post_link', $output, $output_filter );
	}
}
add_filter( 'excerpt_more', 'top_store_post_link', 1 );
/*******************/
// loader function
/*******************/
if ( ! function_exists( 'top_store_post_loader' ) ):
function top_store_post_loader(){
$top_store_blog_post_pagination = get_theme_mod( 'top_store_blog_post_pagination','num');
if($top_store_blog_post_pagination =='num'){
the_posts_pagination();
}
elseif($top_store_blog_post_pagination=='click'){	
top_store_load_more_button();
}
elseif($top_store_blog_post_pagination=='scroll'){
top_store_scrolling_ajax();
}
}
endif;
