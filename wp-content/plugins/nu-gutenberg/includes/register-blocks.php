<?php
/**
 * 
 */
// 


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NU_Gutenberg_Register_Blocks
{
	
	/**
	 * This plugin's instance.
	 *
	 * @var NU_Gutenberg_Register_Blocks
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 *
	 * @return NU_Gutenberg_Register_Blocks
	 */
	public static function _init() {
		if ( null === self::$instance ) {
			self::$instance = new NU_Gutenberg_Register_Blocks();
		}

		return self::$instance;
	}

	/**
	 * The Constructor.
	 */
	public function __construct() {
		add_action( 'init', array( $this, 'register_blocks' ), 99 );
	}


	/**
	 * Add actions to enqueue assets.
	 *
	 * @access public
	 */
	public function register_blocks() {

		// Return early if this function does not exist.
		if ( ! function_exists( 'register_block_type' ) ) {
			return;
		}


		register_block_type(
			NU_GUTENBERG_PLUGIN_DIR . '/src/block-library/accordion',
		);

		register_block_type(
			NU_GUTENBERG_PLUGIN_DIR . '/src/block-library/accordion-item',
		);

		register_block_type(
			NU_GUTENBERG_PLUGIN_DIR . '/src/block-library/tabs',
		);

		register_block_type(
			NU_GUTENBERG_PLUGIN_DIR . '/src/block-library/tabs-item',
		);

		register_block_style(
			'nu-blocks/accordion',
			array(
				'name'         => 'icon-appears-before-title',
				'label'        => __( 'Icon Left', 'nu-start' ),
			)
		);
		register_block_style(
			'nu-blocks/accordion',
			array(
				'name'         => 'icon-appears-after-title',
				'label'        => __( 'Icon Right', 'nu-start' ),
				'is_default'	=> true
			)
		);


		
	}

	
}



NU_Gutenberg_Register_Blocks::_init();



// 
?>