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
		'nu-blocks/person-templates/version-1',
		array(
			'title'       => 'Person Templates --- Version 1',
			'description' => 'Lorem description ipsum',
			'categories'  => ['person-templates'],
			'keywords'  => ['person', 'templates', 'nustart'],
			'content'     => '
				<!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:columns {"backgroundColor":"blue","textColor":"white"} -->
				<div class="wp-block-columns has-white-color has-blue-background-color has-text-color has-background"><!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"><!-- wp:paragraph -->
				<p>We build a template here then we just save it as a pattern. Those are easy to add.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Ideally, everything can go inside the dedicated ACF block for this, so we have more control if we need it.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"><!-- wp:heading {"textAlign":"center"} -->
				<h2 class="has-text-align-center">Initial Pattern Scaffold</h2>
				<!-- /wp:heading --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>