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
		'nu-blocks/heroes/type-c',
		array(
			'title'       => 'Hero --- Type C',
			'description' => 'Lorem description ipsum',
			'categories'  => ['heroes'],
			'keywords'  => ['hero', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern-is_hero\u002d\u002dis_type_c"} -->
				<div class="wp-block-group alignfull nu_pattern-is_hero--is_type_c"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","dimRatio":30,"contentPosition":"center center","align":"full"} -->
				<div class="wp-block-cover alignfull has-background-dim-30 has-background-dim"><img class="wp-block-cover__image-background" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"align":"full"} -->
				<div class="wp-block-group alignfull"><!-- wp:heading {"textAlign":"center","level":1,"align":"full","className":"is-style-display"} -->
				<h1 class="alignfull has-text-align-center is-style-display">Lorem ipsum <strong>dolor sit amet</strong></h1>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit. Sed vel maximus magna. Nullam at sapien sodales, convallis nunc sit amet, commodo felis. Maecenas faucibus augue eget metus porta, tempor aliquam nisi molestie. Curabitur sit amet sem in diam vestibulum tempus quis eget ligula.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"contentJustification":"center"} -->
				<div class="wp-block-buttons is-content-justification-center"><!-- wp:button {"className":"is-style-playhead"} -->
				<div class="wp-block-button is-style-playhead"><a class="wp-block-button__link" href="#" target="_blank" rel="noreferrer noopener">Lorem Video Button</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group --></div></div>
				<!-- /wp:cover -->

				<!-- wp:group {"align":"full","layout":{"inherit":true}} -->
				<div class="wp-block-group alignfull"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","className":"is-style-display"} -->
				<h2 class="has-text-align-center is-style-display"><strong>Pathway</strong> Title</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit. Sed vel maximus magna. Nullam at sapien sodales, convallis nunc sit amet, commodo felis. Maecenas faucibus augue eget metus porta, tempor aliquam nisi molestie. Curabitur sit amet sem in diam vestibulum tempus quis eget ligula.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"contentJustification":"center"} -->
				<div class="wp-block-buttons is-content-justification-center"><!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link">Link to Page</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:column -->

				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:heading {"textAlign":"center","className":"is-style-display"} -->
				<h2 class="has-text-align-center is-style-display"><strong>Pathway</strong> Title</h2>
				<!-- /wp:heading -->

				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit. Sed vel maximus magna. Nullam at sapien sodales, convallis nunc sit amet, commodo felis. Maecenas faucibus augue eget metus porta, tempor aliquam nisi molestie. Curabitur sit amet sem in diam vestibulum tempus quis eget ligula.</p>
				<!-- /wp:paragraph -->

				<!-- wp:buttons {"contentJustification":"center"} -->
				<div class="wp-block-buttons is-content-justification-center"><!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link">Link to Page</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>