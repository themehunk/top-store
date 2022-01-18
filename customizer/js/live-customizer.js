/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and 
 * then make any necessary changes to the page using jQuery.
 */
( function( $ ){
/**
 * Dynamic Internal/Embedded Style for a Control
 */
function top_store_add_dynamic_css( control, style ){
      control = control.replace( '[', '-' );
      control = control.replace( ']', '' );
      jQuery( 'style#' + control ).remove();

      jQuery( 'head' ).append(
            '<style id="' + control + '">' + style + '</style>'
      );
}
/**
 * Responsive Spacing CSS
 */
function top_store_responsive_spacing( control, selector, type, side ){
    wp.customize( control, function( value ){
        value.bind( function( value ){
            var sidesString = "";
            var spacingType = "padding";
            if ( value.desktop.top || value.desktop.right || value.desktop.bottom || value.desktop.left || value.tablet.top || value.tablet.right || value.tablet.bottom || value.tablet.left || value.mobile.top || value.mobile.right || value.mobile.bottom || value.mobile.left ) {
                if ( typeof side != undefined ) {
                    sidesString = side + "";
                    sidesString = sidesString.replace(/,/g , "-");
                }
                if ( typeof type != undefined ) {
                    spacingType = type + "";
                }
                // Remove <style> first!
                control = control.replace( '[', '-' );
                control = control.replace( ']', '' );
                jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();

                var desktopPadding = '',
                    tabletPadding = '',
                    mobilePadding = '';

                var paddingSide = ( typeof side != undefined ) ? side : [ 'top','bottom','right','left' ];

                jQuery.each(paddingSide, function( index, sideValue ){
                    if ( '' != value['desktop'][sideValue] ) {
                        desktopPadding += spacingType + '-' + sideValue +': ' + value['desktop'][sideValue] + value['desktop-unit'] +';';
                    }
                });

                jQuery.each(paddingSide, function( index, sideValue ){
                    if ( '' != value['tablet'][sideValue] ) {
                        tabletPadding += spacingType + '-' + sideValue +': ' + value['tablet'][sideValue] + value['tablet-unit'] +';';
                    }
                });

                jQuery.each(paddingSide, function( index, sideValue ){
                    if ( '' != value['mobile'][sideValue] ) {
                        mobilePadding += spacingType + '-' + sideValue +': ' + value['mobile'][sideValue] + value['mobile-unit'] +';';
                    }
                });

                // Concat and append new <style>.
                jQuery( 'head' ).append(
                    '<style id="' + control + '-' + spacingType + '-' + sidesString + '">'
                    + selector + '  { ' + desktopPadding +' }'
                    + '@media (max-width: 768px) {' + selector + '  { ' + tabletPadding + ' } }'
                    + '@media (max-width: 544px) {' + selector + '  { ' + mobilePadding + ' } }'
                    + '</style>'
                );

            } else {
                wp.customize.preview.send( 'refresh' );
                jQuery( 'style#' + control + '-' + spacingType + '-' + sidesString ).remove();
            }

        } );
    } );
}
/**
 * Apply CSS for the element
 */
function top_store_css( control, css_property, selector, unit ){

    wp.customize( control, function( value ) {
        value.bind( function( new_value ) {

            // Remove <style> first!
            control = control.replace( '[', '-' );
            control = control.replace( ']', '' );

            if ( new_value ){
                /**
                 *  If ( unit == 'url' ) then = url('{VALUE}')
                 *  If ( unit == 'px' ) then = {VALUE}px
                 *  If ( unit == 'em' ) then = {VALUE}em
                 *  If ( unit == 'rem' ) then = {VALUE}rem.
                 */
                if ( 'undefined' != typeof unit) {
                    if ( 'url' === unit ) {
                        new_value = 'url(' + new_value + ')';
                    } else {
                        new_value = new_value + unit;
                    }
                }

                // Remove old.
                jQuery( 'style#' + control ).remove();

                // Concat and append new <style>.
                jQuery( 'head' ).append(
                    '<style id="' + control + '">'
                    + selector + '  { ' + css_property + ': ' + new_value + ' }'
                    + '</style>'
                );

            } else {

                wp.customize.preview.send( 'refresh' );

                // Remove old.
                jQuery( 'style#' + control ).remove();
            }

        } );
    } );
}
/*******************************/
// Range slider live customizer
/*******************************/
function topStoreGetCss( arraySizes, settings, to ) {
    'use strict';
    var data, desktopVal, tabletVal, mobileVal,
        className = settings.styleClass, i = 1;

    var val = JSON.parse( to );
    if ( typeof( val ) === 'object' && val !== null ) {
        if ('desktop' in val) {
            desktopVal = val.desktop;
        }
        if ('tablet' in val) {
            tabletVal = val.tablet;
        }
        if ('mobile' in val) {
            mobileVal = val.mobile;
        }
    }

    for ( var key in arraySizes ) {
        // skip loop if the property is from prototype
        if ( ! arraySizes.hasOwnProperty( key )) {
            continue;
        }
        var obj = arraySizes[key];
        var limit = 0;
        var correlation = [1,1,1];
        if ( typeof( val ) === 'object' && val !== null ) {

            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }

            data = {
                desktop: ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0]) > limit ? ( parseInt(parseFloat( desktopVal ) / correlation[0]) + obj.values[0] ) : limit,
                tablet: ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) > limit ? ( parseInt(parseFloat( tabletVal ) / correlation[1]) + obj.values[1] ) : limit,
                mobile: ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) > limit ? ( parseInt(parseFloat( mobileVal ) / correlation[2]) + obj.values[2] ) : limit
            };
        } else {
            if( typeof obj.limit !== 'undefined'){
                limit = obj.limit;
            }

            if( typeof obj.correlation !== 'undefined'){
                correlation = obj.correlation;
            }
            data =( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] > limit ? ( parseInt( parseFloat( to ) / correlation[0] ) ) + obj.values[0] : limit;
        }
        settings.styleClass = className + '-' + i;
        settings.selectors  = obj.selectors;

        topStoreSetCss( settings, data );
        i++;
    }
}
function topStoreSetCss( settings, to ){
    'use strict';
    var result     = '';
    var styleClass = jQuery( '.' + settings.styleClass );
    if ( to !== null && typeof to === 'object' ){
        jQuery.each(
            to, function ( key, value ) {
                var style_to_add;
                if ( settings.selectors === '.container' ){
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '; max-width: 100%; }';
                } else {
                    style_to_add = settings.selectors + '{ ' + settings.cssProperty + ':' + value + settings.propertyUnit + '}';
                }
                switch ( key ) {
                    case 'desktop':
                        result += style_to_add;
                        break;
                    case 'tablet':
                        result += '@media (max-width: 767px){' + style_to_add + '}';
                        break;
                    case 'mobile':
                        result += '@media (max-width: 544px){' + style_to_add + '}';
                        break;
                }
            }
        );
        if ( styleClass.length > 0 ) {
            styleClass.text( result );
        } else {
            jQuery( 'head' ).append( '<style type="text/css" class="' + settings.styleClass + '">' + result + '</style>' );
        }
    } else {
        jQuery( settings.selectors ).css( settings.cssProperty, to + 'px' );
    }
}
//*****************************/
// Logo
//*****************************/
wp.customize(
    'top_store_logo_width', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'max-width',
                    propertyUnit: 'px',
                    styleClass: 'top-store-logo-width'
                };

                var arraySizes = {
                    size3: { selectors:'.thunk-logo img,.sticky-header .logo-content img', values: ['','',''] }
                };
                topStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
