<?php 
/**
 * Custom Style for Top Store Theme.
 * @package ThemeHunk
 * @subpackage Top Store
 * @since 1.0.0
 */
function top_store_custom_style(){
$top_store_style=""; 
$top_store_style.= top_store_responsive_slider_funct( 'top_store_logo_width', 'top_store_logo_width_responsive');

/**********************/
//Scheme Color
/**********************/
$top_store_color_scheme = esc_html(get_theme_mod('top_store_color_scheme','opn-light'));
$custombackground = esc_html(get_theme_mod('custom-background','#2f2f2f'));
if($top_store_color_scheme=='opn-dark'){
 $top_store_style.="body.top-store-dark{
    background:{$custombackground};
    color:#888;
}
body.top-store-dark a{
color:#999;
}
body.top-store-dark .top-header-bar ,body.top-store-dark .top-header{
    border-bottom-color: #111;
}
body.top-store-dark .below-footer{
border-top-color: #111;
}
body.top-store-dark .top-header:before,body.top-store-dark .top-footer:before, body.top-store-dark .below-footer:before{
background:#111;
}
body.top-store-dark .top-header-bar, body.top-store-dark .top-header-bar a,body.top-store-dark .top-footer, body.top-store-dark .below-footer,body.top-store-dark .top-footer a, body.top-store-dark .below-footer a,body.top-store-dark .widget-footer,body.top-store-dark .widget-footer a,
.woocommerce-Address-title h3,
.woocommerce-billing-fields h3,
.woocommerce-additional-fields h3,
body.top-store-dark #reply-title,
body.top-store-dark .thunk-single-post form p{
    color: #999;
}
body.top-store-dark .main-header:before,body.top-store-dark #sidebar-primary .top-store-widget-content,body.top-store-dark .top-store-site section .content-wrap:before ,body.top-store-dark .widget-footer:before{
background-color: #1F1F1F;
border-color:#1F1F1F;
}
body.top-store-dark .below-header:before{
  background-color: #1A1A1A;
}
body.top-store-dark .top-footer,
body.top-store-dark .th-hlight{
    border-bottom-color: #1F1F1F;
}
body.top-store-dark .main-header,body.top-store-dark .main-header a,body.top-store-dark #sidebar-primary .top-store-widget-content a,
body.top-store-dark .header-support-content a{
color:#999;
}
body.top-store-dark .main-header a,
body.top-store-dark .thunk-cat-title a,
body.top-store-dark .ribbon-btn,
.woocommerce-billing-fields,
body.top-store-dark .woocommerce-checkout h3#order_review_heading,
.woocommerce .wishlist-title,body.top-store-dark .th-testimonial-title{
  color:#999;
}
body.top-store-dark .widget.woocommerce .widget-title, body.top-store-dark .open-widget-content .widget-title, .widget-title,
body.top-store-dark .open-cart p.buttons a:hover,body.top-store-dark .top-store-quickcart-dropdown p,body.top-store-dark .header-support-icon .callto-icon:hover{
color:#fff;
}
body.top-store-dark .tagcloud a, body.top-store-dark .thunk-tags-wrapper a{
background:#111;
}
body.top-store-dark .thunk-product,body.top-store-dark .thunk-product-hover,body.top-store-dark .thunk-product:hover .thunk-product-hover::before,body.top-store-dark .thunk-product-list-section .thunk-list,body.top-store-dark .thunk-product-tab-list-section .thunk-list{
background:#111;
}
body.top-store-dark .thunk-title .title,
.cross-sells h2, .cart_totals h2{
color:#fff;
}
body.top-store-dark .thunk-woo-product-list .thunk-product-wrap:hover .thunk-product,body.top-store-dark .thunk-product:hover .thunk-product-hover {
    box-shadow: 0 0 15px #111;
}
body.top-store-dark .thunk-cat-text,body.top-store-dark .total-number,.top-store-widget-content{
background-color:#1F1F1F;
    border:1px solid #1F1F1F;
}

body.top-store-dark .thunk-hglt-box h6{
color:#fff;
}
body.top-store-dark .thunk-hglt-box p{
color:#999;
}
body.top-store-dark .thunk-highlight-col {
border-right-color: #111;
}

body.top-store-dark  #search-box input[type='text'], body.top-store-dark  select#product_cat,body.top-store-dark #search-box form,body.top-store-dark .below-header-bar #search-text::placeholder{
 background: #111;
 color:#999;
}

