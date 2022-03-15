<?php
/* 


*/



$checkTerms = get_the_terms( $post, 'nu_programs-categories' );
$category = !empty( $checkTerms ) ? '<div class="program-category"><span>'.$checkTerms[0]->name.'</span></div>' : '';

$guides['program'] = '
<li class="grid-item%1$s%6$s%7$s">
  <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
    %2$s
    <div class="grid-item-content">
      %9$s
      %3$s
      %4$s
    </div>
  </a>
</li>
';

$return .= sprintf(
  $guides['program'],
  ' '.$post_type,
  $the_cover_image,
  $the_post_title,
  // $the_basic_excerpt,
  '',
  $determined_permalink,
  $aspect_ratio_class,
  $orientationClass,
  $maybe_target,
  $category
);
?>