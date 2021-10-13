<?php
/**
 * 
 */
// 


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NU_Gutenberg_Block_Patterns
{
	
	/**
	 * This plugin's instance.
	 *
	 * @var NU_Gutenberg_Block_Patterns
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 *
	 * @return NU_Gutenberg_Block_Patterns
	 */
	public static function _init() {
		if ( null === self::$instance ) {
			self::$instance = new NU_Gutenberg_Block_Patterns();
		}

		return self::$instance;
	}
}



NU_Gutenberg_Block_Patterns::_init();



// 
?>