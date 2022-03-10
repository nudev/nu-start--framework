<?php
/**
 *    Posts Grid Item --- Person Template Type A
 * 
 *    This template will render a single Person item into the Posts Grid.
 *    - this is a "clickable area" template
 */
// 

$full_name = !empty($person_metadata['full_name']) ? '<h2 class="full-name post-title"><span>'.$person_metadata['full_name'].'</span></h2>' : $the_post_title;
$primary_title = !empty($person_metadata['primary_title']) ? '<div class="primary-title">'.$person_metadata['primary_title'].'</div>' : '';

$guides['person-teaser'] = '
  <li class="grid-item%1$s%2$s%3$s">
    <a class="contains-clickable-area" href="%4$s"%5$s%6$s>
      %7$s
      <div class="grid-item-content">
        %8$s
        %9$s
      </div>
    </a>
  </li>
';


$return .= sprintf(
  $guides['person-teaser'],
  // ? generic grid-item args...
  ' '.$post_type,
  $aspect_ratio_class,
  $orientationClass,
  $determined_permalink,
  $the_title_attribute,
  $maybe_target,
  $the_cover_image,
  // ? person-specific args...
  $full_name,
  $primary_title,
);


?>