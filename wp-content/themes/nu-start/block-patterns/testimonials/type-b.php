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
		'nu-blocks/testimonials/type-b',
		array(
			'title'       => 'Testimonials --- Type B',
			'description' => 'Lorem description ipsum',
			'categories'  => ['testimonials'],
			'keywords'  => ['testimonial', 'testimonial', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_testimonial\u002d\u002dis_type_b"} -->
				<div class="wp-block-group nu_pattern-is_testimonial--is_type_b"><!-- wp:image {"align":"center","width":180,"height":180,"sizeSlug":"medium","linkDestination":"none","className":"is-style-rounded"} -->
				<div class="wp-block-image is-style-rounded"><figure class="aligncenter size-medium is-resized"><img src="'.get_template_directory_uri().'/__lib/img/720x720.png" alt="" width="180" height="180"/><figcaption>Lorem Optional Caption Ipsum</figcaption></figure></div>
				<!-- /wp:image -->
				
				<!-- wp:pullquote -->
				<figure class="wp-block-pullquote"><blockquote><p>Etiam sed lacinia turpis. Etiam et dolor eros. Sed lectus ligula, fermentum ullamcorper gravida id, aliquet ut metus. Ut ut ligula eu dolor luctus pretium sit amet id nibh. Praesent lobortis ipsum libero.</p><cite><strong>Lorem Source Name Ipsum</strong><br>Lorem Citations Ipsum</cite></blockquote></figure>
				<!-- /wp:pullquote --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>