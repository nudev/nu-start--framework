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

		if( $post_type == 'nu_initiatives' ){

			$guides['grid-item'] = '
				<li class="grid-item %1$s%7$s%8$s">
					%2$s
					<div class="grid-item-content">%3$s%4$s%5$s%6$s</div>
				</li>
			';


			$temp_string = '';

			$initiative_schools = get_the_terms( $post->ID, $post_type . '-schools' );

			if( !empty($initiative_schools) && !is_wp_error( ($initiative_schools) ) ){
				foreach( $initiative_schools as $school_object ){
					$school_name = $school_object->name;
					$term_fields = get_fields($school_object);
					if( !empty($term_fields) ){
						$associated_color = $term_fields['associated_color'];
						$temp_string .= '<span style="color:'.$associated_color.'">'.$school_name.'</span><br />';
					} else {
						$temp_string .= '<span>'.$school_name.'</span><br />';
					}
				}	
			}


			$initiative_schools_string = '<p class="featured-tags has-smaller-font-size">'.$temp_string.'</p>';

			$thePostThumbnail = !empty($item_style['display_featured_image']) && has_post_thumbnail() ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '';

			$readMore = '<a class="nu_posts-grid-readmore" href="' . esc_url( get_the_permalink() ) . '"><span class="moretext">Read More</span></a>';

			$return .= sprintf(
				$guides['grid-item'],
				' '.$post_type,
				$thePostThumbnail,
				!empty($initiative_schools_string) ? $initiative_schools_string : '',
				'<p class="post-title">'.get_the_title($post['ID']).'</p>',
				'',
				do_blocks(get_the_content($post['ID'])),
				$aspect_ratio_class,
				$orientationClass
			);
			return $return;
		}



		if( $post_type == 'nu_programs' ){

			$guides['grid-item-is-program'] = '
				<li class="grid-item%1$s%7$s%8$s">
					<a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'"%9$s>
						%2$s
						<div class="grid-item-content">%10$s%3$s%4$s%5$s</div>
					</a>
				</li>
			';
	
			$the_date_time = '';
	
			$return .= sprintf(
				$guides['grid-item-is-program'],
				' '.$post_type,
				$the_cover_image,
				$the_post_title,
				$the_date_time,
				$the_basic_excerpt,
				$determined_permalink,
				$aspect_ratio_class,
				$orientationClass,
				$maybe_target,
				get_featured_tagstring( $post->ID )
			);
			return $return;
		}








		if( $post_type == 'nu_people' ){

			$excerpt = '<div class="person-excerpt">';
			$excerpt .= !empty($fields['excerpt_title']) ? '<p class="has-smaller-font-size"><i>'.$fields['excerpt_title'].'</i></p>' : '';
			$excerpt .= !empty($fields['excerpt_body']) ? '<p class="has-smaller-font-size">'.$fields['excerpt_body'].'</p>' : '';
			$excerpt .= '</div>';

			// ? saving this code that builds the phone and email into the excerpt manually
			$excerpt .= !empty($fields['person_phone_number']) ? '<span><a href="tel:' .$fields['person_phone_number']. '" target="_blank">' .preg_replace('/\d{3}/', '$0.', str_replace('.', null, $fields['person_phone_number']), 2). '</a></span>' : '';
			$excerpt .= !empty($fields['person_email']) ? '<span><a href="mailto:' .$fields['person_email']. '" target="_blank">' .$fields['person_email']. '</a></span>' : '';

			$guides['grid-item-person'] = '
				<li class="grid-item%1$s%7$s%8$s">
					%2$s
					<div class="grid-item-content">%3$s%4$s%5$s%6$s</div>
				</li>
			';

			$readMore = '<a class="nu_posts-grid-readmore" title="View profile for '.get_the_title().'" href="' . $determined_permalink . '" '.$maybe_target.'><span class="material-icons-outlined moreicon">more_vert</span><span class="moretext">View Profile</span></a>';

			$return .= sprintf(
				$guides['grid-item-person'],
				' '.$post_type,
				has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
				get_featured_tagstring( $post->ID ),
				'<h4 class="post-title">'.get_the_title().'</h4>',
				$excerpt,
				$readMore,
				$aspect_ratio_class,
				$orientationClass
			);

			return $return;
		}











		if( $post_type == 'nu_events' ||  $post_type == 'nu_news' ){

			$guides['grid-item-event'] = '
				<li class="grid-item%1$s%7$s%8$s">
					<a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'"%9$s>
						%2$s
						<div class="grid-item-content">%3$s%4$s%5$s</div>
					</a>
				</li>
			';

			if( $post_type == 'nu_news' ){
				$the_date_time = '';
			}

			$return .= sprintf(
				$guides['grid-item-event'],
				' '.$post_type,
				has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
				$the_date_time,
				'<p class="post-title has-24-32-font-size"><span>'.get_the_title( ).'</span></p>',
				has_excerpt() ? '<p class="post-excerpt">'.get_the_excerpt( ).'</p>' : '',
				$determined_permalink,
				$aspect_ratio_class,
				$orientationClass,
				$maybe_target
			);

			return $return;

		}

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

		return $return;


	}
	
}

// 
?>