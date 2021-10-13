<?php
/**
 *
 * 	?		The "News" Custom Post / Content Type
 * 	?		v1 is trying to use innerblocks for all content and ACF only for attributes and customizations
 *
 */
//

global $post;

$fields = get_fields($post_id);

// Create id attribute allowing for custom "anchor" value.
$id = 'nu_news-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'nu_news';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$template = array();

wp_reset_postdata();
?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div>
		<?php
			echo '<InnerBlocks template="' . esc_attr( wp_json_encode( $template ) ) . '" templateLock="false"  />';

		?>
	</div>
</div>
