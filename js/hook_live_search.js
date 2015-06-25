jQuery( document ).ready( function( $ ) {

	$( function() {

		var liveSearch = $( "#bbpress_livesearch" );

		$( "#bbp_topic_title" ).livesearch();

		liveSearch.parents( "form" ).on( "livesearch:results", function( e, results ) {
			var html, count;

			liveSearch.empty();

			if ( !$.isEmptyObject( results ) ) {
				liveSearch.append( bbpress_livesearch.beforehtml );
			}

			count = 0;

			for ( result in results ) {
				if ( results.hasOwnProperty( result ) ) {
					if ( count >= bbpress_livesearch.postlimit ) {
						break;
					}

					html = "<span id='bbpress_liveresult_item'><a href='" + results[result].url + "' class='bbp-topic-permalink'>" + results[result].name + "</a></span><br>";
					liveSearch.append( html );

					count++;
				}
			}

			if ( !$.isEmptyObject( results ) ) {
				liveSearch.append( bbpress_livesearch.afterhtml );
			}
		} );
	} );
} );
