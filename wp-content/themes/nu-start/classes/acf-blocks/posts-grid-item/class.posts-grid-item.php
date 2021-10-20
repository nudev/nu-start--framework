<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


class PostsGrid_Item
{


	private static $post;
	private static $fields;
	private static $gridOptions;



	
	
	/**
	 * initialize this posts grid item (used in the wordpress loop)
	 *
	 * @param [type] $post - the post object set up inside the loop
	 * @param [type] $gridOptions - the field group of the calling parent posts grid (style and other options set here)
	 * @return void
	 */
	public static function init($post, $gridOptions){


		// destructure meaningful data

		$fields = get_fields($post->ID);
		$post_type = $post->post_type;
		$item_styles = !empty($gridOptions['item_style']) ? $gridOptions['item_style'] : '';
		$orientationClass = !empty($item_styles['orientation']) ? ' has-layout-' . $item_styles['orientation'] : '';
		$aspect_ratio_class = '';

		// call in the date-time block
		if( !empty($fields) ){
			$instance = new NU_DateTime_Helper($fields);
			$the_date_time = $instance::build_datetime_return_string();
		}

		// attach classes to choose image dimensions
		if( !empty( $item_styles ) && !empty($item_styles['display_featured_image']) ){
			$aspect_ratio_class = ' has-'.$item_styles['image_dimensions'].'-cover-image';
		}

		$determined_permalink = !empty($fields['custom_permalink_redirect']) ? $fields['custom_permalink_redirect'] : esc_url( get_the_permalink( ) );
		$maybe_target = !empty($fields['custom_permalink_redirect']) ? ' target="_blank"' : '';
		

		
		$griditems_return = '';
		switch ( $post_type ) {
			case 'nu_people':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/person.php' );
				break;
			case 'nu_events':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/event.php' );
				break;
			case 'nu_news':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/news.php' );
				break;
			case 'nu_programs':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/program.php' );
				break;
			case 'nu_initiatives':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/initiative.php' );
				break;
			case 'page':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/is-page.php' );
				break;
			default:
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/default.php' );
				break;
		}
		return $griditems_return;

		
		
	}
	
}

// 
?>