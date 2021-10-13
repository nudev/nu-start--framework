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
		'nu-blocks/featured-items/type-e',
		array(
			'title'       => 'Feature --- Type E',
			'description' => 'Lorem description ipsum',
			'categories'  => ['featured-items'],
			'keywords'  => ['features', 'nustart'],
			'content'     => '
				<!-- wp:group {"style":{"color":{"background":"#efefef"}},"className":"nu_pattern-is_feature\u002d\u002dis_type_e","layout":{"inherit":false}} -->
				<div class="wp-block-group nu_pattern-is_feature--is_type_e has-background" style="background-color:#efefef"><!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:heading {"level":3} -->
				<h3>Elit Condimentum Purus Justo Fermentum</h3>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"level":4} -->
				<h4>Condimentum Egestas Lorem Fusce</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Nullam id dolor id nibh ultricies vehicula ut id elit.snjdnenf snamds m</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="#feature-type-e">View More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"level":4} -->
				<h4>Condimentum Egestas Lorem Fusce</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Nullam id dolor id nibh ultricies vehicula ut id elit.snjdnenf snamds m</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="#feature-type-e">View More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->

				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"level":4} -->
				<h4>Condimentum Egestas Lorem Fusce</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Nullam id dolor id nibh ultricies vehicula ut id elit.snjdnenf snamds m</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="#feature-type-e">View More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"level":4} -->
				<h4>Condimentum Egestas Lorem Fusce</h4>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Nullam id dolor id nibh ultricies vehicula ut id elit.snjdnenf snamds m</p>
				<!-- /wp:paragraph -->

				<!-- wp:paragraph -->
				<p><a href="#feature-type-e">View More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>