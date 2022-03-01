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
$id = 'beta-rest-api--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block beta-rest-api';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// $person_metadata = !empty( get_fields($post_id) ) ? get_fields($post_id)['person_metadata'] : null;
// $request = new WP_REST_Request( 'GET', 'https://nudvohdsi.wpengine.com/wp-json/wp/v2/nu_events' );
$request = new WP_REST_Request( 'GET', 'https://nudvohdsi.wpengine.com/wp-json/wp/v2/' );

$return = sprintf(
	'%1$s',
	print_r($request, true) //
);


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?= $return; ?>
	</div>
</div>