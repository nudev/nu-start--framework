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
		'nu-blocks/stat-highlights/type-c',
		array(
			'title'       => 'Stat Highlights --- Type C',
			'description' => 'Lorem description ipsum',
			'categories'  => ['stat-highlights'],
			'keywords'  => ['stats', 'nustart'],
			'content'     => '
				<!-- wp:group {"className":"nu_pattern-is_stat_highlight\u002d\u002dis_type_c"} -->
				<div id="stat-type-c" class="wp-block-group nu_pattern-is_stat_highlight--is_type_c"><!-- wp:columns {"verticalAlignment":"center","className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns are-vertically-aligned-center is-style-justify-space-between"><!-- wp:column {"verticalAlignment":"center","width":"60%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:60%"><!-- wp:heading {"level":3} -->
				<h3>Elit Condimentum Purus Justo Fermentum</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size">Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Cras mattis consectetur purus sit amet fermentum.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":"420px"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:420px"><!-- wp:image {"align":"center","id":1929,"sizeSlug":"full","linkDestination":"none"} -->
				<div class="wp-block-image"><figure class="aligncenter size-full"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="" class="wp-image-1929"/></figure></div>
				<!-- /wp:image --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				
				<!-- wp:separator {"color":"nu-brand-black","className":"is-style-wide"} -->
				<hr class="wp-block-separator has-text-color has-background has-nu-brand-black-background-color has-nu-brand-black-color is-style-wide"/>
				<!-- /wp:separator -->
				
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