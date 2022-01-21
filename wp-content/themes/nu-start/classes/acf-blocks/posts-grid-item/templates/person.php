<?php

// This template is loaded by the post grid

$excerpt = '<div class="person-excerpt">';
$excerpt .= !empty($fields['excerpt_title']) ? '<p class="has-smaller-font-size"><i>'.$fields['excerpt_title'].'</i></p>' : '';
$excerpt .= !empty($fields['excerpt_body']) ? '<p class="has-smaller-font-size">'.$fields['excerpt_body'].'</p>' : '';
$excerpt .= '</div>';

// ? saving this code that builds the phone and email into the excerpt manually
// $excerpt .= !empty($fields['person_phone_number']) ? '<span><a href="tel:' .$fields['person_phone_number']. '" target="_blank">' .preg_replace('/\d{3}/', '$0.', str_replace('.', null, $fields['person_phone_number']), 2). '</a></span>' : '';
// $excerpt .= !empty($fields['person_email']) ? '<span><a href="mailto:' .$fields['person_email']. '" target="_blank">' .$fields['person_email']. '</a></span>' : '';

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
!empty($item_styles['display_featured_image']) && has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
// get_featured_tagstring( $post->ID ),
'',
'<h4 class="post-title">'.get_the_title().'</h4>',
$excerpt,
$readMore,
$aspect_ratio_class,
$orientationClass
);

?>