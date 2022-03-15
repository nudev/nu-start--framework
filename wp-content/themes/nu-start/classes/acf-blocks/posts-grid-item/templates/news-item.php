<?php
/**
 *    Posts Grid Item --- News Item Template Type A
 * 
 *    This template will render a single News item into the Posts Grid.
 *    
 *    - this is a "clickable area" template
 */
// 


  $pub_date = !empty($item_metadata['date']) ? '<span class="date">'.DateTime::createFromFormat('Ymd', $item_metadata['date'] )->format('M d, Y').'</span>' : '';
  $pub_author = !empty($item_metadata['author']) ? '<span class="author">'.$item_metadata['author'].'</span>' : '';
  $pub_publisher = !empty($item_metadata['publisher']) ? '<span class="publisher"><em>'.$item_metadata['publisher'].'</em></span>' : '';
  
  $publication_string = sprintf(
    '<div class="publication-info">%1$s%2$s%3$s</div>',
    !empty($pub_date) ? $pub_date : '',
    !empty($pub_author) ? ' | '.$pub_author : '',
    !empty($pub_publisher) ? ' | '.$pub_publisher : '',
  );


  $external_icon = !empty($fields['custom_permalink_redirect']) ? '<div class="is-hanging-icon"><span class="material-icons-outlined">open_in_new</span></div>' : '';

  // 
  $guides['newsitem'] = '
    <li class="grid-item%1$s%6$s%7$s">
      <a class="contains-clickable-area" href="%5$s"'.$the_title_attribute.' %8$s>
        %2$s
        <div class="grid-item-content">
          %3$s
          %4$s
          %9$s
          %10$s
        </div>
      </a>
    </li>
  ';


  // 
  $return .= sprintf(
    $guides['newsitem'],
    ' '.$post_type,
    $the_cover_image,
    $the_post_title,
    $the_basic_excerpt,
    $determined_permalink,
    $aspect_ratio_class,
    $orientationClass,
    $maybe_target,
    $publication_string,
    $external_icon
  );



?>