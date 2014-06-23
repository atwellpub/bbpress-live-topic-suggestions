jQuery(document).ready(function($) {

	jQuery(function() {
	
		jQuery('#bbp_topic_title').livesearch();
		
		jQuery('form[name="new-post"]').bind('livesearch:results', function(e, results) {
			
			jQuery('#bbpress_livesearch').empty();
			
			jQuery('#bbpress_livesearch').append(bbpress_livesearch.beforehtml);			
		
			jQuery.each(results, function() {
					this_html = '<span id="bbpress_liveresult_item"><a href="'+this['url']+'" class="bbp-topic-permalink">'+this['name']+'</a></span><br>';
					jQuery('#bbpress_livesearch').append(this_html);
			});
			
			jQuery('#bbpress_livesearch').append(bbpress_livesearch.afterhtml);
			
		});
	});

});