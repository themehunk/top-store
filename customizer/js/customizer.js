jQuery(document).ready(function(){
//Disable select option
jQuery('#_customize-input-top_store_category_optn option[value="featured"],#_customize-input-top_store_category_optn option[value="random"],#_customize-input-top_store_woo_product_animation option[value="swap"],#_customize-input-top_store_pagination option[value="scroll"],#_customize-input-top_store_pagination option[value="click"],#_customize-input-top_store_main_header_option option[value="button"],#_customize-input-top_store_main_header_option option[value="widget"], #_customize-input-top_store_blog_post_pagination option[value="click"], #_customize-input-top_store_blog_post_pagination option[value="scroll"]').attr("disabled", true);
//Disable Hrader Layout
jQuery('input[id=top_store_top_slide_layout-slide-layout-1], input[id=top_store_top_slide_layout-slide-layout-2], input[id=top_store_top_slide_layout-slide-layout-3],input[id=top_store_top_slide_layout-slide-layout-4],input[id=top_store_bottom_footer_widget_layout-ft-wgt-one],input[id=top_store_bottom_footer_widget_layout-ft-wgt-two],input[id=top_store_bottom_footer_widget_layout-ft-wgt-three],input[id=top_store_bottom_footer_widget_layout-ft-wgt-five],input[id=top_store_bottom_footer_widget_layout-ft-wgt-six],input[id=top_store_bottom_footer_widget_layout-ft-wgt-seven],input[id=top_store_bottom_footer_widget_layout-ft-wgt-eight],input[id=top_store_main_header_layout-mhdrfive],input[id=top_store_main_header_layout-mhdrsix],input[id=top_store_main_header_layout-mhdrseven],input[id=top_store_cat_slide_layout-cat-layout-2],input[id=top_store_cat_slide_layout-cat-layout-3],input[id=top_store_banner_layout-bnr-one],input[id=top_store_banner_layout-bnr-three],input[id=top_store_banner_layout-bnr-four],input[id=top_store_banner_layout-bnr-five],input[id=top_store_above_header_layout-abv-three],input[id=top_store_above_footer_layout-ft-abv-one],input[id=top_store_above_footer_layout-ft-abv-three]').attr("disabled",true);    

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

   



jQuery('#customize-control-top_store_above_header_layout,#customize-control-top_store_above_footer_layout').addClass("lite");   
//Disable Header Layout, radio image
jQuery('input[id=top_store_main_header_layout-mhdrone], input[id=top_store_main_header_layout-mhdrtwo], input[id=top_store_main_header_layout-mhdrthree], input[id=top_store_top_slide_layout-slide-layout-2], input[id=top_store_top_slide_layout-slide-layout-3], input[id=top_store_top_slide_layout-slide-layout-4], input[id=top_store_cat_slide_layout-cat-layout-2], input[id=top_store_cat_slide_layout-cat-layout-3],input[id=top_store_banner_layout-bnr-two],input[id=top_store_banner_layout-bnr-four],input[id=top_store_banner_layout-bnr-five],input[id=top_store_bottom_footer_widget_layout-ft-wgt-one],input[id=top_store_bottom_footer_widget_layout-ft-wgt-two],input[id=top_store_bottom_footer_widget_layout-ft-wgt-three],input[id=top_store_bottom_footer_widget_layout-ft-wgt-five],input[id=top_store_bottom_footer_widget_layout-ft-wgt-six],input[id=top_store_bottom_footer_widget_layout-ft-wgt-seven],input[id=top_store_bottom_footer_widget_layout-ft-wgt-eight]').attr("disabled",true);
jQuery('input[id=top_store_above_header_layout-abv-none],input[id=top_store_above_header_layout-abv-one],input[id=top_store_above_header_layout-abv-three],input[id=top_store_top_slide_layout-slide-layout-5]').attr("disabled",true);

//Disable select option
jQuery('#_customize-input-top_store_category_optn option[value="featured"],#_customize-input-top_store_category_optn option[value="random"],#_customize-input-top_store_woo_product_animation option[value="swap"],#_customize-input-top_store_pagination option[value="scroll"],#_customize-input-top_store_pagination option[value="click"],#_customize-input-top_store_main_header_option option[value="button"],#_customize-input-top_store_main_header_option option[value="widget"], #_customize-input-top_store_blog_post_pagination option[value="click"], #_customize-input-top_store_blog_post_pagination option[value="scroll"],#_customize-input-top_store_blog_post_content option[value="full"],#_customize-input-top_store_blog_post_content option[value="nocontent"]').attr("disabled", true);

//Disable select input, toggle
jQuery('#customize-control-top_store_blog_read_more_txt input, #customize-control-top_store_blog_expt_length input,#customize-control-top_store_disable_top_slider_sec input').attr("disabled",true);

//Disable select input, toggle plugin
jQuery('#customize-control-top_store_disable_cat_sec input,#customize-control-top_store_single_row_prdct_slide input,#customize-control-top_store_single_row_slide_cat input,#customize-control-top_store_disable_product_slide_sec input,  #customize-control-top_store_disable_ribbon_sec input,#customize-control-top_store_disable_product_list_sec input,#customize-control-top_store_disable_category_slide_sec input,#customize-control-top_store_single_row_prdct_list input,#customize-control-top_store_disable_banner_sec input,#customize-control-top_store_top_slider_optn input,#customize-control-top_store_disable_brand_sec input').attr("disabled",true);
jQuery('#customize-control-top_store_category_tab_list li input').attr("disabled",true);
jQuery('#customize-control-top_store_category_tab_list li:nth-of-type(1) input,#customize-control-top_store_category_tab_list li:nth-of-type(2) input,#customize-control-top_store_category_tab_list li:nth-of-type(3) input').attr("disabled",false);
jQuery('#customize-control-top_store_category_slide_list li input').attr("disabled",true);
jQuery('#customize-control-top_store_category_slide_list li:nth-of-type(1) input,#customize-control-top_store_category_slide_list li:nth-of-type(2) input,#customize-control-top_store_category_slide_list li:nth-of-type(3) input,#customize-control-top_store_category_slide_list li:nth-of-type(4) input').attr("disabled",false);
jQuery('#customize-control-top_store_header_category_list li input').attr("disabled",true);
jQuery('#customize-control-top_store_header_category_list li:nth-of-type(1) input,#customize-control-top_store_header_category_list li:nth-of-type(2) input,#customize-control-top_store_header_category_list li:nth-of-type(3) input,#customize-control-top_store_header_category_list li:nth-of-type(4) input,#customize-control-top_store_header_category_list li:nth-of-type(5) input').attr("disabled",false);

jQuery('#_customize-input-top_store_product_slide_optn option[value="featured"],#_customize-input-top_store_product_slide_optn option[value="random"],#_customize-input-top_store_product_list_optn option[value="featured"],#_customize-input-top_store_product_list_optn option[value="random"],#_customize-input-top_store_product_slider_cat option,#_customize-input-top_store_product_list_cat option').attr("disabled",true);
jQuery('#_customize-input-top_store_product_slider_cat option:nth-of-type(1)').attr("disabled",false);
jQuery('input[id=top_store_banner_layout-bnr-one]').attr("disabled",true);


jQuery('#top_store_product_slider_optn input,#customize-control-top_store_sticky_sidebar input,#_customize-input-top_store_above_header_col1_set option[value="none"],#_customize-input-top_store_above_header_col1_set option[value="menu"],#_customize-input-top_store_above_header_col1_set option[value="widget"],#_customize-input-top_store_above_header_col1_set option[value="social"],#_customize-input-top_store_above_header_col2_set option[value="none"],#_customize-input-top_store_above_header_col2_set option[value="text"],#_customize-input-top_store_above_header_col2_set option[value="menu"],#_customize-input-top_store_above_header_col2_set option[value="widget"],#_customize-input-top_store_sidebar_front_option option[value="disable-left-sidebar"],#_customize-input-top_store_sidebar_front_option option[value="disable-right-sidebar"],#_customize-input-top_store_sidebar_ineternal_option option[value="no-sidebar"],#_customize-input-top_store_sidebar_ineternal_option option[value="disable-right-sidebar"],#_customize-input-top_store_sidebar_ineternal_option option[value="disable-left-sidebar"]').attr("disabled",true);
jQuery('#customize-control-top_store_above_mobile_disable input,#customize-control-top_store_rtl input').attr("disabled",true);
jQuery('#customize-control-top_store_product_slider_optn input,#customize-control-top_store_product_list_slide_optn input,#customize-control-top_store_brand_slider_optn input,#customize-control-top_store_shadow_header input,#customize-control-top_store_sticky_header input,#customize-control-top_store_whislist_mobile_disable input,#customize-control-top_store_account_mobile_disable input,#customize-control-top_store_cart_mobile_disable input,input[id=top_store_above_footer_layout-ft-abv-none],input[id=top_store_above_footer_layout-ft-abv-one],input[id=top_store_above_footer_layout-ft-abv-three]').attr("disabled",true);

jQuery('#customize-control-top_store_top_slide_lay5_content .button.add_field,#customize-control-top_store_brand_content .button.add_field').remove();
jQuery('#customize-control-top_store_top_slide_lay5_content,#customize-control-top_store_category_tab_list,#customize-control-top_store_category_slide_list,#customize-control-top_store_product_list_cat,#customize-control-top_store_brand_content').append("<h4>(To Add More Slides Feature Available In Pro Version)</h4>");

jQuery('#customize-control-top_store_header_category_list,#customize-control-top_store_product_slider_cat').append("<h4>(To Select More Feature Available In Pro Version)</h4>");


}); 