body.top-store-dark  .vert-brd:after {
border: 0.5px solid #666;
}

body.top-store-dark .menu-category-list ul[data-menu-style='vertical'],body.top-store-dark .menu-category-list ul[data-menu-style='vertical'] li ul.sub-menu,body.top-store-dark .thunk-product-cat-list li a,body.top-store-dark .sticky-header:before, .search-wrapper:before{
background:#1F1F1F;
border-color:#1F1F1F;
color:#999;
}
body.top-store-dark  .sprt-tel span{
color:#fff;
}
body.top-store-dark input[type='text'], body.top-store-dark input[type='email'], body.top-store-dark input[type='url'], body.top-store-dark textarea, body.top-store-dark input[type='password'], body.top-store-dark input[type='tel'], body.top-store-dark input[type='search'],body.top-store-dark .woocommerce form .form-row input.input-text,body.top-store-dark .select2-container--default .select2-selection--single,body.top-store-dark .leadform-show-form input[type='number']{
background:#141415;
border-color:#141415;
}
body.top-store-dark #search-box input[type='text'], body.top-store-dark select#product_cat{
  border-color:#666;
}
body.top-store-dark .woocommerce ul.cart_list li img,body.top-store-dark .woocommerce ul.product_list_widget li img {
    border: 1px solid #666;
  }
body.top-store-dark .woocommerce-checkout-review-order-table tfoot th,body.top-store-dark.woocommerce-checkout #payment ul.payment_methods li,
#add_payment_method #payment div.form-row, .woocommerce-cart #payment div.form-row, .woocommerce-checkout #payment div.form-row,.woocommerce table.shop_table .cart-subtotal td,.woocommerce table.shop_table .order-total td,.woocommerce-input-wrapper textarea.input-text,.cart-subtotal th,.cart-subtotal td,.cart_totals .shop_table,.woocommerce .woocommerce-cart-form__cart-item .quantity .qty{
background:#111;
color:#999;
}
.woocommerce table.shop_table thead th,.woocommerce table.shop_table td,
.woocommerce form .form-row textarea,.woocommerce-checkout #payment ul.payment_methods li,body.top-store-dark.woocommerce-checkout #payment ul.payment_methods li,.woocommerce-checkout #payment ul.payment_methods,#add_payment_method table.cart td.actions .coupon .input-text, .woocommerce-cart table.cart td.actions .coupon .input-text, .woocommerce-checkout table.cart td.actions .coupon .input-text,.woocommerce .woocommerce-cart-form__cart-item .quantity .qty,.gallery figure img{
  border-bottom-color:#666!important;
  border-color:#666;
}
body.top-store-dark .thunk-wishlist, .thunk-compare, .thunk-quik {
background: #1f1f1f;
}
body.top-store-dark .header-support-icon,body.top-store-dark .thunk-quik a,body.top-store-dark .thunk-wishlist a, body.top-store-dark .thunk-compare a,body.top-store-dark .summary .yith-wcwl-add-button a,.woocommerce ul.products li.product .woocommerce-loop-category__title, .woocommerce ul.products li.product .woocommerce-loop-product__title, .woocommerce ul.products li.product h3 {
color:#999;
}
body.top-store-dark .top-store-menu ul.sub-menu,body.top-store-dark .thunk-cat-tab ul.dropdown-link,body.top-store-dark ul.dropdown-link > li >a{
background:#111;
color:#999;
}
body.top-store-dark .top-store-menu li ul.sub-menu li a:hover{
background:#2f2f2f;
}
body.top-store-dark .top-store-menu > li > a,body.top-store-dark .top-store-menu li ul.sub-menu li a{
color:#999;
}
body.top-store-dark header__cat__item.dropdown a.more-cat,body.top-store-dark .thunk-slide.owl-carousel .owl-nav button.owl-prev, body.top-store-dark .thunk-slide.owl-carousel .owl-nav button.owl-next,body.top-store-dark .top-store-slide-post .owl-nav button.owl-prev, body.top-store-dark .top-store-slide-post .owl-nav button.owl-next,.th-testimonial .owl-carousel .owl-nav button.owl-prev, .th-testimonial .owl-carousel .owl-nav button.owl-next,body.top-store-dark .header__cat__item.dropdown a.more-cat{
    background: #111;
    border: 1px solid #111;
}

