<?php
/**
 * 
 * 	?		The "Program" Custom Post / Content Type
 * 	?		v1 is trying to use innerblocks for all content and ACF only for attributes and customizations
 * 
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 


// Create id attribute allowing for custom "anchor" value.
$id = 'nu_program-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


$programID = get_field('pim_id', $post_id);

// Create class attribute allowing for custom "className" and "align" values.
$className = 'nu_program';
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
			$thisProgram = new PIM_Program($programID);
		 ?>
	</div>
</div>