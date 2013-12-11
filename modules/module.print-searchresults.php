<?php


add_action('bbp_theme_before_topic_form_title' , 'bbpress_livesearch_print_search_results' , 12 );
function bbpress_livesearch_print_search_results()
{
	echo "<div id='bbpress_livesearch'></div>";
}