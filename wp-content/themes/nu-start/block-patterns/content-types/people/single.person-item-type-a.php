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
		'nu-blocks/content-types/people/single--person-item-type-a',
		array(
			'title'       => 'Person Item --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['content-types'],
			'keywords'  => ['person', 'person-item'],
			'content'     => '
				<!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":166,"minHeight":20,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull has-background-dim" style="min-height:20vw"><img class="wp-block-cover__image-background wp-image-166" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"fontSize":"extra-large"} -->
				<p class="has-extra-large-font-size"><strong>Our People</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph {"fontSize":"huge"} -->
				<p class="has-huge-font-size">Leadership Team</p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:group {"className":"nu_start\u002d\u002dperson-item-single-type-a","layout":{"inherit":false}} -->
				<div class="wp-block-group nu_start--person-item-single-type-a"><!-- wp:columns {"className":"is-style-default"} -->
				<div class="wp-block-columns is-style-default"><!-- wp:column {"width":"200px","className":"is-the-sidebar"} -->
				<div class="wp-block-column is-the-sidebar" style="flex-basis:200px"><!-- wp:acf/nav-menu {"id":"block_6165fb3c4ba37","name":"acf/nav-menu","data":{"nav_menu":"people-categories","_nav_menu":"field_60c10f929a399"},"align":"","mode":"preview","wpClassName":"wp-block-acf-nav-menu"} /--></div>
				<!-- /wp:column -->
				
				<!-- wp:column -->
				<div class="wp-block-column"><!-- wp:columns {"className":"is-headshot-and-bio"} -->
				<div class="wp-block-columns is-headshot-and-bio"><!-- wp:column {"width":"320px"} -->
				<div class="wp-block-column" style="flex-basis:320px"><!-- wp:image {"align":"center","id":167,"sizeSlug":"medium","linkDestination":"none"} -->
				<div class="wp-block-image"><figure class="aligncenter size-medium"><img src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" alt="" class="wp-image-167"/></figure></div>
				<!-- /wp:image --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:group -->
				<div class="wp-block-group"><!-- wp:heading -->
				<h2>Name First Last</h2>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph {"fontSize":"larger"} -->
				<p class="has-larger-font-size">Title</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:group -->
				
				<!-- wp:separator {"className":"is-style-wide"} -->
				<hr class="wp-block-separator is-style-wide"/>
				<!-- /wp:separator -->
				
				<!-- wp:paragraph {"fontSize":"large"} -->
				<p class="has-large-font-size">About</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Massa id neque aliquam vestibulum morbi blandit cursus. Enim neque volutpat ac tincidunt vitae semper quis. Leo in vitae turpis massa sed elementum tempus egestas sed. Facilisis volutpat est velit egestas dui id ornare. Lobortis mattis aliquam faucibus purus in massa tempor nec. </p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Eu tincidunt tortor aliquam nulla facilisi cras fermentum. Etiam non quam lacus suspendisse faucibus interdum. Dictumst vestibulum rhoncus est pellentesque elit ullamcorper. Odio eu feugiat pretium nibh ipsum consequat. Sit amet est placerat in egestas erat imperdiet.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph {"fontSize":"large"} -->
				<p class="has-large-font-size">Research</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Convallis aenean et tortor at risus viverra. Nascetur ridiculus mus mauris vitae ultricies. Sed nisi lacus sed viverra tellus in hac. Gravida cum sociis natoque penatibus et magnis dis parturient montes. Enim ut tellus elementum sagittis vitae et. Bibendum ut tristique et egestas.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Ornare massa eget egestas purus. Et odio pellentesque diam volutpat commodo sed egestas egestas fringilla. Tortor dignissim convallis aenean et tortor. Sed vulputate mi sit amet mauris. Velit egestas dui id ornare arcu. Phasellus faucibus scelerisque eleifend donec pretium vulputate sapien nec. Sit amet dictum sit amet justo donec enim diam vulputate. Purus sit amet volutpat consequat mauris nunc. Magna sit amet purus gravida. Sit amet consectetur adipiscing elit ut aliquam.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>