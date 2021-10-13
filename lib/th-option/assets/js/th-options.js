
function openTab(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " active";
}


(function($){

    NovelliteAdmin = {
        init: function(){
            this._bind();
        },

        _loaderActive: function($class,$message = "Installing") {
             $class.addClass('updating-message').html($message);
            $class.removeClass( 'button-primary' ).addClass( 'disabled' );
        },
        _homePageSetup: function() {
            // home page settings
            $class = jQuery('.default-home');
            NovelliteAdmin._loaderActive($class,"Home Page Setup");
            var data = {
                'action': 'default_home',
                'home': 'saved'
            };
            jQuery.post(ajaxurl, data, function(response) {
                setTimeout(function() {

                $class.removeClass( 'updating-message disabled' )
                .addClass( 'button-primary activated' )
                .html( 'Home Page Activated');
                    jQuery('.default-home').css('background','#278d27');
                               // location.reload(true);
                }, 1000);

            });
        },

        _installNow: function( event ) {
             $document   = jQuery(document);
              var slug = $(this).data('slug'); 
            var $message = $( '.install-now.'+slug);

                if ( wp.updates.shouldRequestFilesystemCredentials && ! wp.updates.ajaxLocked ) {
                    wp.updates.requestFilesystemCredentials( event );
                    $document.on( 'credential-modal-cancel', function() {
                        var $message = $( '.install-now' );

                        $message.text( wp.updates.l10n.installNow );

                        wp.a11y.speak( wp.updates.l10n.updateCancel, 'polite' );
                    } );
                }
                 wp.updates.installPlugin( {
                    slug:  $message.data('slug'),
                    init:  $message.data('init'),
                } );
        },
        /*
         * Plugin Installation Error.
         */
        _installError: function( event, response ){
            var $card = jQuery( '.install-now');
            $card.removeClass( 'button-primary' )
                .addClass( 'disabled' )
                .html( wp.updates.l10n.installFailedShort );
                    console.log(response.errorMessage);
        },

        /**
         * Installing Plugin
         */
        _pluginInstalling: function(event, args){
            event.preventDefault();
            var $card = jQuery( '.'+args.slug);
            var $button = $card.find( '.button-primary' );
            $button.removeClass( 'install-now button-primary installed button-disabled updated-message' );

            $card.addClass('updating-message').html('Installing Plugin');
            $button.addClass('already-started');
        },

        /**
         * Plugin activation
         */
        _activetedPlugin: function(event, args){
                event.preventDefault();
                var $card = jQuery( '.'+args.slug);
                NovelliteAdmin._activePluginHomepage(args.slug,$card.data('init'));
        },
        /**
         * Plugin & Homepage Activation
         */
        _activePluginHomepage: function($slug,$init){
            var $message = jQuery( '.'+$slug);
                $message.removeClass( 'install-now button-primary installed button-disabled updated-message' )
                .addClass('updating-message')
                .html($message.data('msg'));

            $.ajax({
                url  : ajaxurl,
                type : 'POST',

                data : {
                    action : 'th_activeplugin',
                    init   :  $init,
                    slug   :  $slug
                }
            }).done(function ( response ){

            	if( response.success) {
                 $message.removeClass( 'button-primary updating-message' )
                .addClass( 'disabled' )
                .html( 'Plugin Activated');

					} else {

						$message.removeClass( 'updating-message' );

					}

            });
        },
        /**
         * Plugin activation
         */
        _activePlugin: function(event){
                var $button = jQuery( event.target ),
                $init   = $button.data( 'init' ),
                $slug   = $button.data( 'slug' );
                NovelliteAdmin._activePluginHomepage($slug,$init);
            },
        _bind: function(){               
            $( document ).on('click'                     , '.default-home', NovelliteAdmin._homePageSetup);
            $( document ).on('click'                     , '.install-now', NovelliteAdmin._installNow);
            $( document ).on('click'                     , '.activate-now', NovelliteAdmin._activePlugin);
            $( document ).on('wp-plugin-install-error'   , NovelliteAdmin._installError);
            $( document ).on('wp-plugin-installing'      , NovelliteAdmin._pluginInstalling);
            $( document ).on('wp-plugin-install-success' , NovelliteAdmin._activetedPlugin);  
        },


};
NovelliteAdmin.init();
/**
         * TABS
         */
             function _plugins_tabs() {
                        $('.tabs-list a').click(function(){
                         $('.panel').hide();
                         $('.tabs-list a.active').removeClass('active');
                         $(this).addClass('active');
                         var panel = $(this).attr('href');
                         $(panel).fadeIn();
                         return false;  // prevents link action
                          });  // end click
                         $('.tabs-list a:first').click();
               
        }
             $(document).ready(function() {
            _plugins_tabs();
             });

})(jQuery);