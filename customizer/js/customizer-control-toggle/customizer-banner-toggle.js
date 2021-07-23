/*************************************/
// Banner Hide N Show control
/*************************************/
( function( $ ){
TOPControlTrigger.addHook( 'top-store-toggle-control', function( argument, api ){
OPNCustomizerToggles ['top_store_banner_layout'] = [
		     

		     {
				controls: [    
				'top_store_bnr_1_img',
				'top_store_bnr_1_url',
				'top_store_bnr_2_img',
				'top_store_bnr_2_url',
				'top_store_bnr_3_img',
				'top_store_bnr_3_url',
				'top_store_bnr_4_img',
				'top_store_bnr_4_url',
				'top_store_bnr_5_img',
				'top_store_bnr_5_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'top_store_bnr_1_img',
				'top_store_bnr_1_url',
				'top_store_bnr_2_img',
				'top_store_bnr_2_url',
				'top_store_bnr_3_img',
				'top_store_bnr_3_url',
				'top_store_bnr_4_img',
				'top_store_bnr_4_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-five' ||  layout=='bnr-four'){
					return true;
					}else{
					return false;	
					}
				}
			},	
		    {
				controls: [    
				'top_store_bnr_1_img',
				'top_store_bnr_1_url',
				'top_store_bnr_2_img',
				'top_store_bnr_2_url',
				'top_store_bnr_3_img',
				'top_store_bnr_3_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'top_store_bnr_1_img',
				'top_store_bnr_1_url',
				'top_store_bnr_2_img',
				'top_store_bnr_2_url',
				
				],
				callback: function(layout){
					if(layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five'){
					return true;
					}else{
					return false;	
					}
				}
			},	
			{
				controls: [    
				'top_store_bnr_1_img',
				'top_store_bnr_1_url',	
				],
				callback: function(layout){
					if(layout=='bnr-one' || layout=='bnr-two'|| layout=='bnr-three' || layout=='bnr-four' || layout=='bnr-five'){
					return true;
					}else{
					return false;	
					}
				}
			},	
				
		];	
	});
})( jQuery );