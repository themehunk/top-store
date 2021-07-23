( function( $ ) {
//**********************************/
// Slider settings
//**********************************/
TOPControlTrigger.addHook( 'top-store-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['top_store_cat_slide_layout'] = [
		    {
				controls: [    
				'top_store_category_slider_optn', 
				],
				callback: function(layout){
					if(layout =='cat-layout-1'){
					return true;
					}
					return false;
				}
			},	
				
			
			 
		];	
    });
})( jQuery );