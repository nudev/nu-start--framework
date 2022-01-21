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

		// ? the fully formatted post title markup
		$the_post_title = '<h4 class="post-title"><span>'.get_the_title( ).'</span></h4>';

		// ? either use a custom url redirect via a known custom field; or just the normal get_permalink
		$determined_permalink = !empty($fields['custom_permalink_redirect']) ? $fields['custom_permalink_redirect'] : esc_url( get_the_permalink( ) );

		// ? if a custom URL is entered to override the permalink we also open in a new tab/window
		$maybe_target = !empty($fields['custom_permalink_redirect']) ? ' target="_blank"' : '';
		
		// ? check for the actual post_excerpt and possibly use it
		$the_basic_excerpt = has_excerpt() ? '<p class="post-excerpt">'.get_the_excerpt( ).'</p>' : '';

		// the featured image in markup
		$the_cover_image = has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '';


		$guides = [];
		$return = '';

		switch ($post_type) {
			case 'nu_initiatives':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/initiative.php' );
				break;
			case 'nu_programs':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/program.php' );
				break;
			case 'nu_people':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/person.php' );
				break;
			case 'nu_events':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/event.php' );
				break;
			case 'nu_news':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/news-item.php' );
				break;
			
			default:
				$guides['grid-item-default'] = '
					<li class="grid-item%1$s%7$s%8$s">
						<a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'"%9$s>
							%2$s
							<div class="grid-item-content">%3$s%4$s%5$s</div>
						</a>
					</li>
				';

				$the_date_time = '';

				$return .= sprintf(
					$guides['grid-item-default'],
					' '.$post_type,
					$the_cover_image,
					$the_post_title,
					$the_date_time,
					$the_basic_excerpt,
					$determined_permalink,
					$aspect_ratio_class,
					$orientationClass,
					$maybe_target
				);
				break;
		}

		return $return;

	}
	
}

// 
?>