<?php
/**
 * 
 */
// 


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NU_Gutenberg_Block_Assets
{
	
	/**
	 * This plugin's instance.
	 *
	 * @var NU_Gutenberg_Block_Assets
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 *
	 * @return NU_Gutenberg_Block_Assets
	 */
	public static function _init() {
		if ( null === self::$instance ) {
			self::$instance = new NU_Gutenberg_Block_Assets();
		}

		return self::$instance;
	}

	public function __construct(){
		add_action( 'enqueue_block_assets', array( $this, 'block_assets' ) );
		add_action( 'init', array( $this, 'editor_assets' ) );
	}

	public function editor_assets(){

		// do not enqueue this; editor handles that
		wp_register_style(
			'nublocks-editor',
			NU_GUTENBERG_PLUGIN_URL . '/build/index.css',
			array('wp-blocks'),
			NU_GUTENBERG_PLUGIN_DIR . '/build/index.asset.php'
		);

	}
	public function block_assets(){

		wp_register_style(
			'nublocks-frontend',
			NU_GUTENBERG_PLUGIN_URL . '/build/style-index.css',
			array(),
			NU_GUTENBERG_PLUGIN_DIR . '/build/index.asset.php'
		);

	}

}



NU_Gutenberg_Block_Assets::_init();



// 
?>