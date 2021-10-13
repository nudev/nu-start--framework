<?php
/**
 * 
 */
require_once(  get_template_directory() . '/functions/utilities.php');

/**
 * 		enqueues scripts / styles
 * 		cleans wp_head
 * 		...
 */
require_once(  get_template_directory() . '/classes/setup-theme.php');

/**
 * 		creates the theme settings
 * 		google maps api key
 * 		...
 * 
 * 		TODO: this really needs a lot of work
 */
// require_once(  get_template_directory() . '/classes/nu-start.php');
require_once(  get_template_directory() . '/classes/nu-starter.php');

/**
 * 
 * 		register all the option pages we will use for theme-settings
 * 
 */
require_once(  get_template_directory() . '/functions/options-pages.php');

/**
 * 		TBD: brief explainer
 * 
 */
require_once(  get_template_directory() . '/classes/content-types.php');


/**
 * 		registers our block styles, pattern categories, block categories
 * 		enqueues some block assets
 * 		handles some filters / utilities specifically related to blocks
 */
require_once(  get_template_directory() . '/functions/gutenberg.php');

/**
 * 		TBD: brief explainer
 * 
 */
require_once(  get_template_directory() . '/classes/acf-blocks.php');

/**
 * 		PIM Sync and auto-create posts
 * 
 */
require_once(  get_template_directory() . '/classes/pim-handler.php'); 			

// 
?>