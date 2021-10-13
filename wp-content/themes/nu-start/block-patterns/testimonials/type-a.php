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
		'nu-blocks/testimonials/type-a',
		array(
			'title'       => 'Testimonials --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['testimonials'],
			'keywords'  => ['testimonial', 'testimonial', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_testimonial\u002d\u002dis_type_a","layout":{"inherit":false}} -->
				<div class="wp-block-group nu_pattern-is_testimonial--is_type_a"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"verticalAlignment":"center","width":"20%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:20%"><!-- wp:image {"align":"center","sizeSlug":"medium","linkDestination":"none","className":"is-style-rounded"} -->
				<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-medium"><img src="'.get_template_directory_uri().'/__lib/img/720x720.png" /><figcaption>Lorem Optional Caption Ipsum</figcaption></figure></div>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":""} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:pullquote -->
				<figure class="wp-block-pullquote"><blockquote><p>Etiam sed lacinia turpis. Etiam et dolor eros. Sed lectus ligula, fermentum ullamcorper gravida id, aliquet ut metus. Ut ut ligula eu dolor luctus pretium sit amet id nibh. Praesent lobortis ipsum libero.</p><cite><strong>Lorem Source Name Ipsum</strong><br>Lorem Citations Ipsum</cite></blockquote></figure>
				<!-- /wp:pullquote --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>