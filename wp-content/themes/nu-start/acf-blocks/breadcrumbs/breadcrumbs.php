<?php
/**
 * 		NU Block: Breadcrumbs
 * 
 * 
 * ?		ACF makes the following parameters available in this scope
 * 
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// 

// print_r($block);


if(function_exists('bcn_display') && !is_front_page() )
{


	// Create class attribute allowing for custom "className" and "align" values.
	$className = 'nu__breadcrumbs';
	if( !empty($block['className']) ) {
		$className .= ' ' . $block['className'];
	}

	$background_color = get_field('background_color');
	$text_color = get_field('text_color');

	
	$guides['acf-block-container'] = '
	<div id="%1$s" class="%2$s%3$s%5$s">
		<div>%4$s</div>
	</div>';


	$breadcrumbs = '';
	ob_start();
	echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
		'Breadcrumbs not working in editor: ' . bcn_display(false, true, false, true);
	echo '</div>';
	$breadcrumbs = ob_get_clean();

	$return = sprintf(
		$guides['acf-block-container'],
		!empty( $block['anchor' ]) ? $block['anchor'] : $block['id'],	// block anchor or a unique ID
		!empty($className) ? $className : '',
		!empty($block['align']) ? ' '.$block['align'] : '',
		$breadcrumbs,
		!empty($block['align_text']) ? ' textalign-'.$block['align_text'] : '',
	);
	
	echo $return;

}



?>
