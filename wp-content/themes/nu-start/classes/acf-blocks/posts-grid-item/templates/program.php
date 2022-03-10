<?php

// This template is loaded by the post grid

$guides['grid-item-is-program'] = '
  <li class="grid-item%1$s%7$s%8$s">
    <a class="contains-clickable-area" href="%6$s" title="Read More about ' . get_the_title() . '"%9$s>
      %2$s
      <div class="grid-item-content">%10$s%3$s%4$s%5$s</div>
    </a>
  </li>
';

$the_date_time = '';

$return .= sprintf(
  $guides['grid-item-is-program'],
  ' ' . $post_type,
  $the_cover_image,
  $the_post_title,
  $the_date_time,
  $the_basic_excerpt,
  $determined_permalink,
  $aspect_ratio_class,
  $orientationClass,
  $maybe_target,
  ''
);

?>