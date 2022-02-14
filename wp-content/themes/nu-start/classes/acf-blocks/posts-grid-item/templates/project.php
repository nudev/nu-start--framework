<?php
/**
 *    Posts Grid Item --- Project Template Type A
 * 
 *    This template will render a single Project item into the Posts Grid.
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

// if we have data
if( !empty($person_metadata) ){
  
  // print_r($person_metadata);
  // name, phone, email, primary title
  
  // ? get the display name or nothing
//   $the_display_name = !empty($person_metadata['display_name']) ? $person_metadata['display_name'] : $the_post_title;

}


// This template is loaded by the post grid

$guides['person'] = '
  <li class="grid-item%1$s%6$s%7$s">
    <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
      %2$s 
      <div class="grid-item-content">
        <p class="post-title has-24-32-font-size">
          %3$s
        </p>
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
    $maybe_target
);


?>