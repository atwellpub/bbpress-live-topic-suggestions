<?php
/*
Plugin Name: bbPress - Live Topic Suggestions
Plugin URI: https://github.com/atwellpub/bbpress-live-topic-suggestions
Description: Auto suggest related topics based on user's new topic title. Uses tag regongnition & title searches to return results. For best results please use with an auto-tagging plugin.
Version: 1.0.9
Author: Hudson Atwell,japh,salbahra
Author URI: http://www.twitter.com/atwellpub
*/ 
 
/*
---------------------------------------------------------------------------------------------------------
- Define constants & include core files
---------------------------------------------------------------------------------------------------------
*/

define('BBPRESS_LIVESEARCH_CURRENT_VERSION', '1.0.9' );
define('BBPRESS_LIVESEARCH_LABEL' , 'bbPress Live Topic Suggestions' );
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


