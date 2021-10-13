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
		'nu-blocks/landing-pages/collection-layout-a',
		array(
			'title'       => 'Landing Page - Collection - Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['collection-pages'],
			'keywords'  => ['collection-pages', 'nustart'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_pattern-is_hero_banner\u002d\u002dtype-c"} -->
				<div class="wp-block-group alignfull nu_pattern-is_hero_banner--type-c" id="banner-type-c">
				<!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","dimRatio":0,"focalPoint":{"x":"0.50","y":0.5},"minHeight":20,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull" style="min-height:20vw"><img class="wp-block-cover__image-background" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" style="object-position:50% 50%" data-object-fit="cover" data-object-position="50% 50%"/><div class="wp-block-cover__inner-container"><!-- wp:group {"style":{"color":{"gradient":"linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"}}} -->
				<div class="wp-block-group has-background" style="background:linear-gradient(135deg,rgba(0,0,0,0.66) 3%,rgba(0,0,0,0.66) 100%)"><!-- wp:heading {"className":"is-style-display"} -->
				<h2 class="is-style-display">Lipsum Collection Title</h2>
				<!-- /wp:heading --></div>
				<!-- /wp:group --></div></div>
				<!-- /wp:cover --></div>
				<!-- /wp:group -->
				
				<!-- wp:group {"className":"nu_pattern-is_featured_people\u002d\u002dis_type_a"} -->
				<div class="wp-block-group nu_pattern-is_featured_people--is_type_a"><!-- wp:acf/posts-grid {"id":"block_60dc9ab90849a","name":"acf/posts-grid","data":{"options_columns":"3","_options_columns":"field_60b64c22f5171","options_show_filter":"1","_options_show_filter":"field_60b64c42f5172","options_pagination":"1","_options_pagination":"field_60b64c49f5173","options_per_page":"12","_options_per_page":"field_60c276d3780be","options_autoselect":"1","_options_autoselect":"field_60c2520e28a92","options":"","_options":"field_60b64c1af5170","autoselect_posts_post_type":"nu_people","_autoselect_posts_post_type":"field_60d208713a1fe","autoselect_posts_limit_number":"0","_autoselect_posts_limit_number":"field_60c258147cc96","autoselect_posts_limit_from":"0","_autoselect_posts_limit_from":"field_6107eb0c31b46","autoselect_posts_people_category":"","_autoselect_posts_people_category":"field_60c258747cc98","autoselect_posts_people_tags":"","_autoselect_posts_people_tags":"field_60c258887cc99","autoselect_posts":"","_autoselect_posts":"field_60c257da7f635","item_style_display_featured_image":"1","_item_style_display_featured_image":"field_612e302ed48ae","item_style_image_dimensions":"auto","_item_style_image_dimensions":"field_611e8ce3f2594","item_style_orientation":"vertical","_item_style_orientation":"field_611e8c98f2593","item_style":"","_item_style":"field_611e8c90f2592"},"align":"","mode":"preview","wpClassName":"wp-block-acf-posts-grid"} /--></div>
				<!-- /wp:group -->
			',
		)
	); 
?>