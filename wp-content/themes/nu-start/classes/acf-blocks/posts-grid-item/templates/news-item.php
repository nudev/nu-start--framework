<?php
/**
 *    Posts Grid Item --- News Item Template Type A
 * 
 *    This template will render a single News item into the Posts Grid.
 *    
 *    - this is a "clickable area" template
 */
// 

  $pub_date = !empty($fields['publication_info']['date']) ? '<span>'.DateTime::createFromFormat('Ymd', $fields['publication_info']['date'] )->format('M d, Y').'</span>' : '';
  $pub_author = !empty($fields['publication_info']['author']) ? '<span>'.$fields['publication_info']['author'].'</span>' : '';
  $publication_info = '<p class="is-the-publication-date">' . $pub_date . $pub_author . '</p>';

  // This template is loaded by the post grid

  $guides['news-item'] = '
    <li class="grid-item%1$s%7$s%8$s">
      <a class="contains-clickable-area" href="%6$s"%10$s%9$s>
        <div class="grid-item-content">
          %2$s
          %11$s
          %3$s
          %4$s
          %5$s
        </div>
      </a>
    </li>
  ';

  if( $post_type == 'nu_news' ){
    $the_date_time = '';
  }

  $return .= sprintf(
    $guides['news-item'],
    ' '.$post_type,
    $the_cover_image,
    $the_date_time,
    $the_post_title,
    $the_basic_excerpt,
    $determined_permalink,
    $aspect_ratio_class,
    $orientationClass,
    $maybe_target,
    $the_title_attribute,
    $publication_info
  );

?>