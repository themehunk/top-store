<?php
/**
 * View General
 *
 * @package Themehunk
 * @subpackage  Top Store
 * @since 1.0.0
 */
?>
<div class="top-store-container top-store-welcome">
		<div id="poststuff">
			<div id="post-body" class="columns-1">
				<div id="post-body-content">
					<!-- All WordPress Notices below header -->
					<h1 class="screen-reader-text"><?php esc_html_e( 'Top Store', 'top-store' ); ?> </h1>
					<div class="tabs-list">
					<a href="#top-store-recommend-plugins" class="tab active" data-id="recommend"><?php esc_html_e( 'Recommend Plugins', 'top-store' ); ?></a> 
					<a href="#top-store-useful-plugins" class="tab" data-id="useful"><?php esc_html_e( 'Useful Plugins', 'top-store' ); ?></a>
					</div>
						<?php do_action( 'top_store_welcome_page_content_before' ); ?>
                        <div class="top-store-content">
						<?php do_action( 'top_store_welcome_page_main_content' ); ?>
                         </div>
						<?php do_action( 'top_store_welcome_page_content_after' ); ?>
				</div>
			</div>
			<!-- /post-body -->
			<br class="clear">
		</div>


</div>
