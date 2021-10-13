<?php
/**
 * 
 * 		this (will be) the core class of the nu-start theme
 * 	
 * 
 */
// 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


define( 'NU_THEME_DIR', get_template_directory( ) );
define( 'NU_THEME_DIR_URI', get_template_directory_uri( ) );


if ( ! class_exists( 'NU_Start' ) ) :

	final class NU_Start {

		// our variables

		private static $analytics;
		private static $social;
		private static $search;
		private static $global;
		
		
		// instantiation


		private static $instance;

		public static function instance() {

			if ( ! isset( self::$instance ) && ! ( self::$instance instanceof NU_Start ) ) {

				self::$instance = new NU_Start();
				
				self::$instance->includes();
				self::$instance->init();
				
			}
			return self::$instance;
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

			// require_once NU_THEME_DIR . 'path/to/file.php';

		}


		/**
		 * Load actions
		 *
		 * @return void
		 */
		private function init() {

			// error_log(print_r(self::$analytics, true));
			
			// add_action hooks here


			// Theme activation
			add_action('after_switch_theme', array($this,'theme_activation_handler'));
			// Theme deactivation
			add_action('switch_theme',array($this,'theme_deactivation_handler'));

		}

		private function theme_activation_handler(){

			error_log('NU_Start activated');
		}
		
		private function theme_deactivation_handler(){

			error_log('NU_Start deactivated, but still installed!');

		}


	} // ? end of NU_Start final class
		
	$instance = NU_Start::instance();

endif;

// 
?>