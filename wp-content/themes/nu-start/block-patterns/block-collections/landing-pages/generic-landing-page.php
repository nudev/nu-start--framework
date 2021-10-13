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
		'nu-blocks/landing-pages/generic-landing-page',
		array(
			'title'       => 'Landing Page - Generic',
			'description' => 'Lorem description ipsum',
			'categories'  => ['landing-pages'],
			'keywords'  => ['landing-pages', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern-is_hero\u002d\u002dis_type_b"} -->
				<div class="wp-block-group alignfull nu_pattern-is_hero--is_type_b" id="hero-type-b"><!-- wp:columns {"align":"full"} -->
				<div class="wp-block-columns alignfull"><!-- wp:column {"verticalAlignment":"center"} -->
				<div class="wp-block-column is-vertically-aligned-center"><!-- wp:group {"backgroundColor":"white","layout":{"inherit":true}} -->
				<div class="wp-block-group has-white-background-color has-background"><!-- wp:heading {"className":"is-style-display"} -->
				<h2 class="is-style-display">Lorem ipsum.<br><strong>dolor sit</strong> amet.</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc feugiat nisl lacus, sed tristique orci finibus sit amet. Mauris et aliquet ex. Donec rutrum nisl sit amet enim tristique lobortis.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button -->
				<div class="wp-block-button"><a class="wp-block-button__link" href="#">Lorem Button Ipsum</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"66%"} -->
				<div class="wp-block-column" style="flex-basis:66%"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":298,"dimRatio":0,"minHeight":30,"minHeightUnit":"vw","style":{"color":{}}} -->
				<div class="wp-block-cover" style="min-height:30vw"><img class="wp-block-cover__image-background " alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
				<p class="has-text-align-center has-large-font-size"></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
				
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
				
				<!-- wp:group {"className":"nu_pattern-is_featured_events\u002d\u002dis_type_a"} -->
				<div class="wp-block-group nu_pattern-is_featured_events--is_type_a"><!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"is-style-display"} -->
				<h2 class="has-text-align-center is-style-display">Lorem ipsum <strong>dolor sit</strong> amet</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium ipsum augue, ac egestas sapien commodo a. Nam id rutrum nunc. Ut scelerisque mollis libero. Duis eu mauris efficitur, varius mi vehicula, placerat nisl. Cras luctus sapien in ante fringilla sodales. Morbi nec quam eleifend diam iaculis consectetur. Pellentesque suscipit pharetra purus ac ultrices. Mauris urna velit, tempor fringilla lobortis a, venenatis non purus.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
				
				<!-- wp:acf/posts-grid {"id":"block_60dc9ab90849a","name":"acf/posts-grid","data":{"options_columns":"2","_options_columns":"field_60b64c22f5171","options_show_filter":"0","_options_show_filter":"field_60b64c42f5172","options_pagination":"0","_options_pagination":"field_60b64c49f5173","options_autoselect":"1","_options_autoselect":"field_60c2520e28a92","options":"","_options":"field_60b64c1af5170","autoselect_posts_post_type":"nu_events","_autoselect_posts_post_type":"field_60d208713a1fe","autoselect_posts_limit_number":"2","_autoselect_posts_limit_number":"field_60c258147cc96","autoselect_posts_limit_from":"0","_autoselect_posts_limit_from":"field_6107eb0c31b46","autoselect_posts_events_category":["4"],"_autoselect_posts_events_category":"field_60d35e25e9118","autoselect_posts_events_tags":"","_autoselect_posts_events_tags":"field_60d35e20e9117","autoselect_posts":"","_autoselect_posts":"field_60c257da7f635","item_style_display_featured_image":"1","_item_style_display_featured_image":"field_612e302ed48ae","item_style_image_dimensions":"wide","_item_style_image_dimensions":"field_611e8ce3f2594","item_style_orientation":"horizontal","_item_style_orientation":"field_611e8c98f2593","item_style":"","_item_style":"field_611e8c90f2592"},"mode":"preview","wpClassName":"wp-block-acf-posts-grid"} /--></div>
				<!-- /wp:group -->
				
				<!-- wp:group {"className":"nu_pattern-is_featured_events\u002d\u002dis_type_a"} -->
				<div class="wp-block-group nu_pattern-is_featured_events--is_type_a"><!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:heading {"textAlign":"center","className":"is-style-display"} -->
				<h2 class="has-text-align-center is-style-display">Lorem ipsum <strong>dolor sit</strong> amet</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi pretium ipsum augue, ac egestas sapien commodo a. Nam id rutrum nunc. Ut scelerisque mollis libero. Duis eu mauris efficitur, varius mi vehicula, placerat nisl. Cras luctus sapien in ante fringilla sodales. Morbi nec quam eleifend diam iaculis consectetur. Pellentesque suscipit pharetra purus ac ultrices. Mauris urna velit, tempor fringilla lobortis a, venenatis non purus.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
				
				<!-- wp:acf/posts-grid {"id":"block_615f8921d8df1","name":"acf/posts-grid","data":{"options_columns":"3","_options_columns":"field_60b64c22f5171","options_show_filter":"0","_options_show_filter":"field_60b64c42f5172","options_pagination":"0","_options_pagination":"field_60b64c49f5173","options_autoselect":"1","_options_autoselect":"field_60c2520e28a92","options":"","_options":"field_60b64c1af5170","autoselect_posts_post_type":"nu_events","_autoselect_posts_post_type":"field_60d208713a1fe","autoselect_posts_limit_number":"3","_autoselect_posts_limit_number":"field_60c258147cc96","autoselect_posts_limit_from":"0","_autoselect_posts_limit_from":"field_6107eb0c31b46","autoselect_posts_events_category":"","_autoselect_posts_events_category":"field_60d35e25e9118","autoselect_posts_events_tags":["3"],"_autoselect_posts_events_tags":"field_60d35e20e9117","autoselect_posts":"","_autoselect_posts":"field_60c257da7f635","item_style_display_featured_image":"1","_item_style_display_featured_image":"field_612e302ed48ae","item_style_image_dimensions":"widest","_item_style_image_dimensions":"field_611e8ce3f2594","item_style_orientation":"vertical","_item_style_orientation":"field_611e8c98f2593","item_style":"","_item_style":"field_611e8c90f2592"},"align":"","mode":"preview","wpClassName":"wp-block-acf-posts-grid"} /--></div>
				<!-- /wp:group -->
			',
		)
	); 
?>