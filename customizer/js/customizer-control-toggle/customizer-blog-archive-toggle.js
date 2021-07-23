/*************************************/
// Blog Archive Hide and Show control
/*************************************/
( function( $ ){
TOPControlTrigger.addHook( 'top-store-toggle-control', function( argument, api ){
OPNCustomizerToggles ['top_store_blog_post_content'] = [
		    {
				controls: [    
				'top_store_blog_expt_length',
				'top_store_blog_read_more_txt',
				],
				callback: function(layout){
					if(layout=='full'|| layout=='nocontent'){
					return false;
					}
					return true;
				}
			},	
		];	
	});
})( jQuery );