<?php
/*
Plugin Name: bbPress - Live Search
Plugin URI: http://www.hudsonatwell.co
Description: Auto suggest related topics based on user's new topic title. Uses tag regongnition to return results. For best results please use with an auto-tagging plugin.
Version: 1.0.1
Author: Hudson Atwell
Author URI: http://www.hudsonatwell.co
*/

/* 
---------------------------------------------------------------------------------------------------------
- Define constants & include core files
---------------------------------------------------------------------------------------------------------
*/ 

define('BBPRESS_LIVESEARCH_CURRENT_VERSION', '1.0.1' );
define('BBPRESS_LIVESEARCH_LABEL' , 'bbPress Live Search' );
define('BBPRESS_LIVESEARCH_SLUG' , plugin_basename( dirname(__FILE__) ) );
define('BBPRESS_LIVESEARCH_URLPATH', WP_PLUGIN_URL.'/'.plugin_basename( dirname(__FILE__) ).'/' );
define('BBPRESS_LIVESEARCH_PATH', WP_PLUGIN_DIR.'/'.plugin_basename( dirname(__FILE__) ).'/' );

/* load core files */
switch (is_admin()) :
	case true : 
		/* loads admin files */	
		include_once('modules/module.settings.php');		
		
		BREAK;
	case false :
		/* loads frontend files */		
		include_once('modules/module.print-searchresults.php');	
		include_once('modules/module.get-data.php');	
		include_once('modules/module.enqueue.php');	
		
		BREAK;
endswitch;


