<?php

	/**
	 * title (required): A human-readable title for the pattern.
	 * content (required): Block HTML Markup for the pattern.
	 * description (optional): A visually hidden text used to describe the pattern in the inserter. A description is optional but it is strongly encouraged when the title does not fully describe what the pattern does. The description will help users discover the pattern while searching.
	 * categories (optional): An array of registered pattern categories used to group block patterns. Block patterns can be shown on multiple categories. A category must be registered separately in order to be used here.
	 * keywords (optional): An array of aliases or keywords that help users discover the pattern while searching.
	 * viewportWidth (optional): An integer specifying the intended width of the pattern to allow for a scaled preview of the pattern in the inserter.
	 */
	register_block_pattern(
		'nu-blocks/interior-pages/generic-post',
		array(
			'title'       => 'Interior Page - Generic Post',
			'description' => 'Lorem description ipsum',
			'categories'  => ['interior-pages'],
			'keywords'  => ['interior-pages', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern-is_hero_banner\u002d\u002dtype-c"} -->
				<div class="wp-block-group alignfull nu_pattern-is_hero_banner--type-c" id="banner-type-c"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","dimRatio":30,"overlayColor":"black","focalPoint":{"x":"0.50","y":0.5},"minHeight":20,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull has-background-dim-30 has-black-background-color has-background-dim" style="min-height:20vw"><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"gradient":"linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"}},"layout":{"inherit":true}} -->
				<div class="wp-block-group has-background" style="background:linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"><!-- wp:heading {"className":"is-style-display"} -->
				<h2 class="is-style-display">Lipsum Interior Page Example</h2>
				<!-- /wp:heading --></div>
				<!-- /wp:group --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:group -->
				
				<!-- wp:group -->
				<div class="wp-block-group"><!-- wp:heading -->
				<h2>Risus Dolor Parturient Quam Cursus</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Nullam id dolor id nibh ultricies vehicula ut id elit. Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
				
				<!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading {"level":3} -->
				<h3>Pellentesque Sollicitudin</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":400} -->
				<div class="wp-block-image"><figure class="aligncenter is-resized"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="Pharmacist with drugs" width="400"/><figcaption>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam id dolor id nibh ultricies vehicula ut id elit</figcaption></figure></div>
				<!-- /wp:image --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				
				<!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","width":400} -->
				<div class="wp-block-image"><figure class="aligncenter is-resized"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="Pharmacist with drugs" width="400"/><figcaption>Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Nullam id dolor id nibh ultricies vehicula ut id elit</figcaption></figure></div>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":"50%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:50%"><!-- wp:heading {"level":3} -->
				<h3>Pellentesque Sollicitudin</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Donec id elit non mi porta gravida at eget metus. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Praesent commodo cursus magna, vel scelerisque nisl consectetur et. Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Integer posuere erat a ante venenatis dapibus posuere.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->			
			',
		)
	); 
?>