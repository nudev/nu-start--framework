<?php
/**
 * 
 */
// 


$guides['grid-item'] = '
	<li class="grid-item%1$s">
		%2$s
		<div class="grid-item-content">%3$s%4$s%5$s%6$s</div>
	</li>
';


$readMore = '<a class="nu_posts-grid-readmore" href="' . esc_url( get_the_permalink() ) . '"><span class="material-icons-outlined moreicon">more_vert</span><span class="moretext">More Info:</span></a>';

$griditems_return .= sprintf(
	$guides['grid-item'],
	' '.$post_type,
	has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
	get_featured_tagstring( $post['ID'] ),
	'<h4 class="post-title">'.get_the_title().'</h4>',
	'<p class="post-excerpt">'.get_the_excerpt().'</p>',
	$readMore
);

	

// 
?>