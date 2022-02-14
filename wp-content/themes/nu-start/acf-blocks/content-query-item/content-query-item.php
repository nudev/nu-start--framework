<?php
/**
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 

$fields = get_fields();



// Create id attribute allowing for custom "anchor" value.
$id = 'content-query-item-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-query-item';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>

		<?php 
			// print_r($block);
			print_r($fields);
			echo 'hello world'; 
			?>
	</div>
</div>