//top header
wp.customize('top_store_col1_texthtml', function(value){
         value.bind(function(to){
             $('.top-header-col1 .content-html').text(to);
         });
     });
 wp.customize('top_store_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col2 .content-html').text(to);
         });
     });
 wp.customize('top_store_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-header-col3 .content-html').text(to);
         });
     });
top_store_css( 'top_store_abv_hdr_botm_brd','border-bottom-width', '.top-header', 'px' );
top_store_css( 'top_store_above_brdr_clr','border-bottom-color', '.top-header,body.top-store-dark .top-header');
wp.customize(
    'top_store_abv_hdr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-header .top-header-bar', values: ['','',''] }
                };
                topStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'top_store_abv_hdr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: ''
                };

                var arraySizes = {
                    size3: { selectors:'.top-header', values: ['','',''] }
                };
                topStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
/***************/
// MAIN HEADER
/***************/
wp.customize('top_store_main_hdr_calto_txt', function(value){
         value.bind(function(to){
             $('.sprt-tel span').text(to);
         });
});
wp.customize('top_store_main_hdr_calto_nub', function(value){
         value.bind(function(to){
             $('.sprt-tel a').text(to);
         });
});

//cat slider heading
wp.customize('top_store_cat_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-category-slide-section .thunk-title .title').text(to);
         });
     });
