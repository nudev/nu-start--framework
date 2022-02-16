<?php
/**
 * 
 */
//
// 


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'CQ_TEASTER_TEMPLATE_DIR', get_template_directory() . '/classes/acf-blocks/content-query/templates/' );

if ( ! class_exists( 'Content_Query' ) ) :
final class Content_Query
{

	private static $instance;

	/**
	 * Main Content_Query Instance.
	 *
	 * Insures that only one instance of Content_Query exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 *
	 * @since 1.0.0
	 * @static
	 * @return object|Content_Query The one true Content_Query
	 */
	public static function instance() {
		if ( ! isset( self::$instance ) && ! ( self::$instance instanceof Content_Query ) ) {
			self::$instance = new Content_Query();
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
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'nu-start' ), '1.0' );
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
		_doing_it_wrong( __FUNCTION__, esc_html__( 'Something went wrong.', 'nu-start' ), '1.0' );
	}


	/**
	 * Include required files.
	 *
	 * @access private
	 * @since 1.0.0
	 * @return void
	 */
	private function includes() {
		

	}
	
	/**
	 * Load actions
	 *
	 * @return void
	 */
	private function init() {

		// add_action hooks here
		
	}
}
endif;


// initialize plugin and return instance
// $instance = Content_Query::instance();
// error_log(print_r($instance, true));



// 
// 
?>