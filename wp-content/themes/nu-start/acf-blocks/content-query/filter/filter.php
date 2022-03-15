<?php
/**
 * 
 * 	?		REST API via Block Editor --- TEST
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 



// Create id attribute allowing for custom "anchor" value.
$id = 'content-query-filter--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block content-query-filter';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}


$fields = get_fields();


// ? the pattern is the pattern...
$guides = [];
$return = '';
$guides['content-query-filter'] = '
	%1$s
';


$return .= sprintf(
	$guides['content-query-filter'],
	'Filter Temporarily Disabled'
);


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php 
			$instance = ContentQuery::getInstance();

			print_r($fields);

			echo $return;
		 ?>
	</div>
</div>