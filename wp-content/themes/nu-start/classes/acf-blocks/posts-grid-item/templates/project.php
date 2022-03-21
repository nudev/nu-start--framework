<?php
/**
 * 
 * ?      Project Teaser
 * 
 */
// 

$guides['project'] = '
<li class="grid-item%1$s%6$s%7$s">
  <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
    %2$s
    <div class="grid-item-content">
      %3$s
      %4$s
      <div class="is-hanging-icon"><span class="material-icons-outlined">arrow_forward</span></div>
    </div>
  </a>
</li>
';

$return .= sprintf(
  $guides['project'],
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