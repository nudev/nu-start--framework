<?php
/**
 * 
 * 	?		Event Info Renderer
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 



// Create id attribute allowing for custom "anchor" value.
$id = 'event-info--' . $block['id'];

if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'acf-block event-info';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$event_item_metadata = !empty( get_fields( $post_id ) ) ? get_fields( $post_id )['event_item_metadata'] : '';

$event_location = !empty($event_item_metadata['location']) ? '<p class="location"><span class="material-icons-outlined">place</span><span>'.$event_item_metadata['location'].'</span></p>' : '';


$event_info_block = !empty( get_fields( ) ) ? get_fields( ) : '';
$do_render = $event_info_block['block_renders'];

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php
			

			// ? if type is selected, the block renders the single-selected term of the "type" taxonomy - borrowed logic markup from the teaser
			if( $do_render == 'type' ){
				global $post;
				$checkTerms = get_the_terms( $post, 'nu_events-types' );
				$event_type = !empty( $checkTerms ) ? '<div class="event-type">'.$checkTerms[0]->name.'</div>' : '';
				$render = sprintf(
					'%1$s',
					$event_type
				);
				echo $render;
			}

			if( $do_render == 'location' ){

				echo $event_location;

			}

			


		?>
	</div>
</div>