<?php
/* 


*/

// var_dump($fields);

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
        %10$s
      </div>
    </a>
  </li>
';


$basic_program_info = sprintf(
  '<p class="basic-program-info">
    %1$s
    %2$s
  </p>',
  !empty($p_location) ? '<span class="location">'.$p_location.'</span>' : '',
  !empty($p_duration) ? '<span class="duration">'.$p_duration.'</span>' : ''
);

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
  $category,
  $basic_program_info
);
?>