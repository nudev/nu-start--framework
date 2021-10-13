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
		'nu-blocks/heroes/banner-type-b',
		array(
			'title'       => 'Hero - Banner - Type B',
			'description' => 'Lorem description ipsum',
			'categories'  => ['heroes'],
			'keywords'  => ['hero', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern-is_hero_banner\u002d\u002dtype-b"} -->
				<div class="wp-block-group alignfull nu_pattern-is_hero_banner--type-b" id="banner-type-b"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","focalPoint":{"x":"0.50","y":0.75},"minHeight":30,"minHeightUnit":"vw","customGradient":"linear-gradient(135deg,rgb(0,0,0) 27%,rgba(0,0,0,0.7) 47%,rgba(0,0,0,0.1) 71%)","align":"full"} -->
				<div class="wp-block-cover alignfull has-background-dim has-background-gradient" style="min-height:30vw"><span aria-hidden="true" class="wp-block-cover__gradient-background" style="background:linear-gradient(135deg,rgb(0,0,0) 27%,rgba(0,0,0,0.7) 47%,rgba(0,0,0,0.1) 71%)"></span><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" style="object-position:50% 75%" data-object-fit="cover" data-object-position="50% 75%"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"60%"} -->
				<div class="wp-block-column" style="flex-basis:60%"><!-- wp:paragraph {"fontSize":"smaller"} -->
				<p class="has-smaller-font-size">Pre title</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:heading {"className":"is-style-display"} -->
				<h2 class="is-style-display">Events</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>City and Community Engagement and its partners regularly host events that are open to the public. Search this calendar to learn about our upcoming events.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:group -->			
			',
		)
	); 
?>