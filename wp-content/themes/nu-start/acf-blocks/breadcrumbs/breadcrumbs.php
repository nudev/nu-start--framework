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



if(function_exists('bcn_display') && !is_front_page() )
{
	
	$guides['acf-block-container'] = '<div id="%1$s" class="nu_breadcrumbs%2$s%3$s">%4$s</div>';


	$breadcrumbs = '';
	ob_start();
	echo '<div class="breadcrumbs" typeof="BreadcrumbList" vocab="https://schema.org/">';
		if( is_admin() ){

			echo '<p>Breadcrumbs disabled in Editor</p>';
		
		} else {
			bcn_display(false, true, false, true);
			
		}
	echo '</div>';
	$breadcrumbs = ob_get_clean();

	$return = sprintf(
		$guides['acf-block-container'],
		!empty( $block['anchor' ]) ? $block['anchor'] : $block['id'],	// block anchor or a unique ID
		!empty($block['className']) ? ' '.$block['className'] : '',
		!empty($block['align']) ? ' '.$block['align'] : '',
		$breadcrumbs
	);
	
	echo $return;

}



?>
