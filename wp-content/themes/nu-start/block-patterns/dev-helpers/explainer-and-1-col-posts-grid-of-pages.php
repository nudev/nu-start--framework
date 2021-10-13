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
		'nu-blocks/dev-helpers/explainer-and-1-col-posts-grid-of-pages',
		array(
			'title'       => 'Dev Helpers --- Explainer and 1-col Posts Grid of Pages',
			'description' => 'Lorem description ipsum',
			'categories'  => ['dev-helpers'],
			'keywords'  => ['dev', 'dev-helpers', 'helpers', 'helper', 'nustart'],
			'content'     => '
				<!-- wp:group -->
				<div class="wp-block-group"><!-- wp:heading {"textAlign":"center"} -->
				<h2 class="has-text-align-center"><strong>Custom blocks</strong> that answer our needs directly.</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">(explain why and how we are using ACF blocks to layer our required behavior in sooner)</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:acf/posts-grid {"id":"block_611556005617b","name":"acf/posts-grid","data":{"options_columns":"1","_options_columns":"field_60b64c22f5171","options_show_filter":"0","_options_show_filter":"field_60b64c42f5172","options_pagination":"0","_options_pagination":"field_60b64c49f5173","options_autoselect":"0","_options_autoselect":"field_60c2520e28a92","options":"","_options":"field_60b64c1af5170","select_posts":["283","314","417"],"_select_posts":"field_60b64beef516f"},"align":"","mode":"preview","wpClassName":"wp-block-acf-posts-grid"} /--></div>
				<!-- /wp:group -->
			',
		)
	); 
?>