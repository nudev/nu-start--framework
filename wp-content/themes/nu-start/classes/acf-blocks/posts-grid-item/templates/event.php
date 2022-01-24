<?php
/**
 *    Posts Grid Item --- Event Item Template Type A
 * 
 *    This template will render a single Event item into the Posts Grid.
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






// set and use a guide string for this item
$guides['event-item'] = '
  <li>

  </li>
';

// append this item to the return string
$return .= sprintf();






// This template is loaded by the post grid

$guides['grid-item-event'] = '
  <li class="grid-item%1$s%8$s%9$s">
    <a class="contains-clickable-area" href="%7$s" title="Read More about '.get_the_title( ).'" %10$s>
      %2$s
      <div class="grid-item-content">%3$s%4$s%5$s</div>
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
$maybe_target
);


// 
?>