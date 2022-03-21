<?php
/**
 * 
 * 	?		showmore
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 



// Create id attribute allowing for custom "anchor" value.
$id = 'content-query-showmore--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block content-query-showmore';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}


// ? the pattern is the pattern...
$guides = [];
$return = '';
$guides['content-query-showmore'] = '
	%1$s
';


$return .= sprintf(
	$guides['content-query-showmore'],
	'Pagination Temporarily Disabled'
);

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php 
			$instance = ContentQuery::getInstance();
			echo $return;
		?>
	</div>
</div>