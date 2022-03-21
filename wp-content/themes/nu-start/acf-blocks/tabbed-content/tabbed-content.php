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


// error_log(print_r(parse_blocks( $content ), true));

// Create id attribute allowing for custom "anchor" value.
$id = 'tabbed-content--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block tabbed-content';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$fields = get_fields($post_id);


// Restrict block output (front-end only).
if( !$is_preview ) {
	
}

/**
 * @link https://github.com/WordPress/gutenberg/tree/trunk/packages/block-editor/src/components/inner-blocks
 */
$allowed_blocks = array( 'acf/tabbed-content-item' );
$template = array(
	array( 'acf/tabbed-content-item', ['title' => 'Tab Title Placeholder...'], [
		array( 'core/paragraph',['placeholder'=>'Tabbed Content Area!'] )
	])
);
$templateLock = "false";
$innerBlocks = '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowed_blocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="'.$templateLock.'" />';


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php
			echo '<div class="tabs-titles-container"></div>';
			echo '<div class="tabs-content-container-">'.$innerBlocks.'</div>';
		?>
	</div>
</div>