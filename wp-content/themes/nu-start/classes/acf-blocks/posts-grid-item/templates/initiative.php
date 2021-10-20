<?php
/**
 * 
 */
// 


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

$griditems_return .= sprintf(
	$guides['grid-item'],
	' '.$post_type,
	$thePostThumbnail,
	!empty($initiative_schools_string) ? $initiative_schools_string : '',
	'<h4 class="post-title is-style-display">'.get_the_title($post['ID']).'</h4>',
	'',
	do_blocks(get_the_content($post['ID'])),
	$aspect_ratio_class,
	$orientationClass
);

	

// 
?>