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
		'nu-blocks/stat-highlights/type-b',
		array(
			'title'       => 'Stat Highlights --- Type B',
			'description' => 'Lorem description ipsum',
			'categories'  => ['stat-highlights'],
			'keywords'  => ['stats', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_stat_highlight\u002d\u002dis_type_b"} -->
				<div id="stat-type-b" class="wp-block-group nu_pattern-is_stat_highlight--is_type_b"><!-- wp:heading {"textAlign":"center","level":3} -->
				<h3 class="has-text-align-center">Elit Condimentum Purus Justo Fermentum</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center","fontSize":"larger"} -->
				<p class="has-text-align-center has-larger-font-size">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display"><strong>97</strong></h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Elit Condimentum Purus Justo Fermentum</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display"><strong>100</strong></h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Elit Condimentum Purus Justo Fermentum</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display"><strong>38</strong></h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Elit Condimentum Purus Justo Fermentum</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->			
			',
		)
	); 
?>