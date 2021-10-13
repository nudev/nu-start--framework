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
		'nu-blocks/content-types/news/single--news-item-type-a',
		array(
			'title'       => 'News Item --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['content-types'],
			'keywords'  => ['news', 'news-item'],
			'content'     => '
				<!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","minHeight":20,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull has-background-dim" style="min-height:20vw"><img class="wp-block-cover__image-background" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:paragraph {"align":"center","placeholder":"Write title…","fontSize":"large"} -->
				<p class="has-text-align-center has-large-font-size"></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:columns {"className":"is-style-default"} -->
				<div class="wp-block-columns is-style-default"><!-- wp:column {"width":"20%"} -->
				<div class="wp-block-column" style="flex-basis:20%"><!-- wp:acf/nav-menu {"id":"block_6165fe2db7e60","name":"acf/nav-menu","data":{"nav_menu":"news-and-events-sidebar","_nav_menu":"field_60c10f929a399"},"align":"","mode":"preview","wpClassName":"wp-block-acf-nav-menu"} /--></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"80%"} -->
				<div class="wp-block-column" style="flex-basis:80%"><!-- wp:group {"className":"is-news-item-content","layout":{"contentSize":"","wideSize":""}} -->
				<div class="wp-block-group is-news-item-content"><!-- wp:post-title /-->
				
				<!-- wp:acf/nu-datetime-range {"id":"block_6165fe5cb7e61","name":"acf/nu-datetime-range","align":"","mode":"preview","wpClassName":"wp-block-acf-nu-datetime-range"} /-->
				
				<!-- wp:post-featured-image {"height":"400px"} /-->
				
				<!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"40%"} -->
				<div class="wp-block-column" style="flex-basis:40%"><!-- wp:pullquote -->
				<figure class="wp-block-pullquote"><blockquote><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p><cite><strong>First Last Name</strong><br>Title<br></cite></blockquote></figure>
				<!-- /wp:pullquote --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":"60%"} -->
				<div class="wp-block-column" style="flex-basis:60%"><!-- wp:paragraph -->
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Bibendum enim facilisis gravida neque convallis a cras semper. Porta nibh venenatis cras sed felis eget velit aliquet. Vulputate mi sit amet mauris commodo quis imperdiet massa. Sem integer vitae justo eget magna fermentum iaculis. Ut eu sem integer vitae justo eget. Tellus id interdum velit laoreet id donec ultrices tincidunt arcu. Sollicitudin tempor id eu nisl nunc mi ipsum. Condimentum lacinia quis vel eros donec ac odio. Nec ullamcorper sit amet risus nullam eget felis eget.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Tortor at risus viverra adipiscing at in. Condimentum vitae sapien pellentesque habitant morbi tristique senectus et. Aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat. Lectus arcu bibendum at varius vel. Suspendisse in est ante in nibh mauris. At quis risus sed vulputate odio ut enim blandit volutpat. Massa id neque aliquam vestibulum morbi blandit. Sit amet commodo nulla facilisi nullam. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Tincidunt dui ut ornare lectus sit amet. Arcu dui vivamus arcu felis bibendum ut tristique. At ultrices mi tempus imperdiet nulla malesuada. Mauris a diam maecenas sed enim ut.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>In nibh mauris cursus mattis molestie. Eu consequat ac felis donec et odio pellentesque. Volutpat ac tincidunt vitae semper. Urna nunc id cursus metus aliquam eleifend mi in nulla. Rhoncus mattis rhoncus urna neque viverra justo. Elementum facilisis leo vel fringilla est ullamcorper eget. Nunc sed velit dignissim sodales ut. Posuere urna nec tincidunt praesent semper feugiat nibh sed pulvinar. Duis tristique sollicitudin nibh sit amet commodo. Sit amet consectetur adipiscing elit duis tristique sollicitudin. Maecenas ultricies mi eget mauris pharetra. Amet luctus venenatis lectus magna fringilla urna porttitor rhoncus dolor. Nec dui nunc mattis enim ut tellus. Purus viverra accumsan in nisl nisi scelerisque. Lacus sed turpis tincidunt id aliquet risus. Malesuada bibendum arcu vitae elementum curabitur vitae nunc sed velit. Scelerisque mauris pellentesque pulvinar pellentesque habitant. Rhoncus aenean vel elit scelerisque mauris pellentesque pulvinar pellentesque.</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p>Tortor at risus viverra adipiscing at in. Condimentum vitae sapien pellentesque habitant morbi tristique senectus et. Aenean sed adipiscing diam donec adipiscing tristique risus nec feugiat. Lectus arcu bibendum at varius vel. Suspendisse in est ante in nibh mauris. At quis risus sed vulputate odio ut enim blandit volutpat. Massa id neque aliquam vestibulum morbi blandit. Sit amet commodo nulla facilisi nullam. Adipiscing elit duis tristique sollicitudin nibh sit amet commodo. Tincidunt dui ut ornare lectus sit amet. Arcu dui vivamus arcu felis bibendum ut tristique. At ultrices mi tempus imperdiet nulla malesuada. Mauris a diam maecenas sed enim ut.</p>
				<!-- /wp:paragraph --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group -->
			',
		)
	); 
?>