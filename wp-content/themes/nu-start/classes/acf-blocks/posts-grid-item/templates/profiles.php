<?php
/**
 *    Posts Grid Item --- News Item Template Type A
 * 
 *    This template will render a single News item into the Posts Grid.
 *    
 *    - this is a "clickable area" template
 */
// 

	$the_post_title = '<p class="post-title has-16-24-font-size"><span>'.get_the_title( ).'</span></p>';

	// ? check for the actual post_excerpt and possibly use it
	$the_basic_excerpt = has_excerpt() ? '<p class="post-excerpt has-24-32-font-size">'.get_the_excerpt( ).'</p>' : '';


	$guides['is-profile'] = '
		<li class="is-profile grid-item%1$s%7$s%8$s">
			<a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'"%9$s>
				%2$s
				<div class="grid-item-content">
					%5$s
					%3$s
					%4$s
				</div>
			</a>
		</li>
	';

	$the_date_time = '';

	$return .= sprintf(
		$guides['is-profile'],
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
// 
?>