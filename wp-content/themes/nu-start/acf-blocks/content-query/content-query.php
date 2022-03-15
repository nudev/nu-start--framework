<?php
/**
 * 
 * @link https://www.advancedcustomfields.com/resources/acf_register_block_type/
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 

// Create id attribute allowing for custom "anchor" value.
$id = 'content-query--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block content-query';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$fields = get_fields();

// Restrict block output (front-end only).
if( !$is_preview ) {
	
}

/**
 * @link https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components/inner-blocks
 */
$allowed_blocks = array( 'acf/content-query-filter','acf/content-query-showmore' );
$innerBlocks = '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" />';


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php
			echo '<h2>Active Development - Not for Production</h2>';
			$instance = ContentQuery::getInstance();
			$instance->buildQueryArgs($fields);
			echo $innerBlocks;
		?>
	</div>
</div>