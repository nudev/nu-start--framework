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



// ? this is deprecated - will be replaced with single rich-text field soon (just notes)
if( !empty( $fields['excerpt_title'] ) || !empty( $fields['excerpt_body'] ) ){

  $guides['beta-person-excerpt'] = '<div class="person-excerpt">%1$s%2$s</div>';

  $the_basic_excerpt = sprintf(
    $guides['beta-person-excerpt'],
    !empty($fields['excerpt_title']) ? '<p class="has-smaller-font-size"><i>'.$fields['excerpt_title'].'</i></p>' : '',
    !empty($fields['excerpt_body']) ? '<p class="has-smaller-font-size">'.$fields['excerpt_body'].'</p>' : ''
  );
  
}



// This template is loaded by the post grid

$guides['person'] = '
  <li class="grid-item%1$s%6$s%7$s">
    <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
      %2$s 
      <div class="grid-item-content">
        %3$s
        <div class="is_the_rich_text_person_excerpt">
          %4$s
        </div>
      </div>
    </a>
  </li>
';

$return .= sprintf(
  $guides['person'],
  ' '.$post_type,
  $the_cover_image,
  $the_post_title,
  $the_basic_excerpt,
  $determined_permalink,
  $aspect_ratio_class,
  $orientationClass,
  $maybe_target,
);


?>