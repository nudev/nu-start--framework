<?php
/**
 *  global $post was declared already and will be cleaned up elsewhere
 */
// 


$guides['grid-item'] = '
	<li class="grid-item%1$s%7$s%8$s">
		<a href="%6$s" title="Read More about '.get_the_title( ).'"'.$maybe_target.'>
			%2$s
			<div class="grid-item-content">%3$s%4$s%5$s</div>
		</a>
	</li>
';

$griditems_return .= sprintf(
	$guides['grid-item'],
	' '.self::$post['post_type'],
	has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
	get_featured_tagstring( $post['ID'] ),
	'<h4 class="post-title">'.get_the_title($post['ID']).'</h4>',
	has_excerpt( $post['ID'] ) ? '<p class="post-excerpt">'.get_the_excerpt($post['ID']).'</p>' : '',
	$determined_permalink,
	$aspectRatio,
	$orientationClass
);

// 
?>