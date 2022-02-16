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

$selected_post_type = $fields['auto_select']->name;

$args = [
	'post_type' 		=> 	$selected_post_type,
	'post_status'		=> 	'publish',
	'order'					=>	'ASC',
	'posts_per_page' => -1
];
$the_query = new WP_Query($args);


// Create id attribute allowing for custom "anchor" value.
$id = 'content-query-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'content-query';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$template = [];

$total_posts = count($the_query->posts);

for ($i=0; $i < $total_posts; $i++) { 
	$template[] = ['acf/nu--content-query-item', ['post_type' => $selected_post_type->name, 'text_text' => 'hello to the world' ]];
}


$allowedBlocks = ['acf/nu--content-query-item'];
$innerBlocks =  '<InnerBlocks allowedBlocks="' . esc_attr( wp_json_encode( $allowedBlocks ) ) . '" template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="all" />';

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php 

			// initialize plugin and return instance
			$instance = Content_Query::instance();
			// error_log(print_r($instance, true));

			// echo $innerBlocks;
		?>
	</div>
</div>