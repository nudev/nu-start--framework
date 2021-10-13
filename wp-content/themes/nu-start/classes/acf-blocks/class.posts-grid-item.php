<?php
/**
 * 		get the template for a post depending on the content type
 */
// 

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class PostsGrid_Item
{


	private static $post;
	private static $fields;
	private static $gridOptions;

	public static function init($post, $gridOptions){

		// convert wp post object into an array to prevent errors
		$post = (array)$post;

		self::$gridOptions = $gridOptions;
		self::$post = $post;
		self::$fields = get_fields($post['ID']);

		// call in the date-time block
		if( !empty(self::$fields) ){
			$instance = new NU_DateTime_Helper(self::$fields);
			$the_date_time = $instance::build_datetime_return_string();
		}


		$item_style = !empty(self::$gridOptions['item_style']) ? self::$gridOptions['item_style'] : '';
		$aspectRatio = '';
		if( !empty($item_style['image_dimensions']) ){
			switch ($item_style['image_dimensions']) {
				case 'auto':
					$aspectRatio = '';
					break;
				case 'square':
					$aspectRatio = ' has-square-cover-image';
					break;
				case 'widest':
					$aspectRatio = ' has-very-wide-cover-image';
					break;
				case 'wide':
					$aspectRatio = ' has-wide-cover-image';
					break;
				case 'tallest':
					$aspectRatio = ' has-very-tall-cover-image';
					break;
				case 'tall':
					$aspectRatio = ' has-tall-cover-image';
					break;
				default:
					# code...
					$aspectRatio = '';
					break;
			}
		}
		$orientationClass = !empty($item_style['orientation']) ? ' has-layout-' . $item_style['orientation'] : '';


		$determined_permalink = !empty(self::$fields['custom_permalink_redirect']) ? self::$fields['custom_permalink_redirect'] : esc_url( get_the_permalink( ) );
		$maybe_target = !empty(self::$fields['custom_permalink_redirect']) ? ' target="_blank"' : '';
		

		$griditems_return = '';

		switch (self::$post['post_type']) {
			case 'nu_people':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-templates/person.php' );
				break;
			case 'nu_events':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-templates/event.php' );
				break;
			case 'nu_programs':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-templates/program.php' );
				break;
			case 'nu_initiatives':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-templates/initiative.php' );
				break;
			case 'page':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-templates/is-page.php' );
				break;
			default:
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-templates/default.php' );
				break;
		}

		return $griditems_return;
	}
	
}

// 
?>