<?php

// This template is loaded by the post grid

$guides['grid-item-event'] = '
<li class="grid-item%1$s%7$s%8$s">
  <a class="contains-clickable-area" href="%6$s" title="Read More about '.get_the_title( ).'" %9$s>
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
!empty($item_styles['display_featured_image']) && has_post_thumbnail( ) ? '<figure>'.get_the_post_thumbnail( ).'</figure>' : '',
$the_date_time,
'<p class="post-title has-24-32-font-size"><span>'.get_the_title( ).'</span></p>',
has_excerpt() ? '<p class="post-excerpt">'.get_the_excerpt( ).'</p>' : '',
$determined_permalink,
$aspect_ratio_class,
$orientationClass,
$maybe_target
);

?>