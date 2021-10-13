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
		'nu-blocks/heroes/type-a',
		array(
			'title'       => 'Hero --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['heroes'],
			'keywords'  => ['hero', 'nustart'],
			'content'     => '
				<!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":49,"dimRatio":30,"minHeight":30,"minHeightUnit":"vw","contentPosition":"center center","align":"full","className":"nu_pattern-is_hero\u002d\u002dis_type_a"} -->
				<div class="wp-block-cover alignfull has-background-dim-30 has-background-dim nu_pattern-is_hero--is_type_a" style="min-height:30vw"><img class="wp-block-cover__image-background wp-image-49" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":1,"className":"is-style-display"} -->
				<h1 class="is-style-display">Vivamus <strong>varius sagittis</strong> nisl,<br>ut <strong>faucibus est</strong> vehicula nec</h1>
				<!-- /wp:heading --></div></div>
				<!-- /wp:cover -->
			',
		)
	); 
?>