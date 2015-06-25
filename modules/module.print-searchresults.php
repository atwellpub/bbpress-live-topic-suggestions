<?php


add_action('bbp_theme_before_topic_form_title' , 'bbpress_livesearch_print_search_results' , 12 );
function bbpress_livesearch_print_search_results()
{
	echo "<style>#bbpress_livesearch:empty{border:0}</style>";
	echo "<div id='bbpress_livesearch' class='bbp-template-notice info'></div>";
}