body.top-store-dark .menu-toggle .menu-btn span{
background-color:#999;
}
body.top-store-dark .slide-content-wrap {
    box-shadow: 0 0 15px #333;
}
body.top-store-dark .th-slide-content-wrap{
  background: #1f1f1f;
}
body.top-store-dark .th-slide-title,
body.top-store-dark .th-slide-subtitle{
  color:#fff;
}
/**************************/
/*Shop Page*/
/**************************/
.top-store-dark .page-head h1{
color:#fff;
}
.top-store-dark #shop-product-wrap select,.top-store-dark .thunk-list-grid-switcher a {
border: 1px solid #111;
background:#111;
}
.top-store-dark .thunk-list-view .thunk-product .thunk-product-hover{
background:#111;
}
.top-store-dark .thunk-list-view .thunk-product:hover .thunk-product-hover{
box-shadow:none;
}
.top-store-dark.woocommerce nav.woocommerce-pagination .page-numbers{
background:#111;
}
.top-store-dark .open-cart{
background:#1f1f1f;
}
.top-store-dark .open-cart p.total, .top-store-dark .widget p.total{
color:#fff;
}
/**************************/
/*Blog Page ,Pages and single pages*/
/**************************/
.top-store-dark article.thunk-article,.top-store-dark article.thunk-post-article, .top-store-dark.single article, .no-results.not-found, .top-store-dark #error-404,.top-store-dark article.thunk-article,.top-store-dark article.thunk-post-article, .top-store-dark .single article, .top-store-dark .no-results.not-found, .top-store-dark #error-404,.top-store-dark .thunk-page .thunk-content-wrap{
background:#1F1F1F;
}

.top-store-dark h2.thunk-post-title a, .top-store-dark h1.thunk-post-title a{
color:#fff;
}

.top-store-dark .nav-links .page-numbers{
background:#111;
}

/**************************/
/*Product single pages*/
/**************************/
.top-store-dark .thunk-single-product-summary-wrap,.top-store-dark.woocommerce div.product .woocommerce-tabs .panel,.top-store-dark .product_meta,.top-store-dark section.related.products ul.products{
background:#1f1f1f;
}

.top-store-dark.woocommerce div.product .product_title, .top-store-dark section.related.products h2, .top-store-dark section.upsells.products h2, .top-store-dark.woocommerce #reviews #comments h2{
color:#fff;
}
.top-store-dark .comment-form textarea,.top-store-dark .comment-form input,.top-store-dark input{
border-color:#111;
color: #999;
}
.top-store-dark .woocommerce-error, .top-store-dark .woocommerce-info, .top-store-dark .woocommerce-message{
background-color: #111;
    color: #999;
}
.top-store-dark .woocommerce-MyAccount-navigation ul li{
    border-bottom: 1px solid #000;
}
.top-store-dark.woocommerce-account .woocommerce-MyAccount-navigation{
background:#111;
}
.top-store-dark .ribbon-btn {
    background: #111;
  }
.thunk-loadContainer:before {
    background: #333;
  }
  .top-store-dark.woocommerce div.product form.cart .variations select{
background:#111;
color:#999;
}

.top-store-dark.woocommerce div.product div.images .woocommerce-product-gallery__wrapper .zoomImg {
    background-color: #111;
}
.top-store-dark .thunk-woo-product-list .woocommerce-loop-product__title a,.top-store-dark .th-hlight-title,
.thunk-product-list-section .thunk-list .thunk-product-content .woocommerce-LoopProduct-title,.thunk-related-links .nav-links a,body.top-store-dark h4.author-header{
color:#999;

}
.top-store-dark .thunk-list-grid-switcher a:hover{
  color:#fff;
}
.top-store-dark #alm-quick-view-modal .alm-lightbox-content,.top-store-dark #alm-quick-view-content div.summary form.cart{
background:#222;
}

.top-store-dark #alm-quick-view-content .product_meta{
    border: 1px solid #111;}

.top-store-dark .woocommerce-product-details__short-description{
border-top:1px solid #111;
} 
 .top-store-dark .search-wrapper:before {
  background:#111;
}

