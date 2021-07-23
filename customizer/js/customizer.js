jQuery(document).ready(function(){
//Disable select option
jQuery('#_customize-input-top_store_category_optn option[value="featured"],#_customize-input-top_store_category_optn option[value="random"],#_customize-input-top_store_woo_product_animation option[value="swap"],#_customize-input-top_store_pagination option[value="scroll"],#_customize-input-top_store_pagination option[value="click"],#_customize-input-top_store_main_header_option option[value="button"],#_customize-input-top_store_main_header_option option[value="widget"], #_customize-input-top_store_blog_post_pagination option[value="click"], #_customize-input-top_store_blog_post_pagination option[value="scroll"]').attr("disabled", true);
//Disable Hrader Layout
jQuery('input[id=top_store_top_slide_layout-slide-layout-1], input[id=top_store_top_slide_layout-slide-layout-2], input[id=top_store_top_slide_layout-slide-layout-3],input[id=top_store_top_slide_layout-slide-layout-4],input[id=top_store_bottom_footer_widget_layout-ft-wgt-one],input[id=top_store_bottom_footer_widget_layout-ft-wgt-two],input[id=top_store_bottom_footer_widget_layout-ft-wgt-three],input[id=top_store_bottom_footer_widget_layout-ft-wgt-five],input[id=top_store_bottom_footer_widget_layout-ft-wgt-six],input[id=top_store_bottom_footer_widget_layout-ft-wgt-seven],input[id=top_store_bottom_footer_widget_layout-ft-wgt-eight],input[id=top_store_main_header_layout-mhdrfive],input[id=top_store_main_header_layout-mhdrsix],input[id=top_store_main_header_layout-mhdrseven],input[id=top_store_cat_slide_layout-cat-layout-2],input[id=top_store_cat_slide_layout-cat-layout-3],input[id=top_store_banner_layout-bnr-one],input[id=top_store_banner_layout-bnr-three],input[id=top_store_banner_layout-bnr-four],input[id=top_store_banner_layout-bnr-five]').attr("disabled",true);    
//redirect
//above-header
jQuery( '.focus-customizer-menu-redirect-col1,.focus-customizer-menu-redirect-col2,.focus-customizer-menu-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel('nav_menus').focus();
} );
jQuery( '.focus-customizer-widget-redirect-col1,.focus-customizer-widget-redirect-col2,.focus-customizer-widget-redirect-col3,.focus-customizer-widget-redirect' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.panel( 'widgets' ).focus();
} );
jQuery( '.focus-customizer-social_media-redirect-col1,.focus-customizer-social_media-redirect-col2,.focus-customizer-social_media-redirect-col3' ).on( 'click', function (e){
            e.preventDefault();
            wp.customize.section( 'top-store-social-icon' ).focus();
} ); 

/* === Checkbox Multiple Control === */
    jQuery( '.customize-control-checkbox-multiple input[type="checkbox"]' ).on(
        'change',
        function() {
   // alert('');
            checkbox_values = jQuery( this ).parents( '.customize-control' ).find( 'input[type="checkbox"]:checked' ).map(
                function() {
                    return this.value;
                }
            ).get().join( ',' );

            jQuery( this ).parents( '.customize-control' ).find( 'input[type="hidden"]' ).val( checkbox_values ).trigger( 'change' );
        }
    );

// section sorting
      jQuery( "#sortable" ).sortable({
        placeholder: "ui-sortable-placeholder", 
        cursor: 'move',
        opacity: 0.65,
        stop: function ( event, ui){
        var data = jQuery(this).sortable('toArray');
            //  console.log(data); // This should print array of IDs, but returns empty string/array      
            jQuery( this ).parents( '.customize-control').find( 'input[type="hidden"]' ).val( data ).trigger( 'change' );
        }
    });


 //hide show option
 wp.customize('top_store_top_slide_layout', function( value ) {
        var filter_type = value.bind( function( to ) {
        if(to=='slide-layout-1'){
            jQuery( '.customizer-repeater-logo-image-control' ).css('display','block' ); 
            }else{
             jQuery( '.customizer-repeater-logo-image-control' ).css('display','none' );     
            }
        } );
        if(filter_type()=='slide-layout-1'){
              jQuery( '.customizer-repeater-logo-image-control' ).css('display','block' );
                
            }  else{
             jQuery( '.customizer-repeater-logo-image-control' ).css('display','none' );     
            }

    } );     

});