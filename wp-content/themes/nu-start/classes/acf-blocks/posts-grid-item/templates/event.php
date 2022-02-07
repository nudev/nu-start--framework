<?php
/**
 *    Posts Grid Item --- Event Item Template Type A
 * 
 *    This template will render a single Event item into the Posts Grid.
 *    - this is a "clickable area" template
 */
// 

/* 

pseudo-code / explain

behavior:
- clickable-area
- no action items on this view


data:
- category w/ color code (events, in the news, etc)
- featured image
- post title
- date/time (custom field)
- location (custom field)
- excerpt (custom field)
- tags

extra data:
- possible custom URL override
- events have a location
*/

$event_location = !empty($fields['location']) ? '<p>'.$fields['location'].'</p>' : '';


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