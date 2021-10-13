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
		'nu-blocks/heroes/banner-type-c',
		array(
			'title'       => 'Hero - Banner - Type C',
			'description' => 'Lorem description ipsum',
			'categories'  => ['heroes'],
			'keywords'  => ['hero', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern-is_hero_banner\u002d\u002dtype-c"} -->
				<div class="wp-block-group alignfull nu_pattern-is_hero_banner--type-c" id="banner-type-c"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","dimRatio":0,"focalPoint":{"x":"0.50","y":0.5},"minHeight":20,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull" style="min-height:20vw"><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"gradient":"linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"}},"layout":{"inherit":true}} -->
				<div class="wp-block-group has-background" style="background:linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"><!-- wp:heading {"className":"is-style-display"} -->
				<h2 class="is-style-display">Lorem Title Text Ipsum</h2>
				<!-- /wp:heading --></div>
				<!-- /wp:group --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:group -->	
			',
		)
	); 
?>