body.top-store-dark .thunk-aboutus-page:before{
background:#1F1F1F;
}
body.top-store-dark .ui-widget.ui-widget-content .ui-menu-item{
  background:#111;
  color: #999;
}
body.top-store-dark .ui-widget.ui-widget-content .ui-menu-item:hover{
  color: #FF0000;
}
@media screen and (max-width: 1024px){body.top-store-dark .thunk-icon .cart-icon a.cart-contents{
background:#111;
color:#999;
}

.sider.left,.sider.right{
background-color: #111; 
}

}";

}
/**************************/
// Above Header
/**************************/
    $top_store_above_brdr_clr = esc_html(get_theme_mod('top_store_above_brdr_clr','#fff'));  
    $top_store_style.=".top-header,body.top-store-dark .top-header{border-bottom-color:{$top_store_above_brdr_clr}}";
    $top_store_style.= top_store_responsive_slider_funct( 'top_store_abv_hdr_hgt', 'top_store_top_header_height_responsive');
    $top_store_style.= top_store_responsive_slider_funct( 'top_store_abv_hdr_botm_brd', 'top_store_abv_hdr_botm_brd_responsive');

/**************************/
// Above Fooetr
/**************************/
    $top_store_above_frt_brdr_clr = esc_html(get_theme_mod('top_store_above_frt_brdr_clr','#f1f1f1'));  
    $top_store_style.=".top-footer,body.top-store-dark .top-footer{border-bottom-color:{$top_store_above_frt_brdr_clr}}";
    $top_store_style.= top_store_responsive_slider_funct( 'top_store_above_ftr_hgt', 'top_store_top_footer_height_responsive');
    $top_store_style.= top_store_responsive_slider_funct( 'top_store_abv_ftr_botm_brd', 'top_store_top_footer_border_responsive');

/**************************/
// Below Fooetr
/**************************/
    $top_store_bottom_frt_brdr_clr = esc_html(get_theme_mod('top_store_bottom_frt_brdr_clr','#fff'));  
    $top_store_style.=".below-footer,body.top-store-dark .below-footer{border-top-color:{$top_store_bottom_frt_brdr_clr}}";
    $top_store_style.= top_store_responsive_slider_funct( 'top_store_btm_ftr_hgt', 'top_store_below_footer_height_responsive');
    $top_store_style.= top_store_responsive_slider_funct( 'top_store_btm_ftr_botm_brd', 'top_store_below_footer_border_responsive');
/*********************/
// Global Color Option
/*********************/
  $top_store_theme_clr = esc_html(get_theme_mod('top_store_theme_clr','#00badb'));
  $top_store_style.="a:hover, .top-store-menu li a:hover, .top-store-menu .current-menu-item a,.sticky-header-col2 .top-store-menu li a:hover,.woocommerce .thunk-woo-product-list .price,.thunk-product-hover .th-button.add_to_cart_button, .woocommerce ul.products .thunk-product-hover .add_to_cart_button,.woocommerce ul.products li.product .product_type_variable, .woocommerce ul.products li.product a.button.product_type_grouped,.thunk-compare .compare-button a:hover, .thunk-product-hover .th-button.add_to_cart_button:hover, .woocommerce ul.products .thunk-product-hover .add_to_cart_button :hover, .woocommerce .thunk-product-hover a.th-button:hover,.thunk-product .yith-wcwl-wishlistexistsbrowse.show:before, .thunk-product .yith-wcwl-wishlistaddedbrowse.show:before,.woocommerce ul.products li.product.thunk-woo-product-list .price,.summary .yith-wcwl-add-to-wishlist.show .add_to_wishlist::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse.show a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse.show a::before,.woocommerce .entry-summary a.compare.button.added:before,.header-icon a:hover,.thunk-related-links .nav-links a:hover,.woocommerce .thunk-list-view ul.products li.product.thunk-woo-product-list .price,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,.thunk-wishlist a:hover, .thunk-compare a:hover,.thunk-quik a:hover,.woocommerce ul.cart_list li .woocommerce-Price-amount, .woocommerce ul.product_list_widget li .woocommerce-Price-amount,.top-store-load-more button,.page-contact .leadform-show-form label,.thunk-contact-col .fa,
  .woocommerce .thunk-product-hover a.th-button:hover:after,ul.products .thunk-product-hover .add_to_cart_button:hover, 
