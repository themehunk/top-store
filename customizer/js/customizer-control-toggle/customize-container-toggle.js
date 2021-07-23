/*********************************/
// Sidebar hide and show control
/*********************************/
( function( $ ){
TOPControlTrigger.addHook( 'top-store-toggle-control', function( argument, api ){
OPNCustomizerToggles ['top_store_default_container'] = [
		    {
				controls: [    
				'top_store_conatiner_maxwidth',
				'top_store_conatiner_top_btm',
				],
				callback: function(layout){
					if(layout=='fullwidth'){
					return false;
					}
					return true;
				}
			},
			{
				controls: [    
				'top_store_conatiner_width',  
				],
				callback: function(layout){
					if(layout =='boxed'){
					return false;
					}
					return true;
				}
			},		
		];
	});
})( jQuery );