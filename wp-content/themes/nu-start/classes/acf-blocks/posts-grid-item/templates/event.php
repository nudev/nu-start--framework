<?php
/**
 *    Posts Grid Item --- Event Item Template Type A
 * 
 *    This template will render a single Event item into the Posts Grid.
 *    - this is a "clickable area" template
 */

$event_location = !empty($event_item_metadata['location']) ? '<p>'.$event_item_metadata['location'].'</p>' : '';

// ! active development
/* 

  - use terms instead of post type in the banner above the feat image
  - 

*/


// This template is loaded by the post grid
$guides['grid-item-event'] = '
  <li class="grid-item%1$s%8$s%9$s">
    <a class="contains-clickable-area" href="%7$s"'.$the_title_attribute.' %10$s>
      <div class="grid-item-content">
        %11$s
        %2$s
        %4$s
        <div class="date_time_container">
          %3$s
          %6$s
          %5$s
        </div>
      </div>
    </a>
  </li>
';

$return .= sprintf(
$guides['grid-item-event'],
  ' '.$post_type,
  $the_cover_image,
  $the_date_time,
  $the_post_title,
  $event_location,
  $the_basic_excerpt,
  $determined_permalink,
  $aspect_ratio_class,
  $orientationClass,
  $maybe_target,
  $post_type_label
);


// 
?>