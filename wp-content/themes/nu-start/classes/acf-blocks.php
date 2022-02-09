<?php


// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



class NU_ACF_Blocks
{

	/**
	 * Holds the instance.
	 */
	private static $instance;


	/**
	 * Init Main Instance.
	 *
	 * Insures that only one instance exists in memory at any one
	 * time. Also prevents needing to define globals all over the place.
	 */
	public static function instance(){

		// manage state to keep only one instace in memory
		if( !isset( self::$instance ) && !( self::$instance instanceof NU_ACF_Blocks ) ){

			self::$instance = new NU_ACF_Blocks();
			self::$instance->includes();

		}

		// return new instance
		return self::$instance;

	}

	private function includes(){
		// ... require_once template files here
		require_once( get_template_directory(  ) . '/classes/acf-blocks/posts-grid/class.posts-grid.php' );
		require_once( get_template_directory(  ) . '/classes/acf-blocks/posts-grid-item/class.posts-grid-item.php' );
		require_once( get_template_directory(  ) . '/classes/acf-blocks/datetime-block/class.date-time-block.php' );

		
		// ! DEPRECATED
		require_once( get_template_directory(  ) . '/classes/acf-blocks/class.pim-programs.php' );
	}
	
}

NU_ACF_Blocks::instance();




?>