.woocommerce .thunk-product-hover a.th-button:hover, 
.woocommerce ul.products li.product .product_type_variable:hover, 
.woocommerce ul.products li.product a.button.product_type_grouped:hover, 
.woocommerce .thunk-product-hover a.th-button:hover, 
.woocommerce ul.products li.product .add_to_cart_button:hover, 
.woocommerce .added_to_cart.wc-forward:hover,
ul.products .thunk-product-hover .add_to_cart_button:hover:after, 
.woocommerce .thunk-product-hover a.th-button:hover:after, 
.woocommerce ul.products li.product .product_type_variable:hover:after, 
.woocommerce ul.products li.product a.button.product_type_grouped:hover:after, 
.woocommerce .thunk-product-hover a.th-button:hover:after, 
.woocommerce ul.products li.product .add_to_cart_button:hover:after, 
.woocommerce .added_to_cart.wc-forward:hover:after,.summary .yith-wcwl-add-to-wishlist .add_to_wishlist:hover:before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistaddedbrowse a::before, .summary .yith-wcwl-add-to-wishlist .yith-wcwl-wishlistexistsbrowse a::before,.th-hlight-icon,.ribbon-btn:hover,.thunk-product .yith-wcwl-wishlistexistsbrowse:before,.woocommerce .entry-summary a.compare.button:hover:before,.th-slide-button,.th-slide-button:after,.sider.overcenter .sider-inner ul.top-store-menu li a:hover,.reply a,.single-product .product_meta a,.woosw-btn:hover:before,.woosw-added:before,.wooscp-btn:hover:before,#top-store-mobile-bar .count-item, a.th-product-compare-btn.button.btn_type.th-added-compare:before{color:{$top_store_theme_clr}} 
    
    .thunk-icon-market .cart-icon .taiowc-icon:hover,.woocommerce .entry-summary .th-product-compare-btn.btn_type.th-added-compare, .woocommerce .entry-summary a.th-product-compare-btn:before,.thunk-icon-market .cart-icon .taiowcp-icon:hover{color:{$top_store_theme_clr};}
   .thunk-icon-market .cart-icon .taiowc-cart-item:hover,.thunk-icon-market .cart-icon .taiowcp-cart-item:hover{color:{$top_store_theme_clr};}
 ";

    

if($top_store_color_scheme=='opn-dark'){
$top_store_style.="body.top-store-dark a:hover, body.top-store-dark .top-store-menu > li > a:hover, body.top-store-dark .top-store-menu li ul.sub-menu li a:hover,body.top-store-dark .thunk-product-cat-list li a:hover,body.top-store-dark #sidebar-primary .top-store-widget-content a:hover,.top-store-dark .thunk-woo-product-list .woocommerce-loop-product__title a:hover,body.top-store-dark .ribbon-btn:hover,body.top-store-dark .main-header-bar .header-icon a:hover{color:{$top_store_theme_clr}}
body.top-store-dark .ribbon-btn:hover,body.top-store-dark .header-support-content a:hover,body.top-store-dark .thunk-wishlist a:hover,body.top-store-dark .thunk-compare a:hover,body.top-store-dark .thunk-quik a:hover,body.top-store-dark .th-slide-button,body.top-store-dark .th-slide-button:after{color:{$top_store_theme_clr}!important}";
}
  $top_store_style.=".toggle-cat-wrap,#search-button,.thunk-icon .cart-icon,.single_add_to_cart_button.button.alt, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .woocommerce #respond input#submit, .woocommerce button.button, .woocommerce input.button,.cat-list a:after,.tagcloud a:hover, .thunk-tags-wrapper a:hover,.btn-main-header,.page-contact .leadform-show-form input[type='submit'],.woocommerce .widget_price_filter .top-store-widget-content .ui-slider .ui-slider-range,