//product slide
wp.customize('top_store_product_slider_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-slide-section .thunk-title .title').text(to);
         });
     });
//product list
wp.customize('top_store_product_list_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-list-section .thunk-title .title').text(to);
         });
     });
//product cat tab 
wp.customize('top_store_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-tab-section .thunk-title .title').text(to);
         });
     });
//product cat tab list
wp.customize('top_store_list_cat_tab_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-tab-list-section .thunk-title .title').text(to);
         });
     });
//Highlight 
wp.customize('top_store_hglgt_heading', function(value){
         value.bind(function(to) {
             $('.thunk-product-highlight-section .thunk-title .title').text(to);
         });
     });
//Big Featured
wp.customize('top_store_feature_product_heading', function(value){
         value.bind(function(to) {
             $('.thunk-feature-product-section .thunk-title .title').text(to);
         });
     });
//Ribbon Text
wp.customize('top_store_ribbon_text', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content h3').text(to);
         });
     });
wp.customize('top_store_ribbon_btn_text', function(value){
         value.bind(function(to) {
             $('.thunk-ribbon-content a.ribbon-btn').text(to);
         });
     });

/****************/
// footer
/****************/
wp.customize('top_store_footer_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('top_store_above_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('top_store_above_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.top-footer-col3 .content-html').text(to);
         });
     });
top_store_css( 'top_store_above_frt_brdr_clr','border-bottom-color', 'body.top-store-dark .top-footer,.top-footer');
wp.customize(
    'top_store_above_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: 'top_store_above_ftr_hgt'
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer .top-footer-bar', values: ['','',''] }
                };
                topStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'top_store_abv_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-bottom-width',
                    propertyUnit: 'px',
                    styleClass: 'top_store_abv_ftr_botm_brd'
                };

                var arraySizes = {
                    size3: { selectors:'.top-footer', values: ['','',''] }
                };
                topStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);

 wp.customize('top_store_footer_bottom_col1_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col1 .content-html').text(to);
         });
     });
 wp.customize('top_store_bottom_footer_col2_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col2 .content-html').text(to);
         });
     });
 wp.customize('top_store_bottom_footer_col3_texthtml', function(value){
         value.bind(function(to) {
             $('.below-footer-col3 .content-html').text(to);
         });
     });
top_store_css( 'top_store_bottom_frt_brdr_clr','border-top-color', '.below-footer,body.top-store-dark .below-footer');
wp.customize(
    'top_store_btm_ftr_hgt', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'line-height',
                    propertyUnit: 'px',
                    styleClass: 'top_store_btm_ftr_hgt'
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer .below-footer-bar', values: ['','',''] }
                };
                topStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
