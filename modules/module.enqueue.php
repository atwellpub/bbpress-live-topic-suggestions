<?php

class BBPRESS_LIVESEARCH_ENQUEUE {

	public function __construct() {
		add_action('wp_enqueue_scripts', array ( $this , 'enqueue_scripts' ) );
	} 

	
	function enqueue_scripts($hook)
	{
		global $post;
		
		if (isset($post)&&$post->post_type=='forum')
		{
			wp_enqueue_script( 'bbpress_livesearch_core', BBPRESS_LIVESEARCH_URLPATH . 'js/jquery-livesearch-master/src/jquery.livesearch.js', array( 'jquery'));
			
			
			$before_html = $hours = get_option('_bbp_livesearch_beforehtml','<h3 class="bbpress_livesearch_header">Check out these topics first!</h3>');
			$after_html = $hours = get_option('_bbp_livesearch_afterhtml','<br><br>');			
			wp_enqueue_script( 'bbpress_livesearch_frontend', BBPRESS_LIVESEARCH_URLPATH . 'js/hook_live_search.js', array( 'jquery'));
			 wp_localize_script( 'bbpress_livesearch_frontend', 'bbpress_livesearch', array( 'beforehtml' => $before_html , 'afterhtml' => $after_html ));
		}
	}
	
} 

// instantiate our plugin's class
$GLOBALS['bbpress_livesearch_enqueue'] = new BBPRESS_LIVESEARCH_ENQUEUE();

