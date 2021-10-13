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
		'nu-blocks/case-studies/type-a',
		array(
			'title'       => 'Case Study --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['case-studies'],
			'keywords'  => ['case', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_case_study\u002d\u002dis_type_a has_tucked_corners"} -->
				<div class="wp-block-group nu_pattern-is_case_study--is_type_a has_tucked_corners"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"66.66%","backgroundColor":"white"} -->
				<div class="wp-block-column has-white-background-color has-background" style="flex-basis:66.66%"><!-- wp:group -->
				<div class="wp-block-group"><!-- wp:heading {"level":5} -->
				<h5>Lorem Ipsum</h5>
				<!-- /wp:heading -->
				
				<!-- wp:heading {"className":"is-style-display"} -->
				<h2 class="is-style-display">Lorem Ipsum</h2>
				<!-- /wp:heading --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"33.33%"} -->
				<div class="wp-block-column" style="flex-basis:33.33%"></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				
				<!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":49,"dimRatio":30,"minHeight":600,"align":"full","style":{"color":{}}} -->
				<div class="wp-block-cover alignfull has-background-dim-30 has-background-dim" style="min-height:600px"><img class="wp-block-cover__image-background wp-image-49" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"fontSize":"large"} -->
				<p class="has-large-font-size"></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"33.33%"} -->
				<div class="wp-block-column" style="flex-basis:33.33%"></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"66.66%","backgroundColor":"white"} -->
				<div class="wp-block-column has-white-background-color has-background" style="flex-basis:66.66%"><!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In suscipit pretium tempor. Praesent sodales turpis nec nisi vestibulum aliquam. Quisque quis est non lacus ultrices mollis vel sit amet arcu. Vivamus ut fermentum ex. Phasellus nibh nibh, posuere in laoreet at, porttitor vitae metus. Etiam accumsan fringilla iaculis. Pellentesque sagittis libero eget pretium efficitur. Phasellus nisi leo, pellentesque in ligula a, vehicula malesuada ipsum.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>