wp.customize(
    'top_store_btm_ftr_botm_brd', function (value){
        'use strict';
        value.bind(
            function( to ) {
                var settings = {
                    cssProperty: 'border-top-width',
                    propertyUnit: 'px',
                    styleClass: 'top_store_btm_ftr_botm_brd'
                };

                var arraySizes = {
                    size3: { selectors:'.below-footer', values: ['','',''] }
                };
                topStoreGetCss( arraySizes, settings, to );
            }
        );
    }
);
// loader
top_store_css( 'top_store_loader_bg_clr','background-color','.top_store_overlayloader');
//*****************************/
// Global Color Custom Style
//*****************************/
wp.customize( 'top_store_theme_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '';
                dynamicStyle += 'a:hover, .top-store-menu li a:hover, .top-store-menu .current-menu-item a,.woocommerce .thunk-woo-product-list .price,.thunk-product-hover .th-button.add_to_cart_button, .woocommerce ul.products .thunk-product-hover .add_to_cart_button, .woocommerce .thunk-product-hover a.th-button, .woocommerce ul.products li.product .product_type_variable, .woocommerce ul.products li.product a.button.product_type_grouped,.thunk-compare .compare-button a:hover, .thunk-product-hover .th-button.add_to_cart_button:hover, .woocommerce ul.products .thunk-product-hover .add_to_cart_button :hover, .woocommerce .thunk-product-hover a.th-button:hover,.thunk-product .yith-wcwl-wishlistexistsbrowse.show:before, .thunk-product .yith-wcwl-wishlistaddedbrowse.show:before,.woocommerce ul.products li.product.thunk-woo-product-list .price,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,article.thunk-post-article .thunk-readmore.button:hover,.header-icon a:hover,.thunk-related-links .nav-links a:hover,.woocommerce .thunk-list-view ul.products li.product.thunk-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.woocommerce .thunk-product-hover a.th-button,.page-contact .leadform-show-form label,.thunk-contact-col .fa,ul.products .thunk-product-hover .add_to_cart_button:hover,.woocommerce .thunk-product-hover a.th-button:hover,.woocommerce ul.products li.product .product_type_variable:hover,.woocommerce ul.products li.product a.button.product_type_grouped:hover,.woocommerce .thunk-product-hover a.th-button:hover,.woocommerce ul.products li.product .add_to_cart_button:hover,.woocommerce .added_to_cart.wc-forward:hover,ul.products .thunk-product-hover .add_to_cart_button:hover:after,.woocommerce .thunk-product-hover a.th-button:hover:after,.woocommerce ul.products li.product .product_type_variable:hover:after,.woocommerce ul.products li.product a.button.product_type_grouped:hover:after,.woocommerce .thunk-product-hover a.th-button:hover:after,.woocommerce ul.products li.product .add_to_cart_button:hover:after,.woocommerce .added_to_cart.wc-forward:hover:after,.th-hlight-icon,.ribbon-btn:hover,.thunk-product .yith-wcwl-wishlistexistsbrowse:before,.woosw-btn:hover:before,.woosw-added:before,.wooscp-btn:hover:before,#top-store-mobile-bar .count-item{ color: ' + cssval + '} ';
                dynamicStyle += '.toggle-cat-wrap,#search-button,.thunk-icon .cart-icon,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.btn-main-header,.top-store-site section.thunk-ribbon-section .content-wrap:before,.count-item,.header-support-icon{ background: ' + cssval + '} ';
                dynamicStyle += '.open-cart p.buttons a:hover,.woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .top-store-slide-post .owl-nav button.owl-prev:hover, .top-store-slide-post .owl-nav button.owl-next:hover,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type="submit"]:hover,.page-contact .leadform-show-form input[type="submit"],.nav-links .page-numbers.current, .nav-links .page-numbers:hover,body.top-store-dark .thunk-slide .owl-nav button.owl-prev:hover,body.top-store-dark .thunk-slide .owl-nav button.owl-next:hover{background-color: ' + cssval + '} ';
                dynamicStyle += '.thunk-product-hover .th-button.add_to_cart_button, .woocommerce ul.products .thunk-product-hover .add_to_cart_button, .woocommerce .thunk-product-hover a.th-button, .woocommerce ul.products li.product .product_type_variable, .woocommerce ul.products li.product a.button.product_type_grouped,.open-cart p.buttons a:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover, .top-store-slide-post .owl-nav button.owl-prev:hover, .top-store-slide-post .owl-nav button.owl-next:hover,body .woocommerce-tabs .tabs li a::before,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,#searchform [type="submit"]:hover,.woocommerce .thunk-product-hover a.th-button,.page-contact .leadform-show-form input[type="submit"],body.top-store-dark .thunk-slide.owl-carousel .owl-nav button.owl-prev:hover, body.top-store-dark .thunk-slide.owl-carousel .owl-nav button.owl-next:hover{border-color: ' + cssval + '} ';
                top_store_add_dynamic_css( 'top_store_theme_clr', dynamicStyle );

        } );
    } );

