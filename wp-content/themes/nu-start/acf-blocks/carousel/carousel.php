<?php
/**
 * 		Carousel (Slick Slider) Block
 * 
 */
// 


// the pattern is the pattern
$return = '';
$guides = [''];



// guide string for the whole carousel; basically two "synced" sliders
$guides['carousel'] = '
	<div class="imageslider">
		<div class="js__carousel">%1$s</div>
	</div>
	<div class="textslider">
		<div class="js__carousel">%2$s</div>
		<div class="nu__carousel-buttons"></div>
	</div>
';

$guides['slide-image'] = '<div class="slide"><div class="bgimage--container"><div style="background-image: url(%1$s)" class="bgimage"></div></div></div>';
$guides['slide-text'] = '<div class="slide"><div>%1$s</div></div>';





// Create id attribute allowing for custom "anchor" value.
$id = 'nu__carousel-' . $block['id'];

if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}


// Create class attribute allowing for custom "className" and "align" values.
$className = 'nu__carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}

$background_color = get_field('background_color');
$text_color = get_field('text_color');

if( !empty( $background_color ) ){
	$className .= ' has-background';
}

if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

$fields = get_fields();

$slider = $fields['items'] ?: '';

if( $slider && count($slider) ){

	$imageSlides = '';
	$textSlides = '';

	foreach( $slider as $slide ){

		$imageSlides .= sprintf(
			$guides['slide-image']
			,$slide['image']['url']
		);
		
		$textSlides .= sprintf(
			$guides['slide-text']
			,$slide['description']
		);


	}

	
	$return = sprintf(
		$guides['carousel']
		,$imageSlides
		,$textSlides
	);
	
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

<?php echo $return; ?>
<style type="text/css">
	#<?php echo $id; ?> {
		background: <?php echo $background_color; ?>;
		color: <?php echo $text_color; ?>;
	}
</style>
</div>