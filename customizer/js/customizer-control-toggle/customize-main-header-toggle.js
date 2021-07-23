/****************/
// Main header	
/****************/
( function( $ ) {
//**********************************/
// Main Header settings
//**********************************/
TOPControlTrigger.addHook( 'top-store-toggle-control', function( argument, api ){
		OPNCustomizerToggles ['top_store_main_header_option'] = [
		    {
				controls: [    
				'top_store_main_hdr_btn_txt', 
				'top_store_main_hdr_btn_lnk',
				'top_store_main_hdr_calto_txt',
				'top_store_main_hdr_calto_nub',
				'top_store_main_hdr_calto_email',
				'top_store_main_header_widget_redirect'
				],
				callback: function(headeroptn){
					if (headeroptn =='none'){
					return false;
					}
					return true;
				}
			},	
			 {
				controls: [    
				'top_store_main_hdr_btn_txt', 
				'top_store_main_hdr_btn_lnk',
				],
				callback: function(layout){
					if(layout=='button'){
					return true;
					}
					return false;
				}
			},
			 {
				controls: [    
				'top_store_main_hdr_calto_txt',
				'top_store_main_hdr_calto_nub',
				'top_store_main_hdr_calto_email',
				],
				callback: function(layout){
					if(layout=='callto'){
					return true;
					}
					return false;
				}
			},
			{
				controls: [    
				'top_store_main_header_widget_redirect'
				],
				callback: function(layout){
					if(layout=='widget'){
					return true;
					}
					return false;
				}
			},
			 
		];	
		OPNCustomizerToggles ['top_store_sticky_header'] = [
		    {
				controls: [    
				'top_store_sticky_header_effect', 
				],
				callback: function(headeroptn){
					if (headeroptn == true){
					return true;
					}
					return false;
				}
			},	
		];	
    });
})( jQuery );