.woocommerce .widget_price_filter .top-store-widget-content .ui-slider .ui-slider-handle,.entry-content form.post-password-form input[type='submit'],#top-store-mobile-bar a,
.header-support-icon,
.count-item,.nav-links .page-numbers.current, .nav-links .page-numbers:hover,.woocommerce .thunk-woo-product-list span.onsale,.top-store-site section.thunk-ribbon-section .content-wrap:before,.woocommerce .return-to-shop a.button,.widget_product_search [type='submit']:hover,.comment-form .form-submit [type='submit'],.top-store-slide-post .owl-nav button.owl-prev:hover, .top-store-slide-post .owl-nav button.owl-next:hover,body.top-store-dark .top-store-slide-post .owl-nav button.owl-prev:hover, body.top-store-dark .top-store-slide-post .owl-nav button.owl-next:hover{background:{$top_store_theme_clr}}
  .open-cart p.buttons a:hover,
  .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .woocommerce #respond input#submit:hover, .woocommerce button.button:hover, .woocommerce input.button:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button:hover, .woocommerce .woocommerce-info .button:hover, .woocommerce .woocommerce-message .button:hover,#searchform [type='submit']:hover,article.thunk-post-article .thunk-readmore.button,.top-store-load-more button:hover,.woocommerce nav.woocommerce-pagination ul li a:focus, .woocommerce nav.woocommerce-pagination ul li a:hover, .woocommerce nav.woocommerce-pagination ul li span.current,.thunk-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .thunk-slide.thunk-brand .owl-nav button:hover,.th-testimonial .owl-carousel .owl-nav button.owl-prev:hover,.th-testimonial .owl-carousel .owl-nav button.owl-next:hover,body.top-store-dark .thunk-slide .owl-nav button.owl-prev:hover,body.top-store-dark .thunk-slide .owl-nav button.owl-next:hover{background-color:{$top_store_theme_clr};} 
  .thunk-product-hover .th-button.add_to_cart_button, .woocommerce ul.products .thunk-product-hover .add_to_cart_button,.woocommerce ul.products li.product .product_type_variable, .woocommerce ul.products li.product a.button.product_type_grouped,.open-cart p.buttons a:hover,.top-store-slide-post .owl-nav button.owl-prev:hover, .top-store-slide-post .owl-nav button.owl-next:hover,body .woocommerce-tabs .tabs li a::before,.thunk-list-grid-switcher a.selected, .thunk-list-grid-switcher a:hover,.woocommerce .woocommerce-error .button, .woocommerce .woocommerce-info .button, .woocommerce .woocommerce-message .button,#searchform [type='submit']:hover,.top-store-load-more button,.thunk-top2-slide.owl-carousel .owl-nav button:hover,.product-slide-widget .owl-carousel .owl-nav button:hover, .thunk-slide.thunk-brand .owl-nav button:hover,.page-contact .leadform-show-form input[type='submit'],.widget_product_search [type='submit']:hover,.thunk-slide .owl-nav button.owl-prev:hover, .thunk-slide .owl-nav button.owl-next:hover,body.top-store-dark .thunk-slide.owl-carousel .owl-nav button.owl-prev:hover, body.top-store-dark .thunk-slide.owl-carousel .owl-nav button.owl-next:hover,body.top-store-dark .top-store-slide-post .owl-nav button.owl-prev:hover, body.top-store-dark .top-store-slide-post .owl-nav button.owl-next:hover,.th-testimonial .owl-carousel .owl-nav button.owl-prev:hover,.th-testimonial .owl-carousel .owl-nav button.owl-next:hover{border-color:{$top_store_theme_clr}} .loader {
    border-right: 4px solid {$top_store_theme_clr};
    border-bottom: 4px solid {$top_store_theme_clr};
    border-left: 4px solid {$top_store_theme_clr};}
    .site-title span a:hover,.main-header-bar .header-icon a:hover,.woocommerce div.product p.price, .woocommerce div.product span.price,body.top-store-dark .top-store-menu .current-menu-item a,body.top-store-dark .sider.overcenter .sider-inner ul.top-store-menu li a:hover{color:{$top_store_theme_clr}}";
   //text
   $top_store_text_clr = esc_html(get_theme_mod('top_store_text_clr'));
   $top_store_style.="body,.woocommerce-error, .woocommerce-info, .woocommerce-message {color: {$top_store_text_clr}}";
   //title
   $top_store_title_clr = esc_html(get_theme_mod('top_store_title_clr'));
   $top_store_style.=".site-title span a,.sprt-tel b,.widget.woocommerce .widget-title, .open-widget-content .widget-title, .widget-title,.thunk-title .title,.thunk-hglt-box h6,h2.thunk-post-title a, h1.thunk-post-title ,#reply-title,h4.author-header,.page-head h1,.woocommerce div.product .product_title, section.related.products h2, section.upsells.products h2, .woocommerce #reviews #comments h2,.woocommerce table.shop_table thead th, .cart-subtotal, .order-total,.cross-sells h2, .cart_totals h2,.woocommerce-billing-fields h3,.page-head h1 a,.woocommerce-billing-fields h3,.woocommerce-checkout h3#order_review_heading, .woocommerce-additional-fields h3,.woocommerce .wishlist-title{color: {$top_store_title_clr}}";
   //link
   $top_store_link_clr = esc_html(get_theme_mod('top_store_link_clr'));
   $top_store_link_hvr_clr = esc_html(get_theme_mod('top_store_link_hvr_clr'));
   $top_store_style.="a,#top-store-above-menu.top-store-menu > li > a{color:{$top_store_link_clr}} a:hover,#top-store-above-menu.top-store-menu > li > a:hover,#top-store-above-menu.top-store-menu li a:hover{color:{$top_store_link_hvr_clr}}";

    if($top_store_color_scheme=='opn-dark'){
    $top_store_style.="body.top-store-dark a,body.top-store-dark .thunk-product-cat-list li a,body.top-store-dark #sidebar-primary .top-store-widget-content a,body.top-store-dark .top-header-bar a, body.top-store-dark .top-footer a, body.top-store-dark .below-footer a, body.top-store-dark .widget-footer a{color:{$top_store_link_clr}}
    body.top-store-dark, .top-store-dark .woocommerce-error, .top-store-dark .woocommerce-info, .top-store-dark .woocommerce-message,body.top-store-dark .top-header-bar, body.top-store-dark .top-footer, body.top-store-dark .below-footer,  body.top-store-dark .widget-footer{color:{$top_store_text_clr}}
    body.top-store-dark .site-title span a,body.top-store-dark .sprt-tel b,body.woocommerce.top-store-dark .widget .widget-title, body.top-store-dark .open-widget-content .widget-title, body.top-store-dark .widget-title,body.top-store-dark .thunk-title .title,body.top-store-dark .thunk-hglt-box h6,body.top-store-dark h2.thunk-post-title a, body.top-store-dark h1.thunk-post-title ,body.top-store-dark #reply-title,body.top-store-dark h4.author-header,body.top-store-dark .page-head h1,body.woocommerce.top-store-dark div.product .product_title, body.top-store-dark section.related.products h2, body.top-store-dark section.upsells.products h2, body.woocommerce.top-store-dark #reviews #comments h2,body.woocommerce.top-store-dark table.shop_table thead th, body.top-store-dark .cart-subtotal,body.top-store-dark .order-total,body.top-store-dark .cross-sells h2,body.top-store-dark .cart_totals h2,body.top-store-dark .woocommerce-billing-fields h3,body.top-store-dark .page-head h1 a,body.top-store-dark .woocommerce-billing-fields h3,body.top-store-dark .woocommerce-checkout h3#order_review_heading, body.top-store-dark .woocommerce-additional-fields h3{color:{$top_store_title_clr}}";

    $top_store_style.="body.top-store-dark a:hover,body.top-store-dark .thunk-product-cat-list li a:hover,body.top-store-dark #sidebar-primary .top-store-widget-content a:hover,body.top-store-dark .top-header-bar a:hover, body.top-store-dark .top-footer a:hover, body.top-store-dark .below-footer a:hover, body.top-store-dark .widget-footer a:hover,body.top-store-dark .thunk-compare .compare-button a:hover,.top-store-dark .thunk-woo-product-list .woocommerce-loop-product__title a:hover{color:{$top_store_link_hvr_clr}}";
   }
  // loader
   $top_store_loader_bg_clr = esc_html(get_theme_mod('top_store_loader_bg_clr','#9c9c9'));
   $top_store_style.=".top_store_overlayloader{background-color:{$top_store_loader_bg_clr}}";
  /**************************/
  //Above Header Color Option
  /**************************/
   $top_store_abv_header_background_image = esc_url(get_theme_mod('header_image'));
   $top_store_above_hdr_bg_clr = esc_html(get_theme_mod('top_store_above_hdr_bg_clr',''));
   $top_store_style.= ".top-header{background-image:url($top_store_abv_header_background_image);
   } .top-header:before,body.top-store-dark .top-header:before
   {background:{$top_store_above_hdr_bg_clr}}";
   /**************************/
   //Main Header Color Option
   /**************************/
   $top_store_main_hdr_bg_clr  = esc_html(get_theme_mod('top_store_main_hdr_bg_clr',''));
   $top_store_main_hdr_txt_clr = esc_html(get_theme_mod('top_store_main_hdr_txt_clr','#fff'));
   $top_store_style.= ".main-header:before,body.top-store-dark .main-header:before{
   background:{$top_store_main_hdr_bg_clr};}.site-title span a,.main-header-bar .header-icon a,.main-header-bar .thunk-icon-market .cart-contents,.th-whishlist-text, .account-text:nth-of-type(1){color:{$top_store_main_hdr_txt_clr};}
   .thunk-icon-market .cart-icon .taiowc-icon,.thunk-icon-market .taiowc-icon .th-icon,.thunk-icon-market .cart-icon .taiowcp-icon,.thunk-icon-market .taiowcp-icon .th-icon{color:{$top_store_main_hdr_txt_clr};}
   .thunk-icon-market .cart-icon .taiowc-cart-item,.thunk-icon-market .taiowc-content .taiowc-total,.thunk-icon-market .cart-icon .taiowcp-cart-item,.thunk-icon-market .taiowcp-content .taiowcp-total{color:{$top_store_main_hdr_txt_clr};}
    body.top-store-dark .site-title span a,body.top-store-dark .main-header-bar,body.top-store-dark .main-header-bar .header-icon a,body.top-store-dark .main-header-bar .thunk-icon-market .cart-contents,body.top-store-dark .th-whishlist-text,body.top-store-dark .account-text:nth-of-type(1){color:{$top_store_main_hdr_txt_clr};}
   ";

