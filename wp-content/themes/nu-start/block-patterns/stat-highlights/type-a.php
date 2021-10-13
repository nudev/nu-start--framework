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
		'nu-blocks/stat-highlights/type-a',
		array(
			'title'       => 'Stat Highlights --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['stat-highlights'],
			'keywords'  => ['stats', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_stat_highlight\u002d\u002dis_type_a"} -->
				<div class="wp-block-group nu_pattern-is_stat_highlight--is_type_a"><!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4,"className":"is-style-default"} -->
				<h4 class="is-style-default">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Nam id accumsan odio, condimentum accumsan lorem. Aliquam nec bibendum erat. Maecenas ac est eu felis sodales viverra nec quis ligula.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display">100</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				
				<!-- wp:separator {"color":"black","className":"is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-background has-black-background-color has-black-color is-style-wide"/>
				<!-- /wp:separator -->
				
				<!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display">100</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4} -->
				<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Nam id accumsan odio, condimentum accumsan lorem. Aliquam nec bibendum erat. Maecenas ac est eu felis sodales viverra nec quis ligula.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				
				<!-- wp:separator {"color":"black","className":"is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-background has-black-background-color has-black-color is-style-wide"/>
				<!-- /wp:separator -->
				
				<!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"level":4} -->
				<h4>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</h4>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Nam id accumsan odio, condimentum accumsan lorem. Aliquam nec bibendum erat. Maecenas ac est eu felis sodales viverra nec quis ligula.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:heading {"textAlign":"center","level":1,"className":"is-style-display"} -->
				<h1 class="has-text-align-center is-style-display">100</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"align":"center"} -->
				<p class="has-text-align-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>