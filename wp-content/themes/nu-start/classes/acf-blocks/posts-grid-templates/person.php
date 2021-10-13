<?php
/**
 * 
 */
// 





$excerpt = '';
$excerpt .= !empty(self::$fields['excerpt_title']) ? '<p class="has-smaller-font-size"><i>'.self::$fields['excerpt_title'].'</i></p>' : '';
$excerpt .= !empty(self::$fields['excerpt_body']) ? '<p class="has-smaller-font-size">'.self::$fields['excerpt_body'].'</p>' : '';

// todo: lol this is too much
$excerpt .= !empty(self::$fields['person_phone_number']) ? '<span><a href="tel:' .self::$fields['person_phone_number']. '" target="_blank">' .preg_replace('/\d{3}/', '$0.', str_replace('.', null, self::$fields['person_phone_number']), 2). '</a></span>' : '';
$excerpt .= !empty(self::$fields['person_email']) ? '<span><a href="mailto:' .self::$fields['person_email']. '" target="_blank">' .self::$fields['person_email']. '</a></span>' : '';

$guides['grid-item-person'] = '
	<li class="grid-item%1$s%7$s%8$s">
		%2$s
		<div class="grid-item-content">%3$s%4$s%5$s%6$s</div>
	</li>
';

$readMore = '<a class="nu_posts-grid-readmore" href="' . $determined_permalink . '" '.$maybe_target.'><span class="material-icons-outlined moreicon">more_vert</span><span class="moretext">View Profile</span></a>';

$griditems_return .= sprintf(
	$guides['grid-item-person'],
	' '.self::$post['post_type'],
	has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
	get_featured_tagstring( $post['ID'] ),
	'<h4 class="post-title">'.get_the_title().'</h4>',
	$excerpt,
	$readMore,
	$aspectRatio,
	$orientationClass
);

	

// 
?>