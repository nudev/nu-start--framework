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
		'nu-blocks/heroes/type-b',
		array(
			'title'       => 'Hero --- Type B',
			'description' => 'Lorem description ipsum',
			'categories'  => ['heroes'],
			'keywords'  => ['hero', 'nustart'],
			'content'     => '
			<!-- wp:group {"align":"full","className":"nu_pattern-is_hero\u002d\u002dis_type_b"} -->
			<div class="wp-block-group alignfull nu_pattern-is_hero--is_type_b" id="hero-type-b"><!-- wp:columns {"align":"full"} -->
			<div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"center"} -->
			<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"backgroundColor":"white","layout":{"inherit":true}} -->
			<div class="wp-block-group has-white-background-color has-background"><!-- wp:heading {"className":"is-style-display"} -->
			<h2 class="is-style-display">Lorem ipsum.<br><strong>dolor sit</strong> amet.</h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph -->
			<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis.</p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons"><!-- wp:button -->
			<div class="wp-block-button"><a class="wp-block-button__link" href="#">Lorem Button Ipsum</a></div>
			<!-- /wp:button --></div>
			<!-- /wp:buttons --></div>
			<!-- /wp:group --></div>
			<!-- /wp:column -->

			<!-- wp:column {"width":"50%"} -->
			<div class="wp-block-column" style="flex-basis:50%"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":298,"dimRatio":0,"minHeight":30,"minHeightUnit":"vw","style":{"color":{}}} -->
			<div class="wp-block-cover" style="min-height:30vw"><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
			<p class="has-text-align-center has-large-font-size"></p>
			<!-- /wp:paragraph --></div></div>
			<!-- /wp:cover --></div>
			<!-- /wp:column --></div>
			<!-- /wp:columns --></div>
			<!-- /wp:group -->
			',
		)
	); 
?>