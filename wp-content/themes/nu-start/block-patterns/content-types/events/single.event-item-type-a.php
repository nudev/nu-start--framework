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
		'nu-blocks/content-types/events/single--events-item-type-a',
		array(
			'title'       => 'Events Item --- Type A',
			'description' => 'Lorem description ipsum',
			'categories'  => ['content-types'],
			'keywords'  => ['events', 'events-item'],
			'content'     => '
				<!-- wp:group {"align":"full","className":"nu_start\u002d\u002devent-item-single-type-a"} -->
				<div class="wp-block-group alignfull nu_start--event-item-single-type-a"><!-- wp:cover {"url":"'.get_template_directory_uri().'/__lib/img/1920x1080.png","id":166,"minHeight":20,"minHeightUnit":"vw","align":"full"} -->
				<div class="wp-block-cover alignfull has-background-dim" style="min-height:20vw"><img class="wp-block-cover__image-background wp-image-166" alt="" src="'.get_template_directory_uri().'/__lib/img/1920x1080.png" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"level":1,"className":"is-style-default"} -->
				<h1 class="is-style-default">Events</h1>
				<!-- /wp:heading -->
				
				<!-- wp:paragraph -->
				<p></p>
				<!-- /wp:paragraph --></div></div>
				<!-- /wp:cover -->
				
				<!-- wp:group {"layout":{"inherit":true}} -->
				<div class="wp-block-group"><!-- wp:columns {"className":"is-style-default"} -->
				<div class="wp-block-columns is-style-default"><!-- wp:column {"width":"20%"} -->
				<div class="wp-block-column" style="flex-basis:20%"><!-- wp:acf/nav-menu {"id":"block_6165fe2db7e60","name":"acf/nav-menu","data":{"nav_menu":"news-and-events-sidebar","_nav_menu":"field_60c10f929a399"},"align":"","mode":"preview","wpClassName":"wp-block-acf-nav-menu"} /--></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:columns -->
				<div class="wp-block-columns"><!-- wp:column {"width":"40%"} -->
				<div class="wp-block-column" style="flex-basis:40%"><!-- wp:group {"style":{"color":{"background":"#eeeeee"}},"className":"event-item-sidebar is-style-card is-style-card-outlined"} -->
				<div class="wp-block-group event-item-sidebar is-style-card is-style-card-outlined has-background" style="background-color:#eeeeee"><!-- wp:post-title {"level":5,"className":"is-style-display"} /-->
				
				<!-- wp:paragraph -->
				<p><strong>Date and Time</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:acf/nu-datetime-range {"id":"block_61158737ef488","name":"acf/nu-datetime-range","data":{"start_date":"","_start_date":"field_6107e7ce62726","start_time":"","_start_time":"field_6107e80662728","end_date":"","_end_date":"field_6107e7ff62727","end_time":"","_end_time":"field_6107e81b62729","datetime_range":"","_datetime_range":"field_611587cf9d174"},"align":"","mode":"preview","wpClassName":"wp-block-acf-nu-datetime-range"} /-->
				
				<!-- wp:paragraph -->
				<p><strong>Audience</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:paragraph -->
				<p><strong>Price</strong></p>
				<!-- /wp:paragraph -->
				
				<!-- wp:buttons -->
				<div class="wp-block-buttons"><!-- wp:button {"width":100,"className":"is-style-outline"} -->
				<div class="wp-block-button has-custom-width wp-block-button__width-100 is-style-outline"><a class="wp-block-button__link">RSVP</a></div>
				<!-- /wp:button --></div>
				<!-- /wp:buttons --></div>
				<!-- /wp:group --></div>
				<!-- /wp:column -->
				
				<!-- wp:column {"width":""} -->
				<div class="wp-block-column"><!-- wp:post-title /-->
				
				<!-- wp:paragraph -->
				<p>Subhead</p>
				<!-- /wp:paragraph -->
				
				<!-- wp:post-featured-image {"height":"25vw"} /-->
				
				<!-- wp:paragraph -->
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
				<!-- /wp:column --></div>
				<!-- /wp:columns --></div>
				<!-- /wp:group --></div>
				<!-- /wp:group -->	
			',
		)
	); 
?>