top_store_css( 'top_store_text_clr','color','body,.woocommerce-error, .woocommerce-info, .woocommerce-message');
top_store_css( 'top_store_title_clr','color','.site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.thunk-title .title,.thunk-hglt-box h6,h2.thunk-post-title a, h1.thunk-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a,body.top-store-dark .site-title span a,body.top-store-dark .sprt-tel b,body.woocommerce.top-store-dark .widget .widget-title, body.top-store-dark .open-widget-content .widget-title, body.top-store-dark .widget-title,body.top-store-dark .thunk-title .title,body.top-store-dark .thunk-hglt-box h6,body.top-store-dark h2.thunk-post-title a, body.top-store-dark h1.thunk-post-title ,body.top-store-dark #reply-title,body.top-store-dark h4.author-header,body.top-store-dark .page-head h1,body.woocommerce.top-store-dark div.product .product_title, body.top-store-dark section.related.products h2, body.top-store-dark section.upsells.products h2, body.woocommerce.top-store-dark #reviews #comments h2,body.woocommerce.top-store-dark table.shop_table thead th, body.top-store-dark .cart-subtotal,body.top-store-dark .order-total,body.top-store-dark .cross-sells h2,body.top-store-dark .cart_totals h2,body.top-store-dark .woocommerce-billing-fields h3,body.top-store-dark .page-head h1 a,body.top-store-dark .woocommerce-billing-fields h3,body.top-store-dark .woocommerce-checkout h3#order_review_heading, body.top-store-dark .woocommerce-additional-fields h3');
top_store_css( 'top_store_link_clr','color','a,#top-store-above-menu.top-store-menu > li > a');
top_store_css( 'top_store_link_hvr_clr','color','a:hover,#top-store-above-menu.top-store-menu > li > a:hover,#top-store-above-menu.top-store-menu li a:hover');
// above header bg image
wp.customize('header_image', function (value){
    value.bind(function (to){
        $('.top-header').css('background-image', 'url( '+ to +')');
    });
});

wp.customize( 'top_store_main_hdr_txt_clr', function( setting ){
        setting.bind( function( cssval ){
                var dynamicStyle = '';
                dynamicStyle += '.site-title span a,.main-header-bar,.main-header-bar .header-icon a,.main-header-bar .thunk-icon-market .cart-contents,.th-whishlist-text, .account-text:nth-of-type(1),.sticky-header-col2 .top-store-menu > li > a,.sticky-header-col3 .thunk-icon .cart-icon a.cart-contents, .sticky-header-col3 .header-icon a.prd-search, .sticky-header-col3 .header-icon a.whishlist, .sticky-header-col3 .header-icon a.account,.sticky-header .site-title span a,.sticky-header .site-description,body.top-store-dark .site-title span a,body.top-store-dark .main-header-bar,body.top-store-dark .main-header-bar .header-icon a,body.top-store-dark .main-header-bar .thunk-icon-market .cart-contents,body.top-store-dark .th-whishlist-text,body.top-store-dark .account-text:nth-of-type(1),body.top-store-dark .sticky-header-col2 .top-store-menu > li > a,body.top-store-dark .sticky-header-col3 .thunk-icon .cart-icon a.cart-contents, body.top-store-dark .sticky-header-col3 .header-icon a.prd-search, body.top-store-dark .sticky-header-col3 .header-icon a.whishlist, body.top-store-dark .sticky-header-col3 .header-icon a.account,body.top-store-dark .sticky-header .site-title span a,body.top-store-dark .sticky-header .site-description,body.top-store-dark .sticky-header-col3 .header-icon span a, .thunk-icon-market .cart-icon .taiowc-cart-item,.thunk-icon-market .taiowc-content .taiowc-total{ color: ' + cssval + '} ';
                dynamicStyle += '.thunk-icon-market .cart-icon .taiowc-icon,.thunk-icon-market .cart-icon .taiowc-cart-item,.thunk-icon-market .cart-icon .taiowc-icon,.thunk-icon-market .taiowc-icon svg{ fill: ' + cssval + '} ';
                top_store_add_dynamic_css( 'top_store_main_hdr_txt_clr', dynamicStyle );
        } );

} );

top_store_css( 'top_store_above_hdr_bg_clr','background','.top-header:before,body.top-store-dark .top-header:before');
top_store_css( 'top_store_main_hdr_bg_clr','background','.main-header:before,.sticky-header:before,body.top-store-dark .main-header:before,body.top-store-dark .sticky-header:before');

// Move to Top
top_store_css( 'top_store_move_to_top_bg_clr','background','#move-to-top');
top_store_css( 'top_store_move_to_top_icon_clr','color','#move-to-top');
})( jQuery );