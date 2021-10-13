<?php
/**
 * 
 * 	?		The "Person" Custom Post / Content Type
 * 	?		v1 is trying to use innerblocks for all content and ACF only for attributes and customizations
 * 
 */
// 

global $post;

// Create id attribute allowing for custom "anchor" value.
$id = 'nu_person-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'nu_person';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


wp_reset_postdata();


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php echo '<InnerBlocks />'; ?>
</div>