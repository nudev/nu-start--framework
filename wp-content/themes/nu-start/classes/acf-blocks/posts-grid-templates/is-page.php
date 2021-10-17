<?php
/**
 *  global $post was declared already and will be cleaned up elsewhere
 */
// 

$guides['grid-item-is-page'] = '
	<li class="grid-item%1$s%7$s%8$s">
		<a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'"%9$s>
			%2$s
			<div class="grid-item-content">%3$s%4$s%5$s</div>
		</a>
	</li>
';

$griditems_return .= sprintf(
	$guides['grid-item-is-page'],
	' '.self::$post['post_type'],
	has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
	'<h4 class="post-title"><span>'.get_the_title( ).'</span></h4>',
	// $the_date_time,
	'',
	!empty( get_the_excerpt() ) ? '<p class="post-excerpt">'.get_the_excerpt( ).'</p>' : '',
	$determined_permalink,
	$aspectRatio,
	$orientationClass,
	$maybe_target
);

// 
?>