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
		'nu-blocks/showcase-color-palette',
		array(
			'title'       => 'Design Helpers --- Showcase Color Palette',
			'description' => 'Lorem description ipsum',
			'categories'  => ['design-helpers'],
			'keywords'  => ['helpers', 'nu-start'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern\u002d\u002ddesign-helper\u002d\u002dcolor-palette"} -->
				<div class="wp-block-group nu_pattern--design-helper--color-palette"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:group {"className":"is-style-default"} -->
				<div class="wp-block-group is-style-default"><!-- wp:cover {"overlayColor":"black"} -->
				<div class="wp-block-cover has-black-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
				<p class="has-text-align-center has-large-font-size"></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size"><strong>Black</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator is-style-wide"/>
				<!-- /wp:separator -->
				
				<!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>black</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>#000000</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:group {"className":"is-style-default"} -->
				<div class="wp-block-group is-style-default"><!-- wp:cover {"overlayColor":"white"} -->
				<div class="wp-block-cover has-white-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
				<p class="has-text-align-center has-large-font-size"></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size"><strong>White</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator is-style-wide"/>
				<!-- /wp:separator -->
				
				<!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>black</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>#ffffff</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:group {"className":"is-style-default"} -->
				<div class="wp-block-group is-style-default"><!-- wp:cover {"overlayColor":"red"} -->
				<div class="wp-block-cover has-red-background-color has-background-dim"><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
				<p class="has-text-align-center has-large-font-size"></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size"><strong>Red</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator is-style-wide"/>
				<!-- /wp:separator -->
				
				<!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>red-600</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:paragraph -->
				<p>#d41b2c</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>