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
            $this.AddtoCartQuanty();
            $this.belowfooter();
            $this.singleProductGalleryHeight();
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
        belowfooter:function(){
            jQuery("footer .below-footer,footer .below-footer-bar,.below-footer-col1,footer .container,.footer-copyright").attr('style', 'display: block !important');
            jQuery(".footer-copyright a,.footer-copyright span").attr('style', 'display: inline-block !important');
            jQuery(".below-footer-bar").attr('style', 'display: flex !important');
        },

            singleProductGalleryHeight: function () {

    var $window = $(window);

    function setFlexNavHeight() {

        // Apply only above 768px
        if ($window.width() <= 768) {
            $('.woocommerce-product-gallery .flex-control-nav').css('max-height', '');
            return;
        }

        var $viewport = $('.woocommerce-product-gallery .flex-viewport');
        var $nav = $('.woocommerce-product-gallery .flex-control-nav');

        if ($viewport.length && $nav.length) {
            var viewportHeight = $viewport.outerHeight();
            $nav.css('max-height', viewportHeight + 'px');
        }
    }

    // Run after images & flexslider are fully loaded
    $window.on('load', function () {
        setFlexNavHeight();
    });

    // Recalculate on resize
    $window.on('resize', function () {
        setFlexNavHeight();
    });
},

      }
    TopStoreWooLib.init();
})(jQuery);