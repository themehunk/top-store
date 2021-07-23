/*****************************************************************************/
/**********************customizer control setting*************************/
/*****************************************************************************/
( function( $ ) {
//**********************************/
// Footer widget hide and show settings
//**********************************/
TOPControlTrigger.addHook( 'top-store-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['top_store_bottom_footer_widget_layout'] = [
			{
				controls: [
					
					
					'top_store_bottom_footer_widget_redirect',
				],
				callback: function(layout){
					if ('ft-wgt-none'== layout){
						return false;
					}
					return true;
				}
			},
				
		];	
 });
})( jQuery );