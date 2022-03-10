<?php
/**
 * 		NU Block: Posts Grid
 * 
 * 
 * ?		ACF makes the following parameters available in this scope
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 


// Create id attribute allowing for custom "anchor" value.
$id = 'posts-grid--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block posts-grid';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// 

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php 
		$instance = new PostsGrid( $block, $content, $is_preview, $post_id );

		/**
		 * Below, beta work deconstructing the block into parent/child relationship
		 * - pagination, filtering, and item-template will be discrete blocks
		 * - (this also loosely follows the query loop block in gutenberg)
		 */
		$allowed_blocks = array( 'acf/beta-postsgrid-filtering','acf/beta-postsgrid-pagination' );
		echo '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" />';
	?>
</div>