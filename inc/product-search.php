<?php
function top_store_product_search_box($cate = true)
{
    $has_category = $cate ? "has_category" : '';
    $html = '';
    $html .= '<div class="thmk-woocommerce-search-wrap ' . $has_category . '">'; //wrap 
    $html .= '<div class="search-container">'; //container 
    $html .= '<div class="thmk-woocommerce-search-wrap-input">'; //input
    $html .= '<input type="text" name="product-search-text" placeholder="' . esc_attr(get_theme_mod("search_box_text", "Search for Product"), "top-store") . '">';
    $html .= '</div>'; //input
    if ($cate) {
        $args = array(
            'taxonomy' => 'product_cat',
            'name' => 'product_cat',
            'orderby'    => 'menu_order',
            'value_field' => 'slug',
            'class' => 'thmk-woocommerce-select',
            'show_option_all'   => __('All Category', 'top-store'),
            'echo' => false
        );
        $html .= '<div class="thmk-woocommerce-search-wrap-select">'; //select
        $html .= wp_dropdown_categories($args);
        $html .= '</div>'; //select
    }
    $html .= '<div class="thmk-woocommerce-search-wrap-submit">'; //submit
    $html .= '<button id="search-button" data-url="' . esc_url(home_url('/')) . '"><i class="fa fa-search" aria-hidden="true"></i></button>';
    $html .= '</div>'; //submit
    $html .= "</div>"; //container
    $html .= '<div class="thmk-woocommerce-search-result">';
    $html .= "<ul></ul>";
    $html .= '</div>';

    $html .= "</div>"; //wrap
    return $html;
}
// -----------------------------------------------------------------------------------