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
		'nu-blocks/featured-items/type-d',
		array(
			'title'       => 'Feature --- Type D',
			'description' => 'Lorem description ipsum',
			'categories'  => ['featured-items'],
			'keywords'  => ['features', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_feature\u002d\u002dis_type_d"} -->
				<div class="wp-block-group nu_pattern-is_feature--is_type_d"><!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"is-style-display"} -->
				<h2 class="has-text-align-center is-style-display">Lorem ipsum dolor sit amet</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"left"} -->
				<p class="has-text-align-left">Lorem ipsum dolor sit amet consectetur adipisicing elit. Accusamus mollitia vel, doloribus adipisci velit maiores magnam, culpa odio repellat blanditiis magni et, excepturi corrupti provident dolores repellendus ipsa reprehenderit saepe!</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
				
				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
				<div class="wp-block-image is-style-default"><figure class="aligncenter size-large"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt=""/></figure></div>
				<!-- /wp:image -->
				
				<!-- wp:heading {"level":4} -->
				<h4>Nunc ac nisi at nisi efficitur volutpat.</h4>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Nulla ut auctor est. Etiam bibendum pellentesque eleifend. Etiam posuere consectetur vehicula.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column">
				<!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
				<div class="wp-block-image is-style-default"><figure class="aligncenter size-large"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt=""/></figure></div>
				<!-- /wp:image -->
				
				
				
				<!-- wp:heading {"level":4} -->
				<h4>Nunc ac nisi at nisi efficitur volutpat.</h4>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Nulla ut auctor est. Etiam bibendum pellentesque eleifend. Etiam posuere consectetur vehicula.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:image {"align":"center","sizeSlug":"large","linkDestination":"none","className":"is-style-default"} -->
				<div class="wp-block-image is-style-default"><figure class="aligncenter size-large"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt=""/></figure></div>
				<!-- /wp:image -->
				
				<!-- wp:heading {"level":4} -->
				<h4>Nunc ac nisi at nisi efficitur volutpat.</h4>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Nulla ut auctor est. Etiam bibendum pellentesque eleifend. Etiam posuere consectetur vehicula.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>