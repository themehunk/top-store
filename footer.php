<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 */ 
?>
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
    </div> <!-- end top-store-site -->
<?php wp_footer(); ?>
</body>
</html>