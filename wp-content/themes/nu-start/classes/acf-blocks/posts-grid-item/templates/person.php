<?php
/**
 *    Posts Grid Item --- Person Template Type A
 * 
 *    This template will render a single Person item into the Posts Grid.
 *    - this is a "clickable area" template
 */
// 

/* 
  pseudo-code / explain behavior:
  - clickable-area
  - no action items on this view
*/


// set the display fallback to post title
$the_display_name = $the_post_title;

// this fallback makes no damn sense but it works for now
$the_primary_title = $the_basic_excerpt;

// Contact fallbacks
$the_phone_number = ''; 
$the_email_address = ''; 

// if we have data
if( !empty($person_metadata) ){
  
  
  // ? get the display name or nothing
  $the_display_name = !empty($person_metadata['full_name']) ? '<span>'.$person_metadata['full_name'].'</span>' : $the_post_title;

  $the_primary_title = !empty($person_metadata['primary_title']) ? $person_metadata['primary_title'] : $the_basic_excerpt; 
  
  $the_phone_number = !empty($person_metadata['person_phone_number']) ? $person_metadata['person_phone_number'] : ''; 

  $the_email_address = !empty($person_metadata['person_email']) ? $person_metadata['person_email'] : '';

}


// This template is loaded by the post grid

$guides['person'] = '
  <li class="grid-item%1$s%6$s%7$s">
    <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
      %2$s 
      <div class="grid-item-content">
        <div class="post-title has-24-32-font-size">
          %3$s
        </div>
        <div class="is_the_rich_text_person_excerpt">
          <em>
            %4$s
          </em>
        </div>
      </div>
    </a>
  </li>
';

$return .= sprintf(
  $guides['person'],
    ' '.$post_type,
    $the_cover_image,
    $the_display_name,
    $the_primary_title,
    $determined_permalink,
    $aspect_ratio_class,
    $orientationClass,
    $maybe_target,
    $the_first_name, 
    $the_last_name,
    $the_phone_number,
    $the_email_address
);


?>