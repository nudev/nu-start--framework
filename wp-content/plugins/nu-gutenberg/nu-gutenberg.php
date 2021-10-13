<?php
/**
 * Plugin Name:       NU - Gutenberg
 * Description:       A custom block library plugin for Northeastern's NU_Start Framework
 * Requires at least: 5.8
 * Requires PHP:      7.0
 * Version:           0.1.0
 * Author:            Northeastern University
 * License:           GPL-2.0-or-later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       nublocks
 *
 * @package           nublocks
 */
// 



// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


define( 'NU_GUTENBERG_VERSION', '0.1.0' );
define( 'NU_GUTENBERG_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'NU_GUTENBERG_PLUGIN_URL', plugin_dir_url( __FILE__ ) );
define( 'NU_GUTENBERG_PLUGIN_FILE', __FILE__ );
define( 'NU_GUTENBERG_PLUGIN_BASE', plugin_basename( __FILE__ ) );


if ( ! class_exists( 'NU_Gutenberg' ) ) :
	final class NU_Gutenberg {

		/**
		 * This plugin's instance.
		 *
		 * @var NU_Gutenberg
		 * @since 1.0.0
		 */
		private static $instance;

		/**
		 * Main NU_Gutenberg Instance.
		 *
		 * Insures that only one instance of NU_Gutenberg exists in memory at any one
		 * time. Also prevents needing to define globals all over the place.
		 *
		 * @since 1.0.0
		 * @static
		 * @return object|NU_Gutenberg The one true NU_Gutenberg
		 */
		public static function instance() {
			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof NU_Gutenberg ) ) {
				self::$instance = new NU_Gutenberg();
				self::$instance->init();
				self::$instance->includes();
			}
			return self::$instance;
		}


		/**
		 * Throw error on object clone.
		 *
		 * The whole idea of the singleton design pattern is that there is a single
		 * object therefore, we don't want the object to be cloned.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return void
		 */
		public function __clone() {
			// Cloning instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'nublocks' ), '1.0' );
		}

		/**
		 * Disable unserializing of the class.
		 *
		 * @since 1.0.0
		 * @access protected
		 * @return void
		 */
		public function __wakeup() {
			// Unserializing instances of the class is forbidden.
			_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'nublocks' ), '1.0' );
		}



		/**
		 * Include required files.
		 *
		 * @access private
		 * @since 1.0.0
		 * @return void
		 */
		private function includes() {
			
			
			
			// include other files here
			require_once NU_GUTENBERG_PLUGIN_DIR . 'includes/block-patterns.php';
			require_once NU_GUTENBERG_PLUGIN_DIR . 'includes/block-assets.php';
			require_once NU_GUTENBERG_PLUGIN_DIR . 'includes/register-blocks.php';
			require_once NU_GUTENBERG_PLUGIN_DIR . 'includes/admin-menus.php';

		}


		/**
		 * Load actions
		 *
		 * @return void
		 */
		private function init() {

			// add_action hooks here
			
		}

	} // ? end of NU_Gutenberg final class
		
endif;


// initialize plugin and return instance
$instance = NU_Gutenberg::instance();

// 
?>