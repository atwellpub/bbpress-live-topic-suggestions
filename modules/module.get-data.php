<?php

/* this action runs before other plugins are loaded, will be good for a ajax call */
add_action('init' , 'bbpress_livesearch_return_data' , 1 );
function bbpress_livesearch_return_data()
{
	$debug = 0;

	if (!isset($_GET['bbpress_livesearch'])&&$debug!=1)
		return;
	
	global $wpdb;

	
	
	$title = $_GET['bbp_topic_title'];	


	/* First do a title search */
	$topics = $wpdb->get_results('SELECT * FROM '.$wpdb->posts.' WHERE post_title LIKE "%' . mysql_real_escape_string(trim($title)) .'%" AND post_type="topic" AND post_status="publish"' );          
	
	/* Next lets do a tag search if title search doesn't yeild results */
	if (!$topics)
	{
		$topic_tags = get_terms('topic-tag');
		
		foreach ($topic_tags as $tid => $tag)
		{
			$tags[$tag->term_id] = $tag->name;
		}
		
		//print_r($tags);
		
		
		$tag_matches = bbpress_livesearch_stristr_array( $title , $tags );
		
		$args = array(
			'post_type' => 'topic' ,
			'showposts' => -1 , 
			'tax_query' => array(
				array(
					'taxonomy' => 'topic-tag',
					'field' => 'term_id',
					'terms' => $tag_matches
				)
			)
		);
		
		$topics = get_posts( $args );
	}
	
	/* Compile results into array*/
	foreach ($topics as  $topic)
	{
		$topic_matches[$topic->ID]['name'] = $topic->post_title;
		$topic_matches[$topic->ID]['url'] = get_post_permalink($topic->ID);
	}
	
	if (!is_array($topic_matches))
		$topic_matches = array();
	
	/* check to see if any results were recorded by earlier typing */
	$transient_data = set_transient('bbpress_livesearch_id_'.$_GET['bbpress_livesearch_id'] , $topic_matches);
	
	/* merge transient data with new results */
	if (is_array($transient_data))
		$topic_matches = array_unique(array_merge($topic_matches,$transient_data), SORT_REGULAR);
		
	/* set new transient data */
	if (isset($topic_matches) && count($topic_matches)>0)
		set_transient('bbpress_livesearch_id_'.$_GET['bbpress_livesearch_id'] , 10);
	
	echo json_encode($topic_matches);
	
	exit;
}

function bbpress_livesearch_stristr_array( $haystack, $needles ) {
	
	$elements = array();

	
	foreach ( $needles as $id => $needle ) 
	{
		if ( stristr( $haystack, $needle ) ) 
		{
			$elements[] = $id;
		}
	}
	
	return $elements;
}