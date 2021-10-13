<?php
/**
 * 		NU Block: DateTime Range
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


$fields = get_fields($post_id);

// Create id attribute allowing for custom "anchor" value.
$id = 'nu_datetime_range-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'nu_datetime_range';
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
		
			$instance = new NU_DateTime_Helper($fields);
			echo $instance::build_datetime_return_string();

		?>
	</div>
</div>