/*************************/
// Front page-head
/************************/
//ribbon 
   $top_store_ribbon_bg_img_url             = esc_url(get_theme_mod('top_store_ribbon_bg_img_url',''));
   $top_store_ribbon_bg_background_repeat   = esc_html(get_theme_mod('top_store_ribbon_bg_background_repeat','no-repeat'));
   $top_store_ribbon_bg_background_size     = esc_html(get_theme_mod('top_store_ribbon_bg_background_size','auto'));
   $top_store_ribbon_bg_background_position = esc_html(get_theme_mod('top_store_ribbon_bg_background_position','center center'));
   $top_store_ribbon_bg_background_attach   = esc_html(get_theme_mod('top_store_ribbon_bg_background_attach','scroll'));
   $top_store_style.="section.thunk-ribbon-section .content-wrap{
    background-image:url($top_store_ribbon_bg_img_url);
    background-repeat:{$top_store_ribbon_bg_background_repeat};
    background-size:{$top_store_ribbon_bg_background_size};
    background-position:{$top_store_ribbon_bg_background_position};
    background-attachment:{$top_store_ribbon_bg_background_attach};}"; if ($top_store_ribbon_bg_img_url != '') {
      $top_store_style.="
      .top-store-site section.thunk-ribbon-section .content-wrap:before{
        background:{$top_store_theme_clr};
        opacity:0.4;
      }
      ";
    }
