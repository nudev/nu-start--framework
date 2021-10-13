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
		'nu-blocks/featured-items/type-a',
		array(
			'title'       => 'Feature --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['featured-items'],
			'keywords'  => ['features', 'nustart'],
			'content'     => '
				<!-- wp:group {"style":{"color":{"background":"#efefef"}},"className":"nu_pattern-is_feature\u002d\u002dis_type_a","layout":{"inherit":false}} -->
				<div id="Feature-Type-A" class="wp-block-group nu_pattern-is_feature--is_type_a has-background" style="background-color:#efefef"><!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"width":"720px"} -->
				<div class="wp-block-column" style="flex-basis:720px"><!-- wp:paragraph -->
				<p><strong>Sed posuere</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:heading {"level":4,"className":"is-style-default"} -->
				<h4 class="is-style-default">Elit Condimentum Purus Justo Fermentum</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus mollitia vel, doloribus adipisci velit maiores magnam, culpa odio repellat blanditiis magni et, excepturi corrupti provident dolores repellendus ipsa reprehenderit saepe!</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:heading {"level":4} -->
				<h4>Venenatis Malesuada</h4>
				<!-- /wp:heading -->

				<!-- wp:group {"className":"feature-is_type_a-navlinks"} -->
				<div class="wp-block-group feature-is_type_a-navlinks"><!-- wp:paragraph {"className":"is-style-links-have-arrows"} -->
				<p class="is-style-links-have-arrows"><a href="#">Link example 1</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"is-style-links-have-arrows"} -->
				<p class="is-style-links-have-arrows"><a href="#">Link example 2</a></p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph {"className":"is-style-links-have-arrows"} -->
				<p class="is-style-links-have-arrows"><a href="#">Link example 3</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->

				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":""} -->
				<div class="wp-block-column"></div>
				<!-- /wp:column -->

				<!-- wp:column {"width":"600px"} -->
				<div class="wp-block-column" style="flex-basis:600px"><!-- wp:paragraph {"className":"is-style-default","fontSize":"larger"} -->
				<p class="is-style-default has-larger-font-size"><strong>Amet Pellentesque</strong></p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"align":"full"} -->
				<div class="wp-block-buttons alignfull"><!-- wp:button {"className":"is-style-card"} -->
				<div class="wp-block-button is-style-card"><a class="wp-block-button__link" href="#">Lorem as a Button</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-card"} -->
				<div class="wp-block-button is-style-card"><a class="wp-block-button__link" href="#">Lorem as a Button</a></div>
				<!-- /wp:button -->

				<!-- wp:button {"className":"is-style-card"} -->
				<div class="wp-block-button is-style-card"><a class="wp-block-button__link" href="#">Lorem as a Button</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>