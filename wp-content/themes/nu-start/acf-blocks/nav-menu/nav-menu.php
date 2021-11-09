<?php
/**
 * 		Carousel (Slick Slider) Block
 * 
 */
// 

global $post;

// the pattern is the pattern
$return = '';
$guides = [''];


$guides['nav-menu'] = '';



// Create id attribute allowing for custom "anchor" value.
$id = 'nu__navmenu-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'nu__navmenu';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}


$fields = get_fields();

if( !empty($fields['nav_menu']) ){
	$return .= nu__getMenu('',false,$fields['nav_menu']);
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<?php echo $return; ?>

</div>