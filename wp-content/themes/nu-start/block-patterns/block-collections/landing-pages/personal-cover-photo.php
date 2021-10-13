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
		'nu-blocks/landing-pages/personal-cover-photo',
		array(
			'title'       => 'Landing Page - Personal Cover Photo',
			'description' => 'Lorem description ipsum',
			'categories'  => ['landing-pages'],
			'keywords'  => ['landing-pages', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern_collection\u002d\u002dpersonal-cover-photo"} -->
				<div class="wp-block-group alignfull nu_pattern_collection--personal-cover-photo"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","dimRatio":70,"focalPoint":{"x":"0.50","y":0.5},"minHeight":20,"minHeightUnit":"vw","customGradient":"linear-gradient(135deg,rgb(0,0,0) 27%,rgba(0,0,0,0.7) 62%,rgba(0,0,0,0.1) 100%)","align":"full"} -->
				<div class="wp-block-cover alignfull has-background-dim-70 has-background-dim has-background-gradient" style="min-height:20vw"><span aria-hidden="true" class="wp-block-cover__gradient-background" style="background:linear-gradient(135deg,rgb(0,0,0) 27%,rgba(0,0,0,0.7) 62%,rgba(0,0,0,0.1) 100%)"></span><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:columns {"align":"wide"} -->
				<div class="wp-block-columns alignwide"><!-- wp:column {"width":"160px"} -->
				<div class="wp-block-column" style="flex-basis:160px"><!-- wp:image {"id":18,"className":"is-style-rounded"} -->
				<figure class="wp-block-image is-style-rounded"><img src="'.get_template_directory_uri().'/__lib/img/720x720.png" alt="" class="wp-image-18"/></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"50%"} -->
				<div class="wp-block-column" style="flex-basis:50%"><!-- wp:heading {"className":"is-style-display"} -->
				<h2 class="is-style-display">Lucas Troup</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size">PhD Candidate in Interdisciplinary Engineering</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:group -->
				
				<!-- wp:group -->
				<div class="wp-block-group"><!-- wp:heading {"level":3} -->
				<h3>Risus Parturient Sit</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Aenean lacinia bibendum nulla sed consectetur.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"className":"is-style-card-outlined"} -->
				<div class="wp-block-group is-style-card-outlined"><!-- wp:image {"id":21,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="" class=""/></figure>
				<!-- /wp:image -->
				
				<!-- wp:paragraph -->
				<p>"Card" With Image</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Aenean lacinia bibendum nulla sed consectetur.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph {"className":"is-style-links-have-arrows"} -->
				<p class="is-style-links-have-arrows"><a href="#">Read More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"className":"is-style-card-outlined"} -->
				<div class="wp-block-group is-style-card-outlined"><!-- wp:image {"id":21,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="" class=""/></figure>
				<!-- /wp:image -->
				
				<!-- wp:paragraph -->
				<p>"Card" With Image</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Aenean lacinia bibendum nulla sed consectetur.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph {"className":"is-style-links-have-arrows"} -->
				<p class="is-style-links-have-arrows"><a href="#">Read More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"className":"is-style-card-outlined"} -->
				<div class="wp-block-group is-style-card-outlined"><!-- wp:image {"id":21,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="" class=""/></figure>
				<!-- /wp:image -->
				
				<!-- wp:paragraph -->
				<p>"Card" With Image</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Aenean lacinia bibendum nulla sed consectetur.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph {"className":"is-style-links-have-arrows"} -->
				<p class="is-style-links-have-arrows"><a href="#">Read More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:group {"className":"is-style-card-outlined"} -->
				<div class="wp-block-group is-style-card-outlined"><!-- wp:image {"id":21,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="" class=""/></figure>
				<!-- /wp:image -->
				
				<!-- wp:paragraph -->
				<p>"Card" With Image</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Integer posuere erat a ante venenatis dapibus posuere velit aliquet.Aenean lacinia bibendum nulla sed consectetur.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph {"className":"is-style-links-have-arrows"} -->
				<p class="is-style-links-have-arrows"><a href="#">Read More</a></p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
				
				<!-- wp:columns {"className":"is-style-justify-space-between"} -->
				<div class="wp-block-columns is-style-justify-space-between"><!-- wp:column {"verticalAlignment":"center","width":"960px"} -->
				<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:960px"><!-- wp:heading {"level":3} -->
				<h3>Service-Learning Course-Community Collaboration Award</h3>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>This award celebrates excellence in the Service-Learning Program at Northeastern. It honors individuals or groups who went above and beyond their prescribed roles to contribute to a meaningful partnership that benefits the community while enhancing student learning and/or faculty scholarship.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Each year, the Service-Learning Program asks our network to nominate any collaboration of students, faculty, or community partners for this award. The award will be paused in 2019–2020 while we re-imagine how to celebrate and honor exceptional partnerships.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"420px"} -->
				<div class="wp-block-column" style="flex-basis:420px"><!-- wp:image {"id":21,"sizeSlug":"full","linkDestination":"none"} -->
				<figure class="wp-block-image size-full"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="" class=""/></figure>
				<!-- /wp:image --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns -->			
			',
		)
	); 
?>