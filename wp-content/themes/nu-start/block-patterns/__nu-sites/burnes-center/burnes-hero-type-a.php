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
		'nu-blocks/nu-sites/burnes-hero-type-a',
		array(
			'title'       => '(Burnes) Hero --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['nu-sites'],
			'keywords'  => ['nu-sites'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"burnes_lp\u002d\u002dhero cover_tucks_next_block"} -->
				<div class="wp-block-group alignfull burnes_lp--hero cover_tucks_next_block"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":298,"dimRatio":0,"minHeight":30,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull" style="min-height:30vw"><img class="wp-block-cover__image-background" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"580px","style":{"color":{"background":"#0c3354"}},"textColor":"white"} -->
				<div class="wp-block-column has-white-color has-text-color has-background" style="background-color:#0c3354;flex-basis:580px"><!-- wp:heading {"level":3} -->
				<h3>Social Change @ Northeastern</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>The Burnes Center builds on the many social impact projects taking place across Northeastern’s colleges and schools.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:group -->
				
				<!-- wp:columns {"align":"full"} -->
				<div class="wp-block-columns alignfull"><!-- wp:column {"width":"40%","backgroundColor":"white"} -->
				<div class="wp-block-column has-white-background-color has-background" style="flex-basis:40%"><!-- wp:acf/breadcrumbs {"id":"block_61572ebd499b5","name":"acf/breadcrumbs","align":"center","mode":"preview","wpClassName":"wp-block-acf-breadcrumbs aligncenter"} /--></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
			',
		)
	); 

	
?>