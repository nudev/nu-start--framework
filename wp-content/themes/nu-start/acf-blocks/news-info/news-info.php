<?php
/**
 * 
 * 	?		Event Info Renderer
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 



// Create id attribute allowing for custom "anchor" value.
$id = 'news-info--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block news-info';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$publication_info = !empty( get_fields( $post_id ) ) ? get_fields( $post_id )['publication_info'] : '';
$news_info_block = !empty( get_fields( ) ) ? get_fields( ) : '';

$do_render = $news_info_block['block_renders'];

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php

			// ? if type is selected, the block renders the single-selected term of the "type" taxonomy - borrowed logic markup from the teaser
			if( $do_render == 'type' ){
				global $post;
				$checkTerms = get_the_terms( $post, 'nu_news-categories' );
				$news_item_type = !empty( $checkTerms ) ? '<div class="news-item-category">'.$checkTerms[0]->name.'</div>' : '';
				$render = sprintf(
					'%1$s',
					$news_item_type
				);
				echo $render;
			}

			if( $do_render == 'pubdate' && !empty($publication_info['date']) ){
				echo '<p class="pubdate">'.DateTime::createFromFormat('Ymd',$publication_info['date'])->format('M d, Y').'</p>';
			}
			
			if( $do_render == 'author' && !empty($publication_info['author']) ){
				echo '<p class="author">'.$publication_info['author'].'</p>';
			}

		?>
	</div>
</div>