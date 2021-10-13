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
		'nu-blocks/heroes/type-e',
		array(
			'title'       => 'Hero --- Type E',
			'description' => 'Lorem description ipsum',
			'categories'  => ['heroes'],
			'keywords'  => ['hero', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern-is_hero\u002d\u002dis_type_e"} -->
				<div class="wp-block-group alignfull nu_pattern-is_hero--is_type_e"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":49,"dimRatio":30,"overlayColor":"black","minHeight":30,"minHeightUnit":"vw","align":"full","className":"cover_tucks_next_block"} -->
				<div class="wp-block-cover alignfull has-background-dim-30 has-black-background-color has-background-dim cover_tucks_next_block" style="min-height:30vw"><img class="wp-block-cover__image-background wp-image-49" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"align":"full","className":"is-style-display"} -->
				<h1 class="alignfull has-text-align-center is-style-display">Lorem ipsum <strong>dolor sit</strong> amet</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit. Sed vel maximus magna. Nullam at sapien sodales, convallis nunc sit amet, commodo felis. Maecenas faucibus augue eget metus porta, tempor aliquam nisi molestie. Curabitur sit amet sem in diam vestibulum tempus quis eget ligula.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="#">Call to Action</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"className":"is-style-outline"} -->
				<div class="wp-block-button is-style-outline"><a class="wp-block-button__link" href="#">Call to Action</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons -->
				
				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-playhead"} -->
				<div class="wp-block-button is-style-playhead"><a class="wp-block-button__link" href="#" target="_blank" rel="noreferrer noopener">Informative Video Popup</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:group {"layout":{"inherit":false}} -->
				<div class="wp-block-group"><!-- wp:cover {"overlayColor":"dark-blue","minHeight":20,"minHeightUnit":"vw","className":"cover_tucks_next_block"} -->
				<div class="wp-block-cover has-dark-blue-background-color has-background-dim cover_tucks_next_block" style="min-height:20vw"><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","align":"full","className":"is-style-display"} -->
				<h2 class="alignfull has-text-align-center is-style-display">Lorem ipsum dolor sit amet</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis. Pellentesque convallis molestie felis a accumsan. Fusce augue felis, venenatis sed justo eu, gravida mollis elit. Sed vel maximus magna. Nullam at sapien sodales, convallis nunc sit amet, commodo felis. Maecenas faucibus augue eget metus porta, tempor aliquam nisi molestie. Curabitur sit amet sem in diam vestibulum tempus quis eget ligula.</p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button {"className":"is-style-card"} -->
				<div class="wp-block-button is-style-card"><a class="wp-block-button__link" href="#">Link to Content</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"className":"is-style-card"} -->
				<div class="wp-block-button is-style-card"><a class="wp-block-button__link" href="#">Link to Content</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"className":"is-style-card"} -->
				<div class="wp-block-button is-style-card"><a class="wp-block-button__link" href="#">Link to Content</a></div>
				<!-- /wp:button -->
				
				<!-- wp:button {"className":"is-style-card"} -->
				<div class="wp-block-button is-style-card"><a class="wp-block-button__link" href="#">Link to Content</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group --></div>
				<!-- /wp:group --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>