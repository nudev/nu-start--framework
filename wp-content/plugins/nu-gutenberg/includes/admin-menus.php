<?php
/**
 * 
 */
// 


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

class NU_Gutenberg_Admin_Menus
{
	
	/**
	 * This plugin's instance.
	 *
	 * @var NU_Gutenberg_Admin_Menus
	 */
	private static $instance;

	/**
	 * Registers the plugin.
	 *
	 * @return NU_Gutenberg_Admin_Menus
	 */
	public static function _init() {
		if ( null === self::$instance ) {
			self::$instance = new NU_Gutenberg_Admin_Menus();
		}

		return self::$instance;
	}

	public function __construct(){
		add_action( 'admin_menu', array($this, 'register_admin_options_page') );
	}

	public function render_admin_options_page(){

		$all_blocks = [
			// 'tabs',
			// 'tabs-item',
			'accordion',
			'accordion-item',
		];

		$return = '<div class="wrap"><h1>'.esc_html( get_admin_page_title() ).'</h1>';

		$return .= '<ul>';
		foreach( $all_blocks as $block_name ){

			$return .= sprintf(
				'<li>Block %1$s enabled (under development)</li>',
				$block_name
			);
		}
		$return .= '</ul>';
		$return .= '</div>';

		// 
		echo $return;
	}

	public function register_admin_options_page(){


		add_menu_page(
			'NU Blocks',
			'NU Blocks',
			'manage_options',
			'nu-blocks',
			array($this, 'render_admin_options_page'),
			'dashicons-admin-settings',
			3.1
		);
		
		
	}
}



NU_Gutenberg_Admin_Menus::_init();



// 
?>