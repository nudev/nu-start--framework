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

$fields = get_fields();

// Create id attribute allowing for custom "anchor" value.
$id = 'tabbed-content-item--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block tabbed-content-item';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}
if( !empty($fields['active']) ){
	$className .= ' is-active';
}

// Restrict block output (front-end only).
if( !$is_preview ) {
}

$is_tab_active = !empty($fields['active']) ? 'true' : 'false';
	

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>" data-title="<?php echo $fields['title']; ?>" data-active="<?php echo $is_tab_active; ?>">
	<div>
		<InnerBlocks />
	</div>
</div>