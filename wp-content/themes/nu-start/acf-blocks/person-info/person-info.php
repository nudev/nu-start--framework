<?php
/**
 * 
 * 	?		Person Info Renderer
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 



// Create id attribute allowing for custom "anchor" value.
$id = 'person-info--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block person-info';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$person_metadata = !empty( get_fields($post_id) ) ? get_fields($post_id)['person_metadata'] : null;

$person_info = sprintf(
	'%1$s%2$s%3$s%4$s',
	!empty($person_metadata['full_name']) 
		? '<p class="full-name">'.$person_metadata['full_name'].'</p>' 
		: '',
	!empty($person_metadata['primary_title']) 
		? '<p class="primary-title">'.$person_metadata['primary_title'].'</p>' 
		: '',
	!empty($person_metadata['email']) 
		? '<p class="email">
			<span class="material-icons-outlined icon-email">email</span>'
				.$person_metadata['email'].
			'<span class="material-icons-outlined icon-content-copy" title="Copy Email">content_copy</span></p>' 
		: '',
	!empty($person_metadata['phone_number']) 
		? '<p class="phone-number"><span class="material-icons-outlined icon-call">call</span>'.$person_metadata['phone_number'].'</p>' 
		:	'',
);


?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?= $person_info ?>
	</div>
</div>