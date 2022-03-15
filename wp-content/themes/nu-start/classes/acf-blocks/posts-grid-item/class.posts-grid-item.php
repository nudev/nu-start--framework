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

		// * get the capitalcase post type name (label)
		$post_type_label = !empty(get_post_type_object($post_type)->labels->singular_name) ? '<span class="is-post-type-label has-14-20-font-size">'.get_post_type_object($post_type)->labels->singular_name.'</span>' : '';
		// 
		$orientationClass = !empty($item_styles['orientation']) ? ' has-layout-' . $item_styles['orientation'] : '';

		// ! we need to actually do this
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
		$the_post_title = '<h2 class="post-title"><span>'.get_the_title( ).'</span></h2>';

		// ? either use a custom url redirect via a known custom field; or just the normal get_permalink
		$determined_permalink = !empty($fields['custom_permalink_redirect']) ? $fields['custom_permalink_redirect'] : esc_url( get_the_permalink( ) );

		// ? if a custom URL is entered to override the permalink we also open in a new tab/window
		$maybe_target = !empty($fields['custom_permalink_redirect']) ? ' target="_blank"' : '';
		$will_open_new_tab = !empty($fields['custom_permalink_redirect']) ? ' [will open in a new tab/window]' : '';
		
		// ? check for the actual post_excerpt and possibly use it
		$the_basic_excerpt = has_excerpt() ? '<p class="post-excerpt">'.wp_strip_all_tags( wp_trim_words(  get_the_excerpt(), 30 ) ) .'</p>' : '';

		// the featured image in markup
		$the_cover_image = !empty($item_styles['display_featured_image']) && has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '';

		$the_title_attribute = ' title="Read More about '.get_the_title( ).$will_open_new_tab.'"';


		$guides = [];
		$return = '';

		switch ($post_type) {
			case 'nu_people':
					$person_metadata = !empty( $fields['person_metadata'] ) ? $fields['person_metadata'] : '';
					include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/person.php' );
				break;
			case 'nu_events':
					$event_item_metadata = !empty( $fields['event_item_metadata'] ) ? $fields['event_item_metadata'] : '';
					include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/event.php' );
				break;
			case 'nu_profiles':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/profile.php' );
				break;
			case 'nu_projects':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/project.php' );
				break;
			case 'nu_news':
				$item_metadata = !empty( $fields['publication_info'] ) ? $fields['publication_info'] : '';
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/news-item.php' );
				break;
			case 'nu_programs':
				include( get_template_directory( ) . '/classes/acf-blocks/posts-grid-item/templates/program.php' );
				break;
			default:
				$guides['grid-item-default'] = '
					<li class="is-default grid-item%1$s%7$s%8$s">
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