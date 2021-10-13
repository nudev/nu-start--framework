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
		'nu-blocks/showcase-people/type-a',
		array(
			'title'       => 'Showcase People - Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['showcase-content'],
			'keywords'  => ['showcase-people', 'featured', 'people', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_featured_people\u002d\u002dis_type_a"} -->
				<div class="wp-block-group nu_pattern-is_featured_people--is_type_a"><!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"is-style-display"} -->
				<h2 class="has-text-align-center is-style-display">Lorem ipsum <strong>dolor sit</strong> amet</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium ipsum augue, ac egestas sapien commodo a. Nam id rutrum nunc. Ut scelerisque mollis libero. Duis eu mauris efficitur, varius mi vehicula, placerat nisl. Cras luctus sapien in ante fringilla sodales. Morbi nec quam eleifend diam iaculis consectetur. Pellentesque suscipit pharetra purus ac ultrices. Mauris urna velit, tempor fringilla lobortis a, venenatis non purus.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
				
				<!-- wp:acf/posts-grid {"id":"block_60dc9ab90849a","name":"acf/posts-grid","data":{"options_columns":"5","_options_columns":"field_60b64c22f5171","options_show_filter":"0","_options_show_filter":"field_60b64c42f5172","options_pagination":"0","_options_pagination":"field_60b64c49f5173","options_autoselect":"1","_options_autoselect":"field_60c2520e28a92","options":"","_options":"field_60b64c1af5170","autoselect_posts_post_type":"nu_people","_autoselect_posts_post_type":"field_60d208713a1fe","autoselect_posts_limit_number":"5","_autoselect_posts_limit_number":"field_60c258147cc96","autoselect_posts_people_category":"","_autoselect_posts_people_category":"field_60c258747cc98","autoselect_posts_people_tags":"","_autoselect_posts_people_tags":"field_60c258887cc99","autoselect_posts":"","_autoselect_posts":"field_60c257da7f635","post_style_no_blocks":"0","_post_style_no_blocks":"field_60dca45127acf","post_style_has_links":"1","_post_style_has_links":"field_60dde44ad8400","post_style":"","_post_style":"field_60dca3e327acd"},"align":"","mode":"preview","wpClassName":"wp-block-acf-posts-grid"} /-->
				
				<!-- wp:buttons {"contentJustification":"center"} -->
				<div class="wp-block-buttons is-content-justification-center"><!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link" href="#">Lorem See More Ipsum</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>