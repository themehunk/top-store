/********************************/
// TopStoreWooLib Custom Function
/********************************/
(function ($) {
    var TopStoreWooLib = {
        init: function (){
            this.bindEvents();
        },
        bindEvents: function (){
            var $this = this;
            $this.listGridView();
            $this.cartDropdown();
            $this.AddtoCartQuanty();
            $this.AutoCompleteSearch();  
          },
        listGridView: function (){
            var wrapper = $('.thunk-list-grid-switcher');
            var class_name = '';
            wrapper.find('a').on('click', function (e){
              e.preventDefault();
                var type = $(this).attr('data-type');
                switch (type){
                    case "list":
                        class_name = "thunk-list-view";
                        break;
                    case "grid":
                        class_name = "thunk-grid-view";
                        break;
                    default:
                        class_name = "thunk-grid-view";
                        break;
                }
                if (class_name != ''){
                    $(this).closest('#shop-product-wrap').attr('class', '').addClass(class_name);
                    $(this).closest('.thunk-list-grid-switcher').find('a').removeClass('selected');
                    $(this).addClass('selected');
                }
              
            });
        },
        
       cartDropdown: function (){
           /* woo, wc_add_to_cart_params */
              if ( typeof wc_add_to_cart_params === 'undefined' ){
               return false;
              }
              $( document ).on( 'click', '.ajax_add_to_cart', function(e){ // Remove button selector
                 e.preventDefault();
                var data1 = {
                 'action': 'top_store_product_count_update'
                };
                 $.post(
                 woocommerce_params.ajax_url, // The AJAX URL
                 data1, // Send our PHP function
                 function(response_data){
                 $('a.cart-content').html(response_data);
                 }
               );
             });
          // Ajax remove cart item
               $( document ).on( 'click', 'a.remove', function(e){ // Remove button selector
               e.preventDefault();
          // AJAX add to cart request
              var $thisbutton = $( this );
              if ( $thisbutton.is( '.remove' ) ){
                //Check if the button has a product ID
               if ( ! $thisbutton.attr( 'data-product_id' ) ){ 
              return true;
               }
            }
              $product_id = $thisbutton.attr( 'data-product_id' );
              var data = {'product_id':$product_id,
             'action': 'top_store_product_remove'
            };
            $.post(
            woocommerce_params.ajax_url, // The AJAX URL
            data, // Send our PHP function
            function(response){
            $('.top-store-quickcart-dropdown').html(response);
            var data = {
           'action': 'top_store_product_count_update'
            };
           $.post(
           woocommerce_params.ajax_url, // The AJAX URL
           data, // Send our PHP function
           function(response_data){
           $('.cart-content').html(response_data);
           }
         );
       }
   );
      return false;
  });
},  
       AddtoCartQuanty: function (){
                $('form.cart').on( 'click', 'button.plus, button.minus', function(){
                // Get current quantity values
                var qty = $( this ).siblings('.quantity').find( '.qty' );
                var val = parseFloat(qty.val()) ? parseFloat(qty.val()) : '0';
                var max = parseFloat(qty.attr( 'max' ));
                var min = parseFloat(qty.attr( 'min' ));
                var step = parseFloat(qty.attr( 'step' ));
                // Change the value if plus or minus
                if ( $(this).is( '.plus' ) ) {
                    if ( max && ( max <= val ) ) {
                        qty.val( max );
                    } else {
                        qty.val( val + step );
                    }
                } else {
                    if ( min && ( min >= val ) ) {
                        qty.val( min );
                    } else if ( val > 1 ) {
                        qty.val( val - step );
                    }
                }
                 
            });

        },
        
        AutoCompleteSearch:function(){
               /*var searchRequest;
                   $('.search-autocomplete').autocomplete({
                   classes: {
                       "ui-autocomplete" : "ui-my-class"
                   },
                   minChars:3,
                   source: function( request, response, term){
                   var matcher = $.ui.autocomplete.escapeRegex( request.term );
                  $.ajax({
                      type: 'POST',
                      dataType: 'json',
                      url: topstore.ajaxUrl,
                      data: {
                       action :'top_store_search_site',
                       'match':matcher,                
                       },
        success: function(res){
              response(res.data);
         },
        
      });
    }
  });*/


  var cat ='';
                   $('.search-autocomplete').autocomplete({
                   classes: {
                       "ui-autocomplete" : "th-wp-auto-search",   
                   }, 
                   minLength:1,
                   source: function( request, response, term){
                    var matcher = $.ui.autocomplete.escapeRegex( request.term );
                    if($("#product_cat").val()){
                      var cat = $("#product_cat").val();
                    }else{
                      var cat = '0';
                    }
                    
                    
                    $(".search-autocomplete").removeClass("ui-autocomplete-loading");
                    $("#search-box #search-button").addClass("ui-autocomplete-loading"); 
                    $.ajax({
                      type: 'POST',
                      dataType: 'json',
                      url: topstore.ajaxUrl,
                      data: {
                      action :'top_store_search_site',
                       'match':matcher,  
                       'cat':cat,              
                       },
                      success: function(res){ 
                        if(res.data.length!== 0){
                        var oldFn = $.ui.autocomplete.prototype._renderItem;
                        $.ui.autocomplete.prototype._renderItem = function( ul, item){
                            var re = new RegExp(this.term, "ig") ;
                            var t = item.label.replace(re,"<span style='font-family:JosefinSans-Bold; color:#fe696a;'>" + this.term + "</span>");
                            return $( "<li></li>" )
                                .data( "item.autocomplete", item )
                                .append( "<a href=" + item.link + "><div class='srch-prd-img'>" + item.imglink + "</div><div class='srch-prd-content'><span class='title'>" + t + "</span><span class='price'>" + item.price + "</spn></div></a>" )
                                .appendTo( ul );

                        }
                      }else{
                         $.ui.autocomplete.prototype._renderItem = function( ul, item){
                         return $( "<li></li>" )
                                .data( "item.autocomplete", item )
                                .append( "<div class='no-result-msg'>No Result Found</div>" )
                                .appendTo( ul );
                              }

                      };
                        response(res.data.slice(0, 5));   
                        if(res.data.length > 5){
                        var href = window.location.href;
                        var index = href.indexOf('/wp-admin');
                        var homeUrl = href.substring(0, index);
                        var serachurl = homeUrl + '?s='+ matcher +'&product_cat='+cat+'&post_type=product';
                        $(".th-wp-auto-search").append('<a href="'+ serachurl +'" class="search-bar__view-all" >View all results</a>');
                       }
                        $(".search-autocomplete").removeClass("ui-autocomplete-loading");
                        $(".woocommerce-product-search #search-button").removeClass("ui-autocomplete-loading"); 
                      
                      },

                    });
                  },
                  response: function(event, ui){
                          if (ui.content.length == 0){
                              var noResult = { value:"",label:"",imglink:"",price:"" }; 
                              ui.content.push(noResult);  
                              
                          }
                      },
                }).bind('focus change', function(){ 
                   $(this).autocomplete("search");
                   } 
                );




},
      }
    TopStoreWooLib.init();
})(jQuery);