//Hide yith if WPC SMART Icon 
if( (class_exists( 'YITH_WCWL' )) ){
$top_store_style.=" .woocommerce .entry-summary .woosw-btn{
  display:none;
}";
}elseif((class_exists( 'WPCleverWoosw' ))){
$top_store_style.=" .woocommerce .entry-summary .yith-wcwl-add-to-wishlist{
  display:none;
}";
}

if( (class_exists( 'YITH_Woocompare' )) ){
$top_store_style.=" .woocommerce .entry-summary .woosc-btn{
  display:none;
}";
}elseif((class_exists( 'WPCleverWoosc' ))){
$top_store_style.=" .woocommerce .entry-summary a.compare.button{
  display:none;
}";
}

    //Move to Top
    $top_store_move_to_top_bg_clr = esc_html(get_theme_mod('top_store_move_to_top_bg_clr','#141415'));
    $top_store_move_to_top_icon_clr = esc_html(get_theme_mod('top_store_move_to_top_icon_clr','#fff'));
      $top_store_style.="#move-to-top{
        background:{$top_store_move_to_top_bg_clr};
        color:{$top_store_move_to_top_icon_clr};
      }
                        ";
  
return $top_store_style;
}
//start logo width
function top_store_logo_width_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.thunk-logo img,.sticky-header .logo-content img{
    max-width: ' . $v3 . 'px;
  }';
  $custom_css = top_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
// top header height
function top_store_top_header_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header .top-header-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = top_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function top_store_abv_hdr_botm_brd_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-header{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = top_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// top footer height
function top_store_top_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer .top-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = top_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function top_store_top_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.top-footer{
    border-bottom-width: ' . $v3 . 'px;
  }';
  $custom_css = top_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}

// below footer height
function top_store_below_footer_height_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer .below-footer-bar{
    line-height: ' . $v3 . 'px;
  }';
  $custom_css = top_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}
function top_store_below_footer_border_responsive( $value, $dimension = 'desktop' ){
    $custom_css = '';
    switch ( $dimension ){
    case 'desktop':
      $v3 = $value;
      break;
    case 'tablet':
      $v3 = $value;
      break;
    case 'mobile':
      $v3 = $value;
      break;
  }
  $custom_css .= '.below-footer{
    border-top-width: ' . $v3 . 'px;
  }';
  $custom_css = top_store_add_media_query( $dimension, $custom_css );
  return $custom_css;
}