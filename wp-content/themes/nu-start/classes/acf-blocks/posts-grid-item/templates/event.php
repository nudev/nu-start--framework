<?php
/**
 *    Posts Grid Item --- Event Item Template Type A
 * 
 *    This template will render a single Event item into the Posts Grid.
 *    - this is a "clickable area" template
 */
// 

$the_basic_excerpt = '';

$event_location = !empty($event_item_metadata['location']) ? '<p class="location"><span class="material-icons-outlined">place</span><span>'.$event_item_metadata['location'].'</span></p>' : '';

$checkTerms = get_the_terms( $post, 'nu_events-types' );

$event_topic = !empty( $checkTerms ) ? '<div class="event-type">'.$checkTerms[0]->name.'</div>' : '';


$date_format = "M<\b\\r>d<\b\\r>Y";
$time_format = 'g:i a';
$guides['single-day'] = '
  <div class="nu__datetime">
    %2$s
    %1$s
  </div>
';
$month = '<span class="month">'.DateTime::createFromFormat('Ymd', $event_item_metadata['one_day']['happens_on'] )->format('M').'</span>';
$day = '<br /><span class="day">'.DateTime::createFromFormat('Ymd', $event_item_metadata['one_day']['happens_on'] )->format('d').'</span>';
$year = '<br /><span class="year">'.DateTime::createFromFormat('Ymd', $event_item_metadata['one_day']['happens_on'] )->format('Y').'</span>';

$happensOn = !empty( $event_item_metadata['one_day']['happens_on'] ) ? '<p class="nu__datetime-dates has-smaller-font-size"><span class="nu__datetime-startsat">'. $month.$day.$year . '</span></p>' : '';
$startsAt = !empty($event_item_metadata['one_day']['starts_at']) ? '<span class="nu__datetime-startson">'. DateTime::createFromFormat('H:i:s', $event_item_metadata['one_day']['starts_at'] )->format($time_format) . '</span>' : '';
$endsAt = !empty($event_item_metadata['one_day']['ends_at']) ? ' - <span>'. DateTime::createFromFormat('H:i:s', $event_item_metadata['one_day']['ends_at'] )->format($time_format) . '</span>' : '';

$happens_on_return = sprintf(
  $guides['single-day']
  ,''
  ,$happensOn
);
$happens_at_return = sprintf(
  $guides['single-day']
  ,!empty($startsAt) || !empty($endsAt) ? '<p class="nu__datetime-times has-smaller-font-size">'.$startsAt . $endsAt . '</p>' : ''
  ,''
);




// This template is loaded by the post grid
$guides['grid-item-event'] = '
  <li class="grid-item%1$s%8$s%9$s">
    <a class="contains-clickable-area" href="%7$s"'.$the_title_attribute.' %10$s>
      %2$s
      <div class="grid-item-content">
        <div>
          %11$s
          %4$s
        </div>
        <div class="date_time_container">
          %3$s
          %6$s
          %12$s
          %5$s
        </div>
      </div>
      %13$s
    </a>
  </li>
';

$return .= sprintf(
  $guides['grid-item-event'],
  ' '.$post_type,
  $the_cover_image,
  // $the_date_time,
  '',
  $the_post_title,
  $event_location,
  $the_basic_excerpt,
  $determined_permalink,
  $aspect_ratio_class,
  $orientationClass,
  $maybe_target,
  $event_topic,
  $happens_at_return,
  $happens_on_return
);


// 
?>