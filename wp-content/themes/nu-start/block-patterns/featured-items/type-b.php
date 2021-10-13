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
		'nu-blocks/featured-items/type-b',
		array(
			'title'       => 'Feature --- Type B',
			'description' => 'Lorem description ipsum',
			'categories'  => ['featured-items'],
			'keywords'  => ['features', 'nustart'],
			'content'     => '
				<!-- wp:group {"style":{"color":{"background":"#efefef"}},"className":"nu_pattern-is_feature\u002d\u002dis_type_b"} -->
				<div class="wp-block-group nu_pattern-is_feature--is_type_b has-background" style="background-color:#efefef"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:heading {"level":3,"className":"is-style-default"} -->
				<h3 class="is-style-default">Elit Condimentum Purus Justo Fermentum</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Sed posuere consectetur est at lobortis. Duis mollis, est non commodo luctus.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
				
				<!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"15%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:15%"><!-- wp:image {"sizeSlug":"thumbnail","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="'.get_template_directory_uri().'/__lib/img/720x720.png" alt="" /></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":""} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-links-have-arrows","fontSize":"larger"} -->
				<p class="is-style-links-have-arrows has-larger-font-size"><a href="#" target="_blank" rel="noreferrer noopener">Condimentum Egestas Lorem Fusce</a></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo inventore tenetur harum ab mollitia quas amet aliquam?</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				
				<!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"15%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:15%"><!-- wp:image {"sizeSlug":"thumbnail","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="'.get_template_directory_uri().'/__lib/img/720x720.png" alt="" /></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":""} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-links-have-arrows","fontSize":"larger"} -->
				<p class="is-style-links-have-arrows has-larger-font-size"><a href="#" target="_blank" rel="noreferrer noopener">Condimentum Egestas Lorem Fusce</a></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo inventore tenetur harum ab mollitia quas amet aliquam?</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->
				
				<!-- wp:columns {"verticalAlignment":"center"} -->
				<div class="wp-block-columns are-vertically-aligned-center"><!-- wp:column {"verticalAlignment":"center","width":"15%"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:15%"><!-- wp:image {"sizeSlug":"thumbnail","className":"is-style-rounded"} -->
				<figure class="wp-block-image size-thumbnail is-style-rounded"><img src="'.get_template_directory_uri().'/__lib/img/720x720.png" alt="" /></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"verticalAlignment":"center","width":""} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:paragraph {"className":"is-style-links-have-arrows","fontSize":"larger"} -->
				<p class="is-style-links-have-arrows has-larger-font-size"><a href="#" target="_blank" rel="noreferrer noopener">Condimentum Egestas Lorem Fusce</a></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo inventore tenetur harum ab mollitia quas amet aliquam?</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":298,"dimRatio":0,"minHeight":100,"minHeightUnit":"%"} -->
				<div class="wp-block-cover" style="min-height:100%"><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
				<p class="has-text-align-center has-large-font-size"></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>