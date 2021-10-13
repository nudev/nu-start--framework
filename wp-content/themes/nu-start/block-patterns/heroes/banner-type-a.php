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
		'nu-blocks/heroes/banner-type-a',
		array(
			'title'       => 'Hero - Banner - Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['heroes'],
			'keywords'  => ['hero', 'nustart'],
			'content'     => '
				<!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","dimRatio":0,"minHeight":30,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull" style="min-height:30vw"><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"60%","style":{"color":{"gradient":"linear-gradient(135deg,rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.8) 100%)"}}} -->
				<div class="wp-block-column has-background" style="background:linear-gradient(135deg,rgba(0,0,0,0.8) 0%,rgba(0,0,0,0.8) 100%);flex-basis:60%"><!-- wp:paragraph {"fontSize":"smaller"} -->
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
				<!-- /wp:cover -->
			',
		)
	); 
?>