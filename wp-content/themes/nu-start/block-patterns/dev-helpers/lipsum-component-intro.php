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
		'nu-blocks/dev-helpers/lipsum-component-intro',
		array(
			'title'       => 'Dev Helpers --- Lipsum Component Intro',
			'description' => 'Lorem description ipsum',
			'categories'  => ['dev-helpers'],
			'keywords'  => ['dev', 'dev-helpers', 'helpers', 'helper', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"is-style-card-outlined"} -->
				<div class="wp-block-group is-style-card-outlined"><!-- wp:heading {"level":4,"className":"is-style-display"} -->
				<h4 class="is-style-display">Lipsum Component </h4>
				<!-- /wp:heading -->
				
				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group -->
				<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size"><strong>What is Lipsum Component?</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:list -->
				<ul><li>..........</li></ul>
				<!-- /wp:list --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"><!-- wp:group -->
				<div class="wp-block-group"><!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size"><strong>Explaining the demo below:</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:list -->
				<ul><li>..........</li></ul>
				<!-